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
    <h1><?=$post['name']?></h1>
    <p><?=$post['description']?></p>
    <table>
        <tr>
            <td>Комментарий:</td>
        </tr>
        <?php foreach ($comments as $comment): ?>
        <tr>
            <td><?=$comment['text']?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <form action="/posts/<?=$post['id']?>/comments" method="post">
        <textarea name="text" id="text" cols="30" rows="10"></textarea>
        <button type="submit">Добавить</button></form>
</body>
</html>
