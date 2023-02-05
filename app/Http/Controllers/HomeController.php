<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Education;
use App\Educations;
use App\Experiences;
use App\General_info;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('users.user_dashboard');
    }
    public function view_profile()
    {
        $id = Auth::user()->id;
        $general_info = General_info::where('user_id', '=' , $id)->first();
        $educations = Educations::where('user_id', '=' , $id)->first();
       
        return view('users.view_profile', compact('general_info','educations'));
    }
    public function edit_profile()
    {
        return view('users.edit_profile');
    }
    public function public_profile($user_id, $job_id)
    {
        $id = $user_id;
        $general_info = General_info::where('user_id', '=' , $id)->first();
        $educations = Educations::where('user_id', '=' , $id)->first();
        $model = '\\App\\'.'Experience_'.$job_id;
        $experiences = $model::where(['user_id'=> $id,'job_id'=>$job_id])->first();
       
        return view('users.view_user_from_admin', compact('general_info','experiences','educations'));
    }
}
