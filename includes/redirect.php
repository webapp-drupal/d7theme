<?php
	$lang=$_REQUEST['NSVER'];

	switch ($lang) {
	    case 'US':
	        $page = '/frontpage-america';
	        break;    
	    default:
	        $page = '/';
	}

	if ($page) {
		setcookie('NS_version', $_POST['NSVER'], time() + 60*60*24*30, '/');
	    header("Location: ". $page);
	    exit;
	}else{
		
	}
?>