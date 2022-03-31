<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventReport extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $fillable = [
        'event_description',
        "event_date",
        "event_place",
        "event_aditional_information",
        "affected_people",
        "affected_family",
        "affected_animals",
        "affected_infrastructure",
        "affected_livelihoods",
        "event_type_id",
        "town_id",
        "status_id",
        "afectations_range_id"
    ];

    public function event_type(){
        return $this->belongsTo(EventType::class,'event_type_id'); 
     }
     public function town(){
        return $this->belongsTo(Town::class,'town_id'); 
     }
     public function status(){
        return $this->belongsTo(Reference::class,'status_id'); 
     }

     public function institutions(){
      return $this->belongsToMany(Institution::class,'events_has_institutions','event_id','institution_id')
      ->withPivot('id','institution_id','event_id','status_id')->withTimestamps(); 
   }

}
