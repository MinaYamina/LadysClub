<?php
session_start();
include'dbconnection.php';
//Checking session is valid or not
if (strlen($_SESSION['id']==0)) {
    header('location:logout.php');
} else{

// for updating user info
    if(isset($_POST['Submit']))
    {
        $Event=$_POST['Event'];
        $Ort=$_POST['Ort'];
        $Datum=$_POST['Datum'];
        $eid=intval($_GET['eid']);
        $Uhrzeit=$_POST['Uhrzeit'];
        $Beschreibung=$_POST['Beschreibung'];
        $query=mysqli_query($con,"update events set Event='$Event' ,Ort='$Ort' , Datum='$Datum', Uhrzeit='$Uhrzeit', Beschreibung='$Beschreibung' where eid='$eid'");
        $_SESSION['msg']="Event Updated successfully";
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>Admin | Update Profile</title>
        <link href="assets/css/bootstrap.css" rel="stylesheet">
        <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="assets/css/style.css" rel="stylesheet">
        <link href="assets/css/style-responsive.css" rel="stylesheet">
    </head>

    <body>

    <section id="container" >
        <header class="header black-bg">
            <div class="sidebar-toggle-box">
                <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
            </div>
            <a href="#" class="logo"><b>Admin Dashboard</b></a>
            <div class="nav notify-row" id="top_menu">



                </ul>
            </div>
            <div class="top-menu">
                <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </header>
        <aside>
            <div id="sidebar"  class="nav-collapse ">
                <ul class="sidebar-menu" id="nav-accordion">

                    <p class="centered"><a href="#"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                    <h5 class="centered"><?php echo $_SESSION['login'];?></h5>

                    <li class="mt">
                        <a href="change-password.php">
                            <i class="fa fa-file"></i>
                            <span>Change Password</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a href="manage-users.php" >
                            <i class="fa fa-users"></i>
                            <span>Manage Users</span>
                        </a>

                    </li>

                    <li class="sub-menu">
                        <a href="manage-events.php" >
                            <i class="fa fa-users"></i>
                            <span>Manage Events</span>
                        </a>

                    </li>


                </ul>
            </div>
        </aside>
        <?php $ret=mysqli_query($con,"select * from events where eid='".$_GET['eid']."'");
        while($row=mysqli_fetch_array($ret))

        {?>
        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i> <?php echo $row['Event'];?>'s Information</h3>

                <div class="row">



                    <div class="col-md-12">
                        <div class="content-panel">
                            <p align="center" style="color:#F00;"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']=""; ?></p>
                            <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                                <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Event </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="Event" value="<?php echo $row['Event'];?>" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Place</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="Ort" value="<?php echo $row['Ort'];?>" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Date </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="Datum" value="<?php echo $row['Datum'];?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Time </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="Uhrzeit" value="<?php echo $row['Uhrzeit'];?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Description </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="Beschreibung" value="<?php echo $row['Beschreibung'];?>" >
                                    </div>
                                </div>
                                <div style="margin-left:100px;">
                                    <input type="submit" name="Submit" value="Update" class="btn btn-theme"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <?php } ?>
        </section></section>
    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="assets/js/jquery.scrollTo.min.js"></script>
    <script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="assets/js/common-scripts.js"></script>
    <script>
        $(function(){
            $('select.styled').customSelect();
        });

    </script>

    </body>
    </html>
<?php } ?>
