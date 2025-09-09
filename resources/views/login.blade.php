@extends('layouts.app')

@section('title', 'Sign In - Graduate Studies')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card-custom">
                <div class="profile-icon">
                    <i class="fas fa-user"></i>
                </div>
                
                <h2 class="text-center mb-4">Sign in</h2>
                
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
                
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <form method="POST" action="{{ route('login.submit') }}">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email or mobile phone number</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    
                    <div class="mb-3 position-relative">
                        <label for="password" class="form-label">Your password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        <button type="button" class="btn-hide-show" id="togglePassword">
                            <i class="fas fa-eye-slash"></i> Hide
                        </button>
                    </div>
                    
                    <div class="d-grid gap-2 mb-4">
                        <button type="submit" class="btn btn-primary-custom">Log in</button>
                    </div>
                    
                    <div class="text-center mb-3">
                        <small class="text-muted">
                            By continuing, you agree to the <a href="#" class="text-decoration-none">Terms of use</a> and <a href="#" class="text-decoration-none">Privacy Policy</a>.
                        </small>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <a href="#" class="text-decoration-none small">Other issue with sign in</a>
                        <a href="#" class="text-decoration-none small">Forgot your password?</a>
                    </div>
                    
                    <hr>
                    <div class="text-center">
                        <small>Don't have an account? <a href="{{ route('signup') }}" class="text-decoration-none">Create your account</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .btn-hide-show {
        position: absolute;
        right: 10px;
        top: 38px;
        background: none;
        border: none;
        color: #666;
        font-size: 0.9rem;
        cursor: pointer;
        padding: 5px;
    }
    
    .btn-hide-show:hover {
        color: #1e3c72;
    }
    
    .form-control {
        padding-right: 80px;
    }
</style>
@endpush

@push('scripts')
<script>
    // Toggle password visibility
    document.getElementById('togglePassword').addEventListener('click', function() {
        const passwordField = document.getElementById('password');
        const icon = this.querySelector('i');
        const text = this;
        
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            icon.className = 'fas fa-eye';
            text.innerHTML = '<i class="fas fa-eye"></i> Hide';
        } else {
            passwordField.type = 'password';
            icon.className = 'fas fa-eye-slash';
            text.innerHTML = '<i class="fas fa-eye-slash"></i> Hide';
        }
    });
</script>
@endpush
@endsection
