<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Exception;
use Carbon\Carbon;
use App\User;
use App\Calendar;

class LeaveController extends Controller
{
    public function index()
    {        
        $leaves = Calendar::orderBy('start_date', 'desc')->where('status', '0')->get();
        $users = User::where('is_deleted', 0)->orderBy('created_at', 'desc')->get();
        return view('admin.pages.leave.index')->with(['title'=>'Leave List', 'leaves'=>$leaves, 'users'=>$users]);
    }

    public function current()
    {        
        $leaves = Calendar::orderBy('start_date', 'desc')->where('status', '0')->get();
        $users = User::where('is_deleted', 0)->orderBy('created_at', 'desc')->get();
        return view('admin.pages.leave.current')->with(['title'=>'Leave List', 'leaves'=>$leaves, 'users'=>$users]);
    }

    public function coming()
    { 
        $dateS = Carbon::now()->startOfMonth()->addMonths(1);
        $dateE = Carbon::now()->endOfMonth()->addMonths(1); 

        //dd($dateE); 

        $leaves = Calendar::orderBy('start_date', 'desc')->whereBetween('start_date',[$dateS,$dateE])->get();
        //dd($leaves);
        $users = User::where('is_deleted', 0)->orderBy('created_at', 'desc')->get();
        return view('admin.pages.leave.coming')->with(['title'=>'Leave List', 'leaves'=>$leaves, 'users'=>$users]);
    }

    public function next()
    {
        $leaves = DB::select("select * from calendars where `start_date` < Now() and `start_date` > DATE_ADD(Now(), INTERVAL- 3 MONTH) and status = 0 order by start_date desc");
        $users = User::where('is_deleted', 0)->orderBy('created_at', 'desc')->get();        
        return view('admin.pages.leave.next')->with(['title'=>'Leave List', 'leaves'=>$leaves, 'users'=>$users]);
    }

    public function prev()
    {        
        $leaves = DB::select("select * from calendars where `start_date` < Now() and `start_date` > DATE_ADD(Now(), INTERVAL- 6 MONTH) and status = 0 order by start_date desc");
        $users = User::where('is_deleted', 0)->orderBy('created_at', 'desc')->get();        
        return view('admin.pages.leave.prev')->with(['title'=>'Leave List', 'leaves'=>$leaves, 'users'=>$users]);
    }
    
    public function create()
    {        
        $users = User::where('is_deleted', 0)->where('user_type', 2)->orderBy('created_at', 'desc')->get();
        return view('admin.pages.leave.create')->with(['title' => 'Apply Leave', 'action'=> route('auth.leave.store'), 'users'=>$users]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'start_date' => 'required',  
            'end_date' => 'required',
            'description' => 'required',
            'leave_type' => 'required',
        ]);
        
        try 
        {
            $start_date = Carbon::parse($request->input('start_date'));
            $end_date = Carbon::parse($request->input('end_date'));
            $userId = Auth::user()->id;            

            if($request->leave_type == '2'){
              $color = "rgb(237, 85, 100)";
              $enrollId = $request->input('description');
            }elseif($request->leave_type == '3') {
              $color = "rgb(255, 193, 7)";
              $enrollId = Auth::user()->user_id;
            }else{
              $color = "rgb(45, 149, 191)";
              $enrollId = Auth::user()->user_id;
            }

            $rs = Calendar::create([
                'event_name' => $enrollId,
                'start_date' => $start_date->format('Y-m-d'),
                'end_date' => $end_date->format('Y-m-d'),
                'description' => $request->input('description'),
                'user_id' => $userId,
                'new_date' => date('Y-m-d', strtotime($end_date->format('Y-m-d') .' +1 day')),
                'color' => $color,
                'leave_type' => $request->leave_type,
            ]);
            
            if($rs)
            {    
                $message = array('flag'=>'alert-success', 'message'=>'Leave Applied Successfully');
                return redirect()->route('auth.leave.index')->with(['message'=>$message]);    
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to Apply Leave, Please try again');
            return redirect()->route('auth.leave.index')->with(['message'=>$message]); 
        }
        catch (Exception $e) 
        {
            $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
            return back()->with(['message'=>$message]);
        }
    }


    public function edit(Request $request, $leaveId)
    {
       try
       {
           
           $userData = Calendar::where('id', $leaveId)->get();
           
           if($userData->isEmpty())
           {
               $message = array('flag'=>'alert-danger', 'message'=>'No Leave found with provided id');
               return back()->with(['message'=>$message]);
           }
           
           return view('admin.pages.leave.edit')->with(['userData'=>$userData->first(),
               'title'=>'Edit Leave', 'action'=>route('auth.leave.update', $leaveId)
           ]);
           
       }
       catch (Exception $e)
       {
           Log::error($e);
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
           
           
       }
    }

    public function update(Request $request, $leaveId)
    {              
        try 
        {  
          $start_date = Carbon::parse($request->input('start_date'));
          $end_date = Carbon::parse($request->input('end_date')); 

          $data = [
            'start_date' => $start_date->format('Y-m-d'),
            'end_date' => $end_date->format('Y-m-d'),
            'description' => $request->input('description'),
            'new_date' => date('Y-m-d', strtotime($end_date->format('Y-m-d') .' +1 day')),
          ];
         
          $rs = Calendar::where(['id'=> $leaveId])->update($data);
           
          if($rs){              
            $message = array('flag'=>'alert-success', 'message'=>'Leave updated successfully.');
            return redirect()->back()->with(['message'=>$message]);
          }
           
          $message = array('flag'=>'alert-danger', 'message'=>'Unable to update leave, Please try again');
          return back()->with(['message'=>$message]);
       } 
       catch (Exception $e) 
       {
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
       }
    }

    public function delete(Request $request, $leaveId)
    {
        try 
        {
            $rs = Calendar::destroy('id', $leaveId);
            
            if($rs)
            {
                $message = array('flag'=>'alert-success', 'message'=>'Leave deleted Successfully');
                return redirect()->back()->with(['message'=>$message]);
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to delete leave, Please try again');
            return redirect()->back()->with(['message'=>$message]); 
        } 
        catch (Exception $e) 
        {
            $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
            return back()->with(['message'=>$message]);
        }   
    }

}
