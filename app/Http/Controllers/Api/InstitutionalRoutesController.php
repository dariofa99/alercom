<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use App\Models\InstitutionalRoute;
use Illuminate\Http\Request;

class InstitutionalRoutesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $institutional_routes = InstitutionalRoute::orderBy('created_at','desc')->get();
            return response()->json([
                'institutional_routes'=>$institutional_routes,            
            ],200);
        } catch (\Throwable $th) {
            return response()->json([                                    
                'error'=>[$th]
            ],501);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            $insti_route = InstitutionalRoute::create($request->all());
            return response()->json([
                'institutional_route'=>$insti_route,                       
                'errors'=>[]
            ],200);
        } catch (\Throwable $th) {
            return response()->json([                                    
                'error'=>[$th]
            ],501);
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
            $insti_route = InstitutionalRoute::find($id);
            return response()->json([
                'institutional_route'=>$insti_route,                       
                'errors'=>[]
            ],200);
        } catch (\Throwable $th) {
            return response()->json([                                    
                'error'=>["Error en el servidor ".$th]
            ],501);
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
            $insti_route = InstitutionalRoute::find($id);
            $insti_route->fill($request->all());
            $insti_route->save();
            return response()->json([
                'institutional_route'=>$insti_route,                       
                'errors'=>[]
            ],200);
        } catch (\Throwable $th) {
            return response()->json([                                    
                'error'=>[$th]
            ],501);
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
            $insti_route = InstitutionalRoute::find($id);
            $insti_route->delete();
            return response()->json([
                'institutional_route'=>$insti_route,                       
                'errors'=>[]
            ],200);
        } catch (\Throwable $th) {
            return response()->json([                                    
                'error'=>[$th]
            ],501);
        }
    }
}
