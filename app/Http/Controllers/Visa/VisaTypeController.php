<?php

namespace App\Http\Controllers\Visa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visa\visaType;

class VisaTypeController extends Controller
{
    
	public function listing()
	{
		$visaTypeListing = visaType::where("status",1)->orWhere("status",2)->orderBy("id","DESC")->get();
		return view("Visa/VisaTypelisting",compact('visaTypeListing'));
	}
	
	public function addVisaType()
	{
		return view("Visa/addVisaType");
	}
	
	public function editVisaType($id=NULL)
	{
		$visaTypeListingdatas = visaType::where("id",$id)->first();
		return view("Visa/updateVisaType",compact('visaTypeListingdatas'));
	}
	
	public function addVisaTypePost(Request $rq)
	{
		$obj = new visaType();
		$obj->onboarding_status = $rq->input('onboarding_status');
		$obj->title = $rq->input('title');
		$obj->overstay_fine = $rq->input('overstay_fine');
		$obj->status = $rq->input('status');
		$obj->save();
		$rq->session()->flash('message','Visa Type Saved Successfully.');
        return redirect('visaType');
	}
	public function updateVisaTypePost(Request $req)
	{
		$obj = visaType::find($req->input('id'));
		$obj->onboarding_status = $req->input('onboarding_status');
		$obj->title = $req->input('title');
		$obj->overstay_fine = $req->input('overstay_fine');
		$obj->status = $req->input('status');
		$obj->save();
		$req->session()->flash('message','Visa Type Updated Successfully.');
        return redirect('visaType');
		
	}
	
	public function deleteVisaType(Request $req)
	{
		$visaType_obj = visaType::find($req->id);
       
        $visaType_obj->status = 3;
       
        $visaType_obj->save();
        $req->session()->flash('message','Visa Type deleted Successfully.');
        return redirect('visaType');
	}
}
