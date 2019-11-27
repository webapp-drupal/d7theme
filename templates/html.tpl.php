<?php
global $section;
global $node;
$section_array='';
$x= 0;



$targetting="";
$toogle_off="";

/* homepage and toggle off function */

if (drupal_is_front_page() || ( arg(0) == 'uk' || arg(0) == 'us' && arg(1) == NULL ) ) {

    $targetting='window.streamampClientConfig = {targets: {"Category": "home"}};';
    $toogle_off='"1x1", "1x2", "1x3","Unit5","Unit6","Unit7"';

}else{


  $term = taxonomy_term_load(arg(2));
  // echo 'term: '; var_dump($term);
  if($term ){
    $targetting=ad_targetting($term);
  }

  $node = node_load(arg(1));
   if (is_object($node)) {
      if (!empty($node->field_categories)) {
        $latest=end($node->field_categories['und']); 
        $latest_term=$latest['tid'];
        $term2 = taxonomy_term_load($latest_term);
        $targetting=ad_targetting($term2);
      }
    }
}

/*
if( isset($targetting_val) ){

  $geo_ads_target = module_invoke('NS_Custom', 'middleware_geo_ads', $targetting_val);
  if( isset($geo_ads_target) ){
    $targetting = 'window.streamampClientConfig = ' . $geo_ads_target . ';';
  }else{
    $targetting = 'window.streamampClientConfig = ' . $targetting_val . ';';
  }
  var_dump($targetting);
}
*/

if(checkmobile()){
   $toogle_off='"Unit1","Unit6"';
}





/* no idea what is it */

if (arg(0) == 'node' && is_numeric(arg(1))) {

    $node = node_load(arg(1));

    //var_dump( $node);

    if (is_object($node)) {

      
        if (!empty($node->field_categories)) {
              if($node->field_categories['und'][0]['tid']=='8268') { $section = 'politics'; }
              if($node->field_categories['und'][0]['tid']=='8277') { $section = 'culture'; }
              if($node->field_categories['und'][0]['tid']=='8320') { $section = 'world'; }
              if($node->field_categories['und'][0]['tid']=='8300') { $section = 'sci_tech'; }
              if($node->field_categories['und'][0]['tid']=='8306') { $section = 'gibraltar'; }
              if($node->field_categories['und'][0]['tid']=='8274') { $section = 'staggers'; }
              if($node->field_categories['und'][0]['tid']=='8269') { $section = 'business'; }
              if($node->field_categories['und'][0]['tid']=='8328') { $section = 'economy'; }

              for ($x = 0; $x <= 10; $x++) {
                if(!empty($node->field_categories['und'][$x]['tid'])){
                  if($node->field_categories['und'][$x]['tid']=='8373') { $section = 'philips'; }
                 } 
              }
            }
    }

}

if (arg(0) == 'taxonomy') {

    if (arg(2) == '8268' && arg(1) == 'term') {$section = 'politicshome';}
    elseif (arg(2) == '8277' && arg(1) == 'term'){$section = 'culturehome';}
    elseif (arg(2) == '8320' && arg(1) == 'term'){$section = 'world';}
    elseif (arg(2) == '8300' && arg(1) == 'term'){$section = 'sci_tech';}
    elseif (arg(2) == '8306' && arg(1) == 'term'){$section = 'gibraltar';}
    elseif (arg(2) == '8274' && arg(1) == 'term'){$section = 'staggers';}
    elseif (arg(2) == '8269' && arg(1) == 'term'){$section = 'business';}
    elseif (arg(2) == '8373' && arg(1) == 'term'){$section = 'philips';}
    elseif (arg(2) == '8328' && arg(1) == 'term'){$section = 'economy';}
    elseif (arg(2) == '8279' && arg(1) == 'term'){$section = 'book';}
}



/* no idea what is it */


?>
<!DOCTYPE html>
<!--[if lte IE 7]> <html lang="en" class="ie ie7"> <![endif]-->
<!--[if IE 8 ]> <html lang="en" class="ie ie8"> <![endif]-->
<!--[if IE 9 ]> <html lang="en" class="ie ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en"> <!--<![endif]-->
<head>
<?php print $head; ?>
<title><?php print $head_title; ?></title>
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">
<script src="/sites/all/themes/creative-responsive-theme/js/vendor/modernizr.js"></script>
<script>
  var j = 1;
