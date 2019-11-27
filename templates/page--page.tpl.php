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
 
// dsm($node);
 
?>
<?php //if ($page['topnav']): ?> 
 <!-- 
<div class="row">
        <div class="partners">
              <div class="large-12 columns">
                  <div class ="gibraltar-logo">
                    <a href="/gibraltar/"><img src="/sites/all/themes/creative-responsive-theme/images/gibraltar.png" alt="Gibraltar"></a>
                   </div>
                   <div class ="philips">
                    <a href="/livinghealth/"><img src="/sites/all/themes/creative-responsive-theme/images/philips.jpg" alt="Philips"></a>
                  </div>

              </div>    
      </div>
 </div>
-->


<div id='div-out_of_banner'> 
  <script type='text/javascript'>
googletag.display('div-out_of_banner');
</script> 
</div>

<div class="mobile-banner header-mobile-banner" style="text-align: center;">
  <div id='div-gpt-ad-1438880573916-1'>
  <script type='text/javascript'>
    googletag.cmd.push(function() { googletag.display('div-gpt-ad-1438880573916-1'); });
  </script> 
  </div>
</div>


<!-- .top-leaderboard -->

<?php include_once( path_to_theme() . '/includes/header.php' ); ?>

<!-- chcek if donation payed cookie is set on the thank-you page -->

  <?php 
if(arg(0)== 'node')
    if(arg(1)=='300558') {?> <body onLoad="setDonationComplainCookie();"><?php } 
    elseif(arg(1)=='300872') {?> <body onload="setDonationSubscriberCookie();"><?php } 
    else {?> <body onload="checkCookie();"><?php } ?>
     
     
<!--donation cookie end-->

  <?php   
if(!empty ($node)) {
$image = field_get_items('node', $node, 'field_node_image');
       
if(is_array($image)){    
$image[0]['width']='';
//$image[0]['height']='';
        $img_new = field_view_value('node', $node, 'field_node_image', $image[0], array(
          'type' => 'image',
          'settings' => array(
         //  'image_style' => 'home_lead_image', //place your image style here
          //     'width' => '',
           //    'height' => '',            
          ),

        ));
		$img = render($img_new);
}     
//$node_url = drupal_get_path_alias("node/$node->nid");
if(!empty ($img)){
  print '<div class="row page-featured-image parallax-layer parallax-layer-back">'.$img.'</div>'; }
//  return $img;
} 
  ?>
  



<div id="container">
  <?php if ($page['featured_cat_image']): ?>
  <div class="article-featured-image"> <?php print render($page['featured_cat_image']); ?> </div>
  <?php endif; ?>
  <?php if ($page['author']): ?>
  <div class="article-featured-image"><?php print render($page['author']); ?></div>
  <?php endif; ?>
</div>
</div>
<?php if ($page['content_top']): ?>
<div class="row home-most-read">
  <div class="large-12 columns"><?php print render($page['content_top']); ?></div>
</div>
<?php endif ?>
<!-- Banner --> 

