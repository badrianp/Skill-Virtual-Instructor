<?php

include_once "../app/models/auth.utils.php";

class Feedback extends Controller
{
    public function index($data)
    {
        $to__root = $data[0];
        unset($data[0]);

        if (get__logged__user() != null)
            $this->view('feedback/index__feedback', ['syntax' => $to__root, 'params' => $data]);
        else
            $this->view('errors\first__login', ['syntax' => $to__root, 'params' => $data]);
    }
}
