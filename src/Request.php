<?php

class Request
{
    private $get    = [];
    private $post   = [];
    private $cookie = [];

    public function __construct()
    {
        $this->get = $_GET;
        $this->post = $_POST;
        $this->cookie = $_COOKIE;
    }

    public function get($name, $default = null)
    {
        return $this->_get($this->get, $name) ?: $default;
    }

    public function getPost($name, $default = null)
    {
        return $this->_get($this->post, $name) ?: $default;
    }

    public function getCookie($name, $default = null)
    {
        return $this->_get($this->cookie, $name) ?: $default;
    }

    /**
     * Get request param by priority
     * POST > GET > default
     *
     * @param string        $name
     * @param mixed|null    $default
     *
     * @return string|null
     */
    public function getParam($name, $default = null)
    {
        return $this->getPost($name) ?: ($this->get($name) ?: $default);
    }

    /**
     * Magic method, "syntactic sugar" for method getParam(), e.g.
     * $request->name ~ $request->getParam('name')
     *
     * @param $param
     *
     * @return null|string
     */
    public function __get($param)
    {
        return $this->getParam($param);
    }

    /**
     * Abstract method for getting param from superglobal array
     *
     * @param array     $globalArray
     * @param string    $param
     *
     * @return string|null
     */
    private function _get(array $globalArray, $param)
    {
        return isset($globalArray[$param]) ? $globalArray[$param] : null;
    }
}
