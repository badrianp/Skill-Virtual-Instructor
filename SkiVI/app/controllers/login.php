<?php

class Login extends Controller
{
    public function index($data)
    {
        $to__root = $data[0];
        unset($data[0]);

        $this->view('login/index__login', ['syntax' => $to__root, 'params' => $data]);
    }
}