</script>

<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link rel="apple-touch-icon" sizes="57x57" href="/apple-touch-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="/apple-touch-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="/apple-touch-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="/apple-touch-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="/apple-touch-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="/apple-touch-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="/apple-touch-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="/apple-touch-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon-180x180.png">
<link rel="icon" type="image/png" href="/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="/android-chrome-192x192.png" sizes="192x192">
<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="/favicon-16x16.png" sizes="16x16">
<link rel="manifest" href="/manifest.json">
<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="msapplication-TileImage" content="/mstile-144x144.png">
<meta name="theme-color" content="#ffffff">
<!--<meta name="google-site-verification" content="-wzk9l4dBtL8YHJVF-afrZXha3QSFTKJvhfaoTyOL2Y" />--->

<?php  
  // evolok paywall libs
  echo @module_invoke('paywall', 'evolok_libs');
?>

<!-- Online Advertising -->
<script type="text/javascript">
  <?php echo $targetting; ?>

  window.AD_UNITS_TOGGLE_OFF = [<?php echo $toogle_off;?>];
</script>


<script type="text/javascript" src="//static.amp.services/clients/GlobalData/NewStatesman.js"></script>


<?php print $scripts; ?> 
<?php print $styles; ?>


<meta name="google-site-verification" content="GfOJMinBD7e8A_EFHIWacMNjU-AM1WaPrpnAVzwr7-4"/>
<meta name="DCSext.WebsiteName" content="www.newstatesman.com" />


<!-- Facebook Conversion Code for Checkouts - New Statesman 1 -->
    <script>(function() {
    var _fbq = window._fbq || (window._fbq = []);
    if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
    }
    })();
    window._fbq = window._fbq || [];
    window._fbq.push(['track', '6025943409225', {'value':'0.00','currency':'GBP'}]);
    </script>
    <noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6025943409225&amp;cd[value]=0.00&amp;cd[currency]=GBP&amp;noscript=1" /></noscript>
    
    <!-- Facebook tracking pixel -->
    <script>(function() {
    var _fbq = window._fbq || (window._fbq = []);
    if (!_fbq.loaded) {
    var fbds = document.createElement('script');
    fbds.async = true;
    fbds.src = '//connect.facebook.net/en_US/fbds.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(fbds, s);
    _fbq.loaded = true;
    }
    _fbq.push(['addPixelId', '526380280843209']);
    })();
    window._fbq = window._fbq || [];
    window._fbq.push(['track', 'PixelInitialized', {}]);
    </script>
    <noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?id=526380280843209&amp;ev=PixelInitialized" /></noscript>
    

<!-- Facebook Conversion Code for New Statesman - MasterBrand Philips 2015 -->
      <script>(function() {
      var _fbq = window._fbq || (window._fbq = []);
      if (!_fbq.loaded) {
      var fbds = document.createElement('script');
      fbds.async = true;
      fbds.src = '//connect.facebook.net/en_US/fbds.js';
      var s = document.getElementsByTagName('script')[0];
      s.parentNode.insertBefore(fbds, s);
      _fbq.loaded = true;
      }
      })();
      window._fbq = window._fbq || [];
      window._fbq.push(['track', '6032031760848', {'value':'0.00','currency':'GBP'}]);
      </script>
      <noscript><img height="1" width="1" alt="" style="display:none" src="https://www.facebook.com/tr?ev=6032031760848&amp;cd[value]=0.00&amp;cd[currency]=GBP&amp;noscript=1" /></noscript>
<!-- end of Facebook Conversion Code- MasterBrand Philips 2015 -->


<!-- OnScroll tag: New Statesman -->
<script src="//tags.onscroll.com/3380db1e-7e02-4e5d-b02b-291ba90d3565/tag.min.js" async defer></script>

<!-- Hotjar Tracking Code for www.newstatesman.com -->
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:899208,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
 <!-- On mouse hover sponsered artilce --->

 <!-- On mouse hover sponsered artilce --->
  

<!--- Added Organization name and address for structure data elements ------>	
	<script type="application/ld+json">
	{
	  "@context": "http://schema.org",
	  "@type": "Organization",
	  "url": "https://www.newstatesman.com/us",
	  "name": "Newstatesman."
	 
     
	}
</script>
<!--- End Organization name and address for structure data elements -->


  
</head>

