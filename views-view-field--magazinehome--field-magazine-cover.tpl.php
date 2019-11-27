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

//dsm($row->nid);
//echo $row->nid;
 $prev_nid = get_prev($row->nid);
 $next_nid = get_next($row->nid);
print $output; 
?>
<ul><li>
<?php if($prev_nid)
 {
 echo "<a href='/magazinepage/".$prev_nid."'>Previous</a>";
 }
?>
</li>
<li>
<?php
if($next_nid)
{
	
 echo "<a href='/magazinepage/".$next_nid."'>Next</a>";
}
 ?></li></ul>
 <?php
 function get_prev($nid)
 {

	 $result = db_query("SELECT node.nid FROM {node} node WHERE node.nid<".$nid." and node.Status=1  AND node.type IN  ('magazine') order by node.nid desc limit 1");
$res=$result->fetchAll();
//dsm($res);
return $res[0]->nid;

 }
 
 function get_next($nid) {
  $result = db_query("SELECT node.nid FROM {node} node WHERE node.nid > " . $nid . " and node.Status=1  AND node.type IN  ('magazine') order by node.nid  limit 1");
  $res = $result->fetchAll();

  if (is_array($res) && array_key_exists(0, $res))
    return $res[0]->nid;
}
