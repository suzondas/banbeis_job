@extends('layout.app')
@section('content')
        <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Opportunity</title>
    <link rel="icon" href="icon.png" type="image/icon type">

    <style>
        .navbar {
            background: skyblue !important;
        }
    </style>
<body>
<div id="app">
    <div class="container-fluid text-center" style="margin: 0; margin-top: 8%">
        <h2 class="text-center pt-2">Your Profile</h2>
    </div>

    <div class="container pt-5"
         style="-webkit-box-shadow: 10px 10px 33px 0px rgba(0,0,0,0.75); -moz-box-shadow: 10px 10px 33px 0px rgba(0,0,0,0.75); box-shadow: 10px 10px 33px 0px rgba(0,0,0,0.75);">

        <form class="form-horizontal">
            <fieldset>

                <!-- Form Name -->

                <!-- Text input-->
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-4 control-label" for="Applicant's Name">Applicant's Name</label>
                        <div class="col-md-5">
                            <input id="Applicant's Name" name="Applicant's Name" type="text" placeholder="Type here..."
                                   class="form-control input-md" required="">

                        </div>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <div class="row">

                        <label class="col-md-4 control-label" for="fathers_name">Father's Name</label>
                        <div class="col-md-5">
                            <input id="fathers_name" name="fathers_name" type="text" placeholder="Type here"
                                   class="form-control input-md" required="">

                        </div>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <div class="row">

                        <label class="col-md-4 control-label" for="mothers_name">Mother's Name</label>
                        <div class="col-md-5">
                            <input id="mothers_name" name="mothers_name" type="text" placeholder="Type here..."
                                   class="form-control input-md" required="">

                        </div>
                    </div>
                </div>

                <!-- Multiple Radios -->
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-4 control-label" for="gender">Gender</label>
                        <div class="col-md-4">
                            <div class="radio">
                                <label for="gender-0">
                                    <input type="radio" name="gender" id="gender-0" value="1">
                                    Male
                                </label>
                            </div>
                            <div class="radio">
                                <label for="gender-1">
                                    <input type="radio" name="gender" id="gender-1" value="2">
                                    Female
                                </label>
                            </div>
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
                                   required="">

                        </div>
                    </div>
                </div>

                <!-- Button Drop Down -->
                <div class="form-group">
                    <div class="row">

                        <label class="col-md-4 control-label" for="nid">NID / Birth Registration Number</label>
                        <div class="col-md-5">
                            <div class="">
                                <label><input type="radio" name="nidYN" value="1"/> NID:</label>
                                <br>
                                <input id="nid" name="nid"
                                       class="form-control"
                                       placeholder="Type here ..."
                                       type="text" required="">Upload NID:<br><input type="file"/>

                            </div>
                            <br>
                            <div class="">
                                <label> <input type="radio" name="nidYN" value="2"/> Birth Registration
                                    Number:</label><br>
                                <input id="birth"
                                       name="nid"
                                       class="form-control"
                                       placeholder="Type here ..."
                                       type="text"
                                       required="">Upload Birth Registration Certificate:<br><input type="file"/>

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
                                    Care of: <input type="text" class="form-control" name="careof"/>
                                </div>
                                <div class="col-md-6">
                                    Village: <input type="text" class="form-control" name="village"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    District: <input type="text" class="form-control" name="district"/>
                                </div>
                                <div class="col-md-6">
                                    Upazila: <input type="text" class="form-control" name="upazila"/>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    Post Office: <input type="text" class="form-control" name="post"/>
                                </div>
                                <div class="col-md-6">
                                    Post Code: <input type="text" class="form-control" name="poscode"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">

                        <label class="col-md-4 control-label" for="marital_status">Mailing Address</label>
                        <div class="col-md-5">
                            <div class="row">
                                <label><input v-model="as_present_address" type="checkbox" class=""/> As Present Address</label>
                            </div>

                            <div v-if="!as_present_address">
                                <div class="row">
                                    <div class="col-md-6">
                                        Care of: <input type="text" class="form-control" name="careof"/>
                                    </div>
                                    <div class="col-md-6">
                                        Village: <input type="text" class="form-control" name="village"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        District: <input type="text" class="form-control" name="district"/>
                                    </div>
                                    <div class="col-md-6">
                                        Upazila: <input type="text" class="form-control" name="upazila"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        Post Office: <input type="text" class="form-control" name="post"/>
                                    </div>
                                    <div class="col-md-6">
                                        Post Code: <input type="text" class="form-control" name="poscode"/>
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
                                   required="">

                        </div>
                    </div>
                </div>

                <!-- Text input-->
                <div class="form-group">
                    <div class="row">

                        <label class="col-md-4 control-label" for="contact_number">Contact Number</label>
                        <div class="col-md-5">
                            <input id="contact_number" name="contact_number" type="text" placeholder="Type Here"
                                   class="form-control input-md" required="">
                            <div class="row pl-3">
                                <label><input type="checkbox" class=""/> Whatsapp available</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <label class="col-md-4 control-label" for="contact_number">Student ID (If any)</label>
                        <div class="col-md-5">
                            Upload ID Card:<br><input type="file"/>
                        </div>
                    </div>
                </div>


                <!-- Select Basic -->
                <hr class="p-2">
                <h3>Educational Qualifications</h3>
                <!-- Select Basic-- Result_table -->
                <div class="container">
                    <div class="row">
                        <table class="table table-bordered table-striped">
                            <tbody>
                            <tr>
                                <td>Examination Name</td>
                                {{--<td>Year</td>--}}
                                <td>Result(Grade/Class)</td>
                                <!--<td>GPA/Marks</td>
                                <td>Passing Year</td>-->
                                <td>Upload File(.pdf format)</td>
                            </tr>
                            <tr>
                                <td>S.S.C</td>
                                {{--<td></td>--}}
                                <td>
                                    <select>
                                        <option>Select</option>
                                        <option>A+</option>
                                        <option>A</option>
                                        <option>A-</option>
                                        <option>B+</option>
                                        <option>B</option>
                                        <option>B-</option>
                                        <option>C</option>
                                        <option>D</option>
                                    </select>
                                </td>
                                <!--<td><input type="text" name="" class="form-control"></td>
                                <td><input type="text" name="" class="form-control"></td>-->
                                <td>Upload Certificate: <input type="file"/></td>
                            </tr>
                            <tr>
                                <td>H.S.C</td>
                                {{--<td></td>--}}
                                <td>
                                    <select>
                                        <option>Select</option>
                                        <option>A+</option>
                                        <option>A</option>
                                        <option>A-</option>
                                        <option>B+</option>
                                        <option>B</option>
                                        <option>B-</option>
                                        <option>C</option>
                                        <option>D</option>
                                    </select>
                                </td>
                                <!--<td><input type="text" name="" class="form-control"></td>
                                <td><input type="text" name="" class="form-control"></td>-->
                                <td>Upload Certificate: <input type="file"/></td>
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
                                    <select>
                                        <option>Select</option>
                                        <option>A+</option>
                                        <option>A</option>
                                        <option>A-</option>
                                        <option>B+</option>
                                        <option>B</option>
                                        <option>B-</option>
                                        <option>C</option>
                                        <option>D</option>
                                    </select>
                                </td>
                                <!--<td><input type="text" name="" class="form-control"></td>
                                <td><input type="text" name="" class="form-control"></td>-->
                                <td>Upload Certificate: <input type="file"/></td>
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
                                    <select>
                                        <option>Select</option>
                                        <option>A+</option>
                                        <option>A</option>
                                        <option>A-</option>
                                        <option>B+</option>
                                        <option>B</option>
                                        <option>B-</option>
                                        <option>C</option>
                                        <option>D</option>
                                    </select>
                                </td>
                                <!--<td><input type="text" name="" class="form-control"></td>
                                <td><input type="text" name="" class="form-control"></td>-->
                                <td>Upload Certificate: <input type="file"/></td>
                            </tr>
                            <tr>
                                <td>Masters</td>
                                {{--<td></td>--}}
                                <td>
                                    <select>
                                        <option>Select</option>
                                        <option>A+</option>
                                        <option>A</option>
                                        <option>A-</option>
                                        <option>B+</option>
                                        <option>B</option>
                                        <option>B-</option>
                                        <option>C</option>
                                        <option>D</option>
                                    </select>
                                </td>
                                <!--<td><input type="text" name="" class="form-control"></td>
                                <td><input type="text" name="" class="form-control"></td>-->
                                <td>Upload Certificate: <input type="file"/></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <hr>
                <div class="">
                    <h3 align="center"> Experience</h3>
                    <br>
                    <h4>(A) BANBEIS Survey and Census</h4>
                    <!-- Select Basic -->

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
                                <select id="english_medium" name="english_medium" class="form-control">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </td>
                            <td><input type="number"/></td>
                            <td><input type="file"/></td>
                        </tr>
                        <tr>
                            <td>2. BANBEIS PEC Survey
                            </td>
                            <td>
                                <select id="" name="" class="form-control">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </td>
                            <td><input type="number"/></td>
                            <td><input type="file"/></td>
                        </tr>
                        <tr>
                            <td>3. Primary PEC Survey
                            </td>
                            <td>
                                <select id="" name="" class="form-control">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </td>
                            <td><input type="number"/></td>
                            <td><input type="file"/></td>
                        </tr>
                        <tr>
                            <td>4. CSSR Survey
                            </td>
                            <td>
                                <select id="" name="" class="form-control">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </td>
                            <td><input type="number"/></td>
                            <td><input type="file"/></td>
                        </tr>
                        <tr>
                            <td>5. Teacher Attrition Survey
                            </td>
                            <td>
                                <select id="" name="" class="form-control">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </td>
                            <td><input type="number"/></td>
                            <td><input type="file"/></td>
                        </tr>
                        <tr>
                            <td>6. TVET Survey
                            </td>
                            <td>
                                <select id="" name="" class="form-control">
                                    <option>Select</option>
                                    <option value="1">Yes</option>
                                    <option value="2">No</option>
                                </select>
                            </td>
                            <td><input type="number"/></td>
                            <td><input type="file"/></td>
                        </tr>

                        </tbody>
                    </table>


                    <br><h4>(B) Add other Survey Experience:</h4>
                    <div class="form-group" >
                        <label class="col-md-4 control-label" for="tvet_survey"> Description of Expericnce</label>
                        <div class="col-md-8">
                            <textarea class="form-control"></textarea>
                            Upload Experience Certificate:<br><input type="file"/>
                        </div>
                    </div>
                </div>
            </fieldset>

            <hr>
            <div class="container bg-light">
                <div class="col-md-12 text-center">
                    <button type="button" class="btn btn-primary">Update</button>
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
            as_present_address:false
        },
        methods: {}
    })
</script>
</body>
</html>
@endsection