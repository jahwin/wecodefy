<?php
namespace system\library;

class Cookies
{

    /**
     * @desc Allow to add cookies key
     * @param $key, $value, $day
     * @return Boolean
     */
    public static function add($key, $value, $day)
    {
        setcookie($key, $value, time() + (86400 * $day), "/"); // 86400 = 1 day
        return true;
    }

    /**
     * @desc Allow to get cookies value
     * @param $key
     * @return Boolean  | null
     */
    public static function get($key)
    {
        if (!isset($_COOKIE[$key])) {
            return null;
        }
        return $_COOKIE[$key];
    }
    /**
     * @desc Allow to delete cookies value
     * @param $key
     * @return Boolean
     */
    public static function delete($key)
    {
        if (!isset($_COOKIE[$key])) {
            return true;
        }
        setcookie($key, "", time() - 3600, '/');
        return true;
    }
    /**
     * @desc Allow to check if cookies are enabled
     * @return Boolean
     */
    public static function check()
    {
        setcookie("test_cookie", "test", time() + 3600, '/');
        if (count($_COOKIE) > 0) {
            return true;
        } else {
            return false;
        }
    }

}