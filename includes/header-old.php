<!-- marketingunit.tpl.php -->

<header class="site-header clearfix">
  <div class="row">
    <h1 class="site-logo">
      <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><img src="/sites/all/themes/creative-responsive-theme/images/newstatesman_logo@2x.png" alt="New Statesman"/></a>
      <?php endif; ?>
    </h1>
    <?php print render($page['ns_offers']); ?>
    <?php print render($page['carouselevent']); ?>  
    <?php @include_once('custom/carousel-promotion-top--default.html'); ?>
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
  
                  <?php /*?><div class="large-3 columns email-signup">
                    <h2 class="scb-heading">Sign up to our email newsletter</h2>
                    <?php print render($page['newsletter']); ?>
                    <div class="find-us-on-social">
                        <h2 class="scb-heading">Find us on social</h2>
                        <ul class="follow-us">
                           <li class="twitter-link"><a href="https://twitter.com/newstatesman">Newstatesman Twitter page</a></li>
                           <li class="facebook-link"><a href="https://facebook.com/newstatesman">Newstatesman Facebook page</a></li>
                           <li class="tumblr-link"><a href="https://newstatesman.tumblr.com/">Newstatesman Tumblr page</a></li>
                           <li class="google-plus-link"><a href="https://plus.google.com/+newstatesman/">Newstatesman Google Plus page</a></li>
                         </ul>
                    </div>
                    <!-- .find-us-on-social -->
                  </div><?php */?>
                  <!-- .email-sign-up -->
                  
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
              <!-- .politics-mg -->
  
            <div class="mega-menu-row mega-menu row culture-mg">
                <div class="close-hover-mega-menu">Close menu</div>
                 
                <div class="row">
  
                  <?php /*?><div class="large-3 columns email-signup">
                    <h2 class="scb-heading">Sign up to our email newsletter</h2>
                    <?php print render($page['newsletter']); ?>
                    <div class="find-us-on-social">
                        <h2 class="scb-heading">Find us on social</h2>
                        <ul class="follow-us">
                           <li class="twitter-link"><a href="https://twitter.com/newstatesman">Newstatesman Twitter page</a></li>
                           <li class="facebook-link"><a href="https://facebook.com/newstatesman">Newstatesman Facebook page</a></li>
                           <li class="tumblr-link"><a href="https://newstatesman.tumblr.com/">Newstatesman Tumblr page</a></li>
                           <li class="google-plus-link"><a href="https://plus.google.com/+newstatesman/">Newstatesman Google Plus page</a></li>
                         </ul>
                    </div>
                    <!-- .find-us-on-social -->
                  </div><?php */?>
                  <!-- .email-sign-up -->
                  
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
  
                  <?php /*?><div class="large-3 columns email-signup">
                    <h2 class="scb-heading">Sign up to our email newsletter</h2>
                    <?php print render($page['newsletter']); ?>
                    <div class="find-us-on-social">
                        <h2 class="scb-heading">Find us on social</h2>
                        <ul class="follow-us">
                           <li class="twitter-link"><a href="https://twitter.com/newstatesman">Newstatesman Twitter page</a></li>
                           <li class="facebook-link"><a href="https://facebook.com/newstatesman">Newstatesman Facebook page</a></li>
                           <li class="tumblr-link"><a href="https://newstatesman.tumblr.com/">Newstatesman Tumblr page</a></li>
                           <li class="google-plus-link"><a href="https://plus.google.com/+newstatesman/">Newstatesman Google Plus page</a></li>
                         </ul>
                    </div>
                    <!-- .find-us-on-social -->
                  </div><?php */?>
                  <!-- .email-sign-up -->
                  
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
  
                  <?php /*?><div class="large-3 columns email-signup">
                    <h2 class="scb-heading">Sign up to our email newsletter</h2>
                    <?php print render($page['newsletter']); ?>
                    <div class="find-us-on-social">
                        <h2 class="scb-heading">Find us on social</h2>
                        <ul class="follow-us">
                           <li class="twitter-link"><a href="https://twitter.com/newstatesman">Newstatesman Twitter page</a></li>
                           <li class="facebook-link"><a href="https://facebook.com/newstatesman">Newstatesman Facebook page</a></li>
                           <li class="tumblr-link"><a href="https://newstatesman.tumblr.com/">Newstatesman Tumblr page</a></li>
                           <li class="google-plus-link"><a href="https://plus.google.com/+newstatesman/">Newstatesman Google Plus page</a></li>
                         </ul>
                    </div>
                    <!-- .find-us-on-social -->
                  </div><?php */?>
                  <!-- .email-sign-up -->
                  
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

<!--END marketingunit.tpl.php -->



<!-- conference_liberal.tpl.php -->

<header class="site-header clearfix">
  <div class="row">
    <h1 class="site-logo">
      <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><img src="/sites/all/themes/creative-responsive-theme/images/newstatesman_logo@2x.png" alt="New Statesman"/></a>
      <?php endif; ?>
    </h1>
    <?php print render($page['ns_offers']); ?>
   <div class="header-promotion">
      
      <!--
      <div>
        <div class="site-sponsor site-sponsor-gibraltar">
      <p>Visit our partner site</p>
      <a href="/gibraltar/"><img src="/sites/all/themes/creative-responsive-theme/images/gibraltar.png" alt="Gibraltar"></a>
    </div>
      </div>
      -->
      
        <!-- <div class="podcast-promotion srsly-podcast">
          <a href="/srsly/">
          <small>SRSLY</small>
          <span>Podcast</span></a>
        </div>
        .podcast-promotion 
      </div>-->
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
        <div class="conferences-promotion">
          <a href="/conferences_conservative/">
            <img src="/sites/all/themes/creative-responsive-theme/images/conferences_2015.png" alt="Conferences 2015">
          </a>
        </div>
        <!-- .newsletter-promotion -->
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
            <div class="site-search"><?php print render($page['search']); ?></div>
            <div class="mega-menu-toggle mobile-mega-menu-toggle">Menu</div>
            
        </nav>
</header>

<!--END conference_liberal.tpl.php -->


<!-- conferences_conservative.tpl.php -->

<header class="site-header clearfix">
  <div class="row">
    <h1 class="site-logo">
      <?php if ($logo): ?>
      <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><img src="/sites/all/themes/creative-responsive-theme/images/newstatesman_logo@2x.png" alt="New Statesman"/></a>
      <?php endif; ?>
    </h1>
    <?php print render($page['ns_offers']); ?>
   <div class="header-promotion">
      
      <!--
      <div>
        <div class="site-sponsor site-sponsor-gibraltar">
      <p>Visit our partner site</p>
      <a href="/gibraltar/"><img src="/sites/all/themes/creative-responsive-theme/images/gibraltar.png" alt="Gibraltar"></a>
    </div>
      </div>
      -->

        <!-- <div class="podcast-promotion srsly-podcast">
          <a href="/srsly/">
          <small>SRSLY</small>
          <span>Podcast</span></a>
        </div>
        .podcast-promotion 
      </div>-->
       <?php print render($page['carouselevent']); ?>  
      <div>
        <div class="conferences-promotion">
          <a href="/conferences_conservative/">
            <img src="/sites/all/themes/creative-responsive-theme/images/conferences_2015.png" alt="Conferences 2015">
          </a>
        </div>
        <!-- .newsletter-promotion -->
      </div>
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
            <div class="site-search"><?php print render($page['search']); ?></div>
            <div class="mega-menu-toggle mobile-mega-menu-toggle">Menu</div>
            
        </nav>
</header>

<!--END conferences_conservative.tpl.php -->


