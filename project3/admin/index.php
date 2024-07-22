
<?php include '../helper/helper.php';?>
<?php include '../config/config.php';?>
<?php include '../lib/database.php';?>
<?php include 'inc/header.php';?>
<?php 
$conn=new database();

$q="SELECT * FROM `categories`";
$categories=$conn->seletmulti($q);
$q="SELECT `posts`.*,`categories`.`name` FROM `posts` 
     INNER JOIN  `categories` WHERE `posts`.`category`=`categories`.`id`";
$posts=$conn->seletmulti($q);


?>
<table class="table table-striped">
    <tr>
        <th>Post ID</th>
        <th>Post Title</th>
        <th>Category</th>
        <th>author</th>
        <th>Date</th>
    </tr>
    <?php   foreach($posts as $post) :?>
        <tr>
            <td><?php echo $post['id'];?></td>
            <td><a href="edit_post.php?id=<?php echo $post['id'];?>"><?php echo $post['title'];?></a></td>
            <td><?php echo $post['name'];?></td>
            <td><?php echo $post['author'];?></td>
            <td><?php echo format_date($post['date']);?></td>
        </tr>
    <?php endforeach ;?>    

</table>
<table class="table table-striped my-5">
    <tr>
        <th>Category ID</th>
        <th>Category Name</th>
        
    </tr>
    <?php foreach($categories as $category) :?>
    <tr>
        <td><?php echo $category['id'] ;?></td>
        <td><a href="edit_category.php?id=<?php echo $category['id'];?>"><?php echo $category['name'];?></a></td>

     </tr>
     <?php endforeach ;?>
</table>
            
 <?php include 'inc/footer.php'; ?>