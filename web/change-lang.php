<?php

require_once '../src/Application.php';

$app = Application::run();

$lang = $app->getRequest()->lang;
/** @var LanguageService $serviceLang */
$serviceLang = $app->getService('lang');
$serviceLang->changeLanguage($lang);

$app->getResponse()->redirect($app->getRequest()->getServer('HTTP_REFERER', '/'));
