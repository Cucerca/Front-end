<?php
session_start();
$con=mysqli_connect('localhost','root', '');
mysqli_select_db($con, 'domesticland');
$name=$_POST['user'];
$pass=$_POST['password'];
$s="select * from login where name='$name' && password='$pass'";
$rezult=mysqli_query($con, $s);
$num=mysqli_num_rows($rezult);
if($num==1){
    $_SESSION['username']=$name;
   header('location:home.php');
}else{
   echo "Contul dvs nu este valid!";
   // header('location:user_login.php');
}
?> 
