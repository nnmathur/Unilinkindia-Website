<?php

namespace App\Http\Controllers\Admin;

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
use App\KnowledgeSubSection;
use App\KnowledgeSection;
use App\KnowledgeBase;
use App\InsightPage;

class InsightController extends Controller
{
    public function indexSection()
    {
        $content = KnowledgeSection::orderBy('created_at', 'desc')->where('status', '=', '0')->get(); 
        return view('admin.pages.insight.section.index')->with(['title' => 'Knowledge Sections', 'content' => $content]);
    }

    public function createSection()
    {
        $page = InsightPage::all();
        return view('admin.pages.insight.section.create')->with(['title' => 'Add Knowledge Sections', 
           'action'=> route('auth.insightsection.store'), 'page'=>$page
       ]);
    }

    public function storeSection(Request $request)
    {
        $request->validate([
           'name'=>'required',
           'page_id'=>'required'
       ]);
       
       $userId = Auth::user()->id;
       
       try 
       {           
            $rs = KnowledgeSection::create([
                'name' => $request->input('name'),
                'page_id' => $request->input('page_id'),
                'status' => 0
            ]); 
           
           if($rs)
           {
               $message = array('flag'=>'alert-success', 'message'=>'New Section Added Successfully');
               return redirect()->route('auth.insightsection.index')->with(['message'=>$message]);
           }
           
           $message = array('flag'=>'alert-danger', 'message'=>'Unable to add new Section, Please try again');
           return redirect()->route('auth.insightsection.index')->with(['message'=>$message]); 
           
       } 
       catch (Exception $e) 
       {
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
       }
    }

    public function editSection(Request $request, $sectionId)
    {
       try
       {
           // Get Temporary jon with job id
           
           $sectionData = KnowledgeSection::where('id', $sectionId)->get();
           
           if($sectionData->isEmpty())
           {
               $message = array('flag'=>'alert-danger', 'message'=>'No event found with provided id');
               return back()->with(['message'=>$message]);
           }

           $page = InsightPage::all();
           
           return view('admin.pages.insight.section.edit')->with(['sectionData'=>$sectionData->first(),
               'title'=>'Edit Section', 'action'=>route('auth.insightsection.update', $sectionId), 'page'=>$page
           ]);
           
       }
       catch (Exception $e)
       {
           Log::error($e);
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
           
           
       }
    }

    public function updateSection(Request $request, $sectionId)
    {
        $request->validate([
           'name'=>'required',
       ]);
       
       $userId = Auth::user()->id;
       
       try 
       {
           
           $data = [
              'name' => $request->input('name'),
              'page_id' => $request->input('page_id'),
           ];
           
           $rs = KnowledgeSection::where(['id'=> $sectionId])->update($data);
           
           if($rs){
               $message = array('flag'=>'alert-success', 'message'=>'Section Updated Successfully');
               return redirect()->route('auth.insightsection.index')->with(['message'=>$message]);
           }
           
           $message = array('flag'=>'alert-danger', 'message'=>'Unable to update new Section, Please try again');
           return redirect()->route('auth.insightsection.index')->with(['message'=>$message]); 
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

    public function deleteSection(Request $request,$id)
    {
    $data = DB::table('knowledge_sections')->get();
    foreach($data as $media) {
        if ( $media->status == 0 ) {
            DB::table('knowledge_sections')
            ->where('status',0)
            ->whereId($id)
            ->update(['status' => 10]);
        }
    }
    $media->status = $request->adminStatus;
    $message = array('flag'=>'alert-success', 'message'=>'Section Removed Successfully');
    return redirect()->back()->with(['message'=>$message]);
    }


    public function indexSubsection()
    {
        $content = KnowledgeSubSection::orderBy('created_at', 'desc')->where('status', '=', '0')->get(); 
        return view('admin.pages.insight.subsection.index')->with(['title' => 'Knowledge Sub Sections', 'content' => $content]);
    }

    public function createSubsection()
    {
      $page = InsightPage::all();
      $section = KnowledgeSection::where('status', '=', '0')->get(); 

        return view('admin.pages.insight.subsection.create')->with(['title' => 'Add Knowledge Sub Sections', 'action'=> route('auth.insightsubsection.store'), 'page'=>$page, 'section'=>$section
       ]);
    }

    public function storeSubsection(Request $request)
    {
        $request->validate([
           'name'=>'required',
           'section_id'=>'required',
           'page_id'=>'required'
       ]);
       
       $userId = Auth::user()->id;
       
       try 
       {           
            $rs = KnowledgeSubSection::create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'section_id' => $request->input('section_id'),
                'page_id' => $request->input('page_id'),
                'status' => 0
            ]); 
           
           if($rs)
           {
               $message = array('flag'=>'alert-success', 'message'=>'New Sub Section Added Successfully');
               return redirect()->route('auth.insightsubsection.index')->with(['message'=>$message]);
           }
           
           $message = array('flag'=>'alert-danger', 'message'=>'Unable to add new Sub Section, Please try again');
           return redirect()->route('auth.insightsubsection.index')->with(['message'=>$message]); 
           
       } 
       catch (Exception $e) 
       {
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
       }
    }

