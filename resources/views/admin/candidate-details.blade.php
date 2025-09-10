@extends('layouts.admin-dash')

@section('title', 'Candidate Details')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Back Button -->
            <div class="mb-3">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Dashboard
                </a>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user"></i> Candidate Details
                    </h3>
                    <div class="card-tools">
                        <span class="badge badge-{{ $candidate->status == 'pending' ? 'warning' : (in_array($candidate->status, ['approved', 'accepted']) ? 'success' : ($candidate->status == 'under_review' ? 'info' : 'secondary')) }} badge-lg">
                            {{ ucfirst($candidate->status) }}
                        </span>
                    </div>
                </div>
                
                <!-- Display Success/Error Messages -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show m-3" role="alert">
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif
                
                <div class="card-body">
                    <div class="row">
                        <!-- Personal Information -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">
                                        <i class="fas fa-user-circle"></i> Personal Information
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td><strong>Full Name:</strong></td>
                                            <td>{{ $candidate->full_name }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Email:</strong></td>
                                            <td>{{ $candidate->email }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>NIC:</strong></td>
                                            <td>{{ $candidate->nic }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Telephone:</strong></td>
                                            <td>{{ $candidate->telephone }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Academic Information -->
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">
                                        <i class="fas fa-graduation-cap"></i> Academic Information
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td><strong>Intended Degree:</strong></td>
                                            <td>{{ $candidate->programe }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Discipline Area:</strong></td>
                                            <td>{{ $candidate->discipline_area }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Application Status:</strong></td>
                                            <td>
                                                <span class="badge bg-{{ $candidate->status == 'pending' ? 'warning' : (in_array($candidate->status, ['approved', 'accepted']) ? 'success' : ($candidate->status == 'under_review' ? 'info' : 'secondary')) }}">
                                                    {{ ucfirst($candidate->status) }}
                                                </span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Educational Background -->
                    <div class="row mt-4">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">
                                        <i class="fas fa-university"></i> Educational Background
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td><strong>Undergraduate Degree:</strong></td>
                                            <td>{{ $candidate->undergraduate_degree }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>University:</strong></td>
                                            <td>{{ $candidate->university }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Graduation Year:</strong></td>
                                            <td>{{ $candidate->year }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Field of Study:</strong></td>
                                            <td>{{ $candidate->field }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>GPA/Class:</strong></td>
                                            <td>
                                                <span class="badge bg-success">{{ $candidate->gpa_class }}</span>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                   
                    <!-- Application Timeline -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">
                                        <i class="fas fa-clock"></i> Application Timeline
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <table class="table table-borderless">
                                        <tr>
                                            <td><strong>Applied Date:</strong></td>
                                            <td>{{ $candidate->created_at ? $candidate->created_at->format('F d, Y \a\t g:i A') : 'N/A' }}</td>
                                        </tr>
                                        <tr>
                                            <td><strong>Last Updated:</strong></td>
                                            <td>{{ $candidate->updated_at ? $candidate->updated_at->format('F d, Y \a\t g:i A') : 'N/A' }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title mb-0">
                                        <i class="fas fa-cogs"></i> Actions
                                    </h5>
                                </div>
                                <div class="card-body">
                                    <div class="btn-group" role="group">
                                        @if($candidate->status != 'approved')
                                            <button class="btn btn-success" onclick="approveCandidate({{ $candidate->id }})">
                                                <i class="fas fa-check"></i> Approve Application
                                            </button>
                                        @endif
                                        
                                        @if($candidate->status != 'rejected')
                                            <button class="btn btn-danger" onclick="rejectCandidate({{ $candidate->id }})">
                                                <i class="fas fa-times"></i> Reject Application
                                            </button>
                                        @endif
                                        
                                        @if($candidate->status != 'pending')
                                            <button class="btn btn-warning" onclick="setPending({{ $candidate->id }})">
                                                <i class="fas fa-clock"></i> Set to Pending
                                            </button>
                                        @endif
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .badge-lg {
        font-size: 1rem;
        padding: 0.5rem 1rem;
    }
    .card {
        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
        border: 1px solid rgba(0, 0, 0, 0.125);
    }
    .card-header {
        background-color: #f8f9fa;
        border-bottom: 1px solid rgba(0, 0, 0, 0.125);
    }
</style>
@endpush

@push('scripts')
<script>
    function updateStatus(id, status) {
        let confirmMessage = '';
        let url = '';
        
        if (status === 'approved') {
            confirmMessage = 'Are you sure you want to approve this application?';
            url = `/admin/candidate/${id}/approve`;
        } else if (status === 'rejected') {
            confirmMessage = 'Are you sure you want to reject this candidate? This will permanently delete the candidate and application records.';
            url = `/admin/candidate/${id}/reject`;
        } else {
            confirmMessage = `Are you sure you want to set status to ${status}?`;
            url = `/admin/candidate/${id}/status`;
        }
        
        if (confirm(confirmMessage)) {
            // Show loading state
            const buttons = document.querySelectorAll('.btn-group button');
            buttons.forEach(btn => btn.disabled = true);
            
            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({ status: status })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Show success message
                    alert(data.message);
                    
                    // If rejected, redirect to dashboard since record is deleted
                    if (status === 'rejected') {
                        window.location.href = '{{ route("admin.dashboard") }}';
                    } else {
                        // Otherwise reload the page
                        location.reload();
                    }
                } else {
                    alert('Error: ' + data.message);
                    // Re-enable buttons
                    buttons.forEach(btn => btn.disabled = false);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Network error occurred');
                // Re-enable buttons
                buttons.forEach(btn => btn.disabled = false);
            });
        }
    }
    
    // Separate functions for cleaner code
    function approveCandidate(id) {
        updateStatus(id, 'approved');
    }
    
    function rejectCandidate(id) {
        updateStatus(id, 'rejected');
    }
    
    function setPending(id) {
        updateStatus(id, 'pending');
    }
</script>
@endpush
