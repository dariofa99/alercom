<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\EventType;
use Illuminate\Http\Request;

class EventTypesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $events = EventType::with("category")->get();   
             return response()->json([
                "event_types"=>$events,
                "errors"=>[]
            ],200);
        } catch (\Throwable $th) {
            //throw $th;
        }
       
        
        return response()->json($events);

    }


    public function getEventTypeByCatId($category){
        $events = EventType::with("category")
        ->where([
            'category_id' =>$category            
         ])->get();   
         return response()->json([
            "event_types"=>$events,
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
        try {
            $event = EventType::create($request->all());   
            return response()->json([
                "event_type"=>$event,
                "errors"=>[]
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
               "error"=>["Error en el servidor ".$th]
            ],500);
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
        try {
            $event = EventType::with("category")
            ->find($id);   
            return response()->json([
                "event_type"=>$event,
                "errors"=>[]
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
               "error"=>["Error en el servidor ".$th]
            ],500);
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
            $event = EventType::find($id);   
            $event->fill($request->all());
            $event->save();
            return response()->json([
                "event_type"=>$event,
                "errors"=>[]
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
               "error"=>["Error en el servidor ".$th]
            ],500);
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
            $event = EventType::find($id);   
            $event->delete();
            return response()->json([
                "event_type"=>$event,
                "errors"=>[]
            ],200);
        } catch (\Throwable $th) {
            return response()->json([
               "error"=>["Error en el servidor ".$th]
            ],500);
        }
    }
}
