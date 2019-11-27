<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to main-menu administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>
<?php //if ($page['topnav']): ?>
<script>
    function load_disqus(c,path)
    {
	    //var pageurl= '?q=/node/'+c;
		//history.pushState('stateObj', "page 2", pageurl);
		history.pushState('stateObj', "page 2", path);
	   if(document.getElementById("disqus_thread"))
	   {

        var ano = document.getElementById("disqus_loader").getAttribute("class");
			  if(ano.substr(13)==c)
			  {
				   var vis = document.getElementById("disqus_thread").getAttribute("style");
				  if(vis == 'display: none;')
				  {

				  document.getElementById("disqus_thread").style.display = 'block';
					return false;
				  }
				  else{

					 document.getElementById("disqus_thread").style.display = 'none';
					return false;
				  }
			  }





	    var x = document.getElementById("disqus_thread").getAttribute("class");
	   document.getElementById("disqus_thread").setAttribute("id", x);

	    var y = document.getElementById("disqus_loader").getAttribute("class");
	   document.getElementById("disqus_loader").setAttribute("id", y);

	  // var ldr1 = document.getElementById(y);
	   //ldr1.style.display = 'Block';

	   }

      document.getElementById("disqus_thread"+c).setAttribute("id", "disqus_thread");
	  document.getElementById("disqus_loader"+c).setAttribute("id", "disqus_loader");

	  var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
      dsq.src = "https://newstatesman1913.disqus.com/embed.js";
      (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
     // var ldr = document.getElementById('disqus_loader');
     // ldr.parentNode.removeChild(ldr);
	 // ldr.style.display = 'none';

	  return false;
    }

	function showimage(id)
   {
	 var cls = document.getElementById(id).getAttribute("class");
     var n = cls.indexOf("feature-image-revealed");
    if(n < 0)
    document.getElementById(id).setAttribute("class",cls+" feature-image-revealed");
    else
	 document.getElementById(id).setAttribute("class",cls.substr(0,n));
     return;



  }
 function shownewsform(id)
   {
	 var cls = document.getElementById(id).getAttribute("class");
     var n = cls.indexOf("email-newsletter-revealed");
    if(n < 0)
    document.getElementById(id).setAttribute("class",cls+" email-newsletter-revealed");
    else
	 document.getElementById(id).setAttribute("class",cls.substr(0,n));
     return;



  }
/*  jQuery(".email-newsletter-toggle").click(function(){
	nlid = this.id;
  nids = nlid.split('_');
  nids = nids[1];
  n = '#showhidenews_'+nids;
  jQuery(n).toggleClass("email-newsletter-revealed");
});
*/

  </script>

         <script>
                  /*function checktheval(sel_val){

   var my_selector = '.field-name-body div.field-item > p:nth-last-of-type('+sel_val+')';
  if(jQuery(my_selector).html().length<1){
    //return 1;
      sel_val++;
    checktheval(sel_val);
  }else{
	  console.log(my_selector);
    return my_selector;
  }
}*/


jQuery(document).ready(function($) {


//Load the second article onlym when you get to the bottom of the first.
jQuery(window).bind('scroll', function() {
        if(jQuery(window).scrollTop() >= jQuery('.region-content').offset().top + jQuery('.region-content').outerHeight() - window.innerHeight) {
          jQuery(".region-content-bottom").show();
        }
        moreContent1();
        moreContent2();
        moreContent3();
        moreContent4();
        moreContent5();
        moreContent6();
});


//alert("ok blog dsfsd");
	  //check_sel = checktheval(3);
	  //console.log("=====================");
	 //console.log(check_sel);
// jQuery( "div.story_related" ).insertAfter(check_sel);
var currentNid = Drupal.settings.custommodule.currentNid;
jQuery( "#node-"+currentNid+" div.story_related_"+currentNid ).insertAfter( ".field-name-body p:eq(3)" );
var te=jQuery("#node-"+currentNid+ " #related-story-wraper").html();
jQuery("div.story_related_"+currentNid+" #"+currentNid+"related_story").append(te);


//console.log("=====================");
 // console.log(te);
 // console.log("=====================");
 // console.log( "#node-"+currentNid+ " div."+currentNid+"story_related" );
 // console.log("#node-"+currentNid+" div."+currentNid+"story_related #"+currentNid+"related_story");


 });
</script>

<div class="mobile-banner header-mobile-banner" style="text-align: center;">
  <div id='div-gpt-ad-1438880573916-1'>
  <script type='text/javascript'>
    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1438880573916-1'); });
  </script>
  </div>
</div>

<div class="leaderboard top-leaderboard">
  <div class="row">
    <!-- Newstatesman/Culture/culture_homepage -->
    <div id='div-gpt-ad-1440520291949-0'>
      <script type='text/javascript'>
          googletag.cmd.push(function() { googletag.display('div-gpt-ad-1440520291949-0'); });
          </script>
    </div>
  </div>
</div>
<!-- .top-leaderboard -->

<?php include_once( path_to_theme() . '/includes/header.php' ); ?>

<?php /*?><div class="menu_wrapper">
      <nav id="main-menu"  role="navigation">
        <a class="nav-toggle" href="#">Navigation</a>
        <div class="menu-navigation-container">
          <?php
          if (module_exists('i18n')) {
            $main_menu_tree = i18n_menu_translated_tree(variable_get('menu_main_links_source', 'main-menu'));
          } else {
            $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
          }
          print drupal_render($main_menu_tree);
          ?>
        </div>
        <div class="clear"></div>
      </nav><!-- end main-menu -->
    </div><?php */?>
    <div class="row">
<div id="content" >
  <div id="container" class="parallax">
   <?php /*?> <?php if ($page['featured_cat_image']): ?>
    <div class="article-featured-image parallax-layer parallax-layer-back"><?php print render($page['featured_cat_image']); ?></div>
    <?php endif; ?><?php */?>
    <!-- Banner -->


    <?php print $messages; ?>
                <?php /*?> <?php print render($title_prefix); ?>
        <?php if ($title): ?><h1 class="page-title"><?php print $title; ?></h1><?php endif; ?>
        <?php print render($title_suffix); ?>		<?php */?>
				<?php if (!empty($tabs['#primary'])): ?>
                <div class="tabs-wrapper"><?php print render($tabs); ?></div>
                <?php endif; ?>
                <?php print render($page['help']); ?>
                <?php if ($action_links): ?>
                <ul class="action-links">
                  <?php print render($action_links); ?>
                </ul>
                <?php endif; ?>
                <?php print render($page['content']); ?>


 <?php /*?> long read  <?php // dsm($node);
  if($node->field_long_reads['und'][0]['value'] == 1)
  {
  print render($page['content_bottom_longreads']);
 // echo 'long read';
  } else
  {
      print render($page['content_bottom']);
	//  echo 'defaulr';
  }
      ?><?php */?>

<?php print render($page['content_bottom']); ?> </div>
    </div>

    <div class="large-4 columns right-sidebar">
            <div class="scrolling-content clearfix">
              <aside id="sidebar-second" role="complementary">
                <div class="secondary-content-box desktop-only-banner mpu">
                    <!-- /5269235/New_Statesman_2015_Dynamic_MPU_Top -->
                    <div id='div-gpt-ad-1434618587891-5'>
                      <script type='text/javascript'>
                      googletag.cmd.push(function() { googletag.display('div-gpt-ad-1434618587891-5'); });
                      </script>
                    </div>
                </div>
                <?php if ($page['sidebar_second_trending']): ?>
                <div class="secondary-content-box most-popular">
                  <h2 class="scb-heading">Most Popular</h2>
		  <?php $most_popular_block = geolocation_render_most_popular_block(); print render($most_popular_block); ?></div>
                </div>
                <!-- .most-popular -->
                <div class="secondary-content-box desktop-only-banner mpu">
                    <!-- /5269235/New_Statesman_2015_Dynamic_MPU_2 -->
                    <div id='div-gpt-ad-1434618587891-6'>
                    <script type='text/javascript'>
                    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1434618587891-6'); });
                    </script>
                    </div>
                </div>
                <!-- .mpu -->
                <?php endif; ?>
                <?php if ($page['sidebar_second_youmay']): ?>
                <div class="secondary-content-box you-may-have-missed">
                  <h2 class="scb-heading">Most Popular</h2>
                  <?php print render($page['sidebar_second_youmay']); ?>

				        </div>
                <?php endif; ?>
                <?php if ($page['sidebar_second_podcast']): ?>
				<div class="secondary-content-box podcast-box">
				  <h2 class="scb-heading">Podcasts</h2>
				  <iframe width="300" height="300" src="https://embed.acast.com/newstatesman" scrolling="no" frameborder="0" style="border:none;overflow:hidden;"></iframe>
                  <iframe width="300" height="300" src="https://embed.acast.com/srsly" scrolling="no" frameborder="0" style="border:none;overflow:hidden;"></iframe>
				  <div class="cta"><a href="/podcast/">View all podcasts</a></div>
				</div>
				<?php endif; ?>
                <?php if ($page['sidebar_second']): ?>
                <div class="secondary-content-box"><?php print render($page['sidebar_second']); ?></div>
                <?php endif; ?>
              </aside>
              <!-- #sidebar-first -->

	      <div class="secondary-content-box desktop-banner mpu elevator-banner clearfix">
		<div class="mobile-banner desktop-and-mobile-banner mpu">
                    <!-- /5269235/New_Statesman_2015_Dynamic_MPU_3 -->
                    <div id='div-gpt-ad-1434618587891-3'>
                      <script type='text/javascript'>
                      googletag.cmd.push(function() { googletag.display('div-gpt-ad-1434618587891-3'); });
                      </script>
                    </div>
		</div>
            </div>

            </div>


          <div class="sidebar-toggle">More</div>




</div>

</div>


    <!-- .content
  </div>
</div> -->
<?php include( path_to_theme() . '/includes/footer.php'); ?>
