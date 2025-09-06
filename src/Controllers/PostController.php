<?php

namespace Src\Controllers;

use ORM;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class PostController extends Controller
{
    /**
     * @throws Throwable
     */
    public function index(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $posts = ORM::forTable('posts')->findArray();

        return $this->renderer->render($response, '/posts/index.php', ['posts' => $posts]);
    }

    /**
     * @throws Throwable
     */
    public function create(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        return $this->renderer->render($response, '/posts/create.php');
    }

    public function store(RequestInterface $request, ResponseInterface $response): ResponseInterface
    {
        $data = $request->getParsedBody();
        $name = trim($data['name'] ?? '');
        $description = trim($data['description'] ?? '');

        if (
            $name !== '' &&
            $description !== ''
        ) {
            ORM::forTable('posts')->create([
                'name' => $name,
                'description' => $description
            ])->save();
        }

        return $response->withHeader('Location', '/posts')->withStatus(302);
    }

    /**
     * @throws Throwable
     */
    public function edit(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $id = $args['id'] ?? '';
        $post = ORM::forTable('posts')->findOne($id);

        return $this->renderer->render($response, '/posts/edit.php', ['post' => $post]);
    }

    public function update(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $data = $request->getParsedBody();
        $id = $args['id'] ?? '';
        $name = trim($data['name'] ?? '');
        $description = trim($data['description'] ?? '');
        $post = ORM::forTable('posts')->findOne($id);

        if (
            $post &&
            $name !== '' &&
            $description !== ''
        ) {
            $post->set([
                'name' => $name,
                'description' => $description
            ])->save();
        }

        return $response->withHeader('Location', '/posts')->withStatus(302);
    }

    /**
     * @throws Throwable
     */
    public function show(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $id = $args['id'] ?? '';
        $post = ORM::forTable('posts')->findOne($id);

        return $this->renderer->render($response, '/posts/show.php', ['post' => $post]);
    }

    public function destroy(RequestInterface $request, ResponseInterface $response, array $args): ResponseInterface
    {
        $id = $args['id'] ?? '';
        $post = ORM::forTable('posts')->findOne($id);

        if ($post) $post->delete();

        return $response->withHeader('Location', '/posts')->withStatus(302);
    }
}