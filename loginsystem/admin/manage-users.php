<?php
session_start();
include 'dbconnection.php';
// checking session is valid for not 
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else{

// for deleting user
if (isset($_GET['id'])) {
    $adminid = $_GET['id'];
    $ret=$con->prepare("delete from users where id=?");
    $ret->bind_param("s",$adminid);
    $adminid = $_GET['id'];
    $ret->execute();
    $result=$ret->get_result();

}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Admin | Manage Users</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href="assets/css/style.css" rel="stylesheet">
    <link href="assets/css/style-responsive.css" rel="stylesheet">
</head>

<body>

<section id="container">
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
    <!-- navigation bar -->

    <aside>
        <div id="sidebar" class="nav-collapse ">
            <ul class="sidebar-menu" id="nav-accordion">

                <p class="centered"><a href="#"><img src="assets/img/volleyball.png" class="img-circle" width="60"></a></p>
                <h5 class="centered"><?php echo $_SESSION['login']; ?></h5>

                <li class="mt">
                    <a href="change-password.php">
                        <i class="fa fa-file"></i>
                        <span>Passwort ??ndern</span>
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
            <h3><i class="fa fa-angle-right"></i> Mitglieder bearbeiten</h3>
            <div class="row">


                <div class="col-md-12">
                    <div class="content-panel">
                        <table class="table table-striped table-advance table-hover">
                            <h4><i class="fa fa-angle-right"></i> Benutzerdetails </h4>
                            <hr>
                            <thead>
                            <tr>
                                <th>#</th>
                                <th class="hidden-phone"> Vorname</th>
                                <th> Nachname</th>
                                <th> Email</th>
                                <th>Kontaktnummer</th>
                                <th>Registrierungsdatum</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $ret = mysqli_query($con, "select * from users");
                            $cnt = 1;
                            while ($row = mysqli_fetch_array($ret)) {
                                ?>
                                <tr>
                                    <td><?php echo $cnt; ?></td>
                                    <td><?php echo $row['fname']; ?></td>
                                    <td><?php echo $row['lname']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['contactno']; ?></td>
                                    <td><?php echo $row['posting_date']; ?></td>
                                    <td>


                                        <a href="update-profile.php?uid=<?php echo $row['id']; ?>">
                                            <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                        </a>
                                        <a href="manage-users.php?id=<?php echo $row['id']; ?>">
                                            <button class="btn btn-danger btn-xs"
                                                    onClick="return confirm('M??chten Sie diesen Nutzer wirklich l??schen?');"><i
                                                        class="fa fa-trash-o "></i></button>
                                        </a>
                                    </td>
                                </tr>
                                <?php $cnt = $cnt + 1;
                            }

                            ?>


                            </tbody>
                        </table>
                    </div>
                    <br>
                    <a href="add-user.php">
                        <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                    </a>
                </div>
            </div>
        </section>
    </section
    >
</section>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/js/jquery.scrollTo.min.js"></script>
<script src="assets/js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="assets/js/common-scripts.js"></script>
<script>
    $(function () {
        $('select.styled').customSelect();
    });

</script>

</body>
</html>
<?php } ?>