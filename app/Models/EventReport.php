<?php

namespace App\Models;

use App\Traits\UploadFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventReport extends Model
{
    use HasFactory, UploadFile;
    protected $table = 'events';
    public $disk = 'event';
    protected $fillable = [
        'event_description',        
        "event_date",
        "event_place",
        "longitude",
        "latitude",
        "event_aditional_information",
        "affected_people",
        "affected_family",
        "affected_animals",
        "affected_infrastructure",
        "affected_livelihoods",
        "affected_enviroment",
        "user_id",
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
     public function affectation_range(){
        return $this->belongsTo(Reference::class,'afectations_range_id'); 
     }
   public function user(){
      return $this->belongsTo(User::class,'user_id'); 
   }

     public function status(){
      return $this->belongsTo(Reference::class,'status_id'); 
   }
     public function institutions(){
      return $this->belongsToMany(Institution::class,'events_has_institutions','event_id','institution_id')
      ->withPivot('id','verification_token','institution_id','event_id','status_id','contact_id')->withTimestamps(); 
   }

   public function institution_status(){
      return $this->belongsToMany(Reference::class,'events_has_institutions','event_id','status_id')
      ->withPivot('id','verification_token','institution_id','event_id','status_id','contact_id')->withTimestamps(); 
   }

   public function files(){
      return $this->belongsToMany(File::class,'events_files','event_id')
      ->withPivot('id','file_id','user_id','status_id','type_id')->withTimestamps(); 
   } 

}
