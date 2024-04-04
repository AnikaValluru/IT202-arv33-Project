<?php
  require_once('database_njit.php');

  function is_valid_admin_login($email, $password) {
    $db = getDatabase();
    $query = 'SELECT firstName, lastName, password FROM gourmetManagers WHERE emailAddress = :email';
    $statement = $db->prepare($query);
    $statement->bindValue(':email', $email);
    $statement->execute();
    $row = $statement->fetch();
    $statement->closeCursor();  
    if ($row === false) {
      return false;
    } else {
      $hash = $row['password'];
      $_SESSION['firstName'] = $row['firstName'];
      $_SESSION['lastName'] = $row['lastName'];
      $_SESSION['email'] = $email;
      return password_verify($password, $hash);
    }
  }

  
?>
