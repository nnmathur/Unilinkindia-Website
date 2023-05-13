<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Exception;
use App\Service;
use App\Policy;
use Illuminate\Support\Str;

class PolicyController extends Controller
{
    public function index()
    {        
        $policies = Policy::orderBy('created_at', 'desc')
        ->get();
        return view('admin.pages.policy.index')->with(['title'=>'Policies List', 'policies'=>$policies]);
    }
    
    public function create()
    {
      $services = Service::where('status', 0)
        ->orderBy('created_at', 'desc')
        ->get();
        return view('admin.pages.policy.create')->with(['title' => 'Add Policies', 'action'=> route('auth.policies.store'), 'services'=>$services]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'slug' => 'unique:policies', 
            'short_description' => 'required'
        ]);
        
        try 
        {
            if($request->image){
              $ext = $request->image->getClientOriginalExtension();
              $file = date('YmdHis').rand(1,99999).'.'.$ext;     
              $request->image->storeAs('public/policy',$file);
            }
            else
            {
              $file='';
            }
            
            if($request->image1){
              $ext = $request->image1->getClientOriginalExtension();
              $file1 = date('YmdHis').rand(1,99999).'.'.$ext;     
              $request->image1->storeAs('public/policy',$file1);
            }
            else
            {
              $file1='';
            }
            
            if($request->image2){
              $ext = $request->image2->getClientOriginalExtension();
              $file2 = date('YmdHis').rand(1,99999).'.'.$ext;     
              $request->image2->storeAs('public/policy',$file2);
            }
            else
            {
              $file2='';
            }
            
              if($request->video){
                $ext = $request->video->getClientOriginalExtension();
                $file3 = date('YmdHis').rand(1,99999).'.'.$ext;     
                $request->video->storeAs('public/video',$file3);
              }
              else
              {
                $file3='';
              }

            $rs = Policy::create([
                'title' => $request->input('title'),
                'slug' => Str::slug($request->input('title')),
                'sub_title' => $request->input('sub_title'),
                'services' => $request->input('services'),
                'short_description2' => $request->input('short_description2'),
                'short_description3' => $request->input('short_description3'),
                'short_description' => $request->input('short_description'),
                'description' => $request->input('description'),
                'template' => $request->input('template'),
                'added_by' => Auth::user()->id,
                'image' => $file,
                'image1' => $file1,
                'image2' => $file2,
                'video' => $file3,
            ]);
            
            if($rs)
            {    
                $message = array('flag'=>'alert-success', 'message'=>'Policies Created Successfully');
                return redirect()->route('auth.policies.index')->with(['message'=>$message]);    
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to Create Policies, Please try again');
            return redirect()->route('auth.policies.index')->with(['message'=>$message]); 
        }
        catch (Exception $e) 
        {
            $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
            return back()->with(['message'=>$message]);
        }
    }


    public function edit(Request $request, $slug)
    {
       try
       {           
           $userData = Policy::where('id', $slug)->get();
           
           $services = Service::where('status', 0)
            ->orderBy('created_at', 'desc')
            ->get();
           
           if($userData->isEmpty())
           {
               $message = array('flag'=>'alert-danger', 'message'=>'No Policies found with provided id');
               return back()->with(['message'=>$message]);
           }
           
           return view('admin.pages.policy.edit')->with(['userData'=>$userData->first(),
               'title'=>'Edit Policies', 'action'=>route('auth.policies.update', $slug), 'services'=>$services
           ]);
           
       }
       catch (Exception $e)
       {
           Log::error($e);
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
           
           
       }
    }

    public function update(Request $request, $slug)
    {
      
        $request->validate([
          'title' => 'required',
          'sub_title' => 'required',
          'slug' => 'unique:policies', 
          'short_description' => 'required',  
        ]);
              
        try 
        {   
          if(isset($request->image) && $request->image->getClientOriginalName()){
            $ext = $request->image->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;     
            $request->image->storeAs('public/policy',$file);
          }
          else
          {
            $image = Policy::where(['id'=> $slug])->first();
            //dd($video);

            if($image){
              $file = $image->image;
            }
            else{
              $file='';
            }
          }
          
          if(isset($request->image1) && $request->image1->getClientOriginalName()){
            $ext = $request->image1->getClientOriginalExtension();
            $file1 = date('YmdHis').rand(1,99999).'.'.$ext;     
            $request->image1->storeAs('public/policy',$file1);
          }
          else
          {
            $image = Policy::where(['id'=> $slug])->first();
            //dd($video);

            if($image){
              $file1 = $image->image1;
            }
            else{
              $file1='';
            }
          }
          
          if(isset($request->image2) && $request->image2->getClientOriginalName()){
            $ext = $request->image2->getClientOriginalExtension();
            $file2 = date('YmdHis').rand(1,99999).'.'.$ext;     
            $request->image2->storeAs('public/policy',$file2);
          }
          else
          {
            $image = Policy::where(['id'=> $slug])->first();
            //dd($video);

            if($image){
              $file2 = $image->image2;
            }
            else{
              $file2='';
            }
          }
          
            if(isset($request->video) && $request->video->getClientOriginalName()){
                $ext = $request->video->getClientOriginalExtension();
                $file3 = date('YmdHis').rand(1,99999).'.'.$ext;     
                $request->video->storeAs('public/video',$file3);
            }
            else
            {
              $video = Policy::where(['id'=> $slug])->first();
    
              if($video){
                $file3 = $video->video;
              }
              else{
                $file3='';
              }
            }

          $data = [
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'sub_title' => $request->input('sub_title'),
            'short_description' => $request->input('short_description'),
            'short_description2' => $request->input('short_description2'),
            'short_description3' => $request->input('short_description3'),
            'description' => $request->input('description'),
            'template' => $request->input('template'),
            'services' => $request->input('services'),
            'image' => $file,
            'image1' => $file1,
            'image2' => $file2,
            'video' => $file3,
            'added_by' => Auth::user()->id,
          ];
         
          $rs = Policy::where(['id'=> $slug])->update($data);
           
          if($rs){              
            $message = array('flag'=>'alert-success', 'message'=>'Policies updated successfully.');
            return redirect()->route('auth.policies.index')->with(['message'=>$message]);
          }
           
          $message = array('flag'=>'alert-danger', 'message'=>'Unable to update Policies, Please try again');
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
            $rs = Policy::destroy($id);
            
            if($rs)
            {
                $message = array('flag'=>'alert-success', 'message'=>'Policies deleted Successfully');
                return redirect()->route('auth.policies.index')->with(['message'=>$message]);
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to delete Policies, Please try again');
            return redirect()->route('auth.policies.index')->with(['message'=>$message]); 
        } 
        catch (Exception $e) 
        {
            $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
            return back()->with(['message'=>$message]);
        }   
    }

    public function setfeature(Request $request,$id)
    {
        $data = Policy::get();
        foreach($data as $media) {
            if ( $media->status == 0 ) {
                Policy::where('status',0)
                ->whereId($id)
                ->update(['status' => 1]);
            }
        }
        $message = array('flag'=>'alert-success', 'message'=>'Ploicy set as featured successfully.');
        return redirect()->back()->with(['message'=>$message]);   
    }

    public function unfeature(Request $request,$id)
    {
        $data = Policy::get();
        foreach($data as $media) {
            if ( $media->status == 1 ) {
                Policy::where('status',1)
                ->whereId($id)
                ->update(['status' => 0]);
            }
        }
        $message = array('flag'=>'alert-success', 'message'=>'Ploicy removed as featured successfully.');
        return redirect()->back()->with(['message'=>$message]);   
    }
}