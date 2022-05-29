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
        'town_id',
        'category_id'
    ];

    public function contacts(){
        return $this->hasMany(InstitutionContact::class,'institution_id'); 
     }

     public function event_types(){
        return $this->belongsToMany(EventType::class,'institutions_has_event_types','institution_id','event_type_id')
        ->withPivot('id','institution_id','event_type_id')->withTimestamps(); 
     } 

     public function events(){
      return $this->belongsToMany(EventReport::class,'events_has_institutions','institution_id','event_id')
      ->withPivot('id','verification_token','institution_id','event_id','status_id','contact_id')->withTimestamps(); 
   }

   public function event_status(){
      return $this->belongsToMany(Reference::class,'events_has_institutions','institution_id','status_id')
      ->withPivot('id','verification_token','institution_id','event_id','status_id','contact_id')->withTimestamps(); 
   }

     public function town(){
        return $this->belongsTo(Town::class,'town_id'); 
     }
}
