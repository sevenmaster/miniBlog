<?php
    //"/" removen
    //if title and text ist not empty
    function opentag($subject){
    $search = "<";
    $replace = "&lt";
    $opentag = str_replace ($search , $replace , $subject);
    return $opentag;
    }
    function closetag($subject){
    $search = ">";
    $replace = "&gt";
    $closetag = str_replace ($search , $replace , $subject);
    return $closetag;
    }
    echo file_get_contents("./templates/mainpage.html");
    //checks if title and text is not empty
    if($_POST["title"] != "" AND $_POST["text"] != ""){
        $filename =  $_POST["title"] . '.html';
        //all entrys will be saved in the content folder als a .html file
        $filepath = "./content/$filename";
        //creates a new file in the content folder with the name of the entry title
        $datei = fopen("$filepath","x"); //if file already exists nothing happens
        //bulilds html file and triggers the functions for replaceing the "<" ">"
        $headline = $_POST['title'];
        $content = $_POST['text'];
        $headline = mb_convert_encoding($headline, 'UTF-8', mb_detect_encoding($headline));
        $headline = opentag($headline);
        $headline = closetag($headline);
        $headline = "<h2>". $headline . "</h2>";
        $content = mb_convert_encoding($content, 'UTF-8', mb_detect_encoding($content));
        $content = opentag($content);
        $content = closetag($content);
        $content = "<p>" . $content . "</p>";
        // File header indicating that the file is UTF-8
        fwrite($datei, pack("CCC",0xef,0xbb,0xbf));
            fwrite($datei, $headline,25);
            fwrite($datei, $content,5555);
        fclose($datei);
        //redirect to mainpage
        header("Location: /miniBlog/index.php");
        die();
    }
    else{
        //redirect to the editpage
        header("Location: /miniBlog/templates/editpage.html");
        die();
    }
?>