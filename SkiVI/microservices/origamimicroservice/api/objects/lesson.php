<?php
class Lesson{
    private $conn;
    private $table_name = "origami";

    public $id;
    public $name;
    public array $lesson_steps;

    public function __construct($db){
        $this->conn = $db;
    }

    public function read(){
        $query = "SELECT id, name, image, json FROM " . $this->table_name;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function readCourse($course_id){
        $query = "SELECT id, name, image, json FROM " . $this->table_name . " WHERE course_id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $course_id);
        $stmt->execute();
        return $stmt;
    }
}

?>