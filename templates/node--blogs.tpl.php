<?php
/**
 * @file
 * Default theme implementation to display a node.
 *
 * Available variables:
 * - $title: the (sanitized) title of the node.
 * - $content: An array of node items. Use render($content) to print them all, or
 *   print a subset such as render($content['field_example']). Use
 *   hide($content['field_example']) to temporarily suppress the printing of a
 *   given element.
 * - $user_picture: The node author's picture from user-picture.tpl.php.
 * - $date: Formatted creation date. Preprocess functions can reformat it by
 *   calling format_date() with the desired parameters on the $created variable.
 * - $name: Themed username of node author output from theme_username().
 * - $node_url: Direct url of the current node.
 * - $terms: the themed list of taxonomy term links output from theme_links().
 * - $display_submitted: whether submission information should be displayed.
 * - $classes: String of classes that can be used to style contextually through
 *   CSS. It can be manipulated through the variable $classes_array from
 *   preprocess functions. The default values can be one or more of the following:
 *   - node: The current template type, i.e., "theming hook".
 *   - node-[type]: The current node type. For example, if the node is a
 *     "Blog entry" it would result in "node-blog". Note that the machine
 *     name will often be in a short form of the human readable label.
 *   - node-teaser: Nodes in teaser form.
 *   - node-preview: Nodes in preview mode.
 *   The following are controlled through the node publishing options.
 *   - node-promoted: Nodes promoted to the front page.
 *   - node-sticky: Nodes ordered above other non-sticky nodes in teaser listings.
 *   - node-unpublished: Unpublished nodes visible only to administrators.
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 *
 * Other variables:
 * - $node: Full node object. Contains data that may not be safe.
 * - $type: Node type, i.e. story, page, blog, etc.
 * - $comment_count: Number of comments attached to the node.
 * - $uid: User ID of the node author.
 * - $created: Time the node was published formatted in Unix timestamp.
 * - $classes_array: Array of html class attribute values. It is flattened
 *   into a string within the variable $classes.
 * - $zebra: Outputs either "even" or "odd". Useful for zebra striping in
 *   teaser listings.
 * - $id: Position of the node. Increments each time it's output.
 *
 * Node status variables:
 * - $view_mode: View mode, e.g. 'full', 'teaser'...
 * - $teaser: Flag for the teaser state (shortcut for $view_mode == 'teaser').
 * - $page: Flag for the full page state.
 * - $promote: Flag for front page promotion state.
 * - $
 : Flags for sticky post setting.
 * - $status: Flag for published status.
 * - $comment: State of comment settings for the node.
 * - $readmore: Flags true if the teaser content of the node cannot hold the
 *   main body content.
 * - $is_front: Flags true when presented in the front page.
 * - $logged_in: Flags true when the current user is a logged-in member.
 * - $is_admin: Flags true when the current user is an administrator.
 *
 * Field variables: for each field instance attached to the node a corresponding
 * variable is defined, e.g. $node->body becomes $body. When needing to access
 * a field's raw values, developers/themers are strongly encouraged to use these
 * variables. Otherwise they will have to explicitly specify the desired field
 * language, e.g. $node->body['en'], thus overriding any language negotiation
 * rule that was previously applied.
 *
 * @see template_preprocess()
 * @see template_preprocess_node()
 * @see template_process()
 */


/*@$sess = "<script> document.write(sessionStorage.getItem('evolok:ev_profile')); </script>";

echo '<pre>';
//$jso = json_encode($sess);
//var_dump($sess);
echo $sess;
$str = strcmp($sess, "null");
echo $str;
/*if(strcmp(@$sess, "null") == 0){
  echo "Evolok user not logged in";
  echo "Core User Logged In";
}else{
  echo strcmp(@$sess, "null");
}*/
/*echo '</pre>';
*/
/*if(@$sess !== "null"){
  echo "Evolok User Logged In";
}else if(user_is_logged_in()){
  echo "Core User Logged In";
}else{
  echo "No User Logged In";
}*/
/*if (@$sess != 'null') {
   echo "Logged In";
}else if(user_is_logged_in()){
  echo "Logged In"
}
else {
    echo "Not logged in";
}*/

if(!empty ($node->field_node_image)) {
$imgpath = image_style_url('homesection_image', $node->field_node_image[LANGUAGE_NONE][0]['uri']);
// $imgpath = image_style_url('nodeimage', $node->field_node_image[LANGUAGE_NONE][0]['uri']);
$imgpath = ($imgpath) ? $imgpath : image_style_url('thumb_730', $node->field_node_image[LANGUAGE_NONE][0]['uri']);

$fimage = array(
  '#tag' => 'meta',
  '#attributes' => array(
    'property' => 'og:image',
    'content' => $imgpath,
  ),
);
drupal_add_html_head($fimage, 'og_image');
}
Global $base_url;
//category calss for body//
$bodyclass = '';
if (!empty($class4body)) {
  $bodyclass = $class4body;
}

if (!empty($node->field_gallery_image)) {
  $bodyclass .= ' gallery';
}
?>

<input type="hidden" name="oldcat" id="oldcat" value=""  />
<input type="hidden" name="noimage" id="noimage" value=""  />

<!--<script type="text/javascript" async="true" src="https://fo-static.omnitagjs.com/otp.js"></script>-->
<!-- New Statesman widget sidebar Desktop/Tablet -->
<!--<script type="text/javascript" async="true" src="//fo-api.omnitagjs.com/fo-api/ot.js?Placement=c478f81aae3ce0e84511bde9b10e0e2e"></script>-->
<?php if(empty ($node->field_node_image)) { ?>
<script type="text/javascript" async="true" src="//fo-api.omnitagjs.com/fo-api/ot.js?Placement=f73945131d2fdd86a659b7a2f02d24b8"></script>
<?php } ?>
<!--omn -->

