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
        <h4 class="text-center pt-2"> Complete the following required information <br>to apply for the post:<b><u> {{$job->title}}</u></b></h4>
    </div>
    
    <div class="container pt-5"
         style="-webkit-box-shadow: 10px 10px 33px 0px rgba(0,0,0,0.75); -moz-box-shadow: 10px 10px 33px 0px rgba(0,0,0,0.75); box-shadow: 10px 10px 33px 0px rgba(0,0,0,0.75);">
       
    
        <br>
        <h3 align="center" class="text-success"> Experience</h3>
        <h4>(A) BANBEIS Survey and Census</h4>
        <!-- Select Basic -->
<form action="{{url('/users/experiences/'.$job->job_id)}}" method="POST" enctype="multipart/form-data">
    @csrf
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>Name of Experience</th>
                <th>Status</th>
                <th>Year of Experience</th>
                <th>Upload Certificate</th>
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
                    <input type="file" name="e_m_s_s_path"/>
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
                <td><input type="file" name="b_p_s_path"/></td>
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
                <td><input type="file" name="p_p_s_path"/></td>
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
                <td><input type="file" name="c_s_path"/></td>
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
                <td><input type="file" name="t_a_s_path"/></td>
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
                <td><input type="file" name="t_s_path"/></td>
            </tr>
            </tbody>
        </table>


        <br><h4>(B) Add other Survey Experience:</h4>
        <div class="form-group" >
            <label class="col-md-4 control-label" for="tvet_survey"> Description of Expericnce</label>
            <div class="col-md-8">
                <textarea class="form-control" name="other_survey">{{isset($experiences)?$experiences->other_survey:''}}</textarea>
                Upload Experience Certificate:<br><input type="file" name="other_survey_path"/>
            </div>
        </div>
        <hr>
        <div class="container bg-light">
            <div class="col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Save </button>
            </div>
        </div>
        <br>
</form>
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