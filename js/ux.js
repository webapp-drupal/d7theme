/* UX JS */

/* Page loaded: makes the laoding animation display. So browsers without JS, will not see this */
jQuery(document).ready(function() {


    /* Swiping for next and previous articles (Flippy) */
    function swipeToNextPage(){
      $('ul.flippy li.next a').trigger('click');
    }
    swipeToNextPage();



    /* Date Check The Staggers Section Theming*/
    var d = new Date();
    var curr_hour = d.getHours();   
    if (curr_hour >= 20 || curr_hour < 5)
    {
        //8pm - 5am  Night Time class
        jQuery(".the-staggers").addClass("staggers-night");
    }



        jQuery("body").addClass("loaded");

        /* Page fully loaded: once page is fully loaded, loading animation fades away */
        function delayloading() {
               jQuery("body").addClass("fully-loaded");
        }
        setTimeout(delayloading, 1500);


        
        
         /* Detect Editor's Pick coming into view and display the next article link in the bottom right by adding a class */
         
        // var stickyNavTop3 = jQuery('.article-theme .article-column section p:nth-last-child(5)').offset().top;  
        // var editorspickreached = function(){  
        // var scrollTop3 = jQuery(window).scrollTop();  
        // if (scrollTop3 > stickyNavTop3) {   
            // jQuery('body').addClass('editors-pick-reached');
        // } else {  
            // jQuery('body').removeClass('editors-pick-reached');   
        // }  
        // };
  
        // jQuery(window).scroll(function() {
        // editorspickreached();
        // });

/*Flippy module Alter*/
 jQuery(".region-content ul.flippy li.prev").remove();
 jQuery(".region-content ul.flippy li.next").append("<div class='close-next-article close-toggle'>Close</div>");


});

                               


var closeCheck = 0;
var specVar = 0;

jQuery(function() {
    jQuery(window).bind('scroll', function() {


        if (specVar == 0) {
            /* Add click event tracking to Ad You Like ad in sidebar */
          //  if(document.getElementById('sidebar-second').getElementsByTagName('div')[3].className.match(/\bsecondary-content-box\b/)){} else {
                //    document.getElementById('sidebar-second').getElementsByTagName('div')[3].setAttribute("onClick", "_gaq.push(['_trackEvent', 'Ad You Like','Click', 'Sidebar Ad You Like Left'])");
                //    specVar = 1;
           // }
        }


        var scroll = jQuery(window).scrollTop();
        if (scroll >= 270) { //console.log(scroll);                                             
            jQuery("body").removeClass('site-header-bottom').addClass('site-header-top'); 
            //alert("d");
                //jQuery(".region-content ul.flippy").css("display", "block"); 
                                                
        } else {
            jQuery("body").removeClass('site-header-top').addClass('site-header-bottom');
                       //jQuery(".region-content ul.flippy").css("display", "none");                        
        }
                                
            var div = jQuery(".site-footer");
        if (scroll >= 1000) {   //console.log(scroll);                      
            jQuery("body").removeClass('site-footer-hidden').addClass('site-footer-visible');
        } else{
            jQuery("body").removeClass('site-footer-visible').addClass('site-footer-hidden');
                                }
								
		 if (scroll >= 400) {   //console.log(scroll);                      
            jQuery("body").removeClass('site-sidebar-hidden').addClass('site-sidebar-visible');
        } else{
            jQuery("body").removeClass('site-sidebar-visible').addClass('site-sidebar-hidden');
                                }
       
       if (closeCheck == 0) {             
              // Close next article message toggle
              jQuery(".close-next-article").click(function(){
              jQuery("body").toggleClass("next-article-closed");
              });
              closeCheck = 1;
       }

	   
	   
    });
}());


/* Add home page Staggers night class at night time */
jQuery(function() {


});


/* Reveal menu on mobile phones */
jQuery(".mobile-menu-toggle").click(function(){
jQuery("body").toggleClass("mobile-menu-revealed");
});



/* Reveal menu on tablets */
jQuery(".content-links-toggle").click(function(){
jQuery("body").toggleClass("content-links-revealed");
jQuery("body").removeClass("hover-mega-menu-closed");
});



/* Toggle search form */
jQuery(".search-toggle").click(function(){
jQuery("body").toggleClass("search-form-revealed");
jQuery("body").removeClass("mega-menu-open");
});

/* Search input widened. Toggle class used to make nav links smaller */
jQuery(".site-search input").click(function(){
jQuery("body").toggleClass("search-widened");
});

/* Mega Menu Toggle */
jQuery(".mega-menu-toggle").click(function(){
jQuery("body").toggleClass("mega-menu-open");
});

jQuery( "li.pl" ).append( jQuery( ".politics-mg" ) );
jQuery( "li.cl" ).append( jQuery( ".culture-mg" ) );
jQuery( "li.wl" ).append( jQuery( ".world-mg" ) );
jQuery( "li.sl" ).append( jQuery( ".science_tech-mg" ) );
jQuery( "li.ev" ).append( jQuery( ".event-mg" ) );
  


