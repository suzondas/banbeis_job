<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Application;
use App\Experiences;
use App\Educations;
use App\General_info;
use App\Employeer;
use App\User;
use Auth;

class ApplicationController extends Controller
{
    //
     public function create($job_id)
    {
        //
        $application = new Application();
        $employeer = Job::Find($job_id);
        $application->job_id = $job_id;
        $application->employeer_id = $employeer->employeer_id;
        $application->user_id = Auth::user()->id;
        $application->save();

        $job = Job::Find($job_id);
        return redirect()->back();

        //return redirect('/jobs/show/{employeer->job_id}');
    }
    public  function show_applicants($job_id)
    {
        $total_marks=0;
    	$applicants = Application::where('job_id', '=', $job_id)->get();
    	
for($i=0;$i<sizeof($applicants);$i++){
    $total_marks = 0;
    $calculated_marks =[];
    $calculated_marks['age'] = 0;
    $calculated_marks['age_marks']= 0;

    $calculated_marks['ssc']= 0;
        $calculated_marks['hsc']= 0;
        $calculated_marks['degree']= 0;
        $calculated_marks['honors']= 0;
        $calculated_marks['masters']= 0;
    $calculated_marks['education_marks']=0;

    $calculated_marks['exp_e_m_s_s']=0;
    $calculated_marks['exp_b_p_s']=0;
    $calculated_marks['exp_p_p_s']=0;
    $calculated_marks['exp_c_s']=0;
    $calculated_marks['exp_t_a_s']=0;
    $calculated_marks['exp_t_s']=0;
    $calculated_marks['exp_marks']=0;

    try{
        $usr_id=$applicants[$i]->user_id;
        $dob = General_info::where('user_id', '=', $usr_id)->get();
        $age = \Carbon\Carbon::parse($dob[0]->dob)->diff(\Carbon\Carbon::now())->format('%y');
        
       $calculated_marks['age']= $age;

        $age_marks=0;
        if($age==18){
            $age_marks=12;
        }elseif ($age==19){
            $age_marks=11;
        }elseif ($age >= 20 && $age <= 29){
            $age_marks=10;
        }
       $calculated_marks['age_marks']= $age_marks;

        $education = Educations::where('user_id', '=', $usr_id)->get();
        $education_marks=$education[0]->ssc+$education[0]->hsc+$education[0]->degree+$education[0]->honors+$education[0]->masters;
        $calculated_marks['ssc']= $education[0]->ssc;
        $calculated_marks['hsc']= $education[0]->hsc;
        $calculated_marks['degree']= $education[0]->degree;
        $calculated_marks['honors']= $education[0]->honors;
        $calculated_marks['masters']= $education[0]->masters;
        $calculated_marks['education_marks']= $education_marks;

        $exp = Experiences::where('user_id', '=', $usr_id)->get();
        $exp_e_m_s_s=0;
        $exp_b_p_s=0;
        $exp_p_p_s=0;
        $exp_c_s=0;
        $exp_t_a_s=0;
        $exp_t_s=0;
        if($exp[0]->e_m_s_s==2){
            $exp_e_m_s_s=4;
        }
        if ($exp[0]->b_p_s==2){
            $exp_b_p_s=2;
        }
        if ($exp[0]->p_p_s==2){
            $exp_p_p_s=2;
        }
        if ($exp[0]->c_s==2){
            $exp_c_s=4;
        }
        if ($exp[0]->t_a_s==2){
            $exp_t_a_s=2;
        }
        if ($exp[0]->t_s==2){
            $exp_t_s=2;
        }
        $calculated_marks['exp_e_m_s_s'] = $exp_e_m_s_s;
        $calculated_marks['exp_b_p_s'] =$exp_b_p_s;
        $calculated_marks['exp_p_p_s']=$exp_p_p_s;
        $calculated_marks['exp_c_s']=$exp_c_s;
        $calculated_marks['exp_t_a_s']=$exp_t_a_s;
        $calculated_marks['exp_t_s']=$exp_t_s;

        $exp_marks=$exp_e_m_s_s+$exp_b_p_s+$exp_p_p_s+$exp_c_s+$exp_t_a_s+$exp_t_s;
        $calculated_marks['exp_marks']=$exp_marks;

        $total_marks=$age_marks+$education_marks+$exp_marks;
    }catch(\Exception $e){
        $total_marks = 0;
    }
        $applicants[$i]->total_marks=$total_marks;
        $applicants[$i]->calculated_marks=$calculated_marks;
        }

        // print_r($applicants); die;
    	return view('employeers.applicants', compact('applicants'));
    }
}
