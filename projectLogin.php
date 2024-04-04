<?php 
if (!isset($login_message)) {
  $login_message = 'You must login to view this page.';
}

?>
<!DOCTYPE html>
<html>
 <head>
   <title>Gourmet Food and Snacks</title>
   <link rel="stylesheet" href="projectLogin.css">
 </head>
 <body>
   <h1>Gourmet Food and Snacks</h1>
 <main>
   <h1>Login</h1>
   <form action="projectAuthenticate.php" method="post">
     <label>Email:</label>
     <input type="text" name="email" value="">
     <br>
     <label>Password:</label>
     <input type="password" name="password" value="">
     <br>
     <br>
     <input type="submit" value="Login">
   </form>
   <p><?php echo $login_message; ?></p>
 </main>
 </body>
</html>