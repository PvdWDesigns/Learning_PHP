<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Registration</title>
	<style type="text/css" media="screen">
		.error { color: red; }
	</style>
</head>
<body>
<h1>Registration Results</h1>
<?php // Script 6.5 - handle_reg.php #4
/* This script receives seven values from register.html:
email, password, confirm, year, terms, color, submit */

// Address error management, if you want.

// Flag variable to track success:
$okay = true;

// Validate the email address:
if (empty($_POST['email'])) {
	print '<p class="error">Please enter your email address.</p>';
	$okay = false;
}

// Validate the password:
if (empty($_POST['password'])) {
	print '<p class="error">Please enter your password.</p>';
	$okay = false;
}

// Check the two passwords for equality:
if ($_POST['password'] != $_POST['confirm']) {
	print '<p class="error">Your confirmed password does not match the original password.</p>';
	$okay = false;
}

// Validate the birth year:
if (is_numeric($_POST['year'])) {
	$age = 2016 - $_POST['year']; // Calculate age this year.
} else {
	print '<p class="error">Please enter the year you were born as four digits.</p>';
	$okay = false;
}

// Check that they were born before this year:
if ($_POST['year'] >= 2016) {
	print '<p class="error">Either you entered your birth year wrong or you come from the future!</p>';
	$okay = false;
}

// If there were no errors, print a success message:
if ($okay) {
	print '<p>You have been successfully registered (but not really).</p>';
	print "<p>You will turn $age this year.</p>";
}

?>
</body>
</html>