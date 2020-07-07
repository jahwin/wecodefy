<?php

namespace system\dev\controller;

/**
 * @desc this class will hold functions for error handler
 * @author Abe Jahwin
 */

class errorsExec
{
    /**
     * @desc Allow to show error in api way or web page version
     * @param array $Error - array of of error information
     */
    public static function show($Error)
    {
        if (_env('DEVELOPMENT', true) === 'true') {
            //When is api
            if (strpos(url(), '/api') !== false) {
                errorsExec::API_Error($Error);
            } else {
                // When is website
                require_once 'system/dev/views/error_prev.php';
            }

        } else {
            echo 'ERROR FOUND BUT YOU ARE IN PRODUCTION MODE';
            exit;
        }
    }
    /**
     * @desc Allow to show error in api way
     * @param array $error - array of of error information
     */
    public static function API_Error($error)
    {
        header('Access-Control-Allow-Headers: Content-type');
        header('Content-type: application/json');
        echo json_encode($error);
        exit;
    }
    /**
     * @desc Allow to display error
     * @param array $error - array of of error information
     */
    public static function display_error($error)
    {
        if (isset($error)) {
            echo $error;
        } else {
            echo 'This Text not found';
        }
    }
    /**
     * @desc Allow to display php error
     */
    public static function PHP_error()
    {
        if (error_get_last() != null) {
            $get_error = error_get_last();
            $error = array(
                'Type' => ' PHP error found',
                'Message' => '<b>' . $get_error['message'] . '</b>. Go and see on bellow directory on line ' . $get_error['line'] . ' to fix that error.',
                'Dir' => $get_error['file'],
                'Code' => '000' . $get_error['type'],
            );
            if ($get_error['type'] != 8) {
                errorsExec::API_Error($error);
                errorsExec::render_error($error);
            }
        }
    }
}
