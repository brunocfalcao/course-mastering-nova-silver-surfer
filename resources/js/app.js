import.meta.glob([
    '../assets/images/**',
    '../assets/favicons/**'
]);

import $ from "jquery";

$(document).ready(function(){
    $('#scroll-button').click(function(){
        let max_scroll = $(document).height() - window.innerHeight;
        let current_scroll = $(document).scrollTop();

        if(max_scroll - current_scroll < 20){
            $("html, body").animate({ scrollTop: 0 }, 400);
        }else{
            $("html, body").animate({ scrollTop: $(document).height() - window.innerHeight }, 400);
        }
    });

    function on_scroll(){
        let max_scroll = $(document).height() - window.innerHeight;
        let current_scroll = $(document).scrollTop();

        if(max_scroll - current_scroll < 20){
            $('#scroll-button svg').addClass('rotate-180');
        }else{
            $('#scroll-button svg').removeClass('rotate-180');
        }
    }

    $(document).on("scroll", on_scroll);
    on_scroll();

    /*
    $('#notify-me-form').submit(function(e){
        $('#notify-me-form').addClass('opacity-0 pointer-events-none');
        $('#notify-me-spinner').removeClass('hidden').addClass('flex');

        setTimeout(function(){
            $('#notify-me-spinner').addClass('hidden').removeClass('flex');

            if(true){
                $('#notify-me-success').removeClass('hidden');
            }else{
                $('#notify-me-error').removeClass('hidden');
                setTimeout(function(){
                    $('#notify-me-error').addClass('hidden');
                    $('#notify-me-form').removeClass('opacity-0 pointer-events-none');
                }, 3000);
            }
        }, 2000);

        e.preventDefault();
        return false;
    });
    */
});
