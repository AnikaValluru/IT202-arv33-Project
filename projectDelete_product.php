<?php
  // Slide 37
  // Use database_local.php or database_njit.php
  require_once('database_njit.php');
  $db=getDatabase();


  // get IDs
  $gourmet_id = filter_input(INPUT_POST, 'gourmet_id', FILTER_VALIDATE_INT);
  $gourmetCategory_id = filter_input(INPUT_POST, 'gourmetCategory_id', FILTER_VALIDATE_INT);

  if ($gourmet_id != FALSE && $gourmetCategory_id != FALSE) {
    $query = 'DELETE FROM gourmet WHERE gourmetID = :gourmet_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':gourmet_id', $gourmet_id);
    $success = $statement->execute();
    $statement->closeCursor();
    echo "<p>You're delete statement status is $success</p>";
    include('projectProduct_list.php');

  }
?>