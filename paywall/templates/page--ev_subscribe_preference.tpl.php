<?php
/** Redirects to correct subs page **/
// echo 'here:'; var_dump(geolocation_check_session());
if ( function_exists('geolocation_check_session') ){
  if( geolocation_check_session() == 'US' ){
    header("Location: " . (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/' . variable_get('paywall_main_subscribe_page_us') );
    exit;
  }else{
  	header("Location: " . (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/' . variable_get('paywall_main_subscribe_page') );
    exit;
  }
}else{
	header("Location: " . (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/' . variable_get('paywall_main_subscribe_page') );
    exit;
}

?>