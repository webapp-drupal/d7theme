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
<?php 
global $base_url;

if(!empty ($node->field_conference_image)) {
$imgpath = image_style_url('thumb_730', $node->field_conference_image[LANGUAGE_NONE][0]['uri']);
$fimage = array(
  '#tag' => 'meta', 
  '#attributes' => array(
    'property' => 'og:image',
    'content' => $imgpath,
  ),
); 
drupal_add_html_head($fimage, 'og_image');
}

//$user = user_load($node->uid);

// $field_userbiography = field_get_items('user', $user, 'field_userbiography');
//
//if(!empty($field_userbiography[0]['value'])){              
//                echo $field_userbiography[0]['value'];
//               }

            $user = user_load($node->uid);
        

$field_twitter_name = field_get_items('user', $user, 'field_twitter_name');
?>
      <?php /*?>  <article id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?> > <?php */?>
      <header class="promotion-header">
      
      <?php //print $messages; ?>
        <?php if ($display_submitted): ?>
        <div class="article-date">
          <?php 
		 if ($submitted) {
//echo date( "j F Y",$node->created);
} 
		
		//print $submitted; ?>
        </div>
        <?php endif; ?>
        
      
        <div class="conference-sponsor-logo"><?php print render($content['field_sponsor_logo']); ?></div>
        <?php print render($title_prefix); ?>
  <?php /*?>     <h1 <?php print $title_attributes; ?> class="title inf_class" style="display:none;" data-analyticsid="<?php print $node_url; ?>"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h1><?php */?>
        <h1 <?php print $title_attributes; ?> class="title inf_class" data-analyticsid="<?php print $node_url; ?>"><?php print $title; ?></h1>
        <?php print render($title_suffix); ?><p> <?php print render($content['field_sub_headline']); ?></p>
             
       <?php /*?> <ul class="share-buttons">
           <?php if (!empty($content['links'])): ?>
          <?php print render($content['links']); ?>
          <?php endif; ?>
          </ul><?php */?>

          <ul class="share-buttons">
                               <li class='facebook-button st_facebook_hcount'><a target="_blank" href=<?php print $f_share ?> > <span class="stButton"> <span class="stMainServices st-facebook-counter">&nbsp;</span> <span class="stArrow"><span class="stBubble_hcount">
                <?php //echo ($f_count); ?>
                </span></span></span> </a></li>
                                              
                                <li class='twitter-button st_twitter_hcount'><a target="_blank" href=<?php print $t_share ?> >
                                <span class="stButton">
                                <span class="stMainServices st-twitter-counter">&nbsp;</span> 
                                <span class="stArrow"><span class="stBubble_hcount"><?php //echo ($t_count); ?></span></span></span></a>  </li>
                                
                                <li class='reddit-button st_reddit_hcount' ><a target="_blank" href=<?php print $r_share ?> >
                                <span class="stButton">
                                <span class="reddit-button st_reddit_hcount">  &nbsp;</span> 
                                <span class="stArrow"><span class="stBubble_hcount"> <?php //echo ($r_count); ?></span></span></span></a> </li>
                            
                                    <li class="email-button st_email_hcount"><a href="mailto:type email address here?subject=<?php echo $title; ?> &body=<?php echo $base_url.$node_url;?>&#32;&#32;" title="Email to a friend/colleague">
                                <span class="stButton" >
                                      <span class="stMainServices st-mail-counter">&nbsp;</span> 
                                <span class="stArrow"><span class="stBubble_hcount"></span></span></span></a></li>
                              <?php print render($content['links']); ?>
                 </ul>
                <!-- .share-buttons -->
          
      </header>

   <div class="magazine-cover"><?php print render($content['field_conference_image']); ?></div>
  
          
   <div class="details-contact">
   <ul class="conference-details">   
          <li class="conference-date"><?php print render($content['field_conference_date']); ?></li>
      		<li class="conference-date"><?php print render($content['field_conference_time']); ?></li>                
          <li class="conference-location"><?php print render($content['field_conference_location']); ?></li>
          <?php if(!empty ($content['field_room'])){ ?>
              <li class="conference-location"><?php print render($content['field_room']); ?></li>
          <?php } ?>
        </ul>
       
      
         <div class="contact-conferences">
            <div class="call-conferences">
              <p>Call us:</p>
              <div class="tel"><?php print render($content['field_phone_no']); ?></div>
            </div>
            <div class="email-conferences">
              <p> <a href="mailto:<?php print render($content['field_conference_email'][0]['#markup']);?>">
               Email us </a></p>
            </div>
          </div>    
       </div>
          <div class="conference-map"><?php print render($content['field_map_address']); ?></div>

         <?php print render($content['field_conference_description']); ?>
            <?php  if($node->field_invitation_only_conference['und'][0]['value']=='1')
            {      ?>  <div class="cta"><b>This Conference is Invitation Only</b></div><?php }
            else 
            {      ?> 
		<?php if(!empty ($content['field_conference_link'])){ ?>
		<div class="cta">Please register your free ticket by clicking :<?php print render($content['field_conference_link']); ?></div><?php 
				}
		} ?>
               
   
        <div class="content <?php print $classes_array['1']; ?> promotion-details"<?php print $content_attributes; ?> >
          <?php
      // Hide comments, tags, and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
	  //hide($content['field_node_image']);
	  hide($content['field_conference_man']);
	   hide($content['field_conference_email']);
	    hide($content['field_phone_no']);
      
	      ?>    
        </div>
        <div class="conference-speakers">
        <br>
    <?php //print render($content['field_conference_man']); 
	//dsm($content['field_conference_man']['#items']);
if(!empty ($content['field_conference_man']['#items'])) {
    echo "<ul>";	
	
for($i=0;$i<count($content['field_conference_man']['#items']);$i++)
{
	echo '<li><div class="row">';
	//print $content['field_conference_man']['#items'][$i]['field_conference_man_image']['und'][0]['filemime'];
echo '<div class="large-2 columns">';       
if(!empty($content['field_conference_man']['#items'][$i]['field_conference_man_image'][LANGUAGE_NONE][0]['uri'])){             
print "<img src='". file_create_url($content['field_conference_man']['#items'][$i]['field_conference_man_image'][LANGUAGE_NONE][0]['uri'])."' />";}
	echo '</div> <div class="large-8 columns">  <h3>';
  if(!empty ($content['field_conference_man']['#items'][$i]['field_conference_man_title']['und'][0]['value'])){
	print $content['field_conference_man']['#items'][$i]['field_conference_man_title']['und'][0]['value'];}
	echo'</h3><p>';
  if(!empty($content['field_conference_man']['#items'][$i]['field_conference_man_description']['und'][0]['value'])){
	print $content['field_conference_man']['#items'][$i]['field_conference_man_description']['und'][0]['value'];}
	
//['field_conference_man_image']['und'][0]['uri']

	echo "</p></div></div></li>";
    
}
	
echo "</ul>"; } 	//print_r($content['field_conference_man']);
	print render($content);
  ?> 
   
    </div>
      
    </article>
 