<?php

namespace Gumunia\Diary\Controller;

use Gumunia\Diary\View as log;
use \Gumunia\Diary\Model as model;

class LoginController extends \Gumunia\Diary\Engine\Controller
{
    /**
     * Render login form
     */
    public function index()
    {
        $view = new log\Login();

        $view->renderSmarty('index', '/accounts/login/');
    }

    public function login()
    {
        $model = new model\Login();
        $response = $model->login($_POST);

        die(json_encode($response));
    }

}
