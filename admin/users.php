<?php
   include('header.php');
   if ($admin!=1) {
    header("location:index.php");
 }
   $sql = "SELECT * FROM user";
   $query = mysqli_query($config,$sql);
   $rows = mysqli_num_rows($query);
    ?>
<!-- Begin Page Content -->
<div class="container-fluid">
   <!-- Page Heading -->
   <h5 class="mb-2 text-gray-800">Users</h5>
   <!-- DataTales Example -->
   <div class="card shadow">
      <div class="card-header py-3 d-flex justify-content-between">
         <div>
            <a href="add_user.php">
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
                     <th>Username</th>
                     <th>Email</th>
                     <th>Role</th>
                     <th colspan="2">Action</th>
                  </tr>
               </thead>
             <tbody>
             <?php
             $count = 0;
             if($rows){
                while ($result=mysqli_fetch_assoc($query)) {
                   ?>
                   <tr>
                    <td><?= ++$count?></td>
                    <td><?= $result['username']?></td>
                    <td><?= $result['email']?></td>
                    <td><?php 
                    $role=$result['role'];
                    if($role==1){
                        echo "Admin";
                    }else {
                        echo "Co-Admin";
                    }?>
                    </td>
                    <td>
                    <form method="POST" action="" onsubmit="return confirm('Are You sure want to delete?')">
                        <input type="hidden" name="userID" value="<?=$result['user_id']?>">
                       <input type="submit" name="deletuser" value="Delete"  class="btn btn-sm btn-danger">
                     </form>
                    </td>
                   </tr>
                   <?php
                }
                
               
             }else {
                ?>
                <tr><td>NO RECORD FOUND</td></tr>
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
   if(isset($_POST['deletuser'])){
    $id = $_POST['userID'];
    $delete = "DELETE FROM user WHERE user_id ='$id'";
  $query = mysqli_query($config,$delete);
  if ( $query) {
  echo "User has been deleted successfully";
  }else{
    echo "Failed, Please try again";
  }
 }

    ?>