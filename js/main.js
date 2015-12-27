"use strict";

jQuery(document).ready(function($){

    $('.slider1').bxSlider({
        slideWidth: 200,
        minSlides: 2,
        maxSlides: 2,
        slideMargin: 2,
        auto:true,
        pager:false,
        nextText: '',
        prevText: ''
    });

    // News
    $('.disast').bxSlider({
        speed: 1000,
        moveSlides: 1,
        mode: 'vertical',
        minSlides: 3,
        maxSlides: 3,
        slideMargin: 0,
        auto:false,
        pager:false,
        nextText: '',
        prevText: ''
    });

    // Doctors
    $('.sliding').bxSlider({
        speed: 1000,
        minSlides: 2,
        maxSlides: 2,
        slideMargin: 0,
        auto:false,
        pager:false,
        nextText: '',
        prevText: ''
    });

    // Testimonials
    $('.happy-clients').bxSlider({
        speed: 1000,
        minSlides: 2,
        maxSlides: 2,
        slideMargin: 2,
        auto:true,
        pager:true,
        nextText: '',
        prevText: ''
    });

    $("select").selectbox();

    $('.form_date').datetimepicker({
        todayBtn:  1
    });

    if( $('.about').children('.vc_row-full-width') ){
        $('.vc_row-fluid:nth-last-child(2)').css('margin-bottom','0');
    }

});


