<?php
// Start the session
session_start();
include 'functions.php';
include "../config.php";

if (!pieteicies()) {
	//ja nav definēts sesijas mainīgais "ielogojies" 
		header("Location: ../login.php");
		die();	
	} else {
		echo "<h2 style='color: red'>  ",$_SESSION["lietotajs"], " ir sistēmā!</h2>";
	//ja ir ielogojies, tad rādām administrācijas sadaļas saturu
?>
<!DOCTYPE html>
<HTML lang="lv">
	<HEAD>
		<title>Administrācijas panelis</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css">
	</HEAD>
<BODY>
	<h1>ADMINISTRĀCIJAS PANELIS</h1>
		<div id="mainmenu">
			<ul>
				<li><a href="index.php">Sākums</a></li>
				<li><a href="index.php?action=pages">lapas</a></li>
				<li><a href="index.php?action=users">lietotāji</a></li>
				<li style="float:right"><a class="active" href="../index.php">Uz mājas lapu</a></li>
				<li style="float:right"><a class="active" href="../logout.php">Iziet</a></li>
			</ul>
		</div>
<?php
	if(isset($_GET["action"])){  //ja ir parametrs ACTION, šeit ieliks citu lapu kodu - attiecīgo php failu
		if ($_GET["action"] == "pages"){
			include "pages.php";
		}
		if ($_GET["action"] == "users"){
			include "users.php";
		}


	}else{ //ja nav action parametra (vai nav atpazīstams), tad rāda sākuma sadaļu

?>
	<h2>Esiet sveicināti administrācijas panelī!</h2>
	<p>Šo daļu redz tikai tie lietotāji, kas ir pieteikušies!<p>
	

<?php } //aizveras pie get action else
?>
</BODY>
</HTML>
<?php } //aizveras ielogošanās else ?>



