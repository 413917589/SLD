<?php
session_start();
session_unset();
session_destroy();
header("content-type:text/html;charset=utf-8");
echo '<script>
             
              window.location.href="login.php";
              </script>';
?>
