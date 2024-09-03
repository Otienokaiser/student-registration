<?php
class Student {
    private $conn;
    private $table = 'Students';

    public $studentID;
    public $name;
    public $registrationNo;
    public $form;
    public $stream;
    public $dateOfBirth;
    public $dateOfAdmission;
    public $guardianID;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " SET Name = ?, RegistrationNo = ?, Form = ?, Stream = ?, DateOfBirth = ?, DateOfAdmission = ?, GuardianID = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssssi", $this->name, $this->registrationNo, $this->form, $this->stream, $this->dateOfBirth, $this->dateOfAdmission, $this->guardianID);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->get_result();
    }

    public function update() {
        $query = "UPDATE " . $this->table . " SET Name = ?, RegistrationNo = ?, Form = ?, Stream = ?, DateOfBirth = ?, DateOfAdmission = ?, GuardianID = ? WHERE StudentID = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("ssssssii", $this->name, $this->registrationNo, $this->form, $this->stream, $this->dateOfBirth, $this->dateOfAdmission, $this->guardianID, $this->studentID);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE StudentID = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->studentID);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