<script src="//get.s-onetag.com/d70a1473-2da8-45dc-93bc-2eec7b92f5cf/tag.min.js" async defer></script>


<Script>
if(jQuery('#oldcat').val()!=''){
                jQuery(document.body).addClass(jQuery('#oldcat').val());
                }
jQuery('#oldcat').val('<?php echo $bodyclass; ?>');


//jQuery(".share-buttons").stick_in_parent({offset_top:110, recalc_every: 1});

 </script>
<?php
$imgcls ='';
if (!empty($node->field_node_image) && ($node->field_node_image['und'][0]['fid'] > 0)) {
  $imgcls = "imageexist";
}
else {
  $imgcls = "noimage";
}
?>
<Script>
if(jQuery('#noimage').val()!=''){
                jQuery(document.body).addClass(jQuery('#noimage').val());
                }
jQuery('#noimage').val('<?php echo $imgcls; ?>');


 </script>
<div class="article-featured-image parallax-layer parallax-layer-back">
<?php
//dsm(field_sponsored_page_bg);
if (!empty($node->field_sponsored_page_bg)){
$color1 = $node->field_sponsored_page_bg['und'][0]['rgb'];
}
else{
	$color1 = "#fff";
}
?>

<div class="main-content">
<div class="row">
  <article class="large-8 columns primary-content article-column">
  <div class="row">
    <?php
          if ($node->uid != '0') {
            $user = user_load($node->uid);
          }
           $field_twitter_name = field_get_items('user', $user, 'field_twitter_name');
          if ($node->type == 'story' || $node->type == 'blogs') {
                    }

          if((!empty($node->field_categories)) && ($node->field_categories['und'][0]['tid']=='8373') || ($node->nid=='300121') ) {
            echo "<div class='article-sponsored'><div class='row'>";
            echo "<div class='large-4 columns'>";
              echo '<p style="padding-top: 2em;"> In association with Philips</p></div>';
             echo '<img src="/sites/all/themes/creative-responsive-theme/images/living_health.png" alt="Philips">';
            echo '</div></div>';
          }

          if (!empty($node->field_sponsored_article) && ($node->field_sponsored_article['und'][0]['value'] == '1')) {
          $sponsored_url='';
          $sponsored_link='';
if(!empty ($field_sponsored_logo)){
            $sponsored_url = $field_sponsored_logo['und'][0]['uri'];
            $path = image_style_url('sponsored_image', $sponsored_url);
            }
          if(!empty ($field_sponsored_link)) { $sponsored_link = $field_sponsored_link['und'][0]['url']; }

            echo "<div class='article-sponsored'><div class='row'>";

           if (!empty ($sponsored_link) && !empty ($path)) {
              echo "<div class='large-4 small-4 xsmall-4 columns sponsored-logo'><a href='" . $sponsored_link . "' target='_blank' ><img src='" . $path . "'></img></a></div>";
            }

            elseif(empty ($sponsored_link) && !empty ($path)) {
              echo "<div class='large-4 small-4 xsmall-4 columns sponsored-logo'><img src='" . $path . "'></img></div>";
            }

			if (!empty ($sponsored_link) || !empty ($field_sponsored_by)) {
            if(!empty($field_select_type)) {
			echo"<div class='large-8 small-8 xsmall-8 columns sponsored-message'><h2>". $field_select_type['und'][0]['value']. "</h2>";    		 }

            if (!empty ($sponsored_link) && !empty ($field_sponsored_by)) {
              echo "<p><a href='" . $sponsored_link . "' target='_blank'>" . $field_sponsored_by['und'][0]['value'] . "</a></p>";
            }
            elseif(empty ($sponsored_link) && !empty ($field_sponsored_by)) {
              echo"<p>". $field_sponsored_by['und'][0]['value']. "</p>";
            }
			echo "</div>";
			}

            echo "</div></div>";
          }
          ?>
    <?php
     if(!empty ($subchild))
     {
         //if($subchild =="Microsites")
		 //{
		 //$article_category = "Ratnam";
		 //}
		 //else{
		 $article_category=$subchild;
		 //}
     }
     elseif (!empty ($category)) {
         $article_category=$category;
	 }
    ?>


    <div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
      <div class="row">
	  <?php
	  if ( isset($color1)){?>
        <header class="large-9 columns article-header"  style="background-color:<?php echo $color1; ?>">
	  <?php }else {?>
	 <header class="large-9 columns article-header" >

<?php }
		 //if (!empty($article_category)): ?>
          <!--<div class="article-category"> <?php //print $article_category;?> </div>-->
          <?php //endif; ?>


		   <?php if (!empty($article_category))
		   {
					if($article_category ="Microsites")
						{

							//$childs = taxonomy_get_children(8374);
							//foreach ($childs as $child) {
								//$parent_tids[] = $parent->tid;
								//$child_tids[] = $child->tid;
								//$term = taxonomy_term_load($child->tid);
								// echo "<pre>";
								// print_r($term);
								// echo "</pre>";
								//$article_category1 = l($term->name,'taxonomy/term/'.$child->tid);
								$results = db_query('SELECT tid FROM {taxonomy_index} WHERE nid = :nid', array(':nid' => $node->nid));
								foreach ($results as $result) {
									$term = taxonomy_term_load($result->tid);
									$article_category = l($term->name,'taxonomy/term/'.$result->tid);
									$catnew = $term->name;
								}
							//}
						?>
						 <div class="article-category"><?php print $article_category; /*print $subchild;*/?> </div>
						<?php
						}else
						{?>
						 <div class="article-category"><?php print $article_category; /*print $subchild;*/?>

						 </div>
						<?php
						}

		   }?>



          <!-- .article-category -->
          <?php //dsm($display_submitted); if ($display_submitted):
          if(!empty ($node->created)) {?>
          <div class="article-date">
            <?php
                    //if ($submitted) {
                      echo date("j F Y", $node->created);
                    //}
                    ?>
          </div>
          <?php } ?>
          <?php print render($title_prefix); ?>
          <h1 <?php print $title_attributes; ?> class="title inf_class" data-analyticsid="<?php print $node_url; ?>"><!-- @Title --> <?php print $title; ?></h1>
          <?php print render($title_suffix); print render($content['field_subheadline']); ?>


		  </header>
        <aside class="large-3 columns article-author" style="padding-bottom:0;">
          <?php
              $author_name = $node->name;
              $author_id = $node->uid;
              $data = node_get_author($author_name, $author_id, $node->field_authored_by, $node->field_guest_author);
          ?>
              <div class="multiple-author-images">

                <?php if (!empty($data['author']['profile_url'])) { ?>
                    <div class="author-avatar" ><img src="<?php echo $data['author']['profile_url']; ?>"></div>

                <?php  }elseif( !empty($data['author']) ){ ?>
                  <div class="author-avatar" ><img src="/nsauthorplaceholder.jpg"></div>
                <?php } ?>

                <?php if (!empty($data['sec_author']['profile_url'])) { ?>
                  <div class="author-avatar"><img src="<?php echo $data['sec_author']['profile_url']; ?>"></div>

                <?php  }elseif( !empty($data['sec_author']) ){ ?>
                  <div class="author-avatar" ><img src="/nsauthorplaceholder.jpg"></div>
                <?php } ?>

              </div>
          <div class="author-byline"><!-- @Author -->
            <?php
            if (!empty($data['author']['main'])) {  echo $data['author']['main']; }
            if (!empty($data['sec_author']['name'])) { echo $data['sec_author']['name']; }
            if (!empty($data['author']['guest'])) { echo $data['author']['guest']; } ?>
          </div>
          <?php if (!empty($data['author']['twitter']) || !empty($data['sec_author']['twitter_name'])) { ?>
          <div class="author-twitter twitter-button">
            <?php if (!empty($data['author']['twitter'])) { ?>
            <a href="<?php echo $data['author']['twitter'][0]['url'];  ?>" class="twitter-follow-button" data-show-count="false"> Follow @<?php echo $data['author']['twitter'][0]['title']; ?></a>
            <?php }
                if (!empty($data['sec_author']['twitter_name'])) {  ?>
            <a href="<?php echo $data['sec_author']['twitter_name'][0]['url'];  ?>" class="twitter-follow-button" data-show-count="false"> Follow @<?php echo $data['sec_author']['twitter_name'][0]['title']; ?></a>
            <?php
                }
                ?>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
          </div>
          <?php } ?>
        </aside>
        <!-- .article-author -->

       <div class="featured-image clearfix"><span><?php if(!empty($node->field_gallery_image)) { ?>
              <?php print render($content['field_gallery_image']);
               }?>
              <?php
             if(empty($node->field_gallery_image) ) {
             print render($content['field_node_image']);
              }?>
          </span>
             <div style="position:relative; top:-2em;"> <?php if(!empty($node->field_node_image)) { ?>
              <div class="image-credit">
                <?php   print render($content['field_nodeimage_title']); ?>
              </div>
              <?php } ?>
			  <?php if(!empty($node->field_image_caption)) { ?>
          <div class="image-caption"> <?php print render($content['field_image_caption']); ?></div>  <?php } ?></div>
      </div>
      <?php
