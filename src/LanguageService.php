<?php

require_once 'Service.php';

class LanguageService extends Service
{
    const LANG_RU   = 'ru';
    const LANG_EN   = 'en';
    //const LANG_LIST = [self::LANG_RU, self::LANG_EN];

    private $translateList = [];

    protected $name = 'lang';

    public static function init(Application $app)
    {
        /** @var self $instance */
        $instance = parent::init($app);
        $instance->setLanguage();
        return $instance;
    }

    public function getLanguage()
    {
        $currentLang = $this->app->getRequest()->getCookie($this->name);
        //return $currentLang && in_array($currentLang, self::LANG_LIST) ? $currentLang : $this->app->getConfig('default_language');
        return $currentLang && in_array($currentLang, [self::LANG_RU, self::LANG_EN]) ? $currentLang : $this->app->getConfig('default_language');
    }

    private function setLanguage($lang = null)
    {
        $lang = $lang && in_array($lang, [self::LANG_RU, self::LANG_EN]) ?: $this->app->getConfig('default_language');

        if (!$this->app->getRequest()->getCookie($this->name)) {
            $this->app->getResponse()->setCookie($this->name, $lang);
        }
    }

    public function changeLanguage($lang) {
        if (in_array($lang, [self::LANG_RU, self::LANG_EN]) && $lang != $this->getLanguage()) {
            $this->app->getResponse()->setCookie($this->name, $lang);
        }
    }

    public function translate($message)
    {
        if (!$this->translateList) {
            $translateFile = file_get_contents(realpath(__DIR__ . DIRECTORY_SEPARATOR . $this->app->getConfig('translate_path')));
            $this->translateList = json_decode($translateFile, true);
        }
        return isset($this->translateList[$message][$this->getLanguage()])
            ? $this->translateList[$message][$this->getLanguage()]
            : $message;
    }
}
