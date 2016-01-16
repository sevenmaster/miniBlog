<?php
    //"/"ersetzen
    //mainpage
    include("./templates/mainpage.html");
    //decodes linkname
    $search = "_";
    $replace = " ";
    $subject = $_GET['entry'];
    $file = str_replace ($search , $replace , $subject);
    //includes full article
    include("./content/$file");
?>