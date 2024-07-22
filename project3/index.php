
<?php include 'helper/helper.php';?>
<?php include 'config/config.php' ;?>
<?php include 'lib/database.php';?>
<?php include 'inc/header.php'; ?>
<?php 
$conn=new database();  
$q="SELECT * FROM `categories`";
$categories=$conn->seletmulti($q);
$q="SELECT * FROM `posts`";
$posts=$conn->seletmulti($q);
?>
<div class="row mt-5"> 
<div class="col-sm-8">     
<?php foreach($posts as $post) :?>
 
            <div class="blog-post">
                <h3><?php echo $post['title'];?></h3>
                <p class="lead"><?php echo format_date($post['date']);?> by <a href="#"><?php echo $post['author'];?></a></p>
                <p><?php echo shortentext($post['body'],150); ?></p> 
                <a class="btn read-more" href="posts.php?id=<?php echo urldecode($post['id']) ;?>">read more</a>
            </div>

            <?php endforeach;?>
    <?php include 'inc/footer.php' ;?>