<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Http\Controllers\Controller;
use App\Leave;
use App\Task;
use App\User;
use App\Attendance;

class DashboardController extends Controller
{
    public function index () { 

        $absent = Attendance::where("attendance",'Absent')->count();
        $present = Attendance::where("attendance",'Present')->count();
 
        $count = [];
        $count['employee'] = User::where("type",'Employee')->count();
        $count['users'] = User::count();
        $count['departments'] = Department::count();
      

        return view('admin.index', compact('count', 'absent', 'present'));
    }
}
