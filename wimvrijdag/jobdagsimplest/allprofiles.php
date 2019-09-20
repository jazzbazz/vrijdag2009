<?php
session_start();
require_once('inc/verbind.inc.php');
echo "<h3>Je kiest voor webdevelopment omdat </h3>";
$query = "SELECT antw1 FROM jobdag.students";

if ($stmt = $con->prepare($query)) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	// $stmt->bind_param('s', $_SESSION['naam']);
	$stmt->execute();
	
	$stmt->store_result();
	$stmt->bind_result($antw1);
	echo "<div class='eerste vraag'><select>";
	while($stmt->fetch()){
		
		
		echo "<option value='*'>".$antw1."</option>";
	}
	echo "</select></div>";

}
echo "<h3>Je kiest voor Frontend of Backend </h3>";
$query = "SELECT antw2 FROM jobdag.students";

if ($stmt = $con->prepare($query)) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	// $stmt->bind_param('s', $_SESSION['naam']);
	$stmt->execute();
	
	$stmt->store_result();
	$stmt->bind_result($antw2);
	echo "<div class='tweede vraag'><select>";
	while($stmt->fetch()){
		
		
		echo "<option value='*'>".$antw2."</option>";
	}
	echo "</select></div>";

}
echo "<h3>Je zoekt het volgende in een bedrijf </h3>";
$query = "SELECT antw3 FROM jobdag.students";

if ($stmt = $con->prepare($query)) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	// $stmt->bind_param('s', $_SESSION['naam']);
	$stmt->execute();
	
	$stmt->store_result();
	$stmt->bind_result($antw3);
	echo "<div class='derde vraag'><select>";
	while($stmt->fetch()){
		
		
		echo "<option value='*'>".$antw3."</option>";
	}
	echo "</select></div>";

}	
echo "<h3>Volgende waardes vind jij belangrijk in een bedrijf</h3>";
$query = "SELECT antw4 FROM jobdag.students";

if ($stmt = $con->prepare($query)) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	// $stmt->bind_param('s', $_SESSION['naam']);
	$stmt->execute();
	
	$stmt->store_result();
	$stmt->bind_result($antw);
	echo "<div class='vierde vraag'><select>";
	while($stmt->fetch()){
		
		
		echo "<option value='*'>".$antw."</option>";
	}
	echo "</select></div>";

}



?>
<html>
<h3>Zoek een Skilled Persoon</h3>
<form action="" method="POST">
	<input list="skills" placeholder="zoek een skilled person" name="skilled">
	<datalist id="skills">
		<option value="HTML">
        <option value="CSS">
        <option value="JavaScript">
        <option value="jQuery">
        <option value="Wordpress">
        <option value="PHP">
        <option value="MySQL">
        <option value="Bootstrap">
        <option value="Python">
	</datalist>
	<input type="submit" name="submit">
</form>
<?php 
if(isset($_POST['submit'])){
	$search = $_POST['skilled'];
	// echo "dit is search ".$search;

	$query = "SELECT vnaam,naam FROM jobdag.students WHERE check1 =(?) ";

if ($stmt = $con->prepare($query)) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $search);
	$stmt->execute();
	
	$stmt->store_result();
	$stmt->bind_result($vnaam,$naam);
	echo "<br>";
	while($stmt->fetch()){
		
		
		echo $vnaam." ".$naam."<br>";
	}
	

}
}
?>
</html>