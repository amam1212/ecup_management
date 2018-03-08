<?php
session_start();
if(!isset($_SESSION["Admin"])) {
    header('Location: ../home.php');
}
include '../connect-mysql.php';

if(isset($_POST["id"])) {
    $id = $_POST["id"];
    $sql = "SELECT * FROM `project` WHERE id = '$id'";
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
                <form action="faq.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-2">
                            ID:
                        </div>
                        <div class="col-md-10">
                            <p><?=$result["id"];?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                         Project Name:
                        </div>
                        <div class="col-md-10">
                            <p><?=$result["project_name"];?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            Detail:
                        </div>
                        <div class="col-md-10">
                            <p><?= nl2br(htmlspecialchars($result["detail"])); ?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            Duration:
                        </div>
                        <div class="col-md-10">
                            <p><?=$result["start_date"];?> to <?=$result["end_date"];?></p>
                        </div>
                    </div>

                    <div class="row pull-right" style="padding-bottom: 1%;padding-right: 1%">
                        <div class="col-md-12">
                            <form action="add_faq.php" method="post">
                                <input type="hidden" name="id" value="<?=$result["id"]?>"><br>
                                <input class="btn btn-success" type="submit" value="Create Activity">
                            </form>
                        </div>
                    </div>

<br><br><br><br>

                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th width="5%">ID</th>
                            <th width="40%">Activity Name</th>
                            <th width="10%">Date</th>
                            <th width="15%">Status</th>
                            <th width="5%">View</th>
                            <th width="5%">Edit</th>
                            <th width="5%">Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        if(isset($_POST["id"])) {
                            $id = $_POST["id"];
                            $sql = "SELECT * FROM `activity` WHERE project_id = '$id'";
                            $objQuery = mysqli_query($objCon, $sql);


                        }


                        while ($result = mysqli_fetch_array($objQuery, MYSQLI_ASSOC))
                        {
                            ?>
                            <!--                            <tr>-->
                            <tr id="<?php echo $result["id"] ?>">
                                <input type="hidden" name="id" value="<?=$result["id"];?>">
                                <td><?=$result["id"]?></td>
                                <td><?=$result["activity_name"]?></td>
                                <td><?=$result["date"]?></td>
                                <td><?=$result["status"]?></td>
                                <td>
                                    <form action="view_project.php" method="post">
                                        <input type="hidden" name="id" value="<?=$result["id"]?>"><br>
                                        <input class="btn btn-info" type="submit" value="View">
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
