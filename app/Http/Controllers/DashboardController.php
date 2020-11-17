<?php

namespace App\Http\Controllers;

use App\Classification;
use App\Contact;
use App\Report;
use App\Tasks;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Array_;

class DashboardController extends Controller
{
    protected function dashboard(Request $request)
    {
        $user = Auth::user();
        if($user!=null){
            if ($user->is_admin) {
                $Today = Carbon::today();
                $Today_Count = DB::table('browse')
                    ->where("Date", '=', $Today)
                    ->select("Count")
                    ->first();
                $All_Count = DB::table('browse')
                    ->sum("Count");
                $Members_Amount = DB::table('users')
                    ->count();
                $Month_Tasks_Amount = DB::table('tasks')
                    ->where('created_at', 'LIKE', date("Y-m-%"))
                    ->count();
                $Month_Members_Amount = DB::table('users')
                    ->where('created_at', 'LIKE', date("Y-m-%"))
                    ->count();
                $Reported_Tasks_Amount = DB::table('report')
                    ->distinct('Tasks_id')
                    ->count();
                $All_Tasks_Amount = DB::table('tasks')
                    ->count();
                $Man_Amount = DB::table('users')
                    ->where("gender", "=", "1")
                    ->count();
                $Woman_Amount = DB::table('users')
                    ->where("gender", "=", "2")
                    ->count();
                $Else_Amount = DB::table('users')
                    ->where("gender", "=", "3")
                    ->count();
                $Selectable_Amount = DB::table('tasks')
                    ->where("Status", "=", "Selectable")
                    ->count();
                $Processing_Amount = DB::table('tasks')
                    ->where("Status", "=", "Processing")
                    ->count();
                $Complete_Amount = DB::table('tasks')
                    ->where("Status", "=", "Complete")
                    ->count();
                $Blocked_Amount = DB::table('tasks')
                    ->where("Status", "=", "Block")
                    ->count();
                $Department_List = DB::table('users')
                    ->select("department")
                    ->distinct('department')
                    ->get();
                $Department_Name = array();
                foreach ($Department_List as $i) {
                    $Name = DB::table('departments')
                        ->where("De_Value", "=", $i->department)
                        ->select("De_Name")
                        ->get();
                    array_push($Department_Name, $Name);
                }
                print_r($Department_Name);
                $Department_Man_Amount = array();
                foreach ($Department_List as $i) {
                    $Department_Man = DB::table('users')
                        ->where("department", "=", $i->department)
                        ->where("Gender", "=", "1")
                        ->count();
                    array_push($Department_Man_Amount, $Department_Man);
                }
                $Department_Woman_Amount = array();
                foreach ($Department_List as $i) {
                    $Department_Woman = DB::table('users')
                        ->where("department", "=", $i->department)
                        ->where("Gender", "=", "2")
                        ->count();
                    array_push($Department_Woman_Amount, $Department_Woman);
                }
                $Department_Else_Amount = array();
                foreach ($Department_List as $i) {
                    $Department_Else = DB::table('users')
                        ->where("department", "=", $i->department)
                        ->where("Gender", "=", "3")
                        ->count();
                    array_push($Department_Else_Amount, $Department_Else);
                }
                return view('Admin_Dashboard')->with(["today_count" => $Today_Count,
                    "all_count" => $All_Count,
                    "members_amount" => $Members_Amount,
                    "month_tasks_amount" => $Month_Tasks_Amount,
                    "month_members_amount" => $Month_Members_Amount,
                    "all_tasks_amount" => $All_Tasks_Amount,
                    "reported_tasks_amount" => $Reported_Tasks_Amount,
                    "man_amount" => $Man_Amount,
                    "woman_amount" => $Woman_Amount,
                    "else_amount" => $Else_Amount,
                    "selectable_amount" => $Selectable_Amount,
                    "processing_amount" => $Processing_Amount,
                    "complete_amount" => $Complete_Amount,
                    "department_list" => $Department_Name,
                    "department_man_amount" => $Department_Man_Amount,
                    "department_woman_amount" => $Department_Woman_Amount,
                    "department_else_amount" => $Department_Else_Amount,
                    "blocked_amount"=>$Blocked_Amount,]
                    );
            } else {
                return redirect('list');
            }
        } else {
            return redirect('list');
        }
    }

    protected function tasks(Request $request)
    {
        $tasks = DB::table('tasks')
            ->Join('users', 'tasks.student_id', '=', 'users.student_id')
            ->get();
        return view('Admin_Tasks')->with(["tasks" => $tasks]);
    }

    protected function members(Request $request)
    {
        $members = DB::table('users')
            ->get();
        return view('Admin_Member')->with(["members" => $members]);
    }

    //TODO
    protected function deletemembers(Request $request)
    {
        $user = User::find($request->student_id);
        $user->delete();
        $all_student_id=DB::table('users')
            ->select('student_id')
            ->get();
        foreach ($all_student_id as $i){
            $host_AVGrate=DB::table('evaluation')
                ->join("tasks",'evaluation.Tasks_id','=','tasks.Tasks_id')
                ->where('tasks.Student_id', '=', $i->student_id)
                ->avg('Host_Rate');
            $toolman_AVGrate=DB::table('evaluation')
                ->join("tasks",'evaluation.Tasks_id','=','tasks.Tasks_id')
                ->where('tasks.Toolman_id', '=', $i->student_id)
                ->avg('Toolman_Rate');

            $toolman_AVGrate_update = User::find($i->student_id);
            $toolman_AVGrate_update->toolman_rate_avg = $toolman_AVGrate;
            $toolman_AVGrate_update->save();
            $host_AVGrate_update = User::find($i->student_id);
            $host_AVGrate_update->host_rate_avg = $host_AVGrate;
            $host_AVGrate_update->save();
        }
        return redirect()->route("Admin.Member");
    }

    protected function inactivemembers(Request $request)
    {
        $status = DB::table('users')
            ->where('student_id', '=', $request->student_id)
            ->select('is_active')
            ->first();
        error_log($status->is_active);
        if ($status->is_active == true) {
            $user = User::find($request->student_id);
            $user->is_active = false;
            $user->save();
        } else {
            $user = User::find($request->student_id);
            $user->is_active = true;
            $user->save();
        }
        return redirect()->route("Admin.Member");
    }

    protected function report(Request $request)
    {
        $reports = DB::table('report')
            ->where('Status', '=', 'Waiting')
            ->get();
        return view('Admin_Report')->with(["reports" => $reports]);
    }

    protected function reportpass(Request $request)
    {
        $reports = Report::find($request->Report_id);
        $reports->Status = "Pass";
        $reports->save();
        $Tasks = Tasks::find($request->Tasks_id);
        $Tasks->Status = "Block";
        $Tasks->save();
        $User = User::find($Tasks->Student_id);
        $User->violation += 1;
        $User->save();

        if ($User->violation == 5) {
            $User = User::find($Tasks->Student_id);
            $User->is_active = false;
            $User->save();
        }
        return redirect()->route("Admin.Report");
    }

    protected function reportdenied(Request $request)
    {
        $reports = Report::find($request->Report_id);
        $reports->Status = "Denied";
        $reports->save();
        return redirect()->route("Admin.Report");
    }
    protected function contact(Request $request)
    {
        $contact = DB::table('contact')
            ->get();
        return view('Admin_Contact')->with(["contact" => $contact]);
    }
}
