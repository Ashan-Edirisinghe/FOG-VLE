@extends('layouts.app')

@section('title', 'Application Submitted - Graduate Studies')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="success-card">
                <div class="text-center">
                    <i class="fas fa-check-circle success-icon"></i>
                    <h2 class="success-title">Application Submitted Successfully!</h2>
                    <p class="success-subtitle">Thank you for submitting your application to the Faculty of Graduate Studies.</p>
                </div>
                
                <div class="success-details">
                    <h5>What happens next?</h5>
                    <ul>
                        <li>Your application will be reviewed by our admissions committee</li>
                        <li>You will receive an email confirmation within 24 hours</li>
                        <li>The review process typically takes 2-4 weeks</li>
                        <li>You will be notified of the decision via email</li>
                    </ul>
                </div>
                
                <div class="text-center mt-4">
                    <a href="{{ route('my.applications') }}" class="btn btn-primary me-3">View My Applications</a>
                    <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">Go to Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .success-card {
        background: white;
        border: 1px solid #e0e0e0;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        padding: 40px;
        margin-bottom: 30px;
    }
    
    .success-icon {
        font-size: 4rem;
        color: #28a745;
        margin-bottom: 20px;
    }
    
    .success-title {
        font-size: 1.8rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
    }
    
    .success-subtitle {
        color: #666;
        margin-bottom: 30px;
        font-size: 1.1rem;
    }
    
    .success-details {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        border-left: 4px solid #28a745;
        margin-bottom: 30px;
    }
    
    .success-details h5 {
        color: #333;
        margin-bottom: 15px;
        font-weight: bold;
    }
    
    .success-details ul {
        margin-bottom: 0;
    }
    
    .success-details li {
        margin-bottom: 10px;
        color: #555;
    }
</style>
@endpush
@endsection
