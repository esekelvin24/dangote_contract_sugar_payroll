<?php

namespace App\Http\Controllers;

use App\Report;
use App\Comment;
use App\User;
use Gate;
use Alert;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use File;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $reports = Report::where('user_id', Auth::user()->id)->get();
      
        return view('pages.my_reports', compact('reports'));
    }

    public function my_staff()
    {

     $user = \Auth::user(); //note the user that logs in
      
    if ($user->can('can-view-staff'))
     {
       $department_id = Auth::user()->department_id;
       $users = User::where('department_id', $department_id )->orderBy('name', 'ASC')->get();
 
        return view('pages.my_staff', compact('users', 'staffcount'));
    }
   else{
     return view('errors.403');
    }
}



    public function staff_report(User $staff)
    {
        $staff_id = $staff->id;
        $staff_name = $staff->name."'s Reports";

        $reports = Report::where('user_id', $staff_id)->get();
        $user = User::find($staff);
  
        return view('pages.my_reports', compact('reports', 'staff_name'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.new_report');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $report = new Report;
        $this->validate($request,[
                'report_title'=>'required',
                'report'=>'required',
               
            ]);
        $path = public_path().'/reportUploads/' . Auth::user()->id;
        File::makeDirectory($path, $mode = 0775, true, true);
        $detail=$request->report;

        $dom = new \domdocument();
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getelementsbytagname('img');
 
        foreach($images as $k => $img){
            $data = $img->getattribute('src');
 
            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
 
            $data = base64_decode($data);
            $image_name= "/reportUploads/".Auth::user()->id."/".time().$k.'.png';
            $path = public_path() .'/'. $image_name;
 
            file_put_contents($path, $data);
 
            $img->removeattribute('src');
            $img->setattribute('src', $image_name);
        }
 
        $detail = $dom->savehtml();
        $report->title = $request->report_title;
        $report->report = $detail;
        $report->user_id = Auth::user()->id;
        $report->save();
        //alert()->success('Report Successfuly Sent.','SRR')->autoclose(3500);
        Alert::success('Report Successfuly Sent.','DRR')->autoclose(10000);
        return redirect(url('/my_reports'));
    }

    public function report(Report $report)
    {
        //return URL::to('/');
       // return $report->user->name;
        $report_id = $report->id;
        $report_r = $report->report;
        $report_date = $report->created_at;
        $report_owner = $report->user->name;


        // if(Gate::denies('see-all-reports', $report)){
        //     return view('home');
        // }
        // if(Auth::check() && (Auth::user()->role != "1") && (Auth::user()->id != $owner_id)){
        //     $reports = Report::where('user_id', Auth::user()->id)->get();
        //     return view('pages.my_reports', compact('reports'));
        // } else {
            // $report_id = Input::get('id');

            // $reports = Report::find($report_id);
            // $report = $reports->report;
            // $report_date = $reports->created_at;
            // $report_id = $reports->id;
            // $report_owner = $reports->user->name;
            // //$user = User::find($staff);
            // //$staff_name = $user->name."'s Reports";
            $comments = Comment::where('report_id', $report_id)->get();
      
            return view('pages.view_report', compact('report_r', 'report_date', 'report_id', 'report_owner', 'comments'));
        // }
    }

    public function comment(Request $request)
    {
        $comment = new Comment;
        $this->validate($request,[
                'comment'=>'required',
                'report_id'=>'required',
               
            ]);
        $comment->comment = $request->comment;
        $comment->report_id = $request->report_id;
        $comment->user_id = Auth::user()->id;
        $comment->save();
        Alert::success('Comment Posted.','SRR')->autoclose(10000);
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
       // return('it posts');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function edit(Report $report)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Report $report)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Report  $report
     * @return \Illuminate\Http\Response
     */
    public function destroy(Report $report)
    {
        //
    }
}
