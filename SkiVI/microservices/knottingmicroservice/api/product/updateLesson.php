<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: PUT");
header("Content-Type: application/json");

include_once '../config/database.php';
include_once '../objects/lesson.php';

if($_SERVER['REQUEST_METHOD']=="PUT")
{
    $database = new Database();
    $db = $database->getConnection();
    $data = json_decode(file_get_contents("php://input"));
    if(
        !empty($data->update) &&
        !empty($data->id)
    )
    {
        $wanted_update = $data->update;
        $available_updates = ["name","image","json","steps"];
        if(in_array($wanted_update,$available_updates))
        {
            if(
                !empty($data->$wanted_update)
            )
            {
                $lesson = new Lesson($db);
                $lesson->id=$data->id;
                
                if($wanted_update <> "steps")
                {
                    if($lesson->updateLesson($data->update,$data->$wanted_update))
                    {
                        http_response_code(201);
                        echo json_encode(
                            array("message" => "Succesfully updated lesson")
                        );
                    }
                    else
                    {
                        http_response_code(503);
                        echo json_encode(
                            array("message" => "Lesson was unable to be updated")
                        );
                    }
                }
                else
                {
                    if(is_array($data->steps))
                    {
                        $lesson_steps = $lesson->getSteps();
                        if($lesson_steps == null || !is_file($lesson_steps))
                        {
                            http_response_code(404);
                            echo json_encode(
                                array("error" => "Could not find the lesson's json file")
                            );
                        }
                        else
                        {
                            $string = file_get_contents($lesson_steps);
                            $steps_json = json_decode($string, true);
                            foreach($data->steps as $index => $content) 
                            {
                                foreach($content as $key => $value)
                                {
                                    $steps_json[$key] = $value;
                                }
                                    
                                    
                            }
                            $fp = fopen($lesson_steps,'w');
                            fwrite($fp, json_encode($steps_json));
                            fclose($fp);
                            http_response_code(200);
                            echo json_encode(
                                array("message" => "Succesfully updated lesson's steps")
                            );
                        }
                    }
                    else
                    {
                        http_response_code(400);
                        echo json_encode(
                            array(
                                "message" => "Steps updates must be an array of key-values",
                            )
                        );
                    }
                }
                    
            }
            else
            {
                http_response_code(400);
                echo json_encode(
                    array(
                        "message" => "Please input the wanted update using the following key-value pair:",
                        "update" => $data->update,
                        $wanted_update => "My update"
                    )
                );
            }
        }
        else
        {
            http_response_code(400);
            echo json_encode(
                array(
                    "message" => "Your wanted update is not available",
                    "update" => $data->update,
                    "available" => $available_updates
                )
            );
        }  
    }
    else
    {
        http_response_code(400);
        echo json_encode(
            array(
                "message" => "Please input the wanted update using the following key-value pairs:",
                "update" => "What you wish to update : name, image, json or steps",
                "id" => "The lesson's id"
            )
        );
    }
} 
else
{
    http_response_code(403);
    echo json_encode(
        array("error" => "Please use the PUT method to update a lesson")
    );
}
?>