<!DOCTYPE html>
<html lang="en">
<?php

session_start();
if(!isset($_SESSION["admin_user"])){
    header("location:index.html");

} else{
    $uname = $_SESSION['admin_user'];
}
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.min.css" rel="stylesheet">
  <style>

    .map-container{
overflow:hidden;
padding-bottom:56.25%;
position:relative;
height:0;
}
.map-container iframe{
left:0;
top:0;
height:100%;
width:100%;
position:absolute;
}
 #loader{
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('img/lg.flip-book-loader.gif') 50% 50% no-repeat rgb(249,249,249);
        opacity: 1;
    }
#loader{
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('img/lg.flip-book-loader.gif') 50% 50% no-repeat rgb(249,249,249);
        opacity: 1;
    }
  </style>

    <script src="jquery.min.js"></script>
<script type="text/javascript">
  $(window).on('load', function(){
    //you remove this timeout
    setTimeout(function(){
          $('#loader').fadeOut('slow');  
      });
      //remove the timeout
      //$('#loader').fadeOut('slow'); 
  });
</script>
</head>

<body class="grey lighten-3">

  <!--Main Navigation-->
  <header>

    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-light white scrolling-navbar">
      <div class="container-fluid">

        <!-- Brand -->
        <a class="navbar-brand waves-effect" href="#">
          <strong class="blue-text"></strong>
        </a>

        <!-- Collapse -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">

          <!-- Left -->
          <ul class="navbar-nav mr-auto">
          <!--   <li class="nav-item active">
              <a class="nav-link waves-effect" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="#">About
                MDB</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="#">Free
                download</a>
            </li>
            <li class="nav-item">
              <a class="nav-link waves-effect" href="#">Free
                tutorials</a>
            </li> -->
          </ul>
            <?php 

     require_once("include/connection.php");


               $id = mysqli_real_escape_string($conn,$_SESSION['admin_user']);


              $r = mysqli_query($conn,"SELECT * FROM admin_login where id = '$id'") or die (mysqli_error($con));

              $row = mysqli_fetch_array($r);

               $id=$row['admin_user'];
               // $fname=$row['fname'];
               // $lname=$row['lname'];

            ?>

          <!-- Right -->
          <ul class="navbar-nav nav-flex-icons">
                  <li style="margin-top: 10px;">Welcome!,</font> <?php echo ucwords(htmlentities($id)); ?></li>&nbsp;&nbsp;&nbsp;

            <li class="nav-item">
              <a href="logout.php" class="nav-link border border-light rounded waves-effect">
               <i class="far fa-user-circle"></i>SignOut
              </a>
            </li>
          </ul>

        </div>

      </div>
    </nav>
    <!-- Navbar -->
 <div id="loader"></div>
    <!-- Sidebar -->
    <div class="sidebar-fixed position-fixed">

      <a class="logo-wrapper waves-effect">
      
        <img src="data:image/png;base64,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" width="150px" height="200px;" class="img-fluid" alt="">
      </a>

      <div class="list-group list-group-flush">
        <a href="dashboard.php" class="list-group-item active waves-effect">
          <i class="fas fa-chart-pie mr-3"></i>Dashboard
        </a>
         <a href="#" class="list-group-item list-group-item-action waves-effect"  data-toggle="modal" data-target="#modalRegisterForm">
          <i class="fas fa-user mr-3"></i>Add Admin</a>
            <a href="view_admin.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-users"></i> View Admin</a>
        <a href="#" class="list-group-item list-group-item-action waves-effect" data-toggle="modal" data-target="#modalRegisterForm2">
          <i class="fas fa-user mr-3"></i>Add User</a>
           <a href="view_user.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-users"></i>  View User</a>
        <a href="add_document.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-file-medical"></i> Add Document</a>
        <a href="view_userfile.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-folder-open"></i> View User File</a>
            <a href="admin_log.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-chalkboard-teacher"></i> Admin logged</a>
              <a href="user_log.php" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-chalkboard-teacher"></i> User logged</a>
    <!--     <a href="#" class="list-group-item list-group-item-action waves-effect">
          <i class="fas fa-money-bill-alt mr-3"></i>Orders</a> -->
      </div>

    </div>
    <!-- Sidebar -->

  </header>
  <!--Add admin-->
   <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <form action="create_Admin.php" method="POST">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold"><i class="fas fa-user-plus"></i> Add Admin</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
           <div class="md-form mb-5">
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-name" name="name" class="form-control validate" required="">
          <label data-error="wrong" data-success="right" for="orangeForm-name">Your name</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="orangeForm-email" name="admin_user" class="form-control validate" required="">
          <label data-error="wrong" data-success="right" for="orangeForm-email">Your email</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="orangeForm-pass" name="admin_password" class="form-control validate" required="">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-pass" name="admin_status" value = "Admin" class="form-control validate" readonly="">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">User Status</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-info" name="reg">Sign up</button>
      </div>
    </div>
  </div>
