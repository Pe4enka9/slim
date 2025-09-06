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
<form action="/posts/<?= $post['id'] ?>/edit" method="post">
    <input type="hidden" name="_METHOD" value="PATCH">

    <input type="text" name="name" id="name" placeholder="Название" value="<?= $post['name'] ?>">
    <textarea name="description" id="description" placeholder="Описание"><?= $post['description'] ?></textarea>

    <button type="submit">Отправить</button>
</form>
</body>
</html>