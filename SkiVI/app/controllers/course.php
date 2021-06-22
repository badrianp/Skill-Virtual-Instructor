<?php

include_once "../app/models/auth.utils.php";
include_once "../app/models/course.utils.php";
// include_once "../app/models/Course.php";

class Course extends Controller
{
    public function index($data)
    {
        $to__root = $data[0];

        if (isset($data[1])) {
            $category = $data[1];
        } else
            $category = "all";

        unset($data[0]);
        unset($data[1]);

        $this->view('course/index__course', ['syntax' => $to__root, 'category' => $category]);
    }

    public function category($data)
    {
        echo get__courses($data[1]);
    }

    public function example($data)
    {
        $to__root = $data[0];
        $id = $data[1];
        unset($data[0]);

        if (get__logged__user() != null)
            $this->view('course/example__course', ['syntax' => $to__root, 'id' => $id]);
        else
            $this->view('errors/first__login', ['syntax' => $to__root, 'params' => $data]);
    }

    public function course__id($data)
    {

        echo get__by__id($data[1]);
    }

    public function no__category($data)
    {
        $to__root = $data[0];
        $category = $data[1];

        unset($data[1]);
        unset($data[0]);

        $this->view('errors/no__courses', ['syntax' => $to__root, 'category' => $category]);
    }

    public function no__id($data)
    {
        $to__root = $data[0];

        $this->view('course/index', ['syntax' => $to__root]);
    }
}
