<html>

<head>
    <title>User Login and Registration</title>
    <link rel="stylesheet" type="text/css" href="loginregistration.css">
    <link rel="stylesheet" type="text/css" href="index.css">
</head>

<body>
    <div class="main">
        <div class="logo">
            <a href="index.html"><img src="images/capcaine.png"></a>
        </div>
        <ul>
            <li class="active"><a href="index.html">Acasa</a></li>
            <li><a href="">Despre noi</a></li>
            <li><a href="user_registration.php">Nu ai cont?</a></li>
            <li><a href="user_login.php">Login</a></li>
            <li><a href="shopping_cart.php">Cos de cumparaturi</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
    </div>
    <br><br><br><br><br><br>
    <div class="login-box">
        <h2>Register Here</h2>
        <form action="registration.php" method="post">
            <div class="textbox">
                <i class="fa fa-user" aria-hidden="true"></i>
                <input type="text" placeholder="username" name="user" required>
            </div>
            <div class="textbox">
                <i class="fa fa-lock" aria-hidden="true"></i>
                <input type="password" placeholder="password" name="password" required>
            </div>
            <button type="submit" class="btn" value="Register">Register</button>
        </form>
    </div>
</body>

</html>