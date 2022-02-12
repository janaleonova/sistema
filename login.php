<?php

// Start the session
session_start();
include 'config.php';
include 'admin/functions.php';
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
<input type="text" placeholder="Ievadiet e-pastu" name="epasts" size="28" value="<?php echo isset($_GET["epasts"]) ? $_GET["epasts"] : ''; ?>" required ><br><br>
<input type="password" placeholder="Ievadiet paroli" size="28" name="parole" required><br><br>
<input type="checkbox" id="atcereties" name="atcereties" value="true"><label for="atcereties">atcerēties mani<label><br><br>
<input type="submit" name="submit" value="Pieteikties">
<input type="button" name="registreties" value="Reģistrēties" onclick="window.location.href = 'register.php'">

</form>

<?php

// nolasam datu bāzes VISUS ierakstus

echo"<br><br><br><hr><h3>špikeris ar lietotājiem</h3>";
$sql = "SELECT * FROM lietotaji";
$result = $conn ->query($sql);
if ($result->num_rows>0){
	while ($row=$result->fetch_assoc()){
		echo"<p> e-pasts: ".$row["epasts"]." parole: ".$row["parole"]."</p>";
	}
}

if (isset($_GET["submit"])) {
	
	//pārbaudām, vai tika iesniegta pieteikšanās forma
	$sql="SELECT epasts, parole, vards From lietoatji WHERE epasts='".$_GET['epasts']."'";
	$result =$conn->query($sql);

		//ja neatrod šādu ierakstu, tad paziņo, ka nepieciešams ielogoties
		if ($result->num_rows==0){
			echo"<h1 style='color: red'>Nav atrasts šāds lietotājs. Nepieciešams reģistrēties</h1>";

		//ja atrod 1 šādu ierakstu, tad pārbauda paroli	
		}elseif ($result->num_rows==1){
			$row=$result->fetch_assoc();
			if($row['parole']== $_GET['parole']){
				//ja pareizi dati, tad ielogojam lietotāju un izveido sessiju
				$_SESSION["ielogojies"] = true;
				$_SESSION["lietotajs"] = $row["vards"];
				
				//izveido cookies
				if (isset($_GET["atcereties"])) {
					setcookie("ielogojies",$row["epasts"], time() + (86400 * 30), "/");
				}
				
				//pārsūta uz citu lapu, jo ir ielogojies
				header("Location: index.php");
				die();
				
			} else {
				//ja nepareizi dati, tad izdrukājam paziņojumu
				echo "<p style='color: red'>Lietotājvārds vai parole nav pareizi!</p>";
				
			}
		}
	}
?>

</BODY>
</HTML>