/*
      $expande_img='';
      if($node->field_image_expanded['und'][0]['value']=='1' || !empty($node->field_gallery_image))
      {
                      $expande_img ='feature-image-revealed';
      }
  */      ?>

    </div>
    <!-- .featured-image -->

      </div>
      <!-- .row -->

      <div class="row">
        <div class="large-3 columns article-left-column">
          <div class="full-height-column">
            <ul class="share-buttons">
              <li class='facebook-button st_facebook_hcount'><a target="_blank" href=<?php print $f_share ?> > <span class="stButton"> <span class="stMainServices st-facebook-counter">&nbsp;</span> <span class="stArrow"><span class="stBubble_hcount">
                <?php //echo ($f_count); ?>
                </span></span></span> </a></li>
              <li class='twitter-button st_twitter_hcount'><a target="_blank" href=<?php print $t_share ?> > <span class="stButton"> <span class="stMainServices st-twitter-counter">&nbsp;</span> <span class="stArrow"><span class="stBubble_hcount">
                <?php //echo ($t_share); ?>
                </span></span></span></a> </li>
              <li class='reddit-button st_reddit_hcount' ><a target="_blank" href=<?php print $r_share ?> > <span class="stButton"> <span class="reddit-button st_reddit_hcount"> &nbsp;</span> <span class="stArrow"><span class="stBubble_hcount">
                <?php //echo ($r_count); ?>
                </span></span></span></a> </li>
              <li class="email-button st_email_hcount"><a href="mailto:type email address here?subject=<?php echo $title; ?> &body=<?php echo $base_url.$node_url;?>&#32;&#32;" title="Email to a friend/colleague"> <span class="stButton" > <span class="stMainServices st-mail-counter">&nbsp;</span> <span class="stArrow"><span class="stBubble_hcount"></span></span></span></a></li>
              <?php print render($content['links']); ?>
            </ul>

            <?php
            if ( isset($node->field_categories['und']))
            {
              $term_new = taxonomy_term_load($node->field_categories['und'][0]['tid']);
              $politices = $term_new->name;
              $politices_new = "Politics";

                if($politices==$politices_new)
                  {
                  echo '<div class="ns-form-item in-article-newsletter-form"><div class="ns">N<b>S</b></div><h3>Sign Up</h3><p>Get the New Statesman\'s Morning Call email.</p>';
                  $news_letter_daily = block_get_blocks_by_region('newsletter');
                  print render($news_letter_daily);
                  echo '</div>';
                 }
              else{ echo '<div class="ns-form-item in-article-newsletter-form"><h3>Sign Up</h3><p>Get the New Statesman\'s Morning Call email.</p>';
                     //print render($page['newsletterweekly']); ?> <?php //print render(block_get_blocks_by_region('newsletterweekly'));
                    $news_letter_weekly = block_get_blocks_by_region('newsletterweekly');
                  print render($news_letter_weekly);
                   echo '</div>';
              }
              /*if($politices!=$politices_new)
              {
                //if(isset($page['newsletterweekly'])){
                  echo '<div class="ns-form-item" style="margin:2em 0 -2em 0; overflow: hidden;">';
                     //print render($page['newsletterweekly']); ?> <?php //print render(block_get_blocks_by_region('newsletterweekly'));
                     //print drupal_render($page['newsletterweekly']); ?> <?php //print drupal_render(block_get_blocks_by_region('newsletterweekly'));

                   $block = module_invoke('webform', 'block_view', 'client-block-306255');
                      print render($block);


                   echo '</div>';*/
                //}
                /*echo '<div class="ns-form-item" style="margin:2em 0 -2em 0; overflow: hidden;">';
                     //print render($page['newsletterweekly']); ?> <?php //print render(block_get_blocks_by_region('newsletterweekly'));
                     print drupal_render($page['newsletterweekly']); ?> <?php print drupal_render(block_get_blocks_by_region('newsletterweekly'));
                   echo '</div>';*/
              //}
            }
                /*$cat = $node->field_categories['und'][0]['tid'];
                $term_new = taxonomy_term_load($cat);
                $politices = $term_new->name;
                $politices_new = "Politics";
                if($politices==$politices_new)
                  {
                   echo $myBlockStaggers;
                 }
              else{
                   echo $myBlock;
              }*/

                ?>
          </div>
        </div>
        <!-- .article-header-sharers -->

        <?php if (isset($color1)){?>

			<section class="large-9 columns" style="background-color:<?php echo $color1; ?>">
    <?php }else{ } ?>

            <div class="content <?php print $classes_array['1']; ?><?php print $content_attributes; ?>" style="background-color:<?php echo $color1; ?>"><!-- @Content -->
              <?php  // Hide comments, tags, and links now so that we can render them later.
                hide($content['comments']);
                hide($content['links']);
                hide($content['field_node_image']);
                hide($content['field_gallery_image']);
                hide($content['field_subheadline']);


                $contents_array = explode ("</p>", render($content));
                $p_count=1;
                $total_p = count( $contents_array );
                $last_p = ($total_p - 1);

				if(checkmobile()){


					//  print render($content);
					

					   foreach( $contents_array as $key_p_array_each=>$p_array_each ){
						    $field = field_get_items('node', $node, 'field_sponsored_logo');
							if(!empty($field)){
									//echo "Sponserd Article";
							}
							else{

								if ( $total_p > 4 && $p_count == 4 ) {
									  /*echo '<div class="article-mpu-5 unruly-video">
											  <div id="Unit3">
												<script type="text/javascript">
												  googletag.cmd.push(function() { googletag.display("Unit3"); });
												</script>
											  </div>
											</div>';*/
											echo "<div id='1x3'>
													<script type='text/javascript'>
															googletag.cmd.push(function() { googletag.display('1x3'); });
													</script>
												</div>";
								}
								if ( $total_p > 8 && $p_count == 8 ) {
										echo '<div class="dianomi-ad dianomi-ad-2"><iframe width="500" height="150" scrolling="NO" src="//www.dianomi.com/smartads.epl?id=4302" style="width: 100%; border: none; overflow: hidden;"></iframe></div>'; 
								}

								if ( $total_p > 12 && $p_count == 12 ) {
									  /*echo '<div class="article-mpu-52 unruly-video">
											<div id="Unit2">
											<script type="text/javascript">
											  googletag.cmd.push(function() { googletag.display("Unit2"); });
											</script>
										  </div>
										</div>';*/
										 echo '<div class="dianomi-ad dianomi-ad-3"><iframe width="500" height="150" scrolling="NO" src="//www.dianomi.com/smartads.epl?id=4303" style="width: 100%; border: none; overflow: hidden;"></iframe></div>'; 
								}


								 if ( $total_p > 10 && $p_count == 10 ) {
									 echo '<div class="video-inread unruly-video">
											  <div id="1x3">
											  <script type="text/javascript">
												googletag.cmd.push(function() { googletag.display("1x3"); });
											  </script>
											</div>
										  </div>';

								}

								 if ( $total_p > 25 && $p_count ==16 ) {
									 echo '<div class="video-inread1 unruly-video">
										<div id="1x1">
											  <script type="text/javascript">
												googletag.cmd.push(function() { googletag.display("1x1"); });
											  </script>
											</div>
										</div>';

										echo '<div class="video-inread2 unruly-video">
											<div id="1x2">
											  <script type="text/javascript">
												googletag.cmd.push(function() { googletag.display("1x2"); });
											  </script>
											</div>
										</div>';
								}
							  $p_count++;
							}  
							echo ( $p_array_each );
						

						}

				}else{


          foreach( $contents_array as $key_p_array_each=>$p_array_each ){
						   
						   $field = field_get_items('node', $node, 'field_sponsored_logo');
							if(!empty($field)){
									//echo "Sponserd Article";
							}
							else{

                if($node->nid == 320726 || $node->nid == 318483){
                                   
                }else{
                  if ( $total_p > 3 && $p_count == 3 ) {
                    if($_COOKIE['STYXKEY_nsversion'] === "UK" || $_COOKIE['STYXKEY_nsversion'] == "EU"){
                      echo '<div class=""><!--Smartad # 3585: New Statesman - In Article - Position 1-->
                      <iframe WIDTH="500" HEIGHT="150" SCROLLING="NO" src="//www.dianomi.com/smartads.epl?id=3585 " style="width:100%; height: 150px; border: none; overflow: hidden;"></iframe></div>';
                    }else{
                      // dianomi-ad dianomi-ad-1
                      echo '<div class=""><!--Smartad # 4306: New Statesman USA - In Article - Position 1--><iframe WIDTH="500" HEIGHT="150" SCROLLING="NO" src="//www.dianomi.com/smartads.epl?id=4306" style="width: 100% ; height: 150px; border: none; overflow: hidden;"></iframe></div>';
                    }
                  }
                    // if ( $total_p > 4 && $p_count == 4 ) {
                    //   //if(user_is_anonymous()){
                    //    /* echo '<div class="article-mpu-5 unruly-video">
                    // 			  <div id="Unit6">
                    // 				<script type="text/javascript">
                    // 				  googletag.cmd.push(function() { googletag.display("Unit6"); });
                    // 				</script>
                    // 			  </div>
                    // 			</div>';*/
                    //     //echo '<div class="dianomi-ad dianomi-ad-1"><iframe width="500" height="150" scrolling="NO" src="//www.dianomi.com/smartads.epl?id=3585" style="width: 100%; border: none; overflow: hidden;"></iframe></div>';
                    // 		echo "<div id='1x3'>
                    // 					<script type='text/javascript'>
                    // 							googletag.cmd.push(function() { googletag.display('1x3'); });
                    // 					</script>
                    // 				</div>";	
                    // }
                    if ( $total_p > 6 && $p_count == 6 ) {
                      if($_COOKIE['STYXKEY_nsversion'] == "UK" || $_COOKIE['STYXKEY_nsversion'] == "EU"){
    
                        echo '<div class=""><!--Smartad # 4302: New Statesman - In Article - Position 2-->
                        <iframe WIDTH="500" HEIGHT="150" SCROLLING="NO" src="//www.dianomi.com/smartads.epl?id=4302" style="width:100%; height: 150px; border: none; overflow: hidden;"></iframe></div>';
                      }else{
                        echo '<div class=""><!--Smartad # 4307: New Statesman USA - In Article - Position 2--><iframe WIDTH="500" HEIGHT="150" SCROLLING="NO" src="//www.dianomi.com/smartads.epl?id=4307" style="width: 100% ; height: 150px; border: none; overflow: hidden;"></iframe></div>';
                      }                  
                    }              
                    // if ( $total_p > 8 && $p_count == 8 ) {
                    // 		/*echo '<div class="video-inread unruly-video">
                    // 			  <div id="1x3">
                    // 			  <script type="text/javascript">
                    // 				googletag.cmd.push(function() { googletag.display("1x3"); });
                    // 			  </script>
                    // 			</div>
                    // 		  </div>';*/
                    // 		  /* Adding Code for Dianomi Video Ads  */
                          
                    // 		//echo '<div class="dianomi_video" data-dianomi-video-id="4675" id="dv_4675" style="margin: 0 auto; max-width: 800px;"></div>';
                          
                    // 		  /* Code end for Dianomi Video Ads */
                    // }
                    // if ( $total_p > 12 && $p_count == 12 ) {
                       
                    // 		  echo '<div class="dianomi-ad dianomi-ad-3"><iframe width="500" height="150" scrolling="NO" src="//www.dianomi.com/smartads.epl?id=4303" style="width: 100%; border: none; overflow: hidden;"></iframe></div>';
                    // }
                    // if ( $total_p > 15 && $p_count ==15 ) {
                    // 	  /*echo '<div class="video-inread3 unruly-video">
                    // 			  <div id="1x1">
                    // 			  <script type="text/javascript">
                    // 				googletag.cmd.push(function() { googletag.display("1x1"); });
                    // 			  </script>
                    // 			</div>
                    // 		  </div>';*/
                          
                    // 		  /* Adding Code for Dianomi Video Ads  */
                    // 		  //echo '<div class="dianomi_video" data-dianomi-video-id="4675" id="dv_4675" style="margin: 0 auto; max-width: 800px;"></div>';
                    // 		  /* Code end for Dianomi Video Ads */
                    // }
    
                    // if ( $total_p > 10 && $p_count == 10 ) {
                    //  // if(user_is_anonymous()){
                    // 	echo '<div class="dianomi-ad dianomi-ad-2"><iframe width="500" height="150" scrolling="NO" src="//www.dianomi.com/smartads.epl?id=4302" style="width: 100%; border: none; overflow: hidden;"></iframe></div>'; 
                    // 	/*echo '<div class="article-mpu-5 unruly-video">
                    // 			  <div id="Unit6">
                    // 				<script type="text/javascript">
                    // 				  googletag.cmd.push(function() { googletag.display("Unit6"); });
                    // 				</script>
                    // 			  </div>
                    // 			</div>';*/
                    //  // }
    
                    // }
                    
                    if ( $last_p == $p_count ) {
                      if($_COOKIE['STYXKEY_nsversion'] === "UK" || $_COOKIE['STYXKEY_nsversion'] === "EU"){
                        echo '<div class="">
                        <!--Smartad # 4303: New Statesman - In Article - Position 3-->
                        <iframe WIDTH="500" HEIGHT="150" SCROLLING="NO" src="//www.dianomi.com/smartads.epl?id=4303" style="width:100%; height: 150px; border: none; overflow: hidden;"></iframe></div>';
                      }else{
                        echo '<div class=""><!--Smartad # 4308: New Statesman USA - In Article - Position 3--><iframe WIDTH="500" HEIGHT="150" SCROLLING="NO" src="//www.dianomi.com/smartads.epl?id=4308" style="width: 100% ; height: 150px; border: none; overflow: hidden;"></iframe></div>';
                      }                  
      
                    }
                }

							


							  $p_count++;
							}  
							echo ( $p_array_each );
						}
					
                }
              // var_dump($array);






