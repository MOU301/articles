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


if(isset($_GET['category'])){
            $id=$_GET['category'];
            $q="SELECT * FROM `posts` WHERE `category`='$id'";
      }
else{
    echo 'there is not category in the link ';
    $q="SELECT * FROM `posts`"; 
  }
  $posts=$conn->seletmulti($q);


?>   <?php if(!empty($posts)) : ?>
         <?php foreach($posts as $post) :?>
            <div class="blog-post">
                <h3><?php echo $post['title'];?></h3>
                <p class="lead"><?php echo format_date($post['date']);?> by <a href="#"><?php echo $post['author'];?></a></p>
                <p><?php echo shortentext($post['body'],150); ?></p> 
                <a class="btn read-more" href="post.php?id=<?php echo urldecode($post['id']) ;?>">read more</a>
            </div>
           
        <?php endforeach;?>
        <?php else : ?>
            <h3 class="bg-warning">There are not posts</h3>
        <?php endif ;?> 
        </div>   
    <?php include 'inc/footer.php' ;?>