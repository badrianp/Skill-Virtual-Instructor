<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Content-Type: application/json");

include_once '../config/database.php';
include_once '../objects/lesson.php';

if($_SERVER['REQUEST_METHOD']=="GET")
{
    $database = new Database();
    $db = $database->getConnection();
    if(isset($_GET["id"]))
    {
        $lesson = new Lesson($db);

        $stmt = $lesson->readLesson($_GET["id"]);
        $result = $stmt->get_result();
        $num = $result->num_rows;   
        if($num > 0)
        {
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
                    "course_id" => $course_id,
                    "name" => $name,
                    "image" => $image,
                    "lesson_steps" => $steps
                );
            }
            http_response_code(200);
            echo json_encode($single_lesson);
        }
        else
        {
            http_response_code(404);
            echo json_encode(
                array("message" => "No lessons found for given lesson id")
            );
        }
    }
    else
    {
        http_response_code(404);
        echo json_encode(
            array("message" => "Please add the id of the lesson whose details you wish to receive in the request")
        );
    }
    
}
else
{
    http_response_code(403);
    echo json_encode(
        array("error" => "Please use the GET method to receive informations about a given's course lessons")
    );
}

?>