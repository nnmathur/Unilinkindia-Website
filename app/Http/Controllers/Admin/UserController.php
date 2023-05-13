<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Exception;

use App\User;

class UserController extends Controller
{
    public function index()
    {        
        $userId = Auth::user()->id;
        $users = User::where('is_deleted', 0)
        ->orderBy('created_at', 'desc')
        ->get();
        return view('admin.pages.user.index')->with(['title'=>'User List', 'users'=>$users]);
    }
    
    public function create()
    {
        return view('admin.pages.user.create')->with(['title' => 'Add User', 'action'=> route('auth.users.store')]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',            
            'user_type' => 'required',
            'user_id' => 'required|unique:users'
        ]);
        
        try 
        {
            $rs = User::create([
                'name' =>$request->input('name'),
                'user_id' =>$request->input('user_id'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'user_type' => $request->input('user_type'),
                'contact' => $request->input('contact')
            ]);
            
            if($rs)
            {    
                $message = array('flag'=>'alert-success', 'message'=>'User Created Successfully');
                return redirect()->route('auth.users.index')->with(['message'=>$message]);    
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to Create User, Please try again');
            return redirect()->route('auth.users.index')->with(['message'=>$message]); 
        }
        catch (Exception $e) 
        {
            $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
            return back()->with(['message'=>$message]);
        }
    }


    public function edit(Request $request, $userId)
    {
       try
       {
           // Get Temporary jon with job id
           
           $userData = User::where('id', $userId)->get();
           
           if($userData->isEmpty())
           {
               $message = array('flag'=>'alert-danger', 'message'=>'No User found with provided id');
               return back()->with(['message'=>$message]);
           }
           
           return view('admin.pages.user.edit')->with(['userData'=>$userData->first(),
               'title'=>'Edit Profile', 'action'=>route('auth.users.update', $userId)
           ]);
           
       }
       catch (Exception $e)
       {
           Log::error($e);
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
           
           
       }
    }

    public function update(Request $request, $userId)
    {
      
        $request->validate([
          'name' => 'required',
          'contact' => 'required',
        ]);
              
        try 
        {   
            if(isset($request->image) && $request->image->getClientOriginalName()){
                $ext = $request->image->getClientOriginalExtension();
                $file = date('YmdHis').rand(1,99999).'.'.$ext;     
                $request->image->storeAs('public/users',$file);
            }
            else
            {
              $image = User::find($userId)->image;
    
              if($image){
                $file = $image;
              }
              else{
                $file='';
              }
            }
            
          $data = [
            'name' => $request->input('name'),
            'contact' => $request->input('contact'),
            'image' => $file
          ];
         
          $rs = User::where(['id'=> $userId])->update($data);
           
          if($rs){              
            $message = array('flag'=>'alert-success', 'message'=>'Profile updated successfully.');
            return redirect()->route('auth.users.profile')->with(['message'=>$message]);
          }
           
          $message = array('flag'=>'alert-danger', 'message'=>'Unable to update profile, Please try again');
          return back()->with(['message'=>$message]);
       } 
       catch (Exception $e) 
       {
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
       }
   }


    public function storeUser(Request $request)
    {
        // dd($request->all());
        try{
        $user=new User;
        $user->name=$request->first_name.''.$request->last_name;
        $user->first_name=$request->first_name;
        $user->last_name=$request->last_name;
        $user->email=$request->email;
        $user->password=Hash::make('Password@123');
        $user->user_type=User::TYPE_MEMBER;
        $user->save();
            $lastId = \DB::getPdo()->lastInsertId();
            $userInfo = $lastId;
                $data = array();
                $data['name'] = $request->first_name.''.$request->last_name;
                $data['email'] = $request->email;
                Mail::send('mail.welcome', $data, function ($message) use ($data) {
                 $message->to($data['email']);
                 $message->subject('Welcome to your new CSR membership');
                });
        return redirect()->route('updateProfile',['user_id'=>base64_encode($userInfo)]);
    }
         catch (Exception $e) {
            $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
            return back()->with(['message'=>$message]);
         }
}
    
    public function delete(Request $request, $userId)
    {
        try 
        {
            //$rs = User::where('id', $userId)->update(['is_deleted'=>1]);
            $rs = User::destroy('id', $userId);
            
            if($rs)
            {
                $message = array('flag'=>'alert-success', 'message'=>'User deleted Successfully');
                return redirect()->route('auth.users.index')->with(['message'=>$message]);
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to delete User, Please try again');
            return redirect()->route('auth.users.index')->with(['message'=>$message]); 
        } 
        catch (Exception $e) 
        {
            $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
            return back()->with(['message'=>$message]);
        }   
    }
    
    public function resetPassword(Request $request, $userId)
    {
        try
        {
            // $rs = User::where('id', $userId)->update(['password'=>Hash::make('Password@123')]);            
            
            // if($rs)
            // {
            //     $message = array('flag'=>'alert-success', 'message'=>'User Password Changed Successfully');
            //     return redirect()->route('auth.users.role')->with(['message'=>$message]);
            // }

            $userData = User::where('id', $userId)->get();

            if($userData->isEmpty())
            {
               $message = array('flag'=>'alert-danger', 'message'=>'No user found with provided id');
               return back()->with(['message'=>$message]);
            }
            
            return view('admin.pages.auth.reset_password')->with(['userData'=>$userData->first(),
               'title'=>'Reset Password', 'action'=>route('auth.user.password', $userId)
           ]);
        }
        catch (Exception $e)
        {
            $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
            return back()->with(['message'=>$message]);
        }   
    }


    public function updatePassword(Request $request, $userid)
    {
              
       try 
       {         
           
           $data = [
               'password' => Hash::make($request->input('password'))
           ];
           
           $rs = User::where(['id'=> $userid])->update($data);   
           
           if($rs){
               $message = array('flag'=>'alert-success', 'message'=>'Password Updated Successfully');
               return redirect()->route('auth.users.role')->with(['message'=>$message]);
           }
           
           $message = array('flag'=>'alert-danger', 'message'=>'Unable to update new Password, Please try again');
           return redirect()->route('auth.users.role')->with(['message'=>$message]); 
       } 
       catch (Exception $e) 
       {
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
       }
   }


    public function profile()
    {
        $userId = Auth::user()->id;
        $users = User::where('id', '=', $userId)->get();
        
        return view('admin.pages.user.profile')->with(['title'=>'User Profile', 'users'=>$users]);
    }

    public function jobprofile()
    {
        $userId = Auth::user()->id;
        $users = User::where('id', '=', $userId)->get();
        
        return view('admin.pages.user.jobprofile')->with(['title'=>'User Profile', 'users'=>$users]);
    }


  public function deleteuser(Request $request,$id)
  {
    $data = DB::table('users')->get();
    foreach($data as $media) {
        if ( $media->is_deleted == 0 ) {
            DB::table('users')
            ->where('is_deleted',0)
            ->whereId($id)
            ->update(['is_deleted' => 10]);
        }
    }
    $message = array('flag'=>'alert-success', 'message'=>'User Deleted Successfully');
    return back()->with(['message'=>$message]);
  } 

    public function removed()
    {        
        $users = User::where('is_deleted', 10)
        ->orderBy('created_at', 'desc')
        ->get();
               
        return view('admin.pages.user.removed')->with(['title'=>'Removed User List', 'users'=>$users]);
    }

    public function undouser(Request $request,$id)
    {
        $data = DB::table('users')->get();
        foreach($data as $media) {
            if ( $media->is_deleted == 10 ) {
                DB::table('users')
                ->where('is_deleted',10)
                ->whereId($id)
                ->update(['is_deleted' => 0]);
            }
        }
        $media->is_deleted = $request->userStatus;
        $message = array('flag'=>'alert-success', 'message'=>'User Reversed Successfully');
        return redirect()->back()->with(['message'=>$message]);   
    }

    public function permdeleteuser(Request $request, $id)
    {
        try 
        {
            $rs = User::destroy('id', $id);
            
            if($rs)
            {
                $message = array('flag'=>'alert-success', 'message'=>'User deleted Successfully');
                return redirect()->route('auth.users.removed')->with(['message'=>$message]);
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to delete User, Please try again');
            return redirect()->route('auth.users.removed')->with(['message'=>$message]); 
        } 
        catch (Exception $e) 
        {
            $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
            return back()->with(['message'=>$message]);
        }   
    }

    public function clientsuperList()
    {
      $content = User::orderBy('created_at', 'desc')->where('created_by', '!=', '')->where('is_deleted', '0')->get();       
      return view('admin.pages.user.clientlist')->with(['title'=>'Clients List', 'content'=>$content]);
    }

    public function clientList()
    {
      $userId = Auth::user()->id;
      $content = User::orderBy('created_at', 'desc')->where('created_by', '=', $userId)->where('is_deleted', '0')->where('publish', 0)->get();       
      return view('admin.pages.user.clientlist')->with(['title'=>'Clients List', 'content'=>$content]);
    }

    public function clientCreate()
    {       
       return view('admin.pages.user.clientcreate')->with(['title' => 'Add Clients', 
           'action'=> route('auth.client.store')
       ]);
    }

    public function clientStore(Request $request)
    {
      if ($request->has('save'))
      {
        $request->validate([
          'email' => 'required|unique:users', 
        ]);
        $publish = 1;
      }
      else if ($request->has('publish'))
      {
        $request->validate([
          'name'=>'required', 
          'organisation_type'=>'required',
          'email' => 'required|unique:users', 
          'person'=>'required',
          'location'=>'required',
          'contact'=>'required',         
          'user_image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $publish = 0;
      }        
       
       $userId = Auth::user()->id;
       
       try 
       {
          if($request->user_image){
            $ext = $request->user_image->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;     
            $request->user_image->storeAs('public/profile',$file);
          }
          else
          {
            $file='';
          }

          $last_user = User::orderBy('created_at', 'desc')->first();
          $new_user = ($request->user_id = $last_user->id + 1);
          $user_id = ('CLNT000'.$new_user);
           
            $rs = User::create([
              'name' => $request->input('name'),
              'email' => $request->input('email'),
              'organisation_type' => $request->input('organisation_type'),
              'landline' => $request->input('landline'),
              'person' => $request->input('person'),
              'location' => $request->input('location'),
              'contact' => $request->input('contact'),
              'user_image' => $file,
              'user_id' =>$user_id,
              'is_deleted' => 0,
              'user_type' => $request->input('user_type'),
              'created_by' => $userId,
              'publish' => $publish
            ]); 
           
            if($rs)
            {
              if ($request->has('save'))
              {
                
                $message = array('flag'=>'alert-success', 'message'=>'Client draft added successfully.');
                return redirect()->route('auth.client.draft')->with(['message'=>$message]);
              }
              else if ($request->has('publish'))
              {
                $message = array('flag'=>'alert-success', 'message'=>'New Clients Profile Added Successfully');
                return redirect()->route('auth.client.list')->with(['message'=>$message]);
              }
            }
           
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to add new Clients Profile, Please try again');
            return redirect()->route('auth.client.list')->with(['message'=>$message]); 
           
       } 
       catch (Exception $e) 
       {
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
       }
    }

    public function deleteclient(Request $request,$id)
    {
      $data = DB::table('users')->get();
      foreach($data as $media) {
          if ( $media->is_deleted == 0 ) {
              DB::table('users')
              ->where('is_deleted',0)
              ->whereId($id)
              ->update(['is_deleted' => 11]);
          }
      }
      $message = array('flag'=>'alert-success', 'message'=>'Client Removed Successfully');
      return back()->with(['message'=>$message]);
    }

    public function removedclient()
    {
      $userId = Auth::user()->id;
      $content = User::orderBy('created_at', 'desc')->where('created_by', '=', $userId)->where('is_deleted', '11')->get();       
      return view('admin.pages.user.removedclient')->with(['title'=>'Removed Clients List', 'content'=>$content]);
    }

    public function removedsuperclient()
    {
      $content = User::orderBy('created_at', 'desc')->where('is_deleted', '11')->get();       
      return view('admin.pages.user.removedclient')->with(['title'=>'Removed Clints List', 'content'=>$content]);
    }

    public function undoclient(Request $request,$id)
    {
        $data = DB::table('users')->get();
        foreach($data as $media) {
            if ( $media->is_deleted == 11 ) {
                DB::table('users')
                ->where('is_deleted',11)
                ->whereId($id)
                ->update(['is_deleted' => 0]);
            }
        }
        $media->is_deleted = $request->userStatus;
        $message = array('flag'=>'alert-success', 'message'=>'Client Reversed Successfully');
        return redirect()->back()->with(['message'=>$message]);   
    }

    public function draftdelete(Request $request,$id)
    {
        $data = DB::table('users')->get();
        foreach($data as $media) {
            if ( $media->publish == 1 ) {
                DB::table('users')
                ->where('publish',1)
                ->whereId($id)
                ->update(['is_deleted' => 11]);
            }
        }
        $media->is_deleted = $request->userStatus;
        $message = array('flag'=>'alert-success', 'message'=>'Client Removed Successfully');
        return redirect()->back()->with(['message'=>$message]);   
    }

    public function permdeleteclient(Request $request, $id)
    {
        try 
        {
            $rs = User::destroy('id', $id);
            
            if($rs)
            {
                $message = array('flag'=>'alert-success', 'message'=>'Client deleted Successfully');
                return redirect()->route('removedclient')->with(['message'=>$message]);
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to delete Client, Please try again');
            return redirect()->route('removedclient')->with(['message'=>$message]); 
        } 
        catch (Exception $e) 
        {
            $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
            return back()->with(['message'=>$message]);
        }   
    }

    public function jobedit(Request $request, $userId)
    {
       try
       {
           // Get Temporary jon with job id
           
           $userData = User::where('id', $userId)->get();
           
           if($userData->isEmpty())
           {
               $message = array('flag'=>'alert-danger', 'message'=>'No User found with provided id');
               return back()->with(['message'=>$message]);
           }
           
           return view('admin.pages.user.jobedit')->with(['userData'=>$userData->first(),
               'title'=>'Edit Profile', 'action'=>route('auth.users.jobupdate', $userId)
           ]);
           
       }
       catch (Exception $e)
       {
           Log::error($e);
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
           
           
       }
    }

    public function jobupdate(Request $request, $userId)
    {
      if ($request->has('save'))
      {
        $publish = 1;
      }
      else if ($request->has('publish'))
      {
        $request->validate([
          'name'=>'required',
       ]);
        $publish = 0;
      }
              
       try 
       {          

        if(isset($request->user_image) && $request->user_image->getClientOriginalName()){
            $ext = $request->user_image->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;     
            $request->user_image->storeAs('public/profile',$file);
        }
        else
        {
          $user_image = User::find($userId)->user_image;

          if($user_image){
            $file = $user_image;
          }
          else{
            $file='';
          }
        }
           
            $data = [
              'name' => $request->input('name'),
              'organisation_type' => $request->input('organisation_type'),
              'landline' => $request->input('landline'),
              'person' => $request->input('person'),
              'location' => $request->input('location'),
              'contact' => $request->input('contact'),
              'user_image' => $file,
              'publish' => $publish
           ];
           
           $rs = User::where(['id'=> $userId])->update($data);
           
          if($rs){
            if ($request->has('save'))
            {
              
             $message = array('flag'=>'alert-success', 'message'=>'Client draft updated successfully.');
             return redirect()->route('auth.client.draft')->with(['message'=>$message]);
            }
            elseif ($request->has('publish'))
            {
              $message = array('flag'=>'alert-success', 'message'=>'Profile Updated Successfully');
               return back()->with(['message'=>$message]);
            }
          }
           
           $message = array('flag'=>'alert-danger', 'message'=>'Unable to update profile, Please try again');
           return back()->with(['message'=>$message]);
       } 
       catch (Exception $e) 
       {
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
       }
   }
    
    public function draft()
    {
       $content = User::orderBy('created_at', 'desc')->where('is_deleted', '!=', '11')->where('publish', '=', '1')->get();      
       return view('admin.pages.user.draft')->with(['title'=>'User Draft List', 'content'=>$content]);
    }
}
