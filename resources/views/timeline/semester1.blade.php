@extends('layouts.app')

@section('title', 'Timeline - Graduate Studies')

@section('content')
<div class="container-fluid">
    <div class="row">
        
        <div class="col-lg-6">
            <div class="d-flex justify-content-center align-items-center h-100" style="min-height:600px;">
                <div style="position:relative; display:inline-block;">
                    <!-- Button positioned relative to the image -->
                    <button class="btn btn-primary"
                        style="position:absolute; top:5.9%; left:73%; transform:translate(-50%, -50%); padding:0.1em 5em; font-size:1em; border-radius:10px; background: transparent; border: none; color: #000000ff; box-shadow: none;"
                        onclick="window.location.href='/supervisors'">
                        Assigning Supervisors
                    </button>
                    <button class="btn btn-primary"
                        style="position:absolute; top:20.8%; left:73%; transform:translate(-50%, -50%); padding:0.1em 5em; font-size:1em; border-radius:10px; background: transparent; border: none; color: #000000ff; box-shadow: none;"
                        onclick="window.location.href='/semester1'">
                        1 Semester
                    </button>
                    <button class="btn btn-primary"
                        style="position:absolute; top:35.7%; left:73%; transform:translate(-50%, -50%); padding:0.1em 5em; font-size:1em; border-radius:10px; background: transparent; border: none; color: #000000ff; box-shadow: none;"
                        onclick="window.location.href='/semester2'">
                        2 Semester
                    </button>
                    <button class="btn btn-primary"
                        style="position:absolute; top:50.6%; left:73%; transform:translate(-50%, -50%); padding:0.1em 5em; font-size:1em; border-radius:10px; background: transparent; border: none; color: #000000ff; box-shadow: none;"
                        onclick="window.location.href='/viva'">
                        Viva
                    </button>
                    <button class="btn btn-primary"
                        style="position:absolute; top:65.5%; left:73%; transform:translate(-50%, -50%); padding:0.1em 5em; font-size:1em; border-radius:10px; background: transparent; border: none; color: #000000ff; box-shadow: none;"
                        onclick="window.location.href='/thesis'">
                        Final thesis
                    </button>
                    <button class="btn btn-primary"
                        style="position:absolute; top:80.4%; left:73%; transform:translate(-50%, -50%); padding:0.1em 5em; font-size:1em; border-radius:10px; background: transparent; border: none; color: #000000ff; box-shadow: none;"
                        onclick="window.location.href='/pending'">
                        Degree Pending
                    </button>
                    <button class="btn btn-primary"
                        style="position:absolute; top:95.3%; left:73%; transform:translate(-50%, -50%); padding:0.1em 5em; font-size:1em; border-radius:10px; background: transparent; border: none; color: #000000ff; box-shadow: none;"
                        onclick="window.location.href='/complete'">
                        Completed
                    </button>
                    <img src="{{ asset('img/timeline.png') }}" alt="Timeline"
                        style="max-width:100%; max-height:500px; border-radius:12px; box-shadow:0 4px 16px rgba(0,0,0,0.08);">
                </div>
            </div>
        </div>
        
        <!-- Right Side - Message Board and Countdown -->
        <div class="col-lg-6">
            <!-- Message Board -->
            <div class="message-board">
                <h3>First Semester</h3>
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
