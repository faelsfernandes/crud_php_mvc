<?php

class Core
{
    public function start($url)
    {
        $action = 'index';
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
        call_user_func_array(array(new $controller, $action), array()); 
    }
}