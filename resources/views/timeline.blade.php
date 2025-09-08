@extends('layouts.app')

@section('title', 'Timeline - Graduate Studies')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Left Side - Timeline -->
        <div class="col-lg-4">
            <div class="timeline-container">
                <h2 class="timeline-title">Timeline</h2>
                <div class="timeline-wrapper">
                    <div class="timeline-item" data-phase="0">
                        <div class="timeline-circle"></div>
                        <div class="timeline-content">
                            <button class="timeline-btn" onclick="selectPhase(0)">
                                Assigning Supervisors
                            </button>
                        </div>
                    </div>
                    
                    <div class="timeline-item" data-phase="1">
                        <div class="timeline-circle"></div>
                        <div class="timeline-content">
                            <button class="timeline-btn" onclick="selectPhase(1)">
                                1 Semester
                            </button>
                        </div>
                    </div>
                    
                    <div class="timeline-item" data-phase="2">
                        <div class="timeline-circle"></div>
                        <div class="timeline-content">
                            <button class="timeline-btn" onclick="selectPhase(2)">
                                2 Semester
                            </button>
                        </div>
                    </div>
                    
                    <div class="timeline-item active" data-phase="3">
                        <div class="timeline-circle active"></div>
                        <div class="timeline-content">
                            <button class="timeline-btn active" onclick="selectPhase(3)">
                                Viva
                            </button>
                        </div>
                    </div>
                    
                    <div class="timeline-item" data-phase="4">
                        <div class="timeline-circle"></div>
                        <div class="timeline-content">
                            <button class="timeline-btn" onclick="selectPhase(4)">
                                Final thesis
                            </button>
                        </div>
                    </div>
                    
                    <div class="timeline-item" data-phase="5">
                        <div class="timeline-circle"></div>
                        <div class="timeline-content">
                            <button class="timeline-btn" onclick="selectPhase(5)">
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
                    <h4>Degree Countdown</h4>
                    <div id="clockdiv2">
                        <div>
                            <span class="days">1461</span>
                            <div class="smalltext">Days</div>
                        </div>
                        <div>
                            <span class="hours">10</span>
                            <div class="smalltext">Hours</div>
                        </div>
                        <div>
                            <span class="minutes">32</span>
                            <div class="smalltext">Minutes</div>
                        </div>
                        <div>
                            <span class="seconds">34</span>
                            <div class="smalltext">Seconds</div>
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
    
    #clockdiv div > span, #clockdiv2 div > span {
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

