<?php
session_start();
if(!isset($_SESSION["Admin"])) {
    header('Location: ../administrator/home.php');
}
include '../../connect-mysql.php';

$sql = "SELECT * FROM `highlight_news` ORDER BY `rank` DESC";
$objQuery = mysqli_query($objCon,$sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Highlight News & Events Management</title>
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
            <li class="breadcrumb-item active"Highlight News & Events Management</li>
        </ol>

        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Highlight News & Events Management</div>
            <div class="card-body">
                <form action="check_highlight.php" method="post">
                <div class="row pull-right" style="padding-bottom: 1%;padding-right: 1%">
                    <div class="col-md-12">
                        <input class="btn btn-info" type="submit" value="Save">
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th width="5%">Rank</th>
                            <th width="25%">Topic</th>
                            <th width="10%">Type</th>
                            <th width="20%">Picture</th>
                            <th width="15%">News & Events ID</th>

                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        while ($result = mysqli_fetch_array($objQuery, MYSQLI_ASSOC)) {
                            $id = $result["news_events_id"];
                            $sql = "SELECT * FROM `news_events` WHERE id = $id";
                            $idQuery = mysqli_query($objCon,$sql);
                            $result_id = mysqli_fetch_array($idQuery, MYSQLI_ASSOC);
                            ?>
                            <tr id="<?=$result["id"] ?>">
                                <td><?=$result["rank"]?></td>
                                <td><?=$result_id["topic"]?></td>
                                <td><?=$result_id["type"]?></td>
                                <td> <?= '<img style="width:100%" src="data:image/jpeg;base64,'.base64_encode( $result_id['pic'] ).'"/>';?></td>
                                <td>
                                    <select class="form-control" name="highlight<?=$result["id"]?>">
                                        <option value="<?=$result_id["id"]?>"><?=$result_id["id"]?></option>
                                        <?php
                                        $sql = "SELECT * FROM `news_events`";
                                        $selectQuery = mysqli_query($objCon,$sql);
                                        while ($result_select = mysqli_fetch_array($selectQuery, MYSQLI_ASSOC)) {
                                        if($result_select["id"]!=$result_id["id"]) {
                                            ?>
                                            <option value="<?= $result_select["id"] ?>"><?= $result_select["id"] ?></option>
                                            <?php
                                        }
                                        }
                                        ?>

                                    </select>

                                </td>
                            </tr>
                            <?php
                        }
                        ?>

                        </tbody>
                    </table>

                </form>
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
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <?php include '../allscripts.html'?>
</div>

</body>

</html>
