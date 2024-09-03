<?php
include('../includes/db.php');

$studentID = $_POST['studentID'];
$studentName = $_POST['name'];
$regNo = $_POST['regNo'];
$form = $_POST['form'];
$stream = $_POST['stream'];
$dob = $_POST['dob'];
$doa = $_POST['doa'];
$guardianName = $_POST['guardianName'];
$relation = $_POST['relation'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$residence = $_POST['residence'];

// Update guardian data
$sql = "UPDATE Guardians JOIN Students ON Guardians.GuardianID = Students.GuardianID 
        SET Guardians.Name = ?, Guardians.Relation = ?, Guardians.PhoneNumber = ?, Guardians.Email = ?, Guardians.Residence = ? 
        WHERE Students.StudentID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssssi", $guardianName, $relation, $phone, $email, $residence, $studentID);

if (!$stmt->execute()) {
    die("Error: " . $stmt->error);
}

// Update student data
$sql = "UPDATE Students 
        SET Name = ?, RegistrationNo = ?, Form = ?, Stream = ?, DateOfBirth = ?, DateOfAdmission = ? 
        WHERE StudentID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssi", $studentName, $regNo, $form, $stream, $dob, $doa, $studentID);

if ($stmt->execute()) {
    echo "Student details updated successfully";
    header("Location: ../public/view.php");
    exit();
} else {
    die("Error: " . $stmt->error);
}

$conn->close();
?>
