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
//$output = strtoupper($output);	
//print($output);



$section_array = explode(',',$output);

if (!is_array($section_array))
{
	$section_array[]=$output;
}
$section_array = array_map('trim', $section_array);

$terms =taxonomy_get_children('8268', $vid = 0);
$culture =taxonomy_get_children('8277', $vid = 0);
foreach($culture as $cul) {
array_push($terms,$cul);}
$world=taxonomy_get_children('8320', $vid = 0);
foreach($world as $wrld) {
array_push($terms,$wrld); }
$scitech=taxonomy_get_children('8300', $vid = 0);
foreach($scitech as $stech) {
array_push($terms,$stech); }
$parent = array("8268", "8277", "8320", "8300");
foreach($parent as $maincat) {
    $parent_cat=taxonomy_term_load($maincat);
array_push($terms,$parent_cat); }


//dsm($terms);
//dsm($output1);
foreach($terms as $term)
{
	
	if(in_array(htmlentities($term->tid),$section_array))
	{
            //echo 'mahender';
print l($term->name,'taxonomy/term/'.$term->tid);		
//print '<div class="article-category">'.l($term->name,'taxonomy/term/'.$term->tid).'</div>';
		//echo $term->name;
		break;
	}
}



/*


$section_array = explode(',', $output);
$parent_tids='';
if (!is_array($section_array)) {
  $section_array[] = $output;
}
$section_array = array_map('trim', $section_array);

if (!empty($section_array)) {
  foreach ($section_array as $section) {
    $section= trim($section);
    if (count(taxonomy_get_parents_all((int)$section)) == 1) {
      $parent_tids[] = $section;
    }
  }
  if (!is_array($parent_tids))
{
	$parent_tids[]=$parent_tids;
}
  $parent_tids = array_unique($parent_tids);
    if(in_array(8268, $parent_tids)){
      $pid =8268;
    }elseif (in_array(8277, $parent_tids)) {
      $pid=8277;
    }elseif (in_array(8320, $parent_tids)) {
      $pid=8320;
    }elseif(in_array(8300, $parent_tids)){
      $pid=8300;
    }elseif(in_array(8306, $parent_tids)){
      $pid=8306;
    }elseif(in_array(8315, $parent_tids)){
      $pid=8315;
    }
    if(!empty($pid)){
    $term = taxonomy_term_load($pid);
      print l($term->name,'taxonomy/term/'.$pid);}
  
} */
  
  /*
	$section_array = array_map('trim', $section_array);
			 if (in_array('CULTURE', $section_array)) {            
			print l('Culture','taxonomy/term/8277');
        }elseif(in_array('WORLD', $section_array)) {		    
			print l('World','taxonomy/term/8320'); 
        } elseif(in_array('SCIENCE &AMP; TECH', $section_array)) {
			print l('Science & Tech','taxonomy/term/8300');	   
        }elseif(in_array('POLITICS', $section_array)) {
			print l('Politics','taxonomy/term/8268');		    
        }
    }*/
//print $output;
/* $section='';
 $section_array ='';

    //$node = node_load($output);

    $node = node_load($output);
	
	
	
	
	$categories = field_get_items('node', $node, 'field_categories');
	dsm($categories);


    if (is_object($node)) {
        // get all fields for the given node type
		
		//$bundles = array('property', 'open_house', 'agent', 'office');
        $fields = field_info_instances('node', $node->type);
			
			
        foreach ($fields as $fieldname => $info) {
            // check if fields are taxonomy terms
		
            if ($info['widget']['module'] == 'term_reference_tree') {
				
					//echo "<pre>";print_r($info['widget']['module']);echo "</pre>";
                // if they are, load all term names and tids for given field
                $term_field = field_get_items('node', $node, $fieldname);
			
				//dsm($term_field);
                if (is_array($term_field)) {
                    $section_array[] = str_replace("field_", "", $fieldname);
						//dsm($section_array);
                }
            }
			
			
        }
   }
    if (is_array($section_array)) {
	   
 
			 if (in_array('culture', $section_array)) {
            echo '<a href="/taxonomy/term/8277">Culture</a>';
        }elseif(in_array('worldaffairs', $section_array)) {
		    echo '<a href="/taxonomy/term/8320">World</a>';
        } elseif(in_array('scitech', $section_array)) {
		    echo '<a href="/taxonomy/term/8300">Science & Tech</a>';
        }
        elseif(in_array('politics', $section_array)) {
		    echo '<a href="/taxonomy/term/8268">Politics</a>';
        }
    }
    */


 ?>

