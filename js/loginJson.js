$(document).ready(function() {
 $('#formSubmit').on('submit', function(){
        var Username=$('#icon_prefix-2').val();
        var Password=$('#icon_prefix-3').val();
        var Success=false;
        var text='{"usr1":"", "pass1":""}';
        var objct=JSON.parse(text);
        objct.usr1=Username;
        objct.pass1=Password;
            $.ajax({
               url: 'adminLoginProcess.php',
               dataType: 'json',
               type: 'POST',
               data: objct,
               success: function(data){
                   alert(data.result);
                  // console.log(data);
                    //     console.log('hel'+data.result);
                          Success=true;
                         if(data.succes)
                             window.location.href = 'sidebar.php';
               },
               error: function(xhr, textStatus, errorThrown) {
                 // Handle error
                //alert('heyyyo');
                Success = false;
  }
            });
            return Success;
});
});