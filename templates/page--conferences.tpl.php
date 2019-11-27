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

<div id="container" class="promotion-theme">
  <?php if(arg(0) == 'conferences'): ?>
  <div class="article-featured-image">
   <?php ?> <h1>Conferences</h1>
    <div class="article-featured-image"><?php ?>
	
	<?php print render($page['event_lead_image']) ?>
	<?php ?> <img src="<?php print base_path() . drupal_get_path('theme', 'creative_responsive_theme') . '/images/new_statesman_events.jpg'; ?>" >
    
     </div><?php ?>
  </div>
  <?php endif ?>
  <!-- Banner --> 
  
  <!-- content-sidebar-wrap  -->
    <?php if(arg(0) == 'conferences'): ?>
  <div class="main-content has-featured-article">
 <?php endif ?>
          <div class="row">
    <div class="large-12 columns">
      <div id="content" class="row">
      
       <?php if(arg(0) == 'conferences'): ?>
                 <aside class="large-2 columns article-meta"> <br />
                  <div class="events-theme">
               <?php print render($page['event_aside']) ?> 
               </div>   
                  <!-- .call-conferences -->
                  
            
                  <ul class="share-buttons">
                                <li class='facebook-button st_facebook_hcount'><a target="_blank" href='https://www.facebook.com/sharer.php?u=<?php echo $base_url?>/conferences &t=Conferences'  >
                                <span class="stButton">
                                <span class="stMainServices st-facebook-counter">&nbsp;</span> 
                                <span class="stArrow"><span class="stBubble_hcount"><?php //echo ($f_count); ?></span></span></span> </a></li>  
                                              
                                <li class='twitter-button st_twitter_hcount'><a target="_blank" href='https://twitter.com/share?url=<?php echo $base_url?>/conferences' >
                                <span class="stButton">
                                <span class="stMainServices st-twitter-counter">&nbsp;</span> 
                                <span class="stArrow"><span class="stBubble_hcount"><?php //echo ($t_count); ?></span></span></span></a>  </li>
                                
                                <li class='reddit-button st_reddit_hcount' ><a target="_blank" href='https://www.reddit.com/submit?url=<?php echo $base_url ?>/conferences &title=Conferences'  >
                                <span class="stButton">
                                <span class="reddit-button st_reddit_hcount">  &nbsp;</span> 
                                <span class="stArrow"><span class="stBubble_hcount"> <?php //echo ($r_count); ?></span></span></span></a> </li>
                         <!--   <li class="email-button st_email_hcount"><a href="mailto:type email address here?subject=<?php //echo $title; ?>" title="Email to a friend/colleague"> -->
                                     <li class="email-button st_email_hcount"><a href="mailto:type email address here?subject=<?php echo $title; ?> &body=<?php echo $base_url.'/conferences';?>&#32;&#32;" title="Email to a friend/colleague"> 
                                <span class="stButton" >
                                      <span class="stMainServices st-mail-counter">&nbsp;</span> 
                                <span class="stArrow"><span class="stBubble_hcount"></span></span></span></a></li></a></li>
                              <?php print render($content['links']); ?>
                 </ul>
                <!-- .share-buttons -->
   </aside>              

             <?php endif ?> 
             <?php if(arg(0) == 'conferences') { ?>
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
<?php if(arg(0) == 'conferences_labour'): ?>
</div>
 <?php endif; ?>
<?php include( path_to_theme() . '/includes/footer.php'); ?>
