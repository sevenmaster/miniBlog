<?php
    //german date layout
    setlocale(LC_TIME, 'de_DE@euro', 'de_DE', 'de', 'ge');
	$fullpage = file_get_contents("./templates/mainpage.html");
	$delimiter = "<!--f-->";
	$page = array();
	$page = explode($delimiter, $fullpage);
	echo $page[0];
	echo file_get_contents("./templates/controlls.html");
	$entrys = array();
	//puts file creation date and filename of all files in the content folder in arrarys
    $handle=opendir ("./content/");
    while($datei = readdir($handle)){       
         if($datei!="." AND $datei!=".."){
            $sorthelp[] = filectime("./content/$datei");
			$entrys[] = $datei;
		}
    }
	//Prevents error message if there are no entrys yet
	if (empty($entrys)){
	 echo "Keine Einträge";
	}
	else{
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
		echo file_get_contents("./content/$entrys[$key]");
		//codes entry name for link
		$search = " ";
		$replace = "_";
		$subject = $entrys[$key];
	    $link2 = str_replace ($search , $replace , $subject);

		$search = "/";
        $replace = "&#47;";
		$subject = $link2;
        $file = str_replace ($search , $replace , $subject);

		$link = '<a href="./entry.php?entry=' . $file . '">weiter lesen</a>';
		echo $link;
		echo "<hr>";
	}
	}
	echo $page[1];
?>