<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\SubirArchivos;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable, SubirArchivos,HasRoles;
    public $disk = 'usuario_archivos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'categoria_id',
        'numero_documento',
        'direccion',
        'telefono',
        'fecha_nacimiento',
        'genero_id',
        'tipo_documento_id',
        'estado_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
    public function files(){
        return $this->belongsToMany(Archivo::class,'usuario_archivos','user_id')
        ->withPivot('id','user_id','archivo_id','tipo_id','activo')->withTimestamps(); 
     }
     public function pagos(){
        return $this->hasMany(UserPago::class,'user_id'); 
     }

     public function estado(){
        return $this->belongsTo(Referencia::class,'estado_id'); 
     }
     public function categoria(){
        return $this->belongsTo(Referencia::class,'categoria_id'); 
     }

     public function scopeSearch($query,$request)
{
    //return $query->where($request->type, $request->data);

    return $query->where(function($query)use($request){
        if($request->type and $request->data!=''){
            return $query->where($request->type, 'like', "%".$request->data."%");
        }
    });
    
    
    
}
}
