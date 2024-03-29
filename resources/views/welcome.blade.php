<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
           
             .content {
        height: 100vh;
    }
    
    mat-form-field {
        width: 100%;
    }
    
    .img-responsive {
        width: 100px;
            height:100px;
    }
    
    @media (min-width: 1121px) {
        .img-responsive {
            width: 100px;
            height:100px;
        }
    }
        
        </style>
    </head>
    <body class="antialiased">
        <div class="flex-center position-ref full-height">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-2 mt-1 mb-1 d-none d-md-flex align-items-center text-center justify-content-center flex-wrap">
                        <a href="/"><img class="card-img-top img-responsive" src="{{asset('/dist/img/conect.png')}}" alt="Logo Alianza"></a>
                    </div>
                    <div class="col-12 col-md-10 d-flex align-items-center text-center">
                        <h2 class="pt-3 pb-3 mb-0">Sistema de Atención para detección temprana de Alertas en los departamentos de Nariño y Antioquia</h2>
                    </div>
                </div>
            
                <div class="row pt-3 pb-3" style="background-color: #990099;">
                    <div  class="container d-flex flex-wrap justify-content-center align-items-center">
                        <div class="card m-4">
                            <div class="container p-4 text-center">
                                <div style="text-align: justify;">
                                    <p>
                                        <strong>SOBRE LA APP ALERCOM</strong>
                                    </p>
                                    <p>
                                        <strong> </strong>
                                    </p>
                                    <p>
                                        <strong>POLÍTICA DE PRIVACIDAD</strong>
                                    </p>
                                    <p>
                                        La presente Política de Privacidad establece los términos en que se usa y protege la información que es proporcionada por los usuarios y usuarias al momento de utilizar la aplicación Alercom y el sistema de atención de alertas. PENUD está comprometida
                                        con la seguridad de los datos de sus usuarias/os. Cuando le pedimos llenar los campos de información personal con la cual usted pueda ser identificada/o, lo hacemos asegurando que sólo se empleará de acuerdo con los términos
                                        de este documento y a lo establecido por la normatividad Colombiana vigente al momento de usar la aplicación.
                                    </p>
                                    <p>
                                        Esta Política de Privacidad puede ser modificada o ser actualizada por lo que le recomendamos revisar continuamente esta página para asegurarse que está de acuerdo con dichos cambios.
                                    </p>
                                    <p>
                                        Está aplicación se utilizará bajo los "Términos y Condiciones" que se encuentran a continuación. En caso de no aceptar lo expuesto, no use la plataforma ni sus servicios. Mediante el uso de la plataforma web y la app se deduce su aceptación a estos Términos
                                        y Condiciones.
                                    </p>
                                    <p>
                                        <strong>CONTEXTO</strong>
                                    </p>
                                    <p>
                                        La aplicación llamada Alercom es una herramienta de protección y respuesta rápida en caso de presentarse un evento ambiental, de salud o comunitario que afecte a la población y el medio ambiente. Su uso está disponible para líderes/as comunitarias gestores
                                        en los territorios del bienestar comunitario en el Departamento de Nariño y Antioquia. Lo que busca la aplicación es servir de ayuda frente a escenarios de riesgo y se complementa con el seguimiento del evento reportado para
                                        brindar asesoría y buscar con diferentes entidades solución a la problemática detectada y si es necesario llevar el caso a los entes competentes para facilitar la pronta atención al evento.
                                    </p>
                                    <p>
                                        Ante esto, PENUD no se hace responsable de lo que suceda en cada caso, entendido que está herramienta busca ser un medio para activar directamente su red de apoyo y no a la institucionalidad.
                                    </p>
                                    <p>
                                        <strong>INFORMACIÓN RECOGIDA Y CONSIDERACIONES</strong>
                                    </p>
                                    <p>
                                        Para hacer uso de esta aplicación, se requiere de un previo registro y una validación realizada por medio de correo electrónico.
                                    </p>
                                    <p>
                                        <strong>SOBRE LA APLICACIÓN ALERCOM</strong>
                                    </p>
                                    <p>
                                        • El respeto a su intimidad y privacidad está totalmente garantizado.
                                    </p>
                                    <p>
                                        • Con respecto a la publicación de la app Alercom en la play store, PENUD, es el único responsable de la aplicación y su contenido, No Google; los servicios y responsabilidades por parte de PENUD se aclaran en este documento.
                                    </p>
                                    <p>
                                        • El uso de la aplicación es voluntario.
                                    </p>
                                    <p>
                                        • A través de esta aplicación se recolecta datos personales de las usuarias/os como: Nombre, correo electrónico, número de celular, contraseña, municipio, entre otros.
                                    </p>
                                    <p>
                                        • La aplicación accede a la ubicación real mediante GPS, solo cuando se activa el envío de una alerta.
                                    </p>
                                    <p>
                                        · La aplicación notificara a las entidades cuando se haya verificado la autenticidad del evento.
                                    </p>
                                    <p>
                                        • Al activar una alerta esta queda registrada en los servidores de PENUD, con el único fin de verificar el estado y la relevancia del evento.
                                    </p>
                                    <p>
                                        • Para hacer uso de la aplicación se deberá contar con el consentimiento de uso de los permisos necesarios en el dispositivo.
                                    </p>
                                    <p>
                                        • Esta aplicación se considera de Utilidad, productividad, comunicación u otros.
                                    </p>
                                    <p>
                                        • No contiene material violento.
                                    </p>
                                    <p>
                                        • No contiene material sexual o desnudez.
                                    </p>
                                    <p>
                                        • No contiene algún lenguaje potencialmente ofensivo.
                                    </p>
                                    <p>
                                        • No contiene referencias o representaciones desustancias psicoactivas.
                                    </p>
                                    <p>
                                        • No promociona artículos o actividades que generalmente tienen restricciones de edad, como cigarrillos, alcohol, armas de fuego o juegos de apuestas.
                                    </p>
                                    <p>
                                        • No contiene anuncios.
                                    </p>
                                    <p>
                                        • No se registran direcciones IP.
                                    </p>
                                    <p>
                                        • No se accede a las cuentas de correo electrónico de las/los usuaria/os registrados en la aplicación.
                                    </p>
                                    <p>
                                        • No guarda datos ni seguimiento sobre tiempos y horarios de uso.
                                    </p>
                                    <p>
                                        • La aplicación no guarda información relativa a su dispositivo como por ejemplo fallos de la actividad del sistema, ajustes de hardware, tipo de navegador o idioma del navegador.
                                    </p>
                                    <p>
                                        • La aplicación usa una clasificación de edades apta para todo público.
                                    </p>
                                    <p>
                                        • Mantenimiento y soporte: El desarrollador de la aplicación estará obligado a proporcionar dicho mantenimiento o soporte, no Google.
                                    </p>
                                    <p>
                                        • Cuotas y cargos: cualquier uso de la aplicación es totalmente gratuito.
                                    </p>
                                    <p>
                                        • Cambios en nuestra política de privacidad: nuestra política de privacidad puede cambiar de vez en cuando publicaremos cualquier cambio de la política de privacidad en esta página por lo que debes revisarla periódicamente.
                                    </p>
                                    <p>
                                        • Está aplicación está conectada a la plataforma web.
                                    </p>
                                    <p>
                                        <strong>USO DE LA INFORMACIÓN RECOGIDA</strong>
                                    </p>
                                    <p>
                                        La información solicitada y los permisos requeridos sólo serán utilizados para las funciones de la aplicación Alercom y de la plataforma web.
                                    </p>
                                    <p>
                                        Datos personales:
                                    </p>
                                    <p>
                                        Para acceder a la aplicación y a el sistema se solicitan los datos personales para verificar la autenticidad del evento.
                                    </p>
                                    <p>
                                        Datos de evento registrado:
                                    </p>
                                    <p>
                                        Los datos registrados al enviar una alerta son: fecha, lugar del evento, descripción del evento y personas que se vieron afectadas; dicho registro podrá ser verificado para establecer el estado y la veracidad del evento.
                                    </p>
                                    <p>
                                        PENUD protegerá la información suministrada a esta aplicación y está no será facilitada a terceros, a menos que cuente con autorización expresa del titular de la cuenta, cuando medie una orden judicial o cuando la situación haga parte de las excepciones
                                        presentes en la normatividad Colombia.
                                    </p>
                                    <p>
                                        <strong>COOKIES</strong>
                                    </p>
                                    <p>
                                        La aplicación y el sistema de atención de casos no hacen uso de Cookies para tomar información de las/los usuarias/os ni de su comportamiento, las cookies almacenadas solo son utilizadas para garantizar el correcto funcionamiento del sistema.
                                    </p>
                                    <p>
                                        <strong>ENLACES A TERCEROS</strong>
                                    </p>
                                    <p>
                                        Esta aplicación puede contener enlaces a otros sitios que puedan ser de su interés. Una vez que usted dé clic en estos enlaces y abandone nuestra página, ya no tenemos control sobre el sitio al que es redirigido y por lo tanto no somos responsables de
                                        los términos o privacidad ni de la protección de sus datos en esos otros espacios, ya que estos están sujetos a sus propias políticas de privacidad por lo cual es recomendable que los consulte para confirmar que usted está
                                        de acuerdo con estas.
                                    </p>
                                    <p>
                                        <strong>CONTROL DE SU INFORMACIÓN PERSONAL</strong>
                                    </p>
                                    <p>
                                        En cualquier momento usted puede restringir la recopilación o el uso de la información personal que es proporcionada a nuestro sitio web.
                                    </p>
                                    <p>
                                        Esta compañía no venderá, cederá ni distribuirá la información personal que es recopilada sin su consentimiento, salvo que sea requerido por un juez con una orden judicial.
                                    </p>
                                    <p>
                                        PENUD se reserva el derecho de cambiar los términos de la presente Política de Privacidad en cualquier momento.
                                    </p>
                                    <p>
                                        Está aplicación está conectada directamente con la plataforma web de recepción de alertas, razón por la cual al aceptar está política de privacidad también está aceptando los términos y condiciones de la plataforma web.
                                    </p>
                                    <p>
                                        Si tiene alguna pregunta sobre esta política o desea informar de cualquier violación puede enviar un mensaje al correo electrónico
                                    </p>
                                    <p>
                                        <strong>SOBRE LA PLATAFORMA WEB</strong>
                                    </p>
                                    <p>
                                        Términos y condiciones de uso de la plataforma web para la recepción, atención, remisión, seguimiento de eventos comunitarios
                                    </p>
                                    <p>
                                        Este documento debe ser leído atentamente por parte de las usuarias/os, ya que al registrarse deberá cumplir a cabalidad todos los términos y condiciones presentes.
                                    </p>
                                    <p>
                                        El acceso, participación y uso del Portal es gratuito y está regido por los siguientes términos y condiciones, los cuales se presumen conocidos y aceptados por las y los usuarios(as) (en adelante la Usuaria/o) para el uso y consulta del Portal. Los términos
                                        "usted" o "usuaria/o", hacen referencia a todas las personas naturales o jurídicas o entidades de cualquier naturaleza que accedan a la plataforma web.
                                    </p>
                                    <p>
                                        La plataforma web se utilizará bajo los "Términos y Condiciones" que se encuentran a continuación. En caso de no aceptar lo expuesto, no use la plataforma ni sus servicios. Mediante el uso de la plataforma web se deduce su aceptación a estos Términos
                                        y Condiciones, incluyendo las consecuencias de su uso indebido ocasionadas por las actuaciones que usted realice en ella.
                                    </p>
                                    <p>
                                        Teniendo en cuenta los posibles cambios normativos o de funcionamiento de la plataforma web, PENUD podrá modificar estos Términos y Condiciones. Por ende, se le recomienda revisar periódicamente debido a la obligatoriedad de estos mismos.
                                    </p>
                                    <p>
                                        <strong>Información contenida en el Portal web</strong>
                                    </p>
                                    <p>
                                        <strong> </strong>
                                    </p>
                                    <p>
                                        <strong>1. Declaración de Privacidad</strong>
                                    </p>
                                    <p>
                                        PENUD se compromete con las usuarias y usuarios a velar por su intimidad y privacidad, apegándose al debido proceso y a la legislación colombiana vigente como las disposiciones contenidas en la Ley Estatutaria del Hábeas Data (Ley 1581 de 2012), reglamentada
                                        mediante el decreto 1377 del 2013 y en la Ley de Privacidad o Habeas Data Colombiana (Ley 1266 de 2008), entre otras, con el fin de darle la debida diligencia a la información suministrada por las usuarias y usuarios en la
                                        plataforma web.
                                    </p>
                                    <p>
                                        <strong>2. Recolección de información personal</strong>
                                    </p>
                                    <p>
                                        La plataforma web recolecta información personal de sus usuarias y usuarios como: nombre, dirección de correo electrónico, número telefónico, entre otros; los cuales tienen como fin garantizar el buen seguimiento de cada caso.
                                    </p>
                                    <p>
                                        La usuaria/o reconoce que el ingreso de información personal, lo realiza de manera voluntaria y ante la solicitud de requerimientos específicos para realizar el informe de un evento de salud, ambiental o comunitario o para acceder a sus servicios. La
                                        usuaria/o también comprende que los datos por ella o él consignados harán parte de un archivo y/o base de datos que podrá ser usado por la plataforma para efectos de surtir determinado proceso. La usuaria/o podrá modificar
                                        o actualizar la información suministrada en cualquier momento. Se aconseja mantener actualizada la información.
                                    </p>
                                    <p>
                                        La información personal proporcionada está asegurada por una clave de acceso que sólo conoce la propietaria/o. Por ende, es la única/o responsable de mantener en secreto su clave. Ante esto, PENUD:
                                    </p>
                                    <p>
                                        1. Se compromete a no acceder ni pretender conocer dicha clave.
                                    </p>
                                    <p>
                                        2. No se responsabiliza por consecuencias causadas por terceros al ingresar indebidamente a la base de datos y/o por alguna falla técnica en el funcionamiento y/o conservación de datos en el sistema en cualquiera de los menús de su página web.
                                    </p>
                                    <p>
                                        3. No responderá en ningún caso o circunstancia, por ataques, incidentes, exposición o acceso no autorizado que vayan en contra de la seguridad de su sitio WEB o contra sus sistemas de información y que puedan afectar la integridad, confidencialidad o
                                        autenticidad de la información asociada a los servicios que se ofrece.
                                    </p>
                                    <p>
                                        PENUD, ha implementado todas las medidas de seguridad necesarias para proteger los datos personales que se requieren, con el fin de evitar la pérdida, alteración, mal uso, acceso no autorizado, robo de datos registrados o ataques de terceros. Sin embargo,
                                        teniendo en cuenta que ninguna transmisión de internet es segura absolutamente, usted conoce, asume y acepta el hipotético riesgo que ello implica.
                                    </p>
                                    <p>
                                        <strong>3. Utilización de información personal</strong>
                                    </p>
                                    <p>
                                        PENUD no utilizara, publicará, transferirá, utilizara o divulgará la información brindada mediante la plataforma Web sin autorización previa y expresa de la usuaria/o, excepto en los siguientes casos:
                                    </p>
                                    <p>
                                        1. Ser requerida por orden judicial.
                                    </p>
                                    <p>
                                        2. Colaborar dentro de un proceso judicial realizado dentro del servicio que brinda la plataforma web.
                                    </p>
                                    <p>
                                        3. Cuando sea necesario salvaguardar los derechos de la usuaria/o en casos extremos.
                                    </p>
                                    <p>
                                        <strong>Condiciones de Uso y Participación</strong>
                                    </p>
                                    <p>
                                        <strong>1. Condiciones de Uso</strong>
                                    </p>
                                    <p>
                                        1. Al ingresar a esta plataforma, usted reconoce que PENUD tiene derecho a:
                                    </p>
                                    <p>
                                        a. Modificar los términos y condiciones en cualquier momento sin previo aviso.
                                    </p>
                                    <p>
                                        b. Negar o cancelar el registro de personas, en cualquier momento o por cualquier razón.
                                    </p>
                                    <p>
                                        c. Utilizar información brindada a la plataforma según los términos y condiciones de esta misma.
                                    </p>
                                    <p>
                                        2. La plataforma remitirá información mediante correo electrónico a las entidades correspondientes a casos de eventos de salud, ambientales y comunitarios. Cabe resaltar que esta información se compartirá contando con la respectiva autorización y consentimiento
                                        de la Usuaria (o) para fines jurídicos. Sin embargo, PENUD no se hace responsable por la disponibilidad, trato, administración o acceso a estos mismo. En caso de tener inconveniente en ellos, comuníquese directamente con la
                                        encargada-o de cada entidad.
                                    </p>
                                    <p>
                                        3. PENUD no se hace responsable de fallas o interrupciones que se puedan presentar en el funcionamiento de la plataforma. En caso de tener conocimiento previo de posibles fallas se advertirá con antelación a las usuarias/os.
                                    </p>
                                    <p>
                                        4. PENUD no garantiza ni se hace responsable por la ausencia de virus o cualquier otro elemento que pueda producir alteraciones en el sistema informático (Software y hardware) de la usuaria/o, o en los documentos electrónicos de su sistema informático.
                                    </p>
                                    <p>
                                        5. La usuaria/o reconoce y acepta que las actuaciones que realice mediante la plataforma web son verídicas y se responsabiliza exclusivamente de la información, opinión, acción y omisión que se deriven de su registro y participación en ella.
                                    </p>
                                    <p>
                                        6. La usuaria/o acepta y reconoce que las decisiones que tome a partir de la asesoría jurídica dada desde la plataforma, las toma bajo su voluntad y se hace responsable de las consecuencias que esta le puedan traer. PENUD no se hace responsable de las
                                        decisiones que usted tome.
                                    </p>
                                    <p>
                                        7. La información y los datos personales brindados a la plataforma serán guardados cómo prueba de la existencia de la recepción, sino existe la información necesaria para continuar con el procedimiento, será guardado y se le dará el tratamiento necesario
                                        respetando el derecho a la intimidad y otros relacionados según la norma.
                                    </p>
                                    <p>
                                        <strong> 2. Uso del material</strong>
                                    </p>
                                    <p>
                                        Todo el material presente en la plataforma es de propiedad de las entidades que hacen parte de la alianza mencionada anteriormente y está protegido por las leyes colombianas de derechos de autor como la ley 23 de 1982 y sus modificaciones posteriores,
                                        entre otras según la situación y las leyes aplicables para el caso. Usted puede acceder a este material con fines personales, pero no podrá utilizarlo, difundirlo, modificarlo o venderlo sin autorización expresa y previa; en
                                        caso de hacerlo, estaría infringiendo leyes colombianas.
                                    </p>
                                    <p>
                                        <strong>3. Usos prohibidos de la plataforma web </strong>
                                    </p>
                                    <p>
                                        <strong> </strong>
                                    </p>
                                    <p>
                                        Dentro de la plataforma web se prohíbe:
                                    </p>
                                    <p>
                                        1. Utilizar este medio para publicitar, promocionar o exaltar empresas mercantiles, personas naturales o jurídicas, entre otros.
                                    </p>
                                    <p>
                                        2. Utilizar este medio para agredir, abusar, acosar, amenazar, difamar, calumniar, intimidar, realizar cualquier acción que menoscabe derechos o referirse en términos irrespetuosos a otras usuarias/os, al equipo de trabajo de PENUD y entidades aliadas
                                        o a otras personas naturales o jurídicas que no sean usuarias/os.
                                    </p>
                                    <p>
                                        3. Usar este medio para desarrollar o apoyar actividades ilegales e ilícitas de acuerdo a la legislación colombiana y a la internacional.
                                    </p>
                                    <p>
                                        4. Borrar o modificar información referente a la plataforma sin la previa autorización.
                                    </p>
                                    <p>
                                        5. Interferir o interrumpir el buen funcionamiento de la plataforma.
                                    </p>
                                    <p>
                                        6. Registrar o consignar información falsa, inexacta o incompleta.
                                    </p>
                                    <p>
                                        7. Realizar acciones que violen la privacidad, intimidad o cualquier derecho personal de terceros.
                                    </p>
                                    <p>
                                        8. Compartir o revelar la contraseña de acceso a esta plataforma.
                                    </p>
                                    <p>
                                        9. Violar o intentar violar la seguridad de la plataforma web.
                                    </p>
                                    <p>
                                        10. Interferir o intentar interferir con la atención y procedimientos que se presentan a otros usuarios/as.
                                    </p>
                                    <p>
                                        11. Enviar correos electrónicos, documentos, mensajes o cualquier medio que transmita virus o códigos de naturaleza destructiva.
                                    </p>
                                    <p>
                                        12. En caso de que la violación resulte en responsabilidad civil o penal, PENUD cooperará con cualquier autoridad competente para la debida investigación.
                                    </p>
                                    <p>
                                        <strong>
                                            4. Registro y Participación de la Usuaria/o Al registrarse usted
                                            deberá:
                                        </strong>
                                    </p>
                                    <p>
                                        1. Leer detenidamente los Términos y Condiciones y cualquier otro documento que se presente para su registro a esta plataforma.
                                    </p>
                                    <p>
                                        2. Observar los videos de instrucciones de la plataforma web y su respectivo funcionamiento, enviados por PENUD.
                                    </p>
                                    <p>
                                        3. Responsabilizarse por cualquier actividad que se realice bajo su registro.
                                    </p>
                                    <p>
                                        4. Conservar la confidencialidad de su contraseña. Usted se responsabiliza por el uso de su contraseña y en caso de existir un ingreso o registro no autorizado por usted, deberá notificar de inmediato a PENUD.
                                    </p>
                                    <p>
                                        <strong>Ante estos términos y condiciones las usuarias y usuarios:</strong>
                                    </p>
                                    <p>
                                        1. Reconocen y aceptan que son los únicos responsables por su información, actuación y participación en la plataforma.
                                    </p>
                                    <p>
                                        2. Entienden que PENUD apoyará en la recepción y seguimiento de eventos, pero no será responsable de la duración de las actuaciones ni del trámite que le den las entidades competentes.
                                    </p>
                                    <p>
                                        3. Comprenden que PENUD no se hará responsable de cualquier daño o perjuicio de cualquier naturaleza, que surja a partir de la atención dada por otras entidades o de actuaciones erróneas realizadas por usted.
                                    </p>
                                    <p>
                                        4. Aceptan que PENUD brindará asesoría jurídica mas no representación judicial.
                                    </p>
                                    <p>
                                        5. Se abstendrán de iniciar cualquier acción o reclamación contra la PENUD, derivada o relacionada con información, opinión, mensajes, afectación o cualquier otra acción que genere daño realizada por otra usuaria/o, o un tercero ajeno a PENUD y entidades
                                        aliadas a la plataforma. Usted entiende que, en caso de suceder esta situación, las actuaciones legales se deberán llevar a cabo, en contra del responsable directo.
                                    </p>
                                    <p>
                                        6. No realizar ni ingresar comentarios, mensajes, información, o similares que contengan o promuevan contenido difamatorio, abusivo, discriminatorio, ofensivo, intimidatorio, contrario a la moral, buenas costumbres y orden público, que constituyan violencia,
                                        un delito o la comisión de un delito.
                                    </p>
                                    <p>
                                        <strong>PENUD ante estos términos y condiciones:</strong>
                                    </p>
                                    <p>
                                        1. Pedirá autorización previa, a las entidades competentes, para activar ruta y remitir eventos.
                                    </p>
                                    <p>
                                        2. Mantendrá informado a la usuaria/o de las actuaciones realizadas dentro de su caso.
                                    </p>
                                    <p>
                                        3. Promoverá a través de la plataforma un espacio de comunicación, amigable, pacífico, de confianza y participación, hasta donde la ley lo permite con el fin de brindar un servicio integral.
                                    </p>
                                    <p>
                                        4. No será responsable por modificaciones, errores o alteraciones realizada por las usuarias/os o terceros/as en la información brindada, que desencadene daños o perjuicios de cualquier naturaleza, en las actuaciones adelantadas.
                                    </p>
                                    <p>
                                        5. Está facultada para excluir, eliminar o bloquear a usuarias/os, en caso de considerar a su juicio que la persona no sigue las reglas establecidas en este documento o que no respeten el espacio con sus conductas, mensajes, información y documentos enviados,
                                        entre otros.
                                    </p>
                                    <p>
                                        6. Impone prohibiciones para el buen funcionamiento de la plataforma, sin embargo, no se hará responsable por su cumplimiento.
                                    </p>
                                    <p>
                                        El registro a la plataforma web se podrá dar por terminado en cualquier momento enviando un correo electrónico.
                                    </p>
                                    <p>
                                        Apegándose a la ley Colombiana, en caso de querer ejercer sus derechos de conocimiento, acceso, rectificación, actualización, revocatoria y supresión de sus datos personales; o de presentar consultas, quejas, reclamos o denuncias, puede hacerlo a través
                                        de una solicitud al correo electrónico.
                                    </p>
                                    <p>
                                        Los Términos y Condiciones presentados en el presente, se realizaron de acuerdo a las leyes Colombianas vigentes, por ende si desea adelantar cualquier acción o reclamación, se deberá hacer ante las instancias judiciales de Colombia y de conformidad con
                                        las normas de este país, sin importar que la persona que reclame se encuentre domiciliada/o fuera de este.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <footer class="footer py-2 bg-light d-flex flex-wrap align-items-center justify-content-center">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-lg-12">
                            <div class="row d-flex align-items-center">
                                <div class="col-2"></div>
                                <div class="col-4 d-flex justify-content-end">
                                    <img class="img-thumbnail" style="width: 50%" src="{{asset('dist/img/alianza.png') }}" alt="Logo Alianza " />
                                </div>
                                <div class="col-4 flex justify-content-center">
                                    <img class="img-thumbnail" style="width: 20%" src="{{asset('dist/img/PNUD_azul.png')}} " alt="Logo Alianza " />
                                </div>
                                <div class="col-2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            
       
        </div>
    </body>
</html>
