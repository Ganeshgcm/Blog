<?php include('header.php');
   // yhan se auther_id get he h jo login se bheja tha
    if (isset($_SESSION['user_data'])) {
      $author_id=$_SESSION['user_data'][0];
    }
    //category get
    $sql = "SELECT * FROM categories";
    $query = mysqli_query($config,$sql);
   ?>
<h5 class="mb-2 text-gray-800">BLOGS</h5>
<div class="row">
   <div class="col-xl-7 col-lg-5">
      <div class="card">
         <div class="card-header">
            <h6 class="font-weight-bold text-primary mt-2">Publish blogs/article</h6>
         </div>
         <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
               <div class="mb-3">
                  <input type="text" name="blog_title" placeholder="Title" class="form-control" required>
               </div>
               <div class="mb-3">
                  <lable>
                  Body/Description
                  <textarea class="form-control" placeholder="Body" name="blog_body" rows="2" id="blog" required></textarea>
               </div>
               <div class="mb-3">
                  <input type="file" name="blog_image" placeholder="Images" class="form-control" required>
               </div>
               <div class="mb-3">
                  <select class="form-control" name="category" required>
                     <option> Select category</option>
                     <?php while ($cats=mysqli_fetch_assoc($query)) { ?>
                     <option value="<?=$cats['cat_id'] ?>"> <?=$cats['cat_name'] ?> </option>
                     <?php } ?>
                  </select>
               </div>
               <div class="mb-3">
                  <input type="submit" name="add_blog" value="Add" class="btn btn-primary">
                   <a href="index.php" class="btn btn-secondary">Back</a>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<?php include('footer.php');
   if(isset($_POST['add_blog'])){
       $title = mysqli_real_escape_string($config,$_POST['blog_title']);
       $body = mysqli_real_escape_string($config,$_POST['blog_body']);
       $filename=$_FILES['blog_image']['name'];// getting file name
       $temp_name=$_FILES['blog_image']['tmp_name'];//geting file temp name
       $size=$_FILES['blog_image']['size'];//getting size of the file
       $image_ext=strtolower(pathinfo($filename,PATHINFO_EXTENSION));//getting image extansion
       $allow_type=['jpg','png','jpeg'];//here we get which type of image we want
       $destination="upload/".$filename;// path of the folder
       $category=mysqli_real_escape_string($config,$_POST['category']);
       if(in_array($image_ext, $allow_type)){
           if($size <=2000000){
               move_uploaded_file($temp_name,$destination);
               $sql ="INSERT INTO blog (blog_title,blog_body,blog_image,category,author_id)
                VALUES('$title',' $body',' $filename',' $category','$author_id')";
               $quer =mysqli_query($config,$sql);
               if($quer){
                   echo "data inserted";
               }else{
                   echo "dat not";
               }

           }else {
               echo "image size shuld not be grater than 2mb";
           }


       }else{
        echo "file type is not allowed";
       }


   }
    ?>
