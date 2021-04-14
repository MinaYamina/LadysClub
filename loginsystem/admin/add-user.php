<?php
session_start();
include'dbconnection.php';
//Checking session is valid or not
if (strlen($_SESSION['id']==0)) {
    header('location:logout.php');
} else{

// for adding user info
    if(isset($_POST['Submit']))
    {
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $contact=$_POST['contact'];
        $email=$_POST['email'];
        $ret=$con -> prepare("insert into users (fname, lname, contactno, email) values (?,?,?,?)");
        $ret->bind_param("ssss", $fname, $lname, $contact, $email);
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

        <section id="main-content">
            <section class="wrapper">
                <h3><i class="fa fa-angle-right"></i>Neues Mitglied hinzufügen</h3>

                <div class="row">



                    <div class="col-md-12">
                        <div class="content-panel">
                            <p align="center" style="color:#F00;"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']=""; ?></p>
                            <form class="form-horizontal style-form" name="form1" method="post" action="" onSubmit="return valid();">
                                <p style="color:#F00"><?php echo $_SESSION['msg'];?><?php echo $_SESSION['msg']="";?></p>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Vorname </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="fname" value="" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Nachname</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="lname" value="" >
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Email </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="email" value="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 col-sm-2 control-label" style="padding-left:40px;">Kontaktnummer </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="contact" value="" >
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