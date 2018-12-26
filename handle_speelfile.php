<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Form Feedback</title>
	<link type="text/css" rel = "stylesheet" href=".\css\myPHPStyle.css"
</head>
<body>

<?php # Script 2.5 - handle_form.php #4
$months = array('1' => 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'Desember' );
echo '<select name="month">';
foreach ($months as $k => $value) {
	echo "<option value=\"$k\">$value</option>\n";
}

echo '</select>';
if(date("H") >= 12){
	$greetingtime = "Afternoon";
}else{
	$greetingtime ="Morning";
}

if (!empty($_POST['name'])) {
	$name = $_POST['name'];
}else {
	$name = NULL;
	echo '<p class="error"> You forgot to enter your name!</p>';
}

if (!empty($_POST['email'])) {
	$email = $_POST['email'];
}else {
	$email = NULL;
	echo '<p class="error"> You forgot to enter your email adress!</p>';
}

if (!empty($_POST['comments'])) {
	$comments = $_POST['comments'];
}else {
	$comments = NULL;
	echo '<p class="error"> You forgot to enter your comments!</p>';
}



if (isset($_POST['gender'])) {
	$gender = $_POST['gender'];
	if ($gender == 'M'){
		$greeting = "<p><b>Good $greetingtime, Sir!</b></p>";
	} elseif ($gender == 'F') {
		$greeting = "<p><b>Good $greetingtime, Madam!</b></p>";
	}else {
		$gender= NULL;
		echo '<p class="error">Gender should be either "M" or "F"!</p>';
	}}
	else {
	$gender = NULL;
	echo '<p class="error"> You forgot to select your gender!</p>';
}
if ($name && $email && $gender && $comments){
	echo $greeting;
	echo "<p> Thank you, <b>$name</b>, for the following comments:<br />$comments</p>
<p> We will reply to you at <i> $email</i>.</p>\n";

} else {
	echo "<p class=error> Please go back and fill out the form again ! </p>";
}

?>
</body>
</html>