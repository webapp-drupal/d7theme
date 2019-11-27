<?php
/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
 
                 
 
?>



<?php 
foreach ($rows as $id => $row): 
?>
<?php if ($id == 0): ?> <article class="main-feature"><?php endif; ?>
<?php if($id==1){ ?>
  <div class="row article-grid">
  <div class="clearfix row-grid2">
<?php } ?>
<?php if($id==3){ ?><div class="clearfix row-grid3"><?php } ?>

<?php if (($id == 1 || $id == 2 )): ?> <div class="large-6 columns"><article class="clearfix"><?php endif; ?>
<?php if (($id == 3 || $id == 4 || $id == 5 )): ?> <div class="large-4 columns"><article class="clearfix"><?php endif; ?>

<div class="row-class<?php print $id; ?>">
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
<?php if ($id== 0): ?> </article><?php endif; ?>

<?php if ($id== 2): ?> </div><?php endif; ?>
<?php if ($id== 6): ?> </div></div><?php endif; ?>
<?php 

endforeach; ?>