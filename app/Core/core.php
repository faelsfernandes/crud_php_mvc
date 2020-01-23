<?php

class Core
{
    public function start($url)
    {
        if(isset($url['method'])){
            $action = $url['method'];

            // if(isset($url['params'])){
            //     $params = $url['params'];
            // } else{
            //     $params = array();
            // }
        } else{
            $action = 'index';
        }

        if (isset($url['page']))
        {
            $controller = ucfirst($url['page'].'Controller'); 
        } else{
            $controller = 'HomeController';
        }


        if(!class_exists($controller))
        {
            $controller = 'ErrorController';
        }
        call_user_func_array(array(new $controller, $action), array($params)); 
    }
}