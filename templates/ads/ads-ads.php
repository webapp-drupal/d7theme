<!-- Infinite Ad Serving -->

<?php

//section targeting for all the sub-categories of politics, culture, word and sci-tech

 if(arg(0) == 'taxonomy') { 
    if(arg(1) == 'term') {

       //politics sub-categories           
      if(arg(2) == '8332'){$section = 'sport';}
      if(arg(2) == '8367'){$section = 'devolution';}
      if(arg(2) == '8366'){$section = 'feminism';}
      if(arg(2) == '8328'){$section = 'economy';}
      if(arg(2) == '8297'){$section = 'education';}
      if(arg(2) == '8329'){$section = 'energy';}
      if(arg(2) == '8296'){$section = 'health';}
      if(arg(2) == '8275'){$section = 'uk';}
      if(arg(2) == '8298'){$section = 'welfare';}
      if(arg(2) == '8269'){$section = 'business';}
      if(arg(2) == '8270'){$section = 'elections';}
      if(arg(2) == '8273'){$section = 'religion';} 
      if(arg(2) == '8272'){$section = 'media';}
       
       //culture sub-categories           
      if(arg(2) == '8278'){$section = 'art-design';}
      if(arg(2) == '8368'){$section = 'cartoons';}
      if(arg(2) == '8305'){$section = 'fiction';}
      if(arg(2) == '8299'){$section = 'nature';}
      if(arg(2) == '8330'){$section = 'observations';}
      if(arg(2) == '8304'){$section = 'poetry';}
      if(arg(2) == '8279'){$section = 'books';}
      if(arg(2) == '8285'){$section = 'cultural-capital';}
      if(arg(2) == '8280'){$section = 'film';}
      if(arg(2) == '8284'){$section = 'food-drink';}
      if(arg(2) == '8282'){$section = 'music-theatre';}
      if(arg(2) == '8283'){$section = 'tv-radio';} 
      if(arg(2) == '8331'){$section = 'games';}

       //world sub-categories           
      if(arg(2) == '8321'){$section = 'middle-east';}
      if(arg(2) == '8324'){$section = 'north-america';}
      if(arg(2) == '8325'){$section = 'south-america';}
      if(arg(2) == '8323'){$section = 'europe';}
      if(arg(2) == '8326'){$section = 'africa';}
      if(arg(2) == '8322'){$section = 'asia';}
      if(arg(2) == '8327'){$section = 'australia';}

       //sci_tech sub-categories           
      if(arg(2) == '8362'){$section = 'social-media';}
      if(arg(2) == '8363'){$section = 'privacy';}
      if(arg(2) == '8365'){$section = 'future-proof';}
      if(arg(2) == '8364'){$section = 'security';}
      if(arg(2) == '8301'){$section = 'space';}
      if(arg(2) == '8303'){$section = 'internet';}
      if(arg(2) == '8302'){$section = 'technology';}
              
      }
    }
  //Change section for 1 article
  if (arg(0) == 'node' && arg(1) == '302005') {
   $section = 'artemis';
  }



$article_type=0;

  if ($node = menu_get_object()) {
  // Get the nid
  //echo $nid = $node->nid;
 //  var_dump($node );

   $node->type;

   if($node->type=="longread"){
    $article_type=1;
   }
}

$article_type;

?>

<script type='text/javascript'>

