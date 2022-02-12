<?php
// Start the session
session_start();
include 'admin/functions.php';
include 'config.php';
?>
<!DOCTYPE html>
<HTML lang="lv">
<HEAD>
<title>UZSTĀDĪT SISTĒMU</title>
<meta charset="UTF-8">
</HEAD>
<BODY>
<h1>UZSTĀDĪT SISTĒMU</h1>
<?php
// izveidojam tabulu lietotaji
$sql = "CREATE TABLE lietotaji (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
epasts VARCHAR(100) NOT NULL,
parole VARCHAR(255) NOT NULL,
vards VARCHAR(30),
uzvards VARCHAR(30),
registrets TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
loma VARCHAR(5)
)";

if ($conn->query($sql) === TRUE) {
  echo "<p>Tabula lietotaji veiksmīgi izveidota!</p>";
} else {
  echo "<p>Kļūda veidojot tabulu lietotaji: " . $conn->error . "</p>";
}


// izveidojam tabulu lapas
$sql = "CREATE TABLE lapas (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
virsraksts VARCHAR(255) NOT NULL,
saturs TEXT,
redigets TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "<p>Tabula lapas veiksmīgi izveidota!</p>";
} else {
  echo "<p>Kļūda veidojot tabulu lapas: " . $conn->error . "</p>";
}
?>

</BODY>
</HTML>