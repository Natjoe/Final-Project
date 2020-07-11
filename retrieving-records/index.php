<?php try{
    $pdo = new PDO("mysql:host=". $database['host'] . ";dbname=" . $database['name'] , $database['user'], $database['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT `id`, `name`, `created_on`, `updated_on` FROM `items`";
    $items = $pdo->query($sql)->fetchAll(); 
    echo "<h1>Items (" . sizeof($items) . ")</h1>";
    foreach ($items as $item) {
        echo $item['id'] . " " 
            .$item['name']. " " 
            .date("D, M j, Y H:i:s", strtotime($item['created_on'])). " "
            .date("D, M j, Y H:i:s", strtotime($item['updated_on'])). "<br />";
    }
} catch(PDOException $e){
    echo "<h1>Error</h1>";
    echo "<p>An error occurred: " . $e->getMessage() . "</p>";
} ?>