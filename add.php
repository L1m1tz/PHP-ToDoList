<?php
require_once 'app/init.php';

if (isset($_POST['name'])) {
    $name = trim($_POST['name']);

    if (!empty($name)) {

        $sql = "INSERT INTO items (name, status_id, created) 
            VALUES (:name, 1, NOW())";

        $addedQuery = $pdo->prepare($sql);

        $addedQuery->execute([
            'name' => $name
        ]);
    }
}

header('Location: index.php');