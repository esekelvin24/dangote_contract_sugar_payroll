<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Gate;
use Alert;
use Illuminate\Support\Collection;
use App\User;
use App\Department;
use App\Bank;
use App\Country;
use App\BloodGroup;
use App\EmergencyContact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\URL;
use File;

class ProfileController extends Controller
{
    public function index()
    {
    	$departments=Department::orderBy('name')->pluck('name','id');
    	$banks=Bank::orderBy('name')->pluck('name','id');
    	$nationalities=Country::orderBy('name')->pluck('nationality','id');
    	$bloodgroups=BloodGroup::orderBy('blood_type')->pluck('blood_type','id');
    	$emergency_contacts=EmergencyContact::where('user_id', Auth::user()->id)->get();
    	$emergency_contacts_count=EmergencyContact::where('user_id', Auth::user()->id)->get()->count();
    	$userDetails = User::where('id', Auth::user()->id)->first();
    	$passportpath = '/passportUploads/' . Auth::user()->id.'/';
		$cerpacpath = '/cerpacUploads/' . Auth::user()->id.'/';
		$photopath = '/photoUploads/' . Auth::user()->id.'/';
        return view('pages.profile', compact('userDetails', 'departments', 'banks', 'emergency_contacts', 'emergency_contacts_count', 'nationalities', 'bloodgroups', 'passportpath', 'cerpacpath', 'photopath'));
    }

    public function staffProfile(User $staff)
    {
    	$staff_id = $staff->id;
    	$departments=Department::orderBy('name')->pluck('name','id');
    	$banks=Bank::orderBy('name')->pluck('name','id');
    	$nationalities=Country::orderBy('name')->pluck('nationality','id');
    	$bloodgroups=BloodGroup::orderBy('blood_type')->pluck('blood_type','id');
    	$emergency_contacts=EmergencyContact::where('user_id', $staff_id)->get();
    	$emergency_contacts_count=EmergencyContact::where('user_id', $staff_id)->get()->count();
    	$userDetails = User::where('id', $staff_id)->first();
    	$passportpath = '/passportUploads/' . $staff_id.'/';
		$cerpacpath = '/cerpacUploads/' . $staff_id.'/';
		$photopath = '/photoUploads/' . $staff_id.'/';
        return view('pages.staff_profile', compact('userDetails', 'departments', 'banks', 'emergency_contacts', 'emergency_contacts_count', 'nationalities', 'bloodgroups', 'passportpath', 'cerpacpath', 'photopath'));
    }

    public function add_emergency_contact(Request $request)
    {
        $data = new EmergencyContact;
        $this->validate($request,[
                'contact_name'=>'required',
                'contact_relationship'=>'required',
                'contact_number'=>'required',
            ]);
        $data->user_id = Auth::user()->id;
        $data->contact_name = $request->contact_name;
        $data->relationship = $request->contact_relationship;
        $data->phone = $request->contact_number;
        $response = $data->save();
        if ($response) {
            Alert::success('Emeregency Contact Added.','SUCCESS')->autoclose(10000);
        	return redirect(url('/myProfile'));
        } else {
            Alert::error('Try Again or Contact Administrator.','ERROR')->autoclose(10000);
        	return redirect(url('/myProfile'));
        }
        
    }

    public function delete_emergency_contact(Request $request)
    {
        $id = $request->delete_contact;
        $data = EmergencyContact::find($id);
        $response = $data->delete();
        if ($response) {
            Alert::success('Emeregency Contact Deleted.','SUCCESS')->autoclose(10000);
        	return redirect(url('/myProfile'));
        } else {
            Alert::error('Try Again or Contact Administrator.','ERROR')->autoclose(10000);
        	return redirect(url('/myProfile'));
        }
    }

    public function spouse_details(Request $request)
    {
    	$id = $request->profile_owner_id;
        $data = User::where('id', $id)->first();
        // $this->validate($request,[
        //         'spouse_name'=>'required',
        //         'spouse_email'=>'required',
        //         'spouse_phone'=>'required',
        //     ]);
        $data->spouse_name = $request->spouse_name;
        $data->spouse_email = $request->spouse_email;
        $data->spouse_phone = $request->spouse_phone;
        $response = $data->save();
        if ($response) {
            Alert::success('Spouse Details Updated.','SUCCESS')->autoclose(10000);
        	return redirect(url('/myProfile'));
        } else {
            Alert::error('Try Again or Contact Administrator.','ERROR')->autoclose(10000);
        	return redirect(url('/myProfile'));
        }
        
    }

