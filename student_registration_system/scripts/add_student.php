<?php
include('../includes/db.php');

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

// Handle image uploads
function uploadImage($fileInputName, $uploadDir) {
    if (isset($_FILES[$fileInputName]) && $_FILES[$fileInputName]['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES[$fileInputName]['tmp_name'];
        $fileName = $_FILES[$fileInputName]['name'];
        $fileSize = $_FILES[$fileInputName]['size'];
        $fileType = $_FILES[$fileInputName]['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        $destPath = $uploadDir . $newFileName;

        if (move_uploaded_file($fileTmpPath, $destPath)) {
            return $newFileName;
        }
    }
    return null;
}

$guardianImagePath = uploadImage('guardianImage', '../uploads/guardians/');
$studentImagePath = uploadImage('studentImage', '../uploads/students/');


// Insert guardian data
$sql = "INSERT INTO Guardians (Name, Relation, PhoneNumber, Email, Residence) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sssss", $guardianName, $relation, $phone, $email, $residence);

if ($stmt->execute()) {
    $guardianID = $stmt->insert_id;
} else {
    die("Error: " . $stmt->error);
}

// Insert student data
$sql = "INSERT INTO Students (Name, RegistrationNo, Form, Stream, DateOfBirth, DateOfAdmission, GuardianID) VALUES (?, ?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssi", $studentName, $regNo, $form, $stream, $dob, $doa, $guardianID);

if ($stmt->execute()) {
    echo "New student registered successfully";
    header("Location: ../public/view.php");
    exit();
} else {
    die("Error: " . $stmt->error);
}

$conn->close();
?>
