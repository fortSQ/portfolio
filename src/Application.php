<?php

defined('PROJECT_PATH') || define('PROJECT_PATH', realpath(__DIR__ . '/..'));

require_once 'Request.php';
require_once 'Response.php';
require_once 'LanguageService.php';

class Application
{
    const CONFIG_FILE = '/app/config/config.ini';

    private $config;

    private $request;
    private $response;

    private $serviceList = [];

    public static function run()
    {
        $app = new self();
        $app->initConfig();

        try {
            LanguageService::register($app);
        } catch (Exception $e) {
            echo sprintf('Service load error: %s', $e->getMessage());
            die(-1);
        }

        return $app;
    }

    private function __construct()
    {
        $this->request = new Request();
        $this->response = new Response();
    }

    private function initConfig()
    {
        $this->config = parse_ini_file(PROJECT_PATH . self::CONFIG_FILE);
    }

    public function getConfig($name)
    {
        return isset($this->config[$name]) ? $this->config[$name] : null;
    }

    public function getRequest()
    {
        return $this->request;
    }

    public function getResponse()
    {
        return $this->response;
    }

    public function addService($name, $instance)
    {
        $this->serviceList[$name] = $instance;
    }

    public function getService($name)
    {
        return isset($this->serviceList[$name]) ? $this->serviceList[$name] : null;
    }

    public function renderView($filename, $context)
    {
        require_once PROJECT_PATH . $this->config['view_folder'] . DIRECTORY_SEPARATOR . $filename . '.phtml';
    }

    /**
     * Proxy method for get language name
     *
     * @return string
     */
    public function getCurrentLanguage()
    {
        return $this->getService('lang')->getLanguage();
    }

    /**
     * Proxy method for translate message
     *
     * @param string $message
     *
     * @return string
     */
    public function translate($message)
    {
        return $this->getService('lang')->translate($message);
    }
}
