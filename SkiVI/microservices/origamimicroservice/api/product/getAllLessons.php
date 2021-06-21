<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json; charser=UTF-8");

include_once '../config/database.php';
include_once '../objects/lesson.php';

if($_SERVER['REQUEST_METHOD']=="GET")
{
    $database = new Database();
    $db = $database->getConnection();

    $lesson = new Lesson($db);

    $stmt = $lesson->read();
    $result = $stmt->get_result();
    $num = $result->num_rows;   
    if($num > 0)
    {
        $lessons = array();
        $lessons["lessons"] = array();
        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
            extract($row);
            $file = "../json/" . $json . ".json";
            if(file_exists($file))
            {
                $string = file_get_contents("../json/" . $json . ".json");
                $json_a = json_decode($string, true);
                $steps = array();
                foreach($json_a as $key => $val)
                {
                    $steps[$key] = $val;
                }
            }
            else
            {
                $steps = array(
                "error" => "There was a problem receiving lesson's steps, please try again later, if this problem persists, please contact us as soon as possible"
                );
        }
        $single_lesson = array(
            "id" => $id,
            "name" => $name,
            "image" => $image,
            "lesson_steps" => $steps
        );
        array_push($lessons["lessons"], $single_lesson);
    }
    http_response_code(200);
    echo json_encode($lessons);
}
    else
{
    http_response_code(200);
    echo json_encode(
        array("message" => "No lessons found")
    );
}
}
else
{
    http_response_code(403);
    echo json_encode(
        array("error" => "Please use the GET method to receive informations about all lessons available")
    );
}

?>