<?php  
  echo @module_invoke('paywall', 'init');

  // echo module_invoke('paywall', 'evo_auth_func_check');
?>

<!--Twitter conversion tracking pixel for philips -->

<script src="https://platform.twitter.com/oct.js" type="text/javascript"></script>
<script type="text/javascript">twttr.conversion.trackPid('ntow3', { tw_sale_amount: 0, tw_order_quantity: 0 });</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://analytics.twitter.com/i/adsct?txn_id=ntow3&p_id=Twitter&tw_sale_amount=0&tw_order_quantity=0" />
<img height="1" width="1" style="display:none;" alt="" src="//t.co/i/adsct?txn_id=ntow3&p_id=Twitter&tw_sale_amount=0&tw_order_quantity=0" />
</noscript>

<!-- End of Twitter conversion tracking pixel for philips -->




<?php
$term_classes = '';
if (arg(0) == 'taxonomy' && arg(1) == 'term') {
  $tid = (int) arg(2);
  $parents = taxonomy_get_parents_all($tid);
  foreach ($parents as $parent) {
    if (count(taxonomy_get_parents_all($parent->tid)) == 1) {
      $parent_tid = $parent->tid;
    }
  }
  $term = taxonomy_term_load($parent_tid);
  if ($parent_tid == 8300) {
    $term_classes = 'scitech';
  }elseif ($parent_tid == 8306) {
    $term_classes = 'gibraltar';
  }elseif ($parent_tid == 8315) {
    //Do nothing
  }elseif ($parent_tid == 8389) {
    $term_classes = 'uselections';
  }
  else {
    $term_classes = lcfirst($term->name);
  }
}

if(arg(1)=='200348') 
    $term_classes ="aboutns";
    elseif(arg(1)=='200294')
    $term_classes ="advertising";
    elseif(arg(1)=='200379')
    $term_classes ="contactus";
    elseif(arg(1)=='200309')
    $term_classes ="history";
    elseif(arg(1)=='200310')
    $term_classes ="privacypolicy";
    elseif(arg(1)=='200377')
    $term_classes ="rssfeeds";
    elseif(arg(1)=='200394')
    $term_classes ="termsandconditions";
 ?>

<?php if ($is_front){ ?> 
<body class="<?php print $classes; ?> home-theme" <?php print $attributes; ?> >
<?php } elseif( arg(0) == 'uk' ){ ?>
<body class="<?php print $classes; ?> front" <?php print $attributes; ?> >
<?php } elseif( arg(0) == 'us' ){ ?>
<body class="<?php print $classes; ?> front front-america" <?php print $attributes; ?> >
<?php } elseif (arg(0) == 'node'  && is_numeric(arg(1))) { ?>
<body class="<?php print $classes; ?> article-theme <?php print $term_classes; ?>"<?php print $attributes; ?> >
 <?php }   elseif  (arg(0) == 'our-writers'){ ?>
<body class="<?php print $classes; ?> our-writers-theme"<?php print $attributes; ?> >
 <?php }   elseif  (arg(0) == 'events'){ ?>
<body class="<?php print $classes; ?> events-theme"<?php print $attributes; ?> >
 <?php }   elseif  (arg(0) == 'long-reads'){ ?>
<body class="<?php print $classes; ?> long-reads-theme page-taxonomy page-taxonomy-term"<?php print $attributes; ?> >
<?php }   else { ?>
<body class="<?php print $classes; ?> <?php print $term_classes; ?>"<?php print $attributes; ?>>
 <?php }  ?>




 <?php
// evolok stuff
// $evo_article_id = $node->nid;

// echo module_invoke('paywall', 'evo_TNS_Data', $evo_article_id);
?>

<?php 
  echo module_invoke('paywall', 'ev_modals');
