<?php
include('../includes/db.php');

$studentID = $_GET['id'];

// Delete the student record
$sql = "DELETE FROM Students WHERE StudentID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $studentID);

if ($stmt->execute()) {
    header("Location: view.php");
    exit();
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