      // public function sectionsAjax(Request $request) {
      //   $mainsection = DB::table('knowledge_sections')->whereIn('name', [$page_id])->get();
      //   echo '<option value="">Select</option>';
      //   foreach($mainsection as $k=>$c){
      //     echo '<option value="'.$c->id.'">'.$c->name.'</option>';   
      //   }
      // }

    public function editSubsection(Request $request, $subsectionId)
    {
       try
       {
           // Get Temporary jon with job id
           
           $subsectionData = KnowledgeSubSection::where('id', $subsectionId)->get();
           
           if($subsectionData->isEmpty())
           {
               $message = array('flag'=>'alert-danger', 'message'=>'No event found with provided id');
               return back()->with(['message'=>$message]);
           }


            $page = InsightPage::all();
            $section = KnowledgeSection::where('status', '=', '0')->get(); 
           
           return view('admin.pages.insight.subsection.edit')->with(['subsectionData'=>$subsectionData->first(),
               'title'=>'Edit Sub Section', 'action'=>route('auth.insightsubsection.update', $subsectionId), 'section'=>$section, 'page'=>$page
           ]);
           
       }
       catch (Exception $e)
       {
           Log::error($e);
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
           
           
       }
    }

    public function updateSubsection(Request $request, $subsectionId)
    {
        $request->validate([
           'name'=>'required',
       ]);
       
       $userId = Auth::user()->id;
       
       try 
       {
           
           $data = [
              'name' => $request->input('name'),
              'page_id' => $request->input('page_id'),
              'description' => $request->input('description'),
              'section_id' => $request->input('section_id')
           ];
           
           $rs = KnowledgeSubSection::where(['id'=> $subsectionId])->update($data);
           
           if($rs){
               $message = array('flag'=>'alert-success', 'message'=>'Sub Section Updated Successfully');
               return redirect()->route('auth.insightsubsection.index')->with(['message'=>$message]);
           }
           
           $message = array('flag'=>'alert-danger', 'message'=>'Unable to update new Sub Section, Please try again');
           return redirect()->route('auth.insightsubsection.index')->with(['message'=>$message]); 
       } 
       catch (Exception $e) 
       {
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
       }
    }

    public function deleteSubsection(Request $request,$id)
    {
    $data = DB::table('knowledge_sub_sections')->get();
    foreach($data as $media) {
        if ( $media->status == 0 ) {
            DB::table('knowledge_sub_sections')
            ->where('status',0)
            ->whereId($id)
            ->update(['status' => 10]);
        }
    }
    $media->status = $request->adminStatus;
    $message = array('flag'=>'alert-success', 'message'=>'Sub-Section Removed Successfully');
    return redirect()->back()->with(['message'=>$message]);

    }



    public function indexKnowledge()
    {
        $content = KnowledgeBase::orderBy('created_at', 'desc')->where('status', '=', '0')->get(); 
        return view('admin.pages.insight.knowledgebase.index')->with(['title' => 'Knowledge Sections', 'content' => $content]);
    }

    public function createKnowledge()
    {
      $page = InsightPage::all();
      $section = KnowledgeSection::where('status', '=', '0')->get(); 
      $sub_section = KnowledgeSubSection::where('status', '=', '0')->get(); 
        return view('admin.pages.insight.knowledgebase.create')->with(['title' => 'Add Knowledge Sections', 'action'=> route('auth.insightknowledge.store'), 'page'=>$page, 'section'=>$section, 'sub_section'=>$sub_section
       ]);
    }

