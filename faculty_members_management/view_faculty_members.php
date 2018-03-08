<?php
session_start();
if(!isset($_SESSION["Admin"])) {
    header('Location: ../home.php');
}
include '../../connect-mysql.php';

if(isset($_POST["id"])) {
    $id = $_POST["id"];
    $sql = "SELECT * FROM `faculty_members` WHERE id = '$id'";
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
    <title>Faculty Members Management</title>
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
            <li class="breadcrumb-item active">Detail Faculty Members</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i>Detail Faculty Members</div>
            <div class="card-body">
                <form action="faculty_members.php" method="post" enctype="multipart/form-data">
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
                         First Name:
                        </div>
                        <div class="col-md-10">
                            <p><?=$result["firstname"];?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            Last Name:
                        </div>
                        <div class="col-md-10">
                            <p><?=$result["lastname"];?></p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-2">
                            Position:
                        </div>
                        <div class="col-md-10">
                            <p><?=$result["position"];?></p>
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