?>

 <script>
   (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
   (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
   m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
   })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
 
    ga('create', 'UA-121540-1', 'auto');

   <?php if( $node && $node->status ){
     // var_dump($node->status); 
      if( $node->nid ){ ?>
        ga('set', 'dimension4', '<?= $node->nid; ?>');

      <?php } ?>

      <?php if( $node->published_at && $node->status ){ ?>
        ga('set', 'dimension5', "<?= format_date($node->published_at, 'custom', 'Y-m-d H:i:s'); ?>");
      <?php } ?>

      <?php 
        $author_name = 'anonymous';
        if( $node->name ){
          $author_name = $node->name;
         }

        if( !empty($node->field_guest_author) ){
            $author_name .= ', ' . $node->field_guest_author['und'][0]['value'];
        }

      ?>
        ga('set', 'dimension6', "<?= $author_name; ?>");

   <?php } ?>
  
   ga('send', 'pageview');
 
 </script>

 
  <?php print $page_top; ?>
  <?php print $page; ?>
  <?php print $page_bottom; ?>


  
    
      <script src="/sites/all/themes/creative-responsive-theme/js/foundation.min.js"></script>
      <script>
          //$(document).foundation();
      </script>
      <script type="text/javascript" src="/sites/all/themes/creative-responsive-theme/js/ux.js"></script>
      
      <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
      <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
      <script type="text/javascript" src="/sites/all/themes/creative-responsive-theme/js/slick/slick.min.js"></script>
      <script type="text/javascript" src="/sites/all/themes/creative-responsive-theme/js/jquery.sticky.js"></script>
	 <!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script>---->
	     <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion({
      heightStyle: "content"
    });
  } );
  </script>
	  
<?php if ( $is_front ){ ?> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.matchHeight/0.7.2/jquery.matchHeight-min.js"></script>
    <script>
      var windowWidth = $(window).width();
      if(windowWidth > 768){
        $(function() {
          // alert('ifi');
          $('main').matchHeight({
                target: $('.sidebar_home')
            });
        });
      }

</script>
<?php } ?>
	
<?php 
  // custom evo script
  echo @module_invoke('paywall', 'evo_custom_js');

  // evolok stuff
  // var_dump( "node set?: ");
  // content_type_name
  $content_to_meter = array("blogs","longread");

if( isset($node->type) && in_array($node->type, $content_to_meter) ){ //only apply to node page
  $evo_article_id = $node->nid;
  /*** categories ***/
  $field = $node->field_categories;
  // echo "cats: "; echo '<pre>' . print_r($field,true) . '</pre>';
  $evo_cats = '';
  if( isset($field) && isset($field['und']) ){
    $evo_cats = $field['und'];
    if( is_array($evo_cats) ){
      $evo_tids = array_column($evo_cats, 'tid');

      $terms = taxonomy_term_load_multiple($evo_tids);

      foreach ($terms as $term) {
        $evo_cats_with_name[] = $term->name;
      }
      $evo_cats = implode(",",$evo_cats_with_name);
    }
  }

  /**** tags ***/
    /*if (isset($node->field_tags_new)) {
    $tags = $node->field_tags_new;
  }*/
  $tags='';
  if (isset($node->field_tags['und'][0]['value'])) {
    $tags = $node->field_tags['und'][0]['value'];
  }elseif (isset($node->field_tags_evolok_logread['und'][0]['value'])) {
    $tags = $node->field_tags_evolok_logread['und'][0]['value'];
  }
  // echo "tags: "; echo '<pre>' . print_r($tags,true) . '</pre>';
 /* $evo_tags = '';
  if( isset($tags) && isset($tags['und']) ){
    $evo_tags = $tags['und'];
    if( is_array($evo_tags) ){
    
      $evo_terms = array_column($evo_tags, 'taxonomy_term');
    $evo_tags_with_name = array();
      foreach ($evo_terms as $term) {
        $evo_tags_with_name = $term->name;
      }
      

      // var_dump($evo_tags_with_name);
      $evo_tags = implode(',',$evo_tags_with_name);
    }
  }
*/
   //echo "tags: "; echo '<pre>' . print_r($tags) . '</pre>';
   //echo $tags;

  if( $node->name ){
    $author = $node->name;
  }

  if( $node->field_guest_author['und'][0]['value'] ){
    $guest_author = $node->field_guest_author['und'][0]['value'];
  }

  // echo '<pre>'; print_r($node->field_guest_author['und'][0]['value']); echo '</pre>';

  if( !empty($author) && !empty($guest_author) ){
    $evo_author = $author . ' and ' . $guest_author;
  }elseif( !empty($guest_author) && empty($author) ){
    $evo_author = $guest_author;
  }elseif( empty($guest_author) && !empty($author) ){
    $evo_author = $author;
  }else{
    $evo_author = 'Anonymous';
  }
  

  // var_dump( $evo_cats );
  // var_dump("test123");
  // var_dump( $evo_article_id );
  // $evo_tags = '';
  $ev_section = "blogs";

  if( isset($section) && !empty($section) ){
    $ev_section = $section;
  }else{
    if( isset($node->field_categories['und'][0]['tid']) && !empty($node->field_categories['und'][0]['tid']) ){
      $ev_top_tid = $node->field_categories['und'][0]['tid'];

      $ev_top_term = taxonomy_term_load($ev_top_tid);
      $ev_top_cat_name = $ev_top_term->name;

      $ev_section = $ev_top_cat_name;
    }
  }

  // add keywords
  preg_match('<meta.*name=\"keywords\".*content=\"(.*).*\".*>', $head, $tag_match);
  if($tag_match){
    $tags .= ", $tag_match[1]";
  }

  $evo_geo = 'UK';

  if( function_exists('geolocation_check_session') && geolocation_check_session() == 'US' ){
    $evo_geo = 'US';
  }

  $evo_params = array( 'articleId' => $evo_article_id, 'category' => $evo_cats, 'tags' => $tags, 'section' => $ev_section, 'authors' => $evo_author, 'site' => $evo_geo, 'notifier' => 'true' );

  echo @module_invoke('paywall', 'evo_authorize', $evo_params);
}

