<?php

class App
{

    protected $controller = 'home';

    protected $method = 'index';

    protected $params = [];

    public function __construct()
    {
        $url = $this->parseUrl();

        $to__root = $this->get__root();

        if (isset($url[0]) && file_exists('../app/controllers/' .  $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once '../app/controllers/' . $this->controller . '.php';

        $this->controller = new $this->controller;

        if (isset($url[1]) && method_exists($this->controller, $url[1])) {
            $this->method = $url[1];
            unset($url[1]);
        }

        $this->params[0] = $to__root;

        if ($url != null) {
            foreach ($url as $param) {
                # code...
                $this->params[] = $param;
            }
        }

        call_user_func_array([$this->controller, $this->method],  [$this->params]);
    }

    public function get__root()
    {
        $to__root = '';
        $url = $this->parseUrl();

        // echo ($url[2]);

        if (isset($_GET['url'])) {

            for ($i = 1; $i < count($url); $i++) {
                $to__root .= '../';
            }
            if ($_GET['url'][strlen($_GET['url']) - 1] == '/') {
                $to__root .= '../';
            }
        }
        return $to__root;
    }
    public function parseUrl()
    {
        if (isset($_GET['url'])) {
            // echo $_GET['url'];
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/',), FILTER_SANITIZE_URL));
        }
    }
}
