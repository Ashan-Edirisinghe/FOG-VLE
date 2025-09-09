
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sign Up - FGS-SUSL Graduate Admissions</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
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
<div class="col-md-12">
</div>  
 <br>
<div class="col-md-6">  
  <form action="{{ route('signup.submit') }}" method="post">  
    @csrf
    <!--Form-->
    <div class="card wow fadeInRight">
        <div class="card-block">
            <!--Header-->
            <div class="text-xs-center">
                <h1><!--<i class="fa fa-user"></i>--> Create your account</h1>
                <hr>
            </div>
            
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            
            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            
            <!--Body-->            
      <div class="col-md-12">      
            <div class="md-form">
                <input type="text" id="form2" class="form-control" name="stu_email" value="">
                <label for="form2">E-mail <span class="text-danger">*</span></label>
            </div>
            </div>
<div class="col-md-12">
            <div class="md-form">
                <input type="password" id="form4" class="form-control" name="stu_password">
                <label for="form3">Create a password <span class="text-danger">*</span></label>
            </div>
            </div>
            <div class="col-md-12">
            <div class="md-form">
                <input type="password" id="form4" class="form-control" name="stu_password_cnf" value="">
                <label for="form4">Confirm your password <span class="text-danger">*</span></label>
            </div>
            </div>
<div class="text-xs-center">
<button type="submit" class="btn btn-primary" style="color: #fff;">Create your account</button>
                <hr><p><a href="{{ route('login') }}">Sign in</a></p>                
            </div>
        </div>
    </div>
    <!--/.Form-->
<!--/Second column-->
</form>
</div>
<!--Second column-->
<div class="col-md-6">
<h3>How to apply</h3>
<p class="text-primary">Step 1: Create your account</p>
<small>
<p class="text-xs-left" style="background-color:none;">Use your current e-mail address. Minimum password length is 6 characters. Be sure to use a strong password. Use a mix of different types of characters to make the password stronger, e.g. letters, numbers and symbols.</p></small>
<p class="text-primary">Step 2: Verify your account and complete profile</p>
<small><p>Please make sure not to log out without completing this step, as the status of your account would remain in-active if you do not. As a result, you will not be able to sign in again using your current e-mail address.</p></small>
<p class="text-primary">Step 3: Download the application and other forms as necessary</p>
<p class="text-primary">Step 4: Complete and upload required documents</p>
<p class="text-primary">Step 5: Verify and submit your application through declaration</p>
<small><p class="text-xs-left" style="background-color:none; padding:5px;">If you have any queries concerning the application process, please contact the Coordinator/Chairperson of the respective programme/board of study you are applying to.</p></small>
</div>
            </div>
        </div>
        <!--/.First row-->
</main>
    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="js/tether.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="js/mdb.min.js"></script>       

<style>html {  position: relative;  min-height: 100%;}body {  /* Margin bottom by footer height */  margin-bottom: 60px;}.footer {  position: absolute;  bottom: 0;  width: 100%;  /* Set the fixed height of the footer here */  height: 60px;  background-color: #f5f5f5;}/* Custom page CSS-------------------------------------------------- *//* Not required for template or sticky footer method. */body > .container {  padding: 60px 15px 0;}.container .text-muted {  margin: 20px 0;}.footer > .container {  padding-right: 15px;  padding-left: 15px;}code {  font-size: 80%;}</style><footer class="footer"><div class="container"><img src="img/logo.png" width="60" height="60"> <small>© 2016 Faculty of Graduate Studies, Sabaragamuwa University of Sri Lanka</small></div></footer>   </body>
</html>