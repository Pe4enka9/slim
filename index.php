<?php

use DI\Container;
use Slim\Factory\AppFactory;
use Slim\Views\PhpRenderer;
use Src\Controllers\HomeController;
use Src\Controllers\PostController;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config/idiorm.php';

$container = new Container();
AppFactory::setContainer($container);

$app = AppFactory::create();

$app->add(function ($request, $handler) {
    if ($request->getMethod() === 'POST') {
        $data = $request->getParsedBody();

        if (isset($data['_METHOD']) && $data['_METHOD'] === 'DELETE') {
            $request = $request->withMethod('DELETE');
        } else if (isset($data['_METHOD']) && $data['_METHOD'] === 'PATCH') {
            $request = $request->withMethod('PATCH');
        }
    }

    return $handler->handle($request);
});

$container->set(PhpRenderer::class, function () {
    return new PhpRenderer(__DIR__ . '/templates');
});

$app->get('/', [HomeController::class, 'index']);
$app->get('/posts', [PostController::class, 'index']);
$app->get('/posts/create', [PostController::class, 'create']);
$app->post('/posts/create', [PostController::class, 'store']);
$app->get('/posts/{id}/edit', [PostController::class, 'edit']);
$app->patch('/posts/{id}/edit', [PostController::class, 'update']);
$app->get('/posts/{id}', [PostController::class, 'show']);
$app->delete('/posts/{id}', [PostController::class, 'destroy']);
$app->get('/posts/{id}/comments', [PostController::class, 'comments']);
$app->post('/posts/{id}/comments', [PostController::class, 'addComments']);

$app->run();