<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ReferencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //DB::table('referencias')->delete();

        DB::table('references')->insert([   
            'id'         => 1,
            'reference_name' => 'NO_APLICA',
            'category' => 'NO_APLICA',
            'table'     => 'NO_APLICA'    
        ]);

        DB::table('references')->insert([    
            'id'         => 2,        
            'reference_name' => 'Nariño',
            'category' => 'deparment_names',
            'table' => 'towns' ,                    
        ]);

        DB::table('references')->insert([       
            'id'         => 3,     
            'reference_name' => 'Antioquia',
            'category' => 'deparment_names',
            'table' => 'towns' ,                    
        ]);

        DB::table('references')->insert([    
            'id'         => 4,        
            'reference_name' => 'Activo',
            'category' => 'status_type',
            'table' => 'users' ,                    
        ]);

        DB::table('references')->insert([       
            'id'         => 5,     
            'reference_name' => 'Inactivo',
            'category' => 'status_type',
            'table' => 'users' ,                    
        ]);

        DB::table('references')->insert([       
            'id'         => 6,     
            'reference_name' => 'Respuesta corta',
            'category' => 'question_type',
            'table' => 'aditional_questions' ,                    
        ]);

        DB::table('references')->insert([       
            'id'         => 7,     
            'reference_name' => 'Respuesta larga',
            'category' => 'question_type',
            'table' => 'aditional_questions' ,                    
        ]);

        
        DB::table('references')->insert([       
            'id'         => 8,     
            'reference_name' => 'Selección múltiple, única respuesta',
            'category' => 'question_type',
            'table' => 'aditional_questions' ,                    
        ]);

        DB::table('references')->insert([       
            'id'         => 9,     
            'reference_name' => 'Selección múltiple, varias respuesta',
            'category' => 'question_type',
            'table' => 'aditional_questions' ,                    
        ]);

        DB::table('references')->insert([       
            'id'         => 10,     
            'reference_name' => 'Fecha',
            'category' => 'question_type',
            'table' => 'aditional_questions' ,                    
        ]);

        DB::table('references')->insert([       
            'id'         => 11,     
            'reference_name' => 'Ambiental',
            'category' => 'event_type',
            'table' => 'events' ,                    
        ]);

        DB::table('references')->insert([       
            'id'         => 12,     
            'reference_name' => 'Salud',
            'category' => 'event_type',
            'table' => 'events'                    
        ]);

        DB::table('references')->insert([       
            'id'         => 13,     
            'reference_name' => 'VBG',
            'category' => 'event_type',
            'table' => 'events' ,                    
        ]);

        DB::table('references')->insert([       
            'id'         => 14,     
            'reference_name' => 'Alertado',
            'category' => 'status_type',
            'table' => 'events' ,                    
        ]);

        DB::table('references')->insert([       
            'id'         => 15,     
            'reference_name' => 'Denegado',
            'category' => 'status_type',
            'table' => 'events' ,                    
        ]);

        DB::table('references')->insert([       
            'id'=> 16,  
            'reference_name' => 'Enviado',
            'category' => 'status_type',
            'table' => 'events' ,                    
        ]);

        DB::table('references')->insert([       
            'id'=> 17,  
            'reference_name' => 'Revisado',
            'category' => 'status_type',
            'table' => 'events' ,                    
        ]);


        DB::table('towns')->insert([       
            'id'=> 1,  
            'town_name' => 'Pasto',
            'department_id' => '2',                             
        ]);
        
    }
}
