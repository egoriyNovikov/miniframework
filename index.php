<?php

use App\App;
use App\Config\Config;
use App\Exception\NotFoundException;
use App\Exception\ViewException;

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . "/vendor/larapack/dd/src/helper.php";

Config::list();

try {
  App::start();
}catch (NotFoundException $e) {
} catch (ViewException $e) {
} catch (Exception $e) {
  echo "Какая-то непредвиденная ошибка ". $e->getMessage();
}


