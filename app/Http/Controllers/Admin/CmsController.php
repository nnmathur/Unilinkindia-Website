<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Exception;
use App\HomePage;
use App\AboutPage;
use Illuminate\Support\Str;

class CmsController extends Controller
{
    public function edit(Request $request)
    {
       try
       {           
           $homeData = HomePage::where('id', '1')->get();
           
           if($homeData->isEmpty())
           {
               $message = array('flag'=>'alert-danger', 'message'=>'No Page found with provided id');
               return back()->with(['message'=>$message]);
           }
           
           return view('admin.pages.cms.home')->with(['homeData'=>$homeData->first(),
               'title'=>'Edit Home Page', 'action'=>route('auth.home.update')
           ]);
           
       }
       catch (Exception $e)
       {
           Log::error($e);
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
       }
    }
    
    public function update(Request $request)
    {
        //dd($request->all());
        try 
        { 
            $id = 1;
            
            if(isset($request->image1)){
                $ext = $request->image1->getClientOriginalExtension();
                $file1 = date('YmdHis').rand(1,99999).'.'.$ext;     
                $request->image1->storeAs('public/cms',$file1);
            }
            else
            {
              $image1 = HomePage::find($id)->image1;
    
              if($image1){
                $file1 = $image1;
              }
              else{
                $file1='';
              }
            }
            
            if(isset($request->image2)){
                $ext = $request->image2->getClientOriginalExtension();
                $file2 = date('YmdHis').rand(1,99999).'.'.$ext;     
                $request->image2->storeAs('public/cms',$file2);
            }
            else
            {
              $image2 = HomePage::find($id)->image2;
    
              if($image2){
                $file2 = $image2;
              }
              else{
                $file2='';
              }
            }
            
            if(isset($request->image3)){
                $ext = $request->image3->getClientOriginalExtension();
                $file3 = date('YmdHis').rand(1,99999).'.'.$ext;     
                $request->image3->storeAs('public/cms',$file3);
            }
            else
            {
              $image3 = HomePage::find($id)->image3;
    
              if($image3){
                $file3 = $image3;
              }
              else{
                $file3='';
              }
            }
            
            if(isset($request->attachment1)){
                $ext = $request->attachment1->getClientOriginalExtension();
                $file4 = date('YmdHis').rand(1,99999).'.'.$ext;     
                $request->attachment1->storeAs('public/attachment',$file4);
            }
            else
            {
              $attachment1 = HomePage::find($id)->attachment1;
    
              if($attachment1){
                $file4 = $attachment1;
              }
              else{
                $file4='';
              }
            }
            
            if(isset($request->attachment2)){
                $ext = $request->attachment2->getClientOriginalExtension();
                $file5 = date('YmdHis').rand(1,99999).'.'.$ext;     
                $request->attachment2->storeAs('public/attachment',$file5);
            }
            else
            {
              $attachment2 = HomePage::find($id)->attachment2;
    
              if($attachment2){
                $file5 = $attachment2;
              }
              else{
                $file5='';
              }
            }
            
            if(isset($request->attachment3)){
                $ext = $request->attachment3->getClientOriginalExtension();
                $file6 = date('YmdHis').rand(1,99999).'.'.$ext;     
                $request->attachment3->storeAs('public/attachment',$file6);
            }
            else
            {
              $attachment3 = HomePage::find($id)->attachment3;
    
              if($attachment3){
                $file6 = $attachment3;
              }
              else{
                $file6='';
              }
            }
            
            if(isset($request->attachment4)){
                $ext = $request->attachment4->getClientOriginalExtension();
                $file7 = date('YmdHis').rand(1,99999).'.'.$ext;     
                $request->attachment4->storeAs('public/attachment',$file7);
            }
            else
            {
              $attachment4 = HomePage::find($id)->attachment4;
    
              if($attachment4){
                $file7 = $attachment4;
              }
              else{
                $file7='';
              }
            }
            
            if(isset($request->attachment5)){
                $ext = $request->attachment5->getClientOriginalExtension();
                $file8 = date('YmdHis').rand(1,99999).'.'.$ext;     
                $request->attachment5->storeAs('public/attachment',$file8);
            }
            else
            {
              $attachment5 = HomePage::find($id)->attachment5;
    
              if($attachment5){
                $file8 = $attachment5;
              }
              else{
                $file8='';
              }
            }
            
            if(isset($request->attachment6)){
                $ext = $request->attachment6->getClientOriginalExtension();
                $file9 = date('YmdHis').rand(1,99999).'.'.$ext;     
                $request->attachment6->storeAs('public/attachment',$file9);
            }
            else
            {
              $attachment6 = HomePage::find($id)->attachment6;
    
              if($attachment6){
                $file9 = $attachment6;
              }
              else{
                $file9='';
              }
            }
        
          $data = [
            'content1' => $request->input('content1'),
            'content2' => $request->input('content2'),
            'content3' => $request->input('content3'),
            'image1' => $file1,
            'image2' => $file2,
            'image3' => $file3,
            'attachment1' => $file4,
            'attachment2' => $file5,
            'attachment3' => $file6,
            'attachment4' => $file7,
            'attachment5' => $file8,
            'attachment6' => $file9
          ];
         
          $rs = HomePage::where(['id'=> '1'])->update($data);
           
          if($rs){              
            $message = array('flag'=>'alert-success', 'message'=>'Home Page updated successfully.');
            return redirect()->route('auth.home.edit')->with(['message'=>$message]);
          }
           
          $message = array('flag'=>'alert-danger', 'message'=>'Unable to update Home Page, Please try again');
          return back()->with(['message'=>$message]);
       } 
       catch (Exception $e) 
       {
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
       }
   } 
   
   public function editabout(Request $request)
    {
       try
       {           
           $aboutData = AboutPage::where('id', '1')->get();
           
           if($aboutData->isEmpty())
           {
               $message = array('flag'=>'alert-danger', 'message'=>'No Page found with provided id');
               return back()->with(['message'=>$message]);
           }
           
           return view('admin.pages.cms.about')->with(['aboutData'=>$aboutData->first(),
               'title'=>'Edit About Page', 'action'=>route('auth.about.update')
           ]);
           
       }
       catch (Exception $e)
       {
           Log::error($e);
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
       }
    }
    
    public function updateabout(Request $request)
    {
        try 
        { 
            $id = 1;
            
            $data = [
                'who_we_are' => $request->input('who_we_are'),
                'our_global' => $request->input('our_global'),
                'what_we_do' => $request->input('what_we_do'),
                'it_year' => $request->input('it_year'),
                'exp_year' => $request->input('exp_year'),
                'comp_project' => $request->input('comp_project'),
                'cust_success' => $request->input('cust_success')
            ];
         
            $rs = AboutPage::where(['id'=> '1'])->update($data);
           
            if($rs){              
                $message = array('flag'=>'alert-success', 'message'=>'About Page updated successfully.');
                return redirect()->route('auth.about.edit')->with(['message'=>$message]);
            }
               
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to update About Page, Please try again');
            return back()->with(['message'=>$message]);
       } 
       catch (Exception $e) 
       {
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
       }
   } 
}