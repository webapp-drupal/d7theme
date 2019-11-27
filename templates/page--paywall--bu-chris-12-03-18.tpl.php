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





<header class="site-header clearfix checkout-header">
  <div class="row">
    <div class="large-2 columns">
      <div class="site-logo">
  		  <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
    			<img src="/sites/all/themes/creative-responsive-theme/images/newstatesman_logo@2x.png" alt="New Statesman"/>
    		 </a>
      </div>
    </div>
    <div class="large-10 columns">
      <p class="secure-text">You are using a secure website.</p>
    </div>
  </div>
</header>

<div id="container checkout-container">
  <div class="row">
    <div class="large-12 columns">
      <?php print $messages; ?>
	      <section id="post-content" role="main" class="article-body"> <?php print render($title_prefix); ?>
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
	      </section>
	  </div>
	</div>
</div>

<footer class="site-footer site-footer-hidden">
  <p>&copy; New Statesman 1913 - <?php echo date("Y"); ?></p>
  <div class="toggle footer-links-toggle">About us</div>
  <?php if ($page['footer']): ?>
  <div id="foot"> <?php print render($page['footer']) ?> </div>
  <?php endif; ?>
</footer>