<?php

namespace LabCake;

class System
{
    const OS_UNKNOWN = 1;
    const OS_WIN = 2;
    const OS_LINUX = 3;
    const OS_OSX = 4;

    /**
     * Get current operating system
     * @return int
     */
    public static function get_os()
    {
        switch (true) {
            case stristr(PHP_OS, 'DAR'):
                return self::OS_OSX;
            case stristr(PHP_OS, 'WIN'):
                return self::OS_WIN;
            case stristr(PHP_OS, 'LINUX'):
                return self::OS_LINUX;
            default :
                return self::OS_UNKNOWN;
        }
    }

    /**
     * is system windows?
     * @return bool
     */
    public static function is_windows()
    {
        return self::get_os() === self::OS_WIN;
    }

    /**
     * is system linux?
     * @return bool
     */
    public static function is_unix()
    {
        return self::get_os() === self::OS_LINUX || self::get_os() === self::OS_OSX;
    }

    /**
     * Check if connected through https
     * @return bool
     */
    public static function is_https()
    {
        if (!empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off') {
            return TRUE;
        } elseif (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
            return TRUE;
        } elseif (!empty($_SERVER['HTTP_FRONT_END_HTTPS']) && strtolower($_SERVER['HTTP_FRONT_END_HTTPS']) !== 'off') {
            return TRUE;
        }
        return FALSE;
    }

    /**
     * Check if run through CLI
     * @return bool
     */
    public static function is_cli()
    {
        return (PHP_SAPI === 'cli' OR defined('STDIN'));
    }

}