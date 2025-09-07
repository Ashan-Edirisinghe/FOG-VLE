<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Application Form - FGS-SUSL Graduate Admissions</title>
    <!-- Font Awesome -->
    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">-->
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="css/mdb.min.css" rel="stylesheet">
    <!-- Your custom styles (optional) -->
    <link href="css/style.css" rel="stylesheet">
    <style>
        .application-form-card {
            background: white;
            border: 1px solid #e0e0e0;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            padding: 40px;
            margin-bottom: 30px;
        }
        .form-title {
            font-size: 1.8rem;
            font-weight: bold;
            color: #333;
            margin-bottom: 10px;
            border-bottom: 2px solid #1e3c72;
            padding-bottom: 10px;
        }
        .form-subtitle {
            font-style: italic;
            color: #666;
            margin-bottom: 30px;
            font-size: 1rem;
        }
        .form-section {
            margin-bottom: 35px;
            padding: 20px;
            background: #f8f9fa;
            border-radius: 8px;
            border-left: 4px solid #1e3c72;
        }
        .section-title {
            font-weight: bold;
            color: #333;
            margin-bottom: 20px;
            font-size: 1.1rem;
        }
        .form-label {
            font-weight: 500;
            color: #333;
            margin-bottom: 8px;
        }
        .form-control {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 12px 15px;
            margin-bottom: 20px;
            transition: border-color 0.3s, box-shadow 0.3s;
            background: white;
        }
        .form-control:focus {
            border-color: #1e3c72;
            box-shadow: 0 0 0 0.2rem rgba(30, 60, 114, 0.2);
            outline: none;
        }
        .btn-submit {
            background-color: #d0d0d0;
            border: none;
            border-radius: 8px;
            padding: 12px 40px;
            font-weight: 500;
            color: #555;
            font-size: 1rem;
            transition: background-color 0.3s, color 0.3s;
            text-transform: lowercase;
        }
        .btn-submit:hover {
            background-color: #1e3c72;
            color: white;
        }
        .row {
            margin-bottom: 15px;
        }
        .row:last-child {
            margin-bottom: 0;
        }
        html { position: relative; min-height: 100%;}
        body { margin-bottom: 60px;}
        .footer { position: absolute; bottom: 0; width: 100%; height: 60px; background-color: #f5f5f5;}
        body > .container { padding: 60px 15px 0;}
        .container .text-muted { margin: 20px 0;}
        .footer > .container { padding-right: 15px; padding-left: 15px;}
        code { font-size: 80%;}
    </style>
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
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="application-form-card">
                <h2 class="form-title">Application Form</h2>
                <p class="form-subtitle">"Please fill in your details carefully."</p>
                
                <form method="POST" action="{{ route('application.submit') }}">
                    @csrf
                    
                    <!-- 1. Personal Information -->
                    <div class="form-section">
                        <h5 class="section-title">1. Personal Information</h5>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label for="full_name" class="form-label">Full Name:</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nic" class="form-label">NIC:</label>
                                <input type="text" class="form-control" id="nic" name="nic" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="col-md-6">
                                <label for="telephone" class="form-label">Telephone (Mobile):</label>
                                <input type="tel" class="form-control" id="telephone" name="telephone" required>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 2. Educational Qualifications -->
                    <div class="form-section">
                        <h5 class="section-title">2. Educational Qualifications</h5>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <label for="undergraduate_degree" class="form-label">Undergraduate Degree(s):</label>
                                <input type="text" class="form-control" id="undergraduate_degree" name="undergraduate_degree" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label for="university" class="form-label">University:</label>
                                <input type="text" class="form-control" id="university" name="university" required>
                            </div>
                            <div class="col-md-6">
                                <label for="year" class="form-label">Year:</label>
                                <input type="number" class="form-control" id="year" name="year" min="1950" max="2025" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label for="field" class="form-label">Field:</label>
                                <input type="text" class="form-control" id="field" name="field" required>
                            </div>
                            <div class="col-md-6">
                                <label for="gpa_class" class="form-label">GPA/Class:</label>
                                <input type="text" class="form-control" id="gpa_class" name="gpa_class" required>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 3. Proposed Programme of Study -->
                    <div class="form-section">
                        <h5 class="section-title">3. Proposed Programme of Study</h5>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <label for="intended_degree" class="form-label">Intended Degree(MPhil / PhD):</label>
                                <input type="text" class="form-control" id="intended_degree" name="intended_degree" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <label for="discipline_area" class="form-label">Discipline/Area of Research:</label>
                                <input type="text" class="form-control" id="discipline_area" name="discipline_area" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-submit">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</main>
<footer class="footer">
    <div class="container">
        <img src="img/logo.png" width="60" height="60">
        <small>© 2016 Faculty of Graduate Studies, Sabaragamuwa University of Sri Lanka</small>
    </div>
</footer>
<!-- SCRIPTS -->
<script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
<script type="text/javascript" src="js/tether.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/mdb.min.js"></script>
</body>
</html>