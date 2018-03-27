<?php
session_start();
if(!isset($_SESSION["Admin"])) {
    header('Location: ../home.php');
}

$project_id = $_POST["project_id"];

include '../connect-mysql.php';

    $sql = "SELECT COUNT(project_id) AS count_project_id FROM project_activity_manager WHERE project_id = $project_id";
    $objQuery = mysqli_query($objCon, $sql);
    $result = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

$sql = "SELECT * FROM `project` WHERE `id` = $project_id";
$objQuery = mysqli_query($objCon, $sql);
$result2 = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create Activity</title>
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
            <li class="breadcrumb-item active">Create Activity</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Create Activity</div>
            <div class="card-body">
                <form action="check_add.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-1">
                            Project Name:
                        </div>
                        <div class="col-md-11">
                            <?= $result2["project_name"];?></div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-1">
                            Activity Number :
                        </div>
                        <div class="col-md-11">
                            <?= $result["count_project_id"]+1;?></div>
                    </div>
                    <br>


                    <input type="hidden" name="project_id" value="<?=$project_id?>">
                    <div class="row">
                        <div class="col-md-1">
                            Activity Name:
                        </div>
                        <div class="col-md-11">
                            <input type="input" class="form-control" name="activity_name">
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-1">
                            Date:
                        </div>
                        <div class="col-md-11">
                            <input type="date" class="form-control" rows="3" name="date">
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-1">
                            File:
                        </div>
                        <div class="col-md-11">
                            <input type="file" style="width: 40%" multiple="" class="form-control" name="files[]" ">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <input class="btn btn-secondary" type="submit" value="Add">
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
