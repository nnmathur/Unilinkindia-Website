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
use App\Exposure;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Log;

class ExposureController extends Controller
{
    public function index()
    {        
        $exposures = Exposure::orderBy('created_at', 'desc')->get();
        return view('admin.pages.exposure.index')->with(['title'=>'Exposures List', 'exposures'=>$exposures]);
    }
    
    public function create()
    {
        return view('admin.pages.exposure.create')->with(['title' => 'Add Exposures', 'action'=> route('auth.exposures.store')]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'short_description' => 'required'
        ]);
        
        try 
        {
            if($request->image){
              $ext = $request->image->getClientOriginalExtension();
              $file = date('YmdHis').rand(1,99999).'.'.$ext;     
              $request->image->storeAs('public/exposures',$file);
            }
            else
            {
              $file='';
            }
            
            if($request->attachment){
              $ext = $request->attachment->getClientOriginalExtension();
              $attachment = date('YmdHis').rand(1,99999).'.'.$ext;     
              $request->attachment->storeAs('public/exposures',$attachment);
            }
            else
            {
              $attachment='';
            }
           
            $rs = Exposure::create([
               'title' => $request->input('title'),
               'image' => $file,
               'short_description' => $request->input('short_description'),
               'description' => $request->input('description'),
               'success_story' => $request->input('success_story'),
               'video' => $request->input('video'),
               'attachment' => $attachment,
            ]);
            
            if($rs)
            {    
                $message = array('flag'=>'alert-success', 'message'=>'Exposures Created Successfully');
                return redirect()->route('auth.exposures.index')->with(['message'=>$message]);    
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to Create Exposures, Please try again');
            return redirect()->route('auth.exposures.index')->with(['message'=>$message]); 
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
           $bannerData = Exposure::where('id', $id)->get();
           
           if($bannerData->isEmpty())
           {
               $message = array('flag'=>'alert-danger', 'message'=>'No Exposures found with provided id');
               return back()->with(['message'=>$message]);
           }
           
           return view('admin.pages.exposure.edit')->with(['bannerData'=>$bannerData->first(),
               'title'=>'Edit Exposures', 'action'=>route('auth.exposures.update', $id)
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
           'title'=>'required',
           'short_description'=>'required',
       ]);
       
       $userId = Auth::user()->id;
       
       try 
       {
            if(isset($request->image) && $request->image->getClientOriginalName()){
                $ext = $request->image->getClientOriginalExtension();
                $file = date('YmdHis').rand(1,99999).'.'.$ext;     
                $request->image->storeAs('public/exposures',$file);
            }
            else
            {
              $image = Exposure::find($id)->image;
    
              if($image){
                $file = $image;
              }
              else{
                $file='';
              }
            }
            
            if(isset($request->attachment) && $request->attachment->getClientOriginalName()){
                $ext = $request->attachment->getClientOriginalExtension();
                $attachment = date('YmdHis').rand(1,99999).'.'.$ext;     
                $request->attachment->storeAs('public/exposures',$attachment);
            }
            else
            {
              $image = Exposure::find($id)->attachment;
    
              if($image){
                $attachment = $image;
              }
              else{
                $attachment='';
              }
            }
           
            $data = [
               'title' => $request->input('title'),
               'image' => $file,
               'short_description' => $request->input('short_description'),
               'description' => $request->input('description'),
               'success_story' => $request->input('success_story'),
               'video' => $request->input('video'),
               'attachment' => $attachment,
            ];
            
            $rs = Exposure::where(['id'=> $id])->update($data);
           
           if($rs){
               $message = array('flag'=>'alert-success', 'message'=>'Exposures Updated Successfully');
               return redirect()->route('auth.exposures.index')->with(['message'=>$message]);
           }
           
           $message = array('flag'=>'alert-danger', 'message'=>'Unable to update new Exposures, Please try again');
           return redirect()->route('auth.exposures.index')->with(['message'=>$message]); 
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
            $rs = Exposure::destroy($id);
            
            if($rs)
            {
                $message = array('flag'=>'alert-success', 'message'=>'Exposures deleted Successfully');
                return redirect()->route('auth.exposures.index')->with(['message'=>$message]);
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to delete Exposures, Please try again');
            return redirect()->route('auth.exposures.index')->with(['message'=>$message]); 
        } 
        catch (Exception $e) 
        {
            $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
            return back()->with(['message'=>$message]);
        }   
    }
}