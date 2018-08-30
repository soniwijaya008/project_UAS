<?php

session_start();
if(session_is_registered('fbsql_username')){
session_unset();
session_destroy();
}
else{
header("location: login.php");
}
exit;
 ?>