<?php
$servername = "localhost:3306"; 
$username = "root";
$password = "";
$database = "id21273424_abc";

// Create conection
$conn = mysql_connect($servername, $username, $password, $database);

//check connection
if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}

$patient_id=mysqli_real_escape_string($conn, $_POST['patient_id']);
$medication_name=mysqli_real_escape_string($conn, $_POST['medication']);
$unit=mysqli_real_escape_string($conn, $_POST['unit']);
$frequency=mysqli_real_escape_string($conn, $_POST['dosage']);
$textarea=mysqli_real_escape_string($conn, $_POST['note']);

$sql=" INSERT INTO medication_assignment(patient_id,medication,unit,dosage,note) Values($patient_id,$medication_name,$unit,$frequency,$textarea)";
if (mysqli_query($conn,$sql)==TRUE {
	echo "<script>alert('Details Added');window.location.href='medicine.html';</script>";
} else {
	echo "Error: " .$sql2."<br>".mysqli_error($conn);
}
mysqli_close($conn);
?>