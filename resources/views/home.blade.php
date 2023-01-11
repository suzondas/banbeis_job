@extends('layout.app')

@section('content')
<div class="container" style="margin-top: 8%">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Hi, 
                    @if(Auth::guard('web')->check())
                    {{ Auth::guard('web')->user()->name }}
                    @elseif(Auth::guard('employeer')->check())
                    {{ Auth::guard('employeer')->user()->name }}
                    @endif


                </div>

                <div class="card-body">
                    
                     <a href="{{url('/users/view_profile')}}"><button class="btn btn-success"><i class="fa fa-user"></i> Your Profile</button></a>
                     <a href="{{route('home')}}"><button class="btn btn-warning"><i class="fa fa-file"></i> Your Applicatoins</button></a>
                     <br>
                     <span class="text-danger">Before apply please complete your profile first</span>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection