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
$db=getDatabase();
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll(); //fetchAll used for 2D arrays 
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>
<h4>
    <?php 
      session_start();
      echo "Welcome " . " " .  $_SESSION["firstName"] . " ". $_SESSION["lastName"]. " (". $_SESSION["email"]. ")! ";
?>
</h4>
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
            <input type="text" name="gourmetCode" id="gourmetCode"><br>

            <label>Name:</label>
            <input type="text" name="gourmetName" id="gourmetName"><br>

            <label>Description:</label>
            <input type="text" name="description" id="description"><br>

            <label>List Price:</label>
            <input type="number" name="price" id="price"><br>

            <label>Color:</label>
            <input type="text" name="color"><br>
            <br>
            <input type="submit" value="Add Product" id="submit">  
            <input type="reset" value="Clear Form" id="reset_button" />

            <br>

        </form>
        <p><a href="projectProduct_list.php">View Product List</a></p>

        <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js" integrity="sha256-kmHvs0B+OpCW5GVHUNjv9rOmY0IvSIRcf7zGUDTDQM8=" 
        crossorigin="anonymous"></script>
        <script>
        $(document).ready(()=> { 

    $('#projectAdd_product_form').submit(event =>{
        // Validate code field
        var gourmetCode = $('#gourmetCode').val();
        if (gourmetCode === '' || gourmetCode.length < 4 || gourmetCode.length > 10) {
            alert('Code field should not be blank and should have 4 to 10 characters.');
            event.preventDefault();
            return;
        }

        // Validate name field
        var gourmetName = $('#gourmetName').val();
        if (gourmetName === '' || gourmetName.length < 10 || gourmetName.length > 100) {
            alert('Name field should not be blank and should have 10 to 100 characters.');
            event.preventDefault();
            return;
        }

        // Validate description field
        var description = $('#description').val();
        if (description === '' || description.length < 10 || description.length > 255) {
            alert('Description field should not be blank and should have 10 to 255 characters.');
            event.preventDefault();
            return;
        }

        // Validate price field
        var price = $('#price').val();
        if (price === '' || price <= 0 || price > 100000) {
            alert('Price field should not be blank, should be greater than 0, and should not exceed $100,000.');
            event.preventDefault();
            return;
        }
    });
});

        </script> 
    </main>
    <footer>
    <h5>
        <p>Located on 142 Greene Avenue, Newark NJ <a
        href="emailto:arv33@njit.edu"> arv33@njit.edu</a>
    </h5>
</footer>   
</body>
</html>