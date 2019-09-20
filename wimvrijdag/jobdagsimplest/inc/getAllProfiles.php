<?php 
$query = "SELECT  id, vnaam, naam, omschrijving, pad FROM jobdag.students  ";
if ($stmt = $con->prepare($query)) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	// $stmt->bind_param('ss', $_SESSION['voornaam'], $_SESSION['naam']);
	$stmt->execute();
	
	$stmt->store_result();
	$stmt->bind_result($id,$voornaam,$naam,$omschrijving,$path);
	// $_SESSION['id']= $id;
while ($stmt->fetch()) {
         echo'<div class="card">
   <img class="card-img-top" src="'.$path.
   			'" alt="'.$voornaam.'_'.$id.'">
   <div class="card-body">';
   		echo'<h4 class="card-title">'.$voornaam.' '.$naam.'</h4>';
   		echo'<p class="card-text">'.$omschrijving.'</p>';
//   		echo'<input type="hidden" name="hiddenId" value="'.$id.'">';
   		echo'<form action="profielindi.php" method="POST" name="indi">
 	<input type="submit" name="indisubmit" class="btn btn-primary" value="See Profile">
 	<input type="hidden" name="hiddenId" value="'.$id.'">
 </form>
   </div>
 </div>';
  echo $id. " ".$voornaam." ".$naam." ".$omschrijving." ".$path;
        // echo 'First Name: '.$an2.'<br>';
        // echo 'Last Name: '.$an3.'<br>';
        // echo 'Username: '.$an4.'<br><br>';
   }

}else {
	$error = $con->errno. ' '.$con->error;
	echo $error;
}
?>

<!-- <form action="profielindi.php" method="POST" name="indi">
	<input type="submit" class="btn btn-primary" value="See Profile">
	<input type="hidden">
</form>
<input type="hidden" value="">
<div class="card">
  <img class="card-img-top" src="img_avatar1.png" alt="Card image">
  <div class="card-body">
    <h4 class="card-title">John Doe</h4>
    <p class="card-text">Some example text.</p>
    <a href="#" class="btn btn-primary">See Profile</a>
  </div>
</div> -->