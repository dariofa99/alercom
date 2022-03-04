<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InstitutionContact extends Model
{
    use HasFactory;
    protected $table = 'institutions_contacts';
    protected $fillable = [
        'institution_contact',
        'contact_type_id',
        'institution_id'        
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
       
    ]; 

    

}
