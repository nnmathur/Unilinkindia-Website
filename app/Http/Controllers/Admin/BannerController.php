<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Exception;
use App\Banner;

class BannerController extends Controller
{
    public function index()
    {
        $content = Banner::orderBy('created_at', 'desc')->get();      
        return view('admin.pages.banner.index')->with(['title'=>'Banner List', 'content'=>$content]);
    }

    public function side()
    {
        $content = Banner::orderBy('created_at', 'desc')->whereBetween('id', [4, 6])->get(); 
        return view('admin.pages.banner.indexside')->with(['title'=>'Banner List', 'content'=>$content]);
    }

    public function create()
    {
       return view('admin.pages.banner.create')->with(['title' => 'Add Banner', 
           'action'=> route('auth.banner.store')
       ]);
    }

    public function store(Request $request)
    {
        $request->validate([
           'title'=>'required',
           'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:2048',
           'description'=>'required',
        ]);
       
        $userId = Auth::user()->id;
       
        try 
        {
            if($request->image->getClientOriginalName()){
                $ext = $request->image->getClientOriginalExtension();
                $file = date('YmdHis').rand(1,99999).'.'.$ext;     
                $request->image->storeAs('public/banner',$file);
            }
            else
            {
                $file='';
            }
           
            $rs = Banner::create([
                'title' => $request->input('title'),
                'image' => $file,
                'description' => $request->input('description'),
                'btn_link' => $request->input('btn_link'),
            ]); 
           
            if($rs)
            {
                $message = array('flag'=>'alert-success', 'message'=>'New Banner Added Successfully');
                return redirect()->route('auth.banner.index')->with(['message'=>$message]);
            }
           
           $message = array('flag'=>'alert-danger', 'message'=>'Unable to add new Banner, Please try again');
           return redirect()->route('auth.banner.index')->with(['message'=>$message]); 
           
        } 
        catch (Exception $e) 
        {
            $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
            return back()->with(['message'=>$message]);
        }
    }

    public function edit(Request $request, $bannerId)
    {
       try
       {
           $bannerData = Banner::where('id', $bannerId)->get();
           
           if($bannerData->isEmpty())
           {
               $message = array('flag'=>'alert-danger', 'message'=>'No Banner found with provided id');
               return back()->with(['message'=>$message]);
           }
           
           return view('admin.pages.banner.edit')->with(['bannerData'=>$bannerData->first(),
               'title'=>'Edit Banner', 'action'=>route('auth.banner.update', $bannerId)
           ]);
           
       }
       catch (Exception $e)
       {
           Log::error($e);
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
           
           
       }
    }

    public function editSide(Request $request, $bannerId)
    {
       try
       {
           // Get Temporary jon with job id
           
           $bannerData = Banner::where('id', $bannerId)->get();
           
           if($bannerData->isEmpty())
           {
               $message = array('flag'=>'alert-danger', 'message'=>'No Banner found with provided id');
               return back()->with(['message'=>$message]);
           }
           
           return view('admin.pages.banner.editside')->with(['bannerData'=>$bannerData->first(),
               'title'=>'Edit Page Banner', 'action'=>route('auth.banner.updateside', $bannerId)
           ]);
           
       }
       catch (Exception $e)
       {
           Log::error($e);
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
           
           
       }
    }

    public function update(Request $request, $bannerId)
    {
        $request->validate([
           'title'=>'required',
           'description'=>'required',
       ]);
       
       $userId = Auth::user()->id;
       
       try 
       {
            if(isset($request->image) && $request->image->getClientOriginalName()){
                $ext = $request->image->getClientOriginalExtension();
                $file = date('YmdHis').rand(1,99999).'.'.$ext;     
                $request->image->storeAs('public/banner',$file);
            }
            else
            {
              $image = Banner::find($bannerId)->image;
    
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
                $request->attachment->storeAs('public/banner',$attachment);
            }
            else
            {
              $image = Banner::find($bannerId)->attachment;
    
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
           
           $rs = Banner::where(['id'=> $bannerId])->update($data);
           
           if($rs){
               $message = array('flag'=>'alert-success', 'message'=>'Banner Updated Successfully');
               return redirect()->route('auth.banner.index')->with(['message'=>$message]);
           }
           
           $message = array('flag'=>'alert-danger', 'message'=>'Unable to update new Banner, Please try again');
           return redirect()->route('auth.banner.index')->with(['message'=>$message]); 
       } 
       catch (Exception $e) 
       {
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
       }
    }

    public function updateside(Request $request, $bannerId)
    {
        $request->validate([
           'title'=>'required',
       ]);
       
       $userId = Auth::user()->id;
       
       try 
       {
        if(isset($request->image) && $request->image->getClientOriginalName()){
            $ext = $request->image->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;     
            $request->image->storeAs('public/banner',$file);
        }
        else
        {
          $image = Banner::find($bannerId)->image;

          if($image){
            $file = $image;
          }
          else{
            $file='';
          }
        }
           
           $data = [
               'title' => $request->input('title'),
               'image' => $file
           ];
           
           $rs = Banner::where(['id'=> $bannerId])->update($data);
           
           if($rs){
               $message = array('flag'=>'alert-success', 'message'=>'Banner Updated Successfully');
               return redirect()->route('auth.banner.indexside')->with(['message'=>$message]);
           }
           
           $message = array('flag'=>'alert-danger', 'message'=>'Unable to update new Banner, Please try again');
           return redirect()->route('auth.banner.indexside')->with(['message'=>$message]); 
       } 
       catch (Exception $e) 
       {
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
       }
    }

    public function destroy($id)
    {
        //
    }
}
