<?php

// Start the session
session_start();
include 'config.php';
?>
<!DOCTYPE html>
<HTML lang="lv">
<HEAD>
<title>Pieteikties</title>
<meta charset="UTF-8">
</HEAD>
<BODY>
<h1>Pieteikties</h1>

<form action="" method="get">
<input type="text" placeholder="Ievadiet e-pastu" name="epasts" size="28" value="<?php echo isset($_GET["epasts"]) ? $_GET["epasts"] : ''; ?>" required><br><br>
<input type="password" placeholder="Ievadiet paroli" size="28" name="parole" required><br><br>
<input type="password" placeholder="Ievadiet atkārtoti paroli" size="28" name="parole2" required><br><br>
<input type="text" placeholder="Ievadiet vārdu" name="vards"  size="28"   value="<?php echo isset($_GET["vards"]) ? $_GET["vards"] : ''; ?>" required><br><br>
<input type="text" placeholder="Ievadiet uzvārdu" name="uzvards" size="28" value="<?php echo isset($_GET["uzvards"]) ? $_GET["uzvards"] : ''; ?>" required><br><br>

<input type="checkbox" id="piekritu_noteikumiem" name="piekritu_noteikumiem" value="true"><label for="piekritu_noteikumiem">piekrītu noteikumiem<label><br><br>
<input type="submit" name="submit" value="Reģistrēties">

</form>

<?php




//pārbaudām, vai tika iesniegta pieteikšanās forma un piekrita noteikumiem
if (isset($_GET["submit"])&& (isset($_GET['piekritu_noteikumiem']))) {
	//pārbauda vai parole abas reizes ievadīta vienādi
	if ($_GET["parole2"] !== $_GET["parole"]) {  //ja nav vienādas, tad paziņo, ka nesakrīt
		echo'<h1>parole nesakrīt</h1>';
	
	}else{				//ja sakrīt, tad nosūta datus uz datu bāzi
		
		$sql="INSERT INTO lietotaji (epasts, parole, vards, uzvards, loma)
		VALUES ('".$_GET['epasts']."','".$_GET['parole']."','".$_GET['vards']."','".$_GET['uzvards']."','user')";

		if ($conn->query($sql) === TRUE){
			echo "lietotājs reģistrēts";
			//izveido sesiju ar jaunizveidoto lietotāju
			$_SESSION["ielogojies"] = true;
			$_SESSION["lietotajs"] = $_GET["vards"];
		
			//pārsūta uz citu lapu		
			header("Location: index.php");
			die();

		}else{
			
			// pārbaudām vai kļūda nav tajā, ka e-pasts jau ir reģistrēts
			$epasts=$_GET['epasts'];
			$sql = "SELECT epasts FROM lietotaji WHERE epasts='$epasts'";
			$result = $conn->query($sql);
			
			if ($result->num_rows == 1) {
				// output data of each row
				
				echo'<h1>E-pasts jau reģistrēts</h1>';
			}else{
				// ja nu tomēr ir kāda cita kļūda, sistēma paziņos
				echo '<p>' .$conn->error.'</p>';
			}
			
		}
	}

}else{
	//ja nebija ielikts ķeksis pie piekrišanas
	echo "lūdzu apstipriniet, ka piekrītiet noteikumiem!";
}
/* nolasam datu bāzes VISUS ierakstus

$sql = "SELECT * FROM majasdarbs";
$result = $conn ->query($sql);

if ($result->num_rows>0){
	while ($row=$result->fetch_assoc()){
		echo"<p> id: " .$row["id"]."e-pasts: ".$row["epasts"]."vārds: ".$row["vards"]."</p>";
	}
}	*/	

?>

</BODY>
</HTML>