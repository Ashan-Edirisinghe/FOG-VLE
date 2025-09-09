@extends('layouts.app')

@section('title', 'Application Form - Graduate Studies')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="application-form-card">
                <h2 class="form-title">Application Form</h2>
                <p class="form-subtitle">"Please fill in your details carefully."</p>
                
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                
                @if(session('info'))
                    <div class="alert alert-info">
                        {{ session('info') }}
                    </div>
                @endif
                
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form method="POST" action="{{ route('application.submit') }}">
                    @csrf
                    
                    <!-- 1. Personal Information -->
                    <div class="form-section">
                        <h5 class="section-title">1. Personal Information</h5>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label for="full_name" class="form-label">Full Name:</label>
                                <input type="text" class="form-control" id="full_name" name="full_name" 
                                       value="{{ old('full_name', $candidate ? $candidate->full_name : '') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="nic" class="form-label">NIC:</label>
                                <input type="text" class="form-control" id="nic" name="nic" 
                                       value="{{ old('nic', $candidate ? $candidate->nic : '') }}" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" name="email" 
                                       value="{{ old('email', $candidate ? $candidate->email : auth()->user()->email) }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="telephone" class="form-label">Telephone (Mobile):</label>
                                <input type="tel" class="form-control" id="telephone" name="telephone" 
                                       value="{{ old('telephone', $candidate ? $candidate->telephone : '') }}" required>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 2. Educational Qualifications -->
                    <div class="form-section">
                        <h5 class="section-title">2. Educational Qualifications</h5>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <label for="undergraduate_degree" class="form-label">Undergraduate Degree(s):</label>
                                <input type="text" class="form-control" id="undergraduate_degree" name="undergraduate_degree" 
                                       value="{{ old('undergraduate_degree', $candidate ? $candidate->undergraduate_degree : '') }}" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label for="university" class="form-label">University:</label>
                                <input type="text" class="form-control" id="university" name="university" 
                                       value="{{ old('university', $candidate ? $candidate->university : '') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="year" class="form-label">Year:</label>
                                <input type="number" class="form-control" id="year" name="year" min="1950" max="2025" 
                                       value="{{ old('year', $candidate ? $candidate->year : '') }}" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <label for="field" class="form-label">Field:</label>
                                <input type="text" class="form-control" id="field" name="field" 
                                       value="{{ old('field', $candidate ? $candidate->field : '') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label for="gpa_class" class="form-label">GPA/Class:</label>
                                <input type="text" class="form-control" id="gpa_class" name="gpa_class" 
                                       value="{{ old('gpa_class', $candidate ? $candidate->gpa_class : '') }}" required>
                            </div>
                        </div>
                    </div>
                    
                    <!-- 3. Proposed Programme of Study -->
                    <div class="form-section">
                        <h5 class="section-title">3. Proposed Programme of Study</h5>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <label for="intended_degree" class="form-label">Intended Degree(MPhil / PhD):</label>
                                <input type="text" class="form-control" id="intended_degree" name="intended_degree" 
                                       value="{{ old('intended_degree') }}" required>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <label for="discipline_area" class="form-label">Discipline/Area of Research:</label>
                                <input type="text" class="form-control" id="discipline_area" name="discipline_area" 
                                       value="{{ old('discipline_area') }}" required>
                            </div>
                        </div>
                    </div>
                    
                    <div class="text-end mt-4">
                        <button type="submit" class="btn btn-submit">Submit Application</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-outline-secondary ms-2">Back to Dashboard</a>
                    </div>
                </form>
                
                <!-- Logout Form -->
                <div class="text-center mt-3">
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-link text-muted">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .application-form-card {
        background: white;
        border: 1px solid #e0e0e0;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        padding: 40px;
        margin-bottom: 30px;
    }
    
    .form-title {
        font-size: 1.8rem;
        font-weight: bold;
        color: #333;
        margin-bottom: 10px;
        border-bottom: 2px solid #1e3c72;
        padding-bottom: 10px;
    }
    
    .form-subtitle {
        font-style: italic;
        color: #666;
        margin-bottom: 30px;
        font-size: 1rem;
    }
    
    .form-section {
        margin-bottom: 35px;
        padding: 20px;
        background: #f8f9fa;
        border-radius: 8px;
        border-left: 4px solid #1e3c72;
    }
    
    .section-title {
        font-weight: bold;
        color: #333;
        margin-bottom: 20px;
        font-size: 1.1rem;
    }
    
    .form-label {
        font-weight: 500;
        color: #333;
        margin-bottom: 8px;
    }
    
    .form-control {
        border: 1px solid #ddd;
        border-radius: 5px;
        padding: 12px 15px;
        margin-bottom: 20px;
        transition: border-color 0.3s, box-shadow 0.3s;
        background: white;
    }
    
    .form-control:focus {
        border-color: #1e3c72;
        box-shadow: 0 0 0 0.2rem rgba(30, 60, 114, 0.2);
        outline: none;
    }
    
    .btn-submit {
        background-color: #d0d0d0;
        border: none;
        border-radius: 8px;
        padding: 12px 40px;
        font-weight: 500;
        color: #555;
        font-size: 1rem;
        transition: background-color 0.3s, color 0.3s;
        text-transform: lowercase;
    }
    
    .btn-submit:hover {
        background-color: #1e3c72;
        color: white;
    }
    
    .row {
        margin-bottom: 15px;
    }
    
    .row:last-child {
        margin-bottom: 0;
    }
</style>
@endpush
@endsection
