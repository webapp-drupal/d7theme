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
 * - $sticky: Flags for sticky post setting.
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
?>
<script>
jQuery(document.body).addClass('long-read-theme');
</script>
<?php

if (!empty($node->field_node_image)) {
    $imgpath = image_style_url('lead_image', $node->field_node_image[LANGUAGE_NONE][0]['uri']);
    $imgpath = ($imgpath) ? $imgpath : image_style_url('thumb_730', $node->field_node_image[LANGUAGE_NONE][0]['uri']);
    $fimage = array('#tag' => 'meta', '#attributes' => array('property' => 'og:image', 'content' => $imgpath,),);
    drupal_add_html_head($fimage, 'og_image');
}
Global $base_url;
//$user = user_load($node->uid);
// $field_userbiography = field_get_items('user', $user, 'field_userbiography');
//
//if(!empty($field_userbiography[0]['value'])){
//                echo $field_userbiography[0]['value'];
if ($node->uid != '0') {
    $user = user_load($node->uid);
}
$field_twitter_name = field_get_items('user', $user, 'field_twitter_name');
//category calss for body//
$bodyclass = '';
if (!empty($class4body)) {
    $bodyclass = $class4body;
}
if (!empty($node->field_gallery_image)) {
    $bodyclass.= ' gallery';
}
?>


<input type="hidden" name="oldcat" id="oldcat" value=""  />
<input type="hidden" name="noimage" id="noimage" value=""  />
<script>
//moreContent6();
if(jQuery('#oldcat').val()!=''){
                jQuery(document.body).addClass(jQuery('#oldcat').val());
                }
jQuery('#oldcat').val('<?php echo $bodyclass; ?>');

 </script>

<?php
//category calss for body end//
//print_r($content['field_node_image']);
//dsm($node);
/*if (!empty($node->field_node_image) && file_create_url($node->field_node_image[LANGUAGE_NONE][0]['uri']) == 'http://test-new-statesman.pantheon.io/') {
  $no_image_class = "noimage";
}
else {
  $no_image_class = "";
}
*/
$imgcls = '';
if (!empty($node->field_node_image) && ($node->field_node_image['und'][0]['fid'] > 0)) {
    $imgcls = "imageexist";
} else {
    $imgcls = "noimage";
}
?>
<Script>
if(jQuery('#noimage').val()!=''){
                jQuery(document.body).addClass(jQuery('#noimage').val());
                }
jQuery('#noimage').val('<?php echo $imgcls; ?>');
 </script>
 
 
<?php /*?><div class="large-8 columns article-column" style="background:none"><?php */
$expande_img = '';
if ($node->field_image_expanded['und'][0]['value'] == '1') {
    $expande_img = 'feature-image-revealed';
}
?> 
  
  <?php if (!empty($node->field_node_image)) { ?><main>  <?php
} else { ?><main class="no-feature-image"> <?php
} ?>
  

 <?php if (!empty($node->field_node_image)) { ?>
<div class="article-featured-image parallax-layer parallax-layer-back"> 
<?php print theme('image_style', array('path' => $node->field_node_image[LANGUAGE_NONE][0]['uri'], 'style_name' => 'lead_image'));//print render($content['field_node_image']); ?> 
   <div class="image-credit">
    <?php print render($content['field_nodeimage_title']); ?>	
  </div>
   <?php if(!empty($node->field_image_caption)) { ?>
      <div class="image-caption image-credit" style="left:0; right:auto;"> <?php print render($content['field_image_caption']); ?></div>  <?php } ?>
	</div>	  
</div> 

 <?php
} ?>
        <div class="main-content <?php if (!empty($expande_img)) {
    echo $expande_img;
} ?>" id="showhideimage<?php echo $node->nid; ?>">
    <article class="article-column long-read-article-column">
    <?php if (!empty($node->field_node_image)) { ?>       
    <div class="toggle-image" onclick="showimage('showhideimage<?php echo $node->nid; ?>')"><b>Show</b> <span>Hide</span> image</div> <?php
} ?>
       <div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
      <header class="article-header">
          <?php if (!empty($subchild)) {
    $article_category = $subchild;
} elseif (!empty($category)) {
    $article_category = $category;
}
if (!empty($article_category)): ?>
          <div class="article-category"> <?php print $article_category; ?> </div>
          <?php
