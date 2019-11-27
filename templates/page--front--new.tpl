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


            <div class="site-search"><?php print render($page['search']); ?></div>
            <div class="mega-menu-toggle mobile-mega-menu-toggle">Menu</div>
            <div class="search-toggle">Search</div>

        </nav>

        

</header>

 <?php print $messages; ?> 	  
       <main class="make_equal"> 
		 <section class="home-news">
          <div class="row">
    <div class="large-8 columns pc ">
		 <!--   <h2>News</h2> -->
	   <?php if ($page['home_content_news']): ?>  
              <?php print render($page['home_content_news']); ?>             
            <?php endif; ?>
	  </div></div></div>
	
	<div class="large-4 columns sc sidebar_home

  ">
        <div class="secondary-content-box sc-article-list from-our-writers">
            <?php print render($page['the_latest']); ?>          
	  </div>
	   <div class="secondary-content-box mpu article-mpu-1"> 
            <!-- /ca-pub-8914899523938848/New_Statesman/Unit2 -->
            <?php if(! checkmobile()){ ?>
             <div id='Unit2' class='sidebarad1'>
                <script type='text/javascript'>
                  googletag.cmd.push(function() { googletag.display('Unit2'); });
                </script>
              </div>
            <?php }?>
    </div>
	  
	   <?php if ($page['sidebar_second_trending']): ?>
            <div class="secondary-content-box most-popular">
              <h2 class="scb-heading">Most Popular</h2>
              <?php print render($page['sidebar_second_trending']); ?>
            </div>
            <!-- .most-popular -->
            <?php endif; ?>
  <!-- .most-popular -->
  	<?php print render($page['the_staggers']); ?>  
      <div class="secondary-content-box mpu article-mpu-2"> 
          <?php if(! checkmobile()){ ?>
          <div id='Unit3' class='sidebarad1'>
            <script type='text/javascript'>
              googletag.cmd.push(function() { googletag.display('Unit3'); });
            </script>
          </div>
          <?php }?>
      </div>

      <div class="secondary-content-box desktop-banner mpu brexit-tracker">      
        <iframe width="100%" height="400" style="max-width: 400px; margin: 0 auto; overflow: hidden;" src="https://www.verdict.co.uk/verdict-news-widget-embed/" frameborder="0" allowfullscreen="" scrolling="yes"></iframe>
      </div>
	  
	  <div class="secondary-content-box citymetric-ad">
              <a href="https://www.citymetric.com"><img src="/sites/all/themes/creative-responsive-theme/images/CityMetric_banner.png" alt="CityMetric"></a>
<style>.verdict-brexit-widget { height: 680px;}</style>           
		   </div>
            <!-- .citymetric-ad -->
      <div class="secondary-content-box mpu article-mpu-3"> 
              <?php if(! checkmobile()){ ?>
              <div id='Unit4' class='sidebarad1'>
                <script type='text/javascript'>
                  googletag.cmd.push(function() { googletag.display('Unit4'); });
                </script>
              </div>
              <?php } ?>
      </div>      
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
      </div>
    </div>
	  </section>
	  <!-- .home-news -->
  <section class="home-politics" style="background-image: url(<?php echo theme_get_setting('front_page_section_image_url', 'creative_responsive_theme'); ?>) !important;">
    <div class="row">
      <div class="large-8 columns pc">
  <!--  <h2>Politics</h2>-->
	   <?php if ($page['home_content_politics']): ?>
              <?php print render($page['home_content_politics']); ?>     
            <?php endif; ?>	   
</div>
 <div class="large-4 columns sc mobile-only">
        <div class="secondary-content-box mpu article-mpu-1"> 
            <!-- /ca-pub-8914899523938848/New_Statesman/Unit2 -->
            <?php if(! checkmobile()){ ?>
             <div id='Unit2' class='sidebarad1'>
                <script type='text/javascript'>
                  googletag.cmd.push(function() { googletag.display('Unit2'); });
                </script>
              </div>
            <?php }?>
        </div>
      </div>

</section>	  
	
	<!-- .home-politics -->

  <section class="home-culture">
    <div class="row">
      <div class="large-8 columns pc">
      <!--   <h2>Culture</h2>-->
	   <?php if ($page['home_content_culture']): ?><?php print render($page['home_content_culture']); ?>         
            <?php endif; ?>
			
			</div>
		
		    <!-- .pc -->
      <div class="large-4 columns sc mobile-only">
        <div class="secondary-content-box mpu article-mpu-1"> 
            <!-- /ca-pub-8914899523938848/New_Statesman/Unit2 -->
            <?php if(! checkmobile()){ ?>
             <div id='Unit2' class='sidebarad1'>
                <script type='text/javascript'>
                  googletag.cmd.push(function() { googletag.display('Unit2'); });
                </script>
              </div>
            <?php }?>
        </div>
      </div></section>
	   <!-- .home-culture -->

  <section class="home-science-tech">
    <div class="row">
      <div class="large-8 columns pc">
   <!--     
 <h2>Science &amp; Tech</h2>-->
	   <?php if ($page['home_content_scienceandtech']): ?> 
              <?php print render($page['home_content_scienceandtech']); ?>          
            <?php endif; ?>
		
		</div>
	
      <!-- .pc -->
      <div class="large-4 columns sc mobile-only">
        <div class="secondary-content-box mpu article-mpu-1"> 
            <!-- /ca-pub-8914899523938848/New_Statesman/Unit2 -->
            <?php if(! checkmobile()){ ?>
             <div id='Unit2' class='sidebarad1'>
                <script type='text/javascript'>
                  googletag.cmd.push(function() { googletag.display('Unit2'); });
                </script>
              </div>
            <?php }?>
        </div>
      </div>
    </div>
  </section>
   <!-- .home-science-tech -->
		
