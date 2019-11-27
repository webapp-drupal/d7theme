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
?> <?php

$section_array = explode(',',$output);

if (!is_array($section_array))
{
	$section_array[]=$output;
}
$section_array = array_map('trim', $section_array);
$terms =taxonomy_get_children('8306', $vid = 0);

//dsm($output1);
foreach($terms as $term)
{
//dsm($term);

	if(in_array($term->tid,$section_array))
	{
		print '<div class="article-category">'.l($term->name,'taxonomy/term/'.$term->tid).'</div>';
		//echo $term->name;
		break;
	}
}




?>
