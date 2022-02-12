<?php
// Start the session
session_start();
include 'admin/functions.php';
include 'config.php';
?>
<!DOCTYPE html>
<HTML lang="lv">
<HEAD>
<title>MĀJASLAPAS SAGATAVE</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css">
</HEAD>
<BODY>
<h1>MĀJASLAPAS SAGATAVE</h1>
<div id="mainmenu">
<ul>

<?php
  $sql = "SELECT id, virsraksts FROM lapas";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // ja ir sadaļas (lapas), ko drukāt
    while($row = $result->fetch_assoc()) {
      $numurs = $row["id"];
	  $virsraksts = $row["virsraksts"];
	  echo "<li><a href='index.php?id=$numurs'>$virsraksts</a></li>";
    }
  } 
?>

  
  <?php
	if (!pieteicies()) { 
		echo '<li style="float:right"><a href="login.php">Pieteikties</a></li>';
	} else {
		echo '<li style="float:right"><a href="admin/index.php">Administrācijas panelis</a></li>';
		echo '<li style="float:right"><a href="logout.php">Atteikties</a></li>';
	}
  ?>
  
</ul>
</div>
<!-- beidzas izvēlne -->

<?php
if (isset($_GET["id"])) {
	//ja adresē ir padots id parametrs
 $sql = "SELECT * FROM lapas WHERE id=".$_GET["id"];
  $result = $conn->query($sql);

  if ($result->num_rows == 1) {
    // ja atrasta sadaļa, kurai id sakrīt ar saitē esošo id, tad rukājam šis sadaļas saturu
    $row = $result->fetch_assoc(); 
      
	echo "<h2>".$row["virsraksts"]."</h2>";
	echo $row["saturs"];
    
  } 
}
?>


</BODY>
</HTML>