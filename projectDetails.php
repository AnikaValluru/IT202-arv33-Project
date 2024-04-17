<?php
//database connection
require_once('database_njit.php');

$gourmet_id = filter_input(INPUT_GET, 'gourmet_id', FILTER_VALIDATE_INT);

// Check if gourmet ID is valid
if ($gourmet_id === null || $gourmet_id === false) {
    // Redirect to an error page or display an error message
    echo "Invalid gourmet ID.";
    exit;
}

// fetch details based on gourmetID
$query = 'SELECT * FROM gourmet WHERE gourmetID = :gourmet_id';
//$query = 'SELECT * FROM gourmet WHERE gourmetCategoryID = 1';

$db = getDatabase();
$statement = $db->prepare($query);
$statement->bindValue(':gourmet_id', $gourmet_id);
$statement->execute();
$product = $statement->fetch();
$statement->closeCursor();

// Check if product exists
if (!$product) {
    // Redirect to an error page or display an error message
    echo "Product not found.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<figure>
    <div class="right small">
    <img src="https://as2.ftcdn.net/v2/jpg/02/75/30/59/1000_F_275305997_YvxcwscsKJo45E0P1OSrArT6sFiZ5yWT.jpg" alt="Your Logo" 
      width="100px" height="90px" />
</figure>

<!--navigation bar-->
<nav>
            <div class="right small">
            <div class="paddingbar" style="letter-spacing:2px;">
            <div class="hide-small">
            <a href="projectLogin.php" class="button">Login</a> 
            <div class="hide-small">
            <br>
            <a href="projectHomepage.php" class="button">Home</a>
            <div class="hide-small">
            <a href="shippingform.php" class="button">Shipping Page</a> 
            <div class="hide-small">
            <a href="projectProduct_list.php" class="button">Product List</a> 
            <div class="hide-small">
            <a href="projectAdd_product_form.php" class="button">Add Product</a> 
            <div class="hide-small">
            <br>
            <a href="projectLogout.php" class="button">Logout</a> 
        </nav>
<head>
    <title>Product Details</title>
    <link rel="stylesheet" href="projectDetails.css" />
</head>
<body>
<main>
    <h1>Product Details</h1>
    <div class="product-details">
        <div class="product-image">
            <!-- Display changing product image -->
            <p>Move your mouse over the image below to change it, and back out of the image to restore the original image.</p>
            <img src="Images/<?php echo $product['gourmetID']; ?>-blurry.jpg" alt="Product Image: <?php echo $product['gourmetID']; ?>-color.jpg" 
            width="300px" height="auto" id= "project_Details">
        </div>
        <!-- Get product information -->
        <div class="product-info">
            <h2><?php echo $product['gourmetName']; ?></h2>
            <p>Code: <?php echo $product['gourmetCode']; ?></p>
            <p>Description: <?php echo $product['description']; ?></p>
            <p>Price: $<?php echo $product['price']; ?></p>
            <p>Color: <?php echo $product['gourmetColor']; ?></p>
        </div>
    </div>
</main>
</body>

        <!--Include jquery library-->
        <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" 
        crossorigin="anonymous"></script>
        <script src="projectDetails.js"></script>
    </body>

    <footer>
    <h5>
        <p>Located on 142 Greene Avenue, Newark NJ <a
        href="emailto:arv33@njit.edu"> arv33@njit.edu</a>
    </h5>
</footer>  
</html>