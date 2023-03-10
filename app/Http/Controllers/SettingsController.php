<?php

namespace App\Http\Controllers;

use App\Application;
use App\Educations;
use App\Experiences;
use App\General_info;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
    
    public function accountDelete(){

        $user_id = Auth::user()->id;

        User::find($user_id)->delete();
        General_info::where('user_id',$user_id)->delete();
        // Experiences::where('user_id',$user_id)->delete();
        Educations::where('user_id',$user_id)->delete();
        Application::where('user_id',$user_id)->delete();
        Auth::logout();
        return redirect('/');
    }

    public function getEiinDetail($eiin){
    $eiin=112211;
        $conn = oci_connect('survey2022', 'Survey2022#banbeis', '192.168.245.33/orcl');
        if (!$conn) {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }else{
            $sql = '
            SELECT i.INSTITUTE_NAME_NEW, i.eiin, d.DISTRICT_NAME , t.THANA_NAME, lel.EDUCATION_LEVEL_NAME FROM INSTITUTES i , DISTRICTS d , THANAS t, LOOKUP_EDUCATION_LEVELS lel
            WHERE i.DISTRICT_ID = d.DISTRICT_ID and i.THANA_ID = t.THANA_ID and i.EDUCATION_LEVEL_ID = lel.EDUCATION_LEVEL_ID AND i.EIIN =:eiin';
            $stid = oci_parse($conn, $sql);
            
            oci_bind_by_name($stid, ':eiin', $eiin);
            oci_execute($stid);
            while (($row = oci_fetch_array($stid, OCI_ASSOC)) != false) {
                var_dump($row);
            }
        }
        
    }
}
