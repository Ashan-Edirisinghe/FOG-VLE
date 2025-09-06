@extends('layouts.app')

@section('title', 'Interview Status - Graduate Studies')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="status-container">
                <!-- Interview Date Card -->
                <div class="status-card">
                    <div class="status-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 class="status-title">Interview Date</h3>
                    <p class="status-description">2025.03.27 at 8:00 am in sabaragamuwa university</p>
                </div>
                
                <!-- Congratulations Card -->
                <div class="status-card congratulations-card">
                    <div class="status-icon">
                        <i class="fas fa-info-circle"></i>
                    </div>
                    <h3 class="status-title">congratulations</h3>
                    <p class="status-description">you are selected for the post graduate degree</p>
                    <button class="btn btn-join">Join</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .status-container {
        padding: 40px 0;
    }
    
    .status-card {
        background: white;
        border: 1px solid #e0e0e0;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        padding: 40px;
        margin-bottom: 30px;
        text-align: center;
        max-width: 500px;
        margin-left: auto;
        margin-right: auto;
    }
    
    .status-icon {
        width: 80px;
        height: 80px;
        background: #f8f9fa;
        border: 2px solid #e0e0e0;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 25px;
        font-size: 2rem;
        color: #666;
    }
    
    .status-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #333;
        margin-bottom: 15px;
        text-transform: capitalize;
    }
    
    .status-description {
        color: #666;
        font-size: 1rem;
        line-height: 1.5;
        margin-bottom: 25px;
    }
    
    .congratulations-card {
        border-color: #28a745;
    }
    
    .congratulations-card .status-icon {
        background: #e8f5e8;
        border-color: #28a745;
        color: #28a745;
    }
    
    .btn-join {
        background-color: #d0d0d0;
        border: none;
        border-radius: 8px;
        padding: 12px 30px;
        font-weight: 500;
        color: #555;
        font-size: 1rem;
        transition: background-color 0.3s, color 0.3s;
        text-transform: capitalize;
    }
    
    .btn-join:hover {
        background-color: #1e3c72;
        color: white;
    }
    
    /* Animation for status cards */
    .status-card {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeInUp 0.6s ease forwards;
    }
    
    .status-card:nth-child(2) {
        animation-delay: 0.3s;
    }
    
    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }
</style>
@endpush

@push('scripts')
<script>
    // Add click handler for Join button
    document.querySelector('.btn-join').addEventListener('click', function() {
        alert('Congratulations! Redirecting to enrollment page...');
        // You can redirect to enrollment page here
        // window.location.href = '/enrollment';
    });
</script>
@endpush
@endsection
