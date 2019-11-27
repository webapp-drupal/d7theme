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
<?php 
//dsm($row->field_field_author_guest[0]['raw']['value']);

//dsm($row->field_field_author_guest);
$author_name=$row->users_node_name;
$author_id=$row->users_node_uid;

?>
<?php  


if(array_key_exists(0, $row->field_field_promo_title))
{	$nod_title=$row->field_field_promo_title[0]['raw']['value']; }
else
{	$nod_title=$row->node_title;}
print '<h5> '. l($nod_title, "node/".$row->nid) .'</h5>'; ?>
<?php  print '<div class="article-author">'.print_author($author_name,$author_id,$row->field_field_authored_by,$row->field_field_guest_author).'</div>'; ?>

