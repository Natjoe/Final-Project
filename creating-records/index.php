<?php 
$config = include('configs/db.php');
$database = $config['database'];
try{
    $pdo = new PDO("mysql:host=". $database['host']
               .";dbname=" 
               .$database['name'],$database['user'], $database['password']);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        $name = $_POST['name'];
        $sql = "INSERT INTO items (name, price) VALUES(:name, :price)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':price', $price);
        $statement->execute();
        header("Location: ../index.php", true, 303);        
    }
} catch(PDOException $e){
    echo "<h1>Error</h1>";
    echo "<p>An error occurred: " . $e->getMessage() . "</p>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/main.css">
    <title>Create Student</title>
</head>
<body>
    <section class="login-form">     
        <h1>Create Student</h1>
        <hr>     
        <form method="post" action="index.php" id="createItem">
        <input type="text" placeholder="Name" name="name">
        <input type="text" placeholder="Price" name="price">  
        <button type="reset">Cancel</button>     
        <button type="submit">Save</button>
        </form> 
    </section>
</body>
</html>