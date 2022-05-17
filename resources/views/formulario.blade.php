<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form id="formImg" enctype="multipart/form-data">
    <input type="file" name="image_event">
<input type="submit" value="Enviar">
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<script>

(function () {
    $("#formImg").on("submit",function (e) {
        e.preventDefault();
        var data = new FormData(document.getElementById("formImg"));
        updatePhoto(data)
    })

})();

      function updatePhoto(data){
     var route = "/api/v1/events" ;       
      $.ajax({
                  url : route,
                  type: "POST",
                  data : data,
                  contentType: false,
                  cache: false,
                  processData:false,
                  headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Authorization': `Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC8zLjEzNi40Ljg2XC9hcGlcL3YxXC9sb2dpbiIsImlhdCI6MTY1MjY3OTEzNiwiZXhwIjoxNjUyNjgyNzM2LCJuYmYiOjE2NTI2NzkxMzYsImp0aSI6InhodDBuc1VUc1J2WTZaRTYiLCJzdWIiOjEsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.JvSPjKGL1ErvdJCPwmmPPViDw3DavUzYJuAw3L7bxW4`,
                    'Access-Control-Allow-Origin': '*',
                    
                  },
                  xhr: function(){      
                  $("#wait").show()       
                  var xhr = $.ajaxSettings.xhr();                 
                  if (xhr.upload) {
                      xhr.upload.addEventListener('progress', function(event) {
                          var percent = 0;
                          var position = event.loaded || event.position;
                          var total = event.total;
                          if (event.lengthComputable) {
                              percent = Math.ceil(position / total * 100);
                          } 
                          $("#progress_bar").show();
                          $("#progress_bar .progress-bar").css("width", + percent +"%");
                          $("#progress_bar .progress-bar").text(percent +"%"); 
                          if(percent>=100){
                              $("#progress_bar .progress-bar").text("Terminando el proceso..."); 
                          }                       
                      }, true);
                  }
                  return xhr;
              }
          //	mimeType:"multipart/form-data"
          }).done(function(res){ //
              $("#progress_bar").hide(); 
              $("#wait").hide();            
              if(res.isAuth){
                           $(".image_profile").attr('src','/'+res.image);
                         }
                         $("#image_profile").attr('src','/'+res.image);
          });
  
  
   
  }
</script>
</body>
</html>