@extends('layouts.app')

@section('title', 'Timeline - Graduate Studies')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Left Side - Timeline -->
        <div class="col-lg-6">
            <div class="timeline-container">
                <!-- Timeline Items -->
                <div class="timeline-wrapper">
                    <div class="timeline-item completed">
                        <div class="timeline-circle completed"></div>
                        <div class="timeline-content">
                            <div class="timeline-label">Assigning Supervisors</div>
                        </div>
                    </div>
                    
                    <div class="timeline-item active">
                        <div class="timeline-circle active"></div>
                        <div class="timeline-content">
                            <div class="timeline-label">1 Semester</div>
                        </div>
                    </div>
                    
                    <div class="timeline-item pending">
                        <div class="timeline-circle pending"></div>
                        <div class="timeline-content">
                            <div class="timeline-label">2 Semester</div>
                        </div>
                    </div>
                    
                    <div class="timeline-item current">
                        <div class="timeline-circle current"></div>
                        <div class="timeline-content">
                            <div class="timeline-label">Viva</div>
                        </div>
                    </div>
                    
                    <div class="timeline-item pending">
                        <div class="timeline-circle pending"></div>
                        <div class="timeline-content">
                            <div class="timeline-label">Final thesis</div>
                        </div>
                    </div>
                    
                    <div class="timeline-item pending">
                        <div class="timeline-circle pending"></div>
                        <div class="timeline-content">
                            <div class="timeline-label">Waiting For Degree</div>
                        </div>
                    </div>
                    
                    <div class="timeline-item pending">
                        <div class="timeline-circle pending"></div>
                        <div class="timeline-content">
                            <div class="timeline-label">Completed</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Right Side - Message Board and Countdown -->
        <div class="col-lg-6">
            <!-- Message Board -->
            <div class="message-board">
                <h3>message board</h3>
                
                <div class="message-item">
                    <div class="message-header">
                        <i class="fas fa-info-circle"></i>
                        <span>Title</span>
                        <button class="btn-close">×</button>
                    </div>
                    <div class="message-body">Body text.</div>
                    <button class="btn-message">Button</button>
                </div>
                
                <div class="message-item">
                    <div class="message-header">
                        <i class="fas fa-info-circle"></i>
                        <span>Title</span>
                        <button class="btn-close">×</button>
                    </div>
                    <div class="message-body">Body text.</div>
                    <button class="btn-message">Button</button>
                </div>
            </div>
            
            <!-- Countdown Timers -->
            <div class="countdown-section">
                <div class="countdown-box">
                    <h4>Process Countdown</h4>
                    <div class="countdown-display">
                        <div class="countdown-item">
                            <span class="countdown-number" id="processYears">03</span>
                            <span class="countdown-label">Years</span>
                        </div>
                        <div class="countdown-item">
                            <span class="countdown-number" id="processDays">20</span>
                            <span class="countdown-label">Days</span>
                        </div>
                        <div class="countdown-item">
                            <span class="countdown-number" id="processHours">15</span>
                            <span class="countdown-label">Hours</span>
                        </div>
                    </div>
                </div>
                
                <div class="countdown-box">
                    <h4>Total Countdown</h4>
                    <div class="countdown-display">
                        <div class="countdown-item">
                            <span class="countdown-number" id="totalYears">03</span>
                            <span class="countdown-label">Years</span>
                        </div>
                        <div class="countdown-item">
                            <span class="countdown-number" id="totalDays">20</span>
                            <span class="countdown-label">Days</span>
                        </div>
                        <div class="countdown-item">
                            <span class="countdown-number" id="totalHours">15</span>
                            <span class="countdown-label">Hours</span>
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
        padding: 40px 15px;
    }
    
    /* Timeline Styles */
    .timeline-container {
        padding: 40px 20px;
        position: relative;
    }
    
    .timeline-wrapper {
        position: relative;
        padding-left: 60px;
    }
    
    .timeline-wrapper::before {
        content: '';
        position: absolute;
        left: 30px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #ddd;
    }
    
    .timeline-item {
        position: relative;
        margin-bottom: 30px;
        display: flex;
        align-items: center;
    }
    
    .timeline-circle {
        width: 20px;
        height: 20px;
        border-radius: 50%;
        position: absolute;
        left: -50px;
        border: 3px solid #fff;
        z-index: 2;
    }
    
    .timeline-circle.completed {
        background: #ff6b6b;
        border-color: #fff;
        box-shadow: 0 0 0 3px #ff6b6b;
    }
    
    .timeline-circle.active {
        background: #4dabf7;
        border-color: #fff;
        box-shadow: 0 0 0 3px #4dabf7;
    }
    
    .timeline-circle.pending {
        background: #ff8cc8;
        border-color: #fff;
        box-shadow: 0 0 0 3px #ff8cc8;
    }
    
    .timeline-circle.current {
        background: #ffd43b;
        border-color: #fff;
        box-shadow: 0 0 0 3px #ffd43b;
        animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }
    
    .timeline-content {
        flex: 1;
        margin-left: 20px;
    }
    
    .timeline-label {
        background: #69db7c;
        color: white;
        padding: 12px 20px;
        border-radius: 25px;
        font-weight: 500;
        display: inline-block;
        min-width: 150px;
        text-align: center;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    
    .timeline-item.completed .timeline-label {
        background: #ff6b6b;
    }
    
    .timeline-item.active .timeline-label {
        background: #4dabf7;
    }
    
    .timeline-item.pending .timeline-label {
        background: #ff8cc8;
    }
    
    .timeline-item.current .timeline-label {
        background: #ffd43b;
        color: #333;
    }
    
    /* Message Board Styles */
    .message-board {
        background: #e9ecef;
        padding: 25px;
        border-radius: 10px;
        margin-bottom: 30px;
    }
    
    .message-board h3 {
        margin: 0 0 25px 0;
        color: #333;
        font-size: 1.3rem;
        font-weight: 600;
    }
    
    .message-item {
        background: white;
        border-radius: 8px;
        padding: 20px;
        margin-bottom: 15px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    
    .message-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 10px;
    }
    
    .message-header i {
        color: #666;
        margin-right: 8px;
    }
    
    .message-header span {
        font-weight: 600;
        color: #333;
        flex: 1;
    }
    
    .btn-close {
        background: none;
        border: none;
        font-size: 1.2rem;
        color: #999;
        cursor: pointer;
        padding: 0;
        width: 20px;
        height: 20px;
    }
    
    .btn-close:hover {
        color: #666;
    }
    
    .message-body {
        color: #666;
        margin-bottom: 15px;
        font-size: 0.95rem;
    }
    
    .btn-message {
        background: #6c757d;
        color: white;
        border: none;
        padding: 8px 16px;
        border-radius: 5px;
        font-size: 0.9rem;
        cursor: pointer;
        transition: background-color 0.3s;
    }
    
    .btn-message:hover {
        background: #1e3c72;
    }
    
    /* Countdown Styles */
    .countdown-section {
        display: flex;
        gap: 20px;
    }
    
    .countdown-box {
        flex: 1;
        background: #f8f9fa;
        padding: 25px;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0 2px 5px rgba(0,0,0,0.05);
    }
    
    .countdown-box h4 {
        margin: 0 0 20px 0;
        color: #333;
        font-size: 1.1rem;
        font-weight: 600;
    }
    
    .countdown-display {
        display: flex;
        justify-content: space-between;
        gap: 10px;
    }
    
    .countdown-item {
        flex: 1;
        text-align: center;
    }
    
    .countdown-number {
        display: block;
        font-size: 2.5rem;
        font-weight: bold;
        color: #333;
        line-height: 1;
        margin-bottom: 5px;
    }
    
    .countdown-label {
        font-size: 0.9rem;
        color: #666;
        text-transform: capitalize;
    }
    
    /* Responsive Design */
    @media (max-width: 991px) {
        .countdown-section {
            flex-direction: column;
        }
        
        .timeline-container {
            margin-bottom: 40px;
        }
    }
</style>
@endpush

@push('scripts')
<script>
    // Countdown timer functionality
    function updateCountdown() {
        // You can set your target date here
        const targetDate = new Date('2028-12-31 23:59:59').getTime();
        const now = new Date().getTime();
        const distance = targetDate - now;
        
        const years = Math.floor(distance / (1000 * 60 * 60 * 24 * 365));
        const days = Math.floor((distance % (1000 * 60 * 60 * 24 * 365)) / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        
        // Update Process Countdown
        document.getElementById('processYears').textContent = String(years).padStart(2, '0');
        document.getElementById('processDays').textContent = String(days).padStart(2, '0');
        document.getElementById('processHours').textContent = String(hours).padStart(2, '0');
        
        // Update Total Countdown (same for demo)
        document.getElementById('totalYears').textContent = String(years).padStart(2, '0');
        document.getElementById('totalDays').textContent = String(days).padStart(2, '0');
        document.getElementById('totalHours').textContent = String(hours).padStart(2, '0');
    }
    
    // Update countdown every hour
    updateCountdown();
    setInterval(updateCountdown, 3600000);
    
    // Message close functionality
    document.querySelectorAll('.btn-close').forEach(button => {
        button.addEventListener('click', function() {
            this.closest('.message-item').remove();
        });
    });
    
    // Message button functionality
    document.querySelectorAll('.btn-message').forEach(button => {
        button.addEventListener('click', function() {
            alert('Message button clicked!');
        });
    });
</script>
@endpush
@endsection
