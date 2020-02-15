<?php
session_start();
$connect = mysqli_connect("localhost", "root", "", "domesticland");
if (isset($_POST["add_to_cart"])) {
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'               =>     $_GET["id"],
                'item_name'               =>     $_POST["hidden_name"],
                'item_price'          =>     $_POST["hidden_price"],
                'item_quantity'          =>     $_POST["quantity"],
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        } else {
            echo '<script>alert("Item Already Added")</script>';
            echo '<script>window.location="shopping_cart.php"</script>';
        }
    } else {
        $item_array = array(
            'item_id'               =>     $_GET["id"],
            'item_name'               =>     $_POST["hidden_name"],
            'item_price'          =>     $_POST["hidden_price"],
            'item_quantity'          =>     $_POST["quantity"],
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}
if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $_GET["id"]) {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="shopping_cart.php"</script>';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>DomesticLand - Shopping Cart</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="cart_background_style.css">
    <link rel="stylesheet" type="text/css" href="index.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="main">
        <!-- <div class="logo">
            <a href="index.html"><img src="images/capcaine.png"></a>
        </div> -->
        <ul>
            <li class="active"><a href="index.html">Acasa</a></li>
            <li><a href="despre.html">Despre noi</a></li>
            <li><a href="user_registration.php">Nu ai cont?</a></li>
            <li><a href="user_login.php">Login</a></li>
            <li><a href="shopping_cart.php">Cos de cumparaturi</a></li>
            <li><a href="contact.html">Contact</a></li>
        </ul>
    </div>
    <br>
    <br>
    <br><br><br>
    <div class="container" style="width:700px;">
        <h2 align="center" class="order">DomesticLand - Shopping Cart</h2><br />
        <?php
        $query = "SELECT * FROM cos ORDER BY id ASC";
        $result = mysqli_query($connect, $query);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
        ?>
                <div class="col-md-4" style="margin-top:12px;">
                    <form method="post" action="shopping_cart.php?action=add&id=<?php echo $row["id"]; ?>">
                        <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px; height:350px;" align="center">
                            <img src="<?php echo $row["image"]; ?>" class="img-responsive" /><br />
                            <h4 class="text-info"><?php echo $row["name"]; ?></h4>
                            <h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>
                            <input type="text" name="quantity" class="form-control" value="1" />
                            <input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
                            <input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
                            <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
                        </div>
                    </form>
                </div>
        <?php
                                                                            }
                                                                        }
        ?>
        <div style="clear:both"></div>
        <br />
        <h3 class="order">Order Details</h3>
        <div class="table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th width="20%">Item Name</th>
                    <th width="5%">Quantity</th>
                    <th width="15%">Price</th>
                    <th width="15%">Total</th>
                    <th width="5%">Action</th>
                </tr>
                <?php
                                                                        if (!empty($_SESSION["shopping_cart"])) {
                                                                            $total = 0;
                                                                            foreach ($_SESSION["shopping_cart"] as $keys => $values) {
                ?>
                        <tr>
                            <td><?php echo $values["item_name"]; ?></td>
                            <!--display item name in Order Details -->
                            <td><?php echo $values["item_quantity"]; ?></td>
                            <!--display quantity -->
                            <td>$ <?php echo $values["item_price"]; ?></td>
                            <!--display price-->
                            <td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>
                            <!--display total based on (quantity*price)-->
                            <td><a href="shopping_cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                            <!--delete the product-->
                            <!-- <td><?php echo $values["description"]; ?></td> -->
                        </tr>
                    <?php
                                                                                $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                                                            }
                    ?>
                    <tr>
                        <td colspan="3" align="right">Total</td>
                        <td align="right">$ <?php echo number_format($total, 2); ?></td>
                        <td></td>
                    </tr>
                <?php
                                                                        }
                ?>
            </table>
            <!-- <h1 class="order">Spre casa de marcat!</h1> -->
            <table>
                <tr>
                    <td width="700" align="right">
                        <img src="images/shoppingCart.png" width="65px" height="65px"><br>
                        <a href="casa.php" id="mergilacasa">Mergi la casa</a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <br />
</body>

</html>