<?php
include('../includes/db.php');
include('../includes/header.php');

$sql = "SELECT * FROM Students JOIN Guardians ON Students.GuardianID = Guardians.GuardianID";
$result = $conn->query($sql);
?>

<main>
    <h2>View Students</h2>
    <?php if ($result->num_rows > 0): ?>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Registration No</th>
                    <th>Form</th>
                    <th>Stream</th>
                    <th>Date of Birth</th>
                    <th>Date of Admission</th>
                    <th>Guardian Name</th>
                    <th>Guardian Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row['Name']); ?></td>
                        <td><?php echo htmlspecialchars($row['RegistrationNo']); ?></td>
                        <td><?php echo htmlspecialchars($row['Form']); ?></td>
                        <td><?php echo htmlspecialchars($row['Stream']); ?></td>
                        <td><?php echo htmlspecialchars($row['DateOfBirth']); ?></td>
                        <td><?php echo htmlspecialchars($row['DateOfAdmission']); ?></td>
                        <td><?php echo htmlspecialchars($row['GuardianName']); ?></td>
                        <td><?php echo htmlspecialchars($row['Email']); ?></td>
                        <td>
                            <img src="../uploads/students/<?php echo htmlspecialchars($row['ImagePath']); ?>" alt="Student Image" style="width: 100px; height: auto;">
                        </td>
                        <td>
                            <img src="../uploads/guardians/<?php echo htmlspecialchars($row['GuardianImagePath']); ?>" alt="Guardian Image" style="width: 100px; height: auto;">
                        </td>

                        <td>
                            <a href="edit.php?id=<?php echo htmlspecialchars($row['StudentID']); ?>">Edit</a> |
                            <a href="delete.php?id=<?php echo htmlspecialchars($row['StudentID']); ?>">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No students found.</p>
    <?php endif; ?>
</main>

<?php include('../includes/footer.php'); ?>
