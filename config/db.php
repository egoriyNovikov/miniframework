<?php

$path = __DIR__ . '/.env';
$env = parse_ini_file('.env');

return $env;