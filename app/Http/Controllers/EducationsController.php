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
            $ssc_path = null;
            if($req->hasFile('ssc_path')){
                $file_name = Auth::user()->id. '_ssc_path.' . $req->file('ssc_path')->extension();
                $req->file('ssc_path')->move(public_path('profile_photos'), $file_name);
                $ssc_path = $file_name;
            }

            $hsc_path = null;
            if($req->hasFile('hsc_path')){
                $file_name = Auth::user()->id. '_hsc_path.' . $req->file('hsc_path')->extension();
                $req->file('hsc_path')->move(public_path('profile_photos'), $file_name);
                $hsc_path = $file_name;
            }

            $degree_path = null;
            if($req->hasFile('degree_path')){
                $file_name = Auth::user()->id. '_degree_path.' . $req->file('degree_path')->extension();
                $req->file('degree_path')->move(public_path('profile_photos'), $file_name);
                $degree_path = $file_name;
            }

            $honors_path = null;
            if($req->hasFile('honors_path')){
                $file_name = Auth::user()->id. '_honors_path.' . $req->file('honors_path')->extension();
                $req->file('honors_path')->move(public_path('profile_photos'), $file_name);
                $honors_path = $file_name;
            }

            $masters_path = null;
            if($req->hasFile('masters_path')){
                $file_name = Auth::user()->id. '_masters_path.' . $req->file('masters_path')->extension();
                $req->file('masters_path')->move(public_path('profile_photos'), $file_name);
                $masters_path = $file_name;
            }

            $dataToSave = [
                'ssc'=>$req->input('ssc'),
                'hsc'=>$req->input('hsc'),
                'degree'=>$req->input('degree'),
                'honors'=>$req->input('honors'),
                'masters'=>$req->input('masters')
            ];

            if(isset($ssc_path)){
                $dataToSave["ssc_path"]=$ssc_path;
             }

             if(isset($hsc_path)){
                $dataToSave["hsc_path"]=$hsc_path;
             }

             if(isset($degree_path)){
                $dataToSave["degree_path"]=$degree_path;
             }

             if(isset($honors_path)){
                $dataToSave["honors_path"]=$honors_path;
             }

             if(isset($masters_path)){
                $dataToSave["masters_path"]=$masters_path;
             }

        Educations::updateOrCreate(
            [
               'user_id'   => Auth::user()->id,
            ],
            $dataToSave
        );

        
      return redirect()->back();
    }catch(\Exception $e){
        dd($e);
    }

    }
}
