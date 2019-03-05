$=jQuery;

jQuery( document ).ready(function() {

  jQuery('.main-navigation').meanmenu({
    meanMenuContainer: '.menu-holder',
    meanScreenWidth:"767",
    meanRevealPosition: "right",
  });

  /* for carousel */


  $('#header-slider').owlCarousel({
    autoplay: true,
    slideSpeed: edu_care_script_vars.slideSpeed,
    autoplayTimeout: edu_care_script_vars.autoplayTimeout,
    loop:true,
    margin:0,
    nav:false,
    dots:true,
    responsive:{
      0:{
        items:1
      },
      600:{
        items:1
      },
      1000:{
        items:1
      }
    }
  })


  $('#courses').owlCarousel({
    autoplay:true,
    nav: true,
    dots:false,
    responsive: {
      0: {
        items: 1,
        nav:true,
        loop:true,
      },
      600: {
        items: 2,
        nav:true,
        loop:true,
      },
      1000: {
        items: 3,
        nav:true,
        loop: $('#courses .item').size() > 3 ? true:false,
      }
    }
  });

  $('#event').owlCarousel({

    loop:true,
    margin:0,
    nav:true,
    dots:false,
    responsive:{
      0:{
        items:1
      },
      600:{
        items:1
      },
      1000:{
        items:1
      }
    }
  })
  
  /*---------- search js ----------------*/

  $(function(){
    var $searchlink = $('#searchtoggl span.fa');
    var $searchbar  = $('#searchbar');

    $('#search-bar a span.fa').on('click', function(e){

      e.preventDefault();
      if($(this).closest('a').attr('id') == 'searchtoggl') {
        if(!$searchbar.hasClass("toggle-bar")) { 
        // if invisible we switch the icon to appear collapsable
        $searchlink.removeClass('fa-search').addClass('fa-times');
      } else {
        // if visible we switch the icon to appear as a toggle
        $searchlink.removeClass('fa-times').addClass('fa-search');
      }
      $searchbar.toggleClass('toggle-bar');
      //$searchbar.slideToggle(100, function(){
        // callback after search bar animation
      //});
    }
  });

    $('#search-form').submit(function(e){
    e.preventDefault(); // stop form submission
  });
  });


  /* back-to-top button*/

  $('.back-to-top').hide();
  $('.back-to-top').on("click",function(e) {
   e.preventDefault();
   $('html, body').animate({ scrollTop: 0 }, 'slow');
 });

  $(window).scroll(function(){
    var scrollheight =250;
    if( $(window).scrollTop() > scrollheight ) {
     $('.back-to-top').fadeIn();

   }
   else {
    $('.back-to-top').fadeOut();
  }
});


});
