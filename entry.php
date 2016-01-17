<?php
    //mainpage
    echo file_get_contents("./templates/mainpage.html");
    //decodes linkname
    $search = "_";
    $replace = " ";
    $subject = $_GET['entry'];
    $file = str_replace ($search , $replace , $subject);
    $search = "/";
    $replace = "&frasl";
    $subject = $file;
    $file = str_replace ($search , $replace , $subject);
    //includes full article
    echo file_get_contents("./content/$file");
?>