<!-- content-sidebar-wrap  -->
<div class="row" >
  <div class="large-8 columns article-column" style="background:none">
    <div id="content" class="row"> <?php print $messages; ?>
      <section id="post-content" role="main" class="article-body"> <?php print render($title_prefix); ?>
		  
       <?php 
        if($node->nid == 309868) { ?>

        <h1 class="page-title"><!-- @Title --></h1>

        <div class="field-item even" property="content:encoded">
       

          <script type="text/javascript" async="true" src="https://fo-static.omnitagjs.com/otp.js"></script>
          <div class="article-category" style="font-size: 25px;"> <!-- @Author --> </div>
         
          <!-- @Content -->
        </div>
          
        <?php 
        }else{

          if ($title): 
            if ($title!="Spotlight"): ?>
				      <h1 class="page-title"><?php print $title; ?></h1>
			<?php endif; ?>
        
      <?php endif; ?>
        <?php print render($title_suffix); ?>
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

      <?php  } ?>
      </section>
      <!-- /#main --> 
    </div>
  </div>
  <?php /*?><div class="large-4 columns right-sidebar">
    <div class="scrolling-content clearfix">
      <aside id="sidebar-second" role="complementary"> <?php print render($page['home_featured']); ?>
        <div class="secondary-content-box email-newsletter-box">
          <h4 class="scb-heading email-newsletter-toggle cat-email-newsletter-toggle">Subscribe to our newsletter</h4>
          <img src="<?php print base_path() . drupal_get_path('theme', 'creative_responsive_theme') . '/images/newstatesman_email_newsletter.png'; ?>" alt="New Statesman email newsletter" /> <?php print render($page['newsletter']); ?> </div>
        <div class="offer-scroll-box"> <?php print render($page['home_featured']); ?>
          <div class="secondary-content-box email-newsletter-box">
            <h4 class="scb-heading email-newsletter-toggle cat-email-newsletter-toggle">Subscribe to our newsletter</h4>
            <img src="<?php print base_path() . drupal_get_path('theme', 'creative_responsive_theme') . '/images/newstatesman_email_newsletter.png'; ?>" alt="New Statesman email newsletter" /> <?php print render($page['newsletter']); ?> </div>
        </div>
        <div class="secondary-content-box desktop-banner mpu"> 
          <!-- Newstatesman/Homepage -->
          <div id='div-gpt-ad-1438880573916-1'> 
            <script type='text/javascript'>
googletag.display('div-gpt-ad-1438880573916-1');
</script> 
          </div>
        </div>
        <!-- .mpu -->
        
        <?php if ($page['sidebar_second_trending']): ?>
        <div class="secondary-content-box most-popular">
          <h2 class="scb-heading">Most Popular</h2>
          <ul class="tabs" data-tab>
            <li class="tab-title active"><a href="#panel1">Last hour</a></li>
            <li class="tab-title"><a href="#panel2">Last 24 hours</a></li>
          </ul>
          <div class="tabs-content">
            <div class="content active trending-box" id="panel1">
              <!--(most popular from past hour)-->
              <div class="trending-box"> <?php print render($page['sidebar_second_trending']); ?> </div>
            </div>
            <div class="content trending-box" id="panel2">
                <!--(most popular from past 24 hours)-->
                <div class="trending-box"><?php print render($page['sidebar_second_trending']); ?> </div>
            </div>
          </div>
        </div>
        <!-- .most-popular -->
        <?php endif; ?>
        
        <?php if ($page['sidebar_second_youmay']): ?>
        <div class="secondary-content-box you-may-have-missed"> <?php print render($page['sidebar_second_youmay']); ?> </div>
        <?php endif; ?>
        <?php if ($page['sidebar_second']): ?>
        <div class="secondary-content-box"><?php print render($page['sidebar_second']); ?></div>
        <?php endif; ?>
      </aside>
      <!-- #sidebar-first --> 
      
    </div>
    <div class="secondary-content-box desktop-banner mpu elevator-banner clearfix">
      <div class="double-mpu-placeholder"> 
        
        <!-- Newstatesman/Homepage --> 
        <!--<div id='div-160-600-sky'>
<script type='text/javascript'>
googletag.display('div-160-600-sky');

</script>
</div>-->
        <div class="mobile-banner desktop-and-mobile-banner mpu">
          <div class="double-mpu-placeholder"> 
            <!-- Newstatesman/Homepage -->
            <div id="div-gpt-ad-1440520291949-2"> 
              <script type="text/javascript">
googletag.display("div-gpt-ad-1440520291949-2");
</script> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="sidebar-toggle">More</div><?php */?>
  
  
  
  
  

                      
            
          
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
                  <?php print render($page['sidebar_second_trending']); ?>
                 <?php /*?> <div class="sidebar-sponsored-article">
                    <div class="row">
                      <div class="large-4 columns">
                        <a href="https://www.newstatesman.com/2015/10/what-government-s-role-fight-against-cancer"><img src="/sites/all/themes/creative-responsive-theme/images/cancer.jpg" alt="Cancer"></a>
                      </div>
                      <div class="large-8 columns">
                        <h5><a href="https://www.newstatesman.com/2015/10/what-government-s-role-fight-against-cancer">‘What is the Government's role in the fight against cancer?’</a></h5>
                        <div class="article-author"><a href="https://www.newstatesman.com/writers/320828">LARUSHKA MELLOR</a></div>
                      </div>
                    </div>
                  </div><?php */?>
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
                  <?php print render($page['sidebar_second_youmay']); ?> </div>
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
            
         <div class="subscribe-toggle"><a href="https://subscribe.newstatesman.com/?utm_source=onsite&utm_medium=adhesiontab&utm_campaign=subscribe">SUBSCRIBE</a></div>
          <div class="sidebar-toggle">More</div>
         
       
  

</div>
</div>
</div>
</div>


<?php include( path_to_theme() . '/includes/footer.php'); ?>