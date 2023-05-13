<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Exception;
use App\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    
    protected $redirectTo = '/administrator/schemes';
        
    public function index()
    {
        return view('admin.pages.auth.login');
    }

    public function register()
    {
        return view('admin.pages.auth.register');
    }


    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users'
        ]);
        
        try 
        {
            $last_user = User::orderBy('created_at', 'desc')->first();
            $new_user = ($request->user_id = $last_user->id + 1);
            $user_id = ('CLNT000'.$new_user);

            $rs = User::create([
                'name' =>$request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')), 
                'user_type' => '2',
                'is_deleted' => '0',
                'contact' => $request->input('contact'),
                'user_id' => $user_id,
            ]);
            
            if($rs)
            {
                $message = array('flag'=>'alert-success', 'message'=>'User Created Successfully');
                return redirect()->route('register')->with(['message'=>$message]);    
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to Create User, Please try again');
            return redirect()->route('register')->with(['message'=>$message]); 
        }
        catch (Exception $e) 
        {
            $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
            return back()->with(['message'=>$message]);
        }
    }
    
    public function secure_login(Request $request)
    {        
        $this->validate($request, [
            '_username'   => 'required|email',
        ]);
        
        $credentials = array('email' => $request->input('_username'), 'password' => $request->input('_password'), 'user_type' => [1,2]);
        
        if (Auth::attempt($credentials)) {
           
            return redirect()->route('auth.dashboard');
        }
                
        $messageArr = array(
            'flag' => 'alert-danger',
            'message' => 'Invalid username or password.'
        );
        
        $request->session()->flash('message', $messageArr);
//         if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    
    public function forgot_password()
    {
        return view('admin.pages.auth.forgot_password');
    }
    
    public function reset_password($token)
    {
        return view('admin.pages.auth.reset_password');
    }
    
    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
