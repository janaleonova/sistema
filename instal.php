<?php
    session_start();
    include 'admin/functions.php';
    include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Uzstādīt sistēmu</title>
</head>
<body>
  <h1>Uzstādīt sistēmu</h1>

<?php
    //sql to create table - izveidojam tabulu lietotaji
    $sql = "CREATE TABLE lietotaji (
    id INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    epasts VARCHAR(100) NOT NULL UNIQUE,
    parole VARCHAR (255) NOT NULL,
    vards VARCHAR(30) NOT NULL,
    uzvards VARCHAR (30) NOT NULL,
    registrets TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    loma VARCHAR (10)
    )";

    if ($conn->query($sql) === TRUE){
        echo "<p>Tabula lietotāji ir izveidota </p>";
		
			
    }else{
        echo "<p>Tabulu lietotāji nevar izveidot</p>" . $conn->error;
    }

    //sql to create table - izveidojam tabulu lapas
    $sql = "CREATE TABLE lapas (
        id INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        virsraksts VARCHAR(255) NOT NULL UNIQUE,
        saturs TEXT,
        rediģēts TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
    
        if ($conn->query($sql) === TRUE){
            echo "<p>Tabula lapas ir izveidota </p>";
            header("Location: index.php");
                    die();
        }else{
            echo "<p>Tabulu lapas nevar izveidot</p>" . $conn->error;
        }
?>
</body>
</html>