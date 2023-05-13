<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Exception;
use App\Faq;
use Illuminate\Support\Str;

class FaqController extends Controller
{
    public function index()
    {        
        $faqs = Faq::orderBy('created_at', 'desc')
        ->get();
        return view('admin.pages.faq.index')->with(['title'=>'Faq List', 'faqs'=>$faqs]);
    }
    
    public function create()
    {
        return view('admin.pages.faq.create')->with(['title' => 'Add Faq', 'action'=> route('auth.faq.store')]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'short_description' => 'required'
        ]);
        
        try 
        {
            $rs = Faq::create([
                'title' => $request->input('title'),
                'short_description' => $request->input('short_description'),
            ]);
            
            if($rs)
            {    
                $message = array('flag'=>'alert-success', 'message'=>'Faq Created Successfully');
                return redirect()->route('auth.faq.index')->with(['message'=>$message]);    
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to Create Faq, Please try again');
            return redirect()->route('auth.faq.index')->with(['message'=>$message]); 
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
           $faqData = Faq::where('id', $id)->get();
           
           if($faqData->isEmpty())
           {
               $message = array('flag'=>'alert-danger', 'message'=>'No Faq found with provided id');
               return back()->with(['message'=>$message]);
           }
           
           return view('admin.pages.faq.edit')->with(['faqData'=>$faqData->first(),
               'title'=>'Edit Faq', 'action'=>route('auth.faq.update', $id)
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
          'title' => 'required',
          'short_description' => 'required',  
        ]);
              
        try 
        { 
          $data = [
            'title' => $request->input('title'),
            'short_description' => $request->input('short_description'),
          ];
         
          $rs = Faq::where(['id'=> $id])->update($data);
           
          if($rs){              
            $message = array('flag'=>'alert-success', 'message'=>'Faq updated successfully.');
            return redirect()->route('auth.faq.index')->with(['message'=>$message]);
          }
           
          $message = array('flag'=>'alert-danger', 'message'=>'Unable to update Faq, Please try again');
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
            $rs = Faq::destroy($id);
            
            if($rs)
            {
                $message = array('flag'=>'alert-success', 'message'=>'Faq deleted Successfully');
                return redirect()->route('auth.faq.index')->with(['message'=>$message]);
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to delete Faq, Please try again');
            return redirect()->route('auth.faq.index')->with(['message'=>$message]); 
        } 
        catch (Exception $e) 
        {
            $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
            return back()->with(['message'=>$message]);
        }   
    }
}