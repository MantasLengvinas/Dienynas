<?php
/* Log out process, unsets and destroys session variables */
session_start();
session_unset();
session_destroy(); 
if(isset($_GET['redirect'])) {
 header('Location: '.base64_decode($_GET['redirect']));  
} else {
 header('Location: ../Prisijungimas/Login');  
}

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Logged out</title>
  <link rel="stylesheet" type="text/css" href="..css/css.html">
</head>

<body>
    <div class="form">
          <h1>Thanks for stopping by</h1>
              
          <p><?= 'You have been logged out!'; ?></p>
          
          <a href="../Prisijungimas/Login"><button class="button button-block"/>Home</button></a>

    </div>
</body>
</html>
