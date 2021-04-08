<!DOCTYPE html>
<html lang="en">

<?php

require_once 'app/init.php';
include_once 'head.php';

function dd($var)
{
    var_dump($var);
    exit;
}

$itemsQuery = $pdo->prepare(
    "SELECT *
    FROM items"
);
$itemsQuery->execute();

// count how many items in the items table have a status value of 2(Done).
$stmt = $pdo->prepare("SELECT COUNT(*) AS DONE FROM items WHERE status_id = 2");
$stmt->execute();

$done = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]['DONE'];

$stmt = null;
// $doneTotal = intval($countDone);

$stmt = $pdo->prepare("SELECT COUNT(id) AS TOTAL FROM items");
$stmt->execute();

$total = $stmt->fetchAll(PDO::FETCH_ASSOC)[0]['TOTAL'];

$value= ($done/$total)*100;
$percentage = round($value, 2);




// $nameTotal = intval($countName);

//$progressBar = $itemsQuery->fetchAll();

$items = $itemsQuery->rowCount() ? $itemsQuery : [];

?>
<body>
    <div class="list">
        <h1 class="header"> To do.</h1>
        <div class="progress">
            <div class="progress-bar" role="progressbar" style="width:<?php echo $percentage ?>% ;" aria-valuenow="<?php echo $percentage ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $percentage ?>%</div>
        </div>

        <?php if (!empty($items)) : ?>
            <ul class="items">
                <?php foreach ($items as $item) : ?>
                    <li>
                        <span class="item <?php echo $item['status_id'] == 2 ? 'done' : ' ' ?> p-2"> <?php echo $item['name']; ?>  </span>

                        <?php if ($item['status_id'] == 1) : ?>
                            <a href="mark.php?as=done&item=<?php echo $item['id']; ?>" class="done-button">Mark as done</a>
                        <?php endif; ?>
                        <?php if ($item): ?>
                            <button type="button" class="btn btn-danger p-1"><a href="delete.php?id=<?php echo $item['id']; ?>" class="delete"> Delete</a></button>
                        <?php endif;?>
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