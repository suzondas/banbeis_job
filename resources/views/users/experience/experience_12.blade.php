@extends('layout.app')
@section('content')
        
<div id="app">
    @if(session()->get('errors'))
    toastr.error("{{ session()->get('errors')->first() }}");
    @endif
    <div class="container-fluid text-center" style="margin: 0; margin-top: 8%">
        <h4 class="text-center pt-2"> Complete the following required information <br>to apply for the post:<b><u> {{$job->title}}</u></b></h4>
    </div>
    
    <div class="container pt-5 col-md-5"
         style="-webkit-box-shadow: 10px 10px 33px 0px rgba(0,0,0,0.75); -moz-box-shadow: 10px 10px 33px 0px rgba(0,0,0,0.75); box-shadow: 10px 10px 33px 0px rgba(0,0,0,0.75);">
       
         <form style="padding-bottom:10px;">
            <div class="form-group">
            <label for="eiin">Institute EIIN</label>

                <div class="w-50 d-flex">
                    <input type="number" class="form-control" id="eiin" name="eiin" style="flex: 1"  required>
                    <button type="button" class="btn btn-primary ml-2">Fetch</button>
                </div>
            </div>
            <div class="form-group">
                <label for="institute_name">Institute Name</label>
                <input type="text" class="form-control" id="institute_name" name="institute_name" disabled  required>
            </div>
            <div class="form-group">
                <label for="district">District</label>
                <input type="text" class="form-control" id="district" name="district" disabled  required>
            </div>
            <div class="form-group">
                <label for="upazila">Upazila</label>
                <input type="text" class="form-control" id="upazila" name="upazila" disabled required>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" >
            </div>
            <div class="form-group">
                <label for="bmed">Having B.Ed/M. Ed Degree?</label>
                <select class="form-control" id="bmed" name="bmed">
                <option value="1">Yes</option>
                <option value="0">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ict_training">Having ICT Training?</label>
                <select class="form-control" id="ict_training" name="ict_training">
                <option value="1">Yes</option>
                <option value="0">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ict_diploma">Having ICT Diploma?</label>
                <select class="form-control" id="ict_diploma" name="ict_diploma">
                <option value="2">Yes</option>
                <option value="0">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="ict_graduate">Are you Graduate on (ICT/Computer Science)?</label>
                <select class="form-control" id="ict_graduate" name="ict_graduate">
                <option value="3">Yes</option>
                <option value="0">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="district_ambassador">Are you ICT4E District Ambassador?</label>
                <select class="form-control" id="district_ambassador" name="district_ambassador">
                <option value="1">Yes</option>
                <option value="0">No</option>
                </select>
            </div>
            <div class="form-group">
                <label for="muktopath_content_developer">Are you best Muktopath Content Developer?</label>
                <select class="form-control" id="muktopath_content_developer" name="muktopath_content_developer">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
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

@endsection