endif; ?>
        <?php if ($display_submitted): ?>
          
        <div class="article-date">
          <?php
    if ($submitted) {
        echo date("j F Y", $node->created);
    }
    //print $submitted;
     ?>
        </div>
        <?php
endif; ?>
          
        <?php print render($title_prefix); ?>
       <?php /*?> <h1 <?php print $title_attributes; ?> class="title inf_class" data-analyticsid="<?php print $node_url; ?>"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h1><?php */ ?>
       <h1 <?php print $title_attributes; ?> class="title inf_class" data-analyticsid="<?php print $node_url; ?>"><?php print $title; ?></h1>
       
        <?php print render($title_suffix); ?> <?php print render($content['field_subheadline']); ?>
        <div class="article-author clearfix">
     <?php
$author_name = $node->name;
$author_id = $node->uid;
$data = node_get_author($author_name, $author_id, $node->field_authored_by, $node->field_guest_author);
if (!empty($data['author']['profile_url']) || !empty($data['sec_author']['profile_url'])) {
?>
                  
                  <div class="multiple-author-images">
<?php
    if (!empty($data['author']['profile_url'])) {
?> <div class="author-avatar"><img src="<?php echo $data['author']['profile_url']; ?>"></div><?php
    } ?>
<?php if (!empty($data['sec_author']['profile_url'])) {
?> <div class="author-avatar"><img src="<?php echo $data['sec_author']['profile_url']; ?>"></div><?php
    } ?>
</div> <?php
} ?>
            <div class="author-byline"><?php
if (!empty($data['author']['main'])) {
    echo $data['author']['main'];
}
if (!empty($data['sec_author']['name'])) {
    echo $data['sec_author']['name'];
}
if (!empty($data['author']['guest'])) {
    echo $data['author']['guest'];
} ?> </div>
            <div class="author-twitter twitter-button">
                <?php if (!empty($data['author']['twitter'])) { ?><a href="<?php echo $data['author']['twitter'][0]['url']; ?>" class="twitter-follow-button" data-show-count="false">
                        Follow @<?php echo $data['author']['twitter'][0]['title']; ?></a> <?php
}
if (!empty($data['sec_author']['twitter_name'])) { ?>
                    <a href="<?php echo $data['sec_author']['twitter_name'][0]['url']; ?>" class="twitter-follow-button" data-show-count="false">
                        Follow @<?php echo $data['sec_author']['twitter_name'][0]['title']; ?></a><?php
}
?>
              <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>  
            </div>    
                  
        </div>
       
		<div style="margin:2em 0 -2em 0; overflow: hidden; margin: auto;  max-width:50%;  padding-top:2.5em">

		<?php
$news_letter_weekly = block_get_blocks_by_region('newsletterweekly');
print render($news_letter_weekly);
?>			
</div>
        
      </header>
      <section>
        <div id="container" class="content <?php print $classes_array['1']; ?>"<?php print $content_attributes; ?> >
