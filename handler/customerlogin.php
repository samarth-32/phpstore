<?php
session_start();
include('../handler/adminpartials/head.php');
if(isset($_POST['login'])){

include('../partials/connect.php');



$email=$_POST['email'];
$password=$_POST['password'];
  $type = $_POST['type'];

  if ($type = 'Admin') {
    echo "Reached";
    $sql="SELECT * from admins Where username='$email' AND password='$password'";
$results=$connect->query($sql);
$final=$results->fetch_assoc();

$_SESSION['email']=$final['username'];
$_SESSION['password']=$final['password'];



    if($email=$final['username'] AND $password=$final['password']){
        header('location: adminindex.php');
 } else{
    header('location: adminlogin.php');
}
  }
  else{

    $sql="SELECT * from customers Where username='$email' AND password='$password'";
    $results=$connect->query($sql);
    $final=$results->fetch_assoc();
    
$_SESSION['email']=$final['username'];
$_SESSION['password']=$final['password'];
$_SESSION['customerid']=$final['id'];
    
if($email=$final['username'] AND $password=$final['password']){
  header('location: ../cart.php');
}else{
  echo "<script> alert('Credentials are wrong');
        window.location.href='../customerforms.php';
        </script>";
}
  }









}



?>