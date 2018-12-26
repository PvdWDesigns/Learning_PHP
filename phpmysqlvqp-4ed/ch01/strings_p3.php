<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Strings</title>
</head>
<body>
<?php # Script 1.6 - strings.php

// Create the variables:
$first_name = 'Haruki';
$last_name = 'Murakami';
$book = 'Kafka on the Shore';
$book = 'Jou ma se hare';
$author = $first_name . ' ' . $last_name; //of $author = "$first_name $last_name";

// Print the values:
echo "<p>The book <em><b>$book</b></em> was written by $author.</p>";

?>
</body>
</html>