<?php if ($page['home_content_5']): ?>  		
  <section class="home-culture home-content-5">
    <div class="row">
      <div class="large-8 columns pc">
   <!--     
 <h2>Science &amp; Tech</h2>-->
	         
               
              <?php print render($page['home_content_5']); ?>            
          
		
		</div>
	
      <!-- .pc -->
      <div class="large-4 columns sc mobile-only">
        <div class="secondary-content-box mpu article-mpu-1"> 
            <!-- /ca-pub-8914899523938848/New_Statesman/Unit2 -->
            <?php if(! checkmobile()){ ?>
             <div id='Unit2' class='sidebarad1'>
                <script type='text/javascript'>
                  googletag.cmd.push(function() { googletag.display('Unit2'); });
                </script>
              </div>
            <?php }?>
        </div>
      </div>
    </div>
  </section>  <?php endif; ?>
  
   <?php if ($page['home_content_6']): ?>   
  <section class="home-science-tech home-content-6">
    <div class="row">
      <div class="large-8 columns pc">
   <!--     
 <h2>Science &amp; Tech</h2>-->
	       
                
              <?php print render($page['home_content_6']); ?>         
       
		
		</div>
	
      <!-- .pc -->
      <div class="large-4 columns sc mobile-only">
        <div class="secondary-content-box mpu article-mpu-1"> 
            <!-- /ca-pub-8914899523938848/New_Statesman/Unit2 -->
            <?php if(! checkmobile()){ ?>
             <div id='Unit2' class='sidebarad1'>
                <script type='text/javascript'>
                  googletag.cmd.push(function() { googletag.display('Unit2'); });
                </script>
              </div>
            <?php }?>
        </div>
      </div>
    </div>
  </section>     <?php endif; ?>

  


 
    <div class="row">
      
        <div class="large-8 newsletter_footer"> 
            <div class="row">
                <div class="large-9 columns">
                    <img class="ns-small-logo" src="https://www.newstatesman.com/sites/default/files/ns-ga_0.jpeg">
                    <span class="ns-signup-footer">Morning Call </span>
                    <div class="ns-signup-copy">
                      <h4>Get the Morning Call with Stephen Bush, free email newsletter.</h4>
                      <?php
                        $news_letter_weekly = block_get_blocks_by_region('newsletterweekly');
                        print render($news_letter_weekly);  
                      ?>
                    </div>
                </div>
                <div class="large-3 columns">
                    <img src="https://www.newstatesman.com/sites/default/files/ns_stephen_bush_byline_drawing.jpg" alt="Stephen Bush">
                </div>
            </div>
        </div>



        <div class="ns_subscribe_footer large-8">
          <div class="large-3 columns">
            <a href="/ev-subscribe"><img class="nssfi" src="<?php echo theme_get_setting('front_page_section_footer_paywall_image'); ?>"></a>
          </div>
            <div class="large-9 columns"> 
              <div class="subscription-header subscription-header-footer">
                <h1><a href="/ev-subscribe">Enlightened thinking in dark times.</a></h1>
                <p>Support 100 years of journalism and get the <span style="font-weight: bold;font-style: italic;">New Statesman</span> before it hits the newsstand.</p>
                <p><a href="/ev-subscribe">Subscribe for just £1 a week. Cancel anytime.</a></p>
            </div>
          </div>
          </a>
        </div>



    </div>
  



  </main>







  
<section id="nsfooter">
  <div class="row">
    <div class="footerwrapper">
      <div class="large-2 columns footerlogo">
       <img src="https://newstatesman.com/sites/all/themes/creative-responsive-theme/images/newstatesman_logo@2x.png" alt="">
      </div>
      <div class="large-10 columns">
        <div class="link-footer">
        <?php print render($page['footer']) ?> 
        </div>
      </div>
    </div>
    <div class="large-12">
      <div class="sociallist">
          <ul>
            <li><a href="https://www.twitter.com/newstatesman"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            <li><a href="https://en-gb.facebook.com/NewStatesman/"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
  </div>
</section>


<footer class="site-footer site-footer-hidden">
<p>&copy; New Statesman 1913 - <?php echo date("Y"); ?></p> <div class="toggle footer-links-toggle">About us</div>
  <?php if ($page['footer']): ?>
  <div id="foot"> <?php print render($page['footer']) ?> </div>
   <?php endif; ?>
</footer>
