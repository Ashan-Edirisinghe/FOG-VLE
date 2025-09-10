@extends('layouts.admin-dash')

@section('title', 'Admin Dashboard')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Candidates List</h3>
                    <div class="card-tools">
                        <button class="btn btn-primary btn-sm" onclick="refreshTable()">
                            <i class="fas fa-sync-alt"></i> Refresh
                        </button>
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
                    <!-- Debug Info -->
                    <div class="alert alert-info">
                        <strong>Debug Info:</strong> 
                        Candidates Count: {{ $candidates->count() ?? 'No candidates variable' }}
                        @if($candidates->count() > 0)
                            | First Candidate: {{ $candidates->first()->full_name ?? 'No name' }}
                        @endif
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="candidatesTable">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>NIC</th>
                                    <th>Telephone</th>
                                    <th>Programme</th>
                                    <th>Status</th>
                                    <th>Applied Date</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($candidates as $index => $candidate)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>
                                            <strong>{{ $candidate->full_name ?? 'N/A' }}</strong>
                                            <br>
                                            <small class="text-muted">{{ $candidate->university ?? 'N/A' }}</small>
                                        </td>
                                        <td>
                                            <span class="text-muted">{{ $candidate->email ?? 'N/A' }}</span>
                                        </td>
                                        <td>{{ $candidate->nic ?? 'N/A' }}</td>
                                        <td>{{ $candidate->telephone ?? 'N/A' }}</td>
                                        <td>
                                            <span class="badge bg-info">{{ $candidate->programe ?? 'N/A' }}</span>
                                            <br>
                                            <small class="text-muted">{{ $candidate->gpa_class ?? 'N/A' }} ({{ $candidate->year ?? 'N/A' }})</small>
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $candidate->status == 'pending' ? 'warning' : (in_array($candidate->status, ['approved', 'accepted']) ? 'success' : ($candidate->status == 'under_review' ? 'info' : 'secondary')) }}">
                                                {{ ucfirst($candidate->status ?? 'pending') }}
                                            </span>
                                        </td>
                                        <td>
                                            {{ $candidate->created_at ? $candidate->created_at->format('Y-m-d H:i') : 'N/A' }}
                                        </td>
                                        <td>
                                            <div class="btn-group" role="group">
                                                <a href="{{ route('admin.candidate.view', $candidate->id) }}" class="btn btn-sm btn-outline-primary">
                                                    <i class="fas fa-eye"></i> View
                                                </a>
                                               
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center text-muted py-4">
                                            <i class="fas fa-inbox fa-3x mb-3"></i>
                                            <br>
                                            No candidates found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Summary Stats -->
                    <div class="row mt-4">
                        <div class="col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Total Candidates</span>
                                    <span class="info-box-number">{{ $candidates->count() }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="info-box">
                                <span class="info-box-icon bg-success"><i class="fas fa-user-check"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Today's Applications</span>
                                    <span class="info-box-number">{{ $candidates->where('created_at', '>=', now()->startOfDay())->count() }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Candidate Details Modal -->
<div class="modal fade" id="candidateModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Candidate Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" id="candidateDetails">
                <!-- Candidate details will be loaded here -->
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .info-box {
        display: block;
        min-height: 90px;
        background: #fff;
        width: 100%;
        box-shadow: 0 1px 1px rgba(0,0,0,0.1);
        border-radius: 2px;
        margin-bottom: 15px;
    }
    .info-box-icon {
        border-top-left-radius: 2px;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 2px;
        display: block;
        float: left;
        height: 90px;
        width: 90px;
        text-align: center;
        font-size: 45px;
        line-height: 90px;
        background: rgba(0,0,0,0.2);
    }
    .info-box-content {
        padding: 5px 10px;
        margin-left: 90px;
    }
    .info-box-text {
        text-transform: uppercase;
        font-weight: bold;
        font-size: 13px;
    }
    .info-box-number {
        display: block;
        font-weight: bold;
        font-size: 18px;
    }
</style>
@endpush

@push('scripts')
<script>
    function refreshTable() {
        location.reload();
    }
    
    function viewCandidate(id) {
        fetch(`/admin/candidates/applications`)
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    const candidate = data.candidates.find(c => c.id === id);
                    if (candidate) {
                        document.getElementById('candidateDetails').innerHTML = `
                            <div class="row">
                                <div class="col-md-6">
                                    <strong>Full Name:</strong> ${candidate.full_name || 'N/A'}<br>
                                    <strong>Email:</strong> ${candidate.email || 'N/A'}<br>
                                    <strong>NIC:</strong> ${candidate.nic || 'N/A'}<br>
                                    <strong>Telephone:</strong> ${candidate.telephone || 'N/A'}
                                </div>
                                <div class="col-md-6">
                                    <strong>Programme:</strong> ${candidate.programe || 'N/A'}<br>
                                    <strong>Applied Date:</strong> ${new Date(candidate.created_at).toLocaleString()}
                                </div>
                            </div>
                        `;
                        new bootstrap.Modal(document.getElementById('candidateModal')).show();
                    }
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error loading candidate details');
            });
    }
    
    function approveCandidate(id) {
        if (confirm('Are you sure you want to approve this candidate?')) {
            fetch(`/admin/candidate/${id}/approve`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    location.reload();
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Network error occurred');
            });
        }
    }
    
    function rejectCandidate(id) {
        if (confirm('Are you sure you want to reject this candidate? This will permanently delete the candidate and application records.')) {
            fetch(`/admin/candidate/${id}/reject`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    location.reload();
                } else {
                    alert('Error: ' + data.message);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Network error occurred');
            });
        }
    }
</script>
@endpush