<!DOCTYPE html>
<html lang="en">
<?php
// include('Private_Dashboard/include/connection.php');
session_start();
if(!isset($_SESSION["email_address"])){
    header("location:../login.html");

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
  <link href="css/style.css" rel="stylesheet">


<!-- 
<link href="css/addons/datatables.min.css" rel="stylesheet">
<script href="js/addons/datatables.min.js" rel="stylesheet"></script>
<link href="css/addons/datatables-select.min.css" rel="stylesheet">
<script href="js/addons/datatables-select.min.js" rel="stylesheet"></script> -->


<!-- <link rel="stylesheet" id="font-awesome-style-css" href="http://phpflow.com/code/css/bootstrap3.min.css" type="text/css" media="all">
<script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.11.1.min.js"></script> -->
    <script src="js/jquery-1.8.3.min.js"></script>
    <link rel="stylesheet" type="text/css" href="media/css/dataTable.css" />
    <script src="media/js/jquery.dataTables.js" type="text/javascript"></script>
    <!-- end table-->
    <script type="text/javascript" charset="utf-8">
  $(document).ready(function(){
      $('#dtable').dataTable({
                "aLengthMenu": [[5, 10, 15, 25, 50, 100 , -1], [5, 10, 15, 25, 50, 100, "All"]],
                "iDisplayLength": 10
                //"destroy":true;
            });
  })
    </script>
    <style type="text/css">
      select[multiple], select[size] {
    height: auto;
    width: 20px;
}
.pull-right {
    float: right;
    margin: 2px !important;
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
 /*   #dtable{
 display: block;

  overflow-x: scroll;
  width: 600px;
    }*/



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

<body style="padding:0px; margin:0px; background-color:#fff;font-family:arial,helvetica,sans-serif,verdana,'Open Sans'">
  <?php 

     require_once("include/connection.php");


   $id = mysqli_real_escape_string($conn,$_SESSION['email_address']);


  $r = mysqli_query($conn,"SELECT * FROM login_user where id = '$id'") or die (mysqli_error($con));

  $row = mysqli_fetch_array($r);

   $id=$row['email_address'];
   // $fname=$row['fname'];
   // $lname=$row['lname'];

?>
  <!-- Start your project here-->
<!--Navbar -->
<nav class="mb-1 navbar navbar-expand-lg navbar-dark default-color fixed-top">
<a class="navbar-brand" href="index.html"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTY-wYT1HfEOe8rzMwYq9AyCL49SWSvdeoGzw&usqp=CAU" width="33px" height="33px"> <font style="color: black;">FILEPEDIA</font> </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
    aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
    <ul class="navbar-nav ml-auto">
      <!-- <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fab fa-facebook-f"></i> Facebook
          <span class="sr-only">(current)</span>
        </a>
      </li>-->
   
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">
           <font color="black">Welcome!,</font> <?php echo ucwords(htmlentities($id)); ?> <i class="fas fa-user-circle"></i> Login </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
          <a class="dropdown-item" href="history_log.php"> <i class="fas fa-chalkboard-teacher"></i> User Logged</a>
          <a class="dropdown-item" href="Logout.php"><i class="fas fa-sign-in-alt"></i> LogOut</a>

        </div>
      </li>
    </ul>
  </div>
</nav>
<br>
<!--/.Navbar -->
<br><Br><br>
<!-- Card -->
<div class="container">
  <div class="row">
     <div class="col-md-9">

<hr>
  <table id="dtable" class = "table table-striped" style="">
     <thead>

    <th>Filename</th>
    <th>FileSize</th>
    <th>Uploader</th>  
    <th>Status</th> 
     <th>Date/Time Upload</th>
     <th>Downloads</th>
    <th>Action</th>

</thead>
<tbody>

    
    <tr>
        <?php 
   
        require_once("include/connection.php");

      $query = mysqli_query($conn,"SELECT ID,NAME,SIZE,EMAIL,ADMIN_STATUS,TIMERS,DOWNLOAD FROM upload_files group by NAME DESC") or die (mysqli_error($conn));
      while($file=mysqli_fetch_array($query)){
         $id =  $file['ID'];
         $name =  $file['NAME'];
         $size =  $file['SIZE'];
         $uploads =  $file['EMAIL'];
          $status =  $file['ADMIN_STATUS'];
         $time =  $file['TIMERS'];
         $download =  $file['DOWNLOAD'];
    
      ?>
     
      <td width="17%"><?php echo  $name; ?></td>
      <td><?php echo floor($size / 1000) . ' KB'; ?></td>
      <td><?php echo $uploads; ?></td>
      <td><?php echo $status; ?></td>
      <td><?php echo $time; ?></td>
      <td><?php echo $download; ?></td>


        <td style=""><a href='downloads.php?file_id=<?php echo $id; ?>'><img src="img/698569-icon-57-document-download-128.png" width="30px" height="30px" title="Download File"></a> </td>
    </tr>
<?php } ?>
</tbody>
   </table>
    </div>
 


</script>


 <div class="col-md-3" style="border-top: 4px solid #17a2b8;border-radius: 4px;  box-shadow: 0px 1px 1px 0px  #6c757d;"><br>
  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
      aria-controls="pills-home" aria-selected="true">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
      aria-controls="pills-profile" aria-selected="false">About</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab"
      aria-controls="pills-contact" aria-selected="false">Contact</a>
  </li>
</ul>
<div class="tab-content pt-2 pl-1" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <img src="data:image/png;base64,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" class="rounded" alt="..."><hr>
    <div class="">
     
     <div class=""><p><b style="font-size: 1.1em">Full Name:</b>Praveen REP</p></div>
     <div class=""><p><b style="font-size: 1.1em">Position:</b>Engineer</p></div>

  </div>
  <hr>
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
   <h6 style="font-size: 1.1em">file management system (fMS)</h6><Hr>
  is a system (based on computer programs in the case of the management of digital documents) used to track, manage and store documents and reduce paper. Most are capable of keeping a record of the various versions created and modified by different users (history tracking).</div>
  <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab"><h6 style="font-size: 1.1em">Contact Number</h6><Hr><br><div class=""><p><b style="font-size: 1.1em">Cellphone:</b>(+91)7449033111</p></div><p><b style="font-size: 1.1em">Address :</b>Valasaravalkam</p>
</div><hr><br>
<!--   <div class="card">
  <ul class="list-group list-group-flush">
    <li class="list-group-item">Cras justo odio</li>
    <li class="list-group-item">Dapibus ac facilisis in</li>
    <li class="list-group-item">Vestibulum at eros</li>
  </ul>
</div><br> -->
   <!-- Card -->
<div class="card" style="border-top: 4px solid #17a2b8;border-radius: 4px;">

  <!-- Card image -->
  <div class="view overlay">

      <div class="mask rgba-white-slight"></div>
    </a>
  </div>

  <!-- Card content -->
  <div class="card-body">

    <!-- Title -->
    <h4 class="card-title">File Document</h4><hr>
    <!-- Text -->

    <ul>
      <li> <p>Ensuring changes and revisions are clearly identified</p></li>
      <li> <p>Ensuring that documents remain legible and identifiable</p></li>
      <li> <p>Preventing “unintended” use of obsolete documents</p></li>
    </ul>
    <!-- Button -->
<!--     <a href="#" class="btn btn-primary">Button</a> -->

  </div>

</div>
<!-- Card -->

 </div>
</div>
</div>


<!-- Card -->
  <!-- /Start your project here-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script type="text/javascript" src="js/jquery-3.4.0.min.js"></script>

  <script type="text/javascript" src="js/popper.min.js"></script>

  <script type="text/javascript" src="js/bootstrap.min.js"></script>

  <script type="text/javascript" src="js/mdb.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.9/css/jquery.dataTables.min.css"/>   
<script type="text/javascript" src="https://cdn.datatables.net/1.10.9/js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/1.0.3/css/dataTables.responsive.css">
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/1.0.3/js/dataTables.responsive.js"></script>

</body>
</html>
