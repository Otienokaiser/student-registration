<?php
include('../includes/db.php');
include('../includes/header.php');

$studentID = $_GET['id'];

// Fetch student details
$sql = "SELECT * FROM Students JOIN Guardians ON Students.GuardianID = Guardians.GuardianID WHERE StudentID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $studentID);
$stmt->execute();
$result = $stmt->get_result();
$student = $result->fetch_assoc();
?>

<main>
    <h2>Edit Student Details</h2>
    <form action="../scripts/update_student.php" method="post">
        <input type="hidden" name="studentID" value="<?php echo htmlspecialchars($student['StudentID']); ?>">
        
        <label for="name">Student Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($student['Name']); ?>" required>

        <label for="regNo">Registration No:</label>
        <input type="text" id="regNo" name="regNo" value="<?php echo htmlspecialchars($student['RegistrationNo']); ?>" required>

        <label for="form">Form:</label>
        <input type="text" id="form" name="form" value="<?php echo htmlspecialchars($student['Form']); ?>" required>

        <label for="stream">Stream:</label>
        <input type="text" id="stream" name="stream" value="<?php echo htmlspecialchars($student['Stream']); ?>" required>

        <label for="dob">Date of Birth:</label>
        <input type="date" id="dob" name="dob" value="<?php echo htmlspecialchars($student['DateOfBirth']); ?>" required>

        <label for="doa">Date of Admission:</label>
        <input type="date" id="doa" name="doa" value="<?php echo htmlspecialchars($student['DateOfAdmission']); ?>" required>

        <h3>Guardian Information</h3>
        <label for="guardianName">Guardian Name:</label>
        <input type="text" id="guardianName" name="guardianName" value="<?php echo htmlspecialchars($student['GuardianName']); ?>" required>

        <label for="relation">Relation to Student:</label>
        <input type="text" id="relation" name="relation" value="<?php echo htmlspecialchars($student['Relation']); ?>" required>

        <label for="phone">Phone Number:</label>
        <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($student['PhoneNumber']); ?>" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($student['Email']); ?>" required>

        <label for="residence">Residence:</label>
        <input type="text" id="residence" name="residence" value="<?php echo htmlspecialchars($student['Residence']); ?>" required>

        <input type="submit" value="Update">
    </form>
</main>

<?php include('../includes/footer.php'); ?>
