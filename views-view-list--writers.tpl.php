<?php
//dsm($author);
//$auth_sort=array('a'=>1,'b'=>2,'c'=>3,'d'=>4,'e'=>5,'f'=>6,'g'=>7,'h'=>8,'i'=>9,'j'=>10,'k'=>11,'l'=>12,'m'=>13,'n'=>14,'o'=>15,'p'=>16,'q'=>17,'r'=>18,'s'=>19,'t'=>20,'u'=>21,'v'=>22,'w'=>23,'x'=>24,'y'=>25,'z'=>26);
 ?>


<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 * @ingroup views_templates
 */
?>

    <?php 
 //   dsm($rows);
    //print_r($rows);
    foreach ($rows as $id => $row): 
        
$authname = explode(" ", trim(strip_tags($row)));
//print_r($authname);
    if(array_key_exists ( '1' , $authname )){
$lname = $authname[1];}
else {
    $lname=$authname[0];
}
$suth_key= substr($lname, 0,1);       
//$suth_key= substr(trim(strip_tags($row)), 0,1);
 $author[$suth_key][]=$row;?>
     
    <?php endforeach; 
    //dsm($author);
   
    
  echo '<div class="contributor-column large-4 columns">';
    foreach ($author as $key => $name) {
        if($key=='A' ||$key=='B' ||$key=='C' ||$key=='D' ||$key=='E' ||$key=='F' ||$key=='G') {
    echo ' <h3>'.$key.'</h3>';
    echo '<a name="'.strtolower($key).'"></a>';
    echo '<ul class="contributors">';
    foreach ($name as $auth) {
        echo '<li>'. $auth.'</li>';
    } echo '</ul>';
     /*foreach ($author as $key => $name) {
    echo' <li class="large-3 columns"><h3>'.$key.'</h3><ul>';
    foreach ($name as $auth) {
        echo '<li>'. $auth.'</li>';
    } echo '</ul></li>'; }*/
        }   
}
echo '</div>';
    echo '<div class="contributor-column large-4 columns">';
    foreach ($author as $key => $name) {
        if($key=='H' ||$key=='I' || $key=='J' ||$key=='K' ||$key=='L' ||$key=='M') {
    echo ' <h3>'.$key.'</h3>';
    echo '<a name="'.strtolower($key).'"></a>';
    echo '<ul class="contributors">';
    foreach ($name as $auth) {
        echo '<li>'. $auth.'</li>';
    } echo '</ul>';
     /*foreach ($author as $key => $name) {
    echo' <li class="large-3 columns"><h3>'.$key.'</h3><ul>';
    foreach ($name as $auth) {
        echo '<li>'. $auth.'</li>';
    } echo '</ul></li>'; }*/
        }   
}
echo '</div>';
    echo '<div class="contributor-column large-4 columns">';
    foreach ($author as $key => $name) {
        if($key=='N' ||$key=='O' ||$key=='P' ||$key=='Q' ||$key=='R' || $key=='S' ||$key=='T' ||$key=='U' ||$key=='V' ||$key=='W' ||$key=='X' ||$key=='Y' ||$key=='Z') {
    echo ' <h3>'.$key.'</h3>';
    echo '<a name="'.strtolower($key).'"></a>';
    echo '<ul class="contributors">';
    foreach ($name as $auth) {
        echo '<li>'. $auth.'</li>';
    } echo '</ul>';
     /*foreach ($author as $key => $name) {
    echo' <li class="large-3 columns"><h3>'.$key.'</h3><ul>';
    foreach ($name as $auth) {
        echo '<li>'. $auth.'</li>';
    } echo '</ul></li>'; }*/
        }   
}
echo '</div>';
    
?>


