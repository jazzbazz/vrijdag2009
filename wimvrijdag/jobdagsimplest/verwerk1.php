<?php 
session_start();

$_SESSION['control']=3;
$voornaam = strtolower(filter_var(trim($_POST['voornaam']), FILTER_SANITIZE_STRING));
$naam = strtolower(filter_var(trim($_POST['naam']), FILTER_SANITIZE_STRING));

$_SESSION['voornaam'] = $voornaam;
$_SESSION['naam']= $naam;

if(isset($_POST['profiel'])){
	header('Location: updateprofiel.php');
	exit;
}
if(!isset($_POST['submit1'])){
	die("hoe bent u hier geraakt ?");
}

// create shortname variables / sanitize data


$omschrijving = strtolower(filter_var(trim($_POST['omschrijving']), FILTER_SANITIZE_STRING));
$heartbeat = $_POST['heartbeat'];

// create session variables

$_SESSION['omschrijving']= $omschrijving;
$_SESSION['heartbeat']= $heartbeat;

// echo $voornaam."<br>".$naam."<br>".$omschrijving."<br>".$heartbeat;
// require_once('inc/verbind.inc.php');
// require_once('inc/insert1.inc.php');
// require_once('inc/getid.inc.php');
header('Location: students2.php');
exit;

?>