<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// remove all session variables
session_unset();

// destroy the session
session_destroy();

//izdzēšam sīkdatni "ielogojies"
setcookie("ielogojies", "", time() - 3600, "/");

header("Location: index.php");
die();
?>

</body>
</html>