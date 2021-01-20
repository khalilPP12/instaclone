$(document).ready(function(){

    $('#button').click(function(e){
        e.preventDefault()
           $.ajax({
               method:'post',
               url:'/follow',
               headers: {
                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       },
               data:{
                   user_id:$('.hiddenInputFollow').val()
               },
               dataType:'json',
               error:function(XMLHttpRequest, textStatus, errorThrown){
                   if(XMLHttpRequest.statusText=='OK')
                   {
                           isOk(true)
                   }
               },

           })

           function isOk(response)
           {
                if(response)
                {
                    if($('#button').val()=='Se désabonner')
                    {
                        $('#button').val('S\'abooner')
                    }
                   else 
                    {
                       $('#button').val('Se désabonner');

                    }

                }
           }

    })








})