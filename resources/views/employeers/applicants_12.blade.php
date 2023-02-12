<?php 
	use App\Job; 
	use App\User; 
	use App\Employeer; 
	use App\Application;
?>
@extends('layout.app')
@section('content')
	<div class="container-fluid" style="margin-top: 8%">
		<h3 class="text-center">{{ Auth::guard('employeer')->user()->name }}</h3>
		@php
			$employeer_id = Auth::guard('employeer')->user()->id;
			$i = 1
		@endphp
		<h6 class="text-center">Applicants Information</h6>
		<h6 class="text-center">Post: {{$job_title}}</h6>
		<a style="color: blue; text-decoration: underline;" href='/employeers/dashboard'>< Back</a>
		<table class="table table-bordered  mt-5">
			<thead>
				<th>#</th><th>Applicant Name</th>
				<th>Contact</th>
				<th>Action</th>
			</thead>
			<tbody>
				@foreach($applicants as $applicant)
					@foreach(Job::where('job_id', '=', $applicant->job_id)->get() as $job)
						@foreach(User::where('id', '=', $applicant->user_id)->get() as $user)
							<tr>
								<td>{{ $i++ }}</td>
								<td>{{ $user->name }}</td>

								<td><b>{{ $user->email }}</b></td>
								<td>
									<a href="{{url('/users/public_profile/'.$applicant->user_id.'/'.$applicant->job_id)}}" style="color: blue; text-decoration: underline;"><button class="btn btn-success">View</button></a> 
									<br>
									<br>
									{{-- <a href="{{url('/applications/withdraw/'.$applicant->id)}}" onclick="return confirm('Are you sure you want to delete this item?');" style="color: blue; text-decoration: underline;"><button class="btn btn-danger">Remove Application</button></button></a>  --}}

									{{-- <a href='/users/public_profile_marks/{{$applicant->user_id}}' style="color: blue; text-decoration: underline;">View Marks</a> --}}
								</td>
							</tr>
						@endforeach
					@endforeach
				@endforeach
			</tbody>
		</table>
	</div>
@endsection