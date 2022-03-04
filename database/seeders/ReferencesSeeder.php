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
            
            'reference_name' => 'NO_APLICA',
            'category' => 'NO_APLICA',
            'table'     => 'NO_APLICA'    
        ]);

        DB::table('references')->insert([    
                  
            'reference_name' => 'Nariño',
            'category' => 'deparment_names',
            'table' => 'towns' ,                    
        ]);

        DB::table('references')->insert([       
               
            'reference_name' => 'Antioquia',
            'category' => 'deparment_names',
            'table' => 'towns' ,                    
        ]);

        DB::table('references')->insert([    
                  
            'reference_name' => 'Activo',
            'category' => 'status_type',
            'table' => 'users' ,                    
        ]);

        DB::table('references')->insert([       
               
            'reference_name' => 'Inactivo',
            'category' => 'status_type',
            'table' => 'users' ,                    
        ]);

        DB::table('references')->insert([       
                 
            'reference_name' => 'Respuesta corta',
            'category' => 'question_type',
            'table' => 'aditional_questions' ,                    
        ]);

        DB::table('references')->insert([       
                
            'reference_name' => 'Respuesta larga',
            'category' => 'question_type',
            'table' => 'aditional_questions' ,                    
        ]);

        
        DB::table('references')->insert([       
             
            'reference_name' => 'Selección múltiple, única respuesta',
            'category' => 'question_type',
            'table' => 'aditional_questions' ,                    
        ]);

        DB::table('references')->insert([       
               
            'reference_name' => 'Selección múltiple, varias respuesta',
            'category' => 'question_type',
            'table' => 'aditional_questions' ,                    
        ]);

        DB::table('references')->insert([       
              
            'reference_name' => 'Fecha',
            'category' => 'question_type',
            'table' => 'aditional_questions' ,                    
        ]);

       /*  DB::table('references')->insert([       
              
            'reference_name' => 'Ambiental',
            'category' => 'event_type',
            'table' => 'events' ,                    
        ]);

        DB::table('references')->insert([       
             
            'reference_name' => 'Salud',
            'category' => 'event_type',
            'table' => 'events'                    
        ]);

        DB::table('references')->insert([       
             
            'reference_name' => 'VBG',
            'category' => 'event_type',
            'table' => 'events' ,                    
        ]); */

        DB::table('references')->insert([       
             
            'reference_name' => 'Alertado',
            'category' => 'status_type',
            'table' => 'events' ,                    
        ]);

        DB::table('references')->insert([       
               
            'reference_name' => 'Denegado',
            'category' => 'status_type',
            'table' => 'events' ,                    
        ]);

        DB::table('references')->insert([       
           
            'reference_name' => 'Enviado',
            'category' => 'status_type',
            'table' => 'events' ,                    
        ]);

        DB::table('references')->insert([       
           
            'reference_name' => 'Revisado',
            'category' => 'status_type',
            'table' => 'events' ,                    
        ]);

        DB::table('references')->insert([       
          
            'reference_name' => 'Correo electrónico',
            'category' => 'contact_type',
            'table' => 'institutions_contacts' ,                    
        ]);


        //////////////////////////////////

        DB::table('event_types')->insert([       
           
            'event_type_description' => 'Es la violencia basada en genero',
            'event_type_name' => 'VBG',                               
        ]);

        DB::table('event_types')->insert([       
             
            'event_type_description' => 'Es un porblema ambiental',
            'event_type_name' => 'AMBIENTAL',                               
        ]);


        ///////////////////////////////////////////////////////////////////////

        DB::table('towns')->insert([       
            
            'town_name' => 'Pasto',
            'department_id' => '2',                             
        ]);
        
    }
}
