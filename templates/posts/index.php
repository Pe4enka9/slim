<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<main>
    <h1>Посты</h1>
    <a href="/posts/create">Добавить</a>

    <div class="posts-wrapper">
        <?php foreach ($posts as $post): ?>
            <div class="posts-item">
                <h2><?= $post['name'] ?></h2>
                <p><?= $post['description'] ?></p>

                <a href="/posts/<?= $post['id'] ?>">Посмотреть</a>
                <a href="/posts/<?= $post['id'] ?>/edit">Изменить</a>
                <a href="/posts/<?=$post['id']?>/comments">Комментарий</a>
                <form action="/posts/<?= $post['id'] ?>" method="post">
                    <input type="hidden" name="_METHOD" value="DELETE">
                    <button type="submit">Удалить</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</main>

</body>
</html>