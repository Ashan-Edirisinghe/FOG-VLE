@extends('layouts.app')


@section('title', 'Profile - Graduate Studies')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-lg-9">
			<div class="card-custom mb-4">
				<div class="d-flex align-items-center mb-4">
					<div class="profile-icon me-4">
						<i class="fas fa-user"></i>
					</div>
					<div>
						<h2 class="mb-0">{{ $candidate->full_name ?? ($user->name ?? 'N/A') }}</h2>
						<div class="text-muted">{{ $candidate->email ?? $user->email ?? 'No email provided' }}</div>
					</div>
				</div>
				
				@if($candidate)
					<h5 class="mb-3" style="color:#1e3c72;">Personal Information</h5>
					<div class="row mb-3">
						<div class="col-md-6">
							<strong>Full Name:</strong> {{ $candidate->full_name ?? 'N/A' }}
						</div>
						<div class="col-md-6">
							<strong>NIC:</strong> {{ $candidate->nic ?? 'N/A' }}
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-6">
							<strong>Email:</strong> {{ $candidate->email ?? 'N/A' }}
						</div>
						<div class="col-md-6">
							<strong>Telephone:</strong> {{ $candidate->telephone ?? 'N/A' }}
						</div>
					</div>
					
					<h5 class="mb-3" style="color:#1e3c72;">Educational Qualifications</h5>
					<div class="row mb-3">
						<div class="col-md-12">
							<strong>Undergraduate Degree(s):</strong> {{ $candidate->undergraduate_degree ?? 'N/A' }}
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-6">
							<strong>University:</strong> {{ $candidate->university ?? 'N/A' }}
						</div>
						<div class="col-md-6">
							<strong>Year:</strong> {{ $candidate->year ?? 'N/A' }}
						</div>
					</div>
					<div class="row mb-3">
						<div class="col-md-6">
							<strong>Field:</strong> {{ $candidate->field ?? 'N/A' }}
						</div>
						<div class="col-md-6">
							<strong>GPA/Class:</strong> {{ $candidate->gpa_class ?? 'N/A' }}
						</div>
					</div>
					
					@if($candidate->applications && $candidate->applications->count() > 0)
						<h5 class="mb-3" style="color:#1e3c72;">Applications</h5>
						@foreach($candidate->applications as $application)
							<div class="application-item mb-3 p-3" style="background-color: #f8f9fa; border-radius: 8px; border-left: 4px solid #1e3c72;">
								<div class="row">
									<div class="col-md-6">
										<strong>Intended Degree:</strong> {{ $application->intended_degree ?? 'N/A' }}
									</div>
									<div class="col-md-6">
										<strong>Status:</strong> 
										<span class="badge {{ $application->status === 'pending' ? 'bg-warning' : ($application->status === 'approved' ? 'bg-success' : 'bg-danger') }}">
											{{ ucfirst($application->status ?? 'pending') }}
										</span>
									</div>
								</div>
								<div class="row mt-2">
									<div class="col-md-12">
										<strong>Discipline/Area of Research:</strong> {{ $application->discipline_area ?? 'N/A' }}
									</div>
								</div>
								<div class="row mt-2">
									<div class="col-md-6">
										<strong>Applied Date:</strong> {{ $application->created_at ? $application->created_at->format('M d, Y') : 'N/A' }}
									</div>
									<div class="col-md-6">
										<strong>Last Updated:</strong> {{ $application->updated_at ? $application->updated_at->format('M d, Y') : 'N/A' }}
									</div>
								</div>
							</div>
						@endforeach
					@else
						<h5 class="mb-3" style="color:#1e3c72;">Applications</h5>
						<div class="alert alert-info">
							<i class="fas fa-info-circle me-2"></i>
							No applications submitted yet. <a href="{{ route('application.form') }}" class="alert-link">Submit your first application</a>.
						</div>
					@endif
				@else
					<div class="alert alert-warning">
						<i class="fas fa-exclamation-triangle me-2"></i>
						Your profile is incomplete. Please <a href="{{ route('application.form') }}" class="alert-link">complete your application form</a> to see your profile information.
					</div>
				@endif
			</div>
			<div class="card-custom mb-4">
				<h5 class="mb-3" style="color:#1e3c72;">Actions</h5>
				<div class="d-flex flex-wrap gap-2">
					@if($candidate)
						<a href="{{ route('application.form') }}" class="btn btn-primary">
							<i class="fas fa-plus me-2"></i>Submit New Application
						</a>
						<a href="{{ route('my.applications') }}" class="btn btn-outline-primary">
							<i class="fas fa-list me-2"></i>View All Applications
						</a>
					@else
						<a href="{{ route('application.form') }}" class="btn btn-primary">
							<i class="fas fa-user-plus me-2"></i>Complete Profile & Apply
						</a>
					@endif
					<a href="{{ route('dashboard') }}" class="btn btn-outline-secondary">
						<i class="fas fa-home me-2"></i>Back to Dashboard
					</a>
				</div>
			</div>
			<div class="card-custom mb-4">
				<h5 class="mb-3" style="color:#1e3c72;">Degree Countdown</h5>
				<div class="d-flex justify-content-center align-items-center">
					<div class="countdown-item mx-2">
						<div class="countdown-number" id="degreeDays">000</div>
						<div class="countdown-label">Days</div>
					</div>
					<div class="countdown-item mx-2">
						<div class="countdown-number" id="degreeHours">00</div>
						<div class="countdown-label">Hours</div>
					</div>
					<div class="countdown-item mx-2">
						<div class="countdown-number" id="degreeMinutes">00</div>
						<div class="countdown-label">Minutes</div>
					</div>
					<div class="countdown-item mx-2">
						<div class="countdown-number" id="degreeSeconds">00</div>
						<div class="countdown-label">Seconds</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@push('styles')
