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
        .stepper-wrapper {
  margin-top: auto;
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
}
.stepper-item {
  position: relative;
  display: flex;
  flex-direction: column;
  align-items: center;
  flex: 1;

  @media (max-width: 768px) {
    font-size: 12px;
  }
}

.stepper-item::before {
  position: absolute;
  content: "";
  border-bottom: 2px solid #ccc;
  width: 100%;
  top: 20px;
  left: -50%;
  z-index: 2;
}

.stepper-item::after {
  position: absolute;
  content: "";
  border-bottom: 2px solid #ccc;
  width: 100%;
  top: 20px;
  left: 50%;
  z-index: 2;
}

.stepper-item .step-counter {
  position: relative;
  z-index: 5;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 40px;
  height: 40px;
  border-radius: 50%;
  background: #ccc;
  margin-bottom: 6px;
}

.stepper-item.active {
  font-weight: bold;
}

.stepper-item.completed .step-counter {
  background-color: #4bb543;
}

.stepper-item.completed::after {
  position: absolute;
  content: "";
  border-bottom: 2px solid #4bb543;
  width: 100%;
  top: 20px;
  left: 50%;
  z-index: 3;
}

.stepper-item:first-child::before {
  content: none;
}
.stepper-item:last-child::after {
  content: none;
}
    </style>
    
</head>
<body>
<div id="app">
    @if(session()->get('errors'))
    toastr.error("{{ session()->get('errors')->first() }}");
@endif
    <div class="container-fluid text-center" style="margin: 0; margin-top: 8%">
        <h2 class="text-center pt-2">Your Profile</h2>
        <!-- <div style="text-align: right;padding-bottom: 10px;"><a href="{{url('/settings/account-delete')}}"  onclick="return confirm('Are you sure want to Apply?');" class="text-right"><button class="btn btn-danger">Delete Account</button></a></div> -->
    </div>
    <div class="stepper-wrapper">
        <div class="stepper-item {{isset($general_info)?'completed':''}}">
          <div class="step-counter">1</div>
          <div class="step-name">General Information</div>
        </div>
        <div class="stepper-item {{isset($educations)?'completed':''}}">
          <div class="step-counter">2</div>
          <div class="step-name">Educational Information</div>
        </div>
        
      </div>
    <div class="container pt-5"
         style="-webkit-box-shadow: 10px 10px 33px 0px rgba(0,0,0,0.75); -moz-box-shadow: 10px 10px 33px 0px rgba(0,0,0,0.75); box-shadow: 10px 10px 33px 0px rgba(0,0,0,0.75);">
        <nav class="mt-2">
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">General Information</a>
                <a class="nav-item nav-link" id="nav-education-tab" data-toggle="tab" href="#nav-education" role="tab" aria-controls="nav-education" aria-selected="false">Educational Qualifications</a>
            </div>
        </nav>
      <div class="tab-content" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <h2 class="text-center p-5 text-success">General Information</h2>
            
        <form class="form-horizontal" method="POST" action="save_general_info" enctype="multipart/form-data">
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
                                       Upload NID:<br>
                                       <input type="file" name="nid_path"/>

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
                            Upload Birth Registration Certificate: (PDF)<br>
                                       
                            <input type="file" name="birth_reg_num_path"/>

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
                            Upload ID Card: (PDF)<br><input class="" type="file" name="student_file"/>
                        </div>
                    </div>
                </div>
            </fieldset>

            <hr>
            @csrf
            <div class="container bg-light">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
            <br>
        </form>
    </div>

    <div class="tab-pane fade" id="nav-education" role="tabpanel" aria-labelledby="nav-education-tab">
<br>
                <h3 align="center" class="text-success">Educational Qualifications</h3>
                <!-- Select Basic-- Result_table -->
                <div class="container">
                    <form action="educations" method="POST" enctype="multipart/form-data">
                    <?php
                    $sscHscResultArray = ["Not Applicable"=>0, "A+"=>5,"A"=>4,"A-"=>3.5,"B"=>3,"C"=>2,"D"=>1,
                    "First_Division"=>'5.0',"Second_Division"=>'4.0',"Third_Division"=>'3.0'];


                    $honsMastersResultArray = ["Not Applicable"=>0, "A+ (CGPA: 4)"=>4,"A  (CGPA: 3.5 to 3.99)"=>3.5,"A- (CGPA: 3.0 to 3.49)"=>3.0,"B (CGPA: 2.5 to 2.99)"=>2.5,"C (CGPA: 2.0 to 2.49)"=>2,"D (CGPA: 1.0 to 1.99)"=>1,
                    "First_Division"=>'4.0',"Second_Division"=>'3.0',"Third_Division"=>'2.0'];
                    ?>
                    
                    <div class="row">
                        <table class="table table-bordered table-striped">
                            <tbody>
                            <tr>
                                <td>Examination Name</td>
                                {{--<td>Year</td>--}}
                                <td>Result(Grade/Division)</td>
                                <!--<td>GPA/Marks</td>
                                <td>Passing Year</td>-->
                                <td>Upload File(.pdf format)</td>
                            </tr>
                            <tr>
                                <td>S.S.C/Equivalent</td>
                                {{--<td></td>--}}
                                <td>
                                 
                                    <select name="ssc">
                                        @foreach($sscHscResultArray as $key=>$val)
                                        {{$val}}
                                        <option value="{{$val}}"
                                        @if(isset($educations))
                                        @if(strval($educations->ssc)===strval($val))
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
                                    Upload Certificate: <input type="file" name="ssc_path"/>
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
                                        @if(strval($educations->hsc)===strval($val))
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
                                    Upload Certificate: <input type="file" name="hsc_path"/>
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
                                        @foreach($honsMastersResultArray as $key=>$val)
                                        <option value="{{$val}}"
                                        @if(isset($educations))
                                        @if(strval($educations->degree)===strval($val))
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
                                    Upload Certificate: <input type="file" name="degree_path"/>
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
                                        @foreach($honsMastersResultArray as $key=>$val)
                                        <option value="{{$val}}"
                                        @if(isset($educations))
                                        @if(strval($educations->honors)===strval($val))
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
                                    Upload Certificate: <input type="file" name="honors_path"/>
                                </td>
                            </tr>
                            <tr>
                                <td>Masters</td>
                                {{--<td></td>--}}
                                <td>
                                    <select name="masters">
                                        @foreach($honsMastersResultArray as $key=>$val)
                                        <option value="{{$val}}"
                                        @if(isset($educations))
                                        @if(strval($educations->masters)===strval($val))
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
                                    Upload Certificate: <input type="file" name="masters_path"/>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <hr>
                        @csrf
                        <div class="container bg-light">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Save </button>
                            </div>
                        </div>
                        <br>
                        <br>
                    </div>
                    </form>
                </div>
    </div>
    
    </div>
</div>
</div>
<script type="text/javascript">

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