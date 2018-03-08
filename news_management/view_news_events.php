<?php
session_start();
if(!isset($_SESSION["Admin"])) {
    header('Location: ../home.php');
}
include '../../connect-mysql.php';
include '../make_link.php';
if(isset($_POST["id"])) {
    $id = $_POST["id"];
    $sql = "SELECT * FROM `news_events` WHERE id = '$id'";
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
    <title>News & Events Management</title>
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
            <li class="breadcrumb-item active">News & Events Detail</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> News & Events Detail</div>
            <div class="card-body">
                <form action="news_events.php" method="post" enctype="multipart/form-data">
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
                         Topic:
                        </div>
                        <div class="col-md-10">
                            <p><?=$result["topic"];?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            Summary:
                        </div>
                        <div class="col-md-10">
                            <p><?=$result["summary"];?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            Content:
                        </div>
                        <div class="col-md-10">
                            <p><?=make_clickable($result["content"]);?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            Type:
                        </div>
                        <div class="col-md-10">
                            <p><?=$result["type"];?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            Picture:
                        </div>
                        <div class="col-md-10">
                            <img id="blah" src="<?= 'data:image/jpeg;base64,'.base64_encode( $result['pic'] ).'';?>"
                                 style="width: 30%" alt="your image" />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            Start Date:
                        </div>
                        <div class="col-md-10">
                            <?=$result["start_date"];?>
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
