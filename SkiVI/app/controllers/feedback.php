<?php

class Feedback extends Controller
{
    public function index($data)
    {
        $to__root = $data[0];
        unset($data[0]);

        $this->view('feedback/index__feedback', ['syntax' => $to__root, 'params' => $data]);
    }
}
