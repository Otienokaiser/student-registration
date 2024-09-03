<?php include('../includes/header.php'); ?>

<meta name="viewport" content="width=device-width, initial-scale=1.0">

<style>
    main {
    max-width: 600px;
    margin: 0 auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

</style>

<main>
        <h2>Register a New Student</h2>
        <form action="../scripts/add_student.php" method="post">
          <div class="form-container">
            <div class="form-section">
                <h3>Student Information</h3>
                <div class="form-group">
                    <label for="name">Student Name:</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="regNo">Registration No:</label>
                    <input type="text" id="regNo" name="regNo" required>
                </div>
                <div class="form-group">
                    <label for="form">Form:</label>
                    <input type="text" id="form" name="form" required>
                </div>
                <div class="form-group">
                    <label for="stream">Stream:</label>
                    <input type="text" id="stream" name="stream" required>
                </div>
                <div class="form-group">
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" required>
                </div>
                <div class="form-group">
                    <label for="doa">Date of Admission:</label>
                    <input type="date" id="doa" name="doa" required>
                </div>
                <div class="form-group">
                    <label for="studentImage">Student Image:</label>
                    <input type="file" id="studentImage" name="studentImage" accept="image/*">
                </div>
            </div>
            
            <div class="form-section">
                <h3>Guardian Information</h3>
                <div class="form-group">
                    <label for="guardianName">Guardian Name:</label>
                    <input type="text" id="guardianName" name="guardianName" required>
                </div>
                <div class="form-group">
                    <label for="relation">Relation to Student:</label>
                    <input type="text" id="relation" name="relation" required>
                </div>
                <div class="form-group">
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="residence">Residence:</label>
                    <input type="text" id="residence" name="residence" required>
                </div>
                <div class="form-group">
                    <label for="guardianImage">Guardian Image:</label>
                    <input type="file" id="guardianImage" name="guardianImage" accept="image/*">
                </div>
            </div>
          </div>  
            
            <div class="form-group">
                <input type="submit" value="Register">
            </div>
        </form>
    </main>

<?php include('../includes/footer.php'); ?>
