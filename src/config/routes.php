<?php

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use App\Application\UserController;

return function (App $app) {
    $app->get('/users', [UserController::class, 'getUsers']);
    $app->post('/users', [UserController::class, 'createUser']);
};
