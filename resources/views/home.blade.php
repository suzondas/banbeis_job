@extends('layout.app')

@section('content')
<div class="container" style="margin-top: 8%">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hi</div>

                <div class="card-body">
                     <a href="{{url('/users/view_profile')}}"><button class="btn btn-secondary">Your Profile</button></a>
                     <a href="{{route('home')}}"><button class="btn btn-secondary">Job Applicatoins</button></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection