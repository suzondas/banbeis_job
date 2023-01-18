<?php

namespace App\Http\Controllers;

use App\Experiences;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Application;
use App\Job;

class ExperiencesController extends Controller
{
    public function store (Request $req, $job_id){

        try{
            // File uploads

        //     $student_id_path = null;
        // //students
        // if($req->hasFile('student_file')){
        //     $file_name = Auth::user()->id. '_student_id.' . $req->file('student_file')->extension();
        //     $req->file('student_file')->move(public_path('profile_photos'), $file_name);
        //     $student_id_path = $file_name;
        // }

        Experiences::updateOrCreate(
            [
               'user_id'   => Auth::user()->id,
               'job_id'=> $job_id
            ],
            [
                'e_m_s_s'=>$req->input('e_m_s_s'),
                'b_p_s'=>$req->input('b_p_s'),
                'p_p_s'=>$req->input('p_p_s'),
                'c_s'=>$req->input('c_s'),
                't_a_s'=>$req->input('t_a_s'),
                't_s'=>$req->input('t_s'),

                'e_m_s_s_experience'=>$req->input('e_m_s_s_experience'),
                'b_p_s_experience'=>$req->input('b_p_s_experience'),
                'p_p_s_experience'=>$req->input('p_p_s_experience'),
                'c_s_experience'=>$req->input('c_s_experience'),
                't_a_s_experience'=>$req->input('t_a_s_experience'),
                't_s_experience'=>$req->input('t_s_experience'),

                'other_survey'=>$req->input('other_survey')
            ],
        );

        $application = new Application();
        $employeer = Job::Find($job_id);
        $application->job_id = $job_id;
        $application->employeer_id = $employeer->employeer_id;
        $application->user_id = Auth::user()->id;
        $application->save();

        return redirect('/jobs/show/'.$job_id);
    }catch(\Exception $e){
        dd($e);
    }

    }
}
