<?php

require __DIR__ . '/vendor/autoload.php';
session_start();
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');
$route = require __DIR__ . '/config/routes.php';