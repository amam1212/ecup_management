<?php
session_start();
if(!isset($_SESSION["Admin"])) {
    header('Location: ../home.php');
}
include '../connect-mysql.php';

if(isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "SELECT * FROM `project_activity_manager` WHERE activity_id = '$id'";
    $objQuery = mysqli_query($objCon, $sql);
    $result = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
    $project_id =$result["project_id"];

    $sql = "SELECT * FROM `project` WHERE id = '$project_id'";
    $objQuery = mysqli_query($objCon, $sql);
    $project = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

    $sql = "SELECT * FROM `activity` WHERE id = '$id'";
    $objQuery = mysqli_query($objCon, $sql);
    $result = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);

}
else{
    header('Location: ../home.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Project Management</title>
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
            <li class="breadcrumb-item active">Project Detail</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i>Project Detail</div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-2">
                        Project ID:
                    </div>
                    <div class="col-md-10">
                        <p><?=$project["id"];?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        Project Name:
                    </div>
                    <div class="col-md-10">
                        <p><?=$project["project_name"];?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        Activity Name:
                    </div>
                    <div class="col-md-10">
                        <p><?=$result["activity_name"];?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        Status:
                    </div>
                    <div class="col-md-10">
                        <p><?=$result["status"];?></p>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        Date:
                    </div>
                    <div class="col-md-10">
                        <p><?=$result["date"];?></p>
                    </div>
                </div>

                <div class="row pull-right" style="padding-bottom: 1%;padding-right: 1%">
                    <div class="col-md-12">
                        <form action="../activity_management/download_all_file.php" method="post">
                            <input type="hidden" name="activity_id" value="<?=$id?>"><br>
                            <input class="btn btn-success" type="submit" value="Download All Files">
                        </form>
                    </div>
                </div>

                <br><br><br><br>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th width="5%">No.</th>
                        <th width="40%">File Name</th>
                        <th width="10%">Date</th>
                        <th width="5%">Download</th>
                        <th width="5%">Edit</th>
                        <th width="5%">Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(isset($_GET["id"])) {





                        $sql = "SELECT * FROM `activity_file` WHERE activity_id = '$id'";
                        $objQuery = mysqli_query($objCon, $sql);
                        $result = mysqli_fetch_array($objQuery, MYSQLI_ASSOC);
                        $objQuery = mysqli_query($objCon, $sql);

                    }





                    $number =1;

                    while ($result = mysqli_fetch_array($objQuery, MYSQLI_ASSOC))
                    {

                        $date = date_create($result["create_date"]);

                        $date = date_format($date, 'Y-m-d');

                        ?>

                        <tr id="<?php echo $result["id"] ?>">
                            <input type="hidden" name="id" value="<?=$result["id"];?>">
                            <td><?=$number;?></td>
                            <td><?=$result["f_name"];?></td>
                            <td><?=$date;?></td>
                            <td>
                                <form action="download.php" method="post">
                                    <input type="hidden" name="id" value="<?=$result["id"]?>"><br>
                                    <input class="btn btn-info" type="submit" value="Download">
                                </form>
                            </td>
                            <td>
                                <form action="edit_faq.php" method="post">
                                    <input type="hidden" name="id" value="<?=$result["id"]?>"><br>
                                    <input class="btn btn-warning" type="submit" value="Edit">
                                </form>
                            </td>
                            <td>
                                <br>
                                <button class="btn btn-danger remove">Delete</button>
                            </td>
                        </tr>
                        <?php
                        $number++;
                    }
                    ?>
                    </tbody>
                </table>

                <div class="row col-md-12">
                    <input class="btn btn-secondary" type="submit" value="Back">
                </div>
                </form>
            </div>
        </div>
    </div>
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

    <?php include '../allscripts.html'?>
</div>
</body>

</html>
