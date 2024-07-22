
<?php include '../config/config.php' ;?>
<?php include '../lib/database.php' ;?>
<?php include 'inc/header.php' ; ?>
<?php 
 $conn=new database();
 $q="SELECT * FROM `categories`";
 $categories=$conn->seletmulti($q);
 if(isset($_POST['submit'])){
   //get the data from field
   $title=filter_input(INPUT_POST,'title',FILTER_SANITIZE_STRING);
   $body=filter_input(INPUT_POST,'body',FILTER_SANITIZE_STRING);
   $category=filter_input(INPUT_POST,'category',FILTER_SANITIZE_STRING);
   $author=filter_input(INPUT_POST,'author',FILTER_SANITIZE_STRING);
   $tags=filter_input(INPUT_POST,'tags',FILTER_SANITIZE_STRING);
  //validation
   
   if(!empty($title) && !empty($body) && !empty($category) &&
    !empty($author) && !empty($tags)){
     $q="INSERT INTO `posts` (`title`,`body`,`category`,`author`,`tags`) 
     VALUES ('$title','$body','$category','$author','$tags')";

      if($conn->insert($q)){
         $success="success the send to data base thanke you ";
         header("Refresh:3;url=add_post.php");
      }  
     else{
      $error='there is problem retry send the data';
     }

    }
    else{
      $error='fill the field please ';
    }
   }
?>
<h3 class=<?php echo isset($error) ? "bg-warning":"";?>><?php echo $error ?? null ; ?></h3>
<h3 class=<?php echo isset($success) ? "bg-success":"";?>><?php echo $success ?? null ; ?></h3>
<form action="add_post.php"  method="post">
    <div class="form-group mb-3">
        <label class="py-2">Post Title :</label>
        <input  type="text" class="form-control" name="title" placeholder="Enter Title">
    </div>
    <div class="form-group mb-3">
        <label class="py-2" >Post Body :</label>
        <textarea name="body" class="form-control"  placeholder="Enter the Text"></textarea>
    </div>
     <div class="from-group mb-3">
        <label  class="py-2">Category :</label>
        <select name="category" class="form-control">
         <option value="0">choice the category</option>
           <?php foreach($categories as $category) :?>
              <option value=<?php echo $category['id'];?>><?php echo $category['name'];?></option>
            <?php endforeach ;?>
        </select>
     </div>
     <div class="form-group mb-3">
        <lable class="py-2">Author :</lable>
        <input type="text" name="author" class="form-control" placeholder="Enter Author">
     </div>
     <div class="form-group mb-3">
        <lable class="py-2">Tags :</lable>
        <input type="text" name="tags" class="form-control" placeholder="Eenter Tags">
     </div>
     <div >
        <input type="submit" name="submit" value="Send" class="btn btn-dark">
        <a href="index.php" class="btn btn-primary">Cancel</a>
     </div>

    
</form>
<?php include 'inc/footer.php' ; ?>