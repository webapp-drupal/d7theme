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

<script>

    function load_disqus(c,path)
    {
	    //var pageurl= '?q=/node/'+c;
		//history.pushState('stateObj', "page 2", pageurl);
		history.pushState('stateObj', "page 2", path);
	   if(document.getElementById("disqus_thread"))
	   {

        var ano = document.getElementById("disqus_loader").getAttribute("class");
			  if(ano.substr(13)==c)
			  {
				   var vis = document.getElementById("disqus_thread").getAttribute("style");
				  if(vis == 'display: none;')
				  {

				  document.getElementById("disqus_thread").style.display = 'block';
					return false;
				  }
				  else{

					 document.getElementById("disqus_thread").style.display = 'none';
					return false;
				  }
			  }





	    var x = document.getElementById("disqus_thread").getAttribute("class");
	   document.getElementById("disqus_thread").setAttribute("id", x);

	    var y = document.getElementById("disqus_loader").getAttribute("class");
	   document.getElementById("disqus_loader").setAttribute("id", y);

	  // var ldr1 = document.getElementById(y);
	   //ldr1.style.display = 'Block';

	   }

      document.getElementById("disqus_thread"+c).setAttribute("id", "disqus_thread");
	  document.getElementById("disqus_loader"+c).setAttribute("id", "disqus_loader");

	  var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
      dsq.src = "https://newstatesman1913.disqus.com/embed.js";
      (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
     // var ldr = document.getElementById('disqus_loader');
     // ldr.parentNode.removeChild(ldr);
	 // ldr.style.display = 'none';

	  return false;
    }

	function showimage(id)
   {
	 var cls = document.getElementById(id).getAttribute("class");
     var n = cls.indexOf("feature-image-revealed");
    if(n < 0)
    document.getElementById(id).setAttribute("class",cls+" feature-image-revealed");
    else
	 document.getElementById(id).setAttribute("class",cls.substr(0,n));
     return;



  }


  </script>


<?php //if ($page['topnav']): ?>


<div class="leaderboard top-leaderboard">
  <div class="row">

  <!-- /ca-pub-8914899523938848/New_Statesman/Unit1 test -->
  <div id='Unit1'>
    <script type='text/javascript'>
      googletag.cmd.push(function() { googletag.display('Unit1'); });
    </script>
  </div>
  </div>
</div>
<!-- .top-leaderboard -->

<?php include_once( path_to_theme() . '/includes/header.php' ); ?>


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

    <?php if(arg(0) == 'long-reads'): ?>





<div class="node-type-longread">
   <div id="container">


  <?php if ($page['featured_cat_image']): ?><div class="article-featured-image"><?php print render($page['featured_cat_image']); ?></div>
  <?php endif; ?>

  <main>
   <?php print $messages; ?>
                <?php /*?> <?php print render($title_prefix); ?>
        <?php if ($title): ?><h1 class="page-title"><?php print $title; ?></h1><?php endif; ?>
        <?php print render($title_suffix); ?>		<?php */?>
				<?php if (!empty($tabs['#primary'])): ?>
                <div class="tabs-wrapper"><?php print render($tabs); ?></div>
                <?php endif; ?>
                <?php print render($page['help']); ?>
                <?php if ($action_links): ?>
                <ul class="action-links">
                  <?php print render($action_links); ?>
                </ul>
                <?php endif; ?>
     <div class="main-content has-featured-article">

     <div class="row">
    <?php if ($page['home_featured_image']): ?>
      <div class="large-8 columns primary-content category-column">
   <?php print render($page['home_featured_image']); ?> <div class="toggle-image"><b>Show</b> <span>Hide</span> image</div></div>
   <?php endif; ?>
     <div class="large-4 columns right-sidebar home-sidebar-top"><?php //print render($page['home_featured']); ?>
     <div class="secondary-content-box email-newsletter-box">
      <h4 class="scb-heading email-newsletter-toggle">Subscribe to our newsletter</h4>
                            <img src="<?php print base_path() . drupal_get_path('theme', 'creative_responsive_theme') . '/images/newstatesman_email_newsletter.png'; ?>" alt="New Statesman email newsletter" />
     <?php print render($page['newsletter']); ?>

     </div>



<div class="row">
   <?php if ($page['sidebar_first']): ?><div class="large-2 columns article-meta left-sidebar">
      <aside id="sidebar-first" role="complementary">
 <div class="secondary-content-box">  <?php print render($page['sidebar_first']); ?> </div>

      </aside>  <!-- /#sidebar-first -->
  </div>  <?php endif; ?>

<!-- content-sidebar-wrap  -->
<?php if (arg(0) == 'node'  && is_numeric(arg(1))) { ?>
   <!-- <div class="large-8 columns article-column" style="background:none"> -->
   <div style="background:none">
    <?php } else { ?>
        <div class="large-8 columns article-column"> <?php } ?>
    <div id="content" class="row">
<?php /*?>      <?php if (theme_get_setting('breadcrumbs', 'creative_responsive_theme')): ?><div id="breadcrumbs"><?php if ($breadcrumb): print $breadcrumb; endif;?></div><?php endif; ?><?php */?>
     <?php print $messages; ?>
     <section id="post-content" role="main">

        <?php /*?><?php print render($title_prefix); ?>
        <?php if ($title): ?><h1 class="page-title"><?php print $title; ?></h1><?php endif; ?>
        <?php print render($title_suffix); ?><?php */?>
        <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper"><?php print render($tabs); ?></div><?php endif; ?>
        <?php print render($page['help']); ?>
        <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>

        <?php print render($page['content']); ?>
      </section> <!-- /#main -->
    </div>
</div>

    <div class="large-4 columns right-sidebar">
        <div class="scrolling-content">

	    <aside id="sidebar-second" role="complementary">

		  <?php //if ($page['sidebar_second_trending']): ?>
          <div class="secondary-content-box trending-box">
            <?php //print render($page['sidebar_second_trending']); ?>
             <h2 class="scb-heading">Most Popular</h2>
            <?php print render(block_get_blocks_by_region('sidebar_second_trending'));?> </div>
          <?php // endif; ?>

		<?php if ($page['sidebar_second_youmay']): ?>  <div class="secondary-content-box you-may-have-missed">
        <?php print render($page['sidebar_second_youmay']); ?> </div>
		<?php endif; ?> <?php if ($page['sidebar_second_podcast']): ?>   <div class="secondary-content-box podcast-box">  <?php print render($page['sidebar_second_podcast']); ?> </div>
		<?php endif; ?>
		<?php if ($page['sidebar_second']): ?> <div class="secondary-content-box"><?php print render($page['sidebar_second']); ?></div><?php endif; ?>


	    </aside>
	    <!-- #sidebar-first -->

	</div>
    </div>
	<div class="subscribe-toggle"><a href="https://subscribe.newstatesman.com/?utm_source=onsite&utm_medium=adhesiontab&utm_campaign=subscribe">SUBSCRIBE</a></div>
   <div class="sidebar-toggle">More</div>
</div>
</div></div>
 </div></div>

    </main></div>
 <?php endif; ?>


  <?php if(arg(0) != 'long-reads') : ?>

    <?php /*?><?php if ($page['featured_cat_image']): ?>
  <div class="article-featured-image parallax-layer parallax-layer-back"><?php print render($page['featured_cat_image']); ?></div>
    <?php endif; ?><?php */?>


  <?php if (!empty($tabs['#primary'])): ?>
                <div class="tabs-wrapper"><?php print render($tabs); ?></div>
                <?php endif; ?>
                <?php print render($page['help']); ?>
                <?php if ($action_links): ?>
                <ul class="action-links">
                  <?php print render($action_links); ?>
                </ul>
                <?php endif; ?>

   <?php  print render($page['content']); ?>
   <?php endif; ?>
<?php print render($page['content_bottom']); ?>

<?php include( path_to_theme() . '/includes/footer.php'); ?>
