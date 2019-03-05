jQuery(document).ready(function ($) {
    //Sticky header 
    jQuery(window).scroll(function($) {            

    var header_ht = jQuery( '.top-nav' ).height();

    if (jQuery(this).scrollTop() > header_ht){          

        jQuery('.hgroup-wrap').addClass('sticky');             

    }else{          

        jQuery('.hgroup-wrap').removeClass('sticky');  
        
    }  
    
});     
});

