<?php

namespace Gumunia\Diary\Engine;

abstract class View
{

    /**
     * Generuje link.
     * @param $name
     * @param null $data
     * @return bool|string
     */
    public function generateUrl($name, $data = null)
    {
        $router = new \Gumunia\Diary\Engine\Router\Router('http://' . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"]);
        $collection = $router->getCollection();
        $route = $collection->get($name);
        if (isset($route)) {
            return $route->geneRateUrl($data);
        }
        return false;
    }

    /**
     * Wyświetla kod HTML szablonu
     *
     * @param string $name Nazwa pliku
     * @param string $path Ścieżka do szablonu
     *
     * @return void
     */
    
    
    // TE WSZYSTKIE RENDERY MOZNA ZAMIENIC NA METODE FABRYKUJĄCĄ! 
    
    
    public function renderHTML($name, $path = '')
    {
        $path = DIR_TEMPLATE . $path . $name . '.html.php';
        try {
            if (is_file($path)) {
                require $path;
            } else {
                throw new \Exception('Can not open template ' . $name . ' in: ' . $path);
            }
        } catch (\Exception $e) {
            echo $e->getMessage() . '<br />
                File: ' . $e->getFile() . '<br />
                Code line: ' . $e->getLine() . '<br />
                Trace: ' . $e->getTraceAsString();
            exit;
        }
    }

    /**
     * Wyświetla kod HTML szablonu
     *
     * @param string $name Nazwa pliku
     * @param string $path Ścieżka do szablonu
     * @param array assoc parametry przekazywane do templatki
     * 
     * @return void//        
     * 

     */
    public function renderSmarty($name, $path = '', array $data=null)
    {
        $path = DIR_TEMPLATE . $path . $name . '.tpl';
        require('/usr/local/lib/php/smarty/Smarty.class.php');

        $smarty = new \Smarty();

        $smarty->setTemplateDir($path);
        $smarty->setCompileDir('DIR_TEMPLATE_CACHE');

        if ($data != null){
                    $smarty->assign($data);
        }
        try {
            if (is_file($path)) {
                $smarty->display($path);
            } else {
                throw new \Exception('Can not open template ' . $name . ' in: ' . $path);
            }
        } catch (\Exception $e) {
            echo $e->getMessage() . '<br />
                File: ' . $e->getFile() . '<br />
                Code line: ' . $e->getLine() . '<br />
                Trace: ' . $e->getTraceAsString();
            exit;
        }
    }

    /**
     * Wyświetla dane JSON.
     * @param array $data Dane do wyświetlenia
     */
    public function renderJSON($data)
    {
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }

    /**
     * Wyświetla dane JSONP.
     * @param array $data Dane do wyświetlenia
     */
    public function renderJSONP($data)
    {
        header('Content-Type: application/json');
        echo $_GET['callback'] . '(' . json_encode($data) . ')';
        exit();
    }

    /**
     * Ładuje nagłówek strony
     */
    public function getHeader()
    {
        return $this->renderHTML('header', 'front/');
    }

    /**
     * Ładuje stopkę strony
     */
    public function getFooter()
    {
        return $this->renderHTML('footer', 'front/');
    }

    /**
     * It sets data.
     *
     * @param string $name
     * @param mixed $value
     *
     * @return void
     */
    public function set($name, $value)
    {
        $this->$name = $value;
    }

    /**
     * It sets data.
     *
     * @param string $name
     * @param mixed $value
     *
     * @return void
     */
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    /**
     * It gets data.
     *
     * @param string $name
     *
     * @return mixed
     */
    public function get($name)
    {
        return $this->$name;
    }

    /**
     * It gets data.
     *
     * @param string $name
     *
     * @return mixed
     */
    public function __get($name)
    {
        if (isset($this->$name)) {
            return $this->$name;
        }
        return null;
    }

}