jQuery(document).ready(function() {

var first1=0;
var first2=0;
var first3=0;
var first4=0;
var first5=0;
var first6=0;

var article_type=<?php echo $article_type;?>


//alert(article_type);

    //Load the second article onlym when you get to the bottom of the first.
    jQuery(window).bind('scroll', function() {




function detectmob() { 
 if( navigator.userAgent.match(/Android/i)
 || navigator.userAgent.match(/webOS/i)
 || navigator.userAgent.match(/iPhone/i)
 || navigator.userAgent.match(/iPad/i)
 || navigator.userAgent.match(/iPod/i)
 || navigator.userAgent.match(/BlackBerry/i)
 || navigator.userAgent.match(/Windows Phone/i)
 ){
    return true;
  }
 else {
    return false;
  }
}



detectmobvalue=detectmob();     


      if(detectmobvalue===false && article_type==0){

        // Desktop Ads

       //alert ('not mobile'); 

       // console.log('not mobile');
      
        jQuery('.article-mpu-1').each(function() {

            var count2 = jQuery("#container").find('.article-mpu-1').length;
            count2 -= 1;


            for (b = 0; b <= count2; b++) {

                var element = jQuery(".article-mpu-1").eq(b);

                var topOfElement = element.offset().top;
                var bottomOfElement = element.offset().top + element.outerHeight(true);

                var scrollTopPosition = jQuery(window).scrollTop() + $(window).height();
                var windowScrollTop = jQuery(window).scrollTop()

                if (windowScrollTop > topOfElement && windowScrollTop < bottomOfElement) {
                    // Element is partially visible (above viewable area)
                     console.log("article-mpu-1"+(b)+" is partially visible (above viewable area)");


                    if (element.hasClass("Added") || b == 0) {
                        if(b == 0){
                           jQuery(".article-mpu-1").eq(1).empty();
                           jQuery(".article-mpu-1").eq(1).removeClass("Added");


                           jQuery(".article-mpu-2").eq(1).empty();
                           jQuery(".article-mpu-2").eq(1).removeClass("Added");

                           jQuery(".article-mpu-3").eq(1).empty();
                           jQuery(".article-mpu-3").eq(1).removeClass("Added");

                           jQuery(".article-mpu-4").eq(1).empty();
                           jQuery(".article-mpu-4").eq(1).removeClass("Added");


                           jQuery(".article-mpu-5").eq(1).empty();
                           jQuery(".article-mpu-5").eq(1).removeClass("Added");

                           jQuery(".video-inread").eq(1).empty();
                           jQuery(".video-inread").eq(1).removeClass("Added");


                           jQuery(".bottom-leaderboard-section").eq(1).empty();
                           jQuery(".bottom-leaderboard-section").eq(1).removeClass("Added");



                        }


                    } else {
                        
                        console.log('removed all ads');
 
                          // Cleaning ads 
                         jQuery(".article-mpu-1").empty();
                         jQuery(".article-mpu-1").removeClass("Added");

                         jQuery(".article-mpu-2").empty();
                         jQuery(".article-mpu-2").removeClass("Added");

                         jQuery(".article-mpu-3").empty();
                         jQuery(".article-mpu-3").removeClass("Added");

                         jQuery(".article-mpu-5").empty();
                         jQuery(".article-mpu-5").removeClass("Added");


                        jQuery(".video-inread").empty();
                        jQuery(".video-inread").removeClass("Added");

                        jQuery(".bottom-leaderboard-section").empty();
                        jQuery(".bottom-leaderboard-section").removeClass("Added");

                        
                        
                        element.append("<div id='Unit2'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('Unit2'); });<\/script><\/div>");
                        jQuery(".article-mpu-2").last().append("<div id='Unit3'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('Unit3'); });<\/script><\/div>");
                        jQuery(".article-mpu-3").last().append("<div id='Unit4'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('Unit4'); });<\/script><\/div>");
                        jQuery(".article-mpu-5").last().append("<div id='Unit6'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('Unit6'); });<\/script><\/div>");
                        jQuery(".video-inread").last().append("<div id='1x3'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('1x3'); });<\/script><\/div>");
                        jQuery(".bottom-leaderboard-section").last().append("<div id='Unit5'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('Unit5'); });<\/script><\/div>");
                        if (b != 0) {

                            streamamp.refreshBids("Unit2");
                            streamamp.refreshBids("Unit3");
                            streamamp.refreshBids("Unit4");
                            streamamp.refreshBids("Unit5");
                            streamamp.refreshBids("Unit6");
                            streamamp.refreshBids("1x3");

                            

                        }
                        //first1++;


                        element.addClass("Added");
                        jQuery(".article-mpu-2").last().addClass("Added");
                        jQuery(".article-mpu-3").last().addClass("Added");
                        jQuery(".article-mpu-5").last().addClass("Added");
                        jQuery(".video-inread").last().addClass("Added");
                        jQuery(".bottom-leaderboard-section").last().addClass("Added");

                         // alert('added all ads');
                         console.log('article-mpu-2'+b); 
                         console.log('added all ads'); 
                    }

                

                } else if (windowScrollTop > bottomOfElement && windowScrollTop > topOfElement) {
                    // Element is hidden (above viewable area)
                    //   console.log("Element is hidden (above viewable area)");

                    //jQuery(".article-mpu-1").eq(b).empty();
                   // jQuery(".article-mpu-1").eq(b).removeClass("Added");

                } else if (scrollTopPosition < topOfElement && scrollTopPosition < bottomOfElement) {
                    // Element is hidden (below viewable area)
                    // console.log("Element is hidden (below viewable area)");

                   // jQuery(".article-mpu-1").eq(b).empty();
                   // jQuery(".article-mpu-1").eq(b).removeClass("Added");


                } else if (scrollTopPosition < bottomOfElement && scrollTopPosition > topOfElement) {
                    // Element is partially visible (below viewable area)
                    //console.log("Element is partially visible (below viewable area)");

                } else {
                    // Element is completely visible
                    //console.log("Element is completely visible");

                     console.log("article-mpu-1"+(b)+" is completely visible (above viewable area)");

                    if (element.hasClass("Added") || b == 0) {
                        if(b == 0){
                           jQuery(".article-mpu-1").eq(1).empty();
                           jQuery(".article-mpu-1").eq(1).removeClass("Added");


                           jQuery(".article-mpu-2").eq(1).empty();
                           jQuery(".article-mpu-2").eq(1).removeClass("Added");

                           jQuery(".article-mpu-3").eq(1).empty();
                           jQuery(".article-mpu-3").eq(1).removeClass("Added");

                           jQuery(".article-mpu-4").eq(1).empty();
                           jQuery(".article-mpu-4").eq(1).removeClass("Added");


                           jQuery(".article-mpu-5").eq(1).empty();
                           jQuery(".article-mpu-5").eq(1).removeClass("Added");

                           jQuery(".video-inread").eq(1).empty();
                           jQuery(".video-inread").eq(1).removeClass("Added");


                           jQuery(".bottom-leaderboard-section").eq(1).empty();
                           jQuery(".bottom-leaderboard-section").eq(1).removeClass("Added");

                            

                        }


                    } else {
                        
                        console.log('removed all ads');
 
                          // Cleaning ads 
                         jQuery(".article-mpu-1").empty();
                         jQuery(".article-mpu-1").removeClass("Added");

                         jQuery(".article-mpu-2").empty();
                         jQuery(".article-mpu-2").removeClass("Added");

                         jQuery(".article-mpu-3").empty();
                         jQuery(".article-mpu-3").removeClass("Added");

                         jQuery(".article-mpu-5").empty();
                         jQuery(".article-mpu-5").removeClass("Added");


                        jQuery(".video-inread").empty();
                        jQuery(".video-inread").removeClass("Added");

                        jQuery(".bottom-leaderboard-section").empty();
                        jQuery(".bottom-leaderboard-section").removeClass("Added");

                        
                        
                        element.append("<div id='Unit2'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('Unit2'); });<\/script><\/div>");
                        jQuery(".article-mpu-2").last().append("<div id='Unit3'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('Unit3'); });<\/script><\/div>");
                        jQuery(".article-mpu-3").last().append("<div id='Unit4'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('Unit4'); });<\/script><\/div>");
                        jQuery(".article-mpu-5").last().append("<div id='Unit6'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('Unit6'); });<\/script><\/div>");
                        jQuery(".video-inread").last().append("<div id='1x3'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('1x3'); });<\/script><\/div>");
                        jQuery(".bottom-leaderboard-section").eq(b).append("<div id='Unit5'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('Unit5'); });<\/script><\/div>");
                        if (b != 0) {

                            streamamp.refreshBids("Unit2");
                            streamamp.refreshBids("Unit3");
                            streamamp.refreshBids("Unit4");
                            streamamp.refreshBids("Unit5");
                            streamamp.refreshBids("Unit6");
                            streamamp.refreshBids("1x3");

                            

                        }
                        //first1++;


                        element.addClass("Added");
                        jQuery(".article-mpu-2").last().addClass("Added");
                        jQuery(".article-mpu-3").last().addClass("Added");
                        jQuery(".article-mpu-5").last().addClass("Added");
                        jQuery(".video-inread").last().addClass("Added");
                        jQuery(".bottom-leaderboard-section").last().addClass("Added");

                         // alert('added all ads');
                         console.log('article-mpu-2'+b); 
                         console.log('added all ads'); 
                    }


                }

            }

        });

    


  }else if(detectmobvalue===true){


////////alert('mobile');
 console.log('mobile');
/// Mobile ADs

  jQuery('.title.inf_class').each(function() {

            var count2 = jQuery(".html").find('.title.inf_class').length;
            count2 -= 1;

            console.log(count2);


            for (b = 0; b <= count2; b++) {

                var element = jQuery(".title.inf_class").eq(b);

                var topOfElement = element.offset().top;
                var bottomOfElement = element.offset().top + element.outerHeight(true);

                var scrollTopPosition = jQuery(window).scrollTop() + $(window).height();
                var windowScrollTop = jQuery(window).scrollTop()

                if (windowScrollTop > topOfElement && windowScrollTop < bottomOfElement) {
                    // Element is partially visible (above viewable area) 
                     console.log("Element is partially visible (above viewable area)");


                      if (jQuery(".article-mpu-5").last().hasClass("Added")  || b == 0) {
                        if(b == 0){

                          //streamamp.refreshBids("Unit2");

                           jQuery(".article-mpu-5").eq(1).empty();
                           jQuery(".article-mpu-5").eq(1).removeClass("Added");


                           jQuery(".article-mpu-51").eq(1).empty();
                           jQuery(".article-mpu-51").eq(1).removeClass("Added");

                           jQuery(".article-mpu-52").eq(1).empty();
                           jQuery(".article-mpu-52").eq(1).removeClass("Added");

                           jQuery(".video-inread").eq(1).empty();
                           jQuery(".video-inread").eq(1).removeClass("Added");


                           jQuery(".video-inread1").eq(1).empty();
                           jQuery(".video-inread1").eq(1).removeClass("Added");

                           jQuery(".video-inread2").eq(1).empty();
                           jQuery(".video-inread2").eq(1).removeClass("Added");


                           jQuery(".bottom-leaderboard-section").eq(1).empty();
                           jQuery(".bottom-leaderboard-section").eq(1).removeClass("Added");

                        }


                   } else {

                        
                        console.log('removed all ads');

                          // Cleaning ads  
                        jQuery(".article-mpu-5").empty();
                        jQuery(".article-mpu-5").removeClass("Added");

                        jQuery(".article-mpu-51").empty();
                        jQuery(".article-mpu-51").removeClass("Added");

                        jQuery(".article-mpu-52").empty();
                        jQuery(".article-mpu-52").removeClass("Added");

                        jQuery(".video-inread").empty();
                        jQuery(".video-inread").removeClass("Added");

                        jQuery(".video-inread1").empty();
                        jQuery(".video-inread1").removeClass("Added");


                        jQuery(".video-inread2").empty();
                        jQuery(".video-inread2").removeClass("Added");

                        jQuery(".bottom-leaderboard-section").empty();
                        jQuery(".bottom-leaderboard-section").removeClass("Added");


                        
                        jQuery(".article-mpu-5").last().append("<div id='Unit3' class='sidebarad" + b + "'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('Unit3'); });<\/script><\/div>");
                        jQuery(".article-mpu-51").last().append("<div id='Unit4' class='sidebarad" + b + "'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('Unit4'); });<\/script><\/div>");
                        jQuery(".article-mpu-52").last().append("<div id='Unit2' class='sidebarad" + b + "'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('Unit2'); });<\/script><\/div>");
                        jQuery(".video-inread").last().append("<div id='1x3'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('1x3'); });<\/script><\/div>");
                        jQuery(".video-inread1").eq(b).append("<div id='1x1'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('1x1'); });<\/script><\/div>");
                        jQuery(".video-inread2").eq(b).append("<div id='1x2'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('1x2'); });<\/script><\/div>");
                        jQuery(".bottom-leaderboard-section").last().append("<div id='Unit5'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('Unit5'); });<\/script><\/div>");


                       if (b != 0) {

                            streamamp.refreshBids("Unit2");
                            streamamp.refreshBids("Unit3");
                            streamamp.refreshBids("Unit4");
                            streamamp.refreshBids("1x3");
                            streamamp.refreshBids("1x2");
                            streamamp.refreshBids("1x1");
                            streamamp.refreshBids("Unit5");

                        }
                     


                        jQuery(".article-mpu-5").last().addClass("Added");
                        jQuery(".article-mpu-51").last().addClass("Added");
                        jQuery(".article-mpu-52").last().addClass("Added");
                        jQuery(".video-inread").last().addClass("Added");
                        jQuery(".video-inread1").last().addClass("Added");
                        jQuery(".video-inread2").last().addClass("Added");
                        jQuery(".bottom-leaderboard-section").last().addClass("Added");

                         // alert('added all ads');
                          console.log('added all ads'); 
                    }

                

                } else if (windowScrollTop > bottomOfElement && windowScrollTop > topOfElement) {
                    // Element is hidden (above viewable area)
                    //   console.log("Element is hidden (above viewable area)");

                    //jQuery(".article-mpu-1").eq(b).empty();
                   // jQuery(".article-mpu-1").eq(b).removeClass("Added");

                } else if (scrollTopPosition < topOfElement && scrollTopPosition < bottomOfElement) {
                    // Element is hidden (below viewable area)
                    // console.log("Element is hidden (below viewable area)");

                   // jQuery(".article-mpu-1").eq(b).empty();
                   // jQuery(".article-mpu-1").eq(b).removeClass("Added");


                } else if (scrollTopPosition < bottomOfElement && scrollTopPosition > topOfElement) {
                    // Element is partially visible (below viewable area)
                    //console.log("Element is partially visible (below viewable area)");

                } else {
                	
                    // Element is completely visible
                    console.log("Element is completely visible");

                      if (jQuery(".article-mpu-5").last().hasClass("Added") || b == 0) {
                        if(b == 0){


                           jQuery(".article-mpu-5").eq(1).empty();
                           jQuery(".article-mpu-5").eq(1).removeClass("Added");


                           jQuery(".article-mpu-51").eq(1).empty();
                           jQuery(".article-mpu-51").eq(1).removeClass("Added");

                           jQuery(".article-mpu-52").eq(1).empty();
                           jQuery(".article-mpu-52").eq(1).removeClass("Added");

                           jQuery(".video-inread").eq(1).empty();
                           jQuery(".video-inread").eq(1).removeClass("Added");


                           jQuery(".video-inread1").eq(1).empty();
                           jQuery(".video-inread1").eq(1).removeClass("Added");

                           jQuery(".video-inread2").eq(1).empty();
                           jQuery(".video-inread2").eq(1).removeClass("Added");


                           jQuery(".bottom-leaderboard-section").eq(1).empty();
                           jQuery(".bottom-leaderboard-section").eq(1).removeClass("Added");

                        }


                    } else { 

                        
                        console.log('removed all ads');

                          // Cleaning ads  
                        jQuery(".article-mpu-5").empty();
                        jQuery(".article-mpu-5").removeClass("Added");

                        jQuery(".article-mpu-51").empty();
                        jQuery(".article-mpu-51").removeClass("Added");

                        jQuery(".article-mpu-52").empty();
                        jQuery(".article-mpu-52").removeClass("Added");

                        jQuery(".video-inread").empty();
                        jQuery(".video-inread").removeClass("Added");

                        jQuery(".video-inread1").empty();
                        jQuery(".video-inread1").removeClass("Added");


                        jQuery(".video-inread2").empty();
                        jQuery(".video-inread2").removeClass("Added");

                        jQuery(".bottom-leaderboard-section").empty();
                        jQuery(".bottom-leaderboard-section").removeClass("Added");


                        
                        jQuery(".article-mpu-5").last().append("<div id='Unit3' class='sidebarad" + b + "'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('Unit3'); });<\/script><\/div>");
                        jQuery(".article-mpu-51").last().append("<div id='Unit4' class='sidebarad" + b + "'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('Unit4'); });<\/script><\/div>");
                        jQuery(".article-mpu-52").last().append("<div id='Unit2' class='sidebarad" + b + "'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('Unit2'); });<\/script><\/div>");
                        jQuery(".video-inread").last().append("<div id='1x3'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('1x3'); });<\/script><\/div>");
                        jQuery(".video-inread1").eq(b).append("<div id='1x1'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('1x1'); });<\/script><\/div>");
                        jQuery(".video-inread2").eq(b).append("<div id='1x2'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('1x2'); });<\/script><\/div>");
                        jQuery(".bottom-leaderboard-section").last().append("<div id='Unit5'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('Unit5'); });<\/script><\/div>");


                       if (b != 0) {

                            streamamp.refreshBids("Unit2");
                            streamamp.refreshBids("Unit3");
                            streamamp.refreshBids("Unit4");
                            streamamp.refreshBids("1x3");
                            streamamp.refreshBids("1x2");
                            streamamp.refreshBids("1x1");
                            streamamp.refreshBids("Unit5");

                        }
                     


                        jQuery(".article-mpu-5").last().addClass("Added");
                        jQuery(".article-mpu-51").last().addClass("Added");
                        jQuery(".article-mpu-52").last().addClass("Added");
                        jQuery(".video-inread").last().addClass("Added");
                        jQuery(".video-inread1").last().addClass("Added");
                        jQuery(".video-inread2").last().addClass("Added");
                        jQuery(".bottom-leaderboard-section").last().addClass("Added");

                         // alert('added all ads');
                          console.log('added all ads'); 
                    }
                }

            }

        });


  }else if(detectmobvalue===false && article_type==1){


      //alert('long read');
      console.log("long read");


        jQuery('.title.inf_class').each(function() {

            var count2 = jQuery(".html").find('.title.inf_class').length;
            count2 -= 1;

            console.log(count2);


            for (b = 0; b <= count2; b++) {

                var element = jQuery(".title.inf_class").eq(b);

                var topOfElement = element.offset().top;
                var bottomOfElement = element.offset().top + element.outerHeight(true);

                var scrollTopPosition = jQuery(window).scrollTop() + $(window).height();
                var windowScrollTop = jQuery(window).scrollTop()

                if (windowScrollTop > topOfElement && windowScrollTop < bottomOfElement) {
                    // Element is partially visible (above viewable area)
                     console.log("Element is partially visible (above viewable area)");


                      if (jQuery(".article-mpu-5").eq(b).hasClass("Added") || jQuery(".article-mpu-51").eq(b).hasClass("Added")  || b == 0) {
                        if(b == 0){
                           jQuery(".article-mpu-5").eq(1).empty();
                           jQuery(".article-mpu-5").eq(1).removeClass("Added");


                           jQuery(".article-mpu-51").eq(1).empty();
                           jQuery(".article-mpu-51").eq(1).removeClass("Added");

                           jQuery(".article-mpu-52").eq(1).empty();
                           jQuery(".article-mpu-52").eq(1).removeClass("Added");

                           jQuery(".video-inread").eq(1).empty();
                           jQuery(".video-inread").eq(1).removeClass("Added");


                           jQuery(".video-inread1").eq(1).empty();
                           jQuery(".video-inread1").eq(1).removeClass("Added");

                           jQuery(".video-inread2").eq(1).empty();
                           jQuery(".video-inread2").eq(1).removeClass("Added");


                           jQuery(".bottom-leaderboard-section").eq(1).empty();
                           jQuery(".bottom-leaderboard-section").eq(1).removeClass("Added");

                        }


                    } else {

                        
                        console.log('removed all ads');

                          // Cleaning ads  
                        jQuery(".article-mpu-5").empty();
                        jQuery(".article-mpu-5").removeClass("Added");

                        jQuery(".article-mpu-51").empty();
                        jQuery(".article-mpu-51").removeClass("Added");

                        jQuery(".article-mpu-52").empty();
                        jQuery(".article-mpu-52").removeClass("Added");

                        jQuery(".video-inread").empty();
                        jQuery(".video-inread").removeClass("Added");

                        jQuery(".video-inread1").empty();
                        jQuery(".video-inread1").removeClass("Added");


                        jQuery(".video-inread2").empty();
                        jQuery(".video-inread2").removeClass("Added");

                        jQuery(".bottom-leaderboard-section").empty();
                        jQuery(".bottom-leaderboard-section").removeClass("Added");


                        
                        jQuery(".article-mpu-5").eq(b).append("<div id='Unit2' class='sidebarad" + b + "'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('Unit2'); });<\/script><\/div>");
                        jQuery(".article-mpu-51").eq(b).append("<div id='Unit3' class='sidebarad" + b + "'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('Unit3'); });<\/script><\/div>");
                        jQuery(".article-mpu-52").eq(b).append("<div id='Unit4' class='sidebarad" + b + "'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('Unit4'); });<\/script><\/div>");
                        jQuery(".video-inread").eq(b).append("<div id='1x3'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('1x3'); });<\/script><\/div>");
                        jQuery(".video-inread1").eq(b).append("<div id='1x1'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('1x1'); });<\/script><\/div>");
                        jQuery(".video-inread2").eq(b).append("<div id='1x2'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('1x2'); });<\/script><\/div>");
                        jQuery(".bottom-leaderboard-section").eq(b).append("<div id='Unit5'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('Unit5'); });<\/script><\/div>");


                       if (b != 0) {

                            streamamp.refreshBids("Unit2");
                            streamamp.refreshBids("Unit3");
                            streamamp.refreshBids("Unit4");
                            streamamp.refreshBids("1x3");
                            streamamp.refreshBids("1x2");
                            streamamp.refreshBids("1x1");
                            streamamp.refreshBids("Unit5");

                        }
                     


                        jQuery(".article-mpu-5").eq(b).addClass("Added");
                        jQuery(".article-mpu-51").eq(b).addClass("Added");
                        jQuery(".article-mpu-52").eq(b).addClass("Added");
                        jQuery(".video-inread").eq(b).addClass("Added");
                        jQuery(".video-inread1").eq(b).addClass("Added");
                        jQuery(".video-inread2").eq(b).addClass("Added");
                        jQuery(".bottom-leaderboard-section").eq(b).addClass("Added");

                         // alert('added all ads');
                          console.log('added all ads'); 
                    }

                

                } else if (windowScrollTop > bottomOfElement && windowScrollTop > topOfElement) {
                    // Element is hidden (above viewable area)
                    //   console.log("Element is hidden (above viewable area)");

                    //jQuery(".article-mpu-1").eq(b).empty();
                   // jQuery(".article-mpu-1").eq(b).removeClass("Added");

                } else if (scrollTopPosition < topOfElement && scrollTopPosition < bottomOfElement) {
                    // Element is hidden (below viewable area)
                    // console.log("Element is hidden (below viewable area)");

                   // jQuery(".article-mpu-1").eq(b).empty();
                   // jQuery(".article-mpu-1").eq(b).removeClass("Added");


                } else if (scrollTopPosition < bottomOfElement && scrollTopPosition > topOfElement) {
                    // Element is partially visible (below viewable area)
                    //console.log("Element is partially visible (below viewable area)");

                } else {
                    // Element is completely visible
                    console.log("Element is completely visible");

                      if (jQuery(".article-mpu-5").eq(b).hasClass("Added") || jQuery(".article-mpu-51").eq(b).hasClass("Added")  || b == 0) {
                        if(b == 0){
                           jQuery(".article-mpu-5").eq(1).empty();
                           jQuery(".article-mpu-5").eq(1).removeClass("Added");


                           jQuery(".article-mpu-51").eq(1).empty();
                           jQuery(".article-mpu-51").eq(1).removeClass("Added");

                           jQuery(".article-mpu-52").eq(1).empty();
                           jQuery(".article-mpu-52").eq(1).removeClass("Added");

                           jQuery(".video-inread").eq(1).empty();
                           jQuery(".video-inread").eq(1).removeClass("Added");


                           jQuery(".video-inread1").eq(1).empty();
                           jQuery(".video-inread1").eq(1).removeClass("Added");

                           jQuery(".video-inread2").eq(1).empty();
                           jQuery(".video-inread2").eq(1).removeClass("Added");


                           jQuery(".bottom-leaderboard-section").eq(1).empty();
                           jQuery(".bottom-leaderboard-section").eq(1).removeClass("Added");

                        }


                    } else {

                        
                        console.log('removed all ads');

                          // Cleaning ads  
                        jQuery(".article-mpu-5").empty();
                        jQuery(".article-mpu-5").removeClass("Added");

                        jQuery(".article-mpu-51").empty();
                        jQuery(".article-mpu-51").removeClass("Added");

                        jQuery(".article-mpu-52").empty();
                        jQuery(".article-mpu-52").removeClass("Added");

                        jQuery(".video-inread").empty();
                        jQuery(".video-inread").removeClass("Added");

                        jQuery(".video-inread1").empty();
                        jQuery(".video-inread1").removeClass("Added");


                        jQuery(".video-inread2").empty();
                        jQuery(".video-inread2").removeClass("Added");

                        jQuery(".bottom-leaderboard-section").empty();
                        jQuery(".bottom-leaderboard-section").removeClass("Added");


                        
                        jQuery(".article-mpu-5").eq(b).append("<div id='Unit2' class='sidebarad" + b + "'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('Unit2'); });<\/script><\/div>");
                        jQuery(".article-mpu-51").eq(b).append("<div id='Unit3' class='sidebarad" + b + "'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('Unit3'); });<\/script><\/div>");
                        jQuery(".article-mpu-52").eq(b).append("<div id='Unit4' class='sidebarad" + b + "'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('Unit4'); });<\/script><\/div>");
                        jQuery(".video-inread").eq(b).append("<div id='1x3'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('1x3'); });<\/script><\/div>");
                        jQuery(".video-inread1").eq(b).append("<div id='1x1'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('1x1'); });<\/script><\/div>");
                        jQuery(".video-inread2").eq(b).append("<div id='1x2'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('1x2'); });<\/script><\/div>");
                        jQuery(".bottom-leaderboard-section").eq(b).append("<div id='Unit5'><script type='text/javascript'>googletag.cmd.push(function() { googletag.display('Unit5'); });<\/script><\/div>");


                       if (b != 0) {

                            streamamp.refreshBids("Unit2");
                            streamamp.refreshBids("Unit3");
                            streamamp.refreshBids("Unit4");
                            streamamp.refreshBids("1x3");
                            streamamp.refreshBids("1x2");
                            streamamp.refreshBids("1x1");
                            streamamp.refreshBids("Unit5");

                        } 
                     


                        jQuery(".article-mpu-5").eq(b).addClass("Added");
                        jQuery(".article-mpu-51").eq(b).addClass("Added");
                        jQuery(".article-mpu-52").eq(b).addClass("Added");
                        jQuery(".video-inread").eq(b).addClass("Added");
                        jQuery(".video-inread1").eq(b).addClass("Added");
                        jQuery(".video-inread2").eq(b).addClass("Added");
                        jQuery(".bottom-leaderboard-section").eq(b).addClass("Added");

                         // alert('added all ads');
                          console.log('added all ads');  
                    }
                }

            }
 
        });

  }

 


    });
});



</script>