$options = array('absolute' => TRUE);
$nid = $node->nid; // Node ID
                $url = url('node/' . $nid, $options);

                  ?>






            <?php if (!empty($data['author']['biography'])) {
?>
            <div class="about-the-author">
              <div class="row">
                <?php
           if (!empty($data['author']['profile_url'])) {
?>
                <div class="large-2 columns author-avatar"><img src="<?php echo $data['author']['profile_url']; ?>"></div>
                <?php  }
if (!empty($data['author']['main'])) {
?>
                <div class="large-10 columns author-details">
                  <!-- <h3> <?php //echo $data['author']['main']; ?></h3>-->
                  <?php
if (!empty($data['author']['biography'])) {
?>
                  <?php echo $data['author']['biography']; ?>
                  <?php  } ?>
                </div>
                <?php } ?>
                <?php
if (!empty($data['sec_author']['profile_url'])) {
?>
                <div class="large-2 columns author-avatar"><img src="<?php echo $data['sec_author']['profile_url']; ?>"></div>
                <?php  }
if (!empty($data['sec_author']['name'])) {
?>
                <div class="large-10 columns author-details">
                  <!-- <h3> <?php //echo $data['sec_author']['name']; ?></h3>-->
                  <?php
if (!empty($data['sec_author']['biography'])) {    ?>
                  <?php echo $data['sec_author']['biography']; ?>
                  <?php  }?>
                </div>
                <?php } ?>
              </div>
              <?php /*?> <?php if (!empty($data['author']['guest'])) { ?>
                    <div class="large-12 columns">
                      <h3><?php echo $data['author']['guest']; ?></h3>
                    </div>
                    <?php  }?><?php */?>
            </div>
            <!-- .article-author -->

            <?php } ?>
            <div class="article-footer-promotion">
              <div class="row"> <?php //print render(block_get_blocks_by_region('article_footer_promotion'));?>
              <?php
                if ( function_exists('geolocation_check_session') && geolocation_check_session() == 'US' ){
                  $promotion = block_get_blocks_by_region('article_footer_promotion_US');
                }else{
                  $promotion = block_get_blocks_by_region('article_footer_promotion');
                }
                print render($promotion);
              ?>

                <!--   <div class="large-2 small-2 columns magazine-cover">
                                <a href=""><img src="/sites/default/files/styles/magazine-cover-thumb/public/magazinecovers/2015_34_corbyn_small.jpg" alt="New Statesman Magazine Cover"></a>
                            </div>
                            <div class="large-10 small-10 columns promotion-text">
                                <h3>Promotional text sentence here</h3>
                                <div class="cta subscribe-link"><a href="">Subscribe</a></div>
                            </div>-->
              </div>
            </div>
            <!-- .article-footer-promotion -->
            <?php
                if (!empty($node->field_magazinetitle)) {

			      $mid = $node->field_magazinetitle['und'][0]['target_id'];
                  $magazine = node_load($mid);
                  if(!empty ($magazine->field_issue_date)){
                  $issue_date = Date("d F Y", strtotime($magazine->field_issue_date['und'][0]['value']));}
                  if(!empty ($magazine->title)) {
                  $issue_title = l($magazine->title, 'node/'.$mid); }

	if(!empty ($issue_date) || !empty ($issue_date)) {			 // dsm($magazine);
                  ?>
            <div class="first-appeared-in clearfix">
              <p>This article appears in the <?php print $issue_date;?> issue of the New Statesman, <?php print $issue_title;?></p>
            </div>
            <?php } } ?>
            <!-- .first-appeared-in -->
          </div>
          <?php /* if (array_filter(views_get_view_result('related_story', 'block',$node->nid))) {
                                echo "<div id='related-story-wraper' style=' overflow: hidden;'><div class='secondary-content-box related-story-box'><h4 class='scb-heading'>Related Story</h4> <div class='row'>";
                                print views_embed_view('related_story', 'block',$node->nid);
                              echo "</div></div></div>";
                               } */?>
          <?php // echo $node->nid;?>
          <?php /*?>  <div class="story_related_<?php echo $node->nid;?>">
                             <div id='<?php echo $node->nid;?>related_story' style="height:auto; margin-bottom:10px;"></div></div> <?php */?>
          <?php print render($content['comments']); ?> </section>


      </div>
      <!-- /.row -->

    </div>
    <!-- /.node -->

    <!-- Commented to fix gibraltar issue </div>-->
    </article>
    <div class="large-4 columns right-sidebar">
      <div class="scrolling-content" id="showhidenews_<?php echo $node->nid;?>">
        <aside id="sidebar-second" role="complementary">
		
			<div class="secondary-content-box desktop-banner dianomi-ads">
              <!--Smartad # 4222: New Statesman Right Rail-->
              <iframe WIDTH="100%" HEIGHT="600" SCROLLING="NO" src="//www.dianomi.com/smartads.epl?id=4222"  style="width: 100%; height: 600px; border: none; overflow: hidden;"></iframe>
            </div>
            <!-- .dianomi-ad -->
			
		
          <?php //if(user_is_anonymous()){ ?>
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
          <?php //} ?>
          <?php //if ($page['sidebar_second_trending']): ?>
          <div class="secondary-content-box trending-box">
            <?php //print render($page['sidebar_second_trending']); ?>
            <h2 class="scb-heading">Most Popular</h2>
            <?php //print render(block_get_blocks_by_region('sidebar_second_trending'));?>
            <?php
        			//print render(geolocation_render_most_popular_block());
					 $most_popular_block = geolocation_render_most_popular_block(); print render($most_popular_block);
			?>
        		
				<!-- Hover popup ---->
				<?php
				if (strpos($_SERVER['REQUEST_URI'], "2017") !== false){
				//if ($_SERVER['REQUEST_URI'] == "/politics/brexit/2017/11/leader-brexit-betrayal"){
				// car found
					?>
					<div class="joyride">
								<h4>Learn more</h4>

								<?php //echo $_SERVER['REQUEST_URI'];?>
								<p>Hover over the box to learn more about the article from our partner.</p>

								<div class="close-toggle">Close</div>
					</div>
				<?php } ?>
				<!-- Hover popup ---->
            </div>
          <?php // endif; ?>

      <?php //if(user_is_anonymous()){ ?>
		  <div class="secondary-content-box mpu article-mpu-2">
      <?php if(! checkmobile()){ ?>
      <div id='Unit3' class='sidebarad1'>
                  <script type='text/javascript'>
                    googletag.cmd.push(function() { googletag.display('Unit3'); });
                  </script>
                </div>
          <?php }?>
          </div>
      <?php //} ?>

       <!-- <div class="secondary-content-box desktop-banner mpu brexit-tracker">
        Smartad # 4222: New Statesman Right Rail
        <iframe WIDTH="300" HEIGHT="600" SCROLLING="NO" src="//www.dianomi.com/smartads.epl?id=4222"  style="width: 300px; height: 600px; border: none; overflow: hidden;"></iframe>
        </div>--->

          <?php //if ($page['sidebar_second_youmay']): ?>

          <!-- .sidebar-mpu -->

          <div class="secondary-content-box you-may-have-missed">
            <?php //print render($page['sidebar_second_youmay']); ?>
            <?php //print render(block_get_blocks_by_region('sidebar_second_youmay'));?>

            <?php
            $youmay = block_get_blocks_by_region('sidebar_second_youmay');
            print render($youmay);
            ?>

            </div>

            <?php if((!empty($node->field_categories)) && ($node->field_categories['und'][0]['tid']=='8373')){ ?>


            <?php }else{
?>

                <div class="secondary-content-box mpu article-mpu-3">
                <?php if(! checkmobile()){ ?>
                <!-- <div id='Unit4' class='sidebarad1'>
                  <script type='text/javascript'>
                    googletag.cmd.push(function() { googletag.display('Unit4'); });
                  </script>
                </div> -->
                <?php } ?>
                </div>
            <?php } ?>
          <?php //endif; ?>
          <?php if ($page['sidebar_second_podcast']): ?>
          <?php ?>
          <div class="secondary-content-box podcast-box"> <?php print render($page['sidebar_second_podcast']); ?> <?php print render(block_get_blocks_by_region('sidebar_second_podcast'));?> </div>
          <?php ?>
          <?php endif; ?>
          <?php //if ($page['sidebar_second']): ?>
         <!-- <div class="secondary-content-box">-->
            <?php //print render($page['sidebar_second']); ?>
            <?php //print render(block_get_blocks_by_region('sidebar_second'));
                                                 if (array_filter(views_get_view_result('related_book', 'block',$node->nid))) {
  //echo "<div class='row'><div class='secondary-content-box related-articles'>";
  echo "<h4 class='scb-heading'>Related Book</h4>";

    print views_embed_view('related_book', 'block',$node->nid);

  echo "</div><div class='clear'></div>";
                  }
                  ?>
          <!--</div>-->
          <?php //endif; ?>
        </aside>
        <!-- #sidebar-first -->
      </div>
      <!--   <div class="secondary-content-box desktop-banner mpu elevator-banners clearfix">
                <div class="double-mpu-placeholder">