?>


      

<?php if($section!='philips'){ ?>
  <script type="text/javascript" src="/sites/all/themes/creative-responsive-theme/js/inArticleBanners.js"></script>
<?php } ?> 

<?php include 'ads/ads-ads.php';  ?>
<script type="text/javascript">
$(".homepage_sticky").sticky({ topSpacing: 100 });
</script>

<?php if($section=='philips'){ ?>
<script type="text/javascript">
 $(document).ready(function(){
    //Load the second article onlym when you get to the bottom of the first.
    jQuery(window).bind('scroll', function() {
        if(jQuery(window).scrollTop() >= jQuery('.region-content').offset().top + jQuery('.region-content').outerHeight() - window.innerHeight) {
          jQuery(".region-content-bottom").show();
        }
    }); 
  });
</script>
<?php } ?>


<script type="text/javascript">
  $('.header-promotion').slick({
      autoplay: true,
      autoplaySpeed: 3000,
    });

 jQuery(document).ready(function(){
		//setTimeout( function(){ 
		
			var current_height = $('.view-display-id-homepagesponsored').position();
			if(current_height!=undefined){
			//$('.sponsored-hover-2017').show();
			$('.sponsored-hover-2017').css("top",current_height.top);
			$('.joyride').css("top",current_height.top);
			$('.joyride').css("bottom","auto");
			}
		/* Code for sending Sponsered article to GA on hover -- NNAS-2 */
			<?php if(arg(0) == 'node') { ?>
			
			//jQuery(".sidebar-sponsored-article").hover(function(){
			jQuery(".sidebar-sponsored-article-2017").hover(function(){
			
			
			
			// jQuery(".page-node .view-display-id-homepagesponsored:hover .sponsored-hover-2017").toggle();
			// ga('send', 'pageview', match);
			});
      // var pageURL = $(location).attr("href");
            // alert(pageURL);
      if(window.location.href.indexOf("/2017/") > -1) {
		//if(window.location.href=="https://www.newstatesman.com/politics/brexit/2017/11/leader-brexit-betrayal"){
		// if(window.location.href == "https://np-ind-new-statesman.pantheonsite.io/politics/brexit/2017/11/leader-brexit-betrayal") {
        $(".view-display-id-homepagesponsored").on("mouseover",function(){
		var current_height = $(this).position();
          $('.sponsored-hover-2017').show();
		  $('.sponsored-hover-2017').css("top",current_height.top);
		  $('.joyride').css("top",current_height.top);
		  $('.joyride').css("bottom","auto");
		  var match = $(this).find('div:first a').attr('href');
		  console.log(match);
		  // ga('send', 'pageview', match);
		  ga('send', 'pageview', "https://www.newstatesman.com"+match);
        });
		 $(".view-display-id-homepagesponsored").on("mouseleave",function(){
		var current_height = $(this).position();
		
		          //$('.sponsored-hover-2017').delay(100000).hide();
		          $('.sponsored-hover-2017').delay(4000).fadeOut();
		  // $('.sponsored-hover-2017').css("top",current_height.top);
		  // $('.joyride').css("top",current_height.top);
        });
		
      }
		<?php } ?>
	
	/* Code end for sending Sponsered article to GA on hover -- NNAS-2 */
 jQuery('.supplements-thumb p img').removeAttr('style');   
   jQuery('.supplements-thumb p img').each(function(){
      jQuery(this).removeAttr('width');
      jQuery(this).removeAttr('height');      
   });   
 });
  
