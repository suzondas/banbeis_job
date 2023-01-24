@extends('layout.app')
@section('content')
        <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>BANBEIS JOB</title>
    <link rel="icon" href="icon.png" type="image/icon type">

    <style>
        .navbar {
            background: skyblue !important;
        }
    </style>
    
</head>
<body>
<div id="app">
    @if(session()->get('errors'))
    toastr.error("{{ session()->get('errors')->first() }}");
@endif

    <div class="container-fluid text-center" style="margin: 0; margin-top: 8%">
<a  style="color: blue; text-decoration: underline;" href="{{ url()->previous()}}">< Back</a>

        <h2 class="text-center pt-2">Profile of {{isset($general_info)?$general_info->name:''}}</h2>
    </div>

    <div class="container pt-5"
         style="-webkit-box-shadow: 10px 10px 33px 0px rgba(0,0,0,0.75); -moz-box-shadow: 10px 10px 33px 0px rgba(0,0,0,0.75); box-shadow: 10px 10px 33px 0px rgba(0,0,0,0.75);">
        <nav class="mt-2">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">General Information</a>
                <a class="nav-item nav-link" id="nav-education-tab" data-toggle="tab" href="#nav-education" role="tab" aria-controls="nav-education" aria-selected="false">Educational Qualifications</a>
                <a class="nav-item nav-link" id="nav-experience-tab" data-toggle="tab" href="#nav-experience" role="tab" aria-controls="nav-experience" aria-selected="false">Experience</a>
            </div>
        </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <h2 class="text-center p-5 text-success">General Information</h2>
            
            <fieldset>

                <!-- Form Name -->

                <!-- Text input-->
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-4 control-label" for="Applicant's Name">Applicant's Name</label>
                        <div class="col-md-5">
                            <input value="{{isset($general_info)?$general_info->name:''}}" id="Applicant's Name" name="name" type="text" placeholder="Type here..."
                                   class="form-control input-md" required="required">

                        </div>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <div class="row">

                        <label class="col-md-4 control-label" for="fathers_name">Father's Name</label>
                        <div class="col-md-5">
                            <input id="fathers_name" name="fathers_name" type="text" placeholder="Type here"
                                   class="form-control input-md" required="" value="{{isset($general_info)?$general_info->fathers_name:''}}">

                        </div>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <div class="row">

                        <label class="col-md-4 control-label" for="mothers_name">Mother's Name</label>
                        <div class="col-md-5">
                            <input id="mothers_name" name="mothers_name" type="text" placeholder="Type here..."
                                   class="form-control input-md" required="" value="{{isset($general_info)?$general_info->mothers_name:''}}">

                        </div>
                    </div>
                </div>

                <!-- Multiple Radios -->
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-4 control-label" for="gender">Gender</label>
                        <div class="col-md-2">
                            <select name="gender" class="form-control">
                                <option value="male"
                                @if(isset($general_info))
                                @if($general_info->gender=='male')
                                selected
                                @endif
                                @endif>Male</option>
                                <option value="female"
                                @if(isset($general_info))
                                @if($general_info->gender=='female')
                                selected
                                @endif
                                @endif>Female</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <div class="row">

                        <label class="col-md-4 control-label" for="dob">Date of Birth</label>
                        <div class="col-md-3">
                            <input id="dob" name="dob" type="date" placeholder="Type here..."
                                   class="form-control input-md"
                                   required="" value="{{isset($general_info)?$general_info->dob:''}}">

                        </div>
                    </div>
                </div>

                <!-- Button Drop Down -->
                <div class="form-group">
                    <div class="row">

                        <label class="col-md-4 control-label" for="nid">NID / Birth Registration Number</label>
                        <div class="col-md-5">
                            <div class="">
                                <label><input type="radio" name="nid_or_birth_reg_num" value="1"
                                    @if(isset($general_info))
                                    @if($general_info->nid_or_birth_reg_num=='1')
                                    checked
                                    @endif
                                    @endif
                                    /> NID:</label>
                                <br>
                                <input id="nid" name="nid"
                                       class="form-control"
                                       placeholder="Type here ..."
                                       type="text"  value="{{isset($general_info)?$general_info->nid:''}}">
                                       
                                       @if(isset($general_info))
                                       @if(isset($general_info->nid_path))
                                       <a class="btn btn-success" target="_blank" href="{{asset('/profile_photos/'.$general_info->nid_path)}}">View File</a><br>
                                       @endif
                                       @endif
                                      

                            </div>
                            <br>
                            <div class="">
                                <label> <input type="radio" name="nid_or_birth_reg_num" value="2"
                                    @if(isset($general_info))
                                    @if($general_info->nid_or_birth_reg_num=='2')
                                    checked
                                    @endif
                                    @endif
                                    /> Birth Registration
                                    Number:</label><br>
                                <input id="birth"
                                       name="birth_reg_num"
                                       class="form-control"
                                       placeholder="Type here ..."
                                       type="text"
                                        value="{{isset($general_info)?$general_info->birth_reg_num:''}}">
                                       @if(isset($general_info))
                            @if(isset($general_info->birth_reg_num_path))
                            <a class="btn btn-success" target="_blank" href="{{asset('/profile_photos/'.$general_info->birth_reg_num_path)}}">View File</a><br>
                            @endif
                            @endif
                           

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Select Basic -->
                {{--<div class="form-group">
                    <div class="row">

                        <label class="col-md-4 control-label" for="religion">Religion</label>
                        <div class="col-md-3">
                            <select id="religion" name="religion" class="form-control">
                                <option>Select</option>
                                <option value="1">Islam</option>
                                <option value="2">Hinduism</option>
                                <option value="3">Buddhism</option>
                                <option value="4">Christian</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Select Basic -->
                <div class="form-group">
                    <div class="row">

                        <label class="col-md-4 control-label" for="marital_status">Marital Status</label>
                        <div class="col-md-3">
                            <select id="marital_status" name="marital_status" class="form-control">
                                <option>Select</option>
                                <option value="1">Single</option>
                                <option value="2">Married</option>
                            </select>
                        </div>
                    </div>
                </div>
    --}}
                <div class="form-group">
                    <div class="row">

                        <label class="col-md-4 control-label" for="marital_status">Present Address</label>
                        <div class="col-md-5">
                            <div class="row">
                                <div class="col-md-6">
                                    Care of: <input type="text" class="form-control" name="care_of" value="{{isset($general_info)?$general_info->care_of:''}}"/>
                                </div>
                                <div class="col-md-6">
                                    Village: <input type="text" class="form-control" name="village" value="{{isset($general_info)?$general_info->village:''}}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    District: <input type="text" class="form-control" name="district" value="{{isset($general_info)?$general_info->district:''}}"/>
                                </div>
                                <div class="col-md-6">
                                    Upazila: <input type="text" class="form-control" name="upazila" value="{{isset($general_info)?$general_info->upazila:''}}"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    Post Office: <input type="text" class="form-control" name="post_office" value="{{isset($general_info)?$general_info->post_office:''}}"/>
                                </div>
                                <div class="col-md-6">
                                    Post Code: <input type="text" class="form-control" name="post_code" value="{{isset($general_info)?$general_info->post_code:''}}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">

                        <label class="col-md-4 control-label" for="marital_status">Mailing Address</label>
                        <div class="col-md-5">
                            <div class="">
                                {{-- {{$general_info->is_pa_ma}} --}}
                                <label><select class="form-control" name="is_pa_ma">
                                    <option value="1"
                                    @if(isset($general_info))
                                    @if($general_info->is_pa_ma=='1')
                                    selected
                                    @endif
                                    @endif
                                    > Present Address</option>
                                    <option value="2"
                                    @if(isset($general_info))
                                    @if($general_info->is_pa_ma=='2')
                                    selected
                                    @endif
                                    @endif
                                    > Different Address</option>
                                is_pa_ma</select></label>
                            </div>

                            <div v-if="!is_pa_ma">
                                <div class="row">
                                    <div class="col-md-6">
                                        Care of: <input type="text" class="form-control" name="ma_care_of" value="{{isset($general_info)?$general_info->ma_care_of:''}}"/>
                                    </div>
                                    <div class="col-md-6">
                                        Village: <input type="text" class="form-control" name="ma_village" value="{{isset($general_info)?$general_info->ma_village:''}}"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        District: <input type="text" class="form-control" name="ma_district" value="{{isset($general_info)?$general_info->ma_district:''}}"/>
                                    </div>
                                    <div class="col-md-6">
                                        Upazila: <input type="text" class="form-control" name="ma_upazila" value="{{isset($general_info)?$general_info->ma_upazila:''}}"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        Post Office: <input type="text" class="form-control" name="ma_post_office" value="{{isset($general_info)?$general_info->ma_post_office:''}}"/>
                                    </div>
                                    <div class="col-md-6">
                                        Post Code: <input type="text" class="form-control" name="ma_post_code" value="{{isset($general_info)?$general_info->ma_post_code:''}}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <div class="row">

                        <label class="col-md-4 control-label" for="email">Email</label>
                        <div class="col-md-5">
                            <input id="email" name="email" type="text" placeholder="Type here"
                                   class="form-control input-md"
                                   required="" value="{{isset($general_info)?$general_info->email:''}}">

                        </div>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <div class="row">

                        <label class="col-md-4 control-label" for="contact_number">Contact Number</label>
                        <div class="col-md-5">
                            <input id="contact_number" name="contact_num" type="text" placeholder="Type Here"
                                   class="form-control input-md" required="" value="{{isset($general_info)?$general_info->contact_num:''}}">
                            <div class="row pl-3">
                                <label>Whatsapp available: <select class="form-control" name="is_contact_num_whatsapp">
                                    <option value="1"
                                    @if(isset($general_info))
                                    @if($general_info->is_contact_num_whatsapp=='1')
                                    selected
                                    @endif
                                    @endif
                                    >Yes</option>
                                    <option value="2"
                                    @if(isset($general_info))
                                    @if($general_info->is_contact_num_whatsapp=='2')
                                    selected
                                    @endif
                                    @endif>No</option></select></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-4 control-label" for="contact_number">Student ID (If any)</label>
                        <div class="col-md-5">
                            @if(isset($general_info))
                            @if(isset($general_info->student_id_path))
                            <a class="btn btn-success" target="_blank" href="{{asset('/profile_photos/'.$general_info->student_id_path)}}">View File</a><br>
                            @endif
                            @endif
                            </div>
                    </div>
                </div>
            </fieldset>

            <hr>
            <br>
    </div>

    <div class="tab-pane fade" id="nav-education" role="tabpanel" aria-labelledby="nav-education-tab">
