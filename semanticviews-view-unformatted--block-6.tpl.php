<?php
/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
 
                 
 
?>
<?php if( !function_exists('displayHomeSectionArticles')){
    function displayHomeSectionArticles($id, $row, $title, $group_attributes, $group_element, $list_element, $list_attributes, $rows, $row_attributes, $row_element){ ?>
      <?php ob_start(); ?>
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
      <?php
      $output = ob_get_clean();
      return $output;
    
    } } ?>



<?php 
foreach ($rows as $id => $row): 
?>

 <?php if ($id == 0): ?> 
  <div class="alternate2">
    <div class="large-8 columns">
      
        <article class="main-feature alternate">
          <?php echo displayHomeSectionArticles($id, $row, $title, $group_attributes, $group_element, $list_element, $list_attributes, $rows, $row_attributes, $row_element); ?>
        </article>
    
    </div>
  </div>
  <?php endif; ?>

<?php if (($id == 1 || $id == 2 || $id == 3 )): ?>
<div class="article-grid">
  <div class="large-4 columns">
    <article class="clearfix">
      <?php echo displayHomeSectionArticles($id, $row, $title, $group_attributes, $group_element, $list_element, $list_attributes, $rows, $row_attributes, $row_element); ?>
    </article>
  </div>
<?php endif; ?> 
</div>

<?php if (($id == 4 || $id == 5 )): ?>
<div class="article-grid">
    <div class="large-6 columns spacerl">
      <article class="clearfix">  
        <?php echo displayHomeSectionArticles($id, $row, $title, $group_attributes, $group_element, $list_element, $list_attributes, $rows, $row_attributes, $row_element); ?>
      </article>
    </div>
</div>
<?php endif; ?>



<?php 

endforeach; ?>