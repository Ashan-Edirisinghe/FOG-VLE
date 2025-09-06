
@extends('layouts.app')

@section('title', 'Create Account - Graduate Studies')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card-custom">
                <div class="profile-icon">
                    <i class="fas fa-user"></i>
                </div>
                
                <h2 class="text-center mb-1">Create an account</h2>
                <p class="text-center text-muted mb-4">
                    Already have an account? <a href="/application-form" class="text-decoration-none">Log in</a>
                </p>
                
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="first_name" class="form-label">First name</label>
                            <input type="text" class="form-control" id="first_name" name="first_name" required>
                        </div>
                        <div class="col-md-6">
                            <label for="last_name" class="form-label">Last name</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password" required>
                        </div>
                        <div class="col-md-6">
                            <label for="password_confirmation" class="form-label">Confirm your password</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>
                    </div>
                    
                    <small class="text-muted d-block mb-3">
                        Use 8 or more characters with a mix of letters, numbers & symbols
                    </small>
                    
                    <div class="form-check mb-4">
                        <input class="form-check-input" type="checkbox" id="show_password">
                        <label class="form-check-label" for="show_password">
                            Show password
                        </label>
                    </div>
                    
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary-custom">Create an account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Show/Hide password functionality
    document.getElementById('show_password').addEventListener('change', function() {
        const passwordField = document.getElementById('password');
        const confirmPasswordField = document.getElementById('password_confirmation');
        
        if (this.checked) {
            passwordField.type = 'text';
            confirmPasswordField.type = 'text';
        } else {
            passwordField.type = 'password';
            confirmPasswordField.type = 'password';
        }
    });
</script>
@endpush
@endsection