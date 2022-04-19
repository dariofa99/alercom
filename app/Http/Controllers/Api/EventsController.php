<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\SendEventMail;
use Illuminate\Http\Request;
use App\Models\EventReport;
use App\Models\Institution;
use DB;
use App\Http\Requests\FilesDecodeBase64;
use App\Models\Reference;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alerts = EventReport::with('town.department')
        ->get();

        return response()->json(compact('alerts'),200);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    /* return response()->json([
            "request"=>$request->all(),
            "errors"=>[]],200);
*/

//$request['event_description'] = "Credadd de sde lalaraad";
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
        $event = EventReport::create($request->all()); 
        if($request->has('image_event')){
            $file = $event->uploadFile($request->image_event,'event_'.$event->id);
            $event->files()->attach($file->id,[
                'user_id'=>auth()->user()->id,
                'status_id'=>1,
                'type_id'=>1
            ]);
        }
        

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

      
        $event->town;
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
       // $EventReport = EventReport::with(['town.department'])->find($id);

        try {
            $alert = EventReport::with(['town.department','status','files','event_type','affectation_range'])->find($id);   
           if(count($alert->files)>0){
            $alert->files->each(function ($file){
                $file_path = url($file->path);
                $file->real_path = $file_path;
            });
           }
            $alert->files->each(function ($file){
                $file_path = url($file->path);
                $file->real_path = $file_path;
            });
            $ranges = Reference::where([
                'category' => 'affectations_number',
                'table' => 'events',
             ])->get();   
            return response()->json(compact('alert','ranges'),200);
        } catch (\Throwable $th) {
            return response()->json(["errors"=>["Error en el servidor $th"]],501);
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
        
        $event = EventReport::find($id); 
        $messages = [
            'event_description.min' => 'La descripcion debe tener al menos 10 caracteres!', 
            'event_description.required' => 'La descripcion es requerida!',            
        ];
        $validator = Validator::make($request->all(), [
            'event_description' => 'required|string|min:10',            
        ],$messages);


        if($validator->fails()){
                return response()->json(["errors"=>$validator->errors()->all()],400);
        }
       $event->fill($request->all());
       $event->save();
      // $request['status_id'] = 11;
       if($request->has('image_event')){
        if(count($event->files)>0){
        $file = $event->files()->first();
        if(File::exists(public_path($file->path))){
            File::delete(public_path($file->path));
            $file->delete();
           }           
        }
        $file = $event->uploadFile($request->image_event,'event_'.$event->id);
        $event->files()->attach($file->id,[
            'user_id'=>auth()->user()->id,
            'status_id'=>1,
            'type_id'=>1
        ]);
    }

       $event->contacts;

        return response()->json(compact('event'),200);
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
        return response()->json(compact('EventReport'),200);
      } catch (\Throwable $th) {
        return response()->json(["error"=>"Error en el servidor"],501);
      }
    }
}
