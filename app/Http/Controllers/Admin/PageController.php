<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Exception;
use App\Page;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {        
        $content = Page::where('status', 1)
        ->orderBy('created_at', 'desc')
        ->get();
        return view('admin.pages.content.index')->with(['title'=>'Contents List', 'content'=>$content]);
    }
    
    public function create()
    {
        return view('admin.pages.content.create')->with(['title' => 'Add Contents', 'action'=> route('auth.content.store')]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'unique:pages',
        ]);
        
        try 
        {
            $rs = Page::create([
                'name' => $request->input('name'),
                'slug' => Str::slug($request->input('name')),
                'content' => $request->input('content')
            ]);
            
            if($rs)
            {    
                $message = array('flag'=>'alert-success', 'message'=>'Page Created Successfully');
                return redirect()->route('auth.content.index')->with(['message'=>$message]);    
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to Create Page, Please try again');
            return redirect()->route('auth.content.index')->with(['message'=>$message]); 
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
           $userData = Page::where('slug', $slug)->get();
           
           if($userData->isEmpty())
           {
               $message = array('flag'=>'alert-danger', 'message'=>'No Page found with provided id');
               return back()->with(['message'=>$message]);
           }
           
           return view('admin.pages.content.edit')->with(['userData'=>$userData->first(),
               'title'=>'Edit Contents', 'action'=>route('auth.content.update', $slug)
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
          'name' => 'required'
        ]);
              
        try 
        {   
          $data = [
            'name' => $request->input('name'),
            'content' => $request->input('content')
          ];
         
          $rs = Page::where(['slug'=> $slug])->update($data);
           
          if($rs){              
            $message = array('flag'=>'alert-success', 'message'=>'Page updated successfully.');
            return redirect()->route('auth.content.index')->with(['message'=>$message]);
          }
           
          $message = array('flag'=>'alert-danger', 'message'=>'Unable to update content, Please try again');
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
            $rs = Page::destroy($id);
            
            if($rs)
            {
                $message = array('flag'=>'alert-success', 'message'=>'Page deleted Successfully');
                return redirect()->route('auth.content.index')->with(['message'=>$message]);
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to delete Page, Please try again');
            return redirect()->route('auth.content.index')->with(['message'=>$message]); 
        } 
        catch (Exception $e) 
        {
            $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
            return back()->with(['message'=>$message]);
        }   
    }
}