<?php
// Hide comments, tags, and links now so that we can render them later.
hide($content['comments']);
hide($content['links']);
hide($content['field_node_image']);
hide($content['field_gallery_image']);
hide($content['field_subheadline']);
$article_type = 0;
if ($node = menu_get_object()) {
    // Get the nid
    //echo $nid = $node->nid;
    //  var_dump($node );
    $node->type;
    if ($node->type == "longread") {
        $article_type = 1;
    }
}
//if(checkmobile()){
//      print render($content);
// }else{
$contents_array = explode("</p>", render($content));
$p_count = 1;
$total_p = count($contents_array);
$detect = new Mobile_Detect;
if ($detect->isMobile() && !$detect->isTablet()) {
    //  echo 'Mobile NEWNEW';
    
} else {
    // echo 'NOT Mobile NEW NEWN NEW';
    
}
if (checkmobile()) {
    //  print render($content);
    foreach ($contents_array as $key_p_array_each => $p_array_each) {
        $field = field_get_items('node', $node, 'field_sponsored_logo');
        if (!empty($field)) {
            //echo "Sponserd Article";
            
        } else {
            if ($total_p > 4 && $p_count == 4) {
                //echo '<div class="dianomi-ad dianomi-ad-1"><iframe width="500" height="150" scrolling="NO" src="//www.dianomi.com/smartads.epl?id=3585" style="width: 100%; border: none; overflow: hidden;"></iframe></div>';
                echo "<div id='1x3'>
									  <script type='text/javascript'>
										googletag.cmd.push(function() { googletag.display('1x3'); });
									  </script>
									</div>";
            }
            if ($total_p > 10 && $p_count == 10) {
                echo '<div class="dianomi-ad dianomi-ad-2"><iframe width="500" height="150" scrolling="NO" src="//www.dianomi.com/smartads.epl?id=4302" style="width: 100%; border: none; overflow: hidden;"></iframe></div>';
            }
            if ($total_p > 7 && $p_count == 7) {
                echo '<div class="video-inread unruly-video">
										  <div id="1x3">
										  <script type="text/javascript">
											googletag.cmd.push(function() { googletag.display("1x3"); });
										  </script>
										</div>
									  </div>';
            }
            if ($total_p > 13 && $p_count == 13) {
                echo '<div class="dianomi-ad dianomi-ad-3"><iframe width="500" height="150" scrolling="NO" src="//www.dianomi.com/smartads.epl?id=4303" style="width: 100%; border: none; overflow: hidden;"></iframe></div>';
            }
            if ($total_p > 16 && $p_count == 16) {
                echo '<div class="dianomi-ad dianomi-ad-3"><iframe width="500" height="150" scrolling="NO" src="//www.dianomi.com/smartads.epl?id=4303" style="width: 100%; border: none; overflow: hidden;"></iframe></div>';
            }
            if ($total_p > 19 && $p_count == 19) {
                echo '<div class="video-inread1">
									<div id="1x1">
										<script type="text/javascript">
											googletag.cmd.push(function() { googletag.display("1x1"); });
										</script>
									</div>
								</div>';
            }
            if ($total_p > 22 && $p_count == 22) {
                echo '<div class="video-inread2">
									<div id="1x2">
										<script type="text/javascript">
											googletag.cmd.push(function() { googletag.display("1x2"); });
										</script>
									</div>
								</div>';
            }
            $p_count++;
        }
        echo ($p_array_each);
    }
} else {
    foreach ($contents_array as $key_p_array_each => $p_array_each) {
        $field = field_get_items('node', $node, 'field_sponsored_logo');
        if (!empty($field)) {
            //echo "Sponserd Article";
            
        } else {
            if ($total_p > 7 && $p_count == 7) {
                echo '<div class="dianomi-ad dianomi-ad-1"><iframe width="500" height="150" scrolling="NO" src="//www.dianomi.com/smartads.epl?id=3585" style="width: 100%; border: none; overflow: hidden;"></iframe></div>';
                /*echo "<div id='1x3'>
                <script type='text/javascript'>
                googletag.cmd.push(function() { googletag.display('1x3'); });
                </script>
                </div>";*/
            }
            if ($total_p > 4 && $p_count == 4) {
                echo '<div class="dianomi-ad dianomi-ad-2"><iframe width="500" height="150" scrolling="NO" src="//www.dianomi.com/smartads.epl?id=4302" style="width: 100%; border: none; overflow: hidden;"></iframe></div>';
            }
            if ($total_p > 10 && $p_count == 10) {
                echo '<div class="dianomi-ad dianomi-ad-3"><iframe width="500" height="150" scrolling="NO" src="//www.dianomi.com/smartads.epl?id=4303" style="width: 100%; border: none; overflow: hidden;"></iframe></div>';
            }
            if ($total_p > 16 && $p_count == 16) {
                echo '<div class="dianomi-ad dianomi-ad-3"><iframe width="500" height="150" scrolling="NO" src="//www.dianomi.com/smartads.epl?id=4303" style="width: 100%; border: none; overflow: hidden;"></iframe></div>';
            }
            if ($total_p > 13 && $p_count == 13) {
                /*echo '<div class="video-inread unruly-video">
                <div id="1x3">
                <script type="text/javascript">
                googletag.cmd.push(function() { googletag.display("1x3"); });
                </script>
                </div>
                </div>';*/
                echo "<div id='1x3'>
									  <script type='text/javascript'>
										googletag.cmd.push(function() { googletag.display('1x3'); });
									  </script>
									</div>";
            }
            if ($total_p > 19 && $p_count == 19) {
                echo '<div class="dianomi-ad dianomi-ad-2"><iframe width="500" height="150" scrolling="NO" src="//www.dianomi.com/smartads.epl?id=4302" style="width: 100%; border: none; overflow: hidden;"></iframe></div>';
            }
            if ($total_p > 25 && $p_count == $total_p - 3) {
                echo '<div class="dianomi-ad dianomi-ad-1"><iframe width="500" height="150" scrolling="NO" src="//www.dianomi.com/smartads.epl?id=3585" style="width: 100%; border: none; overflow: hidden;"></iframe></div>';
            }
            $p_count++;
        }
        echo ($p_array_each);
    }
}
// print render($content);

