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
        'event_type_id',
        'town_id',
        'status_id'
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
      return $this->belongsToMany(Institution::class,'events_has_institutions','event_id')
      ->withPivot('id','institution_id','event_id','status_id')->withTimestamps(); 
   }

}
