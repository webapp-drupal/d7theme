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

 
    $node = node_load($output);

    if (is_object($node)) {
        // get all fields for the given node type
		
		//$bundles = array('property', 'open_house', 'agent', 'office');
        $fields = field_info_instances('node', $node->type);
			/*dsm($fields);*/
			
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
    if (!empty($section_array) && is_array($section_array)) {
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
    


 ?>

