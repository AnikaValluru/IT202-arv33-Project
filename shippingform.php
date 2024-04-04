<?php
  // Slide 62
  if (!isset($Name)) { $Name = ''; }
  if (!isset($Address)) { $Address = ''; }
  if (!isset($City)) { $City = ''; }  
  if (!isset($State)) { $State = ''; }  
  if (!isset($ZipCode)) { $ZipCode = ''; }  
  if (!isset($ShipDate)) { $ShipDate = ''; }  
  if (!isset($OrderNumber)) { $OrderNumber = ''; }  
  if (!isset($Dimensions)) { $Dimensions = ''; }  
  if (!isset($Val)) { $Val = ''; }   
?>
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
  <head>
    <title>Shipping Address Form </title>
  </head>
  <body>
    <h1>Shipping Address Form</h1>

   <form action="projectShippingpage.php" method="post"> 
    <?php if (!empty($error_message)) {  ?>
    <p style="color: red;"><?php echo htmlspecialchars($error_message); ?></p>
  <?php } ?>


      <label>Name: </label>
      <input type="text" name="Name" value="<?php echo htmlspecialchars($Name); ?>" />
      <br>
      <label>Address:</label>
      <input type="text" name="Address" value="<?php echo htmlspecialchars($Address); ?>" />
      <br>
      <label>City: </label>
      <input type="text" name="City" value="<?php echo htmlspecialchars($City); ?>" />
      <br>
      <label>State: </label>
        <select id="statedrop" name="State">
          <option value=""></option>
          <option value="AL">Alabama</option>
          <option value="AK">Alaska</option>
          <option value="AZ">Arizona</option>
          <option value="AR">Arkansas</option>
          <option value="CA">California</option>
          <option value="CO">Colorado</option>
          <option value="CT">Connecticut</option>
          <option value="DE">Delaware</option>
          <option value="DC">Washington D.C.</option>
          <option value="FL">Florida</option>
          <option value="GA">Georgia</option>
          <option value="HI">Hawaii</option>
          <option value="ID">Idaho</option>
          <option value="IL">Illinois</option>
          <option value="IN">Indiana</option>
          <option value="IA">Iowa</option>
          <option value="KS">Kansas</option>
          <option value="KY">Kentucky</option>
          <option value="LA">Louisiana</option>
          <option value="ME">Maine</option>
          <option value="MD">Maryland</option>
          <option value="MA">Massachusetts</option>
          <option value="MI">Michigan</option>
          <option value="MN">Minnesota</option>
          <option value="MS">Mississippi</option>
          <option value="MO">Missouri</option>
          <option value="MT">Montana</option>
          <option value="NE">Nebraska</option>
          <option value="NV">Nevada</option>
          <option value="NH">New Hampshire</option>
          <option value="NJ">New Jersey</option>
          <option value="NM">New Mexico</option>
          <option value="NY">New York</option>
          <option value="NC">North Carolina</option>
          <option value="ND">North Dakota</option>
          <option value="OH">Ohio</option>
          <option value="OK">Oklahoma</option>
          <option value="OR">Oregon</option>
          <option value="PA">Pennsylvania</option>
          <option value="RI">Rhode Island</option>
          <option value="SC">South Carolina</option>
          <option value="SD">South Dakota</option>
          <option value="TN">Tennessee</option>
          <option value="TX">Texas</option>
          <option value="UT">Utah</option>
          <option value="VT">Vermont</option>
          <option value="VA">Virginia</option>
          <option value="WA">Washington</option>
          <option value="WV">West Virginia</option>
          <option value="WI">Wisconsin</option>
          <option value="WY">Wyoming</option>
            </select>
      <br>
      <label>Zip Code: </label>
      <input type="number" name="ZipCode" value="<?php echo htmlspecialchars($ZipCode); ?>" />
      <br>
      <label>Ship Date: </label>
      <input type="date" name="ShipDate" value="<?php echo htmlspecialchars($ShipDate); ?>" />
      <br>
      <label>Order Number: </label>
      <input type="text" name="OrderNumber" value="<?php echo htmlspecialchars($OrderNumber); ?>" />
      <br>
      <label>Dimensions: </label>
      <input type="number" name="Dimensions" value="<?php echo htmlspecialchars($Dimensions); ?>" />
      <br>
      <label>Value: </label>
      <input type="number" name="Val" value="<?php echo htmlspecialchars($Val); ?>" />
      <br>
      
      <!-- Slide 64 -->
      <input type="submit" value="Calculate" />
    </form>
  </body>
</html>
