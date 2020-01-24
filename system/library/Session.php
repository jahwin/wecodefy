<?php
namespace system\library;

class Session
{
    private static $instance;

    /**
     * @desc Allow to init session
     * @param
     * @return Session
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
     * @desc Allow to add session key
     * @param $key, $value
     * @return bolean
     */
    public static function add($key, $value)
    {
        $_SESSION[$key] = $value;
        return true;
    }
    /**
     * @desc Allow to get session key
     * @param $key
     * @return bolean
     */
    public static function get($key)
    {
        if (!isset($_SESSION[$key])) {
            return null;
        }
        return $_SESSION[$key];
    }
    /**
     * @desc Allow to delete session key
     * @param $key
     * @return bolean
     */
    public static function delete($key)
    {
        if (!isset($_SESSION[$key])) {
            return false;
        }
        unset($_SESSION[$key]);
        return true;
    }
    /**
     * @desc Allow to destroy  session
     * @param
     * @return bolean
     */
    public static function destroy()
    {
        session_destroy();
        return true;
    }
}
