<?php

require_once '../src/Application.php';

$app = Application::run();

$context['projects'] = json_decode(file_get_contents(PROJECT_PATH . $app->getConfig('projects_path')), true);
$context['technologies'] = json_decode(file_get_contents(PROJECT_PATH . $app->getConfig('technologies_path')), true);

$app->renderView('index', $context);
