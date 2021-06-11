<?php

include_once "../app/models/auth.utils.php";
include_once "../app/models/course.utils.php";


class Home extends Controller
{
    public function index($data)
    {
        $to__root = $data[0];
        unset($data[0]);

        $this->view('home/index__home', ['syntax' => $to__root, 'params' => $data]);
    }

    public function get__start($data)
    {
        $to__root = $data[0];
        unset($data[0]);

        echo get__some($data[1]);
    }
}
