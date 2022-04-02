<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Support\Facades\Notification;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('roles')
        //->where('id','<>',\Auth::user()->id)
        ->get();
        
        return response()->json($users);

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
            'email.unique' => 'El :attribute ya existe en otra cuenta',
            'username.unique' => 'El :attribute ya esta registrado',
        ];
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255|unique:users',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ],$messages);

        if($validator->fails()){
                return response()->json(["errors"=>$validator->errors()->all()],400);
        }
        $request['status_id'] = 4;
        $user = User::create($request->all()); 

          if($request->get('role_id')){
            if(count($user->roles)<=0){
                $user->roles()->attach($request->role_id);  
            }else{
                $user->roles()->sync($request->role_id);
            }
            $user = User::find($user->id);    
            $user->roles;  
        }        
        return response()->json(compact('user'),201);

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
            $user = User::find($id);
            $user->roles;
        return response()->json([
            'user'=>$user,
            'errors'=>[]
        ],200);
        } catch (\Throwable $th) {
            return response()->json(["error"=>"Error de servidor"],501);
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
        $user = User::find($id);
        $user->fill($request->all());
        $user->roles;  
        if($request->get('password')){
            if (Hash::check($request->oldpassword, \Auth::user()->password)) {
                if ($request->password == $request->confirpassword) {
                    $user->password = bcrypt($request->password);
                    $user->save();
                    return response()->json([                      
                        'errors'=>[]]);                    
                } else {
                   return response()->json([                   
                    'errors'=>['La nueva contraseña no coincide']
                   ]);
                }
                
            } else {
                return response()->json([
                    //'user'=>$user,
                    'errors'=>['La contraseña de administrador o actual es incorrecta']
                ]);
            }
        }
      if($request->has('email')){      
            $messages = [
                'username.unique' => 'El :attribute ya esta registrado',
                'email.unique' => 'El :attribute  ya existe en otra cuenta.',
                'email.required' => 'El :attribute es requerido.',

            ];
            $validator = Validator::make($request->all(), [
                'username' => [
                  'required',
                    Rule::unique('users')->ignore($user->id)
                ],
                'email' => [
                    'required',
                      Rule::unique('users')->ignore($user->id)
                  ],
  
                ],$messages);

                /* $validator = Validator::make($request->all(), [
                    'username' => 'required|string|max:255|unique:users,username,'.$user->id.',id',                   
                    'email' => 'required|string|email|max:255|unique:users',
                  
                ],$messages); */


            if ($validator->fails()) {
                return response()->json([
                  'errors'=>$validator->errors()->all()
                ],201);
            }

      }
        $user->save(); 
        if($request->get('role_id')){
            if(count($user->roles)<=0){
                $user->roles()->attach($request->role_id);  
            }else{
                $user->roles()->sync($request->role_id);
            }
            $user = User::find($id);    
            $user->roles;  
        }
        return response()->json([
            'user'=>$user,
            'errors'=>[]
        ],200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(compact('user'),201);
    }
}
