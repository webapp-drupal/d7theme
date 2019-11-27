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

  
<div id='div-out_of_banner'> 
  <script type='text/javascript'>
//googletag.display('div-out_of_banner');
</script> 
</div>



<!-- .top-leaderboard -->
<header class="site-header clearfix">
  
  <div class="row">
    <h1 class="site-logo">
      <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><img src="/sites/all/themes/creative-responsive-theme/images/newstatesman_logo@2x.png" alt="New Statesman"/></a>
      <?php endif; ?>
    </h1>
    <?php print render($page['ns_offers']); ?>
    <div class="header-promotion">
       <?php print render($page['carouselevent']); ?>  
      <div>
        <div class="twitter-follow-promotion">
          <a href="https://twitter.com/NewStatesman">
             <strong>Follow us</strong>
             on Twitter
          </a> 
        </div>
        <!-- .follow-promotion -->
      </div> 
      <div>
        <div class="podcast-promotion">
          <a href="/podcast/">
          <small>New Statesman</small>
          <span>Podcast</span></a>
        </div>
        <!-- .podcast-promotion -->
      </div>

    </div>
    <!-- header-promotion -->
  </div>
  <!-- .row -->

    <nav class="site-nav">
        <div class="row">
          <div class="nav-links">
            <ul class="site-categories clearfix">
              <?php if ($page['mainnav']): ?>
              <?php print render($page['mainnav']); ?>
              <?php endif?>
            </ul>
            <div class="content-links-toggle">More</div>
            <ul class="content-links">
              <?php if ($page['mainnav2']): ?>
              <?php print render($page['mainnav2']); ?>
              <?php endif?>
            </ul>
            <div class="mega-menu-row mega-menu row politics-mg"> 
                <div class="close-hover-mega-menu">Close menu</div>
                 
                <div class="row">
                  <div class="large-12 columns">               
                    <div class="row">
                      <div class="large-9 columns">
                         <?php if ($page['pl_subnav']): ?>
                          <?php print render($page['pl_subnav']); ?>                   
                         <?php endif ?>
                      </div>
                      <div class="large-3 columns">
                         <?php if ($page['megamenu_event']): ?>
                         <img src="sites/default/files/styles/large/public/ns-live-logo.png" alt="NS Live" class="ns-live-logo">

                          <?php print render($page['megamenu_event']); ?>                   
                         <?php endif ?>
                      </div>
                    </div>
                    <!-- .row -->
                  
                    <div class="main-mega-menu-section">
                      <div class="large-12 columns ns-network">
                        
                        <div class="mega-menu-logo">
                          <img src="/sites/all/themes/creative-responsive-theme/images/nsnetworks.png">
                        </div>
  
                        <div class="network-sites">
                          <div class="row">
                            <div class="large-4 columns">
                              <h1>Consumer</h1>
                              <h2><a href="https://www.citymetric.com">CityMetric</a></h2>
                            </div>
                            <div class="large-4 columns">
                              <h1>Business</h1>
                              <h2><a href="https://tech.newstatesman.com/">New Statesman Tech</a></h2>
                            </div>
                            <div class="large-4 columns">
                              <h1><a href="/spotlight">Spotlight</a></h1>
                              <h2><a href="/cyber">Cyber</a></h2>
                              <h2 class="viewall"><a href="/spotlight">View All</a></h2>
                              
                              
                            </div>
                          </div>
                        </div>
                        <!-- .network-sites -->
                      
                      </div>
                      <!-- .ns-network -->
                    </div>
                    <!-- .main-mega-menu-section -->
                    
                  </div>
                  <!-- .large-8 -->
                  
                </div>
                <!-- .row -->
            
              </div>
              <!-- .politics-mg -->
  
            <div class="mega-menu-row mega-menu row culture-mg">
                <div class="close-hover-mega-menu">Close menu</div>
                 
                <div class="row">
  
                  <div class="large-12 columns">
                    
                    <div class="row">
                      <div class="large-9 columns">
                         <?php if ($page['cl_subnav']): ?>
                          <?php print render($page['cl_subnav']); ?>                   
                         <?php endif ?>
                      </div>
                      <div class="large-3 columns">
                         <?php if ($page['megamenu_event']): ?>
                         <img src="sites/default/files/styles/large/public/ns-live-logo.png" alt="NS Live" class="ns-live-logo">
                          <?php print render($page['megamenu_event']); ?>                   
                         <?php endif ?>
                      </div>
                    </div>
                    <!-- .row -->
                  
                    <div class="main-mega-menu-section">
                      <div class="large-12 columns ns-network">
                        
                        <div class="mega-menu-logo">
                          <img src="/sites/all/themes/creative-responsive-theme/images/nsnetworks.png">
                        </div>
  
                        <div class="network-sites">
                          <div class="row">
                            <div class="large-4 columns">
                              <h1>Consumer</h1>
                              <h2><a href="https://www.citymetric.com">CityMetric</a></h2>
                            </div>
                            <div class="large-4 columns">
                              <h1>Business</h1>
                              <h2><a href="https://tech.newstatesman.com/">New Statesman Tech</a></h2>
                            </div>
                            <div class="large-4 columns">
                              <h1><a href="/spotlight">Spotlight</a></h1>
                              <h2><a href="/cyber">Cyber</a></h2>
                             <!-- <h2><a href="https://www.newstatesman.com/northern-powerhouse">Northern Powerhouse</a></h2>
                              <h2><a href="https://www.newstatesman.com/skills">Skills</a></h2>
                              <h2><a href="https://www.newstatesman.com/manufacturing">Manufacturing</a></h2> <h2><a href="https://www.newstatesman.com/investment">Investment</a></h2>-->
                              <h2 class="viewall"><a href="/spotlight">View All</a></h2></h2>
                            </div>
                          </div>
                        </div>
                        <!-- .network-sites -->
                      
                      </div>
                      <!-- .ns-network -->
                    </div>
                    <!-- .main-mega-menu-section -->
                    
                  </div>
                  <!-- .large-8 -->
                  
                </div>
                <!-- .row -->
              </div>
              <!-- .culture-mg -->
              
            <div class="mega-menu-row mega-menu row world-mg">
                <div class="close-hover-mega-menu">Close menu</div>
                 
                <div class="row">
  
                  <div class="large-12 columns">
                    
                    <div class="row">
                      <div class="large-9 columns">
                         <?php if ($page['wl_subnav']): ?>
                          <?php print render($page['wl_subnav']); ?>                   
                         <?php endif ?>
                      </div>
                      <div class="large-3 columns">
                         <?php if ($page['megamenu_event']): ?>
                         <img src="sites/default/files/styles/large/public/ns-live-logo.png" alt="NS Live" class="ns-live-logo">
                          <?php print render($page['megamenu_event']); ?>                   
                         <?php endif ?>
                      </div>
                    </div>
                    <!-- .row -->
                  
                    <div class="main-mega-menu-section">
                      <div class="large-12 columns ns-network">
                        
                        <div class="mega-menu-logo">
                          <img src="/sites/all/themes/creative-responsive-theme/images/nsnetworks.png">
                        </div>
  
                        <div class="network-sites">
                          <div class="row">
                            <div class="large-4 columns">
                              <h1>Consumer</h1>
                              <h2><a href="https://www.citymetric.com">CityMetric</a></h2>
                            </div>
                            <div class="large-4 columns">
                              <h1>Business</h1>
                              <h2><a href="https://tech.newstatesman.com/">New Statesman Tech</a></h2>
                            </div>
                            <div class="large-4 columns">
                              <h1><a href="/spotlight">Spotlight</a></h1>
                              <h2><a href="/cyber">Cyber</a></h2>
                             <!-- <h2><a href="https://www.newstatesman.com/northern-powerhouse">Northern Powerhouse</a></h2>
                              <h2><a href="https://www.newstatesman.com/skills">Skills</a></h2>
                              <h2><a href="https://www.newstatesman.com/manufacturing">Manufacturing</a></h2> <h2><a href="https://www.newstatesman.com/investment">Investment</a></h2>-->
                              <h2 class="viewall"><a href="/spotlight">View All</a></h2></h2>
                            </div>
                          </div>
                        </div>
                        <!-- .network-sites -->
                      
                      </div>
                      <!-- .ns-network -->
                    </div>
                    <!-- .main-mega-menu-section -->
                    
                  </div>
                  <!-- .large-8 -->
                  
                </div>
                <!-- .row -->
            </div>
            <!-- world-mg -->
            
            <div class="mega-menu-row mega-menu row science_tech-mg"> 
                <div class="close-hover-mega-menu">Close menu</div>
                 
                <div class="row">
  
                  <div class="large-12 columns">
                    
                    <div class="row">
                      <div class="large-9 columns">
                         <?php if ($page['sl_subnav']): ?>
                          <?php print render($page['sl_subnav']); ?>                   
                         <?php endif ?>
                      </div>
                      <div class="large-3 columns">
                         <?php if ($page['megamenu_event']): ?>
                         <img src="sites/default/files/styles/large/public/ns-live-logo.png" alt="NS Live" class="ns-live-logo">

                          <?php print render($page['megamenu_event']); ?>                   
                         <?php endif ?>
                      </div>
                    </div>
                    <!-- .row -->
                  
                    <div class="main-mega-menu-section">
                      <div class="large-12 columns ns-network">
                        
                        <div class="mega-menu-logo">
                          <img src="/sites/all/themes/creative-responsive-theme/images/nsnetworks.png">
                        </div>
  
                        <div class="network-sites">
                          <div class="row">
                            <div class="large-4 columns">
                              <h1>Consumer</h1>
                              <h2><a href="https://www.citymetric.com">CityMetric</a></h2>
                            </div>
                            <div class="large-4 columns">
                              <h1>Business</h1>
                              <h2><a href="https://tech.newstatesman.com/">New Statesman Tech</a></h2>
                            </div>
                            <div class="large-4 columns">
                              <h1><a href="/spotlight">Spotlight</a></h1>
                              <h2><a href="/cyber">Cyber</a></h2>
                             <!-- <h2><a href="https://www.newstatesman.com/northern-powerhouse">Northern Powerhouse</a></h2>
                              <h2><a href="https://www.newstatesman.com/skills">Skills</a></h2>
                              <h2><a href="https://www.newstatesman.com/manufacturing">Manufacturing</a></h2> <h2><a href="https://www.newstatesman.com/investment">Investment</a></h2>-->
                              <h2 class="viewall"><a href="/spotlight">View All</a></h2></h2>
                            </div>
                          </div>
                        </div>
                        <!-- .network-sites -->
                      
                      </div>
                      <!-- .ns-network -->
                    </div>
                    <!-- .main-mega-menu-section -->
                    
                  </div>
                  <!-- .large-8 -->
                  
                </div>
                <!-- .row -->
            </div>
            <!-- ns_tech-mg -->
            
			
			<div class="mega-menu-row mega-menu row event-mg"> 
                <div class="close-hover-mega-menu">Close menu</div>
                 
                <div class="row">
  
                  <div class="large-12 columns">
                    
                    <div class="row">
                      
                         <?php if ($page['ev_subnav']): ?>
                          <?php print render($page['ev_subnav']); ?>               

                         <img src="sites/default/files/styles/large/public/ns-live-logo.png" alt="NS Live" class="ns-live-logo">

                         <?php endif ?>
                     
                    </div>
                    <!-- .row -->
                  
                    <div class="main-mega-menu-section">
                      <div class="large-12 columns ns-network">
                        
                        <div class="mega-menu-logo">
                          <img src="/sites/all/themes/creative-responsive-theme/images/nsnetworks.png">
                        </div>
  
                        <div class="network-sites">
                          <div class="row">
                            <div class="large-4 columns">
                              <h1>Consumer</h1>
                              <h2><a href="https://www.citymetric.com">CityMetric</a></h2>
                            </div>
                            <div class="large-4 columns">
                              <h1>Business</h1>
                              <h2><a href="https://tech.newstatesman.com/">New Statesman Tech</a></h2>
                            </div>
                            <div class="large-4 columns">
                              <h1><a href="/spotlight">Spotlight</a></h1>
                              <h2><a href="/cyber">Cyber</a></h2>
                             <!-- <h2><a href="https://www.newstatesman.com/northern-powerhouse">Northern Powerhouse</a></h2>
                              <h2><a href="https://www.newstatesman.com/skills">Skills</a></h2>
                              <h2><a href="https://www.newstatesman.com/manufacturing">Manufacturing</a></h2> <h2><a href="https://www.newstatesman.com/investment">Investment</a></h2>-->
                              <h2 class="viewall"><a href="/spotlight">View All</a></h2></h2>
                            </div>
                          </div>
                        </div>
                        <!-- .network-sites -->
                      
                      </div>
                      <!-- .ns-network -->
                    </div>
                    <!-- .main-mega-menu-section -->
                    
                  </div>
                  <!-- .large-8 -->
                  
                </div>
                <!-- .row -->
            </div>
            <!-- events -->
			
			
			 <div class= 'tns-evo-profile'>
              <?php
                $paywall_profile = module_invoke('paywall', 'block_view', 'ev-paywall');
                echo $paywall_profile;
              ?>
            </div>
			
            </div>
            
            <?php if ($page['subnav']): ?>
            <div class="sub-nav">
              <div class="row">
                <div class="sub-nav-toggle">Sub categories</div>
                <ul class="sub-categories">
                  <?php print render($page['subnav']); ?>
                </ul>
                <div class="filter-by clearfix">
                  <p>Filter by:</p>
                  <h4>Author</h4>
                  <?php print render($page['filterby']); ?> </div>
                <!-- .filter-by --> 
              </div>
              <!-- .row --> 
            </div>
            <!-- .sub-nav -->
            <?php endif?>
            
            <div class="search-toggle">Search</div>
            <div class="site-search"><?php print render($page['search']); ?></div>
            <div class="mega-menu-toggle mobile-mega-menu-toggle">Menu</div>
            
        </nav>

