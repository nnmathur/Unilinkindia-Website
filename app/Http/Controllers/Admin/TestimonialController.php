<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Exception;
use App\Testimonial;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    public function index()
    {        
        $testimonials = Testimonial::orderBy('created_at', 'desc')->get();
        return view('admin.pages.testimonial.index')->with(['title'=>'Testimonial List', 'testimonials'=>$testimonials]);
    }
    
    public function create()
    {
        return view('admin.pages.testimonial.create')->with(['title' => 'Add Testimonial', 'action'=> route('auth.testimonial.store')]);
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
              $request->image->storeAs('public/testimonial',$file);
            }
            else
            {
              $file='';
            }
            
            $rs = Testimonial::create([
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
                $message = array('flag'=>'alert-success', 'message'=>'Testimonial Created Successfully');
                return redirect()->route('auth.testimonial.index')->with(['message'=>$message]);    
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to Create Testimonial, Please try again');
            return redirect()->route('auth.testimonial.index')->with(['message'=>$message]); 
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
           $testimonialData = Testimonial::where('id', $id)->get();
           
           if($testimonialData->isEmpty())
           {
               $message = array('flag'=>'alert-danger', 'message'=>'No Testimonial found with provided id');
               return back()->with(['message'=>$message]);
           }
           
           return view('admin.pages.testimonial.edit')->with(['testimonialData'=>$testimonialData->first(),
               'title'=>'Edit Testimonial', 'action'=>route('auth.testimonial.update', $id)
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
            $request->image->storeAs('public/testimonial',$file);
          }
          else
          {
            $image = Testimonial::where(['id'=> $id])->first();
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
         
          $rs = Testimonial::where(['id'=> $id])->update($data);
           
          if($rs){              
            $message = array('flag'=>'alert-success', 'message'=>'Testimonial updated successfully.');
            return redirect()->route('auth.testimonial.index')->with(['message'=>$message]);
          }
           
          $message = array('flag'=>'alert-danger', 'message'=>'Unable to update Testimonial, Please try again');
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
            $rs = Testimonial::destroy($id);
            
            if($rs)
            {
                $message = array('flag'=>'alert-success', 'message'=>'Testimonial deleted Successfully');
                return redirect()->route('auth.testimonial.index')->with(['message'=>$message]);
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to delete Testimonial, Please try again');
            return redirect()->route('auth.testimonial.index')->with(['message'=>$message]); 
        } 
        catch (Exception $e) 
        {
            $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
            return back()->with(['message'=>$message]);
        }   
    }
    
    public function setfeature(Request $request,$id)
    {
        $data = Testimonial::get();
        foreach($data as $media) {
            if ( $media->status == 0 ) {
                Testimonial::where('status',0)
                ->whereId($id)
                ->update(['status' => 1]);
            }
        }
        $message = array('flag'=>'alert-success', 'message'=>'Testimonial set as featured successfully.');
        return redirect()->back()->with(['message'=>$message]);   
    }

    public function unfeature(Request $request,$id)
    {
        $data = Testimonial::get();
        foreach($data as $media) {
            if ( $media->status == 1 ) {
                Testimonial::where('status',1)
                ->whereId($id)
                ->update(['status' => 0]);
            }
        }
        $message = array('flag'=>'alert-success', 'message'=>'Testimonial removed as featured successfully.');
        return redirect()->back()->with(['message'=>$message]);   
    }
}