jQuery( "li.pl" ).hover(
  function() {
	  jQuery("body").removeClass("hover-mega-menu-closed");	  
	  jQuery("body.culture-mg-revealed").removeClass("culture-mg-revealed");
	  jQuery("body.world-mg-revealed").removeClass("world-mg-revealed");
	  jQuery("body.science_tech-mg-revealed").removeClass("science_tech-mg-revealed"); 
  }
);

jQuery( "li.cl" ).hover(
  function() {
	  jQuery("body").removeClass("hover-mega-menu-closed");
	  jQuery("body.politics-mg-revealed").removeClass("politics-mg-revealed");
	  jQuery("body.world-mg-revealed").removeClass("world-mg-revealed");
	  jQuery("body.science_tech-mg-revealed").removeClass("science_tech-mg-revealed");
  }
);

jQuery( "li.wl" ).hover(
  function() {
	  jQuery("body").removeClass("hover-mega-menu-closed");
	  jQuery("body.politics-mg-revealed").removeClass("politics-mg-revealed");
	  jQuery("body.culture-mg-revealed").removeClass("culture-mg-revealed")
	  jQuery("body.science_tech-mg-revealed").removeClass("science_tech-mg-revealed");	  
  }
);

jQuery( "li.sl" ).hover(
  function() {
	  jQuery("body").removeClass("hover-mega-menu-closed");
	  jQuery("body.politics-mg-revealed").removeClass("politics-mg-revealed");
	  jQuery("body.culture-mg-revealed").removeClass("culture-mg-revealed")
	  jQuery("body.world-mg-revealed").removeClass("world-mg-revealed");	  
  }
);

jQuery( ".close-hover-mega-menu" ).click(
  function() {
	  jQuery("body").addClass("hover-mega-menu-closed");
	  jQuery("body.politics-mg-revealed").removeClass("politics-mg-revealed");
	  jQuery("body.culture-mg-revealed").removeClass("culture-mg-revealed")
	  jQuery("body.world-mg-revealed").removeClass("world-mg-revealed");
      jQuery("body.science_tech-mg-revealed").removeClass("science_tech-mg-revealed");
      jQuery("body.mega-menu-open").removeClass("mega-menu-open");
  }
);



/* 
jQuery( "li.fade" ).hover(function() {
  jQuery( this ).fadeOut( 100 );
  jQuery( this ).fadeIn( 500 );
});*/

/* Mega Menu email newsletter extra fields Add */
jQuery(".mega-menu .email").click(function(){
jQuery("body").addClass("reveal-inputs");
});

/* Sub categories drop down toggle */
jQuery(".sub-nav-toggle").click(function(){
jQuery("body").toggleClass("sub-nav-open");
});

/* Author filter reveal on category page */
jQuery(".filter-by h4").click(function(){
jQuery("body").toggleClass("filter-by-open");
});

/* Reveal image toggle (article only)*/
jQuery(".cat-toggle-image").click(function(){
jQuery("body").toggleClass("feature-image-revealed");
});
 
/* Reveal social sharers (article only) */
jQuery(".share-article").click(function(){
jQuery("body").toggleClass("social-sharers-revealed");
});

/* Toggle author social media links (article only) */
jQuery(".author-links p").click(function(){
jQuery("body").toggleClass("author-links-revealed");
});

/* Close marketing pop-up modal */
jQuery(".promo-box .close-toggle").click(function(){
jQuery("body").toggleClass("marketing-box-closed");
});

/* Reveal sidebar */
jQuery(".sidebar-toggle").click(function(){
$(this).text(($(this).text() == 'Less') ? 'More' : 'Less');
jQuery("body").toggleClass("sidebar-revealed");
});

/* Reveal Staggers */
jQuery(".staggers-toggle").click(function(){
jQuery("body").toggleClass("staggers-revealed");
});

/* Reveal email newsletter box */
jQuery(".cat-email-newsletter-toggle").click(function(){
jQuery("body").toggleClass("email-newsletter-revealed");
});

/* Reveal text selection sharers*/
jQuery(".text-selection-sharer").click(function(){ 
jQuery("body").toggleClass("text-selection-sharer-revealed");
}); 

/* Reveal more sharers beneath article */
jQuery(".more-sharers-toggle").click(function(){
jQuery("body").toggleClass("more-sharers-revealed");
});
/* Footer sharers toggle in mobile */
jQuery(".article-footer-sharers h4").click(function(){
jQuery("body").toggleClass("article-footer-sharers-revealed");
});

/* Reveal more footer links in mobile */
jQuery(".footer-links-toggle").click(function(){
jQuery("body").toggleClass("footer-links-revealed");
});

/* Close cookies message toggle */
jQuery(".cookies-close").click(function(){
jQuery("body").toggleClass("cookies-message-closed");
});
  
/* Close filter by author toggle */
jQuery(".filter-by-toggle").click(function(){
jQuery("body").toggleClass("filter-by-open");
});

/* Close dianomi ads bar */
jQuery(".close_iframe").click(function(){
jQuery("body").toggleClass("dianomi-ads-closed");
});
