<?php

/**
 * @file
 * This template is used to print a single field in a view.
 *
 * It is not actually used in default Views, as this is registered as a theme
 * function which has better performance. For single overrides, the template is
 * perfectly okay.
 *
 * Variables available:
 * - $view: The view object
 * - $field: The field handler object that can process the input
 * - $row: The raw SQL result that can be used
 * - $output: The processed output that will normally be used.
 *
 * When fetching output from the $row, this construct should be used:
 * $data = $row->{$field->field_alias}
 *
 * The above will guarantee that you'll always get the correct data,
 * regardless of any changes in the aliasing that might happen if
 * the view is modified.
 */
 
?>

<?php //print $output; 
//dsm($row);
$img='';
if(!empty ($row->field_field_featured_author_image)){
$img=$row->field_field_featured_author_image[0]['raw']['uri'];
$profile_url = file_create_url($img);}
?>
<div class="row"><header class="author-header">
            <div class="row"><?php if(!empty($img)) { ?>
           <div class="large-4 columns author-image"><img src="<?php print $profile_url;?>" /></div> <?php }?>
              <div class="large-8 columns author-details">
                <h1><?php echo $row->users_node_name?></h1>
                 <?php if(!empty($row->field_field_userbiography)) { ?><p> <?php echo $row->field_field_userbiography[0]['raw']['value'];  ?></p><?php } ?>
                <?php //if($row->field_field_twitter_name[0]['raw']['title']!='') 
              if(!empty($row->field_field_twitter_name))  { ?>
                <div class="author-twitter twitter-button">
              <?php //echo $row->field_twitter_name[0]['raw']['value']
              
              ?>
                   <a href="<?php echo $row->field_field_twitter_name[0]['raw']['url'];  ?>" class="twitter-follow-button" data-show-count="false">
                        Follow @<?php echo $row->field_field_twitter_name[0]['raw']['title']; ?></a>
                     <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>  
           <!-- <a href="#" onClick="window.open('<?php //echo $row->field_field_twitter_name[0]['raw']['url'];  ?>','window','width=400,height=200')"><?php //echo $row->field_field_twitter_name[0]['raw']['title']; ?></a> -->
                </div>
                
                 <?php }?>
              </div>
            </div>
          </header></div>

          
      