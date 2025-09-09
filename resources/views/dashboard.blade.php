@extends('layouts.app')

@section('title', 'Dashboard - Graduate Studies')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="dashboard-header">
                <h2>Welcome, {{ auth()->user()->candidate ? auth()->user()->candidate->full_name : auth()->user()->name }}!</h2>
                <p class="text-muted">Manage your graduate studies applications</p>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="dashboard-card">
                <div class="card-icon">
                    <i class="fas fa-file-alt"></i>
                </div>
                <h5>Submit Application</h5>
                <p>Apply for graduate programs</p>
                <a href="{{ route('application.form') }}" class="btn btn-primary btn-sm">Apply Now</a>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="dashboard-card">
                <div class="card-icon">
                    <i class="fas fa-list"></i>
                </div>
                <h5>My Applications</h5>
                <p>View your submitted applications</p>
                <a href="{{ route('my.applications') }}" class="btn btn-outline-primary btn-sm">View Applications</a>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="dashboard-card">
                <div class="card-icon">
                    <i class="fas fa-user"></i>
                </div>
                <h5>Profile</h5>
                <p>Manage your profile information</p>
                <a href="{{ route('profile') }}" class="btn btn-outline-primary btn-sm">View Profile</a>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="dashboard-card">
                <div class="card-icon">
                    <i class="fas fa-calendar-check"></i>
                </div>
                <h5>Interview Status</h5>
                <p>Check your interview schedule</p>
                <a href="{{ route('interview.status') }}" class="btn btn-outline-primary btn-sm">Check Status</a>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="dashboard-card">
                <div class="card-icon">
                    <i class="fas fa-credit-card"></i>
                </div>
                <h5>Payment</h5>
                <p>Make application payments</p>
                <a href="{{ route('payment') }}" class="btn btn-outline-primary btn-sm">Make Payment</a>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-4 mb-4">
            <div class="dashboard-card">
                <div class="card-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h5>Timeline</h5>
                <p>View application timeline</p>
                <a href="{{ route('timeline') }}" class="btn btn-outline-primary btn-sm">View Timeline</a>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .dashboard-header {
        background: white;
        border: 1px solid #e0e0e0;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        padding: 30px;
        margin-bottom: 30px;
        text-align: center;
    }
    
    .dashboard-header h2 {
        color: #333;
        margin-bottom: 10px;
        font-weight: bold;
    }
    
    .dashboard-card {
        background: white;
        border: 1px solid #e0e0e0;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        padding: 30px;
        text-align: center;
        height: 100%;
        transition: transform 0.3s, box-shadow 0.3s;
    }
    
    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    
    .card-icon {
        background: linear-gradient(45deg, #1e3c72, #2a5298);
        color: white;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 1.5rem;
    }
    
    .dashboard-card h5 {
        color: #333;
        margin-bottom: 15px;
        font-weight: bold;
    }
    
    .dashboard-card p {
        color: #666;
        margin-bottom: 20px;
    }
</style>
@endpush
@endsection
