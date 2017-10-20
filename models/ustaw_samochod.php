
<?php
session_start();

@$carid=$_GET['carid'];

$_SESSION['carid'] = $carid;

header('Location: ../index');