?>
            
  
            
            
            <?php if (!empty($data['author']['biography'])) {
?>
              <div class="about-the-author">
                  <div class="row">

                      <?php
    if (!empty($data['author']['profile_url'])) {
?>
                        <div class="large-2 columns author-avatar"><img src="<?php echo $data['author']['profile_url']; ?>"></div>
                      <?php
    }
    if (!empty($data['author']['main'])) {
?>
                        <div class="large-10 columns author-details"> 
                         <!-- <h3> <?php //echo $data['author']['main'];
         ?></h3>-->
                            <?php
        if (!empty($data['author']['biography'])) {
?>
                              <?php echo $data['author']['biography']; ?>
                        <?php
        } ?>
                        </div>
  <?php
    } ?>


                      <?php
    if (!empty($data['sec_author']['profile_url'])) {
?>
                        <div class="large-2 columns author-avatar"><img src="<?php echo $data['sec_author']['profile_url']; ?>"></div>
                      <?php
    }
    if (!empty($data['sec_author']['name'])) {
?>
                        <div class="large-10 columns author-details">
                         <!-- <h3> <?php //echo $data['sec_author']['name'];
         ?></h3>-->
                            <?php if (!empty($data['sec_author']['biography'])) { ?>
                              <?php echo $data['sec_author']['biography']; ?>
                        <?php
        } ?>
                        </div>
                  <?php
    } ?>
                  </div>
              </div>
              <!-- .article-author -->
            <?php
} ?>    


<div class="article-footer-promotion">
              <div class="row"> <?php //print render(block_get_blocks_by_region('article_footer_promotion'));
 ?> 
              
               <?php
if (function_exists('geolocation_check_session') && geolocation_check_session() == 'US') {
    $promotion = block_get_blocks_by_region('article_footer_promotion_US');
} else {
    $promotion = block_get_blocks_by_region('article_footer_promotion');
}
print render($promotion);
?>
               </div>
            </div>
			
			
			
			

      <?php //dsm($node);
if (!empty($node->field_magazinetitle)) {
    $mid = $node->field_magazinetitle['und'][0]['target_id'];
    $magazine = node_load($mid);
    if (!empty($magazine)) {
        $issue_date = Date("d F Y", strtotime($magazine->field_issue_date['und'][0]['value']));
        $issue_title = l($magazine->title, 'node/' . $mid);
        //dsm($magazine);
        
?><div class="first-appeared-in clearfix"><?php if (!empty($magazine->title)) { ?>
              <p>This article appears in the <?php print $issue_date; ?> issue of the New Statesman, <?php print $issue_title; ?></p>        
              <?php
        } ?>
                  </div>  <?php
    }
} ?>
                  <!-- .first-appeared-in -->
    
        </div>
        <?php print render($content['comments']); ?></section>
      </div>
    </article>
  </div>
  
</main>

<footer class="article-footer">


    <div class="row">
      <div class="large-2 columns">
      <?php
/*if($node->disqus['status']=== TRUE)
	  {//disqus_comment
	   ?>
        <div class="toggle comments-toggle button">Comment</div> 
        <?php }*/
?>
      </div>

    </div>

	

    <!-- Footer leaderboard working with infinite scroll -->
    <div class="bottom-leaderboard" id="leaderboard" style="text-align: center;"> 

          
    </div>
    
     <div class="row comments-area">
  
