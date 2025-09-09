@extends('layouts.app')

@section('title', 'My Applications - Graduate Studies')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="applications-card">
                <h2 class="applications-title">My Applications</h2>
                
                @if($applications->count() > 0)
                    <div class="applications-list">
                        @foreach($applications as $application)
                            <div class="application-item">
                                <div class="row">
                                    <div class="col-md-8">
                                        <h5 class="application-degree">{{ $application->intended_degree }}</h5>
                                        <p class="application-field">{{ $application->discipline_area }}</p>
                                        <small class="application-date text-muted">
                                            Submitted: {{ $application->created_at->format('M d, Y') }}
                                        </small>
                                    </div>
                                    <div class="col-md-4 text-md-end">
                                        <span class="status-badge status-{{ $application->status }}">
                                            {{ ucfirst(str_replace('_', ' ', $application->status)) }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="no-applications">
                        <i class="fas fa-inbox empty-icon"></i>
                        <h4>No Applications Yet</h4>
                        <p>You haven't submitted any applications yet.</p>
                        <a href="{{ route('application.form') }}" class="btn btn-primary">Submit New Application</a>
                    </div>
                @endif
                
                @if($applications->count() > 0)
                    <div class="text-center mt-4">
                        <a href="{{ route('application.form') }}" class="btn btn-outline-primary">Submit Another Application</a>
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary ms-2">Back to Dashboard</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .applications-card {
        background: white;
        border: 1px solid #e0e0e0;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        padding: 40px;
        margin-bottom: 30px;
    }
    
    .applications-title {
        font-size: 1.8rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 30px;
        border-bottom: 2px solid #1e3c72;
        padding-bottom: 10px;
    }
    
    .application-item {
        background: #f8f9fa;
        padding: 20px;
        border-radius: 8px;
        border-left: 4px solid #1e3c72;
        margin-bottom: 20px;
    }
    
    .application-degree {
        font-weight: bold;
        color: #333;
        margin-bottom: 5px;
    }
    
    .application-field {
        color: #666;
        margin-bottom: 10px;
    }
    
    .application-date {
        font-size: 0.9rem;
    }
    
    .status-badge {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 20px;
        font-size: 0.85rem;
        font-weight: 500;
        text-transform: uppercase;
    }
    
    .status-pending {
        background-color: #fff3cd;
        color: #856404;
        border: 1px solid #ffeaa7;
    }
    
    .status-under-review {
        background-color: #cce5ff;
        color: #004085;
        border: 1px solid #80bdff;
    }
    
    .status-accepted {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #a3d977;
    }
    
    .status-rejected {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f1aeb5;
    }
    
    .no-applications {
        text-align: center;
        padding: 60px 20px;
    }
    
    .empty-icon {
        font-size: 4rem;
        color: #ddd;
        margin-bottom: 20px;
    }
    
    .no-applications h4 {
        color: #666;
        margin-bottom: 10px;
    }
    
    .no-applications p {
        color: #999;
        margin-bottom: 30px;
    }
</style>
@endpush
@endsection
