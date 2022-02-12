<h2>Lapas</h2>
<h3>Pievienot jaunu lapu</h3>

<form action="index.php?action=pages" method="POST"><br><br>
    <input  type='text' id="lapasvirsraksts" name="virsraksts" placeholder="ievadiet lapas virsrakstu" required><br><br>
    <textarea id="lapassaturs" name="saturs" placeholder="ievadiet mājas lapas satutu"></textarea>
    <br><br>
    <input type="submit" name="pievienot" value="Pievienot lapu">
</form>




<?php

    if(isset($_POST["pievienot"])){  //ja tika iesniegta forma "pievienot lapu", tad saglabā datus datu bāzē
        $virsraksts=$_POST['virsraksts'];
        $saturs=$_POST["saturs"];
		$sql="INSERT INTO lapas (virsraksts, saturs)
		VALUES ('$virsraksts', '$saturs')";
        echo $sql;

        if ($conn->query($sql) === TRUE){
            echo "<p>Lapa '$virsraksts' ir izveidota </p>";
           
                  
        }else{
            echo "<p>lapu nevar izveidot</p>" . $conn->error;
        }
        

    }
?>