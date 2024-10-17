<?php
include("config.php");
$msg='';
if(isset($_POST['reg']))
{
	$name=$_POST['name'];
	$email=$_POST['email'];
	$pwd=$_POST['pwd'];
	$cpwd=$_POST['cpwd'];

	if($name!='' && $email!='' && $pwd!='' && $cpwd!='')
	{
		if($pwd==$cpwd)
		{
			$epwd=md5($pwd);
			//echo "insert into tbl_user (name,email,pwd,code) values('$name','$email,'$epwd','$pwd')";
			$ins_qry=$conn->query("insert into tbl_user (name,email,pwd,code) values('$name','$email','$epwd','$pwd')");
			if($ins_qry)
			{
				$msg="Registration Success";
		    	$tpy="success";
			}
		}
		else
		{
			$msg="password & Comfirm Password must be same";
		    $tpy="danger";
		}
	}
	else
	{
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

    <title>Register</title>
  </head>
  <body>
    <div class="container">
		<div class="row">
			<div class="col-sm-4 offset-sm-4">
				<div class="card" style="margin-top:50px;">
  
  <div class="card-body">
    <h5 class="card-title text-center">Create an Account</h5>

	<?php
	if($msg!=''){
	?>
	<div class="alert alert-<?php echo $tpy;?>" role="alert">
  <?php echo $msg;?>
</div>
 <?php }?>

    <form method="post">
		<div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="pwd" class="form-control" id="exampleInputPassword1" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Confirm Password</label>
    <input type="password" name="cpwd" class="form-control" id="exampleInputPassword1" required>
  </div>
  
  <button type="submit" name="reg" class="btn btn-primary btn-block">Register</button>
  <p>Already Have Account? <a href="index.php">Login</a></p>
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