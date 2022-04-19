<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReferenceDynamic extends Model
{
    use HasFactory;
    protected $table = 'references_dynamic';
    protected $fillable = [
        'reference_name',
        'reference_description',
        'category',
        'table',
        'section',
        'is_active'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'table'       
    ]; 

    

}
