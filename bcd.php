<?php
// Database connection parameters
$host = 'localhost';
$dbname = 'id21273424_abc';
$username = 'id21273424_root';
$password = '@1111Ma00@';

// Retrieve the student_id from the form
$student_id = $_POST['student_id'];

try {
    // Create a database connection
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Prepare and execute the SQL query
    $query = "SELECT student_id, medical_history FROM medi_data WHERE student_id = :student_id";
    $statement = $pdo->prepare($query);
    $statement->bindParam(':studentname', $studentname, PDO::PARAM_INT);
    $statement->execute();

    // Fetch the result
    $result = $statement->fetch(PDO::FETCH_ASSOC);

    // Display the medical history
    if ($result) {
        echo "<h2>Medical History for studentname: {$result['studentname']}</h2>";
        echo "<p>{$result['medical_history']}</p>";
    } else {
        echo "<p>No data found for Student ID: $studentname</p>";
    }
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
