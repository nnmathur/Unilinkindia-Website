<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Exception;
use App\User;
use App\Policy;
use App\Service;
use App\Faq;
use App\Blog;
use App\BlogCategory;
use App\BlogTag;
use App\HomePage;
use App\AboutPage;
use App\Contact;
use App\Team;
use App\Testimonial;
use App\Page;
use App\Banner;
use App\Exposure;
use App\Client;
use App\Schedule;

class HomeController extends Controller
{
    public function index()
    {
    	$banners = Banner::orderBy('id', 'desc')->get();
    	$services = Service::orderBy('id', 'desc')->get();
        $faqs = Faq::get();
        $home = HomePage::where('id', '1')->first();
        $about = AboutPage::where('id', '1')->first();
        $blogs = Blog::orderBy('id', 'desc')->get();
        $blog_cat = BlogCategory::get();
        $blog_tag = BlogTag::get();
        $teams = Team::get();
        $testimonials = Testimonial::get();
        $clients = Client::orderBy('id', 'desc')->get();
        return view('front.pages.index')->with(['title'=>'Home Page', 'banners'=>$banners, 'services'=>$services, 'faqs'=>$faqs, 'home'=>$home, 'about'=>$about, 'blogs'=>$blogs, 'blog_cat'=>$blog_cat, 'blog_tag'=>$blog_tag, 'teams'=>$teams, 'testimonials'=>$testimonials, 'clients'=>$clients]);
    } 

    
    
    public function services()
    {
    	$services = Service::orderBy('id', 'desc')->get();
        return view('front.pages.services')->with(['title'=>'Services Page', 'services'=>$services]);
    }

    public function about()
    {
        $faqs = Faq::get();
        $about = AboutPage::where('id', '1')->first();
        $services = Service::orderBy('id', 'desc')->get();
        $teams = Team::get();
        $testimonials = Testimonial::get();
        return view('front.pages.about')->with(['title'=>'About Page', 'faqs'=>$faqs, 'about'=>$about, 'services'=>$services, 'teams'=>$teams, 'testimonials'=>$testimonials]);
    }

    public function faq()
    {
        $faqs = Faq::get();
        return view('front.pages.faq')->with(['title'=>'Faq Page', 'faqs'=>$faqs]);
    }
    
    public function bannerdetails(Request $request, $id)
    {

        $portfolios = Policy::latest()->take(4)->get();
        $banner = Banner::where('id', $id)->first();
        $banners = Banner::where('id', '!=', '4')->where('id', '!=', $id)->orderBy('id', 'desc')->get();
        return view('front.pages.banner_details')->with(['title'=>'Details Page', 'banner'=>$banner, 'banners'=>$banners,'portfolios'=>$portfolios]);
    }

    public function blogdetails(Request $request, $slug)
    {
        $blogs = Blog::where('slug', $slug)->first();
        $lat_blogs = Blog::where('slug', '!=', $slug)->orderBy('id', 'desc')->limit(3)->get();
        $blog_cat = BlogCategory::get();
        $blog_tag = BlogTag::get();
        return view('front.pages.blog_details')->with(['title'=>'Blog Page', 'blogs'=>$blogs, 'blog_cat'=>$blog_cat, 'blog_tag'=>$blog_tag, 'lat_blogs'=>$lat_blogs]);
    }
    
    public function blog()
    {
        $blogs = Blog::orderBy('id', 'desc')->get();
        $blog_cat = BlogCategory::get();
        $blog_tag = BlogTag::get();
        return view('front.pages.blog')->with(['title'=>'Blog Page', 'blogs'=>$blogs, 'blog_cat'=>$blog_cat, 'blog_tag'=>$blog_tag]);
    }

    public function contact()
    {
        return view('front.pages.contact')->with(['title'=>'Contact Page']);
    }  

    public function listservices($slug)
    {
        $content = Service::where('slug', $slug)->first();
        $policies = Policy::where('services', $content->id)->get();
        $services = Service::where('id', '!=', $content->id)->get();
        return view('front.pages.listservices')->with(['title'=>'Listservices Page', 'content'=>$content, 'policies'=>$policies, 'services'=>$services]);
    }

    public function servicedetails($id)
    {
        $services = Service::where('id', $id)->orderBy('id', 'desc')->first();
        return view('front.pages.services_details')->with(['title'=>'Service Details Page', 'services'=>$services]);
    }
    
