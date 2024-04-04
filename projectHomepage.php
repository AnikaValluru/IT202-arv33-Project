<html> 
<h4>
    <?php 
    if(session_status()==PHP_SESSION_NONE){
        session_start();
      }
      //session_start();
      echo "Welcome " . " " .  $_SESSION["firstName"] . " ". $_SESSION["lastName"]. " (". $_SESSION["email"]. ")! ";
      
?>
</h4>
    <head> 
        <!--logo-->
<figure>
    <div class="right small">
    <img src="https://as2.ftcdn.net/v2/jpg/02/75/30/59/1000_F_275305997_YvxcwscsKJo45E0P1OSrArT6sFiZ5yWT.jpg" alt="Your Logo" 
      width="100px" height="90px" />
</figure>
    <header>
        <h1>Gourmet Food and Snacks</h1> 
        <link rel="icon" href="gourmetimage.jpg" type="image/jpg" />
        <link rel="stylesheet" href="projectHomepage.css" />
    </header>
    <head>
    <body>
    <main>
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
</div>
</div>

        <h3> About Us: </h3>

         <p class="AboutUs";> Gourmet Food and Snacks was established in 2024 by the company's founder Anika Valluru. The company was 
        founded to bring a sense of luxury and appeal to those who craved induldging in the finer goods while also fullfilling their snacking needs. From artisenal 
        chcolate boxes to gourmet popcorn samplers to speciality coffee beans we have something to offer for all kinds of food lovers.
        Our mission is to connect luxury foods with all kinds of people, creating a love than can only be shared through the mutual
        experience of luxury snacking. </p>  
        <img src="https://www.wilburs.com/wp-content/uploads/2021/05/easter-truffle.jpg"
        alt="Gourmet chocolates." width= "320 px" class="center"/>
        <img src="https://kunjaninaples.com/cdn/shop/collections/specialty_small_batch_coffee-Kunjani_roasters_1400x.jpg?v=1632772146"
        alt="Coffee Beans." width= "350 px" class="center"/>
        <img src="https://www.shirleyspopcorn.com/cdn/shop/products/PickThree-CaramelToDieForKlondikeKrunchDarkSaltedCaramel_564_Clipped_42dc6d83-130b-4a05-afac-1d96ea7ecfc0_1024x1024.jpg?v=1611697849"
        alt="Gourmet Popcorn." width= "230 px" class="center"/>
        <img src="https://i.ebayimg.com/images/g/XC8AAOSw745jm4CQ/s-l1200.webp"
        alt="Jam Set." width= "200 px" class="center"/>
        <img src="https://laconiko.com/wp-content/uploads/2020/06/black_truffle-1.jpg"
        alt="Truffle infused olive oil." width= "200 px" class="center"/>
        
        <div class="row padding-64" id="shippingpage">
    <div class="col l6 padding-large">
<footer>
    <h5>
        <p>Located on 142 Greene Avenue, Newark NJ <a
        href="emailto:arv33@njit.edu"> arv33@njit.edu</a>
    </h5>
</footer>   
    </main>
    <body>
</html>
