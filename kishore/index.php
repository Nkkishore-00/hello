<?php
include("config.php");
$msg!='';

if($_SESSION['name'])
{
  header("Location:dashboard.php");
}

if(isset($_POST['login']))
{
  $email=$_POST['email'];
  $pwd=$_POST['pwd'];

  if($email!='' && $pwd!='')
  {
      $pwd=md5($pwd);
      $lg_qry=$conn->query("select * from tbl_user where email='$email' and pwd='$pwd'");
      if($lg_qry->rowCount()==0)
      {
          $lg_qry_arr=$lg_qry->fetch();
          $_SESSION['name']=$lg_qry_arr['name'];
          $_SESSION['utyp']=$lg_qry_arr['utyp'];
          header("Location:dashboard.php");
      }
      else
      {
        $msg="Email or pwd Incorrect";
        $tpy="danger";
      }


  }
  else{
    $msg="Please fill All the Fields";
    $tpy="warning";
  }
}


?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">

    <title>Login</title>
  </head>
  <body>
    <div class="container">
		<div class="row">
			<div class="col-sm-4 offset-sm-4">
				<div class="card" style="margin-top:50px;">
  
  <div class="card-body">
    <h5 class="card-title text-center">Login</h5>
    <?php
	if($msg!=''){
	?>
	<div class="alert alert-<?php echo $tpy;?>" role="alert">
  <?php echo $msg;?>
</div>
 <?php }?>
    <form method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="pwd" class="form-control" id="exampleInputPassword1" required>
  </div>
  
  <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
  <p>Create an Account <a href="register.php">Register Here</a>
</form>
  </div>
</div>
			</div>
		</div>
	</div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>

    
  </body>
</html>
