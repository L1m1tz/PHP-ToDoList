<?php
  require_once 'app/init.php';
  
 if(isset($_GET['as'], $_GET['item'] )){

    $as = $_GET['as'];
    $item = $_GET['item'];
    $sql = "UPDATE items 
            SET done = 1
            WHERE ID = :item";

    switch($as) {
        case 'done':
            $doneQuery = $pdo-> prepare($sql);
            $doneQuery->execute([
                'item' => $item
            ]);
        break;

    }

 }

 header('Location: index.php');