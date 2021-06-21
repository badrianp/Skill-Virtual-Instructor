<?php
class Lesson{
    private $conn;
    private $table_name = "origami";

    public $id;
    public $course_id;
    public $name;
    public $image;
    public $json;
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

    public function readLesson($lesson_id){
        $query = "SELECT id, course_id, name, image, json FROM " . $this->table_name . " WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i', $lesson_id);
        $stmt->execute();
        return $stmt;
    }

    public function deleteLesson($lesson_id){
        $query = "SELECT * FROM " . $this->table_name . " WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i',$lesson_id);
        $stmt->execute();
        $response = $stmt->get_result();
        if($response->num_rows== 0)
        {
            return false;
        }
        $query = "DELETE FROM " . $this->table_name . " WHERE id=?";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('i',$lesson_id);
        if($stmt->execute())
        {
            return true;
        }
        return false;
    }

    public function createLesson(){
        $query = "INSERT INTO " . $this->table_name . "(`id`, `course_id`, `name`, `image`, `json`)
        VALUES (?,?,?,?,?)";
        $stmt = $this->conn->prepare($query);
        
        $this->id=intval(htmlspecialchars(strip_tags($this->id)));
        $this->course_id=intval(htmlspecialchars(strip_tags($this->course_id)));
        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->image=htmlspecialchars(strip_tags($this->image));
        $this->json=htmlspecialchars(strip_tags($this->json));

        $stmt->bind_param('iisss', $this->id, $this->course_id, $this->name, $this->image, $this->json);
        if($stmt->execute())
        {
            return true;
        }

        return false;
    }

    public function updateLesson($updated_column,$updated_value){
        $query = "SELECT * FROM " . $this->table_name . " WHERE id=" . $this->id;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $response = $stmt->get_result();
        if($response->num_rows== 0)
        {
            return false;
        }
        $query = "UPDATE " . $this->table_name . " SET `" . $updated_column . "` =? WHERE id=" . $this->id;
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param('s',$updated_value);
        if($stmt->execute())
        {
            return true;
        }
        return false;
    }

    public function getSteps()
    {
        $query = "SELECT json FROM " . $this->table_name . " WHERE id=" . $this->id;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        $response = $stmt->get_result();
        if($response->num_rows== 0)
        {
            return null;
        }

        $row = $response->fetch_assoc();
        $path = "../json/" . $row["json"] . ".json";
        return $path;
    }
}

?>