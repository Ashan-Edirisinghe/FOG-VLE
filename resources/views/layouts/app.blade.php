<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'Graduate Studies - Sabaragamuwa University of Sri Lanka')</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        
        .navbar-custom {
            background-color: #1e3c72;
            padding: 10px 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            border-bottom: 1px solid #2a5298;
        }
        
        .navbar-brand img {
            height: 50px;
            margin-right: 15px;
        }
        
        .navbar-brand {
            color: white !important;
            font-weight: bold;
            font-size: 1.2rem;
        }
        
        .navbar-nav .nav-link {
            color: white !important;
            font-weight: 500;
            margin: 0 15px;
            border-bottom: 2px solid transparent;
            transition: color 0.3s, border-bottom-color 0.3s;
        }
        
        .navbar-nav .nav-link:hover, .navbar-nav .nav-link.active {
            color: #ffd700 !important;
            border-bottom-color: #ffd700;
        }
        
        .main-content {
            padding: 50px 0;
            min-height: calc(100vh - 200px);
        }
        
        .card-custom {
            border: 1px solid #e0e0e0;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            background: white;
            padding: 40px;
            margin-bottom: 30px;
        }
        
        .form-control {
            border-radius: 8px;
            border: 1px solid #ccc;
            padding: 12px 15px;
            margin-bottom: 20px;
            transition: border-color 0.3s, box-shadow 0.3s;
        }
        
        .form-control:focus {
            border-color: #1e3c72;
            box-shadow: 0 0 0 0.2rem rgba(30, 60, 114, 0.2);
        }
        
        .btn-primary-custom {
            background-color: #d0d0d0;
            border: none;
            border-radius: 8px;
            padding: 12px 30px;
            font-weight: 600;
            color: #555;
            text-transform: none;
            font-size: 1rem;
            transition: background-color 0.3s, color 0.3s;
        }
        
        .btn-primary-custom:hover {
            background-color: #1e3c72;
            color: white;
        }
        
        .footer {
            background-color: #1e3c72;
            color: white;
            padding: 50px 0 30px;
            margin-top: 60px;
        }
        
        .footer h5 {
            color: white;
            font-weight: bold;
            margin-bottom: 20px;
            text-transform: uppercase;
            font-size: 1rem;
        }
        
        .footer a {
            color: #b0c4de;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer a:hover {
            color: white;
        }
        
        .copyright {
            background: #162a52;
            padding: 15px 0;
            text-align: center;
            font-size: 0.9rem;
            border-top: 1px solid #2a5298;
        }
        
        .profile-icon {
            width: 80px;
            height: 80px;
            background: #e9ecef;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 2rem;
            color: #adb5bd;
        }
        
        .top-nav-links {
            font-size: 0.9rem;
        }
        
        .top-nav-links a {
            color: white;
            text-decoration: none;
            margin-left: 15px;
        }
    </style>
    
    @stack('styles')
</head>
<body>
    <!-- Top Bar -->
    <div class="py-2" style="background-color: #1e3c72;">
        <div class="container d-flex justify-content-end align-items-center top-nav-links">
            <a href="#"><i class="fas fa-home me-1"></i> SUSL</a>
            <a href="#"><i class="fas fa-desktop me-1"></i> VLE</a>
        </div>
    </div>

    <!-- Header -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="/">
                    <img src="/img/logo.png" alt="SUSL Logo" onerror="this.style.display='none'">
                    <div>
                        <strong>Graduate Studies</strong><br>
                        <small>Sabaragamuwa University of Sri Lanka</small>
                    </div>
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('application.form') ? 'active' : '' }}" href="{{ route('application.form') }}">application-form</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('interview.status') ? 'active' : '' }}" href="{{ route('interview.status') }}">interview-status</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('payment') ? 'active' : '' }}" href="{{ route('payment') }}">payment</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('timeline') ? 'active' : '' }}" href="{{ route('timeline') }}">Timeline</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/">Welcome</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('profile') ? 'active' : '' }}" href="{{ route('profile') }}">Profile</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="main-content">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <h5>Contact Info</h5>
                    <p><i class="fas fa-map-marker-alt me-2"></i> Faculty of Graduate Studies<br>
                    Sabaragamuwa University of Sri Lanka,<br>
                    P.O. Box 02,<br>
                    Belihuloya - 70140,<br>
                    Sri Lanka.</p>
                    <p><i class="fas fa-phone me-2"></i> +94-45-2280042 (Tel./Fax.)</p>
                    <p><i class="fas fa-envelope me-2"></i> dean@fgs.sab.ac.lk</p>
                </div>
                
                <div class="col-md-3">
                    <h5>About Us</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="d-block py-1">Office of the Dean</a></li>
                        <li><a href="#" class="d-block py-1">Our Direction</a></li>
                        <li><a href="#" class="d-block py-1">Board of Graduate Studies</a></li>
                        <li><a href="#" class="d-block py-1">Prospectus 2017</a></li>
                    </ul>
                </div>
                
                <div class="col-md-3">
                    <h5>Academic</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="d-block py-1">PG Certificates</a></li>
                        <li><a href="#" class="d-block py-1">PG Diplomas</a></li>
                        <li><a href="#" class="d-block py-1">Masters</a></li>
                        <li><a href="#" class="d-block py-1">Research Higher Degrees</a></li>
                    </ul>
                </div>
                
                <div class="col-md-3">
                    <h5>Admissions</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="d-block py-1">Entry Qualifications</a></li>
                        <li><a href="#" class="d-block py-1">Application Procedure</a></li>
                        <li><a href="#" class="d-block py-1">Apply Now</a></li>
                        <li><a href="#" class="d-block py-1">Application Status</a></li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div class="copyright">
            <div class="container">
                © Copyright SUSL 2020. All Rights Reserved.
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    @stack('scripts')
</body>
</html>
