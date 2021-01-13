<?php
declare(strict_types=1);

use App\Application\Actions\EmptyResponse;
use App\Application\Actions\V1\Auth\CustomerRegistration;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;


return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        return new EmptyResponse();
    });

    $app->post('/v1', function (Group $group) {
        $group->post('/auth', CustomerRegistration::class);
        $group->post('/auth/registration', CustomerRegistration::class);
    });

//    $app->group('/users', function (Group $group) {
//        $group->get('', ListUsersAction::class);
//        $group->get('/{id}', ViewUserAction::class);
//    });
};
