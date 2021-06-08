<?php

class Home extends Controller
{
    public function index($data)
    {
        $to__root = $data[0];
        unset($data[0]);

        $this->view('home/index__home', ['syntax' => $to__root, 'params' => $data]);
    }
}
