<?php
/**
 * @file
 * Default simple view template to display a list of rows. second row
 *
 * @ingroup views_templates
 */
 
                 

?>
<?php 
foreach ($rows as $id => $row): 
?>
<?php if ($id == 0):
      $magazine_id = theme_get_setting('front_page_section_settings_content_magazine_id');
      $magazine = node_load( (int) $magazine_id );
      $img_url = file_create_url($magazine->field_magazine_cover['und'][0]['uri']);
      $options = array('absolute' => TRUE);
      $magazine_url = url('node/' . $magazine_id, $options);

      $magazine_article_title = theme_get_setting('front_page_section_settings_content_magazine_article_title');
      $magazine_article_url = theme_get_setting('front_page_section_settings_content_magazine_article_url');
    ?>
      <div class="latest-issue-promo">
        <div class="row">
          <div class="large-4 columns">
            <a href="<?php echo $magazine_url ?>"><img src="<?php echo $img_url ?>" alt="New Statesman magazine"></a>
          </div>
          <div class="large-8 columns article-text">
            <h2><a href="<?php echo $magazine_article_url; ?>"><?php echo $magazine_article_title; ?></a></h2>
            <p><?php echo theme_get_setting('front_page_section_settings_content_description'); ?></p>
      <?php
        if(theme_get_setting('front_page_section_settings_content_magazine_author') !== '')
        {?>
          <p class="article-author">By <?php echo theme_get_setting('front_page_section_settings_content_magazine_author'); ?></p>
      <?php }?>
          </div>
        </div>
      </div>
      <!-- .latest-issue-promo -->

<?php 
    continue; 
  endif; 
?>

<?php if($id==1){ ?>
  <div class="row article-grid">
  <div class="clearfix row-grid2">
<?php } ?>
<?php if($id==3){ ?><div class="clearfix row-grid3"><?php } ?>

<?php if (($id == 1 || $id == 2 )): ?> <div class="large-6 columns"><article class="clearfix"><?php endif; ?>
<?php if (($id == 3 || $id == 4 || $id == 5 )): ?> <div class="large-4 columns"><article class="clearfix"><?php endif; ?>

<div class="row-class<?php print $id; ?> alternate2">
<?php if (!empty($title)): ?>
  <<?php print $group_element; ?><?php print drupal_attributes($group_attributes); ?>>
    <?php print $title; ?>
  </<?php print $group_element; ?>>
<?php endif; ?>
<?php if (!empty($list_element)): ?> 
  <<?php print $list_element; ?><?php print drupal_attributes($list_attributes); ?>>
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
  <?php if (!empty($row_element)): ?>
  <<?php print $row_element; ?><?php print drupal_attributes($row_attributes[$id]); ?>>
  <?php endif; ?>
    <?php print $row; ?>
  <?php if (!empty($row_element)): ?>
  </<?php print $row_element; ?>>
  <?php endif; ?>
<?php endforeach; ?>
<?php if (!empty($list_element)): ?>
  </<?php print $list_element; ?>>
<?php endif; ?>
</div >

<?php if (($id != 0)): ?> </article></div><?php endif; ?>

<?php if ($id== 2): ?> </div><?php endif; ?>

<?php if (( $id == 5 )): ?>
  </div> <!-- end row !-->
    </div> <!-- end row !-->
      <div class="row magazine-section-footer">
      	<div class="large-4 columns cta readmore-container"><a class="magazine-readmore" href="/magazine">Read More</a></div>
      	<div class="large-8 columns subscribe-promo">
	        <!--<p><?php // echo theme_get_setting('front_page_section_settings_content_subs_promo'); ?></p>-->
	        <div class="cta"><a href="<?php echo theme_get_setting('front_page_section_settings_content_subs_promo_link'); ?>">Subscribe for just &pound;1 a week</a></div>
      	</div>
      </div>
      
  <?php endif; ?>

<?php 

endforeach; ?>