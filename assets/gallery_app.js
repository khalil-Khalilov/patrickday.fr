$(function(){

    //Btn Dessin
    $('#category-dessin').on('click', function(){
        $('.gallery-container-dessin').removeClass('not_show-container');
        $('.gallery-container-peintures').addClass('not_show-container');

        $('.gallery-img').addClass('animate__animated animate__zoomIn');
    })


    //Btn Peintures
    $('#category-peintures').on('click', function(){
        $('.gallery-container-peintures').removeClass('not_show-container');
        $('.gallery-container-dessin').addClass('not_show-container');


        $('.gallery-img').addClass('animate__animated animate__zoomIn');
    })

    //Function d'affichage d'image en click
    $('img').each(function(){

        $(this).on('click', function(){

            var imagePresent = $(this).attr('src');
            var altPresent = $(this).attr('alt');

            $('#myModal').css('display', 'block');

            $('#ModalImg').attr('src', imagePresent);
            $('#caption').text(altPresent);
        })

        $('span').on('click', function(){
            $('#myModal').css('display', 'none');
        })
    })






    /* Carousel */
    $('#carousel img').eq(0).css('display', 'block');

    dernierImage = $('#carousel img').length -1;

    var i = 0;

   

    function slader(){
        setTimeout(function(){

            if(i == dernierImage){
            i = 0;
            }
            else{
            i++;
            }

            $('#carousel img').css('display', 'none');
            $('#carousel img').eq(i).css('display', 'block');

            console.log(i);
            slader();
        }, 4500)
    }


    $('.next').on('click', function(){

        i++;

        if(i <= dernierImage){
            $('#carousel img').css('display', 'none');
            $('#carousel img').eq(i).css('display', 'block');
        }
        else{
            i = 0;
            $('#carousel img').css('display', 'none');
            $('#carousel img').eq(i).css('display', 'block');
        }

        console.log(i);
    })


   $('.prev').on('click', function(){

      i--;

      if(i < 0){
         i = dernierImage;

         $('#carousel img').css('display', 'none');
         $('#carousel img').eq(i).css('display', 'block');
      }
      else{
         
         $('#carousel img').css('display', 'none');
         $('#carousel img').eq(i).css('display', 'block');
      }
      
      console.log(i);
   })

   slader();

})

