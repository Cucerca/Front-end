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
$prenume = $_POST['prenume'];
$sex = $_POST['sex'];
$adresa = $_POST['adresa'];
$codtelefon = $_POST['codtelefon'];
$telefon = $_POST['telefon'];
if (!empty($nume) || !empty($prenume) || !empty($sex) || !empty($adresa) || !empty($codtelefon) || !empty($telefon)) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "domesticland";

    //create a conection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
        die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    } else {
        $SELECT = "SELECT adresa From tranzactii Where adresa =? Limit 1";
        $INSERT = "INSERT Into tranzactii (nume, prenume, sex, adresa, codtelefon, telefon) values (?, ?, ?, ?, ?, ?)";

        //Prepare statement
        $stmt = $conn->prepare($SELECT);
        $stmt->bind_param("s", $adresa);
        $stmt->execute();
        $stmt->bind_result($adresa);
        $stmt->store_result();
        $rnum = $stmt->num_rows;

        if ($rnum == 0) {
            $stmt->close();
            $stmt = $conn->prepare($INSERT);
            $stmt->bind_param("ssssii", $nume, $prenume, $sex, $adresa, $codtelefon, $telefon);
            $stmt->execute();
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<b>Comanda dumneavoastra a fost trimisa!</b>";
        }
        $stmt->close();
        $conn->close();
    }
} else {
    echo "Toate campurile sunt obligatorii!";
    die();
}
?>
<html>

<head>

<body>
    <br>
    <br>
    <!-- <a href="shopping_cart.php">Inapoi</a> -->
</body>
</head>

</html>