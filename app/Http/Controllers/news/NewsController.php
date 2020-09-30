<?php

namespace App\Http\Controllers\news;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Auth;
use App\Http\Controllers\Utilities;

class NewsController extends Controller
{
    //

    public function create_news(Request $request)
    {
       return view('news.new_news');
    }

    public function edit_news(Request $request)
    {
        $news_collection = DB::table('tbl_news as nw')->get();
        return view('news.news', compact('news_collection'));
    }

    public function save_news(Request $request)
    {
        $rules =
            [
                'news_title'=>'required',
                'ckeditor1'=>'required',
                'att_chkbox' => 'sometimes',
                "attachment_file" => "sometimes|mimetypes:application/pdf|max:10000",
                'banner_image'  => 'mimes:jpeg,jpg,png,gif|required|max:10000'
            ];
        //check validation options
        $this->validate($request,$rules);
    
        
        //$news_id = Utilities::getnextid("news_id");
        $rand_one = rand(1,9999999);
        $rand_two = rand(1,9999999);
        $rand = $rand_one.$rand_two;
        //$ext_arr = explode(".",$request->attachment_file);
        $img_ext =  $request->banner_image->getClientOriginalExtension();
        $file_ext = "";
        if ($request->att_chkbox != 0)
        {
            $file_ext = $request->attachment_file->getClientOriginalExtension();
           
        }
        
        //dd($ext);
        $insert = [

            //'news_id'    => $news_id,
            'news_title'   => $request->news_title,
            'news_content' => $request->ckeditor1,
            'created_at' => NOW(),
            'user_id'    => Auth::user()->id,
            'file'       => $request->att_chkbox,
            'file_path'   => $rand.".".$file_ext,
            'img_path'   => $rand.".".$img_ext
        ];

        if ($request->att_chkbox == 0)
        {
            unset($insert['file_path']);
        }

        $result = DB::table('tbl_news')->insert($insert);
        $request->banner_image->move("images/news", $rand.".".$img_ext);

        if ($result == true && $request->att_chkbox == 1)
        {
            $request->attachment_file->move("file_upload/news", $rand.".".$file_ext);
        }

        $data=[
            'news_success'=>'yes'
        ];
        return redirect()->route('create_news')->with($data);
       
    }

    public function save_edit_event(Request $request)
    {
        
       
        $rules =
            [
                'event_title'=>'required',
                'event_date'=>'required',
                'start_time'=>'required',
                'end_time'=>'required',
                'venue'=>'required',
                'ckeditor1'=>'required',
                'att_chkbox' => 'sometimes',
                "attachment_file" => "sometimes|mimetypes:application/pdf|max:10000",
                'banner_image'  => 'mimes:jpeg,jpg,png,gif|sometimes|max:10000'
            ];
        //check validation options
        $this->validate($request,$rules);
        $file_ext ="";
        $img_ext = "";
        $file_name = "";
        $img_name = "";

        $event_id = $request->event_id;
        $event_obj = DB::table('tbl_event')->where('event_id', $event_id)->first();
        
       

       
        //$ext_arr = explode(".",$request->attachment_file);
        if($request->attachment_file != null)
        {
            $file_ext = $request->attachment_file->getClientOriginalExtension();
            $file_name = rand(1,9999999).rand(1,9999999).".".$file_ext;
            if (file_exists("file_upload/events/".$event_obj->file_path) && $event_obj->file_path !="")
                 unlink("file_upload/events/".$event_obj->file_path);
        }else
        {
            $file_name = $event_obj->file_path;
        }

        if($request->banner_image != null)
        {
            $img_ext =  $request->banner_image->getClientOriginalExtension();
            $img_name = rand(1,9999999).rand(1,9999999).".".$img_ext;
            if (file_exists("images/events/".$event_obj->file_path)  && $event_obj->file_path !="")
                  unlink("images/events/".$event_obj->img_path);
        }else
        {
            $img_name = $event_obj->img_path;
        }
  
        $update = [

            
            'event_title'   => $request->event_title,
            'event_content' => $request->ckeditor1,
            'event_start_time' => $request->start_time,
            'event_end_time' => $request->end_time,
            'event_venue' => $request->venue,
            'event_date' => $request->event_date,
            'created_at' => NOW(),
            'user_id'    => Auth::user()->id,
            'file'       => $request->att_chkbox,
            'file_path'   => $file_name,
            'img_path'   => $img_name
        ];

        if ($request->attachment_file == null)
        {
            unset($update['file_path']);
            
        }

        if ($request->banner_image == null)
        {
            unset($update['img_path']);
        }
        
        //if ($request->banner_image)

        $result = DB::table('tbl_event')->where('event_id', $event_id)->update($update);
       

        if($request->banner_image != null)
        {
            $request->banner_image->move("images/events", $img_name);    
        }

        if ($result == true && $request->attachment_file != null)
        {
            $request->attachment_file->move("file_upload/events", $file_name);
        }

        $data=[
            'news_success'=>'yes'
        ];
        return redirect()->route('edit_event')->with($data);
       
    }