</script>



<!-- Google Code for Remarketing Tag -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 975790991;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/975790991/?value=0&guid=ON&script=0"/>
</div>

</noscript>



<!-- Google Code for Remarketing Tag end -->





<!-- Ad-blocker -->

<script src="/sites/all/themes/creative-responsive-theme/js/blockadblock.js"></script>

<!-- Ad blocker content -->

<?php
/* Hide the adblocker popup for subscribe pages on live check the nids  NP-42**/
	// if( isset($node->nid) && $node->nid != 313545 && $node->nid != 313546){
	//if($node->nid != 313545 && $node->nid != 313546){
?>
		<?php
			//if (arg(0) == 'uk' || arg(0) == 'us') {
					?>
		
				<!--<div class="donate" id="donate">
					<div id="donate-close" class="donate-close"> X </div>
				  
					<?php //$node = node_load(300659);?>
					<?php //print $node->body['und'][0]['value']; ?>
					<br>
					<?php  //if($node->field_subscribe_now['und'][0]['url']) { ?> 
						<div class="cta-link donate-link">
							<a id="nothanks-link" href="#" style="text-decoration: none; padding: 10px; background:black;">No Thanks</a>&nbsp; &nbsp;&nbsp;&nbsp;
							<a href="<?php //print $node->field_subscribe_now['und'][0]['url'];?>" style="text-decoration: none; padding: 10px;" target="_blank" id="gotofeedback"><?php //print $node->field_subscribe_now['und'][0]['title'];  ?></a>
						</div>
						<br/><br/>
					<?php //} ?>
				</div>-->
				<div class="donate-toggle" id="donate-toggle" style="display:none;">
					Close   ASD
				</div>
	<?php   //} ?>
<?php //} ?>


<!-- Ad blocker content end-->

<script>
// $(function() {
  if (!getCookie('donation')) {
        $("#donate").show();
        
    }else{
        $("#donate").hide();      
        
    }
  
$("#donate-close").click(function(){
   // checkCookie();
      //if(chek === true){
        $("#donate").hide();
      //}        
        
    });
	
$("#nothanks-link, #gotofeedback").click(function(){
        checkCookie();
        $("#donate").hide();

    });

//intiate the donation cookie
function setCookie() {
    var expdate = new Date ();
      expdate.setTime (expdate.getTime() + (1 * 24 * 60 * 60 * 1000));
      var expires = "expires="+expdate.toUTCString();
      document.cookie="donation=Initiated ;"+expires+";path=/";
      //window.location.href="https://subscribe.newstatesman.com/";
}

function getCookie(cname) {
    var name = cname + "=";
    var ca = document.cookie.split(';');
    for(var i=0; i<ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1);
        if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
    }
    return "";
}

//check if the user has payed and dontion cookie is set to payed
function checkCookie() {
  var expdate = new Date ();
      expdate.setTime (expdate.getTime() + (1 * 24 * 60 * 60 * 1000));
      var expires = "expires="+expdate.toUTCString();
    var donate123 = getCookie("donation");
    if (donate123 == "Initiated") {      
        document.getElementById("donate").style.display="none";
        document.getElementById("donate").style.display="none";
        document.body.style.overflow = "visible";
        document.cookie="donation=Payed ; path=/ ; expires = " + expires ;       
    } else {
          setCookie();
        }    
    }

// });	


// function hideDonationPopup() {
//     var expdate = new Date ();
//       expdate.setTime (expdate.getTime() + (24 * 60 * 60 * 1000));
//       document.cookie="donationPopup=hide; path=/; expires = " + expdate ; 
// }

// $('.donate-toggle').click(function(e) { 

// if(e.target.id!="donate123")
// { 
    // document.getElementById("donate123").style.display="none";
    // document.getElementById("donate-toggle123").style.display="none";
    // document.body.style.overflow = "visible";
    // hideDonationPopup();
  // }
 // else{
  //  e.stopPropagation();
 // }
//});

