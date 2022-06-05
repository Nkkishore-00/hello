<?php
include("config.php");
$msg!='';

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

    <title>Dashboard</title>
  </head>
  <body>
   <?php include("header.php"); ?>
    <div class="container">
		<div class="row">
			<div class="col-sm-12">
                <a href="add.php" class="btn btn-success">Add Country</a>
			    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Name</th>
      <th scope="col">States</th>
      <th scope="col">Population</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
      $sel_qry=$conn->query("select * from tbl_country");
      if($sel_qry->rowCount()>0)
      {
          $result=$sel_qry->fetchAll();
          foreach($result as $sel_qry_arr)
          {
              ?>
              <tr>
                  <td><?=$sel_qry_arr['cid']?></td>
                  <td><?=$sel_qry_arr['cname']?></td>
                  <td><?=$sel_qry_arr['cstate']?></td>
                  <td><?=$sel_qry_arr['cpop']?></td>
                  <td><a href="edit.php?cid=<?=$sel_qry_arr['cid']?>" class="btn btn-primary">Edit</a>
                  <?php 
                  if($_SESSION['utyp']==1){ ?>
                  <a href="delete.php?cid=<?=$sel_qry_arr['cid']?>" class="btn btn-danger">Delete</a>
                      <? } ?>
                  </td>
              </tr>
              <?
          }
      }
      ?>
  </tbody>
</table>
			</div>
			<div class="col-sm-12">
			    <div id="chart"></div>
			</div>
		</div>
	</div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="js/bootstrap.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/eligrey-classlist-js-polyfill@1.2.20171210/classList.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/findindex_polyfill_mdn"></script>
     <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
     
     <script>
      
        var options = {
          series: [{
          data: [
              <?php
              foreach($result as $sel_qry_arr)
          {
                  echo $sel_qry_arr['cpop'].",";
              }
              ?>
              ]
        }],
          chart: {
          type: 'bar',
          height: 380
        },
        plotOptions: {
          bar: {
            barHeight: '100%',
            distributed: true,
            horizontal: true,
            dataLabels: {
              position: 'bottom'
            },
          }
        },
        colors: ['#33b2df', '#546E7A', '#d4526e', '#13d8aa', '#A5978B', '#2b908f', '#f9a3a4', '#90ee7e',
          '#f48024', '#69d2e7'
        ],
        dataLabels: {
          enabled: true,
          textAnchor: 'start',
          style: {
            colors: ['#fff']
          },
          formatter: function (val, opt) {
            return opt.w.globals.labels[opt.dataPointIndex] + ":  " + val
          },
          offsetX: 0,
          dropShadow: {
            enabled: true
          }
        },
        stroke: {
          width: 1,
          colors: ['#fff']
        },
        xaxis: {
          categories: [<?php
              foreach($result as $sel_qry_arr)
          {
                  echo "'".$sel_qry_arr['cname']."',";
              }
              ?>
          ],
        },
        yaxis: {
          labels: {
            show: false
          }
        },
        title: {
            text: 'Custom DataLabels',
            align: 'center',
            floating: true
        },
        subtitle: {
            text: 'Category Names as DataLabels inside bars',
            align: 'center',
        },
        tooltip: {
          theme: 'dark',
          x: {
            show: false
          },
          y: {
            title: {
              formatter: function () {
                return ''
              }
            }
          }
        }
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
     </script>
  </body>
</html>