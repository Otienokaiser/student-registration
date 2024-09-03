<?php
class Guardian {
    private $conn;
    private $table = 'Guardians';

    public $guardianID;
    public $name;
    public $relation;
    public $phoneNumber;
    public $email;
    public $residence;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " SET Name = ?, Relation = ?, PhoneNumber = ?, Email = ?, Residence = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssss", $this->name, $this->relation, $this->phoneNumber, $this->email, $this->residence);

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
        $query = "UPDATE " . $this->table . " SET Name = ?, Relation = ?, PhoneNumber = ?, Email = ?, Residence = ? WHERE GuardianID = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sssssi", $this->name, $this->relation, $this->phoneNumber, $this->email, $this->residence, $this->guardianID);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE GuardianID = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("i", $this->guardianID);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>
