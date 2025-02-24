<?php
include('session.php');
include('security.php');
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<!-- Begin Page Content -->
<div class="container-fluid">


  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered User</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php
                
                            $query = "SELECT id FROM register ORDER BY id";  
                            $query_run = mysqli_query($connection, $query);
                            $row = mysqli_num_rows($query_run);
                            echo $row;
                        ?>
                    </div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Submitted Predictions</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                
                $query = "SELECT id FROM load_predict ORDER BY id";  
                $query_run = mysqli_query($connection, $query);
                $row = mysqli_num_rows($query_run);
                echo $row;
            ?>
            </div>
            </div>
            <div class="col-auto">
            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>

   
    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Content Row -->

  <?php
    // Include the chart.php file
    include 'graphs.php';
    ?>




  <?php
include('includes/scripts.php');
include('includes/footer.php');
?>