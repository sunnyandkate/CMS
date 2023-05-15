<?php $title = "CMS"; ?>
<?php include "includes/db_connect.php"; ?>
<?php include "includes/header.php"; ?>
<div class="main-container">
	<nav>
		<a href="https://sunnyandkate.com">HOME</a>
		<a href="blog.php">BLOG</a>
		<a href="">ABOUT</a>
		<a href="loginpage.php">LOGIN</a>
	</nav>
	<div class="blog-container">
		<div class="col-left">
		<?php

            if (isset($_GET['p_id'])) {

                $the_post_id =  $_GET['p_id'];
            }


            $query = "SELECT * FROM posts WHERE post_id = $the_post_id ";
            $select_post_query = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_post_query)) {

                $post_title = $row['post_title'];
				$post_author = $row['post_author'];
                $post_image = $row['post_image'];
                $post_content = $row['post_content'];

            ?>

                <div class="blog-post">
                    <h2 class="title"><a href=""><?php echo $post_title; ?></h2>                  
					<h2 class="author"><a href=""><?php echo $post_author; ?></h2> 
				   <img class="post-img" src="images/<?php echo $post_image; ?>" alt="" />
                    <p class="content"><?php echo $post_content; ?></p>
                    <button class="read-more-btn">Read more</button>
                    <hr>
                </div>

            <?php  } ?>	
	</div>
</div>

<?php include "includes/footer.php"; ?>