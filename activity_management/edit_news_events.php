<?php
session_start();
if(!isset($_SESSION["Admin"])) {
    header('Location: ../home.php');
}
include '../../connect-mysql.php';

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
            <li class="breadcrumb-item active">Edit News & Events</li>
        </ol>
        <!-- Example DataTables Card-->
        <div class="card mb-3">
            <div class="card-header">
                <i class="fa fa-table"></i> Edit News & Events</div>
            <div class="card-body">
                <form action="check_edit.php" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-1">
                            ID:
                        </div>
                        <div class="col-md-11">
                            <?=$result["id"];?><br><input type="hidden" name="id" value="<?=$result["id"];?>">
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-1">
                            Topic:
                        </div>
                        <div class="col-md-11">
                            <input type="input" class="form-control" name="topic" value="<?=$result["topic"];?>">
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-1">
                            Summary:
                        </div>
                        <div class="col-md-11">
                            <textarea type="text" class="form-control" rows="3" name="summary"><?=$result["summary"];?></textarea>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-1">
                            Content:
                        </div>
                        <div class="col-md-11">
                            <textarea type="text" class="form-control" rows="6" name="content"><?=$result["content"];?></textarea>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-1">
                            Type:
                        </div>
                        <div class="col-md-11">
                            <select class="form-control" name="type">
                                <option value="<?=$result["type"]?>"><?=$result["type"]?></option>
                                <option value="<?php
                                if ($result["type"]=="NEWS"){
                                    $option = "EVENTS";
                                    echo "EVENTS";
                                }
                                else{
                                    $option = "NEWS";
                                    echo "NEWS";
                                }
                                ?>"><?=$option?></option>
                            </select>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-2">
                            Start Date:
                        </div>
                        <div class="col-md-10">
                            <input type="date" class="form-control" name="date" value="<?=$result["start_date"];?>">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-2">
                            Picture :
                        </div>
                        <div class="col-md-10">
                            <img id="blah" src="<?= 'data:image/jpeg;base64,'.base64_encode( $result['pic'] ).'';?>"
                                 style="width: 40%" alt="your image" />
                            <input type="file" style="width: 40%" class="form-control" name="pic" onchange="readURL(this)">
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <input class="btn btn-secondary" type="submit" value="Edit">
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
</div>
</body>

</html>
