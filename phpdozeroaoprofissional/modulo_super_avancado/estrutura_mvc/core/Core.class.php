<?php 

    class Core {
        public function start() {
            $url = '/';

            if(isset($_GET['url'])) {
                $url .= $_GET['url'];
            }

            $params = array();

            if(!empty($url) && $url != '/') {
                $url = explode('/', $url);
                array_shift($url);
                $currentController = $url[0] . "Controller";
                array_shift($url);

                if(isset($url[0]) && $url[0] != '/') {
                    $currentAction = $url[0];
                    array_shift($url);
                } else {
                    $currentAction = 'index';
                }

                if(count($url) > 0) {
                    $params = $url;
                }


            } else {
                $currentController = 'homeController';
                $currentAction = 'index';
            }


            /* 
                VALIDAR AÇÕES
            */
                /* 
                    echo "<hr>";
                    echo "CONTROLLER: " . $currentController . "<br />";
                    echo "ACTION: " . $currentAction . "<br />";
                    echo "PARAMS: " . print_r($params, true ) . "<br />";
                */


                $c = new $currentController();

                call_user_func_array(array($c, $currentAction), $params);

        }
    }

?>