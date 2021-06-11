<?php

function get__courses($category)
{
    $conn = new mysqli('localhost', 'root', '', 'skillvirtualinstructor');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    if ($category != "all") {
        $queryStmt = $conn->prepare("select * from courses where category = ?");
        $queryStmt->bind_param('s', $category);
    } else {
        $queryStmt = $conn->prepare("select * from courses");
    }

    $queryStmt->execute();
    $results = $queryStmt->get_result();

    $queryStmt->close();
    $conn->close();

    $courses = array();

    while ($course__row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {

        $courses[] = $course__row;
    }

    return json_encode($courses);
}

function get__some($some)
{
    $conn = new mysqli('localhost', 'root', '', 'skillvirtualinstructor');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $queryStmt = $conn->prepare("select * from courses");

    $queryStmt->execute();
    $results = $queryStmt->get_result();

    $queryStmt->close();
    $conn->close();

    $courses = array();

    $count = 0;

    while ($count < $some) {

        if ($course__row = mysqli_fetch_array($results, MYSQLI_ASSOC)) {
            $courses[] = $course__row;
            $count++;
        } else
            $count = $some;
    }

    return json_encode($courses);
}

function get__by__id($id)
{
    $conn = new mysqli('localhost', 'root', '', 'skillvirtualinstructor');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $queryStmt = $conn->prepare("select * from courses where ID =?");
    $queryStmt->bind_param('i', $id);


    $queryStmt->execute();
    $result = $queryStmt->get_result();

    $queryStmt->close();
    $conn->close();

    if ($course__row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        return json_encode($course__row);
}
