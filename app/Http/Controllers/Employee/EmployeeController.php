<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\User;

use App\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        $absent = Attendance::where('user_id', $user->id)->where("attendance",'Absent')->count();
        $present = Attendance::where('user_id', $user->id)->where("attendance",'Present')->count();
 
        return view('employee.index',compact('user','present','absent'));
    }


        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_attan(Request $Request)
    {    
        $today = date('Y-m-d');
        // return "ddddddddd";
        // whereDate / whereMonth / whereDay / whereYear / whereTime
        // ->whereBetween('votes', [1, 100])
        // whereMonth()
        // att_date
        // ->groupby('year','month')
        // whereDate
        
        $user=Auth::user();

        if(isset($Request->from_date)){

            
            $present = Attendance::where('user_id', $user->id)
                                ->where("attendance",'present')
                                ->whereBetween('att_date', [$Request->from_date, $Request->to_date])
                                ->count();

            $absent = Attendance::where('user_id', $user->id)
                                ->where("attendance",'absent')
                                ->whereBetween('att_date', [$Request->from_date, $Request->to_date])
                                ->count();               
            return view('employee.attandence.index',compact('user','present','absent' ,'today'));
        }

        $absent = Attendance::where('user_id', $user->id)->where("attendance",'Absent')->count();
        $present = Attendance::where('user_id', $user->id)->where("attendance",'Present')->count();
 
        return view('employee.attandence.index',compact('user','present','absent' ,'today'));


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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
