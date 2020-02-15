<?php
session_start();
if(!isset($_SESSION['username'])){
    header('location:user_login.php');
}
?>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" type="text/css" href="loginregistration.css">
 <link rel="stylesheet" type="text/css" href="index.css">
 <link rel="stylesheet" type="text/css" href="home.css">
</head>
<body>
     <div class="main">
        <div class="logo">
            <a href="index.html"><img src="images/capcaine.png"></a>
        </div>
        <ul>
            <li class="active"><a href="index.html">Acasa</a></li>
            <li><a href="despre.html">Despre noi</a></li>
            <li><a href="user_registration.php">Nu ai cont?</a></li>
            <li><a href="user_login.php">Login</a></li>
            <li><a href="shopping_cart.php">Cos de cumparaturi</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
    </div>
<br><br><br><br><br>
<a class="home" href="logoutvalidation.php">Logout</a>
<h1 class="homee">Welcome <?php echo $_SESSION['username'];?> </h1>
</body>
</html>