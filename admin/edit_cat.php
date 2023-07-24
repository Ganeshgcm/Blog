<?php include('header.php'); 
   $id = $_GET['id'];
   if (empty($id)) {
    header("location:categories.php");
   }
   $sql ="SELECT * FROM categories WHERE cat_id='$id'";
   $query = mysqli_query($config,$sql);
   $row =mysqli_fetch_assoc($query);
   ?>
<h5 class="mb-2 text-gray-800">Categories</h5>
<div class="row">
   <div class="col-xl-6 col-lg-5">
      <div class="card">
         <div class="card-header">
            <h6 class="font-weight-bold text-primary mt-2">Edit category</h6>
         </div>
         <div class="card-body">
            <form method="POST" Action="">
               <div class="mb-3">
                  <input type="text" name="cat_name" placeholder="category name" value="<?=$row['cat_name'] ?>" class="form-control" required>
               </div>
               <div class="mb-3">
                  <input type="submit" name="update_cat" value="Add" class="btn btn-primary">
                  <a href="categories.php" class="btn btn-secondary">Back</a>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<?php include('footer.php');
   if(isset($_POST['update_cat'])){
       $cat_name =mysqli_real_escape_string($config,$_POST['cat_name']);
       $sql="UPDATE categories SET cat_name='{$cat_name}' WHERE cat_id='{$id}'";
       $update=mysqli_query($config,$sql);
       if ($update) {
           echo "Category edit successfully";
       }else{
           echo "Category Not edit";
       }
   
   
   }
   
    ?>