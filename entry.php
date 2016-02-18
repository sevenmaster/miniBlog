<?php
    //mainpage
	$fullpage = file_get_contents("./templates/mainpage.html");
	$page = array();
	$page = explode("<!--f-->", $fullpage); 
    $head = array();
	$head = explode("<!--e-->", $page[0]);
    echo $head[0];
    echo '<link rel="stylesheet" type="text/css" href="external/entry_full.css">';
    echo $head[1];
    //decodes linkname
    $file = str_replace ("_" , " " , $_GET['entry']);
    $file2 = str_replace ("/" , "&#47;" , $file);
    //includes full article
    $file2 = file_get_contents("./content/$file2");
    $file2 = '<div class="entry">' . $file2 . '</div>';
    echo $file2;
    echo $page[1];
?>