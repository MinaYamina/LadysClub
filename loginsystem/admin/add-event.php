<?php
session_start();
include'dbconnection.php';
//Checking session is valid or not
if (strlen($_SESSION['id']==0)) {
    header('location:logout.php');
} else{

// for adding event info
    if(isset($_POST['Submit']))
    {
        $event=$_POST['Event'];
        $ort=$_POST['Ort'];
        $datum=$_POST['Datum'];
        $eid=intval($_GET['eid']);
        $uhrzeit=$_POST['Uhrzeit'];
        $beschreibung=$_POST['Beschreibung'];
        $query=mysqli_query($con,"insert into events (Event, Ort, Datum, eid, Uhrzeit, Beschreibung ) values (?,?,?,?,?,?)");
        $ret->bind_param("ssssss", $event, $ort, $datum, $eid, $uhrzeit, $beschreibung);
        $event=mysqli_real_escape_string($con,$event);
        $ort=mysqli_real_escape_string($con,$ort);
        $datum=mysqli_real_escape_string($con,$datum);
        $eid=mysqli_real_escape_string($con,$eid);
        $uhrzeit=mysqli_real_escape_string($con,$uhrzeit);
        $beschreibung=mysqli_real_escape_string($con,$beschreibung);

        $ret->execute();
        $_SESSION['msg']="Profile Updated successfully";
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

                    <p class="centered"><a href="#"><img src="assets/img/volleyball.png" class="img-circle" width="60"></a></p>
                    <h5 class="centered"><?php echo $_SESSION['login'];?></h5>

                    <li class="mt">
                        <a href="change-password.php">
                            <i class="fa fa-file"></i>
                            <span>Passwort ändern</span>
                        </a>
                    </li>

                    <li class="sub-menu">
                        <a href="manage-users.php" >
                            <i class="fa fa-users"></i>
                            <span>Mitglieder bearbeiten</span>
                        </a>

                    </li>

                    <li class="sub-menu">
                        <a href="manage-events.php" >
                            <i class="fa fa-users"></i>
                            <span>Events bearbeiten</span>
                        </a>

                    </li>


                </ul>
            </div>
        </aside>

        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i>Neuen Event hinzufügen</h3>

                <div class="row">



                    <div class="col-md-12">
                        <div class="content-panel">
                            <p align="center" style="color:#F00;"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']=""; ?></p>
                            <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                                <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Event</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="Event" value="" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Ort </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="Ort" value="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Datum </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="Datum" value="" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Zeit </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="Uhrzeit" value="" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Beschreibung </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="Beschreibung" value="" >
                                    </div>
                                </div>


                                <div style="margin-left:25px;">
                                    <input type="submit" name="Submit" value="Add" class="btn btn-theme"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>

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