// $('.donate-close').click(function(e) { 

// if(e.target.id!="donate123")
// { 
    // document.getElementById("donate123").style.display="none";
    // document.getElementById("donate-toggle123").style.display="none";
    // document.body.style.overflow = "visible";
    // hideDonationPopup();
  // }
 // else{
  //  e.stopPropagation();
 // }
//});

//for addressing donation complains.this function will set the cookie so that the donation popup is not showed for 60 days
// function setDonationComplainCookie() {
    // var expdate = new Date ();
      // expdate.setTime (expdate.getTime() + (24 * 60 * 60 * 1000 * 60));
      // document.cookie="donationPopup=Complain; path=/ ; expires = " + expdate ;  

// }
//for addressing donation complains of subscribers.this function will set the cookie so that the donation popup is never again showed
// function setDonationSubscriberCookie() {
    // var expdate = new Date ();
      // expdate.setTime (expdate.getTime() + (24 * 60 * 60 * 1000 * 6000));
      // document.cookie="donationPopup=Subscriber; path=/ ; expires = " + expdate ; 

// }

</script>


<!--<script src="http://imakewebthings.github.com/jquery-waypoints/waypoints.min.js" type="text/javascript"></script>--->
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.5/waypoints.min.js"></script>
<script type="text/javascript">
$(function() {   
    $('#leaderslot2').waypoint(function() {
      var PathName  = window.location.pathname;

      alert(PathName);
      ga('send', 'event', 'AdCount', PathName+' leaderslot2 view count', { "nonInteraction": 1 });
        
     }, {
       offset: '100%'
     });

   $('.secondary-content-box.mpu.article-mpu-1').waypoint(function() {
      var PathName  = window.location.pathname;
      ga('send', 'event', 'AdCount', PathName+' article-mpu-1 view count', { "nonInteraction": 1 });
     }, {
       offset: '100%'
     });

   $('.secondary-content-box.mpu.article-mpu-2').waypoint(function() {
      var PathName  = window.location.pathname;
      ga('send', 'event', 'AdCount', PathName+' article-mpu-2 view count', { "nonInteraction": 1 });
     }, {
       offset: '100%'
     });


   $('.secondary-content-box.mpu.article-mpu-3').waypoint(function() {
     var PathName  = window.location.pathname;
     ga('send', 'event', 'AdCount', PathName+' article-mpu-3 view count', { "nonInteraction": 1 });

     }, {
       offset: '100%'
     });


});

</script>

<script>
    var donate = getCookie("donation");
    var donationPopup = getCookie("donationPopup");
  // IP whitelist array 
  //var ar = ["86.178.61.94"];
  //var ar = ["115.119.113.194", "10.8.23.3","5.148.40.2","86.178.61.94"];
  var ip = "10.223.192.155";
  var ip_new = "91.200.82.73";
  //alert(ip_new)
  var temp_disable = true;
  
    /*if ( temp_disable || (donate == "Payed") || (donationPopup == "hide") || (donationPopup == "Complain")|| (donationPopup == "Subscriber"))
        {           
            document.getElementById("donate1234").style.display="none";
            document.getElementById("donate-toggle12345").style.display="none";
            document.body.style.overflow = "visible";
        }*/
    /* Code for IP whitelisting */
    //else if(jQuery.inArray("86.178.61.94",ar) == 0){
    //else if(jQuery.inArray("86.178.61.94",ar) == 0 || jQuery.inArray("115.119.113.194",ar) == 0 || jQuery.inArray("5.148.40.2",ar) == 0){
     if(ip == "86.178.61.94" || ip_new == "86.178.61.94"){
      //alert("In Array");
      $( "#donate" ).css( "display","none" );
      $( "#donate-toggle" ).css( "display","none" );
      $( "body" ).css( "overflow","visible" );
    }
    /* Code end for IP whitelisting */
        else
        {
            //alert("Inelse");
			// document.getElementById('donate').style.display = 'block';
            // document.getElementById('donate-toggle').style.display = 'block';
            // document.body.style.overflow = "hidden";
        }
  
    //alert('ad blocker detected');
    jQuery(".ad-blocker-wraper").css("ad-blocker-detected");

    function adBlockDetected() {
      /* Event fired if adBlock is Detected */    
    }
    function adBlockNotDetected() {
        //alert('No Adblocker found');
    }

    if (typeof blockAdBlock === 'undefined') {
        adBlockDetected();
    } else {
        blockAdBlock.setOption({debug: true});
        blockAdBlock.onDetected(adBlockDetected).onNotDetected(adBlockNotDetected);
    }

    function checkAgain() {

        // setTimeout 300ms for the recheck is visible when you click on the button
        setTimeout(function () {
            if (typeof blockAdBlock === 'undefined') {
                adBlockDetected();
            } else {
                blockAdBlock.onDetected(adBlockDetected).onNotDetected(adBlockNotDetected);
                blockAdBlock.check();
            }
        }, 300);
    }
