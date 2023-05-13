<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Exception;
use App\Blog;
use App\BlogCategory;
use App\BlogTag;
use App\User;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {        
        $blogs = Blog::orderBy('created_at', 'desc')
        ->get();
        $users = User::orderBy('created_at', 'desc')
        ->get();
        return view('admin.pages.blog.index')->with(['title'=>'Blogs List', 'blogs'=>$blogs, 'users'=>$users]);
    }
    
    public function create()
    {
      $blog_categories = BlogCategory::where('status', 1)
        ->orderBy('created_at', 'desc')
        ->get();
      $blog_tags = BlogTag::where('status', 1)
        ->orderBy('created_at', 'desc')
        ->get();
        return view('admin.pages.blog.create')->with(['title' => 'Add Blog', 'action'=> route('auth.blog.store'), 'blog_categories'=>$blog_categories, 'blog_tags'=>$blog_tags]);
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'unique:blogs', 
            'short_description' => 'required'
        ]);
        
        try 
        {
            if($request->image->getClientOriginalName()){
              $ext = $request->image->getClientOriginalExtension();
              $file = date('YmdHis').rand(1,99999).'.'.$ext;     
              $request->image->storeAs('public/blogs',$file);
            }
            else
            {
              $file='';
            }

            $rs = Blog::create([
                'title' => $request->input('title'),
                'slug' => Str::slug($request->input('title')),
                'short_description' => $request->input('short_description'),
                'description' => $request->input('description'),
                'category' => $request->input('category'),
                'tag' => $request->input('tag'),
                'credit' => $request->input('credit'),
                'credit_url' => $request->input('credit_url'),
                'added_by' => Auth::user()->id,
                'image' => $file,
            ]);
            
            if($rs)
            {    
                $message = array('flag'=>'alert-success', 'message'=>'Blog Created Successfully');
                return redirect()->route('auth.blog.index')->with(['message'=>$message]);    
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to Create Blog, Please try again');
            return redirect()->route('auth.blog.index')->with(['message'=>$message]); 
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
            $blogData = Blog::where('slug', $slug)->get();
            $blog_categories = BlogCategory::where('status', 1)
              ->orderBy('created_at', 'desc')
              ->get();
            $blog_tags = BlogTag::where('status', 1)
              ->orderBy('created_at', 'desc')
              ->get();
           
           if($blogData->isEmpty())
           {
               $message = array('flag'=>'alert-danger', 'message'=>'No Blog found with provided id');
               return back()->with(['message'=>$message]);
           }
           
           return view('admin.pages.blog.edit')->with(['blogData'=>$blogData->first(),
               'title'=>'Edit Blog', 'action'=>route('auth.blog.update', $slug), 'blog_categories'=>$blog_categories, 'blog_tags'=>$blog_tags
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
          'slug' => 'unique:policies', 
          'short_description' => 'required',  
        ]);
              
        try 
        {   
          if(isset($request->image) && $request->image->getClientOriginalName()){
            $ext = $request->image->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;     
            $request->image->storeAs('public/blogs',$file);
          }
          else
          {
            $image = Blog::where(['slug'=> $slug])->first();
            //dd($video);

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
            'category' => $request->input('category'),
            'tag' => $request->input('tag'),
            'credit' => $request->input('credit'),
            'credit_url' => $request->input('credit_url'),
          ];
         
          $rs = Blog::where(['slug'=> $slug])->update($data);
           
          if($rs){              
            $message = array('flag'=>'alert-success', 'message'=>'Blog updated successfully.');
            return redirect()->route('auth.blog.index')->with(['message'=>$message]);
          }
           
          $message = array('flag'=>'alert-danger', 'message'=>'Unable to update Blog, Please try again');
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
            $rs = Blog::destroy($id);
            
            if($rs)
            {
                $message = array('flag'=>'alert-success', 'message'=>'Blog deleted Successfully');
                return redirect()->route('auth.blog.index')->with(['message'=>$message]);
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to delete Blog, Please try again');
            return redirect()->route('auth.blog.index')->with(['message'=>$message]); 
        } 
        catch (Exception $e) 
        {
            $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
            return back()->with(['message'=>$message]);
        }   
    }

    // Blog Categories

    public function category()
    {        
        $category = BlogCategory::orderBy('created_at', 'desc')
        ->get();
        return view('admin.pages.blog.category.index')->with(['title'=>'Blog Category List', 'category'=>$category]);
    }
    
    public function createcategory()
    {
        return view('admin.pages.blog.category.create')->with(['title' => 'Add Blog Category', 'action'=> route('auth.blogcategory.store')]);
    }
    
    public function storecategory(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'unique:blogs'
        ]);
        
        try 
        {
            $rs = BlogCategory::create([
                'title' => $request->input('title'),
                'slug' => Str::slug($request->input('title'))
            ]);
            
            if($rs)
            {    
                $message = array('flag'=>'alert-success', 'message'=>'Blog Category Created Successfully');
                return redirect()->route('auth.blogcategory.index')->with(['message'=>$message]);    
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to Create Blog Category, Please try again');
            return redirect()->route('auth.blogcategory.index')->with(['message'=>$message]); 
        }
        catch (Exception $e) 
        {
            $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
            return back()->with(['message'=>$message]);
        }
    }


    public function editcategory(Request $request, $slug)
    {
       try
       {           
           $blogData = BlogCategory::where('slug', $slug)->get();
           
           if($blogData->isEmpty())
           {
               $message = array('flag'=>'alert-danger', 'message'=>'No Blog Category found with provided id');
               return back()->with(['message'=>$message]);
           }
           
           return view('admin.pages.blog.category.edit')->with(['blogData'=>$blogData->first(),
               'title'=>'Edit Blog', 'action'=>route('auth.blogcategory.update', $slug)
           ]);
           
       }
       catch (Exception $e)
       {
           Log::error($e);
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
           
           
       }
    }

    public function updatecategory(Request $request, $slug)
    {
      
        $request->validate([
          'title' => 'required',
          'slug' => 'unique:policies',   
        ]);
              
        try 
        {   
          $data = [
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title'))
          ];
         
          $rs = BlogCategory::where(['slug'=> $slug])->update($data);
           
          if($rs){              
            $message = array('flag'=>'alert-success', 'message'=>'Blog Category updated successfully.');
            return redirect()->route('auth.blogcategory.index')->with(['message'=>$message]);
          }
           
          $message = array('flag'=>'alert-danger', 'message'=>'Unable to update Blog Category, Please try again');
          return back()->with(['message'=>$message]);
       } 
       catch (Exception $e) 
       {
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
       }
   }    
    
    public function deletecategory(Request $request, $id)
    {
        try 
        {
            $rs = BlogCategory::destroy($id);
            
            if($rs)
            {
                $message = array('flag'=>'alert-success', 'message'=>'Blog Category deleted Successfully');
                return redirect()->route('auth.blogcategory.index')->with(['message'=>$message]);
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to delete Blog Category, Please try again');
            return redirect()->route('auth.blogcategory.index')->with(['message'=>$message]); 
        } 
        catch (Exception $e) 
        {
            $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
            return back()->with(['message'=>$message]);
        }   
    }


    // Blog Tags

    public function tag()
    {        
        $tag = BlogTag::orderBy('created_at', 'desc')
        ->get();
        return view('admin.pages.blog.tag.index')->with(['title'=>'Blog Tag List', 'tag'=>$tag]);
    }
    
    public function createtag()
    {
        return view('admin.pages.blog.tag.create')->with(['title' => 'Add Blog Tag', 'action'=> route('auth.blogtag.store')]);
    }
    
    public function storetag(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'unique:blogs'
        ]);
        
        try 
        {
            $rs = BlogTag::create([
                'title' => $request->input('title'),
                'slug' => Str::slug($request->input('title'))
            ]);
            
            if($rs)
            {    
                $message = array('flag'=>'alert-success', 'message'=>'Blog Tag Created Successfully');
                return redirect()->route('auth.blogtag.index')->with(['message'=>$message]);    
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to Create Blog Tag, Please try again');
            return redirect()->route('auth.blogtag.index')->with(['message'=>$message]); 
        }
        catch (Exception $e) 
        {
            $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
            return back()->with(['message'=>$message]);
        }
    }


    public function edittag(Request $request, $slug)
    {
       try
       {           
           $blogData = BlogTag::where('slug', $slug)->get();
           
           if($blogData->isEmpty())
           {
               $message = array('flag'=>'alert-danger', 'message'=>'No Blog Tag found with provided id');
               return back()->with(['message'=>$message]);
           }
           
           return view('admin.pages.blog.tag.edit')->with(['blogData'=>$blogData->first(),
               'title'=>'Edit Blog', 'action'=>route('auth.blogtag.update', $slug)
           ]);
           
       }
       catch (Exception $e)
       {
           Log::error($e);
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
           
           
       }
    }

    public function updatetag(Request $request, $slug)
    {
      
        $request->validate([
          'title' => 'required',
          'slug' => 'unique:policies',   
        ]);
              
        try 
        {   
          $data = [
            'title' => $request->input('title'),
            'slug' => Str::slug($request->input('title'))
          ];
         
          $rs = BlogTag::where(['slug'=> $slug])->update($data);
           
          if($rs){              
            $message = array('flag'=>'alert-success', 'message'=>'Blog Tag updated successfully.');
            return redirect()->route('auth.blogtag.index')->with(['message'=>$message]);
          }
           
          $message = array('flag'=>'alert-danger', 'message'=>'Unable to update Blog Tag, Please try again');
          return back()->with(['message'=>$message]);
       } 
       catch (Exception $e) 
       {
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
       }
   }    
    
    public function deletetag(Request $request, $id)
    {
        try 
        {
            $rs = BlogTag::destroy($id);
            
            if($rs)
            {
                $message = array('flag'=>'alert-success', 'message'=>'Blog Tag deleted Successfully');
                return redirect()->route('auth.blogtag.index')->with(['message'=>$message]);
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to delete Blog Tag, Please try again');
            return redirect()->route('auth.blogtag.index')->with(['message'=>$message]); 
        } 
        catch (Exception $e) 
        {
            $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
            return back()->with(['message'=>$message]);
        }   
    }
}