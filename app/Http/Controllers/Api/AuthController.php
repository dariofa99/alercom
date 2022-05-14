<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\SendEventMail;
use App\Models\User;
use App\Notifications\UserRegisterNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['authenticate','register','AnonimusAuthenticate']]);
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

    public function AnonimusAuthenticate(Request $request)
    {
       // 
      $user = User::where('username','anonimus')->first();
      try {
          if (! $token = JWTAuth::fromUser($user)) {
              return response()->json(['error' => 'Credenciales invalidas'], 400);          }
      } catch (JWTException $e) {
          return response()->json(['error' => 'No se pudo conectar al servidor'], 500);
      }

        Auth::login($user);
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

             
        $messages = [
            'name.required' => 'El nombre es requerido',
            'lastname.required' => 'El apellido es requerido',
            'email.required' => 'El :attribute es requerido',
            'username.required' => 'El nombre de usuario es requerido',
            'password.required' => 'La contraseña es requerida',
            'email.unique' => 'El :attribute ya existe en otra cuenta',
            'username.unique' => 'El nombre de usuario ya esta registrado',
            'password.confirmed' => 'La contraseña no coincide',
        ];
        $validator = Validator::make($request->all(), [
            'name' => ['required','max:255'],
            'lastname' => ['required','max:255'],
            'email' => ['required','email','max:255','unique:users'],
            'username' => ['required','unique:users','min:3'],          
            'password' => ['required','min:3','confirmed'],
        ],$messages);

        if($validator->fails()){
                return response()->json(["errors"=>$validator->errors()->all()],201);
        }

        $user = User::create([            
            'lastname' => $request->lastname,
            'username' =>$request->username,          
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone_number'),
            'password' => Hash::make($request->get('password')),
            'town_id'=> 1,
            'status_id'=>4
          ]); 
       // $user->roles()->attach(1);  
        $user = User::find($user->id);
       // $user->roles;
       /* $user->roles->each(function($role){
            $role->permissions;
        });*/
        $user->notify(new UserRegisterNotification());             
        return response()->json([
            'user'=>$user,
            'messages'=>["Hemos enviado la confirmación de registro a su correo electrónico, 
            por favor consulte su bandeja de entrada o correo no deseado y culmine su registro"
            ]
        ],200);
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
        $user->town->department;
        $user->status;
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
            'expires_in' => auth($this->guard)->factory()->getTTL() * 120,
            'user'=>auth($this->guard)->user(),
            'permissions'=>auth($this->guard)->user()->getAllPermissions(),            
        ]);
    }

}
