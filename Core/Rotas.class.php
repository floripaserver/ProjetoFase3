<?php

/**
 * Created by PhpStorm.
 * User: paulo
 * Date: 10/07/14
 * Time: 15:22
 */
class Rotas {

    private $controller;
    private $action;
    private $value;

    public function __construct() {

        $this->split_uri();
    }

    private function split_uri() {

        $url_splitted = preg_split("[\\/]", $_SERVER["REQUEST_URI"], -1, PREG_SPLIT_NO_EMPTY);
        
        $this->controller = array_shift($url_splitted);
        
        $this->action = array_shift($url_splitted);
        
        $request = $_SERVER['REQUEST_METHOD'];
        if ($request == 'POST') {
            $this->value = $_POST['busca'];
            } else {
            $this->value = array_shift($url_splitted);        
        }
        
    }

    public function getController() {

        if ($this->controller) {

            if (file_exists($this->controller . ".php")) {

                $result = $this->controller . ".php";
            } else {
                echo header('HTTP/1.0 404');

                $result = 'erro404.php';
            }
        } else {

            $result = "home.php";
        }

        return $result;
    }

    public function getAction() {

        return $this->action;
    }

    public function getValue() {
        return $this->value;
    }

    public function checkPage() {
        $page = preg_split("[\\.]", $this->controller, -1, PREG_SPLIT_NO_EMPTY);
        $page = array_shift($page);
        if ($page) {

            if ($page == 'php') {

                if (strstr($_SERVER['REQUEST_URI'], $this->controller)) {

                    if ($this->controller == 'index.php') {

                        header("Location: .");
                        exit();
                    } else {

                        echo header('HTTP/1.0 404 Not Found');

                        header("Location: erro404");
                        echo "<h1>Erro 404 n&atilde;o encontrado</h1>";
                        echo "A p&aacute;gina que voc&ecirc; requisitou n&atilde;o pode ser encontrado.";
                        exit();
                    }
                }
            }
        }
    }

}