    public function storeKnowledge(Request $request)
    {
        $request->validate([
           'name'=>'required'
       ]);
       
       $userId = Auth::user()->id;
       
       try 
       {  
            if($request->attachment->getClientOriginalName()){
              $ext = $request->attachment->getClientOriginalExtension();
              $file1 = date('YmdHis').rand(1,99999).'.'.$ext;     
              $request->attachment->storeAs('public/knowledgebase',$file1);
            }
            else
            {
              $file1='';
            }  

            $rs = KnowledgeBase::create([
                'name' => $request->input('name'),
                'section' => $request->input('section'),
                'sub_section' => $request->input('sub_section'),
                'page_id' => $request->input('page_id'),
                'description' => $request->input('description'),
                'attachment' => $file1, 
                'status' => 0
            ]); 
           
           if($rs)
           {
               $message = array('flag'=>'alert-success', 'message'=>'New KnowledgeBase Added Successfully');
               return redirect()->route('auth.insightknowledge.index')->with(['message'=>$message]);
           }
           
           $message = array('flag'=>'alert-danger', 'message'=>'Unable to add new KnowledgeBase, Please try again');
           return redirect()->route('auth.insightknowledge.index')->with(['message'=>$message]); 
           
       } 
       catch (Exception $e) 
       {
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
       }
    }

    public function editKnowledge(Request $request, $knowledgeId)
    {
       try
       {
           // Get Temporary jon with job id
           
           $knowledgeData = KnowledgeBase::where('id', $knowledgeId)->get();
           
           if($knowledgeData->isEmpty())
           {
               $message = array('flag'=>'alert-danger', 'message'=>'No data found with provided id');
               return back()->with(['message'=>$message]);
           }

            $page = InsightPage::all();
            $section = KnowledgeSection::where('status', '=', '0')->get(); 
            $sub_section = KnowledgeSubSection::where('status', '=', '0')->get(); 
           
           return view('admin.pages.insight.knowledgebase.edit')->with(['knowledgeData'=>$knowledgeData->first(), 'title'=>'Edit Section', 'action'=>route('auth.insightknowledge.update', $knowledgeId), 'section'=>$section, 'sub_section'=>$sub_section, 'page'=>$page
           ]);
           
       }
       catch (Exception $e)
       {
           Log::error($e);
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
           
           
       }
    }

    public function updateKnowledge(Request $request, $knowledgeId)
    {
        $request->validate([
           'name'=>'required',
       ]);
       
       $userId = Auth::user()->id;
       
       try 
       {
          if(isset($request->attachment) && $request->attachment->getClientOriginalName()){
            $ext = $request->attachment->getClientOriginalExtension();
            $file1 = date('YmdHis').rand(1,99999).'.'.$ext;     
            $request->attachment->storeAs('public/knowledgebase',$file1);
          }
          else
          {
            $attachment = KnowledgeBase::find($knowledgeId)->attachment;

            if($attachment){
              $file1 = $attachment;
            }
            else{
              $file1='';
            }
          }
           
            $data = [
              'name' => $request->input('name'),
              'page_id' => $request->input('page_id'),
              'section' => $request->input('section'),
              'sub_section' => $request->input('sub_section'),
              'description' => $request->input('description'),
              'attachment' => $file1
           ];
           
           $rs = KnowledgeBase::where(['id'=> $knowledgeId])->update($data);
           
           if($rs){
               $message = array('flag'=>'alert-success', 'message'=>'KnowledgeBase Updated Successfully');
               return redirect()->route('auth.insightknowledge.index')->with(['message'=>$message]);
           }
           
           $message = array('flag'=>'alert-danger', 'message'=>'Unable to update new KnowledgeBase, Please try again');
           return redirect()->route('auth.insightknowledge.index')->with(['message'=>$message]); 
       } 
       catch (Exception $e) 
       {
           $message = array('flag'=>'alert-danger', 'message'=>$e->getMessage());
           return back()->with(['message'=>$message]);
       }
    }

    public function deleteKnowledge(Request $request,$id)
    {
    $data = DB::table('knowledge_bases')->get();
    foreach($data as $media) {
        if ( $media->status == 0 ) {
            DB::table('knowledge_bases')
            ->where('status',0)
            ->whereId($id)
            ->update(['status' => 10]);
        }
    }
    $media->status = $request->adminStatus;
    $message = array('flag'=>'alert-success', 'message'=>'Knowledge Base Removed Successfully');
    return redirect()->back()->with(['message'=>$message]);
    }

}
