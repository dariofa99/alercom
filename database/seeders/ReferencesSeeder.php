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
            'reference_name' => 'Aceptado',
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
            'reference_description' => 'Se trata de eventos de riesgos de salud pública que afectan a las personas del territorio a nivel individual y colectivo',
            'category' => 'event_category',
            'table' => 'events',                    
        ]);

        DB::table('references_dynamic')->insert([         
            'reference_name' => 'Evento ambiental',
            'reference_description' => 'Se trata de eventos de riesgos asociados a diferentes tipos de fenómenos de origen natural o antrópico (ocasionados por el hombre).',
            'category' => 'event_category',
            'table' => 'events',                    
        ]);

        DB::table('references_dynamic')->insert([         
            'reference_name' => 'Evento comunitario',
            'reference_description' => 'Se trata de eventos de riesgo comunitario con afectaciones a bienes públicos, daños en infraestructura, animales, así como a las dinámicas del territorio y el bienestar de las comunidades.',
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
            'event_type_name' => 'Vectores (malaria, fiebre amarilla, etc)',         
            'event_type_description' => 'Salud',              
            'category_id'=>1                               
        ]);

        DB::table('event_types')->insert([    
            'event_type_name' => 'Covid 19',         
            'event_type_description' => 'Salud',              
            'category_id'=>1                               
        ]);


        DB::table('event_types')->insert([    
            'event_type_name' => 'Planes de vacunación',         
            'event_type_description' => 'Salud',              
            'category_id'=>1                               
        ]);



        DB::table('event_types')->insert([    
            'event_type_name' => 'Salud Mental y Prevención del suicidio',         
            'event_type_description' => 'Salud',              
            'category_id'=>1                               
        ]);



        DB::table('event_types')->insert([    
            'event_type_name' => 'Seguridad Alimentaria y Nutrición',         
            'event_type_description' => 'Salud',              
            'category_id'=>1                               
        ]);


        DB::table('event_types')->insert([    
            'event_type_name' => 'Sexualidad y Derechos Sexuales y Reproductivos',         
            'event_type_description' => 'Salud',              
            'category_id'=>1                               
        ]);


        DB::table('event_types')->insert([    
            'event_type_name' => 'Salud materna, natal y prenatal ',         
            'event_type_description' => 'Salud',              
            'category_id'=>1                               
        ]);
        
        DB::table('event_types')->insert([    
            'event_type_name' => 'Salud Publica en Emergencias (siniestros y accidentes)',         
            'event_type_description' => 'Salud',              
            'category_id'=>1                               
        ]);
        
        DB::table('event_types')->insert([    
            'event_type_name' => 'Otro',         
            'event_type_description' => 'Salud',              
            'category_id'=>1                               
        ]);


        DB::table('event_types')->insert([       
            'event_type_name' => 'Salud ambiental', 
            'event_type_description' => 'Ambiental',             
            'category_id'=>2                      
        ]);     
        
        DB::table('event_types')->insert([       
            'event_type_name' => 'Huracanes', 
            'event_type_description' => 'Ambiental',             
            'category_id'=>2                      
        ]);    

        DB::table('event_types')->insert([       
            'event_type_name' => 'Vendavales', 
            'event_type_description' => 'Ambiental',             
            'category_id'=>2                      
        ]);    

        DB::table('event_types')->insert([       
            'event_type_name' => 'Descargas eléctricas', 
            'event_type_description' => 'Ambiental',             
            'category_id'=>2                      
        ]);    

        DB::table('event_types')->insert([       
            'event_type_name' => 'Sequías', 
            'event_type_description' => 'Ambiental',             
            'category_id'=>2                      
        ]);    

        DB::table('event_types')->insert([       
            'event_type_name' => 'Inundaciones', 
            'event_type_description' => 'Ambiental',             
            'category_id'=>2                      
        ]);    

        DB::table('event_types')->insert([       
            'event_type_name' => 'Sismos, temblores y terremotos', 
            'event_type_description' => 'Ambiental',             
            'category_id'=>2                      
        ]);    


        DB::table('event_types')->insert([       
            'event_type_name' => 'Tsunami', 
            'event_type_description' => 'Ambiental',             
            'category_id'=>2                      
        ]);    

        DB::table('event_types')->insert([       
            'event_type_name' => 'Maremotos', 
            'event_type_description' => 'Ambiental',             
            'category_id'=>2                      
        ]);    

        DB::table('event_types')->insert([       
            'event_type_name' => 'Deslizamientos y derrumbes', 
            'event_type_description' => 'Ambiental',             
            'category_id'=>2                      
        ]); 

        DB::table('event_types')->insert([       
            'event_type_name' => 'Incendios forestales', 
            'event_type_description' => 'Ambiental',             
            'category_id'=>2                      
        ]); 

        DB::table('event_types')->insert([       
            'event_type_name' => 'Degradación de recursos naturales', 
            'event_type_description' => 'Ambiental',             
            'category_id'=>2                      
        ]); 

        DB::table('event_types')->insert([       
            'event_type_name' => 'Creciente de ríos y mares', 
            'event_type_description' => 'Ambiental',             
            'category_id'=>2                      
        ]); 

        DB::table('event_types')->insert([       
            'event_type_name' => 'Otro', 
            'event_type_description' => 'Ambiental',             
            'category_id'=>2                      
        ]); 


        DB::table('event_types')->insert([    
            'event_type_name' => 'Derrames',         
            'event_type_description' => 'Comunitario',              
            'category_id'=>3                               
        ]);
     
        DB::table('event_types')->insert([    
            'event_type_name' => 'Fugas (gas, combustible, agua, etc)',         
            'event_type_description' => 'Comunitario',              
            'category_id'=>3                               
        ]);
        DB::table('event_types')->insert([    
            'event_type_name' => 'Incendios',         
            'event_type_description' => 'Comunitario',              
            'category_id'=>3                               
        ]);
        DB::table('event_types')->insert([    
            'event_type_name' => 'Explosiones',         
            'event_type_description' => 'Comunitario',              
            'category_id'=>3                               
        ]);
        DB::table('event_types')->insert([    
            'event_type_name' => 'Accidentes en transporte',         
            'event_type_description' => 'Comunitario',              
            'category_id'=>3                               
        ]);
        DB::table('event_types')->insert([    
            'event_type_name' => 'Aglomeraciones de personas',         
            'event_type_description' => 'Comunitario',              
            'category_id'=>3                               
        ]);
        DB::table('event_types')->insert([    
            'event_type_name' => 'Abandono y maltrato animal',         
            'event_type_description' => 'Comunitario',              
            'category_id'=>3                               
        ]);
        DB::table('event_types')->insert([    
            'event_type_name' => 'Daños en infraestructura pública',         
            'event_type_description' => 'Comunitario',              
            'category_id'=>3                               
        ]);
        DB::table('event_types')->insert([    
            'event_type_name' => 'Daños en servicios públicos',         
            'event_type_description' => 'Comunitario',              
            'category_id'=>3                               
        ]);
        DB::table('event_types')->insert([    
            'event_type_name' => 'Convivencia social',         
            'event_type_description' => 'Comunitario',              
            'category_id'=>3                               
        ]);
        DB::table('event_types')->insert([    
            'event_type_name' => 'Violencias Basadas en Género',         
            'event_type_description' => 'Comunitario',              
            'category_id'=>3                               
        ]);
        DB::table('event_types')->insert([    
            'event_type_name' => 'Viviendas en riesgo',         
            'event_type_description' => 'Comunitario',              
            'category_id'=>3                               
        ]);

        DB::table('event_types')->insert([    
            'event_type_name' => 'Otro',         
            'event_type_description' => 'Comunitario',              
            'category_id'=>3                               
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
