<!--Anika Valluru
03/22/24
IT202-002 
Phase 3 Assignment: Create SQL Data using PHP 
arv33@njit.edu-->

<?php
// Get the product data
$gourmetCategory_id = filter_input(INPUT_POST, 'gourmetCategory_id', FILTER_VALIDATE_INT);
$gourmetCode = filter_input(INPUT_POST, 'gourmetCode');
$gourmetName = filter_input(INPUT_POST, 'gourmetName');
$price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_INT);
$description = filter_input(INPUT_POST, 'description');
$color = filter_input(INPUT_POST, 'color');



// Validate inputs
if ($gourmetCategory_id == NULL || $gourmetCategory_id == FALSE || $gourmetCode == NULL ||
        $gourmetName == NULL || $price == NULL || $price == FALSE || $price >= 50 || $price <= 0 || $description == NULL || $color == NULL) {
    $error = "Invalid product data. Price must be a positive value less then $50. Check all fields and try again.";
    echo "$error <br>";
     //include('database_error.php');
} else {
    
    require_once('database_njit.php');

    //Additional Error Checking for product code
    $query_check = 'SELECT COUNT(*) FROM gourmet WHERE gourmetCode = :gourmetCode';
    $statement_check = $db->prepare($query_check);
    $statement_check->bindValue(':gourmetCode', $gourmetCode);
    $statement_check->execute();
    $count = $statement_check->fetchColumn();

    if ($count > 0) {
        $error = "Product code $gourmetCode already exists. Please enter a different one.";
        echo "$error <br>";
    } else {

    // Add the product to the database  
    $query = 'INSERT INTO gourmet
                 (gourmetCategoryID, gourmetCode, gourmetName, price, description, gourmetColor, dateCreated)
              VALUES
                 (:gourmetCategory_id, :gourmetCode, :gourmetName, :price, :description, :gourmetColor, NOW())';
    $statement = $db->prepare($query);
    $statement->bindValue(':gourmetCategory_id', $gourmetCategory_id);
    $statement->bindValue(':gourmetCode', $gourmetCode);
    $statement->bindValue(':gourmetName', $gourmetName);
    $statement->bindValue(':price', $price);
    $statement->bindValue(':description', $description);
    $statement->bindValue(':gourmetColor', $color);


    $success = $statement->execute();
    $statement->closeCursor();
    echo "<p>Your insert statement status is $success</p>";
}
}
?>
<p><a href="projectProduct_list.php">View Product List</a></p>