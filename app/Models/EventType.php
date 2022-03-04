<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventType extends Model
{
    use HasFactory;
    protected $table = 'event_types';
    protected $fillable = [
        'event_type_description',
        'event_type_name',        
    ];

    protected $hidden = [
        'created_at',
        'updated_at',        
    ]; 

}
