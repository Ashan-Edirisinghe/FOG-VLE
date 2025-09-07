@extends('layouts.app')

@section('title', 'Timeline - Graduate Studies')

@section('content')
<div class="container-fluid pt-2 pb-4">
    <div class="row align-items-stretch justify-content-center">
        <!-- Timeline Section -->
        <div class="col-lg-3 mb-4 d-flex flex-column">
            <div class="mb-3">
                <div class="card shadow-sm text-center">
                    <div class="card-body py-2">
                        <h5 class="mb-0 font-weight-bold">Timeline</h5>
                    </div>
                </div>
            </div>
            <div class="card shadow-sm timeline-card h-100 w-100 d-flex flex-column">
                <div class="card-body pt-3 pb-4 flex-grow-1">
                    <div class="timeline-list">
                        <div class="timeline-step completed selectable">
                            <div class="timeline-dot"></div>
                            <span class="timeline-label">Assigning Supervisors</span>
                        </div>
                        <div class="timeline-step completed selectable">
                            <div class="timeline-dot"></div>
                            <span class="timeline-label">1 Semester</span>
                        </div>
                        <div class="timeline-step completed selectable">
                            <div class="timeline-dot"></div>
                            <span class="timeline-label">2 Semester</span>
                        </div>
                        <div class="timeline-step active selectable selected">
                            <div class="timeline-dot"></div>
                            <span class="timeline-label">Viva</span>
                        </div>
                        <div class="timeline-step pending selectable">
                            <div class="timeline-dot"></div>
                            <span class="timeline-label">Final thesis</span>
                        </div>
                        <div class="timeline-step pending selectable">
                            <div class="timeline-dot"></div>
                            <span class="timeline-label">Waiting For Degree</span>
                        </div>
                        <div class="timeline-step pending selectable">
                            <div class="timeline-dot"></div>
                            <span class="timeline-label">Completed</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Content Section -->
        <div class="col-lg-9 d-flex">
            <div class="d-flex flex-column w-100 h-100">
                <!-- Event Name -->
                <div class="card shadow-sm mb-3">
                    <div class="card-body py-2 px-3">
                        <h4 class="mb-0 font-weight-bold">Event Name</h4>
                    </div>
                </div>
                <!-- Message Board -->
                <div class="card shadow-sm mb-3">
                    <div class="card-body">
                        <h5 class="font-weight-bold mb-3">message board</h5>
                        <div class="mb-3">
                            <div class="alert alert-light border d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    <div class="font-weight-bold">Upload your payment slip PDF file</div>
                                    <div class="small text-muted">Document need to be uploaded</div>
                                </div>
                                <button class="btn btn-sm btn-outline-secondary btn-close" aria-label="Close">&times;</button>
                            </div>
                            <button class="btn btn-dark btn-sm mb-2">Submit</button>
                        </div>
                        <div>
                            <div class="alert alert-light border d-flex justify-content-between align-items-center mb-2">
                                <div>
                                    <div class="font-weight-bold">Upload your evaluation form (PDF file)</div>
                                    <div class="small text-muted">Document need to be uploaded</div>
                                </div>
                                <button class="btn btn-sm btn-outline-secondary btn-close" aria-label="Close">&times;</button>
                            </div>
                            <button class="btn btn-dark btn-sm">Submit</button>
                        </div>
                    </div>
                </div>
                <!-- Complete Status Bar -->
                <div class="card shadow-sm mb-3">
                    <div class="card-body py-2 px-3 d-flex align-items-center">
                        <span class="font-weight-bold mr-2">Complete status :</span>
                        <span id="completeStatusBadge" class="badge bg-warning text-dark px-3 py-2" style="font-size:1rem;">Due</span>
                    </div>
                </div>
                <!-- Countdown Section -->
                <div class="row g-3 align-items-stretch flex-grow-1">
                    <div class="col-md-6 d-flex">
                        <div class="card shadow-sm flex-fill">
                            <div class="card-header bg-light text-center font-weight-bold">Process Countdown</div>
                            <div class="card-body d-flex justify-content-center align-items-center">
                                <div class="countdown-item mx-2">
                                    <div class="countdown-number" id="processYears">03</div>
                                    <div class="countdown-label">Years</div>
                                </div>
                                <div class="countdown-item mx-2">
                                    <div class="countdown-number" id="processDays">20</div>
                                    <div class="countdown-label">Days</div>
                                </div>
                                <div class="countdown-item mx-2">
                                    <div class="countdown-number" id="processHours">15</div>
                                    <div class="countdown-label">Hours</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 d-flex">
                        <div class="card shadow-sm flex-fill">
                            <div class="card-header bg-light text-center font-weight-bold">Degree Countdown</div>
                            <div class="card-body d-flex justify-content-center align-items-center">
                                <div class="countdown-item mx-2">
                                    <div class="countdown-number" id="totalYears">03</div>
                                    <div class="countdown-label">Years</div>
                                </div>
                                <div class="countdown-item mx-2">
                                    <div class="countdown-number" id="totalDays">20</div>
                                    <div class="countdown-label">Days</div>
                                </div>
                                <div class="countdown-item mx-2">
                                    <div class="countdown-number" id="totalHours">15</div>
                                    <div class="countdown-label">Hours</div>
                                </div>
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
/* Timeline Styles */
.timeline-card {
    border-left: 6px solid #e9ecef;
    background: #fff;
}
.timeline-list {
    margin-left: 0;
}
.timeline-step {
    display: flex;
    align-items: center;
    margin-bottom: 32px;
    min-height: 40px;
    position: relative;
}
.timeline-step:last-child {
    margin-bottom: 0;
}
.timeline-dot {
    width: 22px;
    height: 22px;
    border-radius: 50%;
    border: 3px solid #fff;
    background: #dee2e6;
    box-shadow: 0 0 0 3px #dee2e6;
    transition: background 0.3s, box-shadow 0.3s;
    display: inline-block;
    position: static;
    margin-right: 16px;
}

