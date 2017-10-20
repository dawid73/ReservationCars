<?php
// Values received via ajax
$title = $_POST['title'];
$start = $_POST['start'];
$end = $_POST['end'];
$id_cars = $_POST['id_cars'];

// connection to the database
try {
    include('db_connect.php');

} catch (Exception $e) {
    exit($e);
}


if($title!=NULL && $start!=NULL && $end!=NULL){
// insert the records
	$sql = "INSERT INTO events (title, start, end, id_cars) VALUES (:title, :start, :end, :id_cars)";
	$q = $bdd->prepare($sql);
	$q->execute(array(':title' => $title, ':start' => $start, ':end' => $end, ':id_cars' => $id_cars));
}

header("Location: ../index"); 

?>