<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Town extends Model
{
    use HasFactory;
    protected $table = 'towns';
    protected $fillable = [
        'town_name',
        'department_id ',
        
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function department(){
        return $this->belongsTo(Reference::class,'department_id'); 
     }
     

}
