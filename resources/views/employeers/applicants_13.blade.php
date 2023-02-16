<?php 
	use App\Job; 
	use App\User; 
	use App\Employeer; 
	use App\Application;
	use App\General_info;
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
		<h6 class="text-center"><button class="btn btn-warning" onclick="window.print()">Print Result</button></h6>

		<a style="color: blue; text-decoration: underline;" href='{{url("/employeers/dashboard")}}'>< Back</a>
		<table class="table table-bordered  mt-5">
			<thead>
				<th>#</th><th>Applicant Name</th>
				<th>Contact</th>
				<th>Age Marks</th>
				<th>Education Marks</th>
				<th>Experience Marks</th>
				<th>Total Marks</th>
				<th>Action</th>
			</thead>
			<tbody>
			<?php $applicants = $applicants->sortByDesc('total_marks'); ?>

				@foreach($applicants as $applicant)
					@foreach(Job::where('job_id', '=', $applicant->job_id)->get() as $job)
						@foreach(User::where('id', '=', $applicant->user_id)->get() as $user)
							<tr>
								<td>{{ $i++ }}</td>
								<td>{{ $user->name }}</td>
								<td>
									<?php $gI = General_info::where('user_id', '=', $applicant->user_id)->first() ?>
									Phone: {{$gI->contact_num}} <br>
									Email: {{$gI->email}}
								</td>
								<td>Age: {{$applicant->calculated_marks['age']}}<br>
								<b>Mark: {{$applicant->calculated_marks['age_marks']}}</b></td>
								<td>
									SSC: {{$applicant->calculated_marks['ssc']}}<br>
									HSC: {{$applicant->calculated_marks['hsc']}}<br>
									Degree: {{$applicant->calculated_marks['degree']}}<br>
									Honors: {{$applicant->calculated_marks['honors']}}<br>
									Masters: {{$applicant->calculated_marks['masters']}}<br>
								<b>Total: {{$applicant->calculated_marks['education_marks']}}</b>
								</td>
								<td>
									English Medium School Survey: {{$applicant->calculated_marks['exp_e_m_s_s']}}<br>
									BANBEIS PEC Survey: {{$applicant->calculated_marks['exp_b_p_s']}}<br>
									Primary PEC Survey: {{$applicant->calculated_marks['exp_p_p_s']}}<br>
									CSSR Survey: {{$applicant->calculated_marks['exp_c_s']}}<br>
									Teacher Attrition Survey: {{$applicant->calculated_marks['exp_t_a_s']}}<br>
									TVET Survey: {{$applicant->calculated_marks['exp_t_s']}}<br>
									Other Experience: {{$applicant->calculated_marks['exp_others']}}<br>
									<b>Total: {{$applicant->calculated_marks['exp_marks']}}</b>
								</td>
								<td><b>{{ $applicant->total_marks }}</b></td>
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