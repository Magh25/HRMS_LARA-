<?php

namespace App\Http\Controllers\Admin;

use App\Attendance;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
          
        $today = date('Y-m-d');
        // return "ddddddddd";
        // whereDate / whereMonth / whereDay / whereYear / whereTime
        // ->whereBetween('votes', [1, 100])
        // whereMonth()
        // att_date
        // ->groupby('year','month')
        // whereDate
        
        $user = Auth::user();
        $users = User::where('type', 'Employee')->get();

        $present = Attendance::where("attendance",'Present');
        $absent = Attendance::where("attendance",'Absent');
 
        
        if(isset($request->from_date)){ 
            $present = $present->whereBetween('att_date', [$request->from_date, $request->to_date]) ;

            $absent = $absent->whereBetween('att_date', [$request->from_date, $request->to_date]);
        }
        if(isset($request->user)){
                
            $present = $present->where("user_id", $request->user);
            $absent = $absent->where("user_id",$request->user);
        }

            // return view('admin.report.index',compact('user','present','absent' ,'today', 'users'));

            $present = $present->count();
            $absent =$absent->count();


        return view('admin.report.index',compact('user','present','absent' ,'today', 'users'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_view($data)
    {

        $users = User::where('type','Employee')->get();
        return view('admin.attendance.create', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $today = date('Y-m-d');
        $check = Attendance::where('att_date', $today)->where('attendance','!=','Leave')->first();
        // return $check;
        // if($check){
        //     $alert = [
        //         'alert-type' => 'info',
        //         'message' => 'Today attendances already taken, you can edit now!'
        //     ];
        //     return redirect('/admin/attendance/'.$today.'/edit')->with($alert);
        // }

        // $leaves = Attendance::where('att_date',$today)->pluck('user_id');
        // if(count($leaves) == 0){
        //     $users = User::where('status',1)->get()->skip(Auth::id());
        // }else{

        // }
        $users = User::where('type','Employee')->get();
        return view('admin.attendance.create', compact('users'));


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'user_id' =>'required'
        ]);
        $today = $request->date;
        // return $request->date;
        $check = Attendance::where('att_date', $today)->first();
        // return isset(true);
        if(isset($check) ){
            $alert = [
                'alert-type' => 'error',
                'message' => 'Attendance Already Taken, you can edit now!'
            ];
        return back()->with($alert);
        }else{ 
         
            foreach($request->user_id as $id){
                $data = [
                    'att_date' => $today,
                    'user_id' => $id,
                    'attendance' => $request->attendance[$id],
                ];
                // return $data;
                Attendance::Create($data);
            }
            
            $alert = [
                'alert-type' => 'success',
                'message' => 'Attendance Taken successfully'
            ];
        return redirect('/admin/attendance')->with($alert);

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return 'show method';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $att_date = $id;
        // $attendances = Attendance::where('att_date',$att_date)->where('attendance','!=','Leave')->get();
        $attendances = Attendance::where('att_date',$att_date)->get();
        return view('admin.attendance.edit',compact('attendances','att_date'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
        $attendance->attendance = $request->attendance;
        $attendance->save();

        $alert = [
            'alert-type' => 'success',
            'message' => 'Attendance updated successfully'
        ];
        return back()->with($alert);
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
