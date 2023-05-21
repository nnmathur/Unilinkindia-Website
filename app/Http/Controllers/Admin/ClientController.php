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
use App\Client;
use Illuminate\Support\Str;

class ClientController extends Controller
{
    public function index()
    {        
        $clients = Client::orderBy('created_at', 'desc')->get();
        return view('admin.pages.client.index')->with(['title'=>'Clients List', 'clients'=>$clients]);
    }
    
    public function create()
    {
        return view('admin.pages.client.create')->with(['title' => 'Add Clients', 'action'=> route('auth.clients.store')]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);
        
        try 
        {
            if($request->image){
              $ext = $request->image->getClientOriginalExtension();
              $file = date('YmdHis').rand(1,99999).'.'.$ext;     
             // $request->image->storeAs('public/clients',$file);
              $request->image->move(public_path('/uploads/clients/'), $file);
            }
            else
            {
              $file='';
            }
            
            $rs = Client::create([
                'title' => $request->input('title'),
                'image' => $file,
            ]);
            
            if($rs)
            {    
                $message = array('flag'=>'alert-success', 'message'=>'Clients Created Successfully');
                return redirect()->route('auth.clients.index')->with(['message'=>$message]);    
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to Create Clients, Please try again');
            return redirect()->route('auth.clients.index')->with(['message'=>$message]); 
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
           $userData = Client::where('id', $slug)->get();
           
           if($userData->isEmpty())
           {
               $message = array('flag'=>'alert-danger', 'message'=>'No Clients found with provided id');
               return back()->with(['message'=>$message]);
           }
           
           return view('admin.pages.client.edit')->with(['userData'=>$userData->first(),
               'title'=>'Edit Clients', 'action'=>route('auth.clients.update', $slug)
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
        ]);
              
        try 
        {   
          if(isset($request->image) && $request->image->getClientOriginalName()){
            $ext = $request->image->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;     
            //$request->image->storeAs('public/clients',$file);
            $request->image->move(public_path('/uploads/clients/'), $file);
          }
          else
          {
            $image = Client::where(['id'=> $slug])->first();

            if($image){
              $file = $image->image;
            }
            else{
              $file='';
            }
          }

          $data = [
            'title' => $request->input('title'),
            'image' => $file,
          ];
         
          $rs = Client::where(['id'=> $slug])->update($data);
           
          if($rs){              
            $message = array('flag'=>'alert-success', 'message'=>'Clients updated successfully.');
            return redirect()->route('auth.clients.index')->with(['message'=>$message]);
          }
           
          $message = array('flag'=>'alert-danger', 'message'=>'Unable to update Clients, Please try again');
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
            $rs = Client::destroy($id);
            
            if($rs)
            {
                $message = array('flag'=>'alert-success', 'message'=>'Clients deleted Successfully');
                return redirect()->route('auth.clients.index')->with(['message'=>$message]);
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to delete Clients, Please try again');
            return redirect()->route('auth.clients.index')->with(['message'=>$message]); 
        } 
        catch (Exception $e) 
        {
            $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
            return back()->with(['message'=>$message]);
        }   
    }
}