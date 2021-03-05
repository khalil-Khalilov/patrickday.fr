$(function(){
    
    //Btn Dessin
    $('#category-dessin').on('click', function(){
        $('.gallery-container-dessin').removeClass('not_show-container');
        $('.gallery-container-peintures').addClass('not_show-container');
        $('.gallery-container-sculpture').addClass('not_show-container');
        $('.gallery-container-livreObject').addClass('not_show-container');
        $('.gallery-container-video').addClass('not_show-container');


        $('.gallery-img').addClass('animate__animated animate__zoomIn');
    })


    //Btn Peintures
    $('#category-peintures').on('click', function(){
        $('.gallery-container-dessin').addClass('not_show-container');
        $('.gallery-container-peintures').removeClass('not_show-container');
        $('.gallery-container-sculpture').addClass('not_show-container');
        $('.gallery-container-livreObject').addClass('not_show-container');
        $('.gallery-container-video').addClass('not_show-container');


        $('.gallery-img').addClass('animate__animated animate__zoomIn');
    })




    //Btn Sculpture
    $('#category-sculpture').on('click', function(){
        $('.gallery-container-dessin').addClass('not_show-container');
        $('.gallery-container-peintures').addClass('not_show-container');
        $('.gallery-container-sculpture').removeClass('not_show-container');
        $('.gallery-container-livreObject').addClass('not_show-container');
        $('.gallery-container-video').addClass('not_show-container');


        $('.gallery-img').addClass('animate__animated animate__zoomIn');
    })


    //Btn Livre object
    $('#category-livreObject').on('click', function(){
        $('.gallery-container-dessin').addClass('not_show-container');
        $('.gallery-container-peintures').addClass('not_show-container');
        $('.gallery-container-sculpture').addClass('not_show-container');
        $('.gallery-container-livreObject').removeClass('not_show-container');
        $('.gallery-container-video').addClass('not_show-container');


        $('.gallery-img').addClass('animate__animated animate__zoomIn');
    })


    //Btn Videos
    $('#category-videos').on('click', function(){
        $('.gallery-container-dessin').addClass('not_show-container');
        $('.gallery-container-peintures').addClass('not_show-container');
        $('.gallery-container-sculpture').addClass('not_show-container');
        $('.gallery-container-livreObject').addClass('not_show-container');
        $('.gallery-container-video').removeClass('not_show-container');


        $('.gallery-img').addClass('animate__animated animate__zoomIn');
    })
    




    //Btn Modify Password
    $('#btn-modify-password').on('click', function(){
        
        $('.formulaire_modify-password').removeClass('not_show-container');
        $('.add_image').addClass('not_show-container');
        $('.add_video').addClass('not_show-container');
        $('.list_of-images').addClass('not_show-container');
        $('.list_of-video').addClass('not_show-container');
    })

    //Btn ADD img
    $('#btn-add_image').on('click', function(){
    
        $('.formulaire_modify-password').addClass('not_show-container');
        $('.add_image').removeClass('not_show-container');
        $('.add_video').addClass('not_show-container');
        $('.list_of-images').addClass('not_show-container');
        $('.list_of-video').addClass('not_show-container');
    })


    //Btn List of image
    $('#btn-list_of-images').on('click', function(){
        
        $('.formulaire_modify-password').addClass('not_show-container');
        $('.add_image').addClass('not_show-container');
        $('.add_video').addClass('not_show-container');
        $('.list_of-images').removeClass('not_show-container');
        $('.list_of-video').addClass('not_show-container');
    })

    //Btn List of video
    $('#btn-list_of-video').on('click', function(){
        
        $('.formulaire_modify-password').addClass('not_show-container');
        $('.add_image').addClass('not_show-container');
        $('.add_video').addClass('not_show-container');
        $('.list_of-images').addClass('not_show-container');
        $('.list_of-video').removeClass('not_show-container');
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



   /* Scroll horizontal */ 
   $(document).ready(function () {
    if (!$.browser.webkit) {
        $('.Clisteimages').jScrollPane();
    }
});


$('video').attr('controlsList', 'nodownload');

})