/* Timeline Dot Colors */
.timeline-step.completed .timeline-dot {
    background: #adb5bd;
    box-shadow: 0 0 0 3px #adb5bd;
}
.timeline-step.active .timeline-dot {
    background: #1976d2;
    box-shadow: 0 0 0 3px #1976d2;
}
.timeline-step.pending .timeline-dot {
    background: #e9ecef;
    box-shadow: 0 0 0 3px #e9ecef;
}

/* Selected step highlight */
.timeline-step.selected .timeline-dot {
    border: 3px solid #1976d2;
    box-shadow: 0 0 0 5px #90caf9;
}
.timeline-step.selected .timeline-label {
    border: 2px solid #1976d2;
    box-shadow: 0 0 8px #90caf9;
}

/* Timeline Label Colors */
.timeline-label {
    padding: 10px 22px;
    border-radius: 20px;
    font-weight: 500;
    min-width: 140px;
    text-align: center;
    background: #f8f9fa;
    color: #333;
    font-size: 1rem;
    box-shadow: 0 2px 5px rgba(0,0,0,0.04);
    transition: background 0.3s, color 0.3s, border 0.3s;
    display: inline-block;
    vertical-align: middle;
}
.timeline-step.completed .timeline-label {
    background: #adb5bd;
    color: #fff;
}
.timeline-step.active .timeline-label {
    background: #1976d2;
    color: #fff;
}
.timeline-step.pending .timeline-label {
    background: #f1f3f5;
    color: #adb5bd;
}

/* Countdown Styles */
.countdown-number {
    font-size: 2.5rem;
    font-weight: bold;
    color: #222;
    background: #f1f3f5;
    border-radius: 8px;
    padding: 8px 18px;
    margin-bottom: 4px;
    min-width: 55px;
    display: inline-block;
    text-align: center;
    box-shadow: 0 1px 3px rgba(0,0,0,0.06);
}
.countdown-label {
    font-size: 1rem;
    color: #666;
    text-align: center;
}

/* Responsive Design */
@media (max-width: 991px) {
    .timeline-card {
        margin-bottom: 24px;
    }
}
</style>
@endpush

