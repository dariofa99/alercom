<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Institution;
use App\Models\InstitutionContact;
use DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;

class InstitutionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institutions = Institution::with('town.department')->get();//with('event_types')->with('contacts')->get();
        return response()->json(compact('institutions'),201);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'institution_name.unique' => 'El nombre ya existe!', 
            'institution_name.required' => 'El nombre es requerido!',            
        ];
        $validator = Validator::make($request->all(), [
            'institution_name' => 'required|string|max:255|unique:institutions',            
        ],$messages);

        if($validator->fails()){
                return response()->json(["errors"=>$validator->errors()->all()],400);
        }
        $request['status_id'] = 4;
        $institution = Institution::create($request->all()); 
        if($request->contacts and is_array($request->contacts)){
            foreach ($request->contacts as $key => $contact) {
                $institutionC = InstitutionContact::create([
                    'institution_contact'=>$contact,
                    'contact_type_id'=>$request->contact_type_id[$key],
                    'institution_id'=>$institution->id
                                ]);
            }

        }
        if($request->event_types and is_array($request->event_types)){
            foreach ($request->event_types as $key => $event_type) {
              //  return response()->json(compact('event_type'),201);
                $institution->event_types()->attach($event_type);
            }

        }

        $institution->contacts;
       // $institution->event_types;

        return response()->json(compact('institution'),201);

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
            $institution = Institution::find($id); 
            $institution->contacts;
            $institution->event_types;
    
            return response()->json(compact('institution'),201);
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
        
        $institution = Institution::find($id); 
        $messages = [
            'institution_name.unique' => 'El nombre ya existe!', 
            'institution_name.required' => 'El nombre es requerido!',            
        ];
        $validator = Validator::make($request->all(), [
                'institution_name' => ['required', Rule::unique('institutions')->ignore($institution->id)]
        ],$messages);


        if($validator->fails()){
                return response()->json(["errors"=>$validator->errors()->all()],400);
        }
       $institution->fill($request->all());
       $institution->save();
        if($request->contacts and is_array($request->contacts)){
            foreach ($request->contacts as $key => $contact) {
                $institutionC = InstitutionContact::find($request->contact_id[$key]);
                $institutionC->fill([
                    'institution_contact'=>$contact,
                    'contact_type_id'=>$request->contact_type_id[$key],                    
                ]);
                $institutionC->save();
            }

        }
        $institution->contacts;

        return response()->json(compact('institution'),201);
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
        $institution = Institution::find($id);
        $institution->delete();
        return response()->json(compact('institution'),201);
      } catch (\Throwable $th) {
        return response()->json(["error"=>"Error en el servidor"],501);
      }
    }
}
