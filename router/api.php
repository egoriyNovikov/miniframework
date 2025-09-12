<?php

use App\Router\Router;
use App\Application\Controller\LibraryController;

Router::get('/api/', LibraryController::class, 'get');
Router::post('/api/', LibraryController::class, 'post');
Router::put('/api/', LibraryController::class, 'put');
Router::delete('/api/', LibraryController::class, 'delete');