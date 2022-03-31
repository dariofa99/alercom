<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Institution extends Model
{
    use HasFactory;
    protected $table = 'institutions';
    protected $fillable = [
        'institution_name',
        'institution_address',
        'institution_phone',
        'town_id'
    ];

    public function contacts(){
        return $this->hasMany(InstitutionContact::class,'institution_id'); 
     }

     public function event_types(){
        return $this->belongsToMany(EventType::class,'institutions_has_event_types','institution_id','event_type_id')
        ->withPivot('id','institution_id','event_type_id')->withTimestamps(); 
     }
}
