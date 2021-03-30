<!DOCTYPE html>
<html lang="en">

<?php

require_once 'app/init.php';

$itemsQuery = $pdo->prepare("
    SELECT *
    FROM items
");

$itemsQuery->execute();

$items = $itemsQuery->rowCount() ? $itemsQuery : [];

?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    </link>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>To do</title>
</head>

<body>
    <div class="list">
        <h1 class="header"> To do.</h1>

        <?php if (!empty($items)) : ?>
            <ul class="items">
                <?php foreach ($items as $item) : ?>
                    <li>
                        <span class="item <?php echo $item['done'] ? 'done' : ' ' ?>"> <?php echo $item['name']; ?> </span>
                        <?php if (! $item['done']) : ?>
                            <a href="mark.php?as=done&item=<?php echo $item['id']; ?>" class="done-button">Mark as done</a>
                        <?php endif; ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php else : ?>
            <p> You haven't added any items yet</p>
        <?php endif; ?>

        <form class="item-add" action="add.php" method="post">
            <input type="text" name="name" placeholder="Type a new item" class="input" autocomplete="off" required>
            <input type="submit" value="add" class="submit">

        </form>
    </div>
</body>

</html>