</header>
 
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
    <div class="row">
      <div class="large-8 columns home-latest-articles article-column"> 

	         <div class="home-featured-article">
            <?php print render($page['home_featured_image']); ?>
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
		 
  	   	  <div class="the-latest-author popular-authors">
            <?php print render($page['the_latest']); ?>
          </div>
        <!-- .the-latest -->
         
		    <?php if ($page['sidebar_second_trending']): ?>
            <div class="secondary-content-box most-popular">
              <h2 class="scb-heading">Most Popular</h2>
              <?php print render($page['sidebar_second_trending']); ?>
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
          
      			<div class="secondary-content-box desktop-banner mpu"> 			
        			<iframe width="100%" height="680" style="max-width: 370px; margin: 0 auto; overflow: hidden;" src="https://www.verdict.co.uk/brexit-tracker-embed/" frameborder="0" allowfullscreen="" scrolling="no" class="verdict-brexit-widget"></iframe>
                <style>
                    .verdict-brexit-widget {
                      height: 680px;
                    }
                </style>
      			</div>
            
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
        
      </div>

      <div class="subscribe-toggle"><a href="https://subscribe.newstatesman.com/?utm_source=onsite&utm_medium=adhesiontab&utm_campaign=subscribe">SUBSCRIBE</a></div>
	   <div class="sidebar-toggle">More</div>
    </div>
  </div>
</div>
</div>


<footer class="site-footer site-footer-hidden">
<p>&copy; New Statesman 1913 - <?php echo date("Y"); ?></p> <div class="toggle footer-links-toggle">About us</div>
  <?php if ($page['footer']): ?>
  <div id="foot"> <?php print render($page['footer']) ?> </div>  
   <?php endif; ?>
</footer>

