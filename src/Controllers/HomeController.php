<?php

namespace Src\Controllers;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class HomeController extends Controller
{
    public function index(RequestInterface $request, ResponseInterface $response, $args)
    {
        $viewData = [
            'name' => 'John',
        ];

        return $this->renderer->render($response, 'home.php', $viewData);
    }
}