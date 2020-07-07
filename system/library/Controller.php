<?php
namespace system\library;

use system\dev\controller\errorsExec;
use system\library\Models;
use system\library\Views;

/**
 * @desc this class will hold functions for controllers
 * @author Abe Jahwin
 */

class Controller
{
    /**
     * @desc Allow to init template engine
     */

    public function __construct()
    {
        if (class_exists('system\library\Views')) {
            $this->view = new Views();
        } else {
            $error = array(
                'Type' => 'Class not found',
                'Message' => 'Views class  not found in [system/library/views.php] file',
                'Dir' => 'system/library/views.php',
                'Code' => '0002',
            );
            errorsExec::show($error);
        }
        if (class_exists('system\library\Models')) {
            $this->models = new Models();
        } else {
            $error = array(
                'Type' => 'Class not found',
                'Message' => 'Models class  not found in [system/library/model.php] file',
                'Dir' => 'system/library/model.php',
                'Code' => '0002',
            );
            errorsExec::show($error);
        }
    }
    /**
     * @desc Allow to load template
     * @param string $folder - folder name to load template
     * @param string $file- file path
     * @param array $data - array of data to be used on template
     * @return html - html page
     */

    public function render($folder, $file, $data = [])
    {
        return $this->view->display($folder, $file, $data);
    }
    /**
     * @desc Allow to load model
     * @param string $model_name - model name
     */

    public function loadModel($model_name)
    {
        return $this->models->init($model_name);
    }

}
