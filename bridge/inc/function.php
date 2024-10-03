<?php
require_once 'db.php';

function Redirect_to($New_Location){
  header("Location:".$New_Location);
  exit;
}

function Login_Attempt($username,$password){
  global $pdo;
  $sql = "SELECT * FROM users WHERE email=:email AND password=:password LIMIT 1";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':email',$username);
  $stmt->bindValue(':password',$password);
  $stmt->execute();
  $Result = $stmt->rowcount();

  if ($Result==1) {
    return $data=$stmt->fetch();
  }else {
    return null;
  }
}
function Confirm_Login(){
if (isset($_SESSION["userid"])) {
  return true;
}  else {
  $_SESSION["ErrorMessage"]="Login Required !";
  Redirect_to("login.php");
}
}
$sql = "SELECT COUNT(*) FROM users";
  $stmt = $pdo->query($sql);
  $TotalRows= $stmt->fetch();
  $TotalUsers=array_shift($TotalRows);
  $TotalUsers;
//total Customer

$sql = "SELECT COUNT(*) FROM task";
  $stmt = $pdo->query($sql);
  $TotalRows= $stmt->fetch();
  $total=array_shift($TotalRows);
 $total;


//  $sql = "SELECT COUNT(*) FROM ";
//   $stmt = $pdo->query($sql);
//   $TotalRows= $stmt->fetch();
//   $totaldata=array_shift($TotalRows);
//  $totaldata;


//   $sql = "SELECT SUM(total) as total   FROM data";
//   $stmt = $pdo->query($sql);
//   $TotalRows= $stmt->fetch();
//   $total=array_shift($TotalRows);
//  $total;