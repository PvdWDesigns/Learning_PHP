
<?php
//phpinfo();
/*echo "Today is " . date("Y/m/d H:i:s") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l");
*/
echo getenv("username");
echo "<br />";
echo get_current_user();
echo "<br />";
echo "<br />";
$serverName = "didata.cxue5b7z2kgq.eu-west-1.rds.amazonaws.com"; //serverName\instanceName

// Since UID and PWD are not specified in the $connectionInfo array,
// The connection will be attempted using Windows Authentication.
$connectionInfo = array( "Database"=>"ddassets","UID"=> "ddsecurity", "PWD" =>"AWSddS3cur!ty");

$conn = sqlsrv_connect( $serverName, $connectionInfo); //Try connection

if( $conn ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

//Insert Query
/*$PeopleList = array("Jack","Bill","John","Peter","Mandy", "Richard");
foreach ($PeopleList as $person) {
     echo ("Inserting a new row into table" . PHP_EOL);
     $tsql= "INSERT INTO TestSchema.Employees (Name, Location) VALUES (?,?);";
     $params = array("$person",'United States');
     $getResults= sqlsrv_query($conn, $tsql, $params);
     $rowsAffected = sqlsrv_rows_affected($getResults);
if ($getResults == FALSE or $rowsAffected == FALSE)
    die(FormatErrors(sqlsrv_errors()));
echo ($rowsAffected. " row(s) inserted: " . PHP_EOL);
}
    
//sqlsrv_free_stmt($getResults);

//Update Query

$userToUpdate = 'Nikita';
$tsql= "UPDATE TestSchema.Employees SET Location = ? WHERE Name = ?";
$params = array('Sweden', $userToUpdate);
echo("Updating Location for user " . $userToUpdate . PHP_EOL);

$getResults= sqlsrv_query($conn, $tsql, $params);
$rowsAffected = sqlsrv_rows_affected($getResults);
if ($getResults == FALSE or $rowsAffected == FALSE)
    die(FormatErrors(sqlsrv_errors()));
echo ($rowsAffected. " row(s) updated: " . PHP_EOL);
sqlsrv_free_stmt($getResults);

//Delete Query
$userToDelete = 'Jared';
$tsql= "DELETE FROM TestSchema.Employees WHERE Name = ?";
$params = array($userToDelete);
$getResults= sqlsrv_query($conn, $tsql, $params);
echo("Deleting user " . $userToDelete . PHP_EOL);
$rowsAffected = sqlsrv_rows_affected($getResults);
if ($getResults == FALSE or $rowsAffected == FALSE)
    die(FormatErrors(sqlsrv_errors()));
echo ($rowsAffected. " row(s) deleted: " . PHP_EOL);
sqlsrv_free_stmt($getResults);
*/


//Read Query
$tsql= "SELECT        customers.customer_name, customers.customer_abreviation, customer_engagement_teams.first_name, customer_engagement_teams.last_name, customer_engagement_teams.designation, 
customer_engagement_teams.designation_short, customer_engagement_teams.mobile_number, customer_engagement_teams.email_adress, 
customer_engagement_teams.include_in_escalations
FROM            customers INNER JOIN
customer_team_link ON customers.customer_id = customer_team_link.customer_id INNER JOIN
customer_engagement_teams ON customer_team_link.team_member_id = customer_engagement_teams.team_member_id";

$getResults= sqlsrv_query($conn, $tsql);
echo ("Reading data from table" . PHP_EOL);
if ($getResults == FALSE)
    die(FormatErrors(sqlsrv_errors()));
    echo '<table border = "1" cellpadding = "5" cellspacing = "5" style="width:100%">';
    echo "<tr><th>Customer</th><th>Customer Abreviation</th><th>Team Member</th><th>Title</th><th>Designation</th><th>Mobile number</th><th>Email Adress</th></tr>";

while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
    $customer = $row['customer_name'];
    $customer_abreviation = $row['customer_abreviation'];
    $team_member = $row['first_name'] ." " . $row['last_name'];
    $designation = $row['designation'];
    $designation_short = $row['designation_short'];
    $mobile_number = $row['mobile_number'];
    $email_adress = $row['email_adress'];

    echo "<tr><td>".$customer."</td><td>".$customer_abreviation."</td><td>".$team_member."</td><td>".$designation."</td><td>".$designation_short."</td><td>".$mobile_number."</td><td>".$email_adress."</td></tr>";

    //echo ($row['customer_name'] . " | " . $row['customer_abreviation'] . " | " . $row['first_name'] ." " . $row['last_name'] . " | " . $row['designation'] . " | " . $row['designation_short'] . PHP_EOL);

}
echo "</table>";
//sqlsrv_free_stmt($getResults);*/

function FormatErrors( $errors )
{
    /* Display errors. */
    echo "Error information: ";

    foreach ( $errors as $error )
    {
        echo "SQLSTATE: ".$error['SQLSTATE']."";
        echo "Code: ".$error['code']."";
        echo "Message: ".$error['message']."";
    }
}
?>
?> 