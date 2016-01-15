<?php
    //if title and text ist not empty
    if($_POST["title"] != "" AND $_POST["text"] != ""){
        $filename =  $_POST["title"] . '.html';
        $filepath = "./content/$filename";
        //creates a new file in the content folder with the name of the entry title
        $datei = fopen("$filepath","x"); //if file already exists nothing happens
        //bulilds html file
        $headline = "<h2>" . $_POST['title'] . "</h2>";
        $content = "<p>" . $_POST['text'] . "</p>";
            fwrite($datei, $headline,25);
            fwrite($datei, $content,500);
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