</div>
</form>
<!--end modaladmin-->
  <!--Add user-->
   <div class="modal fade" id="modalRegisterForm2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <form action="create_user.php" method="POST">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold"><i class="fas fa-user-plus"></i> Add User Employee</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
           <div class="md-form mb-5">

        </div>
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-name" name="name" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-name">Your name</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-envelope prefix grey-text"></i>
          <input type="email" id="orangeForm-email" name="email_address" class="form-control validate" required="">
          <label data-error="wrong" data-success="right" for="orangeForm-email">Your email</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-lock prefix grey-text"></i>
          <input type="password" id="orangeForm-pass" name="user_password" class="form-control validate" required="">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Your password</label>
        </div>
         <div class="md-form mb-4">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-pass" name="user_status" value = "Employee" class="form-control validate" readonly="">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">User Status</label>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-info" name="reguser">Sign up</button>
      </div>
    </div>
  </div>
</div>
</form>
<!--end modaluser-->



  <!--Main layout-->
  <main class="pt-5 mx-lg-5">
    <div class="container-fluid mt-5">

      <!-- Heading -->
      <div class="card mb-4 wow fadeIn">

        <!--Card content-->
        <div class="card-body d-sm-flex justify-content-between">

          <h4 class="mb-2 mb-sm-0 pt-1">
            <a href="dashboard.php">Home Page</a>
            <span>/</span>
            <span>Dashboard</span>
          </h4>
<!-- 
          <form class="d-flex justify-content-center">
       
            <input type="search" placeholder="Type your query" aria-label="Search" class="form-control">
            <button class="btn btn-primary btn-sm my-0 p" type="submit">
              <i class="fas fa-search"></i>
            </button>

          </form> -->

        </div>

      </div>
      <!-- Heading -->

      <!--Grid row-->
      <div class="row wow fadeIn">

        <!--Grid column-->
        <div class="col-md-9 mb-4">

          <!--Card-->
          <div class="card">

            <!--Card content-->
            <div class="card-body">

              <?php
                    // $con  = mysqli_connect("localhost","root","","barchart");
                    //  if (!$con) {
                    //      # code...
                    //     echo "Problem in database connection! Contact administrator!" . mysqli_error();
                    //  }else{

                       require_once("include/connection.php");

                             $sql ="SELECT *,count(EMAIL) as count FROM upload_files group by EMAIL;";
                             $result = mysqli_query($conn,$sql);
                             $chart_data="";
                             while ($row = mysqli_fetch_array($result)) { 
                     
                                $name[]  = $row['EMAIL']  ;
                                $counts[] = $row['count'];
                            }
                     
                     
                     
             
                     
                    ?>
                <CENTER><h3 class="page-header" >Count Per Upload File  </h3></CENTER>  
      

              <canvas id="myChart"></canvas>

            </div>

          </div>
          <!--/.Card-->

        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-md-3 mb-4">

          <!--Card-->
          <div class="card mb-4">

            <!-- Card header -->
            <!-- <div class="card-header text-center">
              Pie chart
            </div> -->

            <!--Card content-->
            <!-- <div class="card-body">

              <canvas id="pieChart"></canvas>

            </div> -->

          </div>
          <!--/.Card-->

        
    <!--Copyright-->
   
    <!--/.Copyright-->

  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Initializations -->
  <script type="text/javascript">
    // Animations initialization
    new WOW().init();

  </script>

  <!-- Charts -->
  <script>
    // Line
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
      type: 'bar',
     data: {
            labels:<?php echo json_encode($name); ?>,
            datasets: [{
                      backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360", "#6ae27e", "#dc69e2", "#687be2", "#e28868", "#6c68e2", "#ab68e2", "#e268b7"],
                      // hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"],
                data:<?php echo json_encode($counts); ?>,
            }]
        },
      options: {
          legend: {
            display: false
          },
        scales: {
          yAxes: [{
            ticks: {
              beginAtZero: true
            }
          }]

        }
      }
    });



    //pie
    var ctxP = document.getElementById("pieChart").getContext('2d');
    var myPieChart = new Chart(ctxP, {
      type: 'pie',
      data: {
        labels: ["Red", "Green", "Yellow", "Grey", "Dark Grey"],
        datasets: [{
          data: [300, 50, 100, 40, 120],
          backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
          hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
        }]
      },
      options: {
        responsive: true,
        legend: false
      }
    });



  
  </script>
</body>
</html>
