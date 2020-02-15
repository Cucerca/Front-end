<html>
    <head>
        <link rel="stylesheet" type="text/css" href="index.css">
        <style>
            body{
                background: url(images/puppy.jpg);
                background-size: cover;
                background-position: center;
            }
        </style>
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
        </body>
</html>
<?php
$nume = $_POST['nume'];
$oras = $_POST['oras'];
$email = $_POST['email'];
$subiect = $_POST['subiect'];
$mesaj = $_POST['mesaj'];
if (!empty($nume) || !empty($oras) || !empty($email) || !empty($subiect) || !empty($mesaj)){
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "domesticland";

    //create a conection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
        die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    } else {
        $SELECT = "SELECT email From email Where email =? Limit 1";
        $INSERT = "INSERT Into email (nume, oras, email, subiect, mesaj) values ( ?, ?, ?, ?, ?)";

        //Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->bind_result($email);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum == 0) {
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("sssss", $nume, $oras, $email, $subiect, $mesaj,);
            $stmt->execute();
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "Mesajul dumneavoastra a fost trimis cu succes!";
            echo "<br>";
            echo "Va vom scrie in cel mai scurt timp cu putinta.";
            echo "<br>";
            echo "Multumim pentru intelegere.";
        }
        $stmt->close();
        $conn->close();
    }
} else {
    echo "Toate campurile sunt obligatorii!";
    die();
}
?>
