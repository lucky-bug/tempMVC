<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
</head>
<body>
<table>
    <tr>
        <th>Title</th>
        <th>Body</th>
    </tr>
    <?php
    foreach ($posts as $post) {
        echo "<tr>";
        echo "<td>{$post->getTitle()}</td>";
        echo "<td>{$post->getBody()}</td>";
        echo "</tr>";
    }

    ?>
</table>
</body>
</html>