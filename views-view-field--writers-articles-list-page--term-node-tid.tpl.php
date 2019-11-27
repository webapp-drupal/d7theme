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
$output = strtoupper($output);	
$section_array = explode(',',$output);
$cat='';
if (!is_array($section_array))
{
	$section_array[]=$output;
}
//dsm($section_array);
if (is_array($section_array)) {
	$section_array = array_map('trim', $section_array);
			 if (in_array('CULTURE', $section_array)) {            
			$cat = l('Culture','taxonomy/term/8277');
        }elseif(in_array('WORLD', $section_array)) {		    
			$cat = l('World','taxonomy/term/8320'); 
        } elseif(in_array('SCIENCE &AMP; TECH', $section_array)) {
			$cat = l('Science & Tech','taxonomy/term/8300');	   
        }elseif(in_array('POLITICS', $section_array)) {
			$cat = l('Politics','taxonomy/term/8268');		    
        }
    }
		$noddate = date('d F', $row->node_created);
	$title = l($row->node_title,'node/'.$row->nid);
	 print '<div class="article-category">'.$cat.'</div>';	
                    print '<h2>'.$title.'</h2>';
					
$author_name=$row->users_node_name;
$author_id=$row->users_node_uid; 
				
	// if($row->field_field_subheadline[0]['raw']['value'] != '') 
         if(!empty($row->field_field_subheadline)) {
print '<div class="standfirst">'.$row->field_field_subheadline[0]['raw']['value'].'</div>';  } 
 print '<div class="article-author">'.print_author($author_name,$author_id,$row->field_field_authored_by,$row->field_field_guest_author).'</div>';
 print '<div class="article-date">'.$noddate.'</div>';
//dsm($field);
	?>