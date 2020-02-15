<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
?>
<html>

<head>
	<title>casa</title>
	<link rel="stylesheet" type="text/css" href="casastyle.css">
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
</head>

<body>
	<br />
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
	<br>
	<br>
	<br>
	<br>
	<br>
	<td valign="top">
		<h1>Casa</h1>
		<div class="subtitlu">Acestea sunt produsele comandate de dvs:<div>
				<br>
				<table class="table">
					<tr>
						<td class="tdd"><b>Nr. buc</b></td>
						<td class="tdd"><b>Produs</b></td>
						<td class="tdd"><b>Pret</b></td>
						<td class="tdd"><b>Total</b></td>
						<td class="tdd"><b>DomesticLand</b></td>
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
								<td>Multumim pentru cumparaturi</td>

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
				<h1>Detalii</h1>
				<form action="prelucraredate.php" method="POST">
					<table>
						<tr>
							<td>
								Nume:
							</td>
							<td>
								<input type="text" name="nume" required>
							</td>
						</tr>
						<tr>
							<td>
								Prenume:
							</td>
							<td>
								<input type="text" name="prenume" required>
							</td>
						</tr>
						<tr>
							<td>
								Sex:
							</td>
							<td>
								<input type="radio" name="sex" value="m" required>Masculin
								<input type="radio" name="sex" value="f" required>Feminin
							</td>
						</tr>
						<tr>
							<td>
								Adresa:
							</td>
							<td>
								<input type="text" name="adresa" required>
							</td>
						</tr>
						<tr>
							<td>
								Cod telefon:
							</td>
							<td>
								<select name="codtelefon" required>
									<option selected hidden value="">Select Code</option>
									<option value="40">+40</option>
									<option value="41">+41</option>
									<option value="42">+42</option>
									<option value="43">+43</option>
									<option value="44">+44</option>
								</select>
								<input type="phone" name="telefon" required>
							</td>
						</tr>
						<tr>
							<td>
								<input type="Submit" value="Submit" name="">
							</td>
						</tr>
					</table>
				</form>
</body>

</html>