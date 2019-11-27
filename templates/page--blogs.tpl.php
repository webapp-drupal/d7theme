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
global $base_url;
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
 function shownewsform(id)
   {
	 var cls = document.getElementById(id).getAttribute("class");
     var n = cls.indexOf("email-newsletter-revealed");
    if(n < 0)
    document.getElementById(id).setAttribute("class",cls+" email-newsletter-revealed");
    else
	 document.getElementById(id).setAttribute("class",cls.substr(0,n));
     return;



  }
/*  jQuery(".email-newsletter-toggle").click(function(){
	nlid = this.id;
  nids = nlid.split('_');
  nids = nids[1];
  n = '#showhidenews_'+nids;
  jQuery(n).toggleClass("email-newsletter-revealed");
});
*/

  </script>

         <script>
                  /*function checktheval(sel_val){

   var my_selector = '.field-name-body div.field-item > p:nth-last-of-type('+sel_val+')';
  if(jQuery(my_selector).html().length<1){
    //return 1;
      sel_val++;
    checktheval(sel_val);
  }else{
	  console.log(my_selector);
    return my_selector;
  }
}*/


jQuery(document).ready(function($) {


//alert("ok blog dsfsd");
	  //check_sel = checktheval(3);
	  //console.log("=====================");
	 //console.log(check_sel);
// jQuery( "div.story_related" ).insertAfter(check_sel);
var currentNid = Drupal.settings.custommodule.currentNid;
jQuery( "#node-"+currentNid+" div.story_related_"+currentNid ).insertAfter( ".field-name-body p:eq(3)" );
var te=jQuery("#node-"+currentNid+ " #related-story-wraper").html();
jQuery("div.story_related_"+currentNid+" #"+currentNid+"related_story").append(te);


//console.log("=====================");
 // console.log(te);
 // console.log("=====================");
 // console.log( "#node-"+currentNid+ " div."+currentNid+"story_related" );
 // console.log("#node-"+currentNid+" div."+currentNid+"story_related #"+currentNid+"related_story");


 });



</script>

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

<div id="content" >
  <div id="container" class="parallax">
   <?php /*?> <?php if ($page['featured_cat_image']): ?>
    <div class="article-featured-image parallax-layer parallax-layer-back"><?php print render($page['featured_cat_image']); ?></div>
    <?php endif; ?><?php */?>


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
                <?php print render($page['content']); ?>


 <?php /*?> long read  <?php // dsm($node);
  if($node->field_long_reads['und'][0]['value'] == 1)
  {
  print render($page['content_bottom_longreads']);
 // echo 'long read';
  } else
  {
      print render($page['content_bottom']);
	//  echo 'defaulr';
  }
      ?><?php */?>

<?php if((!empty($node->field_categories)) && ($node->field_categories['und'][0]['tid']!='8373')) { print render($page['content_bottom']); } ?> </div>
    </div>
    <!-- .content
  </div>
</div> -->



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
        <p>&copy; New Statesman 1913 - <?php echo date("Y"); ?></p>
	<div class="toggle footer-links-toggle">About us</div>
	 <?php if ($page['footer']): ?>
	<div id="foot">
	 <?php print render($page['footer']) ?>
	</div>
   <?php endif; ?>
</footer>
<!--<script type="text/javascript">
var url=window.location.href;
window.onscroll = function(){
 var scrurl = window.location.href;
 if(scrurl === url){

 }
 else{
   var adds = document.getElementsByClassName('scrolling-content');
   for(var i=0;i<adds.length;i++){
    var elems = adds[i].getElementsByClassName('ayl_v_ckr_b');

    //console.log(elems);
    for(var j=0;j<elems.length;j++)
       {
     if(j==0){}
     else
           {
      elems[j].outerHTML='';
      delete elems[j];
           }
       }
   }
 }
}
</script>--->
<!--<script type="text/javascript" id="dianomi_video_script" src="https://www.dianomi.com/js/videofeed.js"></script>--->