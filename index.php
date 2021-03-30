<!DOCTYPE html>
<html lang="en">

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

        <ul class="items">
            <li>
                <span class="item"> Pick up shopping </span>
                <a href="#" class="done-button">Mark as done</a>
            </li>
            <li>
                <span class="item done">Learn php</span>
            </li>
        </ul>

        <form class="item-add" action="add.php" method="post">
            <input type="text" name="name" placeholder="Type a new item" class="input" autocomplete="off" required>
            <input type="submit" value="add" class="submit">

        </form>
    </div>
</body>

</html>