<?php require_once("inc/session.php"); ?>
<?php require_once("inc/function.php"); ?>

<?php
$_SESSION["userid"]=null;
$_SESSION["username"]=null;
session_destroy();
Redirect_to("login.php");
?>



