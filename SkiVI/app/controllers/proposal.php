<?php

include_once "../app/models/auth.utils.php";

class Proposal extends Controller
{
    public function index($data)
    {
        $to__root = $data[0];
        unset($data[0]);

        if (get__logged__user() != null)
            $this->view('proposal/index__proposal', ['syntax' => $to__root, 'params' => $data]);
        else
            $this->view('errors\first__login', ['syntax' => $to__root, 'params' => $data]);
    }
}
