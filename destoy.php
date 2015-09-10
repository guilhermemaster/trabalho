<?php
session_start("administracao");
unset($_SESSION["user"]);
session_destroy();
header("Location:index.php");
?>