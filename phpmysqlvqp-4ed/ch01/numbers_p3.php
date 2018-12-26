<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Numbers</title>
</head>
<body>
<?php # Script 1.8 - numbers.php

// Set the variables:
$quantity = 30; // Buying 30 widgets.
$price = number_format(119,2);
$taxrate = 1.15; // 15% VAT.

// Calculate the total:
$total = $quantity * $price;
$total = $total + ($total * $taxrate); // Calculate and add the tax.

// Format the total:
$total = number_format ($total, 2,'.',' ');

// Print the results:
echo '<p>You are purchasing <strong>' . $quantity . '</strong> widget(s) at a cost of <strong>R ' . $price . '</strong> each. With vat, the total comes to <strong>R ' . $total . '</strong>.</p>';

?>
</body>
</html>