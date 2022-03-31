<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['authenticate','register']]);
        $this->guard = "api";
    }

    public function authenticate(Request $request)
    {
       // 
      $credentials = $request->only('username', 'password');
      try {
          if (! $token = JWTAuth::attempt($credentials)) {
              return response()->json(['error' => 'Credenciales invalidas'], 400);          }
      } catch (JWTException $e) {
          return response()->json(['error' => 'No se pudo conectar al servidor'], 500);
      }
      return $this->respondWithToken($token);
    }

    public function getAuthenticatedUser()
    {
        try {
          if (!$user = JWTAuth::parseToken()->authenticate()) {
                  return response()->json(['user_not_found'], 404);
          }
        } catch (TokenExpiredException $e) {
                return response()->json(['token_expired'], $e->getMessage());
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
                return response()->json(['token_invalid'], $e->getMessage());
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
                return response()->json(['token_absent'], $e->getMessage());
        }
        return response()->json(compact('user'));
    }

    public function register(Request $request)
    {

      //  dd($request->all());
        Log::info($request);
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if($validator->fails()){
                return response()->json($validator->errors()->toArray(),400);
        }

        $user = User::create([            
            'lastname' => $request->lastname,
            'username' =>$request->username,          
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'town_id'=> $request->get('town_id'),
            'status_id'=>4
          ]); 
        $user->roles()->attach(1);  
        $user = User::find($user->id);
        $user->roles;
        $user->roles->each(function($role){
            $role->permissions;
        });
        $acces_token = JWTAuth::fromUser($user);      
        return response()->json(compact('user','acces_token'),201);
    }

       /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        $user = auth($this->guard)->user();
        $user->roles;
        return response()->json([
            'user'=>$user,
            'errors'=>[]
        ],200);
    }

        /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth($this->guard)->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth($this->guard)->factory()->getTTL() * 60,
            'user'=>auth($this->guard)->user(),
            'permissions'=>auth($this->guard)->user()->getAllPermissions(),            
        ]);
    }

}
