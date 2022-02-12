<?php
function pieteicies() {
	//pārbauda, vai lietotājs ir ielogojies
	if (isset($_SESSION["ielogojies"])) {
		//ja sesijas mainīgais ielogojies eksistē
		return true; //ir ielogojies
	} elseif (isset($_COOKIE["ielogojies"])) {
		$_SESSION["ielogojies"] = true;
		$_SESSION["lietotajs"] = $_COOKIE["ielogojies"];
		//vai arī ja eksistē sīkdatne (cookie) 
		return true; //ir ielogojies
	} else {
		return false; //nav ielogojies
	}
}

?>