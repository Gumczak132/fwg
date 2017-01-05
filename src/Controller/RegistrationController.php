<?php

namespace Gumunia\Diary\Controller;

use \Gumunia\Diary\View as view;
use \Gumunia\Diary\Model as model;

class RegistrationController extends \Gumunia\Diary\Engine\Controller
{

    /**
     * Wyświetla listę artykułów
     */
    public function registration()
    {
        $view = new view\Registration();

        return $view->renderSmarty('registration', 'accounts/registration/');
    }

    public function add()
    {
        $model = new model\Registration();
        $response = $model->createUser($_POST);
        
        die(json_encode($response));       
    }

}
