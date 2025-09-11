@extends('layouts.app')

@section('title', 'Student Profile')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center mb-3">
            <h5 class="mb-0">Student Profile</h5>
            <div class="d-flex">
                <a href="#" class="btn btn-light btn-sm me-2"><i class="fas fa-edit me-1"></i>Edit</a>
                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm"><i class="fas fa-arrow-left me-1"></i>Back to List</a>
            </div>
        </div>
    </div>

    <div class="row g-4">
        <div class="col-lg-3">
            <div class="card p-3">
                <div class="text-center">
                    <img src="https://via.placeholder.com/96x96" alt="avatar" class="rounded-circle mb-2" width="96" height="96">
                    <h5 class="mb-0">{{ $candidate->full_name ?? $user->name }}</h5>
                    <div class="text-muted small">Student ID: {{ $candidate->nic ?? 'N/A' }}</div>
                    <div class="d-grid gap-2 mt-3">
                        <button type="button" class="btn btn-outline-primary btn-sm"><i class="fas fa-paper-plane me-1"></i>Send Message</button>
                        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="window.print()"><i class="fas fa-print me-1"></i>Print Profile</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5">
            <div class="card p-3 mb-3">
                <h6 class="mb-3">Personal Information</h6>
                <div class="row mb-2">
                    <div class="col-sm-4 fw-semibold">Email:</div>
                    <div class="col-sm-8">{{ $candidate->email ?? $user->email }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-4 fw-semibold">Phone:</div>
                    <div class="col-sm-8">{{ $candidate->telephone ?? 'N/A' }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-4 fw-semibold">Date of Birth:</div>
                    <div class="col-sm-8">{{ $candidate->date_of_birth ?? '—' }}</div>
                </div>
                <div class="row">
                    <div class="col-sm-4 fw-semibold">Address:</div>
                    <div class="col-sm-8">{{ $candidate->address ?? '—' }}</div>
                </div>
            </div>

            <div class="card p-3">
                <h6 class="mb-3">Emergency Contact</h6>
                <div class="row mb-2">
                    <div class="col-sm-4 fw-semibold">Name:</div>
                    <div class="col-sm-8">{{ $candidate->emergency_name ?? '—' }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-sm-4 fw-semibold">Relation:</div>
                    <div class="col-sm-8">{{ $candidate->emergency_relation ?? '—' }}</div>
                </div>
                <div class="row">
                    <div class="col-sm-4 fw-semibold">Phone:</div>
                    <div class="col-sm-8">{{ $candidate->emergency_phone ?? '—' }}</div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card p-3 mb-3">
                <h6 class="mb-3">Academic Information</h6>
                <div class="row mb-2">
                    <div class="col-5 fw-semibold">Major:</div>
                    <div class="col-7">{{ $latestApplication->discipline_area ?? '—' }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-5 fw-semibold">Year Level:</div>
                    <div class="col-7">{{ $candidate->year_level ?? '—' }}</div>
                </div>
                <div class="row mb-2">
                    <div class="col-5 fw-semibold">GPA:</div>
                    <div class="col-7">{{ $candidate->gpa ?? $candidate->gpa_class ?? '—' }}</div>
                </div>
                <div class="row mb-2 align-items-center">
                    <div class="col-5 fw-semibold">Status:</div>
                    <div class="col-7">
                        @php($status = $latestApplication->status ?? 'Active')
                        <span class="badge rounded-pill {{ strtolower($status) === 'active' ? 'bg-success' : (strtolower($status) === 'pending' ? 'bg-warning text-dark' : 'bg-secondary') }}">{{ ucfirst($status) }}</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-5 fw-semibold">Advisor:</div>
                    <div class="col-7">{{ $candidate->advisor_name ?? '—' }}</div>
                </div>
            </div>

            <div class="card p-3">
                <h6 class="mb-3">Recent Activity</h6>
                <ul class="list-unstyled mb-0 small">
                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i>Registered for Spring 2025</li>
                    <li class="mb-2"><i class="fas fa-file-upload text-primary me-2"></i>Submitted final project for {{ $latestApplication->intended_degree ?? '—' }}</li>
                    <li class="mb-2"><i class="fas fa-calendar-check text-info me-2"></i>Scheduled advisor meeting</li>
                    <li><i class="fas fa-award text-warning me-2"></i>Made Dean's List for Fall 2024</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="row g-4 mt-1">
        <div class="col-12">
            <div class="card p-3">
                <h6 class="mb-3">Enrolled Courses</h6>
                <div class="table-responsive">
                    <table class="table table-sm align-middle">
                        <thead>
                            <tr>
                                <th>Course Code</th>
                                <th>Course Name</th>
                                <th>Instructor</th>
                                <th>Schedule</th>
                                <th>Grade</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>BUS301</td>
                                <td>Marketing Principles</td>
                                <td>Dr. Robert Chen</td>
                                <td>Mon/Wed 10:00-11:30</td>
                                <td>A-</td>
                            </tr>
                            <tr>
                                <td>BUS215</td>
                                <td>Financial Accounting</td>
                                <td>Prof. Sarah Williams</td>
                                <td>Tue/Thu 13:00-14:30</td>
                                <td>B+</td>
                            </tr>
                            <tr>
                                <td>ENG202</td>
                                <td>Business Communication</td>
                                <td>Dr. James Miller</td>
                                <td>Fri 09:00-12:00</td>
                                <td>A</td>
                            </tr>
                            <tr>
                                <td>MATH150</td>
                                <td>Business Statistics</td>
                                <td>Dr. Lisa Thompson</td>
                                <td>Mon/Wed 14:00-15:30</td>
                                <td>B</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    @media print {
        .btn, nav, .navbar, .footer { display: none !important; }
        .card { box-shadow: none !important; border: 1px solid #ddd; }
    }
</style>
@endpush
@endsection


