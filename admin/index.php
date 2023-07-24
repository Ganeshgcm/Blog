<?php
   include('header.php');
   if(isset($_SESSION['user_data'])){
      $user_id =$_SESSION['user_data'][0];
   }
    ?>
<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
   <h5 class="mb-2 text-gray-800">Blog Posts</h5>
   <!-- DataTales Example -->
   <div class="card shadow">
      <div class="card-header py-3 d-flex justify-content-between">
         <div>
            <a href="add_blog.php">
               <h6 class="font-weight-bold text-primary mt-2">Add New</h6>
            </a>
         </div>
         <div>
            <form class="navbar-search">
               <div class="input-group">
                  <input type="text" class="form-control bg-white border-0 small" placeholder="Search for...">
                  <div class="input-group-append">
                     <button class="btn btn-primary" type="button"> <i class="fa fa-search"></i> </button>
                  </div>
               </div>
            </form>
         </div>
      </div>
      <div class="card-body">
         <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
               <thead>
                  <tr>
                     <th>Sr.No</th>
                     <th>Title</th>
                     <th>Category</th>
                     <th>Author</th>
                     <th>Date</th>
                     <th colspan="2">Action</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                $sql = "SELECT * FROM blog LEFT JOIN categories ON blog.category=categories.cat_id LEFT JOIN user ON blog.
                author_id=user.user_id WHERE user_id='$user_id' ORDER BY blog.publish_date DESC";
                 $query = mysqli_query($config,$sql);
                 $data=mysqli_num_rows($query);
                 $count=0;
                 if( $data){
                  while ($row=mysqli_fetch_assoc($query)) {
                      ?>
                     <tr>
                     <td>  <?= ++$count?> </td>
                     <td>  <?=$row['blog_title']?> </td>
                     <td>  <?=$row['cat_name']?> </td>
                     <td>  <?=$row['username']?> </td>
                     <td>  <?=date('d-M-Y',strtotime($row['publish_date']))?> </td>
                     <td>
                     <a href="edit_blog.php?id=<?=$row['blog_id']?>" class="btn btn-sm btn-success">Edit</a>
                   
                      </td>
                      <td>
                        <form method="POST" action="" onsubmit="return confirm('Are You sure want to delete?')">
                        <input type="hidden" name="id" value="<?=$row['blog_id']?>">
                        <input type="hidden" name="blog_image" value="<?=$row['blog_image']?>">
                       <input type="submit" name="deletepost" value="Delete"  class="btn btn-sm btn-danger">
                     </form>
                      </td>
                     </tr>
                     <?php
                  }
                 }else{
                  ?>
                  <tr><td> NO Record Find</td></tr>
                  <?php
                 }
                  ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
<!-- /.container-fluid -->
</div>
<?php
   include('footer.php');
   if(isset($_POST['deletepost'])){
      $id = $_POST['id'];
      $image = "upload/".$_POST['blog_image'];
      $delete = "DELETE FROM blog WHERE blog_id ='$id'";
    $query = mysqli_query($config,$delete);
    if ( $query) {
      unlink($image);
    echo "Blog has been deleted successfully";
    header('location:index.php');
    }else{
      echo "Failed, Please try again";
    }
   }
   
    ?>