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

        DB::table('references')->insert([       
          
            'reference_name' => 'Entre 1 y 5',
            'category' => 'affectations_number',
            'table' => 'events' ,                    
        ]);

        DB::table('references')->insert([         
            'reference_name' => 'Entre 6 y 10',
            'category' => 'affectations_number',
            'table' => 'events' ,                    
        ]);

        DB::table('references')->insert([         
            'reference_name' => 'Entre 11 y 20',
            'category' => 'affectations_number',
            'table' => 'events' ,                    
        ]);
        DB::table('references')->insert([         
            'reference_name' => 'Entre 21 y 50',
            'category' => 'affectations_number',
            'table' => 'events' ,                    
        ]);
        DB::table('references')->insert([         
            'reference_name' => 'Entre 51 y 100',
            'category' => 'affectations_number',
            'table' => 'events' ,                    
        ]);

        DB::table('references')->insert([         
            'reference_name' => 'Más de 100',
            'category' => 'affectations_number',
            'table' => 'events' ,                    
        ]);

        DB::table('references')->insert([         
            'reference_name' => 'Ninguno',
            'category' => 'affectations_number',
            'table' => 'events' ,                    
        ]);

//////////////////////////////////////////////////////////////
        DB::table('references_dynamic')->insert([         
            'reference_name' => 'Evento de salud',
            'reference_description' => 'Se trata de eventos de salud publica que afectan a las personas del territorio',
            'category' => 'event_category',
            'table' => 'events',                    
        ]);

        DB::table('references_dynamic')->insert([         
            'reference_name' => 'Evento ambiental',
            'reference_description' => 'Se trata de eventos relacionados a diferentes tipos de riesgos y amenazas de origen natural',
            'category' => 'event_category',
            'table' => 'events',                    
        ]);

        DB::table('references_dynamic')->insert([         
            'reference_name' => 'Evento comunitario',
            'reference_description' => 'Se trata de eventos comunitarios con afectaciones al bienestar colectivo, a las dinámicas sociales y culturales',
            'category' => 'event_category',
            'table' => 'events',                    
        ]);
/*
        DB::table('references_dynamic')->insert([         
            'reference_name' => 'Antrópicos',
            'category' => 'event_category',
            'table' => 'events',                    
        ]);*/

        //////////////////////////////////

        DB::table('event_types')->insert([    
            'event_type_name' => 'Huracan',         
            'event_type_description' => 'Es un problema de vientos fuerte',              
            'category_id'=>1                               
        ]);

        DB::table('event_types')->insert([       
            'event_type_name' => 'VBG', 
            'event_type_description' => 'Es la violencia basada en genero',             
            'category_id'=>2                      
        ]);       

        DB::table('event_types')->insert([    
            'event_type_name' => 'Derrames',         
            'event_type_description' => 'Es un problema riegos de sustancias nocivas para el medio ambiente',              
            'category_id'=>3                               
        ]);

        DB::table('event_types')->insert([    
            'event_type_name' => 'Atentado terrorista',         
            'event_type_description' => 'Es un problema de atentado contra la integridad física de la población cívil',              
            'category_id'=>4                               
        ]);

        ///////////////////////////////////////////////////////////////////////

        DB::table('towns')->insert([       
            
            'town_name' => 'Pasto',
            'department_id' => '2',                             
        ]);

        DB::table('towns')->insert([       
            
            'town_name' => 'Ipiales',
            'department_id' => '2',                             
        ]);

        DB::table('towns')->insert([       
            
            'town_name' => 'Medellin',
            'department_id' => '3',                             
        ]);

        DB::table('towns')->insert([       
            
            'town_name' => 'Bello',
            'department_id' => '3',                             
        ]);
        
    }
}
