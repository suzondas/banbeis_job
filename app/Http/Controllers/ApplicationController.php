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
use Illuminate\Support\Facades\Session;

class ApplicationController extends Controller
{
    //
     public function create($job_id)
    {
        //checking whether use profile is saved or not

        if(!General_info::where('user_id',Auth::user()->id)->exists() || !Educations::where('user_id',Auth::user()->id)->exists()){
            Session::flash('message', 'Complete Your Profile First');    
            return back();
        }else{
                return redirect('/applications/before-submit/'.$job_id);
        }
    }

    public function show($job_id){
        $id = Auth::user()->id;
        $general_info = General_info::where('user_id', '=' , $id)->first();
        $educations = Educations::where('user_id', '=' , $id)->first();
        $model = '\\App\\'.'Experience_'.$job_id;

        $experiences = $model::where(['user_id'=> $id,'job_id'=>$job_id])->first();
       
        return view('users.view_user_from_admin_'.$job_id, compact('general_info','experiences','educations'));
    
    }

    public  function show_applicants($job_id)
    {
        if(in_array($job_id,array('11'))){
        $total_marks=0;
        $job_title= Job::where('job_id', '=', $job_id)->first()->title;
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

        if($age>=18 && $age <=20){
            $age_marks=10;
        }elseif($age>=21 && $age <=23){
            $age_marks=8;
        }
        elseif($age>=24 && $age <=26){
            $age_marks=6;
        }
        elseif($age>=27 && $age <=29){
            $age_marks=4;
        }elseif ($age>=30){
            $age_marks=2;
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

        $model = '\\App\\'.'Experience_'.$job_id;

        $exp = $model::where('user_id', '=', $usr_id)->get();
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
    	return view('employeers.applicants_'.$job_id)->with(['applicants'=>$applicants,'job_title'=>$job_title]);
        
        }elseif($job_id==12){
            $total_marks=0;
            $job_title= Job::where('job_id', '=', $job_id)->first()->title;
            $applicants = Application::where('job_id', '=', $job_id)->get();
    	    return view('employeers.applicants_'.$job_id)->with(['applicants'=>$applicants,'job_title'=>$job_title]);

        }
        elseif($job_id==13){
            $total_marks=0;
            $job_title= Job::where('job_id', '=', $job_id)->first()->title;
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
            $calculated_marks['exp_others']=0;
            $calculated_marks['exp_marks']=0;
    
        try{
            $usr_id=$applicants[$i]->user_id;
            $dob = General_info::where('user_id', '=', $usr_id)->get();
            $age = \Carbon\Carbon::parse($dob[0]->dob)->diff(\Carbon\Carbon::now())->format('%y');
            
           $calculated_marks['age']= $age;
    
            $age_marks=0;
    
            if($age>=18 && $age <=20){
                $age_marks=12;
            }elseif($age>=21 && $age <=22){
                $age_marks=10;
            }
            elseif($age>=23 && $age <=24){
                $age_marks=8;
            }
            elseif($age>=25 && $age <=26){
                $age_marks=6;
            }
            elseif($age>=27 && $age <=28){
                $age_marks=4;
            }
            elseif($age>=29 && $age <=30){
                $age_marks=2;
            }elseif ($age>30){
                $age_marks=0;
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
    
            $model = '\\App\\'.'Experience_'.$job_id;
    
            $exp = $model::where('user_id', '=', $usr_id)->get();
            $exp_e_m_s_s=0;
            $exp_b_p_s=0;
            $exp_p_p_s=0;
            $exp_c_s=0;
            $exp_t_a_s=0;
            $exp_t_s=0;
            $exp_others=0;
            if($exp[0]->e_m_s_s==2){
                $exp_e_m_s_s=1;
            }
            if ($exp[0]->b_p_s==2){
                $exp_b_p_s=1;
            }
            if ($exp[0]->p_p_s==2){
                $exp_p_p_s=1;
            }
            if ($exp[0]->c_s==2){
                $exp_c_s=1;
            }
            if ($exp[0]->t_a_s==2){
                $exp_t_a_s=1;
            }
            if ($exp[0]->t_s==2){
                $exp_t_s=1;
            }if ($exp[0]->other_survey!=""){
                $exp_others=1;
            }
            $calculated_marks['exp_e_m_s_s'] = $exp_e_m_s_s;
            $calculated_marks['exp_b_p_s'] =$exp_b_p_s;
            $calculated_marks['exp_p_p_s']=$exp_p_p_s;
            $calculated_marks['exp_c_s']=$exp_c_s;
            $calculated_marks['exp_t_a_s']=$exp_t_a_s;
            $calculated_marks['exp_t_s']=$exp_t_s;
            $calculated_marks['exp_others']=$exp_others;
    
            $exp_marks=$exp_e_m_s_s+$exp_b_p_s+$exp_p_p_s+$exp_c_s+$exp_t_a_s+$exp_t_s+$exp_others;
            if($exp_marks>5){
                $exp_marks=5;
            }
            $calculated_marks['exp_marks']=$exp_marks;
    
            $total_marks=$age_marks+$education_marks+$exp_marks;
            }catch(\Exception $e){
                $total_marks = 0;
            }
            $applicants[$i]->total_marks=$total_marks;
            $applicants[$i]->calculated_marks=$calculated_marks;
            }
    
            // print_r($applicants); die;
            return view('employeers.applicants_'.$job_id)->with(['applicants'=>$applicants,'job_title'=>$job_title]);
            
        }
    }

    public function withdraw($id){
        $application = Application::Find($id);
        $job_id = $application->job_id;
        $application->delete();
        $model = '\\App\\'.'Experience_'.$job_id;
        $experience=$model::where(['job_id'=>$job_id, 'user_id'=>Auth::user()->id])->delete();
        return back();
    }

    public function beforeSubmit($job_id){
        $job =  Job::find($job_id);

        if(!General_info::where('user_id',Auth::user()->id)->exists() || !Educations::where('user_id',Auth::user()->id)->exists()){
            Session::flash('message', 'Complete Your Profile First');    
            return back();
        }
        return view('users.experience.'.'experience_'.$job_id)->with('job',$job);
    }
}
