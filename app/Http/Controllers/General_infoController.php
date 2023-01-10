<?php

namespace App\Http\Controllers;

use App\General_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class General_infoController extends Controller
{
    public function store (Request $req){
    // dd($req->all());

        // $req->validate([
        //     "name" => "required",
        //     "fathers_name" => "required",
        //     "mothers_name" => "required",
        //     "gender" => "required",
        //     "dob" => "required",
        //     "nid" => "required",
        //     "nid_or_birth_reg_num" => "required",
        //     "birth_reg_num" => "required",
        //     "care_of" => "required",
        //     "village" => "required",
        //     "district" => "required",
        //     "upazila" => "required",
        //     "post_office" => "required",
        //     "post_code" => "required",
        //     "ma_care_of" => "",
        //     "ma_village" => "",
        //     "ma_district" => "",
        //     "ma_upazila" => "",
        //     "ma_post_office" => "",
        //     "ma_post_code" => "",
        //     "email" => "required:email",
        //     "contact_num" => "required",
        // ]);

        try{
            // File uploads

            $student_id_path = null;
        if($req->hasFile('student_file')){
            $file_name = Auth::user()->id. '_student_id.' . $req->file('student_file')->extension();
            $req->file('student_file')->move(public_path('profile_photos'), $file_name);
            $student_id_path = $file_name;
        }

        $nid_path = null;
        if($req->hasFile('nid_path')){
            $file_name = Auth::user()->id. '_nid_path.' . $req->file('nid_path')->extension();
            $req->file('nid_path')->move(public_path('profile_photos'), $file_name);
            $nid_path = $file_name;
        }

        $birth_reg_num_path = null;
        if($req->hasFile('birth_reg_num_path')){
            $file_name = Auth::user()->id. '_birth_reg_num_path.' . $req->file('birth_reg_num_path')->extension();
            $req->file('birth_reg_num_path')->move(public_path('profile_photos'), $file_name);
            $birth_reg_num_path = $file_name;
        }
        $dataToSave = [
            "name" => $req->input('name'),
            "fathers_name" => $req->input('fathers_name'),
            "mothers_name" => $req->input('mothers_name'),
            "gender" => $req->input('gender'),
            "dob" => $req->input('dob'),
            "nid" => $req->input('nid'),
            "nid_or_birth_reg_num" => $req->input('nid_or_birth_reg_num'),
            "birth_reg_num" => $req->input('birth_reg_num'),
            "care_of" => $req->input('care_of'),
            "village" => $req->input('village'),
            "district" => $req->input('district'),
            "upazila" => $req->input('upazila'),
            "post_office" => $req->input('post_office'),
            "post_code" => $req->input('post_code'),
            "ma_care_of" => $req->input('ma_care_of'),
            "ma_village" => $req->input('ma_village'),
            "ma_district" => $req->input('ma_district'),
            "ma_upazila" => $req->input('ma_upazila'),
            "ma_post_office" =>$req->input('ma_post_office'),
            "ma_post_code" => $req->input('ma_post_code'),
            "email" => $req->input('email'),
            "contact_num" => $req->input('contact_num'),
            "is_contact_num_whatsapp"=>$req->input('is_contact_num_whatsapp'),
            "is_pa_ma"=>$req->input('is_pa_ma')
        ];
        if(isset($student_id_path)){
           $dataToSave["student_id_path"]=$student_id_path;
        }
        if(isset($nid_path)){
            $dataToSave["nid_path"]=$nid_path;
         }
         if(isset($birth_reg_num_path)){
            $dataToSave["birth_reg_num_path"]=$birth_reg_num_path;
         }
       

        General_info::updateOrCreate(
            [
               'user_id'   => Auth::user()->id,
            ],
            $dataToSave,
        );

        
      


        return redirect()->back();
    }catch(\Exception $e){
        dd($e);
    }

}
}
