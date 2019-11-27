<?php

if (function_exists('geolocation_check_session')) {
	if (geolocation_check_session() == 'US') {
		include(path_to_theme() . '/includes/header-america.php');		
	} else {
		include(path_to_theme() . '/includes/header-uk.php');
	}
} else {
	include(path_to_theme() . '/includes/header-default.php');
}
