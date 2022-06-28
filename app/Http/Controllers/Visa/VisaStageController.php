<?php

namespace App\Http\Controllers\Visa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visa\VisaStage;
use App\Models\Visa\visaType;
use App\Models\Visa\VisaTimeContraint;

class VisaStageController extends Controller
{
    public function listing()
	{
		$visaStagingMods = VisaStage::orderBy('id','DESC')->where("visa_stages.status",1)->orWhere("visa_stages.status",2)->select('visa_stages.*','visa_type.title')->join("visa_type","visa_type.id","=","visa_stages.visa_type")->get();
		return view('Visa/listVisaStage',compact('visaStagingMods'));
	}
	
	public function addVisaStage()
	{
		$visaTypeList = visaType::where("status",1)->orderBy('id','DESC')->get();
		return view('Visa/addVisaStage',compact('visaTypeList'));
	}
	
	public function addVisaStagePost(Request $req)
	{
		$obj = new VisaStage();
		$obj->visa_type = $req->input('visa_type');
		$obj->stage_name = $req->input('stage_name');
		$obj->stage_description = $req->input('stage_description');
		$obj->cost = $req->input('cost');
		$obj->stage_order = $req->input('stage_order');
		$obj->status = $req->input('status');
		$obj->save();
		$req->session()->flash('message','Visa Stage Saved Successfully.');
        return redirect('visaStages');
	}
	public function editVisaStage($id)
	{
		$objVisaStages = VisaStage::where('id',$id)->first();
		$visaTypeList = visaType::where("status",1)->orderBy('id','DESC')->get();
		return view('Visa/editVisaStage',compact('objVisaStages'),compact('visaTypeList'));
		
	}
	public function updateVisaStagePost(Request $req)
	{
		
		$obj = VisaStage::find($req->input('id'));
		$obj->visa_type = $req->input('visa_type');
		$obj->stage_name = $req->input('stage_name');
		$obj->stage_description = $req->input('stage_description');
		$obj->cost = $req->input('cost');
		$obj->stage_order = $req->input('stage_order');
		$obj->status = $req->input('status');
		$obj->save();
		$req->session()->flash('message','Visa Stage Updated Successfully.');
        return redirect('visaStages');
	}
	public function visaTimeContraint()
	{
		$VisaTimeContraintDetails = VisaTimeContraint::where("status",1)->orWhere("status",2)->orderBy('id','DESC')->get();
		return view('Visa/listVisaTimeContraint',compact('VisaTimeContraintDetails'));
	}
	public function addVisaTimeContraint()
	{
		$visaTypeList = visaType::where("status",1)->orderBy('id','DESC')->get();
		$visaStaginggetting = VisaStage::where("status",1)->orderBy('id','DESC')->get();
		return view('Visa/addVisaTimeContraint',compact('visaStaginggetting'),compact('visaTypeList'));
	}
	
	public function addStageTimeContraintPost(Request $req)
	{
		$visaTimeContraintObj = new VisaTimeContraint();
		$visaTimeContraintObj->from_stageId = $req->input("from_stageId");
		$visaTimeContraintObj->visa_type = $req->input("visa_type");
		$visaTimeContraintObj->to_stageId = $req->input("to_stageId");
		$visaTimeContraintObj->days_to_finish = $req->input("days_to_finish");
		$visaTimeContraintObj->status = $req->input("status");
		$visaTimeContraintObj->save();
		$req->session()->flash('message','Visa Stage Time Contraint Added Successfully.');
        return redirect('visaStagesTimeContraint');
	}
	public function editVisaTimeContraint($id)
	{
		$visaTypeList = visaType::where("status",1)->orderBy('id','DESC')->get();
		$visaStaginggetting = VisaStage::where("status",1)->orderBy('id','DESC')->get();
		$result = array();
		$result['visaStaginggetting'] = $visaStaginggetting;
		$result['visaTypeList'] = $visaTypeList;
		$visaTimeContraintList = VisaTimeContraint::where('id',$id)->first();
		return view('Visa/editVisaTimeContraint',compact('visaTimeContraintList'),compact('result'));
	}
	public function updateStageTimeContraintPost(Request $req)
	{
		$visaTimeContraintObj = VisaTimeContraint::find($req->input('id'));
		$visaTimeContraintObj->from_stageId = $req->input("from_stageId");
		$visaTimeContraintObj->visa_type = $req->input("visa_type");
		$visaTimeContraintObj->to_stageId = $req->input("to_stageId");
		$visaTimeContraintObj->days_to_finish = $req->input("days_to_finish");
		$visaTimeContraintObj->status = $req->input("status");
		$visaTimeContraintObj->save();
		$req->session()->flash('message','Visa Stage Time Contraint Updated Successfully.');
        return redirect('visaStagesTimeContraint');
	}
	public function getStageAsPerType($id)
	{
		$visaStageList = VisaStage::where('visa_type',$id)->get();
		return view('Visa/getStageAsPerType',compact('visaStageList'));
	}
	public function editStageAsPerType($id,$timeId,$behave)
	{
		$visaTimeContraintList = VisaTimeContraint::where('id',$timeId)->first();
		$visaStageList = VisaStage::where('visa_type',$id)->get();
		if($behave == 'from')
		{
			$selectedValue = $visaTimeContraintList->from_stageId;
		}
		else
		{
			$selectedValue = $visaTimeContraintList->to_stageId;
		}
		return view('Visa/editStageAsPerType',compact('visaStageList'),compact('selectedValue'));
	}
	public function deleteVisaStage(Request $req)
	{
		$visaStatus_obj = VisaStage::find($req->id);
       
        $visaStatus_obj->status = 3;
       
        $visaStatus_obj->save();
        $req->session()->flash('message','Visa Stage deleted Successfully.');
        return redirect('visaStages');
	}
	
	public function deleteVisaTimeContraint(Request $req)
	{
		$visaTimeContraint_obj = VisaTimeContraint::find($req->id);
       
        $visaTimeContraint_obj->status = 3;
       
        $visaTimeContraint_obj->save();
        $req->session()->flash('message','Visa Time Contraint deleted Successfully.');
        return redirect('visaStagesTimeContraint');
	}
	
}