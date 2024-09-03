<?php
include('../includes/db.php');

$studentID = $_GET['id'];

// Delete student data
$sql = "DELETE FROM Students WHERE StudentID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $studentID);

if ($stmt->execute()) {
    echo "Student deleted successfully";
    header("Location: ../public/view.php");
    exit();
} else {
    die("Error: " . $stmt->error);
}

$conn->close();
?>
