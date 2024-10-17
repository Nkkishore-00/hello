<?php
include("config.php");

$cid=$_GET['cid'];

$del_qry=$conn->query("delete from tbl_country where cid='$cid'");

if($del_qry)
{
    ?>
    <script>
        alert("Country deleted successfully!");
        window.location="dashboard.php";
</script>
    <?php
}

?>