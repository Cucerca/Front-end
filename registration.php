<?php
session_start();
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'domesticland');
$name = $_POST['user'];
$pass = $_POST['password'];
$s = "select * from registration where name='$name'";
$rezult = mysqli_query($con, $s);
$num = mysqli_num_rows($rezult);
if ($num == 1) {
    echo "Username already taken";
} else {
    $reg = "insert into login(name, password) values ('$name', '$pass')";
    mysqli_query($con, $reg);
    echo "Registration Succesfully!";
}
?>
<html>

<head>
    <title>Registration successfully</title>
    <link rel="stylesheet" type="text/css" href="loginregistration.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <style>
        .logout {
            position: absolute;
            top: 13%;
            left:1%;
            font-size: 20px
        }
    </style>
</head>

<body><br>

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
        <a href="logoutregistration.php" class="logout">Logout</a>
    </body>

</html>