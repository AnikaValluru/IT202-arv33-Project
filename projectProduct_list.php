<!--Anika Valluru
02/29/24
IT202-002 
Phase 2 Assignment: Read SQL Data using PHP 
arv33@njit.edu-->
<?php
require_once('database_njit.php');

// Get category ID
$gourmetCategory_id = filter_input(INPUT_GET, 'gourmetCategory_id', FILTER_VALIDATE_INT);
if ($gourmetCategory_id == NULL || $gourmetCategory_id == FALSE) {
  $gourmetCategory_id = 1;
}

// Get name for selected category
$queryCategory = 'SELECT * FROM gourmetCategories
          WHERE gourmetCategoryID = :gourmetCategory_id';
$db= getDatabase();
$statement1 = $db->prepare($queryCategory);
$statement1->bindValue(':gourmetCategory_id', $gourmetCategory_id);
$statement1->execute();
$gourmetCategory = $statement1->fetch();
$gourmetCategory_name = $gourmetCategory['gourmetCategoryName'];
$statement1->closeCursor();

// Get all categories
$queryAllCategories = 'SELECT * FROM gourmetCategories
             ORDER BY gourmetCategoryID';
$statement2 = $db->prepare($queryAllCategories);
$statement2->execute();
$categories = $statement2->fetchAll();
$statement2->closeCursor();

// Get products for selected category
$queryProducts = 'SELECT * FROM gourmet
          WHERE gourmetCategoryID = :gourmetCategory_id
          ORDER BY gourmetID';
$statement3 = $db->prepare($queryProducts);
$statement3->bindValue(':gourmetCategory_id', $gourmetCategory_id);
$statement3->execute();
$products = $statement3->fetchAll();
//debug
//echo "<pre>";
//print_r($products);
//echo "</pre>";
//debug
$statement3->closeCursor();
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
  <title>Gourmet Food and Snacks</title>
  <link rel="stylesheet" href=projectProduct_list.css />
</head>

<!-- the body section -->
<body>
<main>
  <h1>Product List</h1>
  <aside>
    <!-- display a list of categories -->
    <h2>Categories</h2>
    <nav>
    <ul>
      <?php foreach ($categories as $gourmetCategory) : ?>
      <li>
        <a href="?gourmetCategory_id=<?php 
            echo $gourmetCategory['gourmetCategoryID']; ?>">
          <?php echo $gourmetCategory['gourmetCategoryName']; ?></a>
      </li>
      <?php endforeach; ?>
    </ul>
    </nav>       
  </aside>

  <section>
    <!-- display a table of products -->
    <h2><?php echo $gourmetCategory_name; ?></h2>
    <table>
      <tr>
        <th>Product ID</th>
        <th>Code</th>
        <th>Name</th>
        <th>Price</th>
      </tr>

      <?php foreach ($products as $product) : ?>
      <tr>

         <!-- Modify the Product Code column to be a hyperlink -->
        <td><?php echo $product['gourmetID']; ?></td>
        <td><a href="projectDetails.php?gourmet_id=<?php echo $product['gourmetID']; ?>">
        <?php echo $product['gourmetCode']; ?></td>
        <td><?php echo $product['gourmetName']; ?></td>
        <td><?php echo $product['price']; ?>
      <td>
        <form action="projectDelete_product.php" method="post">
              <input type="hidden" name="gourmet_id"
                value="<?php echo $product['gourmetID']; ?>" />
              <input type="hidden" name="gourmetCategory_id"
                value="<?php echo $product['gourmetCategoryID']; ?>" />
              <input type="submit" value="Delete" />
              </form>
          </td>
        </tr>
      <?php endforeach; ?>   
    </table>
  </section>
  <footer>
    <h5>
        <p>Located on 142 Greene Avenue, Newark NJ <a
        href="emailto:arv33@njit.edu"> arv33@njit.edu</a>
    </h5>
</footer>   
</main>  
</body>
</html>

