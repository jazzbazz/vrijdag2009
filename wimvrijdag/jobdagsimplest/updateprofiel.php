<?php 
session_start();

include_once('inc/verbind.inc.php');
echo $_SESSION['voornaam'];

$query = "SELECT  id, vnaam, naam, antw1, antw2, antw3, antw4 FROM jobdag.students  WHERE vnaam = (?) AND naam = (?)";
if ($stmt = $con->prepare($query)) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('ss', $_SESSION['voornaam'], $_SESSION['naam']);
	$stmt->execute();
	
	$stmt->store_result();
	$stmt->bind_result($ant1,$an2,$an3,$an4,$an5,$an6,$an7);
	// $_SESSION['id']= $id;
while ($stmt->fetch()) {
        // echo 'ID: '.$ant1.'<br>';
        // echo 'First Name: '.$an2.'<br>';
        // echo 'Last Name: '.$an3.'<br>';
        // echo 'Username: '.$an4.'<br><br>';
   }

   echo $ant1."<br>";
   echo $an2."<br>";
   echo $an3."<br>";
   echo $an4."<br>";
   echo $an5."<br>";
   echo $an6."<br>";
   echo $an7."<br>";
// echo "dit is omschrijving <br>".$omschrijving;
// echo "dit is pad <br>".$pad;
}else {
	$error = $con->errno. ' '.$con->error;
	echo $error;
}





?>