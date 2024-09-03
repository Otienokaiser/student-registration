-- Create Guardians table
CREATE TABLE Guardians (
    GuardianID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    Relation VARCHAR(255) NOT NULL,
    PhoneNumber VARCHAR(20) NOT NULL,
    Email VARCHAR(255) NOT NULL,
    Residence VARCHAR(255) NOT NULL,
    ImagePath VARCHAR(255) NULL
);

-- Create Students table
CREATE TABLE Students (
    StudentID INT AUTO_INCREMENT PRIMARY KEY,
    Name VARCHAR(255) NOT NULL,
    RegistrationNo VARCHAR(50) NOT NULL,
    Form VARCHAR(50) NOT NULL,
    Stream VARCHAR(50) NOT NULL,
    DateOfBirth DATE NOT NULL,
    DateOfAdmission DATE NOT NULL,
    GuardianID INT,
    ImagePath VARCHAR(255) NULL,
    FOREIGN KEY (GuardianID) REFERENCES Guardians(GuardianID)
);
