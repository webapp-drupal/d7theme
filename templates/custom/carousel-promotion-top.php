<?php
/** Handles top carousel banner
  */ 

$node_type = node_load(arg(1))->type;

if( (arg(0) == 'node' && $node_type == 'story' ) || arg(0) == 'story' ){
	ob_start();
  	include 'carousel-promotion-top--story.html';
  	$template_content = ob_get_clean();

  	echo $template_content;
}elseif(arg(0) == 'us'){
	ob_start();
	include 'carousel-promotion-top-us--default.html';
	$template_content = ob_get_clean();

  	echo $template_content;
}else{
	ob_start();
  	include 'carousel-promotion-top--default.html';
  	$template_content = ob_get_clean();

  	echo $template_content;
}