@push('scripts')
<script>
    const phases = [
        { 
            name: "Assigning Supervisors", 
            title: "Assigning Supervisors",
            status: "Due",
            duration: { days: 0, seconds: 30 }, // 30 seconds for testing
            messages: [
                {
                    id: "supervisor-assignment",
                    title: "Supervisor Assignment Required",
                    body: "Please wait for supervisor assignment",
                    button: "Check Status"
                }
            ]
        },
        { 
            name: "1 Semester", 
            title: "First Semester",
            status: "In Progress",
            duration: { days: 0, seconds: 45 }, // 45 seconds for testing
            messages: [
                {
                    id: "semester1-enrollment",
                    title: "Semester 1 Course Enrollment",
                    body: "Complete your course registration",
                    button: "Enroll Now"
                }
            ]
        },
        { 
            name: "2 Semester", 
            title: "Second Semester",
            status: "Upcoming",
            duration: { days: 0, seconds: 60 }, // 60 seconds for testing
            messages: [
                {
                    id: "semester2-prep",
                    title: "Semester 2 Preparation",
                    body: "Prepare for second semester courses",
                    button: "View Courses"
                }
            ]
        },
        { 
            name: "Viva", 
            title: "Viva Voce",
            status: "Due",
            duration: { days: 2, seconds: 30 }, // 2 days and 30 seconds
            messages: [
                {
                    id: "payment-slip",
                    title: "Upload your payment slip PDF file",
                    body: "Document need to be uploaded",
                    button: "Submit"
                },
                {
                    id: "evaluation-form",
                    title: "Upload your evaluation form (PDF file)",
                    body: "Document need to be uploaded",
                    button: "Submit"
                }
            ]
        },
        { 
            name: "Final thesis", 
            title: "Final Thesis Submission",
            status: "Pending",
            duration: { days: 7, seconds: 0 }, // 7 days
            messages: [
                {
                    id: "thesis-submission",
                    title: "Submit Final Thesis",
                    body: "Upload your final thesis document",
                    button: "Upload"
                }
            ]
        },
        { 
            name: "Waiting For Degree", 
            title: "Degree Processing",
            status: "Processing",
            duration: { days: 30, seconds: 0 }, // 30 days
            messages: [
                {
                    id: "degree-processing",
                    title: "Degree Under Processing",
                    body: "Your degree is being processed",
                    button: "Track Status"
                }
            ]
        },
        { 
            name: "Completed", 
            title: "Congratulations!",
            status: "Completed",
            duration: { days: 0, seconds: 0 }, // No duration for completed phase
            messages: [
                {
                    id: "completion",
                    title: "Degree Completed Successfully",
                    body: "Congratulations on completing your degree!",
                    button: "Download Certificate"
                }
            ]
        }
    ];

    let currentPhase = 0; // Start with first phase
    let processTimer = null;

    function selectPhase(phaseIndex) {
        currentPhase = phaseIndex;
        updateDisplay();
        startProcessCountdown();
    }

    function nextPhase() {
        if (currentPhase < phases.length - 1) {
            currentPhase++;
            updateDisplay();
            startProcessCountdown();
        }
    }

    function calculateDurationInMilliseconds(duration) {
        return (duration.days * 24 * 60 * 60 * 1000) + (duration.seconds * 1000);
    }

    function startProcessCountdown() {
        // Clear existing timer
        if (processTimer) {
            clearInterval(processTimer);
        }

        const phase = phases[currentPhase];
        if (phase.duration.days > 0 || phase.duration.seconds > 0) {
            // Calculate deadline for current phase
            const durationMs = calculateDurationInMilliseconds(phase.duration);
            const processDeadline = new Date(Date.now() + durationMs);
            
            // Update process countdown title
            document.getElementById('process-countdown-title').textContent = `${phase.title} Countdown`;
            
            // Initialize countdown with auto-advance
            initializeClock('clockdiv', processDeadline, true);
        } else {
            // For completed phase, show zero countdown
            document.getElementById('process-countdown-title').textContent = 'Process Completed';
            updateClockDisplay('clockdiv', { days: 0, hours: 0, minutes: 0, seconds: 0 });
        }
    }

    function updateDisplay() {
        const phase = phases[currentPhase];
        
        // Update event name
        document.getElementById('event-name').textContent = phase.title;
        document.getElementById('main-heading').textContent = "message board";
        
        // Update status badge
        const statusBadge = document.getElementById('status-badge');
        statusBadge.textContent = phase.status;
        statusBadge.className = 'status-badge ' + phase.status.toLowerCase().replace(' ', '-');
        
        // Update timeline visual state
        document.querySelectorAll('.timeline-item').forEach((item, index) => {
            const circle = item.querySelector('.timeline-circle');
            const btn = item.querySelector('.timeline-btn');
            
            if (index === currentPhase) {
                item.classList.add('active');
                circle.classList.add('active');
                btn.classList.add('active');
            } else {
                item.classList.remove('active');
                circle.classList.remove('active');
                btn.classList.remove('active');
            }
        });
        
        // Update messages
        updateMessages(phase.messages);
    }

    function updateMessages(messages) {
        const messageBoard = document.querySelector('.message-board');
        const existingMessages = messageBoard.querySelectorAll('.message-item');
        existingMessages.forEach(msg => msg.remove());
        
        messages.forEach(msg => {
            const messageItem = document.createElement('div');
            messageItem.className = 'message-item';
            messageItem.id = msg.id;
            messageItem.innerHTML = `
                <div class="message-header">
                    <span>${msg.title}</span>
                    <button class="btn-close" onclick="closeMessage('${msg.id}')">&times;</button>
                </div>
                <div class="message-body">${msg.body}</div>
                <button class="btn-message">${msg.button}</button>
            `;
            messageBoard.appendChild(messageItem);
        });
    }

    function closeMessage(messageId) {
        const messageElement = document.getElementById(messageId);
        if (messageElement) {
            messageElement.style.display = 'none';
        }
    }

    // Initialize countdown timers
    function getTimeRemaining(endtime) {
        var t = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
        var days = Math.floor(t / (1000 * 60 * 60 * 24));
        return {
            'total': t,
            'days': days,
            'hours': hours,
            'minutes': minutes,
            'seconds': seconds
        };
    }

    function updateClockDisplay(id, timeObj) {
        var clock = document.getElementById(id);
        if (!clock) return;
        
        var daysSpan = clock.querySelector('.days');
        var hoursSpan = clock.querySelector('.hours');
        var minutesSpan = clock.querySelector('.minutes');
        var secondsSpan = clock.querySelector('.seconds');

        if (daysSpan) daysSpan.innerHTML = timeObj.days;
        if (hoursSpan) hoursSpan.innerHTML = ('0' + timeObj.hours).slice(-2);
        if (minutesSpan) minutesSpan.innerHTML = ('0' + timeObj.minutes).slice(-2);
        if (secondsSpan) secondsSpan.innerHTML = ('0' + timeObj.seconds).slice(-2);
    }

    function initializeClock(id, endtime, autoAdvance = false) {
        var clock = document.getElementById(id);
        if (!clock) return;

        function updateClock() {
            var t = getTimeRemaining(endtime);
            updateClockDisplay(id, t);

            if (t.total <= 0) {
                clearInterval(timeinterval);
                updateClockDisplay(id, { days: 0, hours: 0, minutes: 0, seconds: 0 });
                
                // Auto-advance to next phase if enabled
                if (autoAdvance) {
                    setTimeout(() => {
                        nextPhase();
                    }, 1000);
                }
            }
        }

        updateClock();
        var timeinterval = setInterval(updateClock, 1000);
        
        // Store timer reference if it's the process timer
        if (id === 'clockdiv' && autoAdvance) {
            processTimer = timeinterval;
        }
        
        return timeinterval;
    }

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', function() {
        updateDisplay();
        startProcessCountdown();
        
        // Set degree countdown (total program duration)
        var totalDurationMs = phases.reduce((sum, phase) => {
            return sum + calculateDurationInMilliseconds(phase.duration);
        }, 0);
        var degreeDeadline = new Date(Date.now() + totalDurationMs);
        initializeClock('clockdiv2', degreeDeadline);
    });
</script>
@endpush
@endsection