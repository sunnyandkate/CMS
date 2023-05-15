<?php $title = "Admin";?>
<?php include "includes/db_connect.php"; ?>
<?php ob_start(); ?>
<?php session_start(); ?>
<?php
if (!isset($_SESSION['username'])) {

    header("Location: blog.php");
} ?>
<?php include "includes/header.php"; ?>

<div class="main-container">

	<nav>
		<a href="https://sunnyandkate.com">HOME</a>
		<a href="blog.php">BLOG</a>
		<a href="add_post.php">ADD POST</a>
		<a href="includes/logout.php">LOGOUT</a>
	</nav>
	<!--<div class="sidebar">
		<a href="allposts.php">View all posts</a>
		<a href="add_post.php">add post</a>
	
	</div>-->
	<div class="admin-container">
		<h1>welcome</h1>

		<h2><?php echo $_SESSION['username']; ?></h2>
	</div>

<?php include "includes/footer.php"; ?>