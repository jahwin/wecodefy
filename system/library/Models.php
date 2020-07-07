<?php
namespace system\library;

/**
 * @desc this class will hold functions for database management
 * @author Abe Jahwin
 */
use Illuminate\Database\Eloquent\Model as ModelCore;
use system\dev\controller\errorsExec;

class Models extends ModelCore
{

    /**
     * @desc Allow to load model
     * @param string $model_name - model name
     */

    public function init($model_name)
    {
        $file_location = 'app/models/' . $model_name . '_model.php';
        if (file_exists($file_location)) {
            require $file_location;
            $class_name = ucfirst($model_name) . 'Model';
            if (class_exists($class_name)) {
                return new $class_name;
            } else {
                $error = array(
                    'Type' => 'Class not found',
                    'Message' => $class_name . ' class  not found in [' . $file_location . '] file',
                    'Dir' => $file_location,
                    'Code' => '0002',
                );
                errorsExec::show($error);
            }
        } else {
            $error = array(
                'Type' => 'File missing',
                'Message' => 'Model ' . $model_name . ' file not found',
                'Dir' => $file_location,
                'Code' => '0001',
            );
            errorsExec::show($error);
        }

    }
}
