<?php
namespace system\library;

class FlashData
{
    private static $instance;

    /**
     * @desc Allow to init session
     * @param
     * @return  FlashData
     */
    public static function init()
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        self::$instance = new self();
        return self::$instance;
    }
    /**
     * @desc Allow to add new session data
     * @param $key,$data
     * @return "" | bolean
     */
    public static function Add($key, $data)
    {
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
        if (!isset($_SESSION[$key])) {
            return null;
        }
        $data = $_SESSION[$key];
        unset($_SESSION[$key]);
        return $data;
    }
}
