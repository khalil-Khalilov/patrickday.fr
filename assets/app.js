$(function(){
    
    //Btn Dessin
    $('#category-dessin').on('click', function(){
        $('.gallery-container-dessin').removeClass('not_show-container');
        $('.gallery-container-peintures').addClass('not_show-container');
        $('.gallery-container-sculpture').addClass('not_show-container');
        $('.gallery-container-livreObject').addClass('not_show-container');
        $('.gallery-container-video').addClass('not_show-container');


        $('.gallery-img').addClass('animate__animated animate__zoomIn');
    });


    //Btn Peintures
    $('#category-peintures').on('click', function(){
        $('.gallery-container-dessin').addClass('not_show-container');
        $('.gallery-container-peintures').removeClass('not_show-container');
        $('.gallery-container-sculpture').addClass('not_show-container');
        $('.gallery-container-livreObject').addClass('not_show-container');
        $('.gallery-container-video').addClass('not_show-container');


        $('.gallery-img').addClass('animate__animated animate__zoomIn');
    });




    //Btn Sculpture
    $('#category-sculpture').on('click', function(){
        $('.gallery-container-dessin').addClass('not_show-container');
        $('.gallery-container-peintures').addClass('not_show-container');
        $('.gallery-container-sculpture').removeClass('not_show-container');
        $('.gallery-container-livreObject').addClass('not_show-container');
        $('.gallery-container-video').addClass('not_show-container');


        $('.gallery-img').addClass('animate__animated animate__zoomIn');
    });


    //Btn Livre object
    $('#category-livreObject').on('click', function(){
        $('.gallery-container-dessin').addClass('not_show-container');
        $('.gallery-container-peintures').addClass('not_show-container');
        $('.gallery-container-sculpture').addClass('not_show-container');
        $('.gallery-container-livreObject').removeClass('not_show-container');
        $('.gallery-container-video').addClass('not_show-container');


        $('.gallery-img').addClass('animate__animated animate__zoomIn');
    });


    //Btn Videos
    $('#category-videos').on('click', function(){
        $('.gallery-container-dessin').addClass('not_show-container');
        $('.gallery-container-peintures').addClass('not_show-container');
        $('.gallery-container-sculpture').addClass('not_show-container');
        $('.gallery-container-livreObject').addClass('not_show-container');
        $('.gallery-container-video').removeClass('not_show-container');


        $('.gallery-img').addClass('animate__animated animate__zoomIn');
    });


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
    });



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
    };


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
    });


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
   });

   slader();



   /* Scroll horizontal */ 
   $(document).ready(function () {
        if (!$.browser.webkit) {
            $('.Clisteimages').jScrollPane();
        }

        //Empêche l'affichage de button telecharger sur la console de video
        $('video').attr('controlsList', 'nodownload');
    });

    /* Btn Scroll Up */ 
    $(window).scroll(function() {    
        var scrollPosition = $(window).scrollTop();

        if (scrollPosition < 1500) {
            $('.btn_scroll-up').removeClass("animate__animated animate__fadeInRight");
            $('.btn_scroll-up').addClass("animate__animated animate__fadeOutLeft");
        }
        else{
            $('.btn_scroll-up').removeClass("not_show-container");
            $('.btn_scroll-up').removeClass("animate__animated animate__fadeOutLeft");
            $('.btn_scroll-up').addClass("animate__animated animate__fadeInRight");
        }
    });


    /* Btn Scroll DOWN */ 
    $(window).scroll(function() {    
        var scrollPosition = $(window).scrollTop();

        if (scrollPosition > 20550) {
            $('.btn_scroll-down').removeClass("animate__animated animate__fadeInLeft");
            $('.btn_scroll-down').addClass("animate__animated animate__fadeOutRight");
        }
        else{
            $('.btn_scroll-down').removeClass("animate__animated animate__fadeOutRight");
            $('.btn_scroll-down').addClass("animate__animated animate__fadeInLeft");
        }

    });

})

