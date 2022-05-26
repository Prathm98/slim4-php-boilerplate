<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use App\Application\Actions\Demo\DemoAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    // @route     GET /
    // @desc      Get server status
    // @access    Public
    $app->get('/', function (Request $request, Response $response) {
        $res = json_encode(array("Status" => "Running!"));
        $response->getBody()->write($res);
        return $response;
    });
    
    // @route     GET /
    // @desc      Get tech stack details
    // @access    Public
    $app->get('/detail', function (Request $request, Response $response) {
        $res = json_encode(array("Stack" => "PHP Slim4 application"));
        $response->getBody()->write($res);
        return $response;
    });

    // @route     GET /*
    // @desc      Group all members routes
    $app->group('/', function (Group $group) {
        $group->get('members', DemoAction::class);
        $group->post('addmember', DemoAction::class . ':addMember');
    });    

    // Example of users operations using in memory db
    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });
};
