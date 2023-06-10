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
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {        
        $services = Service::where('status', 0)
        ->orderBy('created_at', 'desc')
        ->get();
        return view('admin.pages.service.index')->with(['title'=>'Services List', 'services'=>$services]);
    }
    
    public function create()
    {
        return view('admin.pages.service.create')->with(['title' => 'Add Services', 'action'=> route('auth.services.store')]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'unique:services', 
            'short_description' => 'required',            
            'image' => 'required'
        ]);
        
        try 
        {
            if($request->image->getClientOriginalName()){
                $ext = $request->image->getClientOriginalExtension();
                $file = date('YmdHis').rand(1,99999).'.'.$ext;     
                $request->image->move(public_path('uploads/services/'), $file);
            }
            else
            {
                $file='';
            }
              
            $rs = Service::create([
                'title' => $request->input('title'),
                'slug' => Str::slug($request->input('title')),
                'short_description' => $request->input('short_description'),
                'description' => $request->input('description'),
                'image' => $file,
                'added_by' => Auth::user()->id,
            ]);
            
            if($rs)
            {    
                $message = array('flag'=>'alert-success', 'message'=>'Services Created Successfully');
                return redirect()->route('auth.services.index')->with(['message'=>$message]);    
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to Create Services, Please try again');
            return redirect()->route('auth.services.index')->with(['message'=>$message]); 
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
           $userData = Service::where('slug', $slug)->get();
           
           if($userData->isEmpty())
           {
               $message = array('flag'=>'alert-danger', 'message'=>'No Service found with provided id');
               return back()->with(['message'=>$message]);
           }
           
           return view('admin.pages.service.edit')->with(['userData'=>$userData->first(),
               'title'=>'Edit Services', 'action'=>route('auth.services.update', $slug)
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
          'slug' => 'unique:services', 
          'short_description' => 'required'
        ]);
              
        try 
        { 
            if(isset($request->image) && $request->image->getClientOriginalName()){
                $ext = $request->image->getClientOriginalExtension();
                $file = date('YmdHis').rand(1,99999).'.'.$ext;     
                $request->image->move(public_path('uploads/services/'), $file);
            }
            else
            {
              $image = Service::where('slug', $slug)->first();
    
              if($image){
                $file = $image->image;
              }
              else{
                $file='';
              }
            }
            
          $data = [
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title')),
            'short_description' => $request->input('short_description'),
            'description' => $request->input('description'),
            'image' => $file,
            'added_by' => Auth::user()->id,
          ];
         
          $rs = Service::where(['slug'=> $slug])->update($data);
           
          if($rs){              
            $message = array('flag'=>'alert-success', 'message'=>'Services updated successfully.');
            return redirect()->route('auth.services.index')->with(['message'=>$message]);
          }
           
          $message = array('flag'=>'alert-danger', 'message'=>'Unable to update services, Please try again');
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
            $rs = Service::destroy($id);
            
            if($rs)
            {
                $message = array('flag'=>'alert-success', 'message'=>'Services deleted Successfully');
                return redirect()->route('auth.services.index')->with(['message'=>$message]);
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to delete Services, Please try again');
            return redirect()->route('auth.services.index')->with(['message'=>$message]); 
        } 
        catch (Exception $e) 
        {
            $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
            return back()->with(['message'=>$message]);
        }   
    }
}