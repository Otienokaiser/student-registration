<?php
include('../includes/db.php');

$studentID = $_GET['id'];

// Fetch student details
$sql = "SELECT * FROM Students JOIN Guardians ON Students.GuardianID = Guardians.GuardianID WHERE StudentID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $studentID);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();

echo json_encode($student);
?>