Newstatesman/Homepage
<div id='div-160-600-sky'>
<script type='text/javascript'>
googletag.display('div-160-600-sky');
</script>
</div>

                </div>
              </div>-->

    </div>
	<div class="subscribe-toggle"></div>
    <div class="sidebar-toggle">More</div>
  </div>
  <div class="subscription-promotion"> </div>
  <!-- .subscription-promotion -->
  <footer class="article-footer">
    <div class="row comments-area">
<?php //disqus comments
   $path = $GLOBALS['base_url'].$GLOBALS['base_path'].drupal_lookup_path('alias',"node/".$node->nid);

  //if($node->disqus['status']===TRUE){
   //if (empty($node->field_enable_comments) || $node->field_enable_comments['und'][0]['value'] != '0') {
   if (!empty($node->field_enable_comments) && $node->field_enable_comments['und'][0]['value'] == '1') {
  ?>
      <span id="disqus_loader<?php echo $node->nid;?>" class="disqus_loader<?php echo $node->nid;?>">
      <?php if(!empty($path)) {?>
      <button onclick="load_disqus(<?php echo $node->nid;?>,'<?php echo $path;?>')" class="toggle comments-toggle button" >COMMENTS</button>
      <?php }?>
      </span>
      <?php
           echo '<div class="row"><div id="disqus_thread'.$node->nid.'" class="disqus_thread'.$node->nid.'"></div></div>';
                                ?>
      <?php }

                 // dsm($node->field_enable_comment);
                  ?>

     <!-- <ul class="share-buttons article-footer-sharers">
        <li class='facebook-button st_facebook_hcount'><a target="_blank" href=<?php //sa print $f_share ?> > <span class="stButton"> <span class="stMainServices st-facebook-counter">&nbsp;</span> <span class="stArrow"><span class="stBubble_hcount">
          <?php //echo ($f_count); ?>
          </span></span></span> </a></li>
        <li class='twitter-button st_twitter_hcount'><a target="_blank" href=<?php //sa print $t_share ?> > <span class="stButton"> <span class="stMainServices st-twitter-counter">&nbsp;</span> <span class="stArrow"><span class="stBubble_hcount">
          <?php //echo ($t_count); ?>
          </span></span></span></a> </li>
        <li class='reddit-button st_reddit_hcount' ><a target="_blank" href=<?php //sa print $r_share ?> > <span class="stButton"> <span class="reddit-button st_reddit_hcount"> &nbsp;</span> <span class="stArrow"><span class="stBubble_hcount">
          <?php //echo ($r_count); ?>
          </span></span></span></a> </li>
        <li class="email-button st_email_hcount"><a href="mailto:type email address here?subject=<?php //sa echo $title; ?> &body=<?php //sa echo $base_url.$node_url;?>&#32;&#32;" title="Email to a friend/colleague"> <span class="stButton"> <span class="stMainServices st-mail-counter">&nbsp;</span> <span class="stArrow"><span class="stBubble_hcount"></span></span></span></a></li>
        <?php //sa print render($content['links']); ?>
      </ul> -->
    </div>
    <!-- .comments-area -->
  </footer>
  <?php
  /*
 $tid_array = array();

if (isset ($field_culture) && is_array($field_culture) && count($field_culture) > 0) {
    foreach ($field_culture as $term_culture) {
                //print_r($term_culture);
                                                                  if(isset($term_culture[1]['tid'])){
      $tid_array[] = $term_culture[1]['tid'];
                                                                }
    }
  }
    if (isset ($field_worldaffairs) && is_array($field_worldaffairs) && count($field_worldaffairs) > 0) {
    foreach ($field_worldaffairs as $term_worldaffairs) {
                                if(isset($term_worldaffairs[1]['tid'])){
      $tid_array[] = $term_worldaffairs[1]['tid'];
                                }

    }
  }
   if (isset ($field_scitech) && is_array($field_scitech) && count($field_scitech) > 0) {
    foreach ($field_scitech as $term_scitech) {
                if(isset($term_scitech[1]['tid'])){
      $tid_array[] = $term_scitech[1]['tid'];
                                                                }

    }
  }

  if (isset ($field_politics) && is_array($field_politics) && count($field_politics) > 0) {
    foreach ($field_politics as $term_politics) {
                                if(isset($term_politics[1]['tid'])){
      $tid_array[] = $term_politics[1]['tid'];
                  //print_r($tid_array);
                                }
    }
  }


if (is_array($tid_array) && count($tid_array) > 0) {
    $key = array_rand($tid_array);
    $tid_related = $tid_array[$key];


  }

*/

