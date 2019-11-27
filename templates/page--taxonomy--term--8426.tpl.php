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

/**
  * Spotlight template
  *
  */
?>
<?php //if ($page['topnav']): ?>

  
<div id='div-out_of_banner'> 
  <script type='text/javascript'>
//googletag.display('div-out_of_banner');
</script> 
</div>



<!-- .top-leaderboard -->
<?php include_once( path_to_theme() . '/includes/header.php' ); ?>
 
 <?php print $messages; ?>
 
<div id="container" class="main-content">
  
    <div class="article-featured-image">
      <?php if ($page['featured_cat_image']): ?>
      <?php print render($page['featured_cat_image']); ?>
      <?php endif; ?>
    </div>
    
     

        <!-- .home-sidebar-top -->  
        <?php if ($page['author']): ?>
        <div class="article-featured-image"><?php print render($page['author']); ?></div>
        <?php endif; ?> 
      
    
    <!-- content-sidebar-wrap  -->
    <div class="row home-theme">
      <div class="large-8 columns home-latest-articles article-column"> 

	         <div class="home-featured-article">
            <?php print render($page['spot_featured_image_US']); ?>
          </div>
          <!-- .home-featured-article -->
          
          <div class="spinner">
            <div class="rect1"></div>
            <div class="rect2"></div>
            <div class="rect3"></div>
            <div class="rect4"></div>
            <div class="rect5"></div>
          </div>
	  
        <div id="content" class="row">
          <?php /*?>      <?php if (theme_get_setting('breadcrumbs', 'creative_responsive_theme')): ?><div id="breadcrumbs"><?php if ($breadcrumb): print $breadcrumb; endif;?></div><?php endif; ?><?php */?>
         
          <section id="post-content" role="main">
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
        </div>
      </div>
      <div class="large-4 columns right-sidebar">
        <div class="scrolling-content clearfix">
          <aside id="sidebar-second" role="complementary">
  <div class="secondary-content-box desktop-only-banner mpu">
                           <!-- /ca-pub-8914899523938848/New_Statesman/Unit2 -->
                            <div id='Unit2' class='sidebarad1'>
                                <script type='text/javascript'>
                                  googletag.cmd.push(function() { googletag.display('Unit2'); });
                                </script>
                              </div>

                </div>		  
		    <?php if ($page['sidebar_second_trending']): ?>
            <div class="secondary-content-box most-popular">
              <h2 class="scb-heading">Most Popular</h2>
              <?php $most_popular_block = geolocation_render_most_popular_block(); print render($most_popular_block); ?>
            </div>
            <!-- .most-popular -->
            <?php endif; ?>        
		<?php print render($page['the_staggers']); ?>	
		
              <div class="secondary-content-box mpu">
                   <!-- /ca-pub-8914899523938848/New_Statesman/Unit2 -->
                  <div id='Unit2'>
                    <script type='text/javascript'>
                      googletag.cmd.push(function() { googletag.display('Unit2'); });
                    </script>
                  </div>
      		  </div>
		  
		  
            <div class="secondary-content-box desktop-banner mpu"> 
                  <!-- /ca-pub-8914899523938848/New_Statesman/Unit3 -->
                  <div id='Unit3'>
                    <script type='text/javascript'>
                      googletag.cmd.push(function() { googletag.display('Unit3'); });
                    </script>
                  </div>
            </div>
            <!-- .mpu -->
            
            <div class="secondary-content-box citymetric-ad">
              <a href="https://www.citymetric.com"><img src="/sites/all/themes/creative-responsive-theme/images/CityMetric_banner.png" alt="CityMetric"></a>
            </div>
            <!-- .citymetric-ad -->
            
            <?php if ($page['sidebar_second_youmay']): ?>
            <div class="secondary-content-box editors-pick"> <?php print render($page['sidebar_second_youmay']); ?> </div>
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
          
        </div>
        
        
       
        
    <div class="homepage_sticky">
        <!-- .elevator-banner -->
          <!-- /ca-pub-8914899523938848/New_Statesman/Unit4 -->
      <div id='Unit4' class="secondary-content-box desktop-banner mpu" style="background-color: #fff; border-left: 0.1em solid rgba(0, 0, 0, 0.05); border-right: 0.1em solid rgba(0, 0, 0, 0.05);">
        <script type='text/javascript'>
          googletag.cmd.push(function() { googletag.display('Unit4'); });
        </script>
      </div>
  </div>
        
      </div><div class="subscribe-toggle"><a href="https://subscribe.newstatesman.com/?utm_source=onsite&utm_medium=adhesiontab&utm_campaign=subscribe">SUBSCRIBE</a></div>
      <div class="sidebar-toggle">More</div>
    </div>
  </div>
</div>
</div>
<?php include( path_to_theme() . '/includes/footer-fixed.php'); ?>

