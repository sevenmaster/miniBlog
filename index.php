<?php
    //german date layout
    setlocale(LC_TIME, 'de_DE@euro', 'de_DE', 'de', 'ge');
    echo "<hr>";
    //puts file creation date and filename of all files in the content folder in arrarys
	include("./templates/mainpage.html");
	$entrys = array();      
    $handle=opendir ("./content/");
    while($datei = readdir($handle)){       
         if($datei!="." AND $datei!=".."){
            $sorthelp[] = filectime("./content/$datei");
			$entrys[] = $datei;
		}
    }
    closedir($handle);
    //sorts entrys by file creation time
    if (isset($_POST['old'])){
        asort($sorthelp);
    }else{
			arsort($sorthelp);
		}
	if (isset($_POST['new'])){
		arsort($sorthelp);
	}
    //outputs date, the blog entry and a link to the entry page
    foreach ($sorthelp as $key => $value){
		echo strftime("%d. %B %Y", $value);
		include("./content/$entrys[$key]");
		//codes entry name for link
		$search = " ";
		$replace = "_";
		$subject = $entrys[$key];
	    $link2 = str_replace ($search , $replace , $subject);
		$link = '<a href=./entry.php?entry=' . $link2 . '>weiter lesen</a>';
		echo $link;
		echo "<hr>";
	}
	echo '<a href="./templates/editpage.html">Neuer Blogeintrag</a>';
?>