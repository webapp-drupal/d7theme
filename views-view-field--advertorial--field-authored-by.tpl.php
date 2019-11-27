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

$author_name=$row->users_node_name;
$author_id=$row->users_node_uid;

$nod_title=$row->node_title;
print '<h2>'. l($nod_title, "node/".$row->nid) .'</h2>'; ?>
<?php //if($row->field_field_subheadline[0]['raw']['value'] != '') 
if(is_array($row->field_field_subheadline) && array_key_exists(0, $row->field_field_subheadline)){
print '<div class="standfirst">'.$row->field_field_subheadline[0]['raw']['value'].'</div>';  } ?>
<?php  print '<div class="article-author">'.print_author($author_name,$author_id,$row->field_field_authored_by,$row->field_field_guest_author).'</div>'; $noddate = date('d M h:i', $row->node_created);
		 print  '<div class="article-date">'.$noddate .'</div>';?>