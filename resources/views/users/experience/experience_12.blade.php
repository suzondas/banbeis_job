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
       
         <form action="{{url('/users/experience/'.$job->job_id)}}" method="POST" enctype="multipart/form-data">
         @csrf

         <div class="form-group">
            <label for="eiin">Institute EIIN</label>

                <div class="w-50 d-flex">
                    <input type="number" class="form-control" id="getEiin"  style="flex: 1"  required>
                    <input type="hidden" name="eiin" id="eiin" />
                    <button type="button" class="btn btn-primary ml-2" v-on:click="getEiinDetail()">Fetch</button>
                </div>
            </div>
            <div class="form-group">
                <label for="institute_name">Institute Name</label>
                <input type="text" class="form-control" id="institute_name" name="institute_name"   required>
            </div>
            <div class="form-group">
                <label for="institute_name">Education Level</label>
                <input type="text" class="form-control" id="education_level" name="education_level"   required>
            </div>
            <div class="form-group">
                <label for="district">District</label>
                <input type="text" class="form-control" id="district" name="district"   required>
            </div>
            <div class="form-group">
                <label for="upazila">Upazila</label>
                <input type="text" class="form-control" id="upazila" name="upazila"  required>
            </div>
            <div class="form-group">
                <label for="subject">Subject</label>
                <select name="subject" class="form-control">
                    <option value='Bangla'>Bangla</option>
                    <option value='English'>English</option>
                    <option value='History'>History</option>
                    <option value='Career Education'>Career Education</option>
                    <option value='Geography'>Geography</option>
                    <option value='Philosophy/Logic'>Philosophy/Logic</option>
                    <option value='Arabic'>Arabic</option>
                    <option value='Sanskrit'>Sanskrit</option>
                    <option value='Music'>Music</option>
                    <option value='Fine Arts And Music'>Fine Arts And Music</option>
                    <option value='Arts And Crafts'>Arts And Crafts</option>
                    <option value='Political Science/Civics'>Political Science/Civics</option>
                    <option value='Social Science'>Social Science</option>
                    <option value='Social Welfare'>Social Welfare</option>
                    <option value='Economics'>Economics</option>
                    <option value='Biology'>Biology</option>
                    <option value='Botany'>Botany</option>
                    <option value='Zoology'>Zoology</option>
                    <option value='Chemistry'>Chemistry</option>
                    <option value='Mathematics'>Mathematics</option>
                    <option value='Statistics'>Statistics</option>
                    <option value='Physics'>Physics</option>
                    <option value='Ict Education'>Ict Education</option>
                    <option value='Geography And Environment'>Geography And Environment</option>
                    <option value='Psychology'>Psychology</option>
                    <option value='Accounting / Book Keeping'>Accounting / Book Keeping</option>
                    <option value='Management'>Management</option>
                    <option value='Archeology'>Archeology</option>
                    <option value='Ethnic Language and Culture'>Ethnic Language and Culture</option>
                    <option value='Physical Education, Health Sciecne and Sports'>Physical Education, Health Sciecne and Sports</option>
                    <option value='Marketing'>Marketing</option>
                    <option value='Others'>Others</option>
                    <option value='Business Entrepreneurship'>Business Entrepreneurship</option>
                    <option value='Banking'>Banking</option>
                    <option value='Home Economics'>Home Economics</option>
                    <option value='Islamic Studies'>Islamic Studies</option>
                    <option value='Home Science'>Home Science</option>
                    <option value='Computer Science'>Computer Science</option>
                    <option value='Civics and Good Governance/ Political Science'>Civics and Good Governance/ Political Science</option>
                    <option value='Food Processing'>Food Processing</option>
                    <option value='Enthropology'>Enthropology</option>
                    <option value='General Mechanics'>General Mechanics</option>
                    <option value='Secretarial Science'>Secretarial Science</option>
                    <option value='Social Walfare'>Social Walfare</option>
                    <option value='Agricultural Science'>Agricultural Science</option>
                    <option value='Business Policy and Enforcement'>Business Policy and Enforcement</option>
                    <option value='Business Organization and Management'>Business Organization and Management</option>
                    <option value='Production Management and Marketing'>Production Management and Marketing</option>
                    <option value='Library Science'>Library Science</option>
                    <option value='Physical Education And Sports'>Physical Education And Sports</option>
                    <option value='Soil Science'>Soil Science</option>
                    <option value='Finance and Production and Marketing'>Finance and Production and Marketing</option>
                    <option value='Commercial Geography'>Commercial Geography</option>
                    <option value='Work Centric Education'>Work Centric Education</option>
                    <option value='Library And Information Science'>Library And Information Science</option>
                    <option value='Finance, Banking and Insurance'>Finance, Banking and Insurance</option>
                    <option value='Fine Arts'>Fine Arts</option>
                    <option value='Hadit'>Hadit</option>
                    <option value='Islam (Religion) And Moral Education'>Islam (Religion) And Moral Education</option>
                    <option value='History of the Emergence of Independent Bangladesh'>History of the Emergence of Independent Bangladesh</option>
                    <option value='Civics And Citizenship'>Civics And Citizenship</option>
                    <option value='Logic'>Logic</option>
                    <option value='Bangla Lang.& Litarature'>Bangla Lang.& Litarature</option>
                    <option value='Bangla National Language'>Bangla National Language</option>
                    <option value='General Science'>General Science</option>
                    <option value='Hindu (Religion) And Moral Education'>Hindu (Religion) And Moral Education</option>
                    <option value='Drama and Media Study'>Drama and Media Study</option>
                    <option value='Sports Sciecnce'>Sports Sciecnce</option>
                    <option value='Nazrul Songs'>Nazrul Songs</option>
                    <option value='Village Song'>Village Song</option>
                    <option value='Food and Nutrition '>Food and Nutrition </option>
                    <option value='Child Development '>Child Development </option>
                    <option value='Christian(Religion) And Moral Education'>Christian(Religion) And Moral Education</option>
                    <option value='Rabindra Songs'>Rabindra Songs</option>
                    <option value='Home Management and family life'>Home Management and family life</option>
                    <option value='Food And Nutrition Science'>Food And Nutrition Science</option>
                    <option value='Low voice song'>Low voice song</option>
                    <option value='Pali'>Pali</option>
                    <option value='Fisheries'>Fisheries</option>
                    <option value='Buddist(Religion) And Moral Education'>Buddist(Religion) And Moral Education</option>
                    <option value='Higher Mathematics'>Higher Mathematics</option>
                    <option value='High Voice Song'>High Voice Song</option>
                    <option value='Persian/Farsi'>Persian/Farsi</option>
                    <option value='Urdu'>Urdu</option>
                    <option value='Bangladesh And Global Studies'>Bangladesh And Global Studies</option>
                    <option value='History  Of Bangladesh And World Civilization'>History  Of Bangladesh And World Civilization</option>
                    <option value='Information And Communication Technology'>Information And Communication Technology</option>
                    <option value='Finance And Banking'>Finance And Banking</option>
                    <option value='Islamic History And Culture'>Islamic History And Culture</option>
                    <option value='Sociology'>Sociology</option>
                    <option value='Agriculture Studies'>Agriculture Studies</option>
                    <option value='Dramatics'>Dramatics</option>
                    <option value='Tourism and Hospitality'>Tourism and Hospitality</option>
                    <option value='Industrial and textile costumes'>Industrial and textile costumes</option>
                    <option value='Agro Economics'>Agro Economics</option>
                    <option value='Work and life centric Education'>Work and life centric Education</option>
                    <option value="other">Other</option>
                </select>
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
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script type="text/javascript">

    new Vue({
        el: '#app',
        data: {
            items: [],
            is_pa_ma:false
        },
        methods: {
            getEiinDetail:function(){
                
                axios.get('http://192.168.245.33/tst?eiin='+$("#getEiin").val())
                .then(function (response) {
                   console.log(response);
                   $("#eiin").val(response.data.EIIN)
                   $("#institute_name").val(response.data.INSTITUTE_NAME_NEW)
                   $("#education_level").val(response.data.EDUCATION_LEVEL_NAME)
                   $("#district").val(response.data.DISTRICT_NAME)
                   $("#upazila").val(response.data.THANA_NAME)
                })
                .catch(function (error) {
                    console.log(error);
                
                });
            }
        }
    })
</script>

@endsection