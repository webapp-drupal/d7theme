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
if(!empty ($node->field_node_image)) {
$imgpath = image_style_url('thumb_730', $node->field_node_image[LANGUAGE_NONE][0]['uri']);
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
<Script>
moreContent2();
moreContent3();
moreContent4();
moreContent5();
moreContent6();
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
  <?php if(!empty($node->field_gallery_image)) { ?>
  <?php print render($content['field_gallery_image']); }?>
  <?php
 if(empty($node->field_gallery_image) ) {
print render($content['field_node_image']); }?>
  <?php if(!empty($node->field_node_image)) { ?>
  <div class="image-credit">
    <?php  print render($content['field_nodeimage_title']); ?>
  </div>
  <?php } ?>
</div>
<?php  

$expande_img='';
if($node->field_image_expanded['und'][0]['value']=='1' || !empty($node->field_gallery_image))
{
                $expande_img ='feature-image-revealed';
}
  ?>
<?php  if(empty ($node->field_node_image)) {?>
<main class="no-feature-image">
<?php } else { ?>
<main>
<?php } ?>
<div class="main-content has-featured-article  parallax-layer parallax-layer-front <?php echo $expande_img;?>" style="border:0px solid red; " id="showhideimage<?php echo $node->nid;?>">
<div class="row">
  <article class="large-8 columns primary-content article-column">
  <?php if(empty($node->field_gallery_image) && (!empty($node->field_node_image))) { ?>
  <div class="toggle-image"  onclick="showimage('showhideimage<?php echo $node->nid;?>')"><b>Show</b> <span>Hide</span> image</div>
  <?php } ?>
  <div class="row">
    <?php
          if ($node->uid != '0') {
            $user = user_load($node->uid);
          }

          // print_r($user);
          //print_r($user_picture);
          $field_twitter_name = field_get_items('user', $user, 'field_twitter_name');

          if ($node->type == 'story' || $node->type == 'blogs') {
            //$sponsored = $field_sponsored['und'][0]['value'];
            //$field_sponsored = field_get_items('node', $node, 'field_sponsored');
//$sponsored = field_view_value('node', $node, 'field_sponsored', $field_sponsored[0]); 
          }
		  
          if (!empty($node->field_sponsored_article) && ($node->field_sponsored_article['und'][0]['value'] == '1')) {
          $sponsored_url='';    
          $sponsored_link='';
if(!empty ($field_sponsored_logo)){
            $sponsored_url = $field_sponsored_logo['und'][0]['uri']; 
            $path = image_style_url('sponsored_image', $sponsored_url);
            }
          if(!empty ($field_sponsored_link)) { $sponsored_link = $field_sponsored_link['und'][0]['url']; }

            echo "<div class='article-sponsor'><div class='row'>";
         
           if (!empty ($sponsored_link) && !empty ($path)) {
              echo "<div class='large-3 small-3 xsmall-3 columns sponsor-logo'><a href='" . $sponsored_link . "' target='_blank' ><img src='" . $path . "'></img></a></div>";
            }
			
            elseif(empty ($sponsored_link) && !empty ($path)) {
              echo "<div class='large-3 small-3 xsmall-3 columns sponsor-logo'><img src='" . $path . "'></img></div>";
            }
						
			if (!empty ($sponsored_link) || !empty ($field_sponsored_by)) {
            if(!empty($field_select_type)) { 
			echo"<div class='large-9 small-9 xsmall-9 columns sponsor-message'><h2>". $field_select_type['und'][0]['value']. "</h2>";    		 }          

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
    <?php /* ?><div class="article-sponsor">
            <div class="row">
            <div class="large-3 small-4 xsmall-4 columns sponsor-logo">
            <a href="#"><img src="img/delete/wwf_logo.jpg"></a>
            </div>
            <div class="large-9 small-8 xsmall-8 columns sponsor-message">
            <h2>Presented by the <a href="">World Wildlife Federation</a></h2>
            <p>By the time you read this article a tiger will be killed. <a href="">See how you could have saved it.</a></p>
            </div>
            </div>
            </div><?php */ ?>
    <div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
      <div class="row">
        <header class="large-9 columns article-header">
          <?php if (!empty($category)): ?>
          <div class="article-category"> <?php print $category;?> </div>
          <?php endif; ?>
          <!-- .article-category -->
          <?php if ($display_submitted): ?>
          <div class="article-date">
            <?php
                    if ($submitted) {
                      echo date("j F Y", $node->created);
                    }
                    ?>
          </div>
          <?php endif; ?>
          <?php print render($title_prefix); ?>
          <h1 <?php print $title_attributes; ?> class="title inf_class" data-analyticsid="<?php print $node_url; ?>"><?php print $title; ?></h1>
          <?php print render($title_suffix); print render($content['field_subheadline']); ?>
			
            
              
    
    
    <div style="margin:2em 0 -2em 0; overflow: hidden; margin: auto;  padding-top:2.5em">
	<?php
		$news_letter_weekly = block_get_blocks_by_region('newsletterweekly');
		print render($news_letter_weekly); 
	?>	
</div>
		  </header>
        <aside class="large-3 columns article-author">
          <?php
                  $author_name = $node->name;
                  $author_id = $node->uid;
                  $data = node_get_author($author_name, $author_id, $node->field_authored_by, $node->field_guest_author);  if (!empty($data['author']['profile_url']) || !empty($data['sec_author']['profile_url'])) {   ?>
          <div class="multiple-author-images">
            <?php
if (!empty($data['author']['profile_url'])) {                                             
?>
            <div class="author-avatar"><img src="<?php echo $data['author']['profile_url']; ?>"></div>
            <?php  } ?>
            <?php if (!empty($data['sec_author']['profile_url'])) {                                             
?>
            <div class="author-avatar"><img src="<?php echo $data['sec_author']['profile_url']; ?>"></div>
            <?php  } ?>
          </div>
          <?php } ?>
          <div class="author-byline">
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
                <?php //echo ($t_count); ?>
                </span></span></span></a> </li>
              <li class='reddit-button st_reddit_hcount' ><a target="_blank" href=<?php print $r_share ?> > <span class="stButton"> <span class="reddit-button st_reddit_hcount"> &nbsp;</span> <span class="stArrow"><span class="stBubble_hcount">
                <?php //echo ($r_count); ?>
                </span></span></span></a> </li>
              <li class="email-button st_email_hcount"><a href="mailto:type email address here?subject=<?php echo $title; ?> &body=<?php echo $base_url.$node_url;?>&#32;&#32;" title="Email to a friend/colleague"> <span class="stButton" > <span class="stMainServices st-mail-counter">&nbsp;</span> <span class="stArrow"><span class="stBubble_hcount"></span></span></span></a></li>
              <?php print render($content['links']); ?>
            </ul>
          </div>
        </div>
        <!-- .article-header-sharers -->
        
        <section class="large-9 columns">
          <div class="content <?php print $classes_array['1']; ?>"<?php print $content_attributes; ?> >
            <?php
                // Hide comments, tags, and links now so that we can render them later.
                hide($content['comments']);
                hide($content['links']);
                hide($content['field_node_image']);
                hide($content['field_gallery_image']);
                hide($content['field_subheadline']);
                  print render($content);
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
              <div class="row"><?php //print render(block_get_blocks_by_region('article_footer_promotion'));?> 
              <?php
$promotion = block_get_blocks_by_region('article_footer_promotion');
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
              <p>This article first appeared in the <?php print $issue_date;?> issue of the New Statesman, <?php print $issue_title;?></p>
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
          <div class="secondary-content-box mpu article-mpu-1"> 
            <!-- Newstatesman/Homepage --> 
          </div>
          
          <!-- .sidebar-mpu --> 
          
          <!--<div class="secondary-content-box email-newsletter-box">
            <h4 class="scb-heading email-newsletter-toggle"  id="news_<?php //echo $node->nid;?>"  onclick="shownewsform('showhidenews_<?php //echo $node->nid;?>');">Subscribe to our newsletter</h4>
            <img src="<?php //print base_path() . drupal_get_path('theme', 'creative_responsive_theme') . '/images/newstatesman_email_newsletter.png'; ?>" alt="New Statesman email newsletter" /> <?php //print render(block_get_blocks_by_region('newsletter'));?>
            <?php //print render($page['newsletter']); ?>
          </div>
          <div class="secondary-content-box desktop-banner mpu"> 
           </div> <!-- Newstatesman/Homepage -->
          
          <?php //if ($page['sidebar_second_trending']): ?>
          <div class="secondary-content-box trending-box">
            <?php //print render($page['sidebar_second_trending']); ?>
            <h2 class="scb-heading">Most Popular</h2>
             <?php //print render(block_get_blocks_by_region('sidebar_second_trending'));?> 
            <?php
			$trending = block_get_blocks_by_region('sidebar_second_trending');
			print render($trending);
			?> </div>
          <?php // endif; ?>
          <?php //if ($page['sidebar_second_youmay']): ?>
          <div class="secondary-content-box mpu article-mpu-2"></div>
          <!-- .sidebar-mpu -->
          
          <div class="secondary-content-box you-may-have-missed">
            <?php //print render($page['sidebar_second_youmay']); ?>
            <?php //print render(block_get_blocks_by_region('sidebar_second_youmay'));?> 
             
<?php
$youmay = block_get_blocks_by_region('sidebar_second_youmay');
print render($youmay);
?> </div>
          <div class="secondary-content-box mpu article-mpu-3"></div>
          <?php //endif; ?>
          <?php if ($page['sidebar_second_podcast']): ?>
          <?php ?>
          <div class="secondary-content-box podcast-box"> <?php print render($page['sidebar_second_podcast']); ?> <?php print render(block_get_blocks_by_region('sidebar_second_podcast'));?> </div>
          <?php ?>
          <?php endif; ?>
          <?php //if ($page['sidebar_second']): ?>
          <div class="secondary-content-box">
            <?php //print render($page['sidebar_second']); ?>
            <?php //print render(block_get_blocks_by_region('sidebar_second'));
                                                 if (array_filter(views_get_view_result('related_book', 'block',$node->nid))) {
  //echo "<div class='row'><div class='secondary-content-box related-articles'>";
  echo "<h4 class='scb-heading'>Related Book</h4>";

    print views_embed_view('related_book', 'block',$node->nid);
  
  echo "</div><div class='clear'></div>";
                  }
                  ?>
          </div>
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
      
    </div><div class="subscribe-toggle"><a href="https://subscribe.newstatesman.com/?utm_source=onsite&utm_medium=adhesiontab&utm_campaign=subscribe">SUBSCRIBE</a></div>
    <div class="sidebar-toggle">More</div>
  </div>
  <div class="subscription-promotion"> </div>
  <!-- .subscription-promotion -->
  <footer class="article-footer">
    <div class="row comments-area">
  <?php //disqus comments
   $path = $GLOBALS['base_url'].$GLOBALS['base_path'].drupal_lookup_path('alias',"node/".$node->nid);
  
 // if($node->disqus['status']===TRUE){ 
 if (!empty($node->field_enable_comments) && $node->field_enable_comments['und'][0]['value'] == '1') { ?>
      <span id="disqus_loader<?php echo $node->nid;?>" class="disqus_loader<?php echo $node->nid;?>">
      <?php if(!empty($path)) {?>
      <button onclick="load_disqus(<?php echo $node->nid;?>,'<?php echo $path;?>')" class="toggle comments-toggle button" >COMMENTS</button>
      <?php }?>
      </span>
      <?php 
           echo '<div class="row"><div id="disqus_thread'.$node->nid.'" class="disqus_thread'.$node->nid.'"></div></div>';
                                ?>
      <?php }?>
      
    <!--  <ul class="share-buttons article-footer-sharers">
        <li class='facebook-button st_facebook_hcount'><a target="_blank" href=<?php //print $f_share ?> > <span class="stButton"> <span class="stMainServices st-facebook-counter">&nbsp;</span> <span class="stArrow"><span class="stBubble_hcount">
          <?php //echo ($f_count); ?>
          </span></span></span> </a></li>
        <li class='twitter-button st_twitter_hcount'><a target="_blank" href=<?php //print $t_share ?> > <span class="stButton"> <span class="stMainServices st-twitter-counter">&nbsp;</span> <span class="stArrow"><span class="stBubble_hcount">
          <?php //echo ($t_count); ?>
          </span></span></span></a> </li>
        <li class='reddit-button st_reddit_hcount' ><a target="_blank" href=<?php //print $r_share ?> > <span class="stButton"> <span class="reddit-button st_reddit_hcount"> &nbsp;</span> <span class="stArrow"><span class="stBubble_hcount">
          <?php //echo ($r_count); ?>
          </span></span></span></a> </li>
        <li class="email-button st_email_hcount"><a href="mailto:type email address here?subject=<?php //echo $title; ?> &body=<?php //echo $base_url.$node_url;?>&#32;&#32;" title="Email to a friend/colleague"> <span class="stButton"> <span class="stMainServices st-mail-counter">&nbsp;</span> <span class="stArrow"><span class="stBubble_hcount"></span></span></span></a></li>
        <?php //print render($content['links']); ?>
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
 
 
 /* if (isset($tids)){
                  if (array_filter(views_get_view_result('related_block', 'block_2',$node->nid,$tids))) {
  echo "<div class='row'><div class='secondary-content-box related-articles'>";
  echo "<h4 class='scb-heading'>Related articles</h4>";

    print views_embed_view('related_block', 'block_2',$node->nid,$tids);
  
  echo "</div></div><div class='clear'></div>";
                  }
  }
*/
 
?>
  
  <!--</article>-->
  <div class="bottom-leaderboard-section desktop-banner"></div>
  <div class="bottom-mpu-section article-mpu-4 mobile-banner"> </div>
</div>
</main>
<?php
$node = node_load(200490);
?>
<!-- Appearing at the second page impression<div class="secondary-content-box promo-box modal" id="popup" style="display: none;">-->
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
      <div class="cta buy-cta"><a href="<?php print $node->field_url['und'][0]['value'];?>">View offer</a></div>
      <?php }?>
    </div>
  </div>
  <div class="close-toggle"><b>Close</b> <span>This week&#8217;s magazine</span></div>
</div>
