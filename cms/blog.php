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
			<h1 class="main-title">Blog</h1>
            <?php

            $query = "SELECT * FROM posts ";
            $select_all_posts_query = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_all_posts_query)) {

                $post_id = $row['post_id'];
                $post_title = $row['post_title'];      
			    $post_author = $row['post_author'];
                $post_image = $row['post_image'];
                $post_content = substr($row['post_content'], 0, 50);
				$post_status = $row['post_status'];
			     if ($post_status !== 'published') {

                    echo "<h1></h1>";
                } else {

            ?>
                    <div class="blog-post">
                                               
                        <h2 class="title"><a href="post.php?p_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></h2>                      
                        <h2 class="author"><a href=""><?php echo $post_author; ?></h2> 
						<a href="post.php?p_id=<?php echo $post_id; ?>"><img class="post-img" src="images/<?php echo $post_image; ?>" alt="" /></a>
                        <p class="content"><?php echo $post_content; ?></p>
                        <button class="read-more-btn"><a href="post.php?p_id=<?php echo $post_id; ?>">Read more</a></button>
                        <hr>
                    </div>

            <?php  } } ?>

        </div>
</div>

<?php include "includes/footer.php"; ?>