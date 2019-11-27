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
          //googletag.display('div-gpt-ad-1440520291949-0');
          </script> 
    </div>
  </div>
</div>
<!-- .top-leaderboard -->

<?php include_once( path_to_theme() . '/includes/header.php' ); ?>


<?php print $messages; ?>
 <div id="container" class="conferences-theme">
  <div class="article-featured-image">
   <?php ?> <h1>Conferences 2015</h1>
    <div class="article-featured-image">
	
	<?php 
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
  
  <?php ?> <img src="<?php print base_path() . drupal_get_path('theme', 'creative_responsive_theme') . '/images/new_statesman_events.jpg'; ?>" >
    
     </div><?php ?>

 </div>
<div class="row">
  

</div>
<div class="row">
  <div class="large-12 columns">
  <div class="conferences-landing-parties">
              
                <ul>
                  <li><a href="/conferences_labour/">Labour</a></li>
                  <li><a href="/conferences_conservative/">Conservatives</a></li>
                  <li><a href="/conferences_liberal/">Liberal Democrats</a></li>
                  <li><a href="/conferences_scottish">SNP</a></li>
                </ul>
              </div>
  </div>
<div class="large-12 columns conference-spacing">

  <div class="large-6 columns conference-left">
    <h2>UK Politics</h2>
<?php  print render($page['content']); ?>
 </div> 




<div class="large-6 columns conference-right"> <br />
                  <?php  print render($page['content_bottom']); ?>   


                  <div class="large-6 columns">
                  <?php print render($page['event_aside']); ?>  
                  </div>
                  <!-- .call-conferences -->
                  
                  <div class="large-6 columns">
                  <ul class="share-buttons">
                                <li class='facebook-button st_facebook_hcount'><a target="_blank" href='https://www.facebook.com/sharer.php?u=<?php echo $base_url?>/conference2015 &t=Conferences'  >
                                <span class="stButton">
                                <span class="stMainServices st-facebook-counter">&nbsp;</span> 
                                <span class="stArrow"><span class="stBubble_hcount"><?php //echo ($f_count); ?></span></span></span> </a></li>  
                                              
                                <li class='twitter-button st_twitter_hcount'><a target="_blank" href='https://twitter.com/share?url=<?php echo $base_url?>/conference2015' >
                                <span class="stButton">
                                <span class="stMainServices st-twitter-counter">&nbsp;</span> 
                                <span class="stArrow"><span class="stBubble_hcount"><?php //echo ($t_count); ?></span></span></span></a>  </li>
                                
                                <li class='reddit-button st_reddit_hcount' ><a target="_blank" href='https://www.reddit.com/submit?url=<?php echo $base_url ?>/conference2015 &title=Conferences'  >
                                <span class="stButton">
                                <span class="reddit-button st_reddit_hcount">  &nbsp;</span> 
                                <span class="stArrow"><span class="stBubble_hcount"> <?php //echo ($r_count); ?></span></span></span></a> </li>
                         <!--   <li class="email-button st_email_hcount"><a href="mailto:type email address here?subject=<?php //echo $title; ?>" title="Email to a friend/colleague"> -->
                                     <li class="email-button st_email_hcount"><a href="mailto:type email address here?subject=<?php echo $title; ?> &body=<?php echo $base_url.'/conference2015';?>&#32;&#32;" title="Email to a friend/colleague"> 
                                <span class="stButton" >
                                      <span class="stMainServices st-mail-counter">&nbsp;</span> 
                                <span class="stArrow"><span class="stBubble_hcount"></span></span></span></a></li></a></li>
                              <?php print render($content['links']); ?>
                 </ul>
                <!-- .share-buttons -->
                </div>
   </div>     
</div>


</div>



</div>

  
</div>

</div>

<footer class="site-footer site-footer-hidden">
        <p>&copy; New Statesman 1913 - <?php echo date("Y"); ?></p>
        <div class="toggle footer-links-toggle">About us</div>
        <?php if ($page['footer']): ?>
       <div id="foot">
        <?php print render($page['footer']) ?>
      </div>
   <?php endif; ?>
            </footer>