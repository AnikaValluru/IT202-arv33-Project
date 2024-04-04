<?php
//slide 24
function getDatabase() {

$dsn='mysql:host=sql1.njit.edu;port=3306;dbname=arv33';
$username='arv33';
$password='Val45197!!';


try {
    $db= new PDO($dsn, $username, $password);
    //echo '<p>You are connected to the NJIT database!';
} catch(Exception $ex){
    $error_message=$ex->getMessage();
    include('database_error.php');
    exit();

}
return $db;
}

?>