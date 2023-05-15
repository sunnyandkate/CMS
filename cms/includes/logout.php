<?php $title = "Logout"; ?>
<?php include "db_connect.php"; ?>
<?php include "header.php"; ?>


<?php session_start(); ?>

<?php

$_SESSION['username'] = null;

header("Location: ../blog.php");

?>


<?php include "footer.php"; ?>