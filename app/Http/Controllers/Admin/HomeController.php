<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\User;

class HomeController extends Controller {
	public function index() {
        $users = DB::table('users')->where('is_deleted', '0')->where('user_type', '1')->count();
        $newusers = DB::table('users')->where('is_deleted', '0')->where('user_type', '2')->count();
        $leaves = DB::table('calendars')->where('status', '0')->count();         
        return view('admin.pages.dashboard')->with(['users' => $users, 'newusers' => $newusers, 'leaves' => $leaves]);
    }

    public function indexpto() {
        $users = DB::table('users')->where('is_deleted', '0')->where('user_type', '1')->count();
        $newusers = DB::table('users')->where('is_deleted', '0')->where('user_type', '2')->count();
        $leaves = DB::table('calendars')->where('status', '0')->count();         
        return view('admin.pages.dashboardpto')->with(['users' => $users, 'newusers' => $newusers, 'leaves' => $leaves]);
    }

	public function change_password() {
		return view('admin.pages.auth.change_password')->with(['title' => 'Change Password']);
	}

	public function update_password(Request $request) {
		$loggedInUser = Auth::guard('admin')->user();

		$request->validate([
			'old_password' => 'required',
			'new_password' => 'required',
			're_new_password' => 'required',

		]);

		$oldpass = $request->input('old_password');
		$newpass = $request->input('new_password');
		$renewpass = $request->input('re_new_password');

		if (!Hash::check($oldpass, $loggedInUser['password'])) {
			$message = array('flag' => 'alert-danger', 'message' => 'Your old password does not match with our records !!!');
			$request->session()->flash('message', $message);
			return redirect()->route('admin.password.change');
		}

		if ($newpass != $renewpass) {
			$message = array('flag' => 'alert-danger', 'message' => 'Password and confirm password does not match, please check !!!');
			$request->session()->flash('message', $message);
			return redirect()->route('admin.password.change');
		}

		$newpass = Hash::make($newpass);
		DB::enableQueryLog();
		$rs = Admin::where(['_id' => $loggedInUser['_id']])->update(['password' => $newpass]);

		if ($rs) {
			$message = array('flag' => 'alert-success', 'message' => 'Password changed successfully !!!');
			$request->session()->flash('message', $message);
			return redirect()->route('admin.password.change');
		} else {
			$message = array('flag' => 'alert-danger', 'message' => 'OOPS ! Please try again later !!!');
			$request->session()->flash('message', $message);
			return redirect()->route('admin.password.change');
		}
	} 

	public function changePassword()
    {
        return view('admin.pages.auth.change_password');
    }

    public function changePasswordSuccessfully(Request $request)
    { 
        $request->validate([
            'password'=>['min:6', 'confirmed'],
        ]);

        $data = $request->all();

        $user = User::find(auth()->user()->id);
     
        $userId = Auth::user()->id;

        if(!Hash::check($data['cpassword'], $user->password)){
            $request->session()->flash('error','Please Enter Correct Current Password');
            return back();
        }else{
            DB::table('users')->where('id',$userId)
                ->update(['password' => Hash::make($data['password'])]);
                 $request->session()->flash('success','Password Changed Successfully');
            return back();  
        }

   
    }


    public function leavefilter(Request $request, $leaveId)
    {
       try
       {
           
           $leaveData = Calendar::where('leave_type', $leaveId)->get();
           
           if($leaveData->isEmpty())
           {
               $message = array('flag'=>'alert-danger', 'message'=>'No Leave found with provided id');
               return back()->with(['message'=>$message]);
           }
           
           return response()->json(['success' => true, 'leaveData' => $leaveData]);
           
       }
       catch (Exception $e)
       {
           Log::error($e);
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
           
           
       }
    }
}
