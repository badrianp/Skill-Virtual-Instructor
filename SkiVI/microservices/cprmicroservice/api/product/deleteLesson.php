<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: DELETE");
header("Content-Type: application/json");

include_once '../config/database.php';
include_once '../objects/lesson.php';

if($_SERVER['REQUEST_METHOD']=="DELETE")
{
    $database = new Database();
    $db = $database->getConnection();
    if(isset($_GET["id"]))
    {
        $lesson = new Lesson($db);

        if($lesson->deleteLesson($_GET["id"]))
        {
            http_response_code(200);
            echo json_encode(
                array("message" => "Succesfully deleted lesson")
            );
        }
        else
        {
            http_response_code(503);
            echo json_encode(
                array("message" => "Couldn't find given lesson in order to delete or there was a problem in lesson's deletion")
            );
        }
    }
    else
    {
        http_response_code(404);
        echo json_encode(
            array("message" => "Please add the id of the lesson which you wish to delete")
        );
    }
    
}
else
{
    http_response_code(403);
    echo json_encode(
        array("error" => "Please use the DELETE method to receive delete a given lesson")
    );
}

?>