    public function contactForm(Request $request)
    {
        try 
        {
            $rs = Contact::create([
                'name' =>$request->input('name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'message' => $request->input('message'),
                'status' => 0
            ]);
            
            if($rs)
            {
                # Send OTP in email after successful registration
                $data = array();
                
                $data['name'] = $request->input('name');
                $data['email'] = $request->input('email');
                $data['phone'] = $request->input('phone');
                $data['message_new'] = $request->input('message');
                                
                Mail::send('mail.support', $data, function ($message) use ($data) {
                    $message->to($data['email']);
                    $message->from('noreply@unilinkindia.co.in', 'Unilink India');
                    $message->subject('Thank You for Contacting Us');
                });
                
                Mail::send('mail.supportadmin', $data, function ($message) use ($data) {
                    $message->to('noreply@unilinkindia.co.in');
                    $message->from($data['email'], $data['name']);
                    $message->subject('New Enquiry on Unilink India');
                });
    
                $message = array('flag'=>'alert-success', 'message'=>'Mail sent Successfully');
                return redirect()->back()->with(['message'=>$message]);
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to send mail, Please try again');
            return back()->with(['message'=>$message]);
        }
        catch (Exception $e) 
        {
            $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
            return back()->with(['message'=>$message]);
        }
    }
    
    public function singlepage(Request $request, $slug)
    {
        $pages = Page::where('slug', $slug)->first();
        return view('front.pages.single_page')->with(['title'=>'Single Page', 'pages'=>$pages]);
    } 
    
    public function exposure()
    {
    	$exposures = Exposure::orderBy('id', 'desc')->get();
        return view('front.pages.exposure')->with(['title'=>'Exposure Page', 'exposures'=>$exposures]);
    }
    
    public function exposuredetails($id)
    {
        $banner = Exposure::where('id', $id)->first();
        $banners = Exposure::where('id', '!=', '4')->where('id', '!=', $id)->orderBy('id', 'desc')->get();
        
        return view('front.pages.exposure_detail')->with(['title'=>'Exposure Detail Page', 'banner'=>$banner, 'banners'=>$banners]);
    }
    
    public function clients()
    {
    	$clients = Client::orderBy('id', 'desc')->get();
        return view('front.pages.clients')->with(['title'=>'Clients Page', 'clients'=>$clients]);
    }
    
    public function schedule()
    {
        return view('front.pages.schedule')->with(['title'=>'Schedule Page']);
    }  
    
    public function scheduleForm(Request $request)
    {
        try 
        {
            $rs = Schedule::create([
                'first_name' =>$request->input('first_name'),
                'last_name' =>$request->input('last_name'),
                'email' => $request->input('email'),
                'phone' => $request->input('phone'),
                'jobtitle' => $request->input('jobtitle'),
                'company' => $request->input('company'),
                'employee' => $request->input('employee'),
                'product' => $request->input('product'),
                'message' => $request->input('message'),
                'status' => 0
            ]);
            
            if($rs)
            {
                # Send OTP in email after successful registration
                $data = array();
                
                $data['first_name'] = $request->input('first_name');
                $data['last_name'] = $request->input('last_name');
                $data['email'] = $request->input('email');
                $data['phone'] = $request->input('phone');
                $data['jobtitle'] = $request->input('jobtitle');
                $data['company'] = $request->input('company');
                $data['employee'] = $request->input('employee');
                $data['product'] = $request->input('product');
                $data['message_new'] = $request->input('message');
                                
                Mail::send('mail.schedule', $data, function ($message) use ($data) {
                    $message->to($data['email']);
                    $message->from('noreply@unilinkindia.co.in', 'Unilink India');
                    $message->subject('Thank You for Contacting Us');
                });
                
                Mail::send('mail.scheduleadmin', $data, function ($message) use ($data) {
                    $message->to('noreply@unilinkindia.co.in');
                    $message->from($data['email'], $data['first_name']);
                    $message->subject('New Appointment on Unilink India');
                });
    
                $message = array('flag'=>'alert-success', 'message'=>'Mail sent Successfully');
                return redirect()->back()->with(['message'=>$message]);
            }
            
            $message = array('flag'=>'alert-danger', 'message'=>'Unable to send mail, Please try again');
            return back()->with(['message'=>$message]);
        }
        catch (Exception $e) 
        {
            $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
            return back()->with(['message'=>$message]);
        }
    }
}