<?php
session_start();
if(!isset($_SESSION["Admin"])) {
    header('Location: ../home.php');
}
include '../connect-mysql.php';

    $sql = "SELECT AUTO_INCREMENT FROM information_schema.TABLES WHERE TABLE_SCHEMA = 'ecup_data_management' AND TABLE_NAME = 'project'";
    $objQuery = mysqli_query($objCon, $sql);
    $result = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create Project</title>
    <?php include '../headpart.html'?>
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<!-- Navigation-->
<?php include '../nav.html'?>

<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">Create Project</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i>Create Project</div>
            <div class="card-body">
                <form action="check_add.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-1">
                            ID:
                        </div>
                        <div class="col-md-11">
                            <?= $result["AUTO_INCREMENT"];?></div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-1">
                            Project Name:
                        </div>
                        <div class="col-md-11">
                            <input type="input" class="form-control" name="project">
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-1">
                            Detail:
                        </div>
                        <div class="col-md-11">
                            <textarea type="text" class="form-control" rows="3" name="detail"></textarea>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-1">
                            Start Date:
                        </div>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="start_date">
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-1">
                            End Date:
                        </div>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="end_date">
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <input class="btn btn-success" type="submit" value="Add">
                    </div>
            </div>
            </form>
        </div>
    </div>
</div>

<!-- /.content-wrapper-->
<footer class="sticky-footer">
    <div class="container">
        <div class="text-center">
            <small>Copyright © CMU.SPP Admin Website 2018</small>
        </div>
    </div>
</footer>
<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fa fa-angle-up"></i>
</a>

<?php include '../allscripts.html'?>
<script src="../js/upload_pic.js"></script>
</body>
</html>
