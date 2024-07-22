<?php include '../helper/helper.php';?>
<?php include '../config/config.php' ;?>
<?php include '../lib/database.php';?>
<?php include 'inc/header.php' ; ?>
<?php
$conn=new database();
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id=$_GET['id'];    
    $q="SELECT * FROM `categories` WHERE `id`='$id'"; 
    $category=$conn->seletsignle($q);
}
if(isset($_POST['update'])){
    $name=filter_input(INPUT_POST,'name',FILTER_SANITIZE_STRING);
    $id=$_POST['id_category'];
    if(!empty($name)){
        $q="UPDATE `categories` SET `name` = '$name' WHERE `id` = '$id'";
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
        echo 'ok the button is delete';
        $name=filter_input(INPUT_POST,'name',FILTER_SANITIZE_STRING);
        $id=$_POST['id_category'];
            $q="DELETE FROM `categories` WHERE `id` = '$id'";
            if($conn->delete($q)){
                echo 'okk';
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

<form action="edit_category.php"  method="post">
    <div class="form-group mb-3">
        <label class="py-2">Category Name :</label>
        <input  type="text" class="form-control" name="name" value=<?php echo $category['name'] ?? null;?>>
        <input type="hidden" name='id_category' value=<?php echo $category["id"] ?? null ; ?>>
    </div>
     <div>
        <input type="submit" name="update" value="Update" class="btn btn-dark">
        <a href="index.php"  class="btn btn-primary">Cancel</a>
        <input type="submit" name="delete" value="Delete" class="btn btn-danger">
     </div>

    
</form>
<?php include 'inc/footer.php' ; ?>