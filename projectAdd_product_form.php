<!--Anika Valluru
03/22/24
IT202-002 
Phase 3 Assignment: Create SQL Data using PHP 
arv33@njit.edu-->

<?php
require_once('database_njit.php');
$query = 'SELECT *
          FROM gourmetCategories
          ORDER BY gourmetCategoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll(); //fetchAll used for 2D arrays 
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>
    <!--logo-->
<figure>
    <div class="right small">
    <img src="https://as2.ftcdn.net/v2/jpg/02/75/30/59/1000_F_275305997_YvxcwscsKJo45E0P1OSrArT6sFiZ5yWT.jpg" alt="Your Logo" 
      width="100px" height="90px" />
</figure>

<!--navigation bar-->
<nav>
            <div class="right small">
            <div class="paddingbar" style="letter-spacing:2px;">
            <a href="projectHomepage.php" class="button">Home</a>
            <div class="hide-small">
            <a href="shippingform.php" class="button">Shipping Page</a> 
            <div class="hide-small">
            <a href="projectProduct_list.php" class="button">Product List</a> 
            <div class="hide-small">
            <a href="projectAdd_product_form.php" class="button">Add Product</a> 
        </nav>

<!-- the head section -->
<head>
    <title>Add Product</title>
    <link rel="stylesheet" href="projectAdd_product_form.css">
</head>

<!-- the body section -->
<body>
    <header><h1>Product Manager</h1></header>

    <main>
        <h2>Add Product</h2>
        <form action="projectAdd_product.php" method="post" 
              id="projectAdd_product_form">

            <label>Category:</label>
            <select name="gourmetCategory_id">
            <?php foreach ($categories as $gourmetCategory) : ?>
                <option value="<?php echo $gourmetCategory['gourmetCategoryID']; ?>">
                    <?php echo $gourmetCategory['gourmetCategoryName']; ?>
                </option>
            <?php endforeach; ?>
            </select>
            <br>
            <label>Code:</label>
            <input type="text" name="gourmetCode"><br>

            <label>Name:</label>
            <input type="text" name="gourmetName"><br>

            <label>Description:</label>
            <input type="text" name="description"><br>

            <label>List Price:</label>
            <input type="number" name="price"><br>

            <label>Color:</label>
            <input type="text" name="color"><br>

            <input type="submit" value="Add Product"><br>
        </form>
        <p><a href="projectProduct_list.php">View Product List</a></p>
    </main>

    <footer>
    <h5>
        <p>Located on 142 Greene Avenue, Newark NJ <a
        href="emailto:arv33@njit.edu"> arv33@njit.edu</a>
    </h5>
</footer>   
</body>
</html>