<?php //disqus comments
$path = $GLOBALS['base_url'] . $GLOBALS['base_path'] . drupal_lookup_path('alias', "node/" . $node->nid);
//if($node->disqus['status']===TRUE){
if (!empty($node->field_enable_comments) && $node->field_enable_comments['und'][0]['value'] == '1') {
?>
      <span id="disqus_loader<?php echo $node->nid; ?>" class="disqus_loader<?php echo $node->nid; ?>">
      <?php if (!empty($path)) { ?>
      <button onclick="load_disqus(<?php echo $node->nid; ?>,'<?php echo $path; ?>')" class="toggle comments-toggle button" >COMMENTS</button>
      <?php
    } ?>
      </span>
      <?php
    echo '<div class="row"><div id="disqus_thread' . $node->nid . '" class="disqus_thread' . $node->nid . '"></div></div>';
?>
      <?php
}
// dsm($node->field_enable_comment);

?>

     <!-- <ul class="share-buttons article-footer-sharers">
          <li class='facebook-button st_facebook_hcount'><a target="_blank" href=<?php //sa print $f_share
 ?> >
          <span class="stButton">
          <span class="stMainServices st-facebook-counter">&nbsp;</span> 
          <span class="stArrow"><span class="stBubble_hcount"><?php //echo ($f_count);
 ?></span></span></span> </a></li>  
                
          <li class='twitter-button st_twitter_hcount'><a target="_blank" href=<?php //sa print $t_share
 ?> >
          <span class="stButton">
          <span class="stMainServices st-twitter-counter">&nbsp;</span> 
          <span class="stArrow"><span class="stBubble_hcount"><?php //echo ($t_count);
 ?></span></span></span></a>  </li>
          
          <li class='reddit-button st_reddit_hcount' ><a target="_blank" href=<?php //print $r_share
 ?> >
          <span class="stButton">
          <span class="reddit-button st_reddit_hcount">  &nbsp;</span> 
          <span class="stArrow"><span class="stBubble_hcount"> <?php //echo ($r_count);
 ?></span></span></span></a> </li>
          
              <li class="email-button st_email_hcount"><a href="mailto:type email address here?subject=<?php //sa echo $title;
 ?> &body=<?php //sa echo $base_url.$node_url;
 ?>&#32;&#32;" title="Email to a friend/colleague">
          <span class="stButton" >
            <span class="stMainServices st-mail-counter">&nbsp;</span> 
          <span class="stArrow"><span class="stBubble_hcount"></span></span></span></a></li>
        <?php //sa print render($content['links']);
 ?>
      </ul> -->
     </div> 
    <!-- .comments-area -->
   

  <div class="bottom-leaderboard-section desktop-banner">
     <div id="Unit5">
            <script type="text/javascript">
              googletag.cmd.push(function() { googletag.display("Unit5"); });
            </script>
          </div>
  </div>
  <!--//<div class="bottom-mpu-section article-mpu-4 mobile-banner"> </div>-->
   
</footer>



<?php
if (isset($tids)) {
    if (array_filter(views_get_view_result('related_block', 'block_3', $node->nid, $tids))) {
        echo "<div class='row'><div class='secondary-content-box related-articles'>";
        echo "<h4 class='scb-heading'>Related articles</h4>";
        print views_embed_view('related_block', 'block_3', $node->nid, $tids);
        echo "</div></div><div class='clear'></div>";
    }
}
//  if (array_filter(views_get_view_result('related_story', 'block',$node->nid))) {
//   echo "<div class='related_story'><h4 class='scb-heading'>Related Story</h4> <div class='row'>";
//   print views_embed_view('related_story', 'block',$node->nid);
//  echo "</div></div>";
//	}

?>
<div class='row'>
 <div class='secondary-content-box related-articles dianomi-sponsored'>   <!-- Dianomi Tags -->
<iframe width="100%" height="690" scrolling="NO" src="//www.dianomi.com/smartads.epl?id=3402" style="width: 100%; border: none; overflow: hidden;"></iframe>
</div>
</div>

<div id="leaderboards<?php echo $node->nid; ?>" >
<script type='text/javascript' >
//googletag.display('div-728-90-top_leader');
</script>
<?php echo '</div>'; ?>