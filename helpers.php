<?php
function render($template,$data = array())
{
	$path = $template."php";
	extract($data);
	require($path);
}
?>
