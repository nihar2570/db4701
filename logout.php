<?php
Session_start();
Session_destroy();
header("Location:login.html?message=successful log out");
exit();
?>