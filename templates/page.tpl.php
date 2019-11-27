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
<?php //if ($page['topnav']):    ?>

<?php
//drupal_add_library('system', 'ui.accordion');
//drupal_add_js('jQuery(document).ready(function() {jQuery("#accordion").accordion();});','inline');
?>
<?php 
  //Vito: https://uk-cb-new-statesman.pantheonsite.io/


//if(!user_is_logged_in()){
   //list divs to display on true 
};

// else statement not realy required 
//else{
   //If we will display something instead 
};

?>
<?php if(!user_is_logged_in()): ?>
<div id='div-out_of_banner'>
  <script type='text/javascript'>
googletag.display('div-out_of_banner');
</script>
</div>
<?php endif; ?>
<?php if(arg(0) == 'long-reads'): ?>
<div class="page-taxonomy-term long-reads-theme">
<?php endif; ?>


<!-- .top-leaderboard -->

<?php include_once( path_to_theme() . '/includes/header.php' ); ?>

<!-- .top-leaderboard-replacement -->
<?php /*?><div class="menu_wrapper">
      <nav id="main-menu"  role="navigation">
        <a class="nav-toggle" href="#">Navigation</a>
        <div class="menu-navigation-container">
          <?php
          if (module_exists('i18n')) {
            $main_menu_tree = i18n_menu_translated_tree(variable_get('menu_main_links_source', 'main-menu'));
          } else {
            $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
          }
          print drupal_render($main_menu_tree);
          ?>
        </div>
        <div class="clear"></div>
      </nav><!-- end main-menu -->
    </div><?php */?>
<div id="container">
<?php if ($page['content_top']): ?>
<div class="row"> <?php print render($page['content_top']); ?></div>
<?php endif; ?>


<?php



 if ($page['featured_cat_image']) : ?>
