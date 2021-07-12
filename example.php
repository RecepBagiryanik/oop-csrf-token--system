<?php 
session_start();
require __DIR__ . "/namespace.php";

$CSRF = new \Main\CSRFToken\csrf();

if (isset($_POST["send"])) {
	if ($CSRF->checkToken("csrftoken","send") == 1) {
		echo "OK";
	} else {
		echo "Error.";
	}
}

?>
<form method="post">
	<input type="text" name="username" placeholder="Insert your username in the this input.">
	<input type="hidden" name="csrftoken" value="<?php echo $_SESSION["csrftoken"]; ?>">
	<input type="submit" name="send">
</form>