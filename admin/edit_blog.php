<?php include('header.php');
 if (empty($blog_id)) {
   header("location:index.php");
  } 
   // yhan se auther_id get he h jo login se bheja tha
    if (isset($_SESSION['user_data'])) {
      $author_id=$_SESSION['user_data'][0];
    }
    //category get
    $sql = "SELECT * FROM categories";
    $query = mysqli_query($config,$sql);

    // get blog id
    $blog_id = $_GET['id'];
   
   // echo  $blog_id;
   $sql2 = "SELECT * FROM blog LEFT JOIN categories ON blog.category=categories.cat_id LEFT JOIN user ON blog.
   author_id=user.user_id WHERE blog_id='$blog_id'";
    $query2 = mysqli_query($config,$sql2);
    $result=mysqli_fetch_assoc($query2);
   ?>
<h5 class="mb-2 text-gray-800">BLOGS</h5>
<div class="row">
   <div class="col-xl-8 col-lg-6">
      <div class="card">
         <div class="card-header">
            <h6 class="font-weight-bold text-primary mt-2">Edit blogs/article</h6>
         </div>
         <div class="card-body">
            <form action="" method="post" enctype="multipart/form-data">
               <div class="mb-3">
                  <input type="text" name="blog_title" value="<?= $result['blog_title']?>" placeholder="Title" class="form-control" required>
               </div>
               <div class="mb-3">
                  <lable>
                  Body/Description
                  <textarea class="form-control" placeholder="Body" name="blog_body" value="" rows="2" id="blog" required>
                  <?= $result['blog_body']?>
                  </textarea>
               </div>
               <div class="mb-3">
                  <input type="file" name="blog_image"class="form-control">
                  <img src="upload/<?=$result['blog_image']?>"width="100px">

               </div>
               <div class="mb-3">
                  <select class="form-control" name="category" required>
                   
                     <?php
                      while ($cats=mysqli_fetch_assoc($query)) { ?>
                     <option value="<?=$cats['cat_id'] ?>"
                     <?= ($result['category']==$cats['cat_id'])?"selected":'';?>>
                     <?=$cats['cat_name'] ?> 
                  </option>
                     <?php } ?>
                  </select>
               </div>
               <div class="mb-3">
                  <input type="submit" name="update_blog" value="Update" class="btn btn-primary">
                  <a href="index.php" class="btn btn-secondary">Back</a>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<?php include('footer.php');
   if(isset($_POST['update_blog'])){
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
            $unlink="upload/".$result['blog_image'];
            unlink($unlink);
               move_uploaded_file($temp_name,$destination);
               $sql1 ="UPDATE blog SET blog_title='$title',blog_body='$body',blog_image='$filename',category=' $category',
               author_id='$author_id' WHERE blog_id='$blog_id'";
               $quer1 =mysqli_query($config,$sql1);
               if($quer1){
                   echo "data Updated";
               }else{
                   echo "dat not";
               }
   
           }else {
               echo "image size shuld not be grater than 2mb";
           }
          
   
       }else{
         $sql1 ="UPDATE blog SET blog_title='$title',blog_body='$body',category=' $category',
         author_id='$author_id' WHERE blog_id='$blog_id'";
         $quer1 =mysqli_query($config,$sql1);
         if($quer1){
             echo "data Updated";
         }else{
             echo "dat not";
         }
       }
   
   
   }
    ?>