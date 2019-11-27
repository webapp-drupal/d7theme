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

//$row->field_field_sponsored_link
//$row->field_field_sponsored_by
//$row->field_field_select_type
//dsm ($row);
if(!empty($row->field_field_sponsored_article)){
	//dsm($row);
$sp_val= $row->field_field_sponsored_article[0]['raw']['value'];
}

if(isset($sp_val) && $sp_val=="1") {  ?>
<div class="article-sponsored"><?php
$select_type='';
$select_type1='';
$select_type2='';
$select_type3='';
$select_type4='';
 if(isset($row->field_field_select_type[0]['raw']['value'])) {
	// $select_type='<p>'.isset($row->field_field_select_type[0]['raw']['value']) . '&nbsp;<a href='.isset($row->field_field_sponsored_link[0]['raw']['url']).'>'.isset($row->field_field_sponsored_by[0]['raw']['value']) .'</a></p>'; }
	
$select_type='<p>'.$row->field_field_select_type[0]['raw']['value'] ; }

if(!empty ($row->field_field_sponsored_link)) {
$select_type1='&nbsp;<a href='.$row->field_field_sponsored_link[0]['raw']['url'].'>'; 
 }

if(!empty ($row->field_field_sponsored_by[0]['raw']['value'])) {
$select_type2='&nbsp;'. $row->field_field_sponsored_by[0]['raw']['value']; }

if(!empty ($row->field_field_sponsored_link)) {
$select_type3='</a>'; }
if(!empty ($row->field_field_select_type)) {
$select_type4= '</p>' ; }


echo $select_type.$select_type1.$select_type2.$select_type3.$select_type4.$output;

//echo $output;



//echo '<p>'.$row->field_field_select_type[0]['raw']['value'].' <a href='.$row->field_field_sponsored_link[0]['raw']['url'].'>' . $row->field_field_sponsored_by[0]['raw']['value'].'</a></p>'.$output;

//print $output;  ?></div> 



<?php   }?>