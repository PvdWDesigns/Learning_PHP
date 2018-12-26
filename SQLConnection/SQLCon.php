<?php
/*echo "Today is " . date("Y/m/d H:i:s") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l");
*/

$serverName = "localhost"; //serverName\instanceName

// Since UID and PWD are not specified in the $connectionInfo array,
// The connection will be attempted using Windows Authentication.
$connectionInfo = array( "Database"=>"php_test");

$conn = sqlsrv_connect( $serverName, $connectionInfo); //Try connection

if( $conn ) {
     echo "Connection established.<br />";
}else{
     echo "Connection could not be established.<br />";
     die( print_r( sqlsrv_errors(), true));
}

//Insert Query
$PeopleList = array("Jack","Bill","John","Petrie","Marinda", "Riley");
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
    
/*sqlsrv_free_stmt($getResults);

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


//Read Query
$tsql= "SELECT Id, Name, Location FROM TestSchema.Employees;";
$getResults= sqlsrv_query($conn, $tsql);
echo ("Reading data from table" . PHP_EOL);
if ($getResults == FALSE)
    die(FormatErrors(sqlsrv_errors()));
while ($row = sqlsrv_fetch_array($getResults, SQLSRV_FETCH_ASSOC)) {
    echo ($row['Id'] . " " . $row['Name'] . " " . $row['Location'] . PHP_EOL);

}
sqlsrv_free_stmt($getResults);*/

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