<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json");

include_once '../config/database.php';
include_once '../objects/lesson.php';

if($_SERVER['REQUEST_METHOD']=="POST")
{
    $database = new Database();
    $db = $database->getConnection();
    $data = json_decode(file_get_contents("php://input"));
    if(
        !empty($data->id) &&
        !empty($data->course_id) &&
        !empty($data->name) &&
        !empty($data->image) &&
        !empty($data->json) &&
        !empty($data->steps)
    )
    {
        $lesson = new Lesson($db);
        $lesson->id=$data->id;
        $lesson->course_id=$data->course_id;
        $lesson->name=$data->name;
        $lesson->image=$data->image;
        $lesson->json=$data->json;
        $path = "../json/" . $data->json . ".json";
        if(is_file($path))
        {
            http_response_code(400);
            echo json_encode(
                array("message" => "Given json name is already being used, please use another name")
            );
        }
        else
        {
            if($lesson->createLesson())
            {
                $fp = fopen($path,'w');
                fwrite($fp, json_encode($data->steps));
                fclose($fp);
                http_response_code(201);
                echo json_encode(
                    array("message" => "Succesfully created lesson")
                );
            }
            else
            {
                http_response_code(503);
                echo json_encode(
                    array("message" => "Lesson was unable to be created, please make sure that wanted lesson's id is not already used")
                );
            }
        }   
    }
    else
    {
        http_response_code(400);
        echo json_encode(
            array(
                "message" => "Data is incorrect, please complete all the necessary information:",
                "id" => "Lesson's id",
                "course_id" => "The course's id in which the lesson appears",
                "name" => "Lesson's name",
                "image" => "Name of the lesson's splash-art image file without extension",
                "json" => "Name of the json file in which the lesson's steps will be stored",
                "steps" => array(
                                "step1" => "Lesson's first step",
                                "img1" => "1st step support image",
                                "etc..." => "Other steps, and their images, if you wish to add images, please use keys whose names that start with img") 
                                )
        );
    }
    
}
else
{
    http_response_code(403);
    echo json_encode(
        array("error" => "Please use the POST method to create a lesson")
    );
}
?>