</script>


<!-- Ad-blocker end -->




<script>
(function(){
	
  var test = document.createElement('div'); 
  test.innerHTML = '&nbsp;';
  test.className = 'adsbox';
  document.body.appendChild(test);
  window.setTimeout(function() {
    if (test.offsetHeight === 0) {
      ga('set', 'dimension1', 'Ads Blocked');
      ga('send', 'event', 'AdSense', 'Ads blocked', { "nonInteraction": 1 });
    }else{
      ga('set', 'dimension1', 'Ads Displaying');
      ga('send', 'event', 'AdSense', 'Ads not blocked', { "nonInteraction": 1 });
    }
    test.remove();
  }, 100);
})();
</script>

<script type="text/javascript">
 jQuery(document).ready(function() {
	 
			
jQuery("ul.event-months li").hover(
  
 function() {
    jQuery(this).addClass("showevents");
  
  }, function() {
    jQuery(this).removeClass("showevents");
  }
  
);

	// jQuery(".sidebar-sponsored-article").hover(function(){
	// console.log("you made onover");
	// jQuery(".sponsored-hover").toggle();
	// });
	
	

	
			
	});			
 
 
 jQuery(".close-toggle").click(function(){ 
	console.log("you made click");
	jQuery(".joyride").toggle();
	//jQuery(".joyride").hide();
	});
 </script>

 
<!--Pardot Onboarding Tracking code-->
 

<script type="text/javascript">
piAId = '510131';
piCId = '6800';
piHostname = 'pi.pardot.com';

(function() {
	function async_load(){
		var s = document.createElement('script'); s.type = 'text/javascript';
		s.src = ('https:' == document.location.protocol ? 'https://pi' : 'http://cdn') + '.pardot.com/pd.js';
		var c = document.getElementsByTagName('script')[0]; c.parentNode.insertBefore(s, c);
	}
	if(window.attachEvent) { window.attachEvent('onload', async_load); }
	else { window.addEventListener('load', async_load, false); }
})();
</script>

<?php if( (arg(0) == 'page' && arg(1) == 'supplements' ) ): ?>
  <script type="text/javascript">
      (function() {
        $('.view-supplements p a').on('click', function(e, type = null){

            var url = $( this ).attr('href'),
                parts = url.split("/"),
                supplementName = parts[parts.length-1];
            try{
              if( ga.q ){
                console.log('ga blocked!');
                if( type == null ) window.location = url;
              }else{
                ga('send', 'event', {
                    eventCategory: 'Supplements',
                    eventAction: 'open',
                    eventLabel: supplementName,
                    transport: 'beacon',
                    hitCallback : function () {
                        if(type == 'middle'){
                          window.open(url, "_blank");
                        }else{
                          window.location = url;
                        }
                     }
                });
              }
            }catch(err){
              console.log('err');
            }

            e.preventDefault();
        });

        $('.view-supplements p a').on('mousedown', function(e){

          if(e.which == 2){
            $(this).trigger('click', 'middle');
          }

        });
      })();

  </script>
<?php endif; ?>


<!--Pardot Onboarding Tracking code-->
<!-- <script src="/sites/all/themes/creative-responsive-theme/js/jquery.curlies.js"></script>
 <script>
    $(document).ready(function () {
        $('body').curlies();
    });
    </script> -->
	
	<script src="/sites/all/themes/creative-responsive-theme/js/jquery.curlies.js"></script>
 <script>
    $(document).ready(function () {
       
        $('.home-section-1,.home-section-2,.home-section-3,.home-section-4,.home-section-5,.home-section-6,.make_equal,.main-content, .content, .conferences-theme ,.mag-title,.issue-contents,#post-content').curlies();
    });
    </script>



</body>
</html>