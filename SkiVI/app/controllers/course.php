<?php

class Course extends Controller
{
    public function index($data)
    {
        $to__root = $data[0];
        unset($data[0]);

        $this->view('course/index__course', ['syntax' => $to__root, 'params' => $data]);
    }

    public function example($data)
    {
        $to__root = $data[0];
        unset($data[0]);

        $this->view('course/example__course', ['syntax' => $to__root, 'params' => $data]);
    }

    public function category($data)
    {
        $to__root = $data[0];
        unset($data[0]);

        $this->view('course/category__course', ['syntax' => $to__root, 'params' => $data]);
    }
}
