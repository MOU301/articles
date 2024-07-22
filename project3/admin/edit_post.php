<?php include '../helper/helper.php';?>
<?php include '../config/config.php' ;?>
<?php include '../lib/database.php';?>
<?php include 'inc/header.php' ; ?>
<?php 
$conn=new database();
$q="SELECT * FROM `categories`";
$categories=$conn->seletmulti($q);
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id=$_GET['id'];    
    $q="SELECT * FROM `posts` WHERE `id`='$id'"; 
    $post=$conn->seletsignle($q);
   //  echo '<pre>';
   //  print_r($post);
   //  echo '<pre>';
}
if(isset($_POST['update'])){
   $title=filter_input(INPUT_POST,'title',FILTER_SANITIZE_STRING);
   $body=filter_input(INPUT_POST,'body',FILTER_SANITIZE_STRING);
   $category=filter_input(INPUT_POST,'category',FILTER_SANITIZE_STRING);
   $author=filter_input(INPUT_POST,'author',FILTER_SANITIZE_STRING);
   $tags=filter_input(INPUT_POST,'tags',FILTER_SANITIZE_STRING);
  //validation
   
   if(!empty($title) && !empty($body) && !empty($category) &&
    !empty($author) && !empty($tags)){
    $id=$_POST['id_post'];
    
        $q="UPDATE `posts` SET `title` = '$title',`body`='$body',`category`='$category',`author`='$author',`tags`='$tags' WHERE `id` = '$id'";
        if($conn->update($q)){
            $success='success update data ';
            header('Refresh:2; url=index.php');
        }
        else{
            $erorr="Retry update";
        
        }

    }
    else{
        echo "err";
        $error="fill the field please";
    }
}
    if(isset($_POST['delete'])){
        $name=filter_input(INPUT_POST,'name',FILTER_SANITIZE_STRING);
        $id=$_POST['id_post'];
            $q="DELETE FROM `posts` WHERE `id` = '$id'";
            if($conn->delete($q)){
                $success='success delete data ';
                header('Refresh:2; url=index.php');
            }
            else{
                $erorr="Retry update";
            
            }
        }
?>

<h3 class=<?php echo isset($error) ? "bg-warning":"";?>><?php echo $error ?? null ; ?></h3>
<h3 class=<?php echo isset($success) ? "bg-success":"";?>><?php echo $success ?? null ; ?></h3>
<form action="edit_post.php"  method="post">
    <div class="form-group mb-3">
        <label class="py-2">Post Title :</label>
        <input  type="text" class="form-control" name="title" value=<?php echo $post['title'] ?? null;?>>
        <input type="hidden" name='id_post' value=<?php echo $post['id'] ?? null;?>>
    </div>
    <div class="form-group mb-3">
        <label class="py-2" >Post Body :</label>
        <textarea name="body" class="form-control" ><?php echo $post['body'] ?? null;?></textarea>
    </div>
     <div class="from-group mb-3">
        <label  class="py-2">Category :</label>
        <select name="category" class="form-control">
                      <option value="0">choice the category</option>
               <?php foreach($categories as $category) :?> 
                  <?php if($category['id']==$post['category'])  :?>
                       <option value=<?php echo $category['id'];?> selected><?php echo $category['name'];?></option>
                  <?php endif; ?>
                       <option value=<?php echo $category['id'];?>><?php echo $category['name'];?></option>
               <?php endforeach ;?>
        </select>
     </div>
     <div class="form-group mb-3">
        <lable class="py-2">Author :</lable>
        <input type="text" name="author" class="form-control" value=<?php echo $post['author'] ?? null;?>>
     </div>
     <div class="form-group mb-3">
        <lable class="py-2">Tags :</lable>
        <input type="text" name="tags" class="form-control"value=<?php echo $post['tags'] ?? null;?>>
     </div>
     <div >
        <input type="submit" name="update" value="Update" class="btn btn-dark">
        <a href="index.php" class="btn btn-primary">Cancel</a>
        <input type="submit" name="delete" value="Delete" class="btn btn-danger">

     </div>

    
</form>
<?php include 'inc/footer.php' ; ?>