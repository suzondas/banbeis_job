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

            if($job_id == 11){

            try{
                // File uploads

                $e_m_s_s_path = null;
                if($req->hasFile('e_m_s_s_path')){
                    $file_name = Auth::user()->id. '_e_m_s_s_path.' . $req->file('e_m_s_s_path')->extension();
                    $req->file('e_m_s_s_path')->move(public_path('profile_photos'), $file_name);
                    $e_m_s_s_path = $file_name;
                }

                $b_p_s_path = null;
                if($req->hasFile('b_p_s_path')){
                    $file_name = Auth::user()->id. '_b_p_s_path.' . $req->file('b_p_s_path')->extension();
                    $req->file('b_p_s_path')->move(public_path('profile_photos'), $file_name);
                    $b_p_s_path = $file_name;
                }

                $p_p_s_path = null;
                if($req->hasFile('p_p_s_path')){
                    $file_name = Auth::user()->id. '_p_p_s_path.' . $req->file('p_p_s_path')->extension();
                    $req->file('p_p_s_path')->move(public_path('profile_photos'), $file_name);
                    $p_p_s_path = $file_name;
                }

                $c_s_path = null;
                if($req->hasFile('c_s_path')){
                    $file_name = Auth::user()->id. '_c_s_path.' . $req->file('c_s_path')->extension();
                    $req->file('c_s_path')->move(public_path('profile_photos'), $file_name);
                    $c_s_path = $file_name;
                }

                $t_a_s_path = null;
                if($req->hasFile('t_a_s_path')){
                    $file_name = Auth::user()->id. '_t_a_s_path.' . $req->file('t_a_s_path')->extension();
                    $req->file('t_a_s_path')->move(public_path('profile_photos'), $file_name);
                    $t_a_s_path = $file_name;
                }

                $t_s_path = null;
                if($req->hasFile('t_s_path')){
                    $file_name = Auth::user()->id. '_t_s_path.' . $req->file('t_s_path')->extension();
                    $req->file('t_s_path')->move(public_path('profile_photos'), $file_name);
                    $t_s_path = $file_name;
                }

                $other_survey_path = null;
                if($req->hasFile('other_survey_path')){
                    $file_name = Auth::user()->id. '_other_survey_path.' . $req->file('other_survey_path')->extension();
                    $req->file('other_survey_path')->move(public_path('profile_photos'), $file_name);
                    $other_survey_path = $file_name;
                }

                $dataToSave = [
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

                    'other_survey'=>$req->input('other_survey'),
                ];

                
            if(isset($e_m_s_s_path)){
                $dataToSave["e_m_s_s_path"]=$e_m_s_s_path;
            }
            if(isset($b_p_s_path)){
                $dataToSave["b_p_s_path"]=$b_p_s_path;
            }
            if(isset($p_p_s_path)){
                $dataToSave["p_p_s_path"]=$p_p_s_path;
            }
            if(isset($c_s_path)){
                $dataToSave["c_s_path"]=$c_s_path;
            }
            if(isset($t_a_s_path)){
                $dataToSave["t_a_s_path"]=$t_a_s_path;
            }
            if(isset($t_s_path)){
                $dataToSave["t_s_path"]=$t_s_path;
            }
            if(isset($other_survey_path)){
                $dataToSave["other_survey_path"]=$other_survey_path;
            }

            $model = '\\App\\'.'Experience_'.$job_id;

            $model::updateOrCreate(
                [
                'user_id'   => Auth::user()->id,
                'job_id'=> $job_id
                ],
                $dataToSave
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
}
