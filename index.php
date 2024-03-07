<!DOCTYPE php>
<html>
	<header>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<style>
.mamaload-button { 
	height: auto; 
	width: 440px; 
	padding: 15px 15px 15px 15px; 
	margin: 0px auto 0px auto; 
	display: block; 
	background: #F3E8E2; 
	font-size: 21px; 
	color: #000000; 
	font-family: Georgia, "Times New Roman", Times, serif; 
	border-radius: 14px; 
	text-shadow: 1px 1px 6px rgba(0, 0, 0, 0.8); 
	filter: dropshadow(color=#000000, offx=1, offy=1); 
}
.mamaload-label{
	height: auto; 
	width: 200px; 
	padding: 15px 15px 15px 15px; 
	margin: 0px auto 0px auto; 
	display: block; 
	font-size: 18px; 
	color: #000000; 
	font-family: Georgia, "Times New Roman", Times, serif; 
}
</style>
	</header>
	<body>
		<!-- <div>Hallo Welt!</div> -->
		<div class="w3-main">
			<ul>
<?php

//Main decider
if(isset($_GET["f"])) {
	displaySingleFile( $_GET["f"] );	
}else{
	createList();
}


function createList(){
	//*** Part Creating the list */
	//$host = "https://downloads.clannonmiller.de/";
	$host = gethostname();//"https://downloads.clannonmiller.de/";
	$path    = './';
	$files = scandir($path);
	foreach($files as $name => $link){
		//$str = $files[$name];
		if(str_starts_with($link,".")) continue;
		if($link=="index.php") continue;
		echo '<li><a href="'.$host.'?f='.$link.'">'.$link.'</a></li>';
	}
}

function displaySingleFile($furl){	
	echo human_filesize(filesize( './'.$furl ),2);
	echo "<div class='mamaload-label'>".$furl." (".human_filesize(filesize( './'.$furl ),2).")</div><br/>";
	echo "<button class='w3-button mamaload-button'>download</button>";
}

function human_filesize($bytes, $decimals = 2) {
	$sz = 'BKMGTP';
	$factor = floor((strlen($bytes) - 1) / 3);
	return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$sz[$factor];
  }


?>
		</ul>
</div>
	</body>
</html>