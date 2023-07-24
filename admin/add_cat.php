<?php include('header.php'); ?>
<h5 class="mb-2 text-gray-800">Categories</h5>
<div class="row">
   <div class="col-xl-6 col-lg-5">
      <div class="card">
         <div class="card-header">
            <h6 class="font-weight-bold text-primary mt-2">Add category</h6>
         </div>
         <div class="card-body">
            <form method="POST" Action="">
               <div class="mb-3">
                  <input type="text" name="cat_name" placeholder="category name" class="form-control" required>
                </div>
               <div class="mb-3">
                  <input type="submit" name="add_cat" value="Add" class="btn btn-primary">
                  <a href="categories.php" class="btn btn-secondary">Back</a>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<?php include('footer.php');
// category add 
   if(isset($_POST['add_cat'])){
       $cat_name = mysqli_real_escape_string($config,$_POST['cat_name']);
       $select ="SELECT * FROM categories WHERE cat_name ='{$cat_name}'";
         $query = mysqli_query($config,$select);
         $data=mysqli_num_rows($query);
         if( $data){
           $msg = "Categoory Name already exist";
           $_SESSION['msg']=$msg;
           header('location:add_cat.php');
   
         }else{
           $sql ="INSERT INTO categories (cat_name) VALUES('$cat_name')";
           $quer =mysqli_query($config,$sql);
          
           if( $quer){
               $msg = "Categoory has been inserted";
               $_SESSION['msg']=$msg;
               header('location:add_cat.php');
       
             }else{
               $msg = "Failed, please try again";
               $_SESSION['msg']=$msg;
               header('location:add_cat.php');
             }
   
         }
   }
    ?>