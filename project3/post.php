<style><?php include 'settes/bootstrap/css/bootstrap.min.css' ;?></style>
<style><?php include 'settes/bootstrap/css/style.css' ;?></style>
<?php include 'helper/helper.php';?>
<?php include 'inc/header.php'; ?>
<?php include 'config/config.php' ;?>
<?php include 'lib/database.php';?>
<?php 

$conn=new database();  
$q="SELECT * FROM `categories`";
$categories=$conn->seletmulti($q);
$q="SELECT * FROM `posts`";
$posts=$conn->seletmulti($q);
?>      <?php foreach($posts as $post) :?>
 
            <div class="blog-post">
                <h3><?php echo $post['title'];?></h3>
                <p class="lead"><?php echo format_date($post['date']);?> by <a href="#"><?php echo $post['author'];?></a></p>
                <p><?php echo $post['body']; ?></p> 
            </div>
</div>
            <?php endforeach;?>
    <?php include 'inc/footer.php' ;?>