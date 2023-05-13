<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Exception;
use App\Job;
use App\UserInterest;
use App\Video;
use App\Advertisement;
use App\Rfp;
use App\Event;
use App\Trend;
use App\Banner;
use App\Feedback;
use App\Application;
use App\KnowledgeSubSection;
use App\KnowledgeSection;
use App\KnowledgeBase;
use App\Utility;
use App\InsightPage;

class InsightController extends Controller
{
    public function knowledge()
    {
        $section = KnowledgeSection::orderBy('created_at', 'asc')->where('page_id', '1')->where('status', '0')->get();
        $sub_section = KnowledgeSubSection::orderBy('created_at', 'asc')->where('status', '0')->get();
        $knowledge = KnowledgeBase::orderBy('created_at', 'asc')->where('status', '0')->get();
        // $knowledgebase = DB::table('knowledge_bases')->count();

        return view('front.pages.insight.knowledge')->with(['title'=>'Knowledge Base', 'section' => $section, 'sub_section' => $sub_section, 'knowledge' => $knowledge]);
    }

    public function history()
    {
        $section = KnowledgeSection::orderBy('created_at', 'asc')->where('page_id', '4')->where('status', '0')->get();
        $sub_section = KnowledgeSubSection::orderBy('created_at', 'asc')->where('status', '0')->get();
        $knowledge = KnowledgeBase::orderBy('created_at', 'asc')->where('status', '0')->get();
        // $knowledgebase = DB::table('knowledge_bases')->count();

        return view('front.pages.insight.history')->with(['title'=>'Knowledge Base', 'section' => $section, 'sub_section' => $sub_section, 'knowledge' => $knowledge]);
    }

    public function inews()
    {
        $section = KnowledgeSection::orderBy('created_at', 'asc')->where('page_id', '2')->where('status', '0')->get();
        $sub_section = KnowledgeSubSection::orderBy('created_at', 'asc')->where('status', '0')->get();
        $knowledge = KnowledgeBase::orderBy('created_at', 'asc')->where('status', '0')->get();
        // $knowledgebase = DB::table('knowledge_bases')->count();

        return view('front.pages.insight.inews')->with(['title'=>'Knowledge Base', 'section' => $section, 'sub_section' => $sub_section, 'knowledge' => $knowledge]);
    }

    public function performance()
    {
        $section = KnowledgeSection::orderBy('created_at', 'asc')->where('page_id', '5')->where('status', '0')->get();
        $sub_section = KnowledgeSubSection::orderBy('created_at', 'asc')->where('status', '0')->get();
        $knowledge = KnowledgeBase::orderBy('created_at', 'asc')->where('status', '0')->get();
        // $knowledgebase = DB::table('knowledge_bases')->count();

        return view('front.pages.insight.performance')->with(['title'=>'Knowledge Base', 'section' => $section, 'sub_section' => $sub_section, 'knowledge' => $knowledge]);
    }

    public function snapshot()
    {
        $section = KnowledgeSection::orderBy('created_at', 'asc')->where('page_id', '3')->where('status', '0')->get();
        $sub_section = KnowledgeSubSection::orderBy('created_at', 'asc')->where('status', '0')->get();
        $knowledge = KnowledgeBase::orderBy('created_at', 'asc')->where('status', '0')->get();
        // $knowledgebase = DB::table('knowledge_bases')->count();

        return view('front.pages.insight.snapshot')->with(['title'=>'Knowledge Base', 'section' => $section, 'sub_section' => $sub_section, 'knowledge' => $knowledge]);
    }
    
    public function csrInsight()
    {
        $insight = InsightPage::orderBy('created_at', 'asc')->get();

        return view('front.pages.insight.insight')->with(['title'=>'CSR Insight', 'insight' => $insight]);
    }

    public function utilities()
    {
        $utilities = Utility::orderBy('created_at', 'asc')->get();

        return view('front.pages.home.utilities')->with(['title'=>'Utilities', 'utilities' => $utilities]);
    }

    public function utilitidetails(Request $request, $id)
    {
       try
       {

        $utilitydetailData = Utility::where('id', $id)->get();
        $softwares = Utility::orderBy('id', 'desc')->where('id', '!=',$id )->limit(5)->get();
              
        return view('front.pages.home.utility-details')->with(['title'=>'Utility Details', 'utilitydetailData'=>$utilitydetailData->first(), 'softwares' => $softwares
           ]);
           
       }
       catch (Exception $e) 
       {
        echo $e->getMessage();die;
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
       }
    }
}
