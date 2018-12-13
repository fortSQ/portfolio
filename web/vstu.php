<?php

require_once '../src/Application.php';

$app = Application::run();

$context['publications'] = json_decode(file_get_contents(PROJECT_PATH . $app->getConfig('publications_path')), true);

$app->renderView('vstu', $context);