<style>
	.card-custom {
		background: white;
		border-radius: 10px;
		padding: 25px;
		box-shadow: 0 2px 10px rgba(0,0,0,0.1);
		border: none;
	}
	
	.profile-icon {
		width: 60px;
		height: 60px;
		background: linear-gradient(135deg, #1e3c72, #2a5298);
		border-radius: 50%;
		display: flex;
		align-items: center;
		justify-content: center;
		color: white;
		font-size: 24px;
	}
	
	.countdown-number {
		font-size: 2.2rem;
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
	
	.application-item {
		transition: transform 0.2s ease, box-shadow 0.2s ease;
	}
	
	.application-item:hover {
		transform: translateY(-2px);
		box-shadow: 0 4px 15px rgba(0,0,0,0.1);
	}
	
	.badge {
		font-size: 0.85rem;
		padding: 0.4em 0.8em;
	}
	
	.alert-link {
		font-weight: 600;
		text-decoration: none;
	}
	
	.alert-link:hover {
		text-decoration: underline;
	}
	
	.btn {
		border-radius: 8px;
		padding: 10px 20px;
		font-weight: 500;
		transition: all 0.3s ease;
		text-decoration: none;
		display: inline-flex;
		align-items: center;
		margin: 5px 5px 5px 0;
	}
	
	.btn-primary {
		background: linear-gradient(135deg, #1e3c72, #2a5298);
		border: none;
		color: white;
	}
	
	.btn-primary:hover {
		background: linear-gradient(135deg, #2a5298, #1e3c72);
		transform: translateY(-1px);
		box-shadow: 0 4px 15px rgba(30, 60, 114, 0.3);
	}
	
	.btn-outline-primary {
		border: 2px solid #1e3c72;
		color: #1e3c72;
		background: transparent;
	}
	
	.btn-outline-primary:hover {
		background: #1e3c72;
		color: white;
		transform: translateY(-1px);
		box-shadow: 0 4px 15px rgba(30, 60, 114, 0.3);
	}
	
	.btn-outline-secondary {
		border: 2px solid #6c757d;
		color: #6c757d;
		background: transparent;
	}
	
	.btn-outline-secondary:hover {
		background: #6c757d;
		color: white;
		transform: translateY(-1px);
	}
	
	.gap-2 {
		gap: 0.5rem;
	}
</style>
@endpush

@push('scripts')
<script>
	// Degree countdown: 4 years from user's application date or account creation
	let degreeStart;
	@if(isset($candidate) && $candidate && $candidate->created_at)
		degreeStart = new Date('{{ $candidate->created_at->format("Y-m-d H:i:s") }}');
	@elseif(isset($user) && $user && $user->created_at)
		degreeStart = new Date('{{ $user->created_at->format("Y-m-d H:i:s") }}');
	@else
		degreeStart = new Date(); // Default to current date
	@endif
	
	const degreeEnd = new Date(degreeStart);
	degreeEnd.setFullYear(degreeEnd.getFullYear() + 4);
	
	function updateDegreeCountdownProfile() {
		const now = new Date();
		let distance = degreeEnd - now;
		if (distance < 0) distance = 0;
		
		const days = Math.floor(distance / (1000 * 60 * 60 * 24));
		const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
		const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		const seconds = Math.floor((distance % (1000 * 60)) / 1000);
		
		document.getElementById('degreeDays').textContent = String(days).padStart(3, '0');
		document.getElementById('degreeHours').textContent = String(hours).padStart(2, '0');
		document.getElementById('degreeMinutes').textContent = String(minutes).padStart(2, '0');
		document.getElementById('degreeSeconds').textContent = String(seconds).padStart(2, '0');
	}
	
	updateDegreeCountdownProfile();
	setInterval(updateDegreeCountdownProfile, 1000);
</script>
@endpush
@endsection
