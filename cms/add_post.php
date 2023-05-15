<?php $title = "ADD POST"; ?>
<?php include "includes/db_connect.php"; ?>
<?php ob_start(); ?>
<?php session_start(); ?>
<?php
if (!isset($_SESSION['username'])) {

    header("Location: blog.php");
} ?>
<?php include "includes/header.php"; ?>

	<nav>
		<a href="https://sunnyandkate.com">HOME</a>
		<a href="blog.php">BLOG</a>
		<a href="">ABOUT</a>
		<a href="includes/logout.php">LOGOUT</a>
	</nav>
	
	<?php   ?>
<?php

if (isset($_POST['create_post'])) {

    $post_title = $_POST['post_title'];
    $post_author = $_POST['post_author'];  
    $post_image = $_FILES['image']['name'];
	$post_image_temp= $_FILES['image']['tmp_name'];
    $post_content = $_POST['post_content'];
	
	move_uploaded_file($post_image_temp, "images/$post_image");
	
	$post_status = "unpublished";
	
	$username =$_SESSION['username'];
	$useremail = $_SESSION['useremail'];
	 
 
    $query = "INSERT INTO posts(post_title, post_author, post_image,
            post_content, post_status) ";
    $query .= "VALUES('{$post_title}', '{$post_author}', '{$post_image}', '{$post_content}', '{$post_status}') ";

    $create_addpost_query = mysqli_query($connection, $query);
	
	
	
	
	mail("info@sunnyandkate.com", "BlogPost", $post_content, "From: " .$useremail);

	header('Location: blog.php');
}

?>


<h1 class="addPost-top">The post will be checked before it is published</h1>

<form action="" method="post" enctype="multipart/form-data" class="addPost-form">
    <label for="post_title">post title</label>
    <input type="text" name="post_title">
    <label for="post_author">post author</label>
    <input type="text" name="post_author"> 
    <label for="post_image">post image</label>
    <input type="file" name="image">   
    <label for="post_content">post content</label>
    <textarea name="post_content" id="" cols="30" rows="10">
    </textarea>
    <input type="submit" name="create_post" value="Submit">
</form>


<?php include "includes/footer.php"; ?>