<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\SendEventMail;
use Illuminate\Http\Request;
use App\Models\EventReport;
use App\Models\Institution;
use DB;
use App\Http\Requests\FilesDecodeBase64;
use App\Models\InstitutionContact;
use App\Models\Reference;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class EventsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['findByToken','updateByToken']]);
      
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            

            $events = EventReport::with(['town.department',
        'status','event_type.category','user','files','affectation_range'])
        ->where(function($query) use ($request){
            if($request->has("data") and $request->data == 'my'){
                return $query->where('user_id',auth()->user()->id);
            }
        })        
        ->get();

        $events->each(function($event){
            $event->long_event_date= getShortDate($event->created_at);

            $event->files->each(function ($file){
                $file_path = url($file->path);
                $file->real_path = $file_path;
            });              
        });

        return response()->json(compact('events'),200);
        } catch (\Throwable $th) {
            return response()->json(["error"=>["Error en el servidor $th"]],501);
        }
        
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

    try {        
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
        $request['user_id'] = auth()->user()->id;
        $event = EventReport::create($request->all()); 
        if($request->has('image_event')){
            $file = $event->uploadFile($request->image_event,'event_'.$event->id);
            $event->files()->attach($file->id,[
                'user_id'=>auth()->user()->id,
                'status_id'=>1,
                'type_id'=>1
            ]);
        }
        
       /*  $contacts = InstitutionContact::join('institutions','institutions.id','=','institutions_contacts.institution_id')
        ->join('institutions_has_event_types','institutions_has_event_types.institution_id','=','institutions.id')
        ->where('institutions_has_event_types.event_type_id',$event->event_type_id)
        ->where('category_id',24)
        ->select('institutions_contacts.id as contact_id',
        'institutions_contacts.institution_contact',
        'institutions_contacts.institution_id'
        )
        ->get();

        return response()->json([
            "event"=>$contacts,
            "errors"=>[]
        ],200);
        
       if(count($contacts)>0){
        foreach ($contacts as $key => $contact) {           
           $event->institutions()->attach($contact->institution_id,[
               'status_id'=>11,
               'contact_id'=>$contact->contact_id
            ]);
        }
       } */
      
       $event->files->each(function ($file){
        $file_path = url($file->path);
        $file->real_path = $file_path;
    });
       
       $event->affectation_range;
       $event->town->department;
       $event->files;
       $event->status;
       $event->event_type->category;
       $event->user; 
        return response()->json([
            "event"=>$event,
            "errors"=>[]],200);
            
    } catch (\Throwable $th) {
        return response()->json(["error"=>["Error en el servidor $th"]],501);
    }

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
            $alert = EventReport::with(['town.department','status','files','event_type.category','affectation_range','user'])->find($id);   
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
              
            return response()->json([
                "event"=> $alert                
            ],200);
        } catch (\Throwable $th) {
            return response()->json(["error"=>["Error en el servidor $th"]],501);
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
        try {
          
        $event = EventReport::find($id); 
        $messages = [
            'event_description.min' => 'La descripción debe tener al menos 10 caracteres!', 
            'event_description.required' => 'La descripción es requerida!',            
        ];
        $validator = Validator::make($request->all(), [
            'event_description' => 'required|string|min:10',            
        ],$messages);


        if($validator->fails()){
                return response()->json(["errors"=>$validator->errors()->all()],400);
        }
       $event->fill($request->all());
       $event->save();     
       if($request->has('image_event') and $request->image_event !=null and $request->image_event !='' ){
        if(count($event->files)>0){
        $file = $event->files()->first();
        if(File::exists(public_path($file->path))){
            File::delete(public_path($file->path));         
           }    
        if($file)  $file->delete();       
        }
       
        $file = $event->uploadFile($request->image_event,'event_'.$event->id);
        $event->files()->attach($file->id,[
            'user_id'=>auth()->user()->id,
            'status_id'=>1,
            'type_id'=>1
        ]);
    }else{
        /* if(count($event->files)>0){
            $file = $event->files()->first();
            if(File::exists(public_path($file->path))){
                File::delete(public_path($file->path));       
               }    
            if($file)  $file->delete();       
            } */
    }
    if($event->status_id == 13){
     

        $contacts = InstitutionContact::join('institutions','institutions.id','=','institutions_contacts.institution_id')
        ->join('institutions_has_event_types','institutions_has_event_types.institution_id','=','institutions.id')
        ->where('institutions_has_event_types.event_type_id',$event->event_type_id)
        ->where('category_id',24)
        ->select('institutions_contacts.id as contact_id',
        'institutions_contacts.institution_contact',
        'institutions_contacts.institution_id'
        )
        ->get();

       /*  return response()->json([
            "da"=>$contacts,
            "errors"=>[]
        ],200); */

         if(count($contacts)>0){           
            foreach ($contacts as $key => $contact) {           
                     $verification_token = str_replace("/","",bcrypt(\Str::random(50)));
                     $event->institutions()->attach($contact->institution_id,[
                         'status_id'=>11,
                         'verification_token'=>$verification_token,
                         'contact_id'=>$contact->contact_id
                         
                        ]);
                Mail::to($contact->institution_contact)->send(new SendEventMail($verification_token));           
            }            
        }
    }
    

    $event->files->each(function ($file){
        $file_path = url($file->path);
        $file->real_path = $file_path;
    });
      
       $event->affectation_range;
       $event->town->department;
       $event->files;
       $event->status;
       $event->event_type->category;
       $event->user;    
        return response()->json([
            "event"=>$event,
            "errors"=>[]
        ],200);

    } catch (\Throwable $th) {
        return response()->json(["error"=>"Error en el servidor ".$th],501);
    }
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
        $event = EventReport::find($id);
        $event->delete();
        return response()->json([
            "event"=>$event,
            "errors"=>[]
        ],200);
      } catch (\Throwable $th) {
        return response()->json(["error"=>"Error en el servidor"],501);
      }
    }

    public function findByToken($token)
    {     

        try {
            $institution = Institution::whereHas('events', function (Builder $query) use($token){
                            $query->where('verification_token', $token);
                    })->first();
            
            $institution->event = $institution->events()->where('verification_token', $token)->first();
            $institution->event->status;            
            $institution->event->affectation_range;
            $institution->event->town->department;
            $institution->event->files;
            $institution->event->status;
            $institution->event->event_type->category;
            $institution->event->user; 
            $institution->event->pivot->status = $institution->event_status()->where('verification_token', $token)->first();
            return response()->json([
                "institution"=>$institution,
                "errors"=>[]
            ],200);
          } catch (\Throwable $th) {
            return response()->json(["error"=>"Error en el servidor $th"],501);
          }
    }

    public function updateByToken(Request $request,$token)
    {     

  

        try {
            $event = EventReport::whereHas('institutions', function (Builder $query) use($token){
                $query->where('verification_token', $token);
                })->first();           
            $event->status_id = $request->status_id;
            $event->save();   
            $event->status;  
            $event->institution = $event->institutions()->where('verification_token', $token)->first();            
            $event->institution->pivot->status_id = $request->status_id;
            $event->institution->pivot->save();
            $event->institution->pivot->status = $event->institution_status()->where('verification_token', $token)->first();  ;
            return response()->json([
                "event"=>$event,
                "errors"=>[]
            ],200);
          } catch (\Throwable $th) {
            return response()->json(["error"=>"Error en el servidor $th"],501);
          }
    }
}
