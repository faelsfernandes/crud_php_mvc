<?php

require_once 'app/Core/core.php';
require_once 'app/Controller/AuthorsController.php';
require_once 'app/Controller/ErrorController.php';
require_once 'app/Model/AuthorsModel.php';
require_once 'tools/Connection.php';

$template = file_get_contents('app/Template/template.html');

ob_start();
    $core = new Core;
    $core->start($_GET); 
    $result = ob_get_contents();
ob_end_clean();

$pageLoaded = str_replace('{{content_area}}', $result, $template);
// var_dump($pageLoaded);
echo $pageLoaded;