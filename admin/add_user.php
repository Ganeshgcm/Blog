<?php include('header.php');
if(isset($_POST['add_user'])){
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $cpass = $_POST['c_pass'];
  $role = $_POST['role'];
 if(strlen($username)<4 || strlen($username)> 20){
    $error ="Username must be 4 char Long";
 }elseif(strlen($password)<4 ){
    $error ="Password must be 4 char Long";
 }elseif($password!=$cpass){
    $error ="Password dose not match";
 }else{
    $sql = "SELECT * FROM user WHERE email='$email'";
    $query=mysqli_query($config,$sql);
    $row=mysqli_num_rows($query);
    if ($row>=1){
       $error="Email already exist";
    }else {
       $sql2 = "INSERT INTO user (username,email,password,role)
       VALUES('$username',  '$email','$password','$role')";
      $quer =mysqli_query($config,$sql2);
      if($quer){
          echo "data inserted";
      }else{
          echo "data not";
      }

    }
 }
}
?>
<div class="container">
<div class="row">
<div class="col-md-5 m-auto bg-info p-4">
    <?php if(!empty($error)){
       echo $error;
       }?>
<form action="" method="Post">
    <p class="text-center">Create new Post</p>
<div class="mb-3">
<input type="text" name="username" placeholder="Username" class="form-control" required>
</div>
<div class="mb-3">
<input type="email" name="email" placeholder="Email" class="form-control" required>
</div>
<div class="mb-3">
<input type="password" name="password" placeholder="Password" class="form-control" required>
</div>
<div class="mb-3">
<input type="password" name="c_pass" placeholder="Confirm Password" class="form-control" required>
</div>
<div class="mb-3">
    <select class="form-control" name="role">
    <option> Select Role</option>
    <option>Admin</option>
    <option>Co-Admin</option>
</select>
</div>
<input type="submit" name="add_user" value="Create"  class="btn btn-sm btn-primary">

</form>
</div>

</div>
</div>

<?php include('footer.php');?>