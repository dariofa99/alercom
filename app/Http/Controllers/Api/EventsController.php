<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\SendEventMail;
use Illuminate\Http\Request;
use App\Models\EventReport;
use App\Models\Institution;
use DB;
use App\Http\Requests\FilesDecodeBase64;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event_reports = EventReport::with('town')->get();

        return response()->json(compact('event_reports'),200);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      return response()->json([
            "request"=>$request->image_event,
            "errors"=>[]],200);


$request['event_description'] = "Credadd de sde lalaraad";
        $messages = [
            'event_description.min' => 'La descripcion debe tener al menos 10 caracteres!', 
            'event_description.required' => 'La descripcion es requerida!',            
        ];
        $validator = Validator::make($request->all(), [
            'event_description' => 'required|string|min:10',            
        ],$messages);

        if($validator->fails()){
                return response()->json([
                    "errors"=>$validator->errors()->all()
                ],201);
                
        }
        $request['status_id'] = 11;
        $request['event_type_id'] = 1;
        $request['town_id'] = 1;
        $request['afectations_range_id'] = 1;
        
      

               $event = EventReport::create($request->all()); 
        $file = $event->uploadFile($request->image_event,'event_'.$event->id);
        $event->files()->attach($file->id,[
            'user_id'=>auth()->user()->id,
            'status_id'=>$request->status_id,
            'type_id'=>1
        ]);

       $institutions = Institution::with('contacts')
       ->join('institutions_has_event_types','institutions_has_event_types.institution_id','=','institutions.id')
       ->where('event_type_id',$request->event_type_id)->get();

       //return response()->json(['institution'=>$institutions],201);
       if(count($institutions)>0){
           foreach ($institutions as $key => $institution) {           
            if(count($institution->contacts)>0){               
                foreach ($institution->contacts as $key => $contact) {
                    Mail::to($contact->institution_contact)->send(new SendEventMail());           
                }
            }            
            $event->institutions()->attach($institution->institution_id,['status_id'=>11]);
           }
       }

      
        //$event->town->department;
        //$event->institutions;


        return response()->json([
            "event"=>$event,
            "errors"=>[]],200);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $EventReport = EventReport::find($id); 
            $EventReport->contacts;
    
            return response()->json(compact('EventReport'),201);
        } catch (\Throwable $th) {
            return response()->json(["error"=>"Error en el servidor"],501);
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $EventReport = EventReport::find($id); 
        $messages = [
            'EventReport_name.unique' => 'El nombre ya existe!', 
            'EventReport_name.required' => 'El nombre es requerido!',            
        ];
        $validator = Validator::make($request->all(), [
                'EventReport_name' => ['required', Rule::unique('EventReports')->ignore($EventReport->id)]
        ],$messages);


        if($validator->fails()){
                return response()->json(["errors"=>$validator->errors()->all()],400);
        }
       $EventReport->fill($request->all());
       $EventReport->save();
        if($request->contacts and is_array($request->contacts)){
            foreach ($request->contacts as $key => $contact) {
                $EventReportC = EventReportContact::find($request->contact_id[$key]);
                $EventReportC->fill([
                    'EventReport_contact'=>$contact,
                    'contact_type_id'=>$request->contact_type_id[$key],                    
                ]);
                $EventReportC->save();
            }

        }
        $EventReport->contacts;

        return response()->json(compact('EventReport'),201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try {
        $EventReport = EventReport::find($id);
        $EventReport->delete();
        return response()->json(compact('EventReport'),201);
      } catch (\Throwable $th) {
        return response()->json(["error"=>"Error en el servidor"],501);
      }
    }
}