    public function passport_details(Request $request)
    {
    	$id = $request->profile_owner_id;
        $data = User::where('id', $id)->first();
        
        $passportpath = public_path().'/passportUploads/' . $id;
        File::makeDirectory($passportpath, $mode = 0775, true, true);
        $cerpacpath = public_path().'/cerpacUploads/' . $id;
        File::makeDirectory($cerpacpath, $mode = 0775, true, true);

        $data->passport_no = $request->passport_no;
        $data->passport_expiry_date = $request->passport_expiry_date;
        $data->cerpac_no = $request->cerpac_no;
        $data->cerpac_expiry_date = $request->cerpac_expiry_date;
        if(Input::hasFile('upload_passport')){
        	$file = Input::file('upload_passport');
	        $extension = Input::file('upload_passport')->getClientOriginalExtension();
	        $filename = $id . '_passport.' . $extension; // renameing image
	        // $destinationPath = 'uploads/scanned_signature';//its refers project/public/uploads/scanned_signature directory
	        $data->passport = $filename;
	        $upload_success = $file->move($passportpath, $filename);
        }
        if(Input::hasFile('upload_cerpac')){
        	$file = Input::file('upload_cerpac');
	        $extension = Input::file('upload_cerpac')->getClientOriginalExtension();
	        $filename = $id . '_cerpac.' . $extension; // renameing image
	        // $destinationPath = 'uploads/scanned_signature';//its refers project/public/uploads/scanned_signature directory
	        $data->cerpac = $filename;
	        $upload_success = $file->move($cerpacpath, $filename);
        }
        
        $response = $data->save();
        if ($response) {
            Alert::success('Passport & CERPAC Details Updated.','SUCCESS')->autoclose(10000);
        	return redirect(url('/myProfile'));
        } else {
            Alert::error('Try Again or Contact Administrator.','ERROR')->autoclose(10000);
        	return redirect(url('/myProfile'));
        }
        
    }

    public function bank_details(Request $request)
    {
    	$id = $request->profile_owner_id;
        $data = User::where('id', $id)->first();
        $this->validate($request,[
                'bank'=>'required',
                'account_number'=>'required',
            ]);
        $data->bank_id = $request->bank;
        $data->bank_account_number = $request->account_number;
        $response = $data->save();
        if ($response) {
            Alert::success('Bank Details Updated.','SUCCESS')->autoclose(10000);
        	return redirect(url('/myProfile'));
        } else {
            Alert::error('Try Again or Contact Administrator.','ERROR')->autoclose(10000);
        	return redirect(url('/myProfile'));
        }
        
    }

    public function my_details(Request $request)
    {
    	$id = $request->profile_owner_id;
        $data = User::where('id', $id)->first();
        $this->validate($request,[
                'name'=>'required',
                'country'=>'required',
                'email'=>'required',
                'department'=>'required',
                'designation'=>'required',
                'phone'=>'required',
                'bloodgroup'=>'required',
                'dob'=>'required',
            ]);
        $photopath = public_path().'/photoUploads/' . $id;
        File::makeDirectory($photopath, $mode = 0775, true, true);
        $data->name = $request->name;
        $data->country_id = $request->country;
        $data->email = $request->email;
        $data->department_id = $request->department;
        $data->designation = $request->designation;
        $data->phone = $request->phone;
        $data->blood_group_id = $request->bloodgroup;
        $data->dob = $request->dob;
        if(Input::hasFile('upload_photo')){
        	$file = Input::file('upload_photo');
	        $extension = Input::file('upload_photo')->getClientOriginalExtension();
	        $filename = $id . '_photo.' . $extension; // renameing image
	        // $destinationPath = 'uploads/scanned_signature';//its refers project/public/uploads/scanned_signature directory
	        $data->photo = $filename;
	        $upload_success = $file->move($photopath, $filename);
        }
        $response = $data->save();
        if ($response) {
            Alert::success('Details Updated.','SUCCESS')->autoclose(10000);
        	return redirect(url('/myProfile'));
        } else {
            Alert::error('Try Again or Contact Administrator.','ERROR')->autoclose(10000);
        	return redirect(url('/myProfile'));
        }
    }
        
}
