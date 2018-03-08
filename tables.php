<?php
session_start();
if(!isset($_SESSION["Admin"])) {
    header('Location: ../administrator/home.php');
}
include '../connect-mysql.php';

$sql = "SELECT * FROM `news_events` ORDER BY `start_date` DESC";
$objQuery = mysqli_query($objCon,$sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>News & Events Management</title>
    <?php include 'headpart.html'?>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <?php include 'nav.html'?>

  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Information</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i>News & Events Management</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                    <th width="5%">ID</th>
                    <th width="30%">Topic</th>
                    <th width="10%">Type</th>
                    <th width="20%">Picture</th>
                    <th width="15%">Start Date</th>
                    <th width="10%">Edit</th>
                    <th width="10%">Delete</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                    <th width="5%">ID</th>
                    <th width="30%">Topic</th>
                    <th width="10%">Type</th>
                    <th width="20%">Picture</th>
                    <th width="15%">Start Date</th>
                    <th width="10%">Edit</th>
                    <th width="10%">Delete</th>
                </tr>
              </tfoot>
              <tbody>
              <?php
              while ($result = mysqli_fetch_array($objQuery, MYSQLI_ASSOC))
              {
              ?>
                <tr>
                    <td><?=$result["id"]?></td>
                    <td><?=$result["topic"]?></td>
                    <td><?=$result["type"]?></td>
                    <td> <?= '<img style="width:100%" src="data:image/jpeg;base64,'.base64_encode( $result['pic'] ).'"/>';?></td>
                    <td><?=$result["start_date"]?></td>
                    <td>
                        <form action="edit_news_events.php" method="post">
                            <input type="hidden" name="id" value="<?=$result["id"]?>"><br>
                            <input type="submit" value="Edit">
                        </form></td>
                    <td>
                        <form action="check_delete.php" method="post">
                            <input type="hidden" name="id" value="<?=$result["id"]?>"><br>
                            <input type="submit" value="Delete">
                        </form></td>
                </tr>
                  <?php
              }
              ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="index.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

      <?php include 'allscripts.html'?>
  </div>
</body>

</html>
