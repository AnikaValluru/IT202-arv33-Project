<?php
require_once('database_njit.php');

function addGourmetManager($email, $password, $firstName, $lastName) {
   $db = getDatabase();
   $hash = password_hash($password, PASSWORD_DEFAULT);
   $query = 'INSERT INTO gourmetManagers (emailAddress, password, firstName, lastName, dateCreated)
             VALUES (:email, :password, :firstName, :lastName, NOW())';
   $statement = $db->prepare($query);
   $statement->bindValue(':email', $email);
   $statement->bindValue(':password', $hash);
   $statement->bindValue(':firstName', $firstName);
   $statement->bindValue(':lastName', $lastName);
   $statement->execute();
   $statement->closeCursor();
   
addGourmetManager('anikarvalluru@gmail.com', 'AV123', 'Anika', 'Valluru');
addGourmetManager('kellywu@gmail.com', 'KW123', 'Kelly', 'Wu');
addGourmetManager('jameskent@gmail.com','JK123', 'James', 'Kent');
}



?>