<div class="article-featured-image">
<?php
//if ((arg(1) != 8389) || (arg(2) != 8389)){?>
<?php print render($page['featured_cat_image']); ?> </div>
<?php //} ?>
<?php endif;
?>
<?php if((arg(0) != 'taxonomy') && (arg(0) != 'long-reads') && (arg(0) != 'our-writers') && (arg(0) != 'writers') && (arg(0) != 'magazinepage') && (arg(0) != 'user') && (arg(2) != '8389')){ ?>
<?php print render($page['home_featured_image_bg']); ?>
<?php if ((arg(0) == 'node')){ ?>
<div class="main-content has-featured-article">
<div class="row">
  <?php if ($page['home_featured_image']): ?>
  <div class="large-8 columns primary-content category-column">
    <div class="toggle-image cat-toggle-image"><b>Show</b> <span>Hide</span> image</div>
    <?php print render($page['home_featured_image']); ?></div>
  <?php endif; ?>

  <?php } else { ?>
  <div class="main-content">
    <div class="row">
      <?php } ?>

        <?php } ?>
      </div>
      <!-- --!>

          <?php if ($page['author']): ?>
          <?php print render($page['author']); ?>
          <?php endif; ?>


        <!-- content-sidebar-wrap  -->
      <div class="row">
        <?php if(arg(0) != 'our-writers'){ ?>
        <!-- our wirters -->

        <div class="large-8 columns article-column primary-content">
          <div id="content" class="row"><?php print $messages; ?>
            <?php /*?>      <?php if (theme_get_setting('breadcrumbs', 'creative_responsive_theme')): ?><div id="breadcrumbs"><?php if ($breadcrumb): print $breadcrumb; endif;?></div><?php endif; ?><?php */?>
            <?php if ((arg(0) == 'taxonomy') || (arg(0) == 'long-reads') ){ ?>
              <?php
              // var_dump( drupal_get_path_alias('taxonomy/term/' . reset(taxonomy_get_parents(arg(2) ))->tid )  );
              $tax_obj = taxonomy_get_parents(arg(2) );
              $tax_name = ( !empty($tax_obj) ) ? strtolower(reset($tax_obj)->name) : NULL;
              $spotlight_term = ( $tax_name != NULL ) ? ( $tax_name == "spotlight america" ) : false; 
              ?>
            <?php if ($page['home_featured_image'] && !$spotlight_term ): ?>
            <?php print render($page['home_featured_image']); ?>
            <?php endif; } ?>
            <section id="post-content" role="main">
              <?php
		 if(arg(0) == 'node' && is_numeric(arg(1))) {
             $node = node_load(arg(1));
			 if(!empty($node) && $node->type == 'page'){ ?>
              <?php print render($title_prefix); ?>
              <?php if ($title): ?>
              <h1 class="page-title"><?php print $title; ?></h1>
              <?php endif; ?>
              <?php print render($title_suffix); ?>
              <?php  } } ?>
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
            <!-- /#main -->
          </div>
        </div>
        <!-- .primary-content -->

        <div class="large-4 columns right-sidebar">
            <div class="scrolling-content clearfix">
              <aside id="sidebar-second" role="complementary">
                <?php $philipsText= '';
                  if (arg(0) == 'taxonomy') {
                    if (arg(2) == '8373' && arg(1) == 'term') {$philipsText = 'philips';}
                  }
                ?>
                       <?php if ($philipsText == 'philips'){ ?>

                        <div class="secondary-content-box desktop-only-banner philipsText">
                            <!--<a href="/philips/"><img src="/sites/all/themes/creative-responsive-theme/images/living_health.png" alt="Philips"></a>-->
                            <p><h3>Living Health</h3></p>
                            <p>This series, in association with Philips, looks at how technology, innovation and big data are helping to improve your health and what they mean for our healthcare system and the wider UK population.</p>
                        </div>
                    <?php } ?>



                <?php if ($page['sidebar_second_trending']): ?>
                <div class="secondary-content-box most-popular">
                  <h2 class="scb-heading">Most Popular</h2>
                  <?php $most_popular_block = geolocation_render_most_popular_block(); print render($most_popular_block); ?>
                  <?php /*?><div class="sidebar-sponsored-article">
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

                <?php if ($philipsText != 'philips'){ ?>
                  <div class="secondary-content-box desktop-only-banner mpu dianomi-ad-sidebar">
                     <!-- /ca-pub-8914899523938848/New_Statesman/Unit2 -->
                      <!-- <div id='Unit2' class='sidebarad1'>
                          <script type='text/javascript'>
                            googletag.cmd.push(function() { googletag.display('Unit2'); });
                          </script>
                        </div> -->

                      <!--Smartad # 4222: New Statesman Right Rail-->
                      <iframe WIDTH="300" HEIGHT="600" SCROLLING="NO" src="//www.dianomi.com/smartads.epl?id=4222<http://www.dianomi.com/smartads.epl?id=4222>"  style="width: 300px; height: 600px; border: none; overflow: hidden;"></iframe>
                  </div>
                <?php } ?>

				 <?php $brexitText= '';
                  if (arg(0) == 'taxonomy') {
                    if (arg(2) == '8387' && arg(1) == 'term') {$brexitText = 'brexit';}
                  }
                ?>

 <?php if ($brexitText == 'brexit'){ ?>
				  	<div class="secondary-content-box desktop-banner mpu brexit-tracker">      
              <iframe width="100%" height="400" style="max-width: 400px; margin: 0 auto; overflow: hidden;" src="https://www.verdict.co.uk/verdict-news-widget-embed/" frameborder="0" allowfullscreen="" scrolling="yes"></iframe>
            </div>
			</div>
				<?php } else { } ?>

                <!-- .most-popular -->
                <div class="secondary-content-box desktop-only-banner mpu">
                    <div id='Unit3'>
                    <script type='text/javascript'>
                      googletag.cmd.push(function() { googletag.display('Unit3'); });
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



          <!-- .elevator-banner -->
          <!-- /ca-pub-8914899523938848/New_Statesman/Unit4 -->

      <div id='Unit4' class="secondary-content-box desktop-banner mpu" style="background-color: #fff; border-left: 0.1em solid rgba(0, 0, 0, 0.05); border-right: 0.1em solid rgba(0, 0, 0, 0.05);">
        <script type='text/javascript'>
          googletag.cmd.push(function() { googletag.display('Unit4'); });
        </script>
      </div>



            </div>

<div class="subscribe-toggle"><a href="https://subscribe.newstatesman.com/?utm_source=onsite&utm_medium=adhesiontab&utm_campaign=subscribe">SUBSCRIBE</a></div>
          <div class="sidebar-toggle">More</div>




</div>
    <?php } else { ?>
   <!-- <div class="row">
      <header class="authors-header">
        <h1>New Statesman Writers</h1>
      </header>
    </div>-->
    <div class="large-12 columns featured-writers">
      <h2>Featured Writers</h2>
      <section id="post-content" role="main">
        <?php
		 if(arg(0) == 'node' && is_numeric(arg(1))) {
             $node = node_load(arg(1));
			 if($node->type == 'page'){ ?>
        <?php print render($title_prefix); ?>
        <?php if ($title): ?>
        <h1 class="page-title"><?php print $title; ?></h1>
        <?php endif; ?>
        <?php print render($title_suffix); ?>
        <?php  } } ?>
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
    </div>
    <?php if ($page['ourwriters_bottom']): ?>
    <div class="large-12 columns a-z-writers">
      <h2>A-Z</h2>
      <?php print render($page['ourwriters_bottom']); ?>
      <?php endif; ?>
    </div>
    <?php } ?>
  </div>
  <?php if(arg(0) == 'long-reads'): ?>
</div>
<?php endif; ?>

<?php include( path_to_theme() . '/includes/footer-fixed.php'); ?>

<?php /*?>
    <div id="copyright">
     <p class="copyright"><?php print t('Copyright'); ?> &copy; <a href="https://www.newstatesman.com">New Statesman 1913 - <?php echo date("Y"); ?></a></p>
    <div class="clear"></div>
    </div>
  </div>
  </div>
</div><?php */?>
