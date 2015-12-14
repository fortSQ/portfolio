<?php

class Response
{
    const TIME_MINUTE   = 60; # seconds
    //const TIME_HOUR     = self::TIME_MINUTE * 60;
    //const TIME_DAY      = self::TIME_HOUR * 24;
    //const TIME_MONTH    = self::TIME_DAY * 30;
    //const TIME_YEAR     = self::TIME_MONTH * 12;
    const TIME_HOUR     = 3600;
    const TIME_DAY      = 86400;
    const TIME_MONTH    = 2592000;
    const TIME_YEAR     = 31104000;

    public function setCookie($name, $value, $expire = self::TIME_YEAR)
    {
        setcookie($name, $value, time() + $expire, '/');
    }

    public function deleteCookie($name)
    {
        setcookie($name, null, 0, '/');
    }

    public function redirect($url)
    {
        header('Location: ' . $url);
    }
}
