/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 */

jQuery(document).ready(function($) {
    $('#edu-care-layouts-container li label img').click(function(){
        $('#edu-care-layouts-container li').each(function(){
            $(this).find('img').removeClass ('edu-care-sidebar-img-selected') ;
        });
        $(this).addClass ('edu-care-sidebar-img-selected') ;
    });                    
});
