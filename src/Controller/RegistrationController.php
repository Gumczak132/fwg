<?php

namespace Gumunia\Diary\Controller;

class RegistrationController extends \Gumunia\Diary\Engine\Controller
{

    /**
     * Wyświetla listę artykułów
     */
    public function registration()
    {
        $view = new \Gumunia\Diary\View\Registration();

        return $view->renderSmarty('registration', 'accounts/registration/');
    }

    public function add()
    {

        
        $model = new \Gumunia\Diary\Model\Registration();
        $response = $model->createUser($_POST);
        
        die(json_encode($response));
        
    }

}
