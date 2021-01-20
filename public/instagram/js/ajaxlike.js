$(document).ready(function(){
    $('.photo__icons').click(function(e){

          var id=$(this).find('input').attr('value') // find hidden input and get id from each one
           $.ajax({
               method:'post',
               url:'/like',
               headers: {
                           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                       },
               data:{
                   post_id:id
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
                    if(e.target.className=='fa fa-heart')
                    {
                         e.target.outerHTML='<i style="color:rgb(0, 0, 0);cursor:pointer;font-size:24px;margin-right:10px" class="fa fa-heart-o" aria-hidden="true" ></i>';

                    }
                    else {

                        e.target.outerHTML='<i style="color:red;cursor:pointer;font-size:24px;margin-right:10px" class="fa fa-heart" aria-hidden="true" ></i>';

                    }

                }
           }
           isOk()

    })

})