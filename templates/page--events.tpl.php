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
<?php //if ($page['topnav']): 
Global $base_url; 	
Global $node;
Global $name;
 	
$imgpath = "https://www.newstatesman.com/sites/all/themes/creative-responsive-theme/images/new_statesman_events.jpg" ; 
$fimage = array(
  '#tag' => 'meta', 
  '#attributes' => array(
    'property' => 'og:image',
    'content' => $imgpath,
	'width' => '800px',
  ),
); 
drupal_add_html_head($fimage, 'og_image'); 	

	?>


<div class="mobile-banner header-mobile-banner" style="text-align: center;">
  <div id='div-300-250-top_mpu'>
  <script type='text/javascript'>
    googletag.cmd.push(function() { googletag.display('div-300-250-top_mpu'); });
  </script> 
  </div>
</div>

<div class="leaderboard top-leaderboard">
  <div class="row"> 
    
    <!-- Newstatesman/Culture/culture_homepage -->
    <div id='div-728-90-top_leader'> 
      <script type='text/javascript'>
          googletag.display('div-728-90-top_leader');
          </script> 
    </div>
  </div>
</div>
<!-- .top-leaderboard -->

<?php include_once( path_to_theme() . '/includes/header.php' ); ?>
<?php print $messages; ?>
<div id="container" class="promotion-theme">
  <?php if(arg(0) == 'events'): ?>
  <div class="article-featured-image">
   <?php ?> <h1>Events</h1>
<?php // print render($page['event_lead_image']) ?>    
<div class="article-featured-image">
<img src="<?php print base_path() . drupal_get_path('theme', 'creative_responsive_theme').'/images/new_statesman_events.jpg'; ?>" >
    
     </div>
	 
	
	 
  </div>
  <?php endif ?>
  
  
  <!-- Banner --> 
  
  <!-- content-sidebar-wrap  -->
    <?php if(arg(0) == 'events'): ?>
  <div class="main-content has-featured-article">

 <div class="row">
  <div class="large-8 ev-columns featured-event" >
  <?php print render($page['event_featured_article']) ?>   
  </div>
 </div> <?php endif ?><?php if(arg(0) == 'events') { ?>
          <div class="row" style="margin-top:0em;">		  
    <div class="large-12 columns"><?php  }  ?>	

	
      <div id="content" class="row">
      
      	   
	   <?php
		if(arg(1) == 'events-2016')
		//if(arg(0) == 'old-events')
		{
			if ($page['event_by_year']): 
			echo '<ul class="tabs-cal years-tabs-cal cf">
					<li >
						<a href="/events">2017</a></li>
					<li class="current">
						<a href="/events-2016/">2016</a></li>
				</ul>';
				
			endif;	
		}
	   ?>
	   
    <?php   if(arg(0) == 'events') { ?>
    				
	<div class="row archive-page-container">
		
	<div class="small-12 medium-12 columns">
		
		<?php
		
		/* code for 2019 events */

		if (arg(1) == 'events-2018'){
			echo '<ul class="tabs-cal years-tabs-cal cf">'?> 
					<li> <a href="/events/events-2019">2019</a></li> 
					<li class="current"> <a href="/events/events-2018">2018</a></li> <?php
					echo '<li>
						<a href="/events/events-2017/">2017</a></li>
				</ul>';
				print render($page['content']);
		}	
		elseif(arg(1) == 'events-2017')
		
		{

			echo '<ul class="tabs-cal years-tabs-cal cf">'?> 
					<li> <a href="/events/events-2018">2019</a></li>
					<li> <a href="/events/events-2018">2018</a></li> <?php
					echo '<li class="current">
						<a href="/events/events-2017/">2017</a></li>
				</ul>';
				
		
		print render($page['content']);
		}
		else{
				echo '<ul class="tabs-cal years-tabs-cal cf">' ?>
					<li class="current">
						<a href="/events">2019</a></li> 
					<li >
						<a href="/events/events-2018">2018</a></li> 
					<?php echo'<li>
						<a href="/events/events-2017/">2017</a></li>
				</ul>';
			
					
					//print render($page['content']);
					 print views_embed_view('Events',"page_4");
					// print views_embed_view('Events',"november");
					// print views_embed_view('Events',"october");
					// print views_embed_view('Events',"september");
					// print views_embed_view('Events',"august");
					// print views_embed_view('Events',"july");
					// print views_embed_view('Events',"june");
					// print views_embed_view('Events',"may");
					// print views_embed_view('Events',"april");
					// print views_embed_view('Events',"march");
					// print views_embed_view('Events',"february");
					// print views_embed_view('Events',"january");
				
			}	
				
			?> 
		
		
	</div>
	
</div>

	
				<?php  } else { 
				?>
				
				
				
				      <div class="large-12 columns main-content">        
							<section id="post-content" role="main">
								<?php //print render($page['content']);?>
								  <?php /*?><?php print render($title_prefix); ?>
								<?php if ($title): ?><h1 class="page-title"><?php print $title; ?></h1><?php endif; ?>
								<?php print render($title_suffix); ?><?php */?>
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
							</section>  
							  <?php   }  ?>
        <!-- /#main --> </div>
      </div>
    </div>
  </div>
<!--</div>-->
 
<?php include( path_to_theme() . '/includes/footer.php'); ?>