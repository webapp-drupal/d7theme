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
Global $base_url; ?>

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
            <?php /*?> <ul class="site-categories clearfix"> <?php if ($page['topnav']): ?> <?php print render($page['mainnav']); ?><?php endif?></ul><?php */?>
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
                         <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/ns-live-logo.png" alt="NS Live" class="ns-live-logo">
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
                         <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/ns-live-logo.png" alt="NS Live" class="ns-live-logo">
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
                         <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/ns-live-logo.png" alt="NS Live" class="ns-live-logo">
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
                         <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/ns-live-logo.png" alt="NS Live" class="ns-live-logo">
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
                         
                      
                         <img src="https://www.newstatesman.com/sites/default/files/styles/large/public/ns-live-logo.png" alt="NS Live" class="ns-live-logo">
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
			
			<!-- Evlock Login and registration buttons ---->
			<div class= 'tns-evo-profile'>
				<?php
				  $paywall_profile = module_invoke('paywall', 'block_view', 'ev-paywall');
				  if($paywall_profile != Null){
					echo $paywall_profile;
				  }
				?>
		  </div>
		  <!-- Evlock Login and registration buttons ----->
		  
            <div class="site-search"><?php print render($page['search']); ?></div>
            <div class="mega-menu-toggle mobile-mega-menu-toggle">Menu</div>
            
        </nav>
</header>

<div id="container" class="conferences-theme">
  <?php if(arg(0) == 'conferences2018_scottish'): ?>
  <div class="article-featured-image">
   <?php ?> <h1>SNP</h1>
    <div class="article-featured-image">	<?php 
$imgpath = "https://www.newstatesman.com/sites/all/themes/creative-responsive-theme/images/conference_scottish.jpg" ; 
$fimage = array(
  '#tag' => 'meta', 
  '#attributes' => array(
    'property' => 'og:image',
    'content' => $imgpath,
	'width' => '500px',
  ),
); 
drupal_add_html_head($fimage, 'og_image'); 

	
	?>
	
	<?php print render($page['event_lead_image']) ?>
	<?php ?> <img src="<?php print base_path() . drupal_get_path('theme', 'creative_responsive_theme') . '/images/conference_scottish.jpg'; ?>" >
    
     </div><?php ?>
  </div>
  <?php endif ?>
  <!-- Banner --> 
  
  <!-- content-sidebar-wrap  -->
    <?php if(arg(0) == 'conferences2018_scottish'): ?>
  <div class="main-content has-featured-article">
 <?php endif ?>
          <div class="row">
    <div class="large-12 columns">
      <div id="content" class="row">
      
       <?php if(arg(0) == 'conferences2018_scottish'): ?>
                 <aside class="large-2 columns article-meta"> <br />
               <?php print render($page['event_aside']) ?>    
                  <!-- .call-conferences -->
                  
            
                  <ul class="share-buttons">
                                <li class='facebook-button st_facebook_hcount'><a target="_blank" href='https://www.facebook.com/sharer.php?u=<?php echo $base_url?>/conferences2017_scottish &t=Conferences'  >
                                <span class="stButton">
                                <span class="stMainServices st-facebook-counter">&nbsp;</span> 
                                <span class="stArrow"><span class="stBubble_hcount"><?php //echo ($f_count); ?></span></span></span> </a></li>  
                                              
                                <li class='twitter-button st_twitter_hcount'><a target="_blank" href='https://twitter.com/share?url=<?php echo $base_url?>/conferences2017_scottish' >
                                <span class="stButton">
                                <span class="stMainServices st-twitter-counter">&nbsp;</span> 
                                <span class="stArrow"><span class="stBubble_hcount"><?php //echo ($t_count); ?></span></span></span></a>  </li>
                                
                                <li class='reddit-button st_reddit_hcount' ><a target="_blank" href='https://www.reddit.com/submit?url=<?php echo $base_url ?>/conferences2017_scottish &title=Conferences'  >
                                <span class="stButton">
                                <span class="reddit-button st_reddit_hcount">  &nbsp;</span> 
                                <span class="stArrow"><span class="stBubble_hcount"> <?php //echo ($r_count); ?></span></span></span></a> </li>
                         <!--   <li class="email-button st_email_hcount"><a href="mailto:type email address here?subject=<?php //echo $title; ?>" title="Email to a friend/colleague"> -->
                                     <li class="email-button st_email_hcount"><a href="mailto:type email address here?subject=<?php echo $title; ?> &body=<?php echo $base_url.'/conferences2018_scottish';?>&#32;&#32;" title="Email to a friend/colleague"> 
                                <span class="stButton" >
                                      <span class="stMainServices st-mail-counter">&nbsp;</span> 
                                <span class="stArrow"><span class="stBubble_hcount"></span></span></span></a></li></a></li>
                              <?php print render($content['links']); ?>
                 <!-- .share-buttons -->

                <!-- Back to conferences Main Page -->
                           <div class="conference-link">
                              <!--<a href="/conference2015">Back</a>--->
                              <a href="/conference2018">Back</a>
                            </div>  
                </ul>
   </aside>              

             <?php endif ?> 
             <?php if(arg(0) == 'conferences2018_scottish') { ?>
                <div class="large-10 columns"> <?php  } else { ?>
      <div class="large-12 columns main-content">
        <?php  }  ?>
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
          <?php print render($page['content']); ?> </section>
        <!-- /#main --> </div>
      </div>
    </div>
  </div>
</div>
<?php if(arg(0) == 'conferences2018_scottish'): ?>
</div>
 <?php endif; ?>
<?php include( path_to_theme() . '/includes/footer.php'); ?>
<?php /*?>      
    <div id="copyright">
     <p class="copyright"><?php print t('Copyright'); ?> &copy; <a href="https://www.newstatesman.com">New Statesman 1913 - <?php echo date("Y"); ?></a></p> 
    <div class="clear"></div>
    </div>
  </div>
  </div>
</div><?php */?>
