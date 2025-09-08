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
						<h2 class="mb-0">{{ $user->full_name }}</h2>
						<div class="text-muted">{{ $user->email }}</div>
					</div>
				</div>
				<h5 class="mb-3" style="color:#1e3c72;">Personal Information</h5>
				<div class="row mb-3">
					<div class="col-md-6">
						<strong>NIC:</strong> {{ $user->nic }}
					</div>
					<div class="col-md-6">
						<strong>Telephone:</strong> {{ $user->telephone }}
					</div>
				</div>
				<h5 class="mb-3" style="color:#1e3c72;">Educational Qualifications</h5>
				<div class="row mb-3">
					<div class="col-md-6">
						<strong>Undergraduate Degree(s):</strong> {{ $user->undergraduate_degree }}
					</div>
					<div class="col-md-6">
						<strong>University:</strong> {{ $user->university }}
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-md-6">
						<strong>Year:</strong> {{ $user->year }}
					</div>
					<div class="col-md-6">
						<strong>Field:</strong> {{ $user->field }}
					</div>
				</div>
				<div class="row mb-3">
					<div class="col-md-6">
						<strong>GPA/Class:</strong> {{ $user->gpa_class }}
					</div>
				</div>
				<h5 class="mb-3" style="color:#1e3c72;">Proposed Programme of Study</h5>
				<div class="row mb-3">
					<div class="col-md-6">
						<strong>Intended Degree:</strong> {{ $user->intended_degree }}
					</div>
					<div class="col-md-6">
						<strong>Discipline/Area of Research:</strong> {{ $user->discipline_area }}
					</div>
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
</style>
@endpush

@push('scripts')
<script>
	// Degree countdown: 4 years from user's application date (simulate with created_at or now)
	const degreeStart = new Date('{{ ($user->degree_start_date ?? $user->created_at ?? now())->format("Y-m-d H:i:s") }}');
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
