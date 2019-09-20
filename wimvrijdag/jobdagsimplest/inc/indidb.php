<?php 
// id ophalen uit hidden field
// if(!isset($_POST['indisubmit'])){
// 	die("something went wrong with indisubmit");

$id = $_POST['hiddenId'];
echo $id. " hier links zou een getal moeten staan";

$query = 'SELECT   vnaam, naam, antw1, antw2, antw3, antw4,check1, check2, check3,omschrijving, pad FROM jobdag.students
	WHERE id = (?)';
  
if ($stmt = $con->prepare($query)) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('i', $id);
	$stmt->execute();
	
	$stmt->store_result();
	$stmt->bind_result($voornaam,$naam,$waarom,$fbend,$wat,$waarde,$skill1, $skill2, $skill3, $omschrijving,$path);
	// $_SESSION['id']= $id;

	
while ($stmt->fetch()) {
//          echo'<div class="card">
//    <img class="card-img-top" src="'.$path.
//    			'" alt="'.$voornaam.'_'.$id.'">
//    <div class="card-body">';
//    		echo'<h4 class="card-title">'.$voornaam.' '.$naam.'</h4>';
//    		echo'<p class="card-text">'.$omschrijving.'</p>';
// //   		echo'<input type="hidden" name="hiddenId" value="'.$id.'">';
//    		echo'<form action="profielindi.php" method="POST" name="indi">
//  	<input type="submit" name="indisubmit"class="btn btn-primary" value="See Profile">
//  	<input type="hidden" name="hiddenId" value="'.$id.'">
//  </form>
//    </div>
//  </div>';
  // echo $id. " ".$voornaam." ".$naam." ".$omschrijving." ".$path;
        // echo 'First Name: '.$an2.'<br>';
        // echo 'Last Name: '.$an3.'<br>';
        // echo 'Username: '.$an4.'<br><br>';
   }

}else {
	$error = $con->errno. ' '.$con->error;
	echo $error;
}
echo $id. " ".$voornaam." ".$naam." ".$omschrijving." ".$path;
?>

?>