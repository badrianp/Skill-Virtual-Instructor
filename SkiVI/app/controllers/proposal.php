<?php

class Proposal extends Controller
{
    public function index($data)
    {
        $to__root = $data[0];
        unset($data[0]);

        $this->view('proposal/index__proposal', ['syntax' => $to__root, 'params' => $data]);
    }
}
