<?php

$title="Login";
$error=null;
include_once 'koneksi.php';


if(isset($_POST['submit'])){
  $user=$_POST['username'];
  $passwd= $_POST['password'];
  $sql = "SELECT * FROM login WHERE username='{$user}' AND password='{$passwd}'";
  $result = mysqli_query($conn, $sql);
  if($result && $result->num_rows > 0){
    session_start();
    $_SESSION['isLogin'] =1;
    header('index.php');
  }else
  $error = "Username atau Password salah.";
}



 ?>
<!DOCTYPE html>
<html>
<head>
  <link href="style.css" type="text/css" rel="stylesheet" />
  <title>Halaman login</title>
</head>
<body>
 
  
   <!-- ini adalah container -->
    <div id="container">
      <!-- membuat header -->
      <header>
        <div class="entry">
          <h2>Halaman Login</h2>

        </div>
      </header>

  <form action="index.php" method="post">
    
        
    <div class="input">     
         <label for="username">Username</label>
         <input type="text" name="username" id="username">
   </div> 
   <div class="input">
          <label for="password">Password</label>
          <input type="password" name="password" id="password">
      </div>
      <div class="submit">
         <button class="btn btn-large" type="submit" name="login">Login</button>
  </div>
    </header>
       </div>
  </form>

</body>
</html>
