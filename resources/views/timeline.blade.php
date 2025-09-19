<?php
use App\Http\Controllers\TimeController;
use App\Http\Controllers\TimelineController;
?>
@extends('layouts.app')

@section('title', 'Timeline - Graduate Studies')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Left Side - Timeline -->
        <div class="col-lg-4">
            <div class="timeline-container">
                <h2 class="timeline-title">Timeline</h2>
                @php
                    $timelineController = new TimelineController();
                    $currentPhase = $timelineController->currentPhase;

                  
                     
                    // You can now use $timelineData in your Blade template
                @endphp
                {{ $currentPhase }}   {{ $timelineController->timeline[$currentPhase]['name'] }} 
                
                <div class="timeline-wrapper">
                    <div class="timeline-item {{ $currentPhase >= 0 ? 'active' : '' }}" data-phase="0">
                        <div class="timeline-circle {{ $currentPhase >= 0 ? 'active' : '' }}"></div>
                        <div class="timeline-content">
                            <button class="timeline-btn {{ $currentPhase >= 0 ? 'active' : '' }}" onclick="selectPhase(0)">
                                Assigning Supervisors
                            </button>
                        </div>
                    </div>
                    
                    <div class="timeline-item {{ $currentPhase >= 1 ? 'active' : '' }}" data-phase="1">
                        <div class="timeline-circle {{ $currentPhase >= 1 ? 'active' : '' }}"></div>
                        <div class="timeline-content">
                            <button class="timeline-btn {{ $currentPhase >= 1 ? 'active' : '' }}" onclick="selectPhase(1)">
                                1 Semester
                            </button>
                        </div>
                    </div>
                    
                    <div class="timeline-item {{ $currentPhase >= 2 ? 'active' : '' }}" data-phase="2">
                        <div class="timeline-circle {{ $currentPhase >= 2 ? 'active' : '' }}"></div>
                        <div class="timeline-content">
                            <button class="timeline-btn {{ $currentPhase >= 2 ? 'active' : '' }}" onclick="selectPhase(2)">
                                2 Semester
                            </button>
                        </div>
                    </div>
                    
                    <div class="timeline-item {{ $currentPhase >= 3 ? 'active' : '' }}" data-phase="3">
                        <div class="timeline-circle {{ $currentPhase >= 3 ? 'active' : '' }}"></div>
                        <div class="timeline-content">
                            <button class="timeline-btn {{ $currentPhase >= 3 ? 'active' : '' }}" onclick="selectPhase(3)">
                                Viva
                            </button>
                        </div>
                    </div>
                    
                    <div class="timeline-item {{ $currentPhase >= 4 ? 'active' : '' }}" data-phase="4">
                        <div class="timeline-circle {{ $currentPhase >= 4 ? 'active' : '' }}"></div>
                        <div class="timeline-content">
                            <button class="timeline-btn {{ $currentPhase >= 4 ? 'active' : '' }}" onclick="selectPhase(4)">
                                Final thesis
                            </button>
                        </div>
                    </div>
                    
                    <div class="timeline-item {{ $currentPhase >= 5 ? 'active' : '' }}" data-phase="5">
                        <div class="timeline-circle {{ $currentPhase >= 5 ? 'active' : '' }}"></div>
                        <div class="timeline-content">
                            <button class="timeline-btn {{ $currentPhase >= 5 ? 'active' : '' }}" onclick="selectPhase(5)">
                                Waiting For Degree
                            </button>
                        </div>
                    </div>
                    
                    <div class="timeline-item" data-phase="6">
                        <div class="timeline-circle"></div>
                        <div class="timeline-content">
                            <button class="timeline-btn" onclick="selectPhase(6)">
                                Completed
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Right Side - Event Details -->
        <div class="col-lg-8">
            <!-- Event Header -->
            <div class="event-header">
                <h2 id="event-name">Event Name</h2>
            </div>
            
            <!-- Message Board -->
            <div class="message-board">
                <h3 id="main-heading">message board</h3>
                
                <!-- Document Upload Messages -->
                <div class="message-item" id="payment-slip-msg">
                    <div class="message-header">
                        <span>Upload your payment slip PDF file</span>
                        <button class="btn-close" onclick="closeMessage('payment-slip-msg')">&times;</button>
                    </div>
                    <div class="message-body">Document need to be uploaded</div>
                    <button class="btn-message">Submit</button>
                </div>
                
                <div class="message-item" id="evaluation-form-msg">
                    <div class="message-header">
                        <span>Upload your evaluation form (PDF file)</span>
                        <button class="btn-close" onclick="closeMessage('evaluation-form-msg')">&times;</button>
                    </div>
                    <div class="message-body">Document need to be uploaded</div>
                    <button class="btn-message">Submit</button>
                </div>
            </div>
            
            <!-- Status Badge -->
            <div class="status-container">
                <span class="status-label">Complete status :</span>
                <span class="status-badge" id="status-badge">Due</span>
            </div>
            
            <!-- Countdown Section -->
            <div class="countdown-section">
                <div class="countdown-box">
                    <h4 id="process-countdown-title">Process Countdown</h4>
                    <div id="clockdiv">
                        <div>
                            <span class="days">364</span>
                            <div class="smalltext">Days</div>
                        </div>
                        <div>
                            <span class="hours">23</span>
                            <div class="smalltext">Hours</div>
                        </div>
                        <div>
                            <span class="minutes">58</span>
                            <div class="smalltext">Minutes</div>
                        </div>
                        <div>
                            <span class="seconds">21</span>
                            <div class="smalltext">Seconds</div>
                        </div>
                    </div>
                </div>

                <div class="countdown-box">
                    @php
                        // Import the controller class
                        // Call the countdown function
                        $degreeCountdown = (new  TimeController())->countdown();
                    @endphp
                    <h4>Degree Countdown</h4>
                    <div id="clockdiv2">
                        <div class="countdown-item">
                            <span class="years">{{ $degreeCountdown['years'] ?? '0' }}</span>
                            <div class="smalltext">Years</div>
                        </div>
                        <div class="countdown-item">
                            <span class="months">{{ $degreeCountdown['months'] ?? '0' }}</span>
                            <div class="smalltext">Months</div>
                        </div>
                        <div class="countdown-item">
                            <span class="days">{{ $degreeCountdown['days'] ?? '0' }}</span>
                            <div class="smalltext">Days</div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .container-fluid {
        padding: 20px;
        background-color: #f8f9fa;
        min-height: 100vh;
    }
    
    /* Timeline Styles */
    .timeline-container {
        background: white;
        border-radius: 10px;
        padding: 30px 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        height: fit-content;
    }
    
    .timeline-title {
        font-size: 24px;
        font-weight: 600;
        color: #333;
        margin-bottom: 30px;
        text-align: center;
    }
    
    .timeline-wrapper {
        position: relative;
        padding-left: 40px;
    }
    
    .timeline-wrapper::before {
        content: '';
        position: absolute;
        left: 15px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #e9ecef;
    }
    
    .timeline-item {
        position: relative;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
    }
    
    .timeline-circle {
        width: 32px;
        height: 32px;
        border-radius: 50%;
        position: absolute;
        left: -55px;
        background: #dee2e6;
        border: 3px solid #fff;
        box-shadow: 0 0 0 2px #dee2e6;
        z-index: 2;
    }
    
    .timeline-circle.active {
        background: #007bff;
        box-shadow: 0 0 0 2px #007bff;
    }
    
    .timeline-btn {
        background: #6c757d;
        color: white;
        border: none;
        padding: 12px 20px;
        border-radius: 20px;
        font-size: 14px;
        cursor: pointer;
        transition: all 0.3s ease;
        min-width: 180px;
        text-align: center;
    }
    
    .timeline-btn:hover {
        background: #5a6268;
        transform: translateY(-1px);
    }
    
    .timeline-btn.active {
        background: #007bff;
        color: white;
    }
    
    /* Event Header */
    .event-header {
        background: white;
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    #event-name {
        font-size: 28px;
        font-weight: 600;
        color: #333;
        margin: 0;
    }
    
    /* Message Board */
    .message-board {
        background: white;
        border-radius: 10px;
        padding: 25px;
        margin-bottom: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    #main-heading {
        font-size: 20px;
        font-weight: 600;
        color: #333;
        margin-bottom: 20px;
    }
    
    .message-item {
        background: #f8f9fa;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
        border-left: 4px solid #007bff;
    }
    
    .message-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 8px;
    }
    
    .message-header span {
        font-weight: 600;
        color: #333;
        font-size: 14px;
    }
    
    .btn-close {
        background: none;
        border: none;
        font-size: 18px;
        color: #6c757d;
        cursor: pointer;
        padding: 0;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .btn-close:hover {
        color: #495057;
    }
    
    .message-body {
        color: #6c757d;
        font-size: 13px;
        margin-bottom: 10px;
    }
    
    .btn-message {
        background: #333;
        color: white;
        border: none;
        padding: 6px 12px;
        border-radius: 4px;
        font-size: 12px;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    
    .btn-message:hover {
        background: #495057;
    }
    
    /* Status Badge */
    .status-container {
        background: white;
        border-radius: 10px;
        padding: 15px 25px;
        margin-bottom: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        display: flex;
        align-items: center;
        gap: 10px;
    }
    
    .status-label {
        font-size: 14px;
        color: #333;
        font-weight: 500;
    }
    
    .status-badge {
        background: #ffc107;
        color: #333;
        padding: 4px 12px;
        border-radius: 12px;
        font-size: 12px;
        font-weight: 600;
    }
    
    /* Countdown Section */
    .countdown-section {
        display: flex;
        gap: 20px;
    }
    
    .countdown-box {
        flex: 1;
        background: white;
        border-radius: 10px;
        padding: 25px;
        text-align: center;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }
    
    .countdown-box h4 {
        font-size: 16px;
        font-weight: 600;
        color: #333;
        margin: 0 0 20px 0;
    }
    
    #clockdiv, #clockdiv2 {
        display: flex;
        justify-content: center;
        gap: 10px;
        font-family: 'Arial', sans-serif;
    }
    
    #clockdiv > div, #clockdiv2 > div {
        background: #007bff;
        color: white;
        padding: 10px;
        border-radius: 8px;
        min-width: 60px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    
    .countdown-item {
        background: #007bff !important;
        color: white !important;
        padding: 10px;
        border-radius: 8px;
        min-width: 60px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    
    #clockdiv div > span, #clockdiv2 div > span {
        font-size: 24px;
        font-weight: bold;
        line-height: 1;
    }
    
    .countdown-item > span {
        font-size: 24px;
        font-weight: bold;
        line-height: 1;
    }
    
    .smalltext {
        font-size: 11px;
        margin-top: 4px;
        opacity: 0.9;
    }
    
    /* Responsive Design */
    @media (max-width: 991px) {
        .countdown-section {
            flex-direction: column;
        }
        
        .timeline-container {
            margin-bottom: 20px;
        }
        
        #clockdiv, #clockdiv2 {
            gap: 5px;
        }
        
        #clockdiv > div, #clockdiv2 > div {
            min-width: 50px;
            padding: 8px;
        }
        
        #clockdiv div > span, #clockdiv2 div > span {
            font-size: 20px;
        }
    }
</style>
@endpush

 
@endsection