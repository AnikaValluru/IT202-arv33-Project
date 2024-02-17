<?php 
  $Name = filter_input(INPUT_POST, 'Name');
  $Address = filter_input(INPUT_POST, 'Address');
  $City = filter_input(INPUT_POST, 'City');
  $State = filter_input(INPUT_POST, 'State');
  $ZipCode = filter_input(INPUT_POST, 'ZipCode');
  $ShipDate = filter_input(INPUT_POST, 'ShipDate');
  $OrderNumber = filter_input(INPUT_POST, 'OrderNumber', FILTER_VALIDATE_INT);
  $Dimensions = filter_input(INPUT_POST, 'Dimensions', FILTER_VALIDATE_INT);
  $Val = filter_input(INPUT_POST, 'Val', FILTER_VALIDATE_FLOAT);
  
  $error_message = '';

  // validate 
  if(empty($Name)|| is_null($Name)) {
    $error_message = 'Please enter a name.';
}
  if(empty($Address)|| is_null($Address)) {
    $error_message = 'Please enter an address.';
}
  if(empty($City)|| is_null($City)) {
      $error_message= 'Please enter a city.';
  }
  if(empty($State)|| is_null($State)) {
      $error_message = 'Please enter a state.';
  }   
  if(empty($ZipCode)|| is_null($ZipCode)) {
    $error_message = 'Please enter a zip code.'; }
    else if (!empty( $ZipCode) && !preg_match('/^\d{5}$/', $ZipCode)) {
      $error_message = "Please enter a valid zipcode.\n";}
 
    if(empty($ShipDate)|| is_null($ShipDate)) {
    $error_message = 'Please enter a date.';
  }
  if ($OrderNumber===FALSE) {
    $error_message = 'Please enter an order number.';
  }
  if ($Dimensions===FALSE) {
    $error_message ='Please enter dimensions.';
  }
    else if ($Dimensions>36) {
      $error_message ='Error: Dimensions are too high.';
}
  if ($Val===FALSE) {
    $error_message ='Please enter value.';
  }
    else if ($Val>1000) {
        $error_message ='Error: Value is too high.';
  }

  // if an error message exists, go back to the form (slide 67)
  if($error_message != '') {
    include('shippingform.php');
    exit();
  }

$Val = "$" . number_format($Val, 2);
?>

<!-- Slide 68 -->
<html>
  <head>
    <title>Shipping Form</title>
  </head>
  <body>
    <label>Gourmet Food and Snacks <label>
    <br>
    <label>1402 Greene Avenue<label>
    <br>
    <label>Newark, NJ 07102<label>
    <br>
    <br>
    <label><b>SHIP TO: </b></label>
    <br>
    <br>
    <label style="margin-left: 1em;"> Name:</label>
    <span><?php echo $Name; ?></span> 
    <br>
    <label style="margin-left: 1em;">Address:</label>
    <span><?php echo $Address; ?></span> 
    <br>
    <label style="margin-left: 1em;">City:</label>
    <span><?php echo $City; ?></span> 
    <br>
    <label style="margin-left: 1em;">State:</label>
    <span><?php echo $State; ?></span> 
    <form action="test.php" method="post">
    <label style="margin-left: 1em;">Zip Code:</label>
    <span><?php echo $ZipCode; ?></span> 
    <br>
    <label style="margin-left: 1em;">Ship Date:</label>
    <span><?php echo $ShipDate; ?></span> 
    <br>
    <label style="margin-left: 1em;">Order Number:</label>
    <span><?php echo $OrderNumber; ?></span> 
    <br>
    <label style="margin-left: 1em;">Dimensions:</label>
    <span><?php echo $Dimensions; ?></span> 
    <br>
    <label style="margin-left: 1em;">Value:</label>
    <span><?php echo $Val; ?></span> 
    <br>
    <hr style="height:2px; background-color:black; wdith: 105px; max-width: 400px; margin-left:0;">
    <h1 style="margin-left: 6em; ">NJ-597-0-01 </h1>
    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b4/MaxiCode.svg/1200px-MaxiCode.svg.png" alt="Barcode." width= "150 px"/>
    <img src="https://img.freepik.com/free-psd/barcode-illustration-isolated_23-2150584086.jpg" alt="Barcode." width= "250 px"/>
    <hr style="height:6px; background-color:black; max-width: 400px; margin-left:0;">
    <h2>UPS STANDARD</h2>
    <label>Tracking Number: 1Z 071 5X1 04 9054 7062</label>
    <hr style="height:2px; background-color:black; wdith: 105px; max-width: 400px; margin-left:0;">
    <img src="https://img.freepik.com/free-psd/barcode-illustration-isolated_23-2150584086.jpg" width="350" alt="Barcode" />
    <hr style="height:6px; background-color:black; max-width: 400px; margin-left:0;">
  </body>
</html>

