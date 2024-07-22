
<?php include '../helper/helper.php';?>
<?php include '../config/config.php';?>
<?php include '../lib/database.php';?>
<?php include 'inc/header.php' ; ?>
<?php 
$conn=new database();
if(isset($_POST['send'])){
    $category=filter_input(INPUT_POST,'name',FILTER_SANITIZE_STRING);
    if(!empty($category) || $category!=''){
        $q="INSERT INTO `categories` (`name`) VALUES ('$category')";
       if($conn->insert($q)){
        $success="register the date in the database ";
        header("Refresh:2;url=add_category.php"); 
       }
       else{
        $erorr="please retry enter the data";
       }
    }
    else{
        $error="fill the field please !!";
        header("Refresh:2;url=add_category.php"); 
    }
}
?>
<h3 class=<?php echo isset($error) ? "bg-warning":"";?>><?php echo $error ?? null ; ?></h3>
<h3 class=<?php echo isset($success) ? "bg-success":"";?>><?php echo $success ?? null ; ?></h3>

<form action="add_category.php"  method="post">
    <div class="form-group mb-3">
        <label class="py-2">Category Name :</label>
        <input  type="text" class="form-control" name="name" placeholder="Enter Category">
    </div>
     <div>
        <input type="submit" name="send" value="Send" class="btn btn-dark">
        <a href="index.php" class="btn btn-primary">Cancel</a>
     </div>

    
</form>
<?php include 'inc/footer.php' ; ?>