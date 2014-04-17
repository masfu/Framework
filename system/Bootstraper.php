<?php

/**
 * Description of View
 * @package name
 * @author masfu
 * @copyright (c) 2014, Masfu Hisyam
 */
//only load php file

define('EXT_FILE', '.php');

define('SYS_NAME', 'system');

//base path
define('SYS_PATH', DIR_APP);

//config folder
define('CONFIG_PATH', SYS_PATH . '/config/');

/*
 * models folder
 */
define('MODELS_PATH', SYS_PATH . '/models/');
/*
 * views files folder
 */
define('VIEWS_PATH', SYS_PATH . '/views/');


/*
 * logs files folder
 */
define('LOGS_PATH', SYS_PATH . '/logs/');


spl_autoload_extensions(".php");

//this is a magical method to auto load php class without include file
spl_autoload_register(function($class) {

    try {
        $filename = DIRECTORY_SEPARATOR . str_ireplace('\\', '/', $class) . EXT_FILE;

        if (file_exists(($file = str_replace(SYS_NAME, '', __DIR__) . $filename))) {
            require_once $file;
        } else if (file_exists(($file = file_exists(DIR_APP . $filename)))) {
            require_once $file;
        } else {
            throw new \Exception("Unable to load $filename file not found");
        }
    } catch (\Exception $e) {
       // echo $e->getMessage();
       // die;
    }
});

//set_exception_handler('core\MainException::handler');
//set_error_handler('core\MainException::errorCallback', error_reporting());


use system\core as core;

class Sby extends core\Base {
    
}

?>
