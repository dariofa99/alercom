<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EventType;
use App\Models\Reference;
use App\Models\Town;
use Illuminate\Http\Request;

class ReferencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDepartments()
    {
        $departments = Reference::where([
           'category' => 'deparment_names',
           'table' => 'towns' ,
        ])->orderBy('reference_name','asc')->get();       
        return response()->json([
            "references"=>$departments,
            "errors"=>[]
        ],200);
    }

    public function getTownsByDepId($department_id){
        $towns = Town::with('department')->where([
            'department_id' => $department_id            
         ])->orderBy('town_name','asc')->get();   
         return response()->json([
            "towns"=>$towns,
            "errors"=>[]
        ],200);
    }

    public function getTowns(){
        $towns = Town::with('department')->get();   
         return response()->json([
            "towns"=>$towns,
            "errors"=>[]
        ],200);
    }

    public function getAffectsRange(){
        $ranges = Reference::where([
            'category' => 'affectations_number',
            'table' => 'events',
         ])->get();       
         return response()->json([
             "references"=>$ranges,
             "errors"=>[]
         ],200);
    }

    public function getContactTypes(){
        $ranges = Reference::where([
            'category' => 'contact_type',
            'table' => 'institutions_contacts',
         ])->get();       
         return response()->json([
             "references"=>$ranges,
             "errors"=>[]
         ],200);
    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