//<?php
//disqus comments end
  //if (isset($tid_related)){

?>





<?php
  if (isset($tids)){
                  if (array_filter(views_get_view_result('related_block', 'block_2',$node->nid,$tids))) {
  echo "<div class='row'>

<div class='secondary-content-box related-articles'>";
  echo "<h4 class='scb-heading'>Related articles</h4>";

  ?>



  <?php
    print views_embed_view('related_block', 'block_2',$node->nid,$tids);

  echo "</div>

   <div class='secondary-content-box related-articles1'>

</div>
  </div><div class='clear'></div>";
                  }
  }


?>
<div class='row'>
 <div class='secondary-content-box related-articles dianomi-sponsored'>   <!-- Dianomi Tags -->
<iframe width="100%" height="690" scrolling="NO" src="//www.dianomi.com/smartads.epl?id=3402" style="width: 100%; border: none; overflow: hidden;"></iframe>
</div>

</div>



  <!--</article>-->
  <div class="bottom-leaderboard-section desktop-banner">

      <div id='Unit5'>
        <script type='text/javascript'>
          googletag.cmd.push(function() { googletag.display('Unit5'); });
        </script>
      </div>

  </div>

<?php
$node = node_load(200490);




?>
<!--<div class="secondary-content-box promo-box modal" id="popup" style="display: none;">-->
<div class="secondary-content-box promo-box modal" id="popup" style="display: none;">

  <div class="row">
    <?php if(!empty($node->field_node_image)) { ?>
    <div class="large-4 small-4 columns magazine-cover"> <a href="<?php print $node->field_url['und'][0]['value'];?>"><img src="/sites/default/files/<?php
                                                 print $node->field_node_image['und'][0]['filename'];?>" alt="New Statesman Magazine" style="max-width:100%"></a> </div>
    <?php } ?>
    <div class="large-8 small-8 columns magazine-details">
      <?php if(!empty($node->title)) { ?>
      <h3 class="heading-label"><?php print $node->title;?></h3>
      <?php } ?>
      <?php if(!empty($node->field_h4)) { ?>
      <h4><?php print $node->field_h4['und'][0]['value']?></h4>
      <?php } ?>
      <?php if(!empty($node->body)) { ?>
      <p><?php print $node->body['und'][0]['value'];?></p>
      <?php } ?>
      <?php       if(!empty($node->field_url)) { ?>
      <div class="cta buy-cta"><a href="<?php print $node->field_url['und'][0]['value'];?>"><?php print $node->field_button_text['und'][0]['value'];?></a></div>
      <?php }?>
    </div>
  </div>
  <div class="close-toggle"><b>Close</b> <span>This week&#8217;s magazine</span></div>
</div>
