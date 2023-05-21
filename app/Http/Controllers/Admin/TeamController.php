<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Exception;
use App\Team;
use Illuminate\Support\Str;

class TeamController extends Controller
{
    public function index()
    {        
        $teams = Team::orderBy('created_at', 'desc')->get();
        return view('admin.pages.team.index')->with(['title'=>'Team List', 'teams'=>$teams]);
    }
    
    public function create()
    {
        return view('admin.pages.team.create')->with(['title' => 'Add Team', 'action'=> route('auth.team.store')]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);
        
        try 
        {
            if($request->image){
              $ext = $request->image->getClientOriginalExtension();
              $file = date('YmdHis').rand(1,99999).'.'.$ext;     
              // $request->image->storeAs('public/team',$file);
              $request->image->move(public_path('/uploads/team/'), $file);
            }
            else
            {
              $file='';
            }
            
            $rs = Team::create([
                'name' => $request->input('name'),
                'short_description' => $request->input('short_description'),
                'designation' => $request->input('designation'),
                'facebook_url' => $request->input('facebook_url'),
                'twitter_url' => $request->input('twitter_url'),
                'linkedin_url' => $request->input('linkedin_url'),
                'instagram_url' => $request->input('instagram_url'),
                'image' => $file,
            ]);
            
            if($rs)
            {    
                $message = array('flag'=>'alert-success', 'message'=>'Team Created Successfully');
                return redirect()->route('auth.team.index')->with(['message'=>$message]);    
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to Create Team, Please try again');
            return redirect()->route('auth.team.index')->with(['message'=>$message]); 
        }
        catch (Exception $e) 
        {
            $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
            return back()->with(['message'=>$message]);
        }
    }


    public function edit(Request $request, $id)
    {
       try
       {           
           $teamData = Team::where('id', $id)->get();
           
           if($teamData->isEmpty())
           {
               $message = array('flag'=>'alert-danger', 'message'=>'No Team found with provided id');
               return back()->with(['message'=>$message]);
           }
           
           return view('admin.pages.team.edit')->with(['teamData'=>$teamData->first(),
               'title'=>'Edit Team', 'action'=>route('auth.team.update', $id)
           ]);
           
       }
       catch (Exception $e)
       {
           Log::error($e);
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
           
           
       }
    }

    public function update(Request $request, $id)
    {
      
        $request->validate([
          'name' => 'required' 
        ]);
              
        try 
        { 
          if(isset($request->image)){
            $ext = $request->image->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;     
            //$request->image->storeAs('public/team',$file);
            $request->image->move(public_path('/uploads/team/'), $file);
          }
          else
          {
            $image = Team::where(['id'=> $id])->first();
            if($image){
              $file = $image->image;
            }
            else{
              $file='';
            }
          }
          
          $data = [
            'name' => $request->input('name'),
            'short_description' => $request->input('short_description'),
            'designation' => $request->input('designation'),
            'facebook_url' => $request->input('facebook_url'),
            'twitter_url' => $request->input('twitter_url'),
            'linkedin_url' => $request->input('linkedin_url'),
            'instagram_url' => $request->input('instagram_url'),
            'image' => $file,
          ];
         
          $rs = Team::where(['id'=> $id])->update($data);
           
          if($rs){              
            $message = array('flag'=>'alert-success', 'message'=>'Team updated successfully.');
            return redirect()->route('auth.team.index')->with(['message'=>$message]);
          }
           
          $message = array('flag'=>'alert-danger', 'message'=>'Unable to update Team, Please try again');
          return back()->with(['message'=>$message]);
       } 
       catch (Exception $e) 
       {
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
       }
   }    
    
    public function delete(Request $request, $id)
    {
        try 
        {
            $rs = Team::destroy($id);
            
            if($rs)
            {
                $message = array('flag'=>'alert-success', 'message'=>'Team deleted Successfully');
                return redirect()->route('auth.team.index')->with(['message'=>$message]);
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to delete Team, Please try again');
            return redirect()->route('auth.team.index')->with(['message'=>$message]); 
        } 
        catch (Exception $e) 
        {
            $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
            return back()->with(['message'=>$message]);
        }   
    }
    
    public function setfeature(Request $request,$id)
    {
        $data = Team::get();
        foreach($data as $media) {
            if ( $media->status == 0 ) {
                Team::where('status',0)
                ->whereId($id)
                ->update(['status' => 1]);
            }
        }
        $message = array('flag'=>'alert-success', 'message'=>'Team set as featured successfully.');
        return redirect()->back()->with(['message'=>$message]);   
    }

    public function unfeature(Request $request,$id)
    {
        $data = Team::get();
        foreach($data as $media) {
            if ( $media->status == 1 ) {
                Team::where('status',1)
                ->whereId($id)
                ->update(['status' => 0]);
            }
        }
        $message = array('flag'=>'alert-success', 'message'=>'Team removed as featured successfully.');
        return redirect()->back()->with(['message'=>$message]);   
    }
}