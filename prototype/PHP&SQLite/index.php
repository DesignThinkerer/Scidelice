<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php
//check if sqlite is active
// phpinfo();

try {
    // Define PDO and connect to the SQLite database file
    $pdo = new PDO('sqlite:db/recipes.db');
    
    // Set the PDO attribute to enable exceptions
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // SQL query to fetch the list of tables in the database
    // $query = "SELECT name FROM sqlite_master WHERE type='table'";


    $query = "
    SELECT ingredient.name as 'Recette de spaghettis'
    FROM recipe_ingredients
    LEFT JOIN ingredient ON recipe_ingredients.id_ingredient = ingredient.id_ingredient
    JOIN recipe ON recipe.id_recipe = recipe_ingredients.id_recipe
    WHERE recipe.name LIKE 'spaghet%'
";

    
    // Prepare and execute the query
    $stmt = $pdo->query($query);
    
    // Fetch all table names into an array
    $ingredients = $stmt->fetchAll(PDO::FETCH_COLUMN);
    
    // Output the list of tables
    echo "<h2>Ingredients:</h2>";
    echo "<ul>";
    foreach ($ingredients as $ingredient) {
        echo "<li>{$ingredient}</li>";
    }
    echo "</ul>";
    
} catch (PDOException $e) {
    // Handle any errors that occur during the process
    echo "Error: " . $e->getMessage();
}

include "./nav.php";
?>

</body>
</html>