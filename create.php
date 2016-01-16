<?php
    //spitze klammern ersetzen
    //"/" removen
    //if title and text ist not empty
    if($_POST["title"] != "" AND $_POST["text"] != ""){
        $filename =  $_POST["title"] . '.html';
        //all entrys will be saved in the content folder als a .html file
        $filepath = "./content/$filename";
        //creates a new file in the content folder with the name of the entry title
        $datei = fopen("$filepath","x"); //if file already exists nothing happens
        //bulilds html file
        $headline = "<h2>" . $_POST['title'] . "</h2>";
        $content = "<p>" . $_POST['text'] . "</p>";
                    $headline = mb_convert_encoding($headline, 
                'UTF-8', mb_detect_encoding($headline));
        $content = mb_convert_encoding($content, 
                'UTF-8', mb_detect_encoding($content));
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