<?php
namespace system\library;

class FlashData
{
    private static $instance;

    /**
     * @desc Allow to add new session data
     * @param $key,$data
     * @return "" | bolean
     */
    public static function Add($key, $data)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION[$key])) {
            $_SESSION[$key] = array();
        }
        array_push($_SESSION[$key], $data);
        return true;
    }
    /**
     * @desc Allow to get session data
     * @param $key
     * @return data
     */
    public static function Get($key)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION[$key])) {
            return null;
        }
        $data = $_SESSION[$key];
        unset($_SESSION[$key]);
        return $data;
    }
}
