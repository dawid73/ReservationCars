<?php
session_start();
if(isset($_SESSION['carid'])){
$cars = $_SESSION['carid']; 
}else{
$cars = 0;
}
// List of events
$json = array();

// Query that retrieves events
$request = "SELECT * FROM events WHERE id_cars=" .$cars. " ORDER BY id";

// connection to the database
try {
    include('db_connect.php');
} catch (Exception $e) {
    exit('Unable to connect to database.');
}
// Execute the query
$result = $bdd->query($request) or die(print_r($bdd->errorInfo()));

// sending the encoded result to success page
echo json_encode($result->fetchAll(PDO::FETCH_ASSOC));

?>
