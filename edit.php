<?php
include("config.php");
$msg!='';

$cid=$_GET['cid'];



if(isset($_POST['update']))
{
  $name=$_POST['name'];
  $states=$_POST['states'];
    $pop=$_POST['pop'];
    
    if($name!='' && $states!='' && $pop!='')
    {
        $ins_qry=$conn->query("update tbl_country set cname='$name',cpop='$pop',cstate='$states' where cid='$cid'");
        
        if($ins_qry)
        {
            $msg="Country updated successfully";
		$tpy="success";
        }
        else
        {
             $msg="Can't update";
		$tpy="danger";
        }
        
        
    }else{
        $msg="Please fill All the Fields";
		$tpy="warning";
    }


}

$sel_qry=$conn->query("select * from tbl_country where cid='$cid'");

if($sel_qry->rowCount()==1)
{
    $sel_qry_arr=$sel_qry->fetch();
}
else{
    header("Location:dashboard.php");
}

if(!$_SESSION['name'])
{
  header("Location:index.php");
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

    <title>Add Country</title>
  </head>
  <body>
   <?php include("header.php"); ?>
    <div class="container">
		<div class="row">
			<div class="col-sm-12">
                <h1>Edit Country</h1>
                <?php
	if($msg!=''){
	?>
	<div class="alert alert-<?php echo $tpy;?>" role="alert">
  <?php echo $msg;?>
</div>
 <?php } ?>
			    <form method="post">
			        <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" value="<?=$sel_qry_arr['cname']?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">States</label>
    <input type="text" name="states" value="<?=$sel_qry_arr['cstate']?>" class="form-control" id="exampleInputPassword1" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Population</label>
    <input type="text" name="pop" value="<?=$sel_qry_arr['cpop']?>" class="form-control" id="exampleInputPassword1" required>
  </div>
  
  <button type="submit" name="update" class="btn btn-primary">Update Country</button>
	<a href="dashboard.php" class="btn btn-info">Back</a>		        
			    </form>
			</div>
		</div>
	</div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>

    
  </body>
</html>