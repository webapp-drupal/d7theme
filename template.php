<?php
/**
 * Implements hook_html_head_alter().
 * This will overwrite the default meta character type tag with HTML5 version.
 */
function creative_responsive_theme_html_head_alter(&$head_elements) {
  $head_elements['system_meta_content_type']['#attributes'] = array(
    'charset' => 'utf-8'
  );
}

/**
 * Insert themed breadcrumb page navigation at top of the node content.
 */
function creative_responsive_theme_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  if (!empty($breadcrumb)) {
    // Use CSS to hide titile .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    // comment below line to hide current page to breadcrumb
	$breadcrumb[] = drupal_get_title();
    $output .= '<nav class="breadcrumb">' . implode(' » ', $breadcrumb) . '</nav>';
    return $output;
  }
}

/**
 * Override or insert variables into the page template.
 */
function creative_responsive_theme_preprocess_page(&$vars) {
	
	// custom content type page template
  // Renders a new page template to the list of templates used if it exists
  if (isset($vars['node']->type)) {
// This code looks for any page--custom_content_type.tpl.php page
    $vars['theme_hook_suggestions'][] = 'page__' . $vars['node']->type;
  }

	
	
  if (isset($vars['main_menu'])) {
    $vars['main_menu'] = theme('links__system_main_menu', array(
      'links' => $vars['main_menu'],
      'attributes' => array(
        'class' => array('links', 'main-menu', 'clearfix'),
      ),
      'heading' => array(
        'text' => t('Main menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['main_menu'] = FALSE;
  }
  if (isset($vars['secondary_menu'])) {
    $vars['secondary_menu'] = theme('links__system_secondary_menu', array(
      'links' => $vars['secondary_menu'],
      'attributes' => array(
        'class' => array('links', 'secondary-menu', 'clearfix'),
      ),
      'heading' => array(
        'text' => t('Secondary menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['secondary_menu'] = FALSE;
  }
}

/**
 * Duplicate of theme_menu_local_tasks() but adds clearfix to tabs.
 */
function creative_responsive_theme_menu_local_tasks(&$variables) {
  $output = '';

  if (!empty($variables['primary'])) {
    $variables['primary']['#prefix'] = '<h2 class="element-invisible">' . t('Primary tabs') . '</h2>';
    $variables['primary']['#prefix'] .= '<ul class="tabs primary clearfix">';
    $variables['primary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['primary']);
  }
  if (!empty($variables['secondary'])) {
    $variables['secondary']['#prefix'] = '<h2 class="element-invisible">' . t('Secondary tabs') . '</h2>';
    $variables['secondary']['#prefix'] .= '<ul class="tabs secondary clearfix">';
    $variables['secondary']['#suffix'] = '</ul>';
    $output .= drupal_render($variables['secondary']);
  }
  return $output;
}

/**
 * Override or insert variables into the node template.
 */
function creative_responsive_theme_preprocess_node(&$variables) {
  $node = $variables['node'];
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
  }
  //dsm($node);
  // Category variable
  if (!empty($node->field_categories)) {
        if($node->field_categories['und'][0]['tid']=='8268' || $node->field_categories['und'][0]['tid']=='8277' || $node->field_categories['und'][0]['tid']=='8320' || $node->field_categories['und'][0]['tid']=='8300')
      {
           //$variables['subchild']
            if(!empty ($node->field_categories['und'][1]['tid'])){
          $child_id=$node->field_categories['und'][1]['tid']; }
      }
      else {
          $child_id=$node->field_categories['und'][0]['tid'];
      }
      if(!empty ($child_id))
      {
          $termname=taxonomy_term_load($child_id);
          $variables['subchild'] = l($termname->name,'taxonomy/term/'.$termname->tid);
      }
      
    foreach ($node->field_categories['und'] as $key => $cat) {
		$section_array[]=$cat['tid'];
      $parents =taxonomy_get_parents_all($cat['tid']);
      //dsm($parents);
      foreach ($parents as $parent) {
        if (count(taxonomy_get_parents_all($parent->tid)) == 1) {
          $parent_tids[] = $parent->tid;
          //dsm($parent);
        }
      }
    }
    
    //dsm($parent_tids);
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
    }elseif(in_array(8373, $parent_tids)){
      $pid=8373;
    }
	elseif(in_array(8374, $parent_tids)){
      $pid=8374;
    }
	elseif(in_array(8398, $parent_tids)){
      $pid=8398;
    }
    $term = taxonomy_term_load($pid);
    if($pid==8300){
      $variables['class4body'] = 'scitech';
    }elseif($pid==8306){
      $variables['class4body'] = 'gibraltar';
    }elseif($pid==8315){
      //Do nothing
    }else{
      $variables['class4body'] = lcfirst($term->name);
    }
    $variables['category'] = l($term->name,'taxonomy/term/'.$pid);
    $variables['termid'] = $pid;
	foreach ($section_array as $value) {
        if($value!=$pid){
        $tid_ids[]=$value;}
    }
    //dsm($tid_ids);
    if(!empty($tid_ids)) {
   $variables['tids'] = implode('+',$tid_ids);
    }
  }

  //$node = $vars['node'];
//dsm($node); 

/* Long read check box operation
if($node->type == "blogs")  {
	
  if($node->field_long_reads['und'][0]['value'] == 1)
  {
	  $variables['theme_hook_suggestion'] = 'node__longread'; 
  } else
  {
       $variables['theme_hook_suggestion'] = 'node__blogs';  
  }
 }elseif($node->type == "story"){
	 
	  $variables['theme_hook_suggestion'] = 'node__story'; 
	 	 }*/
 
}
function creative_responsive_theme_page_alter($page) {
  // <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
  $viewport = array(
    '#type' => 'html_tag',
    '#tag' => 'meta',
    '#attributes' => array(
    'name' =>  'viewport',
    'content' =>  'width=device-width'
    )
  );
  drupal_add_html_head($viewport, 'viewport');
}
//function creative_responsive_theme_form_alter(&$form, &$form_state, $form_id){
	
function creative_responsive_theme_form_views_exposed_form_alter(&$form, &$form_state) {

 if($form['#id'] == "views-exposed-form-taxonomy-term-page"){
	  //print_r($form);
	//dsm($form);
	
    $form['field_user_target_id']['#options']['All'] = 'Author';// overrides <All> on the dropdown
   

  }
  
}

/*function creative_responsive_theme_preprocess_user_picture(&$variables) {
                if($variables['user_picture'])
                {
               $uspic = $variables['user_picture'];
                 $uspic1 =str_replace('users','writers',$uspic);
                 $variables['user_picture']=$uspic1 ;
                }
                //dsm($variables['user_picture']);
}
*/
function creative_responsive_theme_preprocess_image(&$variables) {
  foreach (array('width', 'height') as $key) {
    unset($variables[$key]);
  }
}
  


 function checkmobile(){


    $useragent=$_SERVER['HTTP_USER_AGENT'];

      if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){

      return true; 
    }else{
      return false;
    }
}


require_once 'Mobile_Detect.php';



  function ad_targetting($term){
    
    $parrent_name="";
    $child_name="";
    $child_name = $term->name;
    $parent = taxonomy_get_parents($term->tid);
      if ($parent){
         $parrent_name=reset($parent)->name;
      }else{
         $child_name = '';
         $parrent_name = $term->name;
      }

    return 'window.streamampClientConfig = {targets: {"Category": "'.$parrent_name.'", "SubCategory": "'.$child_name.'"}};';


  } 

    function ad_targetting_article($term_id){
    
    $parrent_name="";
    $child_name="";
    $child_name = $term->name;
    $parent = taxonomy_get_parents($term->tid);
      if ($parent){
         $parrent_name=reset($parent)->name;
      }else{
         $child_name = '';
         $parrent_name = $term->name;
      }

    return 'window.streamampClientConfig = {targets: {"Category": "'.$parrent_name.'", "SubCategory": "'.$child_name.'"}};';


  } 