@push('scripts')
<script>
    // Countdown timer functionality

    // Countdown logic
    // Each timeline section starts a new 1-year process countdown
    // Degree countdown is always 4 years from now
    function getFutureDate(years) {
        const now = new Date();
        return new Date(now.getFullYear() + years, now.getMonth(), now.getDate(), 23, 59, 59);
    }

    let processCountdownInterval = null;
    function updateProcessCountdown(startDate) {
        if (processCountdownInterval) clearInterval(processCountdownInterval);
        function renderCountdown() {
            const now = new Date();
            const endDate = new Date(startDate);
            endDate.setFullYear(endDate.getFullYear() + 1); // 1 year from start
            let distance = endDate - now;
            if (distance < 0) distance = 0;
            const years = Math.floor(distance / (1000 * 60 * 60 * 24 * 365));
            const days = Math.floor((distance % (1000 * 60 * 60 * 24 * 365)) / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            document.getElementById('processYears').textContent = String(years).padStart(2, '0');
            document.getElementById('processDays').textContent = String(days).padStart(2, '0');
            document.getElementById('processHours').textContent = String(hours).padStart(2, '0');
        }
        renderCountdown();
        processCountdownInterval = setInterval(renderCountdown, 1000);
    }

    function updateDegreeCountdown() {
        const now = new Date();
        const endDate = getFutureDate(4); // 4 years from now
        let distance = endDate - now;
        if (distance < 0) distance = 0;
        const years = Math.floor(distance / (1000 * 60 * 60 * 24 * 365));
        const days = Math.floor((distance % (1000 * 60 * 60 * 24 * 365)) / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        document.getElementById('totalYears').textContent = String(years).padStart(2, '0');
        document.getElementById('totalDays').textContent = String(days).padStart(2, '0');
        document.getElementById('totalHours').textContent = String(hours).padStart(2, '0');
    }


    // Always reset process countdown to 1 year from now when a section is selected
    const timelineSteps = document.querySelectorAll('.timeline-step.selectable');

    function refreshProcessCountdownForSelected() {
        updateProcessCountdown(new Date());
    }

    // Update degree countdown once (fixed)
    updateDegreeCountdown();
    // Update process countdown initially and every hour
    refreshProcessCountdownForSelected();
    setInterval(refreshProcessCountdownForSelected, 3600000);

    // Message close functionality
    document.querySelectorAll('.btn-close').forEach(button => {
        button.addEventListener('click', function() {
            this.closest('.alert').remove();
        });
    });

    // Timeline step selection functionality
    function updateCompleteStatus(selectedStep) {
        var badge = document.getElementById('completeStatusBadge');
        if (!badge) return;
        if (selectedStep.classList.contains('completed')) {
            badge.textContent = 'Done';
            badge.classList.remove('bg-warning', 'text-dark');
            badge.classList.add('bg-success', 'text-white');
        } else {
            badge.textContent = 'Due';
            badge.classList.remove('bg-success', 'text-white');
            badge.classList.add('bg-warning', 'text-dark');
        }
    }
    function setupTimelineSelection() {
        timelineSteps.forEach((step) => {
            step.addEventListener('click', function() {
                // Remove selected from all
                timelineSteps.forEach(s => s.classList.remove('selected'));
                // Add selected to clicked
                this.classList.add('selected');
                // Set Event Name
                var label = this.querySelector('.timeline-label').textContent;
                var eventName = document.querySelector('h4.font-weight-bold.mb-0');
                if (eventName) eventName.textContent = label;
                // Update complete status
                updateCompleteStatus(this);
                // Reset process countdown to 1 year from now
                updateProcessCountdown(new Date());
            });
        });
        // Set initial status on page load
        var initialSelected = document.querySelector('.timeline-step.selectable.selected');
        if (initialSelected) {
            updateCompleteStatus(initialSelected);
            refreshProcessCountdownForSelected();
        }
    }
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', setupTimelineSelection);
    } else {
        setupTimelineSelection();
    }
</script>
@endpush
@endsection
