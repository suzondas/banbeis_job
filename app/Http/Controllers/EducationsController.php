<?php

namespace App\Http\Controllers;

use App\Educations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationsController extends Controller
{
    public function store (Request $req){

        try{
            // File uploads

        //     $student_id_path = null;
        // //students
        // if($req->hasFile('student_file')){
        //     $file_name = Auth::user()->id. '_student_id.' . $req->file('student_file')->extension();
        //     $req->file('student_file')->move(public_path('profile_photos'), $file_name);
        //     $student_id_path = $file_name;
        // }

        Educations::updateOrCreate(
            [
               'user_id'   => Auth::user()->id,
            ],
            [
                'ssc'=>$req->input('ssc'),
                'hsc'=>$req->input('hsc'),
                'degree'=>$req->input('degree'),
                'honors'=>$req->input('honors'),
                'masters'=>$req->input('masters')
            ],
        );

        
      return redirect()->back();
    }catch(\Exception $e){
        dd($e);
    }

    }
}
