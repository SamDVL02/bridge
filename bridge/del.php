<?php require_once("inc/db.php"); ?>
<?php require_once("inc/session.php"); ?>
<?php
if(isset($_GET["id"])){
  $id = $_GET["id"];
  global $conn;
  $sql = "DELETE FROM `performance`  WHERE id='$id'";
  $Execute = $pdo->query($sql);
  if ($Execute) {
    $_SESSION["SuccessMessage"]="User  Deleted Successfully ! ";
 header("location:perfom.php");
    // code...
  }else {
    $_SESSION["ErrorMessage"]="Something Went Wrong. Try Again !";
 header("location:users.php");
  }
}
?>
