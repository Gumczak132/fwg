<?php

namespace Gumunia\Diary\Controller;

class LoginController extends \Gumunia\Diary\Engine\Controller
{

    /**
     * Wyświetla listę artykułów
     */
    public function index()
    {
        $view = new \Gumunia\Diary\View\Login();

        $view->renderSmarty('index', '/accounts/login/');
    }
    

}
