<?php
// Start the session
session_start();
include 'admin/functions.php';
include "config.php";


?>
<!DOCTYPE html>
<HTML lang="lv">
<HEAD>
<title>Mājas lapas sagatave</title>
<link rel="stylesheet" type="text/css" href="style.css">
<meta charset="UTF-8">
</HEAD>
<BODY>
		<?php
			$sql = "SELECT id, virsraksts FROM lapas";
			$result = $conn->query($sql);
	
			if ($result->num_rows>0){  //ja ir sagatavotas sadaļas (lapas), ko drukāt no datubāzes
			while ($row=$result->fetch_assoc()){
				$numuri = $row['id'];
				$virsraksti=$row['virsraksts'];
				echo "<p> <a href='index.php?id=$numuri'>$virsraksti</a></p>";
				}
		?>

<h1>Mājas lapas sagateve</h1>
	<div id="mainmenu">
		<ul>
			<?php
			$sql = "SELECT id, virsraksts FROM lapas";
			$result = $conn->query($sql);
	
			if ($result->num_rows>0){  //ja ir sagatavotas sadaļas (lapas), ko drukāt no datubāzes
			while ($row=$result->fetch_assoc()){
				$numuri = $row['id'];
				$virsraksti=$row['virsraksts'];
				echo "<p> <a href='index.php?id=$numuri'>$virsraksti</a></p>";
				}
			?>
	
			<?php
		
			$sql = "SELECT id, virsraksts FROM lapas";
			$result = $conn ->query($sql);

			if ($result->num_rows>0){  //ja ir sagatavotas sadaļas (lapas), ko drukāt no datubāzes
				while ($row=$result->fetch_assoc()){
					$numurs = $row["id"];
					$virsraksts = $row["virsraksts"];
					echo "<li><a href='index.php?id=$numurs'>$virsraksts</a></li>";
				
				}
			}
			?>

			<?php
				if (!pieteicies()) { 
					echo '<li style="float:right"><a class="active" href="login.php">Pieteikties</li>'; 
				}else{
					echo '<li style="float:right"><a class="active" href="admin/index.php">Uz admin</a></li>';
					echo '<li style="float:right"><a class="active" href="logout.php">Iziet</a></li>';
				}
			?>
		</ul>
	</div> <!--beidzas main menu-->

		<p>Šeit esošā informācija ir redzama visiem!</p>
		

</BODY>
</HTML>