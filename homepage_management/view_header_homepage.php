<?php
session_start();
if(!isset($_SESSION["Admin"])) {
    header('Location: ../home.php');
}
include '../../connect-mysql.php';

if(isset($_POST["id"])) {
    $id = $_POST["id"];
    $sql = "SELECT * FROM `header_homepage` WHERE id = '$id'";
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
    <title>Header Homepage Management</title>
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
            <li class="breadcrumb-item active">Header Homepage Detail</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Header Homepage Detail</div>
            <div class="card-body">
                <form action="header_homepage.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-2">
                            Rank:
                        </div>
                        <div class="col-md-10">
                            <p><?=$result["rank"];?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                         Topic:
                        </div>
                        <div class="col-md-10">
                            <p><?=$result["topic"];?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            Info:
                        </div>
                        <div class="col-md-10">
                            <p><?=$result["info"];?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Button Name:
                        </div>
                        <div class="col-md-10">
                            <p><?=$result["btn_name"];?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            Link:
                        </div>
                        <div class="col-md-10">
                            <p><?=$result["link"];?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Picture:
                        </div>
                        <div class="col-md-10">
                            <img id="blah" src="../../<?=$result['picture'];?>"
                                 style="width: 30%" alt="your image" />
                        </div>
                    </div>
                    <br>
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
