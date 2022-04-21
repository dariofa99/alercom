<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class InstitutionalRoute extends Model
{
    use HasFactory;
    
    protected $table = 'institutional_routes';
    protected $fillable = [
        'route_name',
        'route_url',        
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
   
     

}
