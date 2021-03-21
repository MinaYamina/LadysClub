<?php
session_start();
include 'dbconnection.php';
if (strlen($_SESSION['id'] == 0)) {
    header('location:logout.php');
} else{

?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/heroic-features.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Welcome !</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="#"><?php echo $_SESSION['name']; ?></a>
                </li>
                <li>
                    <a href="page.php">Page</a>
                </li>
                <li>
                    <a href="logout.php">Logout</a>
                </li>

            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <header class="jumbotron hero-spacer">
        <h1> Hey <?php echo $_SESSION['name']; ?>!</h1>
        <p>Im Frühling 2021 veranstalten wir das Mixedturnier.
            Das Datum steht noch nicht fest. Um über die Ausschreibung informiert zu werden, schaue in unserer
            Eventliste nach.
        </p>
    </header>

    <hr>

</div>

<hr>

</div>

<section id="main-content" class="container">
    <section class="jumbotron hero-spacer">
        <h3><i class="fa fa-angle-right"></i>Aktive Mitglieder</h3>
        <div class="row">

            <div class="col-md-12">
                <div class="content-panel">
                    <table class="table table-striped table-advance table-hover">
                        <h4><i class="fa fa-angle-right"></i>Hier findes du Informationen über alle aktiven Mitglieder
                        </h4>
                        <hr>
                        <thead>
                        <tr>
                            <th>Sno.</th>
                            <th class="hidden-phone">First Name</th>
                            <th> Last Name</th>
                            <th> Email Id</th>
                            <th>Contact no.</th>
                            <th>Reg. Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $ret = mysqli_query($con, "select * from users");
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
                                </td>
                            </tr>
                            <?php $cnt = $cnt + 1;
                        } ?>
                        </tbody>
                    </table>
                    <p><a href="welcome.php" class="btn btn-primary btn-large">refresh </a>
                </div>
            </div>
        </div>
    </section>
    <section class="jumbotron hero-spacer">
        <h3><i class="fa fa-angle-right"></i>Eventliste</h3>
        <div class="row">

            <div class="col-md-12">
                <div class="content-panel">
                    <table class="table table-striped table-advance table-hover">
                        <h4><i class="fa fa-angle-right"></i>Hier findes du Informationen über alle aufkommenden Events
                        </h4>
                        <hr>
                        <thead>
                        <tr>
                            <th class="hidden-phone">Date</th>
                            <th> Time</th>
                            <th> Title</th>
                            <th> Description</th>
                            <th> Additional Information</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $ret = mysqli_query($con, "select * from users");
                        $cnt = 1;
                        while ($row = mysqli_fetch_array($ret)) {
                            ?>
                            <tr>
                                <td><?php echo $cnt; ?></td>
<!--                                <td>--><?php //echo $row['date']; ?><!--</td>-->
<!--                                <td>--><?php //echo $row['time']; ?><!--</td>-->
<!--                                <td>--><?php //echo $row['title']; ?><!--</td>-->
<!--                                <td>--><?php //echo $row['description']; ?><!--</td>-->
<!--                                <td>--><?php //echo $row['addinfo']; ?><!--</td>-->
                            </tr>
                            <?php $cnt = $cnt + 1;
                        } ?>
                        </tbody>
                    </table>
                    <p><a href="welcome.php" class="btn btn-primary btn-large">refresh </a>
                </div>
            </div>
        </div>
    </section>
</section>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>
<?php } ?>