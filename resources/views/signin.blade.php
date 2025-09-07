<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login - FGS-SUSL Graduate Admissions</title>
    <!-- Font Awesome -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">-->
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<header>
    <!--Navbar-->
    <nav class="navbar navbar-dark bg-primary">

        <!-- Collapse button-->
        <button class="navbar-toggler hidden-sm-up" type="button" data-toggle="collapse" data-target="#collapseEx2">
            <i class="fa fa-bars"></i>
        </button>

        <div class="container">

            <!--Collapse content-->
            <div class="collapse navbar-toggleable-xs" id="collapseEx2">
                <!--Navbar Brand-->
                <a class="navbar-brand" href="#">FGS-SUSL Graduate Admissions</a>
                <!--Links-->
                <ul class="nav navbar-nav">
                   <!-- <li class="nav-item active">
                        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>-->
                 <!--   <li class="nav-item">
                        <a class="nav-link" href="#">About</a>
                    </li>-->
                </ul>

            </div>
            <!--/.Collapse content-->

        </div>
   </nav>
    <!--/.Navbar-->
</header>
<br>
<main>

    <div class="container">
        <div class="row">
            <div class="col col-md-12">
            </div>
            <br>
            <div class="col-md-6"> 
                <!--Form-->
                <div class="card wow fadeInRight">
                    <div class="card-block">
                        <!--Header-->
                        <div class="text-xs-center">
                            <h1><!--<i class="fa fa-user"></i>--> Sign in</h1>
                            <hr>
                        </div>
                        <form action="/admissions/login.php" method="post">
                            <!--Body-->         
                            <div class="col-md-12">      
                                <div class="md-form">
                                    <input type="text" id="form2" class="form-control" name="stu_email" value="">
                                    <label for="form2">E-mail/Username <span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="md-form">
                                    <input type="password" id="form4" class="form-control" name="stu_password">
                                    <label for="form3">Password <span class="text-danger">*</span></label>
                                </div>
                            </div>
                            <div class="text-xs-center">
                                <hr><p><a href="/timeline">Sign in</a></p> 
                                <hr>
                            </div>
                            <div class="col-md-6"><p class="small text-xs-left"><a href="#" data-toggle="modal" data-target="#myModal">Forgot password?</a></p></div>
                            <div class="col-md-6"><p class="small text-xs-right"><a href="/signup">Create your account</a></p></div>
                            <!--/.Form-->
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            </div>
        </div> <!-- close .row -->
    </div> <!-- close .container -->
</main>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <!--Content-->
        <div class="modal-content">
            <!--Header-->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title" id="myModalLabel">Recovery Account</h5>
            </div>
            <form action="/admissions/login.php" method="post">
                <!--Body-->
                <div class="modal-body">
                    <div class="md-form">
                        <input type="text" name="recovery_email" class="form-control input-group-sm" value="">
                        <label for="form2">E-mail / Username <span class="text-danger">*</span></label>
                    </div>
                </div>
                <!--Footer-->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary btn-sm" name="recovery">Send recovery key</button>
                </div>
            </form>
        </div>
        <!--/.Content-->
    </div>
</div>
<!-- /.Live preview-->

    <!-- SCRIPTS -->

    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>

    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/tether.min.js"></script>

    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>
       
    <script>$('#myModal').on('shown.bs.modal', function () {
  $('#myInput').focus()
})</script>
   
<style>html {  position: relative;  min-height: 100%;}body {  /* Margin bottom by footer height */  margin-bottom: 60px;}.footer {  position: absolute;  bottom: 0;  width: 100%;  /* Set the fixed height of the footer here */  height: 60px;  background-color: #f5f5f5;}/* Custom page CSS-------------------------------------------------- *//* Not required for template or sticky footer method. */body > .container {  padding: 60px 15px 0;}.container .text-muted {  margin: 20px 0;}.footer > .container {  padding-right: 15px;  padding-left: 15px;}code {  font-size: 80%;}</style><footer class="footer"><div class="container"><img src="img/logo.png" width="60" height="60"> <small>© 2016 Faculty of Graduate Studies, Sabaragamuwa University of Sri Lanka</small></div></footer>         
</body>

</html>