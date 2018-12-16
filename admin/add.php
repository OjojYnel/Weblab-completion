<?php
include 'config.php';
session_start();
if(!isset($_SESSION['username'])){
header('location: login.php'); 
}
?>

<?php
include 'add-equipment-action.php'; 
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="au theme template">
  <meta name="author" content="Hau Nguyen">
  <meta name="keywords" content="au theme template">

  <!-- Title Page-->
  <title>Dashboard</title>

  <!-- Fontfaces CSS-->
  <link href="css/font-face.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
  <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
  <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

  <!-- Bootstrap CSS-->
  <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

  <!-- Vendor CSS-->
  <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
  <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
  <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
  <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
  <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
  <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
  <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

  <!-- Main CSS-->
  <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
  <div class="page-wrapper">
<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block">

<!-- WEBLAB LOGO -->
    <div class="logo">
        <a href="index.php">
        <h4>DASHBOARD</h4>
        </a>
    </div>
    <div class="menu-sidebar__content js-scrollbar1">
        <nav class="navbar-sidebar">
            <ul class="list-unstyled navbar__list">
                <li>
                    <a class="js-arrow" href="#">
                        <i class="fas fa-chart-bar"></i>Services</a>
                        <ul class="list-unstyled navbar__sub-list js-sub-list">
                         <li>
                            <a href="View.php">View Equipments</a>
                        </li>
                        <li>
                            <a href="Add.php">Post Equipments</a>
                        </li>
                    </ul>
                </li>               
                <li>
                <a class="js-arrow" href="#">                         
                        <i class="fas fa-table"></i>Transactions</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list">
                                 <li>
                                    <a href="ctransaction.php">Completed Transactions</a>
                                </li>
                                <li>
                                    <a href="otransaction.php">Ongoing Transactions</a>
                                </li>
                                <li>
                                    <a href="ptransaction.php">Pending Transactions</a>
                                </li>
                                <li>
                                    <a href="dtransaction.php">Denied Transactions</a>
                                </li>
                    </ul>
                    </li>   
                        </ul>
                    </nav>
                </div>
            </aside>
          <!-- END MENU SIDEBAR-->

          <!-- PAGE CONTAINER-->
          <div class="page-container">
            <!-- HEADER DESKTOP-->
        <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <form>
                            <iframe src="http://free.timeanddate.com/clock/i6cof2h4/n145/fn8/fs20/ftb/pa10/tt0/tm1/td1/th2/tb1" frameborder="0" width="453" height="43"></iframe>
                            </form>
                            <div class="header-button">     
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="images/icon/avatar-01.jpg" alt="adminsample">
                                        </div>
                                        <div class="content">
                                        <a class="js-acc-btn"> Welcome <?php echo $_SESSION['username'] ?>! </a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="images/icon/avatar-01.jpg" alt="adminsample">
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a><?php echo $_SESSION['username'] ?></a>
                                                    </h5>
                                                   
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                            <div class="account-dropdown__footer">
                                                <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- MAIN CONTENT-->
            <div class="main-content">
              <div class="section__content section__content--p30">
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="overview-wrap">
                        <h2 class="title-1">Construction Equipments</h2>
                        <br>
                        <br>
                        <br>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="card border border-secondary">
                        <div class="card-header bg-danger">
                         <strong class="card-title text-light">Add Equipments</strong>
                       </div>
                       <form action="add-equipment-action.php" method="post" enctype="multipart/form-data">
                         <div class="card-body">                                                  
                           <div class="row form-group">
                             <div class="col-9">
                               <input type="text" class="form-control" name="icode"  required placeholder="Enter Item Code">
                               <br>
                               <input type="text" class="form-control" name="ename"  required placeholder="Enter Equipment Name">
                               <br>
                               <select name="category" class="form-control" data-parsley-required="true">
                               <option value="0">Choose Category</option> 
                                        <option value="Wheel Loaders">Wheel Loaders</option> 
                                        <option value="Loader Backhoes"> Loader Backhoes</option> 
                                        <option value="Dozers"> Dozers</option> 
                                        <option value="Skid Steers"> Skid Steers</option> 
                                        <option value="Cranes"> Cranes</option> 
                                        <option value="Compactors"> Compactors</option> 
                                        <option value="Excavators"> Excavators</option> 
                                        <option value="Asphalt Paving"> Asphalt Paving</option> 
                                </select>
                                <br>
                                <div class="col col-md-12">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-rub"></i>
                                                        </div>
                                                        <input type="number" id="input3-group1" name="price" required placeholder="Enter Price" class="form-control">
                                                        <div class="input-group-addon">.00
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                   <div class="col col-md-12">
                                                    <div class="input-group">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-rub"></i>
                                                        </div>
                                                        <input type="number" id="input3-group1" name="qty" required placeholder="Enter Quantity" class="form-control">
                                                        <div class="input-group-addon">.00
                                                        </div> 
                                                    </div>
                                                </div>
                                                </div>
                                                
                              <div class="col col-md-12">
                              <br>
                                  <input type="hidden" name="size" value="1000000">
                                  <div class="input-group">
                                  <input type="file" name="image">
                                  </div>
                                  <br>
                                  <div class="input-group">
                                  <textarea class="form-control" name="desc" id="" cols="40" rows="4" placeholder="Enter image description"></textarea>
                                  </div>
                                  <br>
                                  <button name="upload" class="btn btn-danger">
                                <i class="zmdi zmdi-plus"></i>Add Item</button>
                              </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>  
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<div class="row">
  <div class="col-md-12">
    <div class="copyright">
      <p>Copyright © 2018 Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
    </div>
  </div>
</div>
</div>
</div>
</div>


<!-- END MAIN CONTENT-->
<!-- END PAGE CONTAINER-->

<!-- Jquery JS-->
<script src="vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="vendor/bootstrap-4.1/popper.min.js"></script>
<script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="vendor/slick/slick.min.js">
</script>
<script src="vendor/wow/wow.min.js"></script>
<script src="vendor/animsition/animsition.min.js"></script>
<script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="vendor/circle-progress/circle-progress.min.js"></script>
<script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="vendor/chartjs/Chart.bundle.min.js"></script>
<script src="vendor/select2/select2.min.js">
</script>

<!-- Main JS-->
<script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