<br>
                <h3 align="center" class="text-success">Educational Qualifications</h3>
                <!-- Select Basic-- Result_table -->
                <div class="container">
                    <?php
                    $sscHscResultArray = ["Not Applicable"=>0, "A+"=>5,"A"=>4,"A-"=>3.5,"B"=>3,"C"=>2,"D"=>1,
                    "First_Division"=>4.5,"Second_Division"=>3.25,"Third_Division"=>1.5];
                    ?>
                    <div class="row">
                        <table class="table table-bordered table-striped">
                            <tbody>
                            <tr>
                                <td>Examination Name</td>
                                {{--<td>Year</td>--}}
                                <td>Result(Grade/Class)</td>
                                <!--<td>GPA/Marks</td>
                                <td>Passing Year</td>-->
                                <td>Uploaded Documents</td>
                                
                            </tr>
                            <tr>
                                <td>S.S.C/Equivalent</td>
                                {{--<td></td>--}}
                                <td>
                                    <select name="ssc">
                                        @foreach($sscHscResultArray as $key=>$val)
                                        <option value="{{$val}}"
                                        @if(isset($educations))
                                        @if($educations->ssc==$val)
                                        selected
                                        @endif
                                        @endif
                                        >{{$key}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <!--<td><input type="text" name="" class="form-control"></td>
                                <td><input type="text" name="" class="form-control"></td>-->
                                <td>
                                    @if(isset($educations))
                                    @if(isset($educations->ssc_path))
                                    <a class="btn btn-success" target="_blank" href="{{asset('/profile_photos/'.$educations->ssc_path)}}">View File</a><br>
                                    @endif
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>H.S.C/Equivalent</td>
                                {{--<td></td>--}}
                                <td>
                                    <select name="hsc">
                                        @foreach($sscHscResultArray as $key=>$val)
                                        <option value="{{$val}}"
                                        @if(isset($educations))
                                        @if($educations->hsc==$val)
                                        selected
                                        @endif
                                        @endif
                                        >{{$key}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <!--<td><input type="text" name="" class="form-control"></td>
                                <td><input type="text" name="" class="form-control"></td>-->
                                <td>
                                    @if(isset($educations))
                                    @if(isset($educations->hsc_path))
                                    <a class="btn btn-success" target="_blank" href="{{asset('/profile_photos/'.$educations->hsc_path)}}">View File</a><br>
                                    @endif
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Degree(pass)</td>
                                {{-- <td>
                                     <select class="form-control" name="">
                                         <option value="0">select</option>
                                         <option value="1">1st yr</option>
                                         <option value="3">2nd yr</option>
                                         <option value="4">3rd yr</option>
                                     </select>
                                 </td>--}}
                                <td>
                                    <select name="degree">
                                        @foreach($sscHscResultArray as $key=>$val)
                                        <option value="{{$val}}"
                                        @if(isset($educations))
                                        @if($educations->degree==$val)
                                        selected
                                        @endif
                                        @endif
                                        >{{$key}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <!--<td><input type="text" name="" class="form-control"></td>
                                <td><input type="text" name="" class="form-control"></td>-->
                                <td>
                                    @if(isset($educations))
                                    @if(isset($educations->degree_path))
                                    <a class="btn btn-success" target="_blank" href="{{asset('/profile_photos/'.$educations->degree_path)}}">View File</a><br>
                                    @endif
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Degree(Honor's)</td>
                                {{--<td>
                                    <select class="form-control" name="">
                                        <option value="0">select</option>
                                        <option value="1">1st yr</option>
                                        <option value="2">2nd yr</option>
                                        <option value="3">3rd yr</option>
                                        <option value="4">4th yr</option>
                                    </select>
                                </td>--}}
                                <td>
                                    <select name="honors">
                                        @foreach($sscHscResultArray as $key=>$val)
                                        <option value="{{$val}}"
                                        @if(isset($educations))
                                        @if($educations->honors==$val)
                                        selected
                                        @endif
                                        @endif
                                        >{{$key}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <!--<td><input type="text" name="" class="form-control"></td>
                                <td><input type="text" name="" class="form-control"></td>-->
                                <td>
                                    @if(isset($educations))
                                    @if(isset($educations->honors_path))
                                    <a class="btn btn-success" target="_blank" href="{{asset('/profile_photos/'.$educations->honors_path)}}">View File</a><br>
                                    @endif
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>Masters</td>
                                {{--<td></td>--}}
                                <td>
                                    <select name="masters">
                                        @foreach($sscHscResultArray as $key=>$val)
                                        <option value="{{$val}}"
                                        @if(isset($educations))
                                        @if($educations->masters==$val)
                                        selected
                                        @endif
                                        @endif
                                        >{{$key}}</option>
                                        @endforeach
                                    </select>
                                </td>
                                <!--<td><input type="text" name="" class="form-control"></td>
                                <td><input type="text" name="" class="form-control"></td>-->
                                <td>
                                    @if(isset($educations))
                                    @if(isset($educations->masters_path))
                                    <a class="btn btn-success" target="_blank" href="{{asset('/profile_photos/'.$educations->masters_path)}}">View File</a><br>
                                    @endif
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <hr>
                        
                        <br>
                        <br>
                    </div>
                </div>
    </div>
    <div class="tab-pane fade" id="nav-experience" role="tabpanel" aria-labelledby="nav-experience-tab">

    <div class="">
        <br>
        <h3 align="center" class="text-success"> Experience</h3>
        <h4>(A) BANBEIS Survey and Census</h4>
        <!-- Select Basic -->
    @csrf
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Name of Experience</th>
            <th>Status</th>
            <th>Year of Experience</th>
            <th>Uploaded Documents</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>1. English Medium School
                Survey
            </td>
            <td>
                <select id="english_medium" name="e_m_s_s" class="form-control">
                    <option value="1"
                                @if(isset($experiences))
                                @if($experiences->e_m_s_s=='1')
                                selected
                                @endif
                                @endif
                    >Not Experienced</option>
                    <option value="2"
                    @if(isset($experiences))
                    @if($experiences->e_m_s_s=='2')
                    selected
                    @endif
                    @endif
                    >Experienced</option>
                </select>
            </td>
            <td><input type="number" name="e_m_s_s_experience" value="{{isset($experiences)?$experiences->e_m_s_s_experience:''}}"/></td>
            <td>
                        @if(isset($experiences))
                            @if(isset($experiences->e_m_s_s_path))
                            <a class="btn btn-success" target="_blank" href="{{asset('/profile_photos/'.$experiences->e_m_s_s_path)}}">View File</a><br>
                            @endif
                        @endif

            </td>
        </tr>
        <tr>
            <td>2. BANBEIS PEC Survey
            </td>
            <td>
                <select id="" name="b_p_s" class="form-control">
                    
                    <option value="1" 
                    @if(isset($experiences))
                    @if($experiences->b_p_s=='1')
                    selected
                    @endif
                    @endif
                    >Not Experienced</option>
                    <option value="2"
                    @if(isset($experiences))
                    @if($experiences->b_p_s=='2')
                    selected
                    @endif
                    @endif
                    > Experienced</option>
                </select>
            </td>
            <td><input type="number" name="b_p_s_experience" value="{{isset($experiences)?$experiences->b_p_s_experience:''}}"/></td>
            <td>
                        @if(isset($experiences))
                            @if(isset($experiences->b_p_s_path))
                            <a class="btn btn-success" target="_blank" href="{{asset('/profile_photos/'.$experiences->b_p_s_path)}}">View File</a><br>
                            @endif
                        @endif
                    </td>
        </tr>
        <tr>
            <td>3. Primary PEC Survey
            </td>
            <td>
                <select id="" name="p_p_s" class="form-control">
                    
                    <option value="1"
                    @if(isset($experiences))
                    @if($experiences->p_p_s=='1')
                    selected
                    @endif
                    @endif
                    >Not Experienced</option>
                    <option value="2"
                    @if(isset($experiences))
                    @if($experiences->p_p_s=='2')
                    selected
                    @endif
                    @endif
                    > Experienced</option>
                </select>
            </td>
            <td><input type="number" name="p_p_s_experience" value="{{isset($experiences)?$experiences->p_p_s_experience:''}}"/></td>
            <td>
                    @if(isset($experiences))
                            @if(isset($experiences->p_p_s_path))
                            <a class="btn btn-success" target="_blank" href="{{asset('/profile_photos/'.$experiences->p_p_s_path)}}">View File</a><br>
                            @endif
                        @endif
                    </td>
        </tr>
        <tr>
            <td>4. CSSR Survey
            </td>
            <td>
                <select id="" name="c_s" class="form-control">
                    
                    <option value="1"
                    @if(isset($experiences))
                    @if($experiences->c_s=='1')
                    selected
                    @endif
                    @endif
                    >Not Experienced</option>
                    <option value="2"
                    @if(isset($experiences))
                    @if($experiences->c_s=='2')
                    selected
                    @endif
                    @endif
                    > Experienced</option>
                </select>
            </td>
            <td><input type="number" name="c_s_experience"  value="{{isset($experiences)?$experiences->c_s_experience:''}}"/></td>
            <td>
                        @if(isset($experiences))
                            @if(isset($experiences->c_s_path))
                            <a class="btn btn-success" target="_blank" href="{{asset('/profile_photos/'.$experiences->c_s_path)}}">View File</a><br>
                            @endif
                        @endif
                    </td>
        </tr>
        <tr>
            <td>5. Teacher Attrition Survey
            </td>
            <td>
                <select id="" name="t_a_s" class="form-control">
                   
                    <option value="1"
                    @if(isset($experiences))
                    @if($experiences->t_a_s=='1')
                    selected
                    @endif
                    @endif
                    >Not Experienced</option>
                    <option value="2"
                    @if(isset($experiences))
                    @if($experiences->t_a_s=='2')
                    selected
                    @endif
                    @endif
                    > Experienced</option>
                </select>
            </td>
            <td><input type="number" name="t_a_s_experience" value="{{isset($experiences)?$experiences->t_a_s_experience:''}}"/></td>
            <td> @if(isset($experiences))
                @if(isset($experiences->t_a_s_path))
                <a class="btn btn-success" target="_blank" href="{{asset('/profile_photos/'.$experiences->t_a_s_path)}}">View File</a><br>
                @endif
            @endif
        </td>
        </tr>
        <tr>
            <td>6. TVET Survey
            </td>
            <td>
                <select id="" name="t_s" class="form-control">
                  
                    <option value="1"
                    @if(isset($experiences))
                    @if($experiences->t_s=='1')
                    selected
                    @endif
                    @endif
                    >Not Experienced</option>
                    <option value="2"
                    @if(isset($experiences))
                    @if($experiences->t_s=='2')
                    selected
                    @endif
                    @endif
                    > Experienced</option>
                </select>
            </td>
            <td><input type="number" name="t_s_experience" value="{{isset($experiences)?$experiences->t_s_experience:''}}"/></td>
            <td>
                @if(isset($experiences))
                @if(isset($experiences->t_s_path))
                <a class="btn btn-success" target="_blank" href="{{asset('/profile_photos/'.$experiences->t_s_path)}}">View File</a><br>
                @endif
            @endif
        </td>
        </tr>
        </tbody>
    </table>


    <br><h4>(B) Add other Survey Experience:</h4>
    <div class="form-group" >
        <label class="col-md-4 control-label" for="tvet_survey"> Description of Expericnce</label>
        <div class="col-md-8">
            <textarea class="form-control" name="other_survey">{{isset($experiences)?$experiences->other_survey:''}}</textarea>
            <br>
            @if(isset($experiences))
            @if(isset($experiences->other_survey_path))
            <a class="btn btn-success" target="_blank" href="{{asset('/profile_photos/'.$experiences->other_survey_path)}}">View Certificate</a><br>
            @endif
        @endif
        </div>
    </div>
    <hr>
    <div class="container bg-light">
        <div class="col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Save </button>
        </div>
    </div>
    <br>
    </div>
</div>
    </div>
</div>
</div>
<script type="text/javascript">
 $('#app :input').prop('disabled', true);

    new Vue({
        el: '#app',
        data: {
            items: [],
            is_pa_ma:false
        },
        methods: {}
    })
</script>
</body>
</html>
@endsection