    public function save_edit_news(Request $request)
    {
        

        $rules =
            [
                'news_title'=>'required',
                'ckeditor1'=>'required',
                'att_chkbox' => 'sometimes',
                "attachment_file" => "sometimes|mimetypes:application/pdf|max:10000",
                'banner_image'  => 'mimes:jpeg,jpg,png,gif|sometimes|max:10000'
            ];
        //check validation options
        $this->validate($request,$rules);
        $file_ext ="";
        $img_ext = "";
        $file_name = "";
        $img_name = "";
    
        $news_id = $request->news_id;

        $news_obj = DB::table('tbl_news')->where('news_id', $news_id)->first();
        
       

       
        //$ext_arr = explode(".",$request->attachment_file);
        if($request->attachment_file != null)
        {
           
            $file_ext = $request->attachment_file->getClientOriginalExtension();
            $file_name = rand(1,9999999).rand(1,9999999).".".$file_ext;
            
            if (file_exists("file_upload/news/".$news_obj->file_path)  && $news_obj->file_path !="")
                  unlink("file_upload/news/".$news_obj->file_path);
                  
        }else
        {
           
            $file_name = $news_obj->file_path;
        }

        if($request->banner_image != null)
        {
            
            $img_ext =  $request->banner_image->getClientOriginalExtension();
            $img_name = rand(1,9999999).rand(1,9999999).".".$img_ext;
            if (file_exists("images/news/".$news_obj->img_path)  && $news_obj->img_path !="")
                  unlink("images/news/".$news_obj->img_path);

        }else
        {
           
            $img_name = $news_obj->img_path;
        }

        //$ext_arr = explode(".",$request->attachment_file);
       /* if($request->attachment_file != null)
        {
            $file_ext = $request->attachment_file->getClientOriginalExtension();
        }
 

        if($request->banner_image != null)
        {
            $img_ext =  $request->banner_image->getClientOriginalExtension();
        }*/

        //dd($ext);
        $update = [

            
            'news_title'   => $request->news_title,
            'news_content' => $request->ckeditor1,
            'created_at' => NOW(),
            'user_id'    => Auth::user()->id,
            'file'       => $request->att_chkbox,
            'file_path'   => $file_name,
            'img_path'   => $img_name
        ];

        if ($request->attachment_file == null)
        {
            unset($update['file_path']);

        }

        if ($request->banner_image == null)
        {
            unset($update['img_path']);
        }
        
        //if ($request->banner_image)

        $result = DB::table('tbl_news')->where('news_id', $news_id)->update($update);
       

        if($request->banner_image != null)
        {
            $request->banner_image->move("images/news", $img_name);
        }

        if ($result == true && $request->attachment_file != null)
        {
            $request->attachment_file->move("file_upload/news", $file_name);
        }

        $data=[
            'news_success'=>'yes'
        ];
        return redirect()->route('edit_news')->with($data);
       
    }


    public function save_event(Request $request)
    {
        
        $rules =
            [
                'event_title'=>'required',
                'event_date' =>'required',
                'ckeditor1'=>'required',
                'start_time' =>'required',
                'venue' =>'required',
                'end_time'=>'required',
                'att_chkbox' => 'sometimes',
                "attachment_file" => "sometimes|mimetypes:application/pdf|max:10000",
                'banner_image'  => 'mimes:jpeg,jpg,png,gif|required|max:10000'
            ];
        //check validation options
        $this->validate($request,$rules);
    
        
        //$event_id = Utilities::getnextid("event_id");
        //$ext_arr = explode(".",$request->attachment_file);
        $rand_one = rand(1,9999999);
        $rand_two = rand(1,9999999);
        $rand = $rand_one.$rand_two;

        $img_ext =  $request->banner_image->getClientOriginalExtension();
        $file_ext = "";
        if ($request->att_chkbox != 0)
        {
            $file_ext = $request->attachment_file->getClientOriginalExtension();
            
        }
        //dd($ext);
        $insert = [

            //'event_id'    => $event_id,
            'event_title'   => $request->event_title,
            'event_content' => $request->ckeditor1,
            'event_start_time' => $request->start_time,
            'event_end_time' => $request->end_time,
            'event_venue' => $request->venue,
            'created_at' => NOW(),
            'user_id'    => Auth::user()->id,
            'file'       => $request->att_chkbox,
            'file_path'   => ''.$rand.".".$file_ext,
            'img_path'   => ''.$rand.".".$img_ext
        ];

        if ($request->att_chkbox == 0)
        {
            unset($insert['file_path']);
        }

        $result = DB::table('tbl_event')->insert($insert);
        $request->banner_image->move("images/events", $rand.".".$img_ext);

        if ($result == true && $request->att_chkbox == 1)
        {
            $request->attachment_file->move("file_upload/events", $rand.".".$file_ext);
        }

        $data=[
            'event_success'=>'yes'
        ];
        return redirect()->route('create_event')->with($data);
       
    }

    public function create_event(Request $request)
    {
        return view('news.new_event');
    }

    public function edit_event(Request $request)
    {
        $event_collection = DB::table('tbl_event as nw')->OrderBy('event_date')->get();

        
        return view('news.event', compact('event_collection'));
    }
}
