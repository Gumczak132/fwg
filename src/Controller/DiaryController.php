<?php

namespace Gumunia\Diary\Controller;

use \Gumunia\Diary\View as view;

class DiaryController extends \Gumunia\Diary\Engine\Controller
{

    /**
     * Wyświetla listę artykułów
     */
    public function index()
    {
        $view = new view\Diary();

        return $view->renderSmarty('index', 'diary/');
    }


}
