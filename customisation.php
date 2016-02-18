<?php
	$fullpage = file_get_contents("./templates/mainpage.html");
	$delimiter = "<!--f-->";
	$page = array();
	$page = explode($delimiter, $fullpage);
	echo $page[0];
    echo file_get_contents("./templates/customisation.html");
    echo $page[1];
?>