<?php

abstract class Service
{
    /** @var string Required name of service in child class */
    protected $name;
    /** @var Application */
    protected $app;

    /**
     * Init service in object context (child class)
     *
     * @param Application $app
     *
     * @return static
     */
    public static function init(Application $app)
    {
        return new static($app);
    }

    private function __construct(Application $app)
    {
        $this->app = $app;

        if (!$this->name) {
            //throw new Exception(sprintf('The name of service %s is not defined', static::class));
            throw new Exception(sprintf('The name of service %s is not defined', get_called_class()));
        }

        $app->addService($this->name, $this);
    }
}
