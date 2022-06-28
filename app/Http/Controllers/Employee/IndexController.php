<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company\Subsidiary;
use App\Models\Company\Divison;
use App\Models\Company\Department;
use  App\Models\Attribute\Attributes;
use App\Models\Employee\Employee_attribute;
use App\Models\Employee\Employee_details;
use App\Models\Employee\EmployeeImportFiles;
use App\Models\Employee\EmployeeAttendanceModel;
use Session;


class IndexController extends Controller
{
    
        public function addEmp()
		{
			$departmentMod = Department::where("status",1)->orderBy("id",'DESC')->get();
			
			return view("Employee/addemp",compact('departmentMod'));
		}
		
		public function employeeForm($id=NULL)
		{
			$dept_id=$id;
			$attributesDetails = Attributes::whereIn("department_id",array($id,'All'))->where(["parent_attribute"=>0])->orderBy("sort_order","ASC")->get();			
			return view("Employee/employeeform",compact('attributesDetails','dept_id'));		
		}

		public function saveEmployeeData(Request $req)
		{
			$inputData = $req->input();
			
			// $num = str_pad(mt_rand(1,9999),4,'0',STR_PAD_LEFT);
			$emplid = 10001;
			$empdetails = new Employee_details();
			$maxempid = Employee_details::max('emp_id');
			if($maxempid=='')
			{
				$num = $emplid;
			}
			else{
				$num = $maxempid+1;
			}
			$empdetails->emp_id=$num;
			$empdetails->dept_id=$req->input('dept_id');
			$empdetails->onboarding_status=$req->input('onboarding_status');
			$empdetails->first_name=$req->input('first_name');
			$empdetails->middle_name=$req->input('middle_name');
			$empdetails->last_name=$req->input('last_name');
			$empdetails->status=1;
			$empdetails->save();
			$LastInsertEmpId = $empdetails->emp_id;

			$keys = array_keys($_FILES);
			
			$filesAttributeInfo = array();
			$listOfAttribute = array();
			$fileIndex = 0;
			foreach($keys as $key)
			{
				$filenameWithExt = $req->file($key)->getClientOriginalName ();
				$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
				$fileExtension =$req->file($key)->getClientOriginalExtension();
				$vKey = $keys[$fileIndex];
				$newFileName = $keys[$fileIndex].'-'.$num.'.'.$fileExtension;
				
				/*
				*Updating File Name
				*/
				$filesAttributeInfo[$vKey] = $newFileName;
				$listOfAttribute[] = $vKey;
				/*
				*Updating File Name
				*/
				// Get just Extension
				$extension = $req->file($key)->getClientOriginalExtension();
				// Filename To store
				$fileNameToStore = $filename. '_'. time().'.'.$extension;
				
				
				$req->file($key)->move(public_path('empData/'), $newFileName);
				$fileIndex++;
			}


			
			$attributesValues = $req->input();	
			
			unset($attributesValues['_token']);
			unset($attributesValues['dept_id']);
			unset($attributesValues['onboarding_status']);
			unset($attributesValues['first_name']);
			unset($attributesValues['middle_name']);
			unset($attributesValues['last_name']);
			unset($attributesValues['_url']);
			
			foreach($attributesValues as $key=>$value)
			{
				if(in_array($key,$listOfAttribute))
				{
				$empattributes = new Employee_attribute();
				$empattributes->attribute_code = $key;
				$empattributes->attribute_values = $filesAttributeInfo[$key];
				$empattributes->status = 1;
				$empattributes->emp_id = $LastInsertEmpId;
				$empattributes->dept_id = $req->input('dept_id');
					
				}
				else{
				$empattributes = new Employee_attribute();
				$empattributes->attribute_code = $key;
				$empattributes->attribute_values = $value;
				$empattributes->status = 1;
				$empattributes->emp_id = $LastInsertEmpId;
				$empattributes->dept_id = $req->input('dept_id');
				}
				$empattributes->save();
			}


			
			
			
			$req->session()->flash('message','Data Saved Successfully.');
            return redirect('listEmp');
            
			//echo "DAta Saved";
			//exit;
		}

		public function employeeList(Request $request)
		{
			$deptID = '';
			if(!empty($request->session()->get('deptID')))
			{
				$deptID = $request->session()->get('deptID');
				$empdetails = Employee_details::where("dept_id",$deptID)->where("status",1)->orWhere("status",2)->orderBy('id','DESC')->get();
			}
			else 
			{
				$empdetails = Employee_details::where("status",1)->orWhere("status",2)->orderBy('id','DESC')->get();
			}
			$filterArr = array();
			
			$departmentLists = Department::where("status",1)->orderBy('id','DESC')->get();
			
			return view("Employee/Emplist",compact('empdetails','departmentLists','deptID'));
			

		}

		public function EmpdetailsData($empid=NULL)
		{
			$empDetails = Attributes::join('employee_attribute', 'employee_attribute.attribute_code', '=', 'attributes.attribute_code')
              		->where('employee_attribute.emp_id',$empid)
					  ->orderBy('attributes.sort_order', 'ASC')
					  ->get();

					//   echo "<pre>";
					//   print_r($empDetails);
					//   exit;
			
			$empRequiredDetails =  Employee_details::where('emp_id',$empid)->first();
			return view("Employee/Empdetails",compact('empDetails'),compact('empRequiredDetails'));
	

		}
		public function showconditionalhtml($selectedValue,$attribute_code)
		{
			/* echo $selectedValue.'----'.$attribute_code;
			exit; */
			$parentAttrMod = Attributes::where('attribute_code',$attribute_code)->first();
			$parentAttrId = $parentAttrMod->attribute_id;
			
			/*
			*child attribute details
			*/
			$attributes = Attributes::where("status",1)->where('parent_attribute',$parentAttrId)->get();
			$attributeArray = array();
			
			foreach($attributes as $_attrMod)
			{
				$parentAttrOpt = json_decode($_attrMod->parent_attr_opt);
				
				if(in_array($selectedValue, $parentAttrOpt))
				{
					$attributeArray[] = $_attrMod;
				}
			}
			
			/*
			*child attribute details
			*/
			return view("Employee/showconditionalhtml",compact('attributeArray'));
			
			
		}
		
		public function showallowAttribute($deptId=NULL,$onboardingStatusId=NULL)
		{
			$attributesDetails = Attributes::whereIn("department_id",array($deptId,'All'))->where("onboarding_status",array($onboardingStatusId))->where(["parent_attribute"=>0])->where(["status"=>1])->orderBy("sort_order","ASC")->get();			
			return view("Employee/showallowattr",compact('attributesDetails'));	
		}
		
		public function updateEmp($empId = NULL)
		{
			$empDetails = Attributes::join('employee_attribute', 'employee_attribute.attribute_code', '=', 'attributes.attribute_code')
              		->where('employee_attribute.emp_id',$empId)
					->where('attributes.status',1)
					  ->orderBy('attributes.sort_order', 'ASC')
					  ->get();

					//   echo "<pre>";
					//   print_r($empDetails);
					//   exit;
			
			$empRequiredDetails =  Employee_details::where('emp_id',$empId)->first();
			return view("Employee/updateEmp",compact('empDetails'),compact('empRequiredDetails'));
		}
		public function editallowAttribute($deptId=NULL,$onboardingStatusId=NULL,$empId = NULL)
		{
			$empDetails = Attributes::join('employee_attribute', 'employee_attribute.attribute_code', '=', 'attributes.attribute_code')
              		->where('employee_attribute.emp_id',$empId)
					->where('attributes.status',1)
					 ->orderBy('attributes.sort_order', 'ASC')
					  ->get();
			$attributesDetails = Attributes::whereIn("department_id",array($deptId,'All'))->where("onboarding_status",array($onboardingStatusId))->where(["parent_attribute"=>0])->where(["status"=>1])->orderBy("sort_order","ASC")->get();			
			return view("Employee/editallowAttribute",compact('attributesDetails'),compact('empDetails'));	
		}
		
		public function showconditionalhtmlUpdate($selectedValue,$attribute_code,$empId)
		{
			/* echo $selectedValue.'----'.$attribute_code;
			exit; */
			
			$empDetails = Attributes::join('employee_attribute', 'employee_attribute.attribute_code', '=', 'attributes.attribute_code')
              		->where('employee_attribute.emp_id',$empId)
					->where('attributes.status',1)
					  ->orderBy('attributes.sort_order', 'ASC')
					  ->get();
			$parentAttrMod = Attributes::where('attribute_code',$attribute_code)->first();
			$parentAttrId = $parentAttrMod->attribute_id;
			
			/*
			*child attribute details
			*/
			$attributes = Attributes::where('parent_attribute',$parentAttrId)->get();
			$attributeArray = array();
			
			foreach($attributes as $_attrMod)
			{
				$parentAttrOpt = json_decode($_attrMod->parent_attr_opt);
				
				if(in_array($selectedValue, $parentAttrOpt))
				{
					$attributeArray[] = $_attrMod;
				}
			}
			
			/*
			*child attribute details
			*/
			$empDetailsArray = array();
			foreach($empDetails as $emp_m)
			{
				$empDetailsArray[$emp_m->attribute_code] = $emp_m->attribute_values;
			}
			
			return view("Employee/showconditionalhtmlUpdate",compact('attributeArray'),compact('empDetailsArray'));
			
			
		}
		
		public function updateEmployeeData(Request $req)
		{
			$inputData = $req->input();
		/* 	echo '<pre>';
			print_r($inputData);
			exit; */
			$empdetails =  Employee_details::find($req->input('id'));
			
			$empdetails->onboarding_status=$req->input('onboarding_status');
			$empdetails->first_name=$req->input('first_name');
			$empdetails->middle_name=$req->input('middle_name');
			$empdetails->last_name=$req->input('last_name');
			$empdetails->status=1;
			$empdetails->save();
			
			$empIdPadding = $req->input('emp_id');
			$num = $req->input('emp_id');
			/*
			*delete rows from attribute]
			*start code
			*/
			
			//Employee_attribute::where('emp_id', $empIdPadding)->delete();
			
			/*
			*delete rows from attribute]
			*end code
			*/
			$keys = array_keys($_FILES);
			
			
			$filesAttributeInfo = array();
			$listOfAttribute = array();
			$fileIndex = 0;
			foreach($keys as $key)
			{
				
				if(!empty($req->file($key)))
				{
				$filenameWithExt = $req->file($key)->getClientOriginalName ();
				$filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
				$fileExtension =$req->file($key)->getClientOriginalExtension();
				$vKey = $keys[$fileIndex];
				$newFileName = $keys[$fileIndex].'-'.$num.'.'.$fileExtension;
				
				/*
				*Updating File Name
				*/
				$filesAttributeInfo[$vKey] = $newFileName;
				$listOfAttribute[] = $vKey;
				/*
				*Updating File Name
				*/
				// Get just Extension
				$extension = $req->file($key)->getClientOriginalExtension();
				// Filename To store
				$fileNameToStore = $filename. '_'. time().'.'.$extension;
				
				
				$req->file($key)->move(public_path('empData/'), $newFileName);
				$fileIndex++;
				}
				else
				{
					
					$vKey = $keys[$fileIndex];
					$filesAttributeInfo[$vKey] = '';
					$listOfAttribute[] = $vKey;
					$fileIndex++;
					
				}
			}


			
			$attributesValues = $req->input();	
			
			unset($attributesValues['_token']);
			unset($attributesValues['dept_id']);
			unset($attributesValues['onboarding_status']);
			unset($attributesValues['first_name']);
			unset($attributesValues['middle_name']);
			unset($attributesValues['last_name']);
			unset($attributesValues['_url']);
			unset($attributesValues['id']);
			unset($attributesValues['emp_id']);
			
			
			
			foreach($attributesValues as $key=>$value)
			{
				if(in_array($key,$listOfAttribute))
				{
					if($filesAttributeInfo[$key] != '')
					{
					$dpid = $req->input('dept_id');
					$empattributesMod = Employee_attribute::where('emp_id',$empIdPadding)
										->where('attribute_code',$key)
										->where('dept_id',$dpid)
										->first();
							if(!empty($empattributesMod))
							{						
								$empattributes = Employee_attribute::find($empattributesMod->id);
								$empattributes->attribute_code = $key;
								$empattributes->attribute_values = $filesAttributeInfo[$key];
								$empattributes->status = 1;
								$empattributes->emp_id = $empIdPadding;
								$empattributes->dept_id = $req->input('dept_id');
								$empattributes->save();
							}
							else
							{
								$empattributes = new Employee_attribute();
								$empattributes->attribute_code = $key;
								$empattributes->attribute_values = $filesAttributeInfo[$key];
								$empattributes->status = 1;
								$empattributes->emp_id = $empIdPadding;
								$empattributes->dept_id = $req->input('dept_id');
								$empattributes->save();
							}
					}
					
				}
				else{
					
					$dpid = $req->input('dept_id');
					$empattributesMod = Employee_attribute::where('emp_id',$empIdPadding)
										->where('attribute_code',$key)
										->where('dept_id',$dpid)
										->first();
										
					
					if(!empty($empattributesMod))
					{
					$empattributes = Employee_attribute::find($empattributesMod->id);
					$empattributes->attribute_code = $key;
					$empattributes->attribute_values = $value;
					$empattributes->status = 1;
					$empattributes->emp_id = $empIdPadding;
					$empattributes->dept_id = $req->input('dept_id');
					$empattributes->save();
					}
					else if(empty($empattributesMod) && !empty($attributesValues[$key]))
					{
						$empattributes = new Employee_attribute();
						$empattributes->attribute_code = $key;
						$empattributes->attribute_values = $attributesValues[$key];
						$empattributes->status = 1;
						$empattributes->emp_id = $empIdPadding;
						$empattributes->dept_id = $dpid;
						$empattributes->save();
					}
					else
					{
						//nothing to do
					}
					
				}
				
			}


			
			
			
			$req->session()->flash('message','Data Updated Successfully.');
            return redirect('listEmp');
		}
		
		public function deleteEmp(Request $req)
		{
			$employee_obj = Employee_details::find($req->id);
       
        $employee_obj->status = 3;
       
        $employee_obj->save();
        $req->session()->flash('message','Employee deleted Successfully.');
        return redirect('listEmp');
		}
		
		public function importEmp()
		{
			$empFImport = EmployeeImportFiles::orderBy("id","DESC")->get();
			$attrFImport = array();
            return view("Employee/importEmp",compact('empFImport','empFImport') );
		}
		
		public function empFileUpload(Request $request)
        {
			
          $request->validate([

            'file' => 'required|mimes:csv,txt|max:2048',

        ]);

  

        $fileName = time().'_Employee.csv';  

   

        $request->file->move(public_path('uploads/empImport'), $fileName);

			$empObjImport = new EmployeeImportFiles();
            $empObjImport->file_name = $fileName;
            $empObjImport->save();

        return back()

            ->with('success','You have successfully upload file.')

            ->with('file',$fileName);
        }
		
		public function empFileImport_old(Request $request)
		{
			$detailsV = $request->input();
			$attr_f_import = $detailsV['attr_f_import'];
			$empDetailsDat = EmployeeImportFiles::find($attr_f_import);
			$filename = $empDetailsDat->file_name;
			$uploadPath = '/srv/www/htdocs/hrm/public/uploads/empImport/';
			$fullpathFileName = $uploadPath . $filename;
			$file = fopen($fullpathFileName, "r");
			$i = 1;
			$dataFromCsv = array();
			while (!feof($file)) {

				$dataFromCsv[$i] = fgetcsv($file);

				$i++;
			}

			fclose($file);
			echo '<pre>';
			print_r($dataFromCsv);
			exit;
			$empdetails = new Employee_details();
			$empAttrMod = new Employee_attribute();
			$iCsv = 0;
			$iCsvIndex = 0;
			$arrayDat = array();
			$arrayDatAttribute = array();
			/* echo '<pre>';
			print_r($dataFromCsv);
			exit;  */
			foreach ($dataFromCsv as $fromCsv) {
				if ($iCsv != 0 && $fromCsv[1] != '') {
					/* echo '<pre>';
					print_r($fromCsv);
					exit; */
					$arrayDat[$iCsv]['emp_id'] = $fromCsv[0];
					$arrayDat[$iCsv]['dept_id'] = $fromCsv[1];
					$arrayDat[$iCsv]['onboarding_status'] = $fromCsv[2];
					$arrayDat[$iCsv]['first_name'] = $fromCsv[3];
					$arrayDat[$iCsv]['middle_name'] = $fromCsv[4];
					$arrayDat[$iCsv]['last_name'] = $fromCsv[5];
					$arrayDat[$iCsv]['status'] = 1;
					
					/*
					*LOC_ADD
					*/
					$arrayDatAttribute[$iCsvIndex]['dept_id'] = $fromCsv[1];
					$arrayDatAttribute[$iCsvIndex]['emp_id'] = $fromCsv[0];
					$arrayDatAttribute[$iCsvIndex]['attribute_code'] = 'DESIGN';
					$arrayDatAttribute[$iCsvIndex]['attribute_values'] = trim($fromCsv[6]);
					$arrayDatAttribute[$iCsvIndex]['status'] = 1;
					
					$iCsvIndex++;
					
					$arrayDatAttribute[$iCsvIndex]['dept_id'] = $fromCsv[1];
					$arrayDatAttribute[$iCsvIndex]['emp_id'] = $fromCsv[0];
					$arrayDatAttribute[$iCsvIndex]['attribute_code'] = 'NAT';
					$arrayDatAttribute[$iCsvIndex]['attribute_values'] = trim($fromCsv[7]);
					$arrayDatAttribute[$iCsvIndex]['status'] = 1;
					
					
					$iCsvIndex++;
					
					$arrayDatAttribute[$iCsvIndex]['dept_id'] = $fromCsv[1];
					$arrayDatAttribute[$iCsvIndex]['emp_id'] = $fromCsv[0];
					$arrayDatAttribute[$iCsvIndex]['attribute_code'] = 'LOC_ADD';
					$arrayDatAttribute[$iCsvIndex]['attribute_values'] = trim($fromCsv[8]);
					$arrayDatAttribute[$iCsvIndex]['status'] = 1;
					
					
					$iCsvIndex++;
					
					$arrayDatAttribute[$iCsvIndex]['dept_id'] = $fromCsv[1];
					$arrayDatAttribute[$iCsvIndex]['emp_id'] = $fromCsv[0];
					$arrayDatAttribute[$iCsvIndex]['attribute_code'] = 'PERMOL';
					$arrayDatAttribute[$iCsvIndex]['attribute_values'] = trim($fromCsv[9]);
					$arrayDatAttribute[$iCsvIndex]['status'] = 1;
					$iCsvIndex++;
					
					$arrayDatAttribute[$iCsvIndex]['dept_id'] = $fromCsv[1];
					$arrayDatAttribute[$iCsvIndex]['emp_id'] = $fromCsv[0];
					$arrayDatAttribute[$iCsvIndex]['attribute_code'] = 'PP_NO';
					$arrayDatAttribute[$iCsvIndex]['attribute_values'] = trim($fromCsv[10]);
					$arrayDatAttribute[$iCsvIndex]['status'] = 1;
					$iCsvIndex++;
					/*
					*HOME_COUN_ADD
					*/
					/* $iCsvIndex++;
					$arrayDatAttribute[$iCsvIndex]['dept_id'] = $fromCsv[1];
					$arrayDatAttribute[$iCsvIndex]['emp_id'] = $fromCsv[0];
					$arrayDatAttribute[$iCsvIndex]['attribute_code'] = 'HOME_COUN_ADD';
					$arrayDatAttribute[$iCsvIndex]['attribute_values'] = $fromCsv[4];
					$arrayDatAttribute[$iCsvIndex]['status'] = 1; */
					
					
					/*
					*PVISA_NUMBER
					*/
					/* $iCsvIndex++;
					$arrayDatAttribute[$iCsvIndex]['dept_id'] = $fromCsv[1];
					$arrayDatAttribute[$iCsvIndex]['emp_id'] = $fromCsv[0];
					$arrayDatAttribute[$iCsvIndex]['attribute_code'] = 'PVISA_NUMBER';
					$arrayDatAttribute[$iCsvIndex]['attribute_values'] = $fromCsv[5];
					$arrayDatAttribute[$iCsvIndex]['status'] = 1; */
					
					/*
					*HS_EMP_REF_DEEM
					*/
					/* $iCsvIndex++;
					$arrayDatAttribute[$iCsvIndex]['dept_id'] = $fromCsv[1];
					$arrayDatAttribute[$iCsvIndex]['emp_id'] = $fromCsv[0];
					$arrayDatAttribute[$iCsvIndex]['attribute_code'] = 'HS_EMP_REF_DEEM';
					$arrayDatAttribute[$iCsvIndex]['attribute_values'] = $fromCsv[6];
					$arrayDatAttribute[$iCsvIndex]['status'] = 1; */
					
					
					/*
					*HS_EMP_REF_ENBD
					*/
					/* $iCsvIndex++;
					$arrayDatAttribute[$iCsvIndex]['dept_id'] = $fromCsv[1];
					$arrayDatAttribute[$iCsvIndex]['emp_id'] = $fromCsv[0];
					$arrayDatAttribute[$iCsvIndex]['attribute_code'] = 'HS_EMP_REF_ENBD';
					$arrayDatAttribute[$iCsvIndex]['attribute_values'] = $fromCsv[7];
					$arrayDatAttribute[$iCsvIndex]['status'] = 1; */
					
					/*
					*CONTACT_NUMBER
					*/
					/* $iCsvIndex++;
					$arrayDatAttribute[$iCsvIndex]['dept_id'] = $fromCsv[1];
					$arrayDatAttribute[$iCsvIndex]['emp_id'] = $fromCsv[0];
					$arrayDatAttribute[$iCsvIndex]['attribute_code'] = 'CONTACT_NUMBER';
					$arrayDatAttribute[$iCsvIndex]['attribute_values'] = $fromCsv[8];
					$arrayDatAttribute[$iCsvIndex]['status'] = 1; */
					
					/*
					*HC_CONTACT_NUMBER
					*/
					/* $iCsvIndex++;
					$arrayDatAttribute[$iCsvIndex]['dept_id'] = $fromCsv[1];
					$arrayDatAttribute[$iCsvIndex]['emp_id'] = $fromCsv[0];
					$arrayDatAttribute[$iCsvIndex]['attribute_code'] = 'HC_CONTACT_NUMBER';
					$arrayDatAttribute[$iCsvIndex]['attribute_values'] = $fromCsv[9];
					$arrayDatAttribute[$iCsvIndex]['status'] = 1; */
					
					/*
					*EMP_REFENCE_DU
					*/
					/* $iCsvIndex++;
					$arrayDatAttribute[$iCsvIndex]['dept_id'] = $fromCsv[1];
					$arrayDatAttribute[$iCsvIndex]['emp_id'] = $fromCsv[0];
					$arrayDatAttribute[$iCsvIndex]['attribute_code'] = 'EMP_REFENCE_DU';
					$arrayDatAttribute[$iCsvIndex]['attribute_values'] = $fromCsv[10];
					$arrayDatAttribute[$iCsvIndex]['status'] = 1; */
					
					/*
					*EMPLOYEE_REFERNCE_CCTV_
					*/
					/* $iCsvIndex++;
					$arrayDatAttribute[$iCsvIndex]['dept_id'] = $fromCsv[1];
					$arrayDatAttribute[$iCsvIndex]['emp_id'] = $fromCsv[0];
					$arrayDatAttribute[$iCsvIndex]['attribute_code'] = 'EMPLOYEE_REFERNCE_CCTV_';
					$arrayDatAttribute[$iCsvIndex]['attribute_values'] = $fromCsv[11];
					$arrayDatAttribute[$iCsvIndex]['status'] = 1;
					 */
					
					/*
					*EXPERIENCE
					*/
					/* $iCsvIndex++;
					$arrayDatAttribute[$iCsvIndex]['dept_id'] = $fromCsv[1];
					$arrayDatAttribute[$iCsvIndex]['emp_id'] = $fromCsv[0];
					$arrayDatAttribute[$iCsvIndex]['attribute_code'] = 'EXPERIENCE';
					$arrayDatAttribute[$iCsvIndex]['attribute_values'] = $fromCsv[12];
					$arrayDatAttribute[$iCsvIndex]['status'] = 1; */
					
					/*
					*UAE_VINTAGE
					*/
					/* $iCsvIndex++;
					$arrayDatAttribute[$iCsvIndex]['dept_id'] = $fromCsv[1];
					$arrayDatAttribute[$iCsvIndex]['emp_id'] = $fromCsv[0];
					$arrayDatAttribute[$iCsvIndex]['attribute_code'] = 'UAE_VINTAGE';
					$arrayDatAttribute[$iCsvIndex]['attribute_values'] = $fromCsv[13];
					$arrayDatAttribute[$iCsvIndex]['status'] = 1; */
					
					/*
					*LC_Number
					*/
					/* $iCsvIndex++;
					$arrayDatAttribute[$iCsvIndex]['dept_id'] = $fromCsv[1];
					$arrayDatAttribute[$iCsvIndex]['emp_id'] = $fromCsv[0];
					$arrayDatAttribute[$iCsvIndex]['attribute_code'] = 'LC_Number';
					$arrayDatAttribute[$iCsvIndex]['attribute_values'] = $fromCsv[14];
					$arrayDatAttribute[$iCsvIndex]['status'] = 1; */
					
					/*
					*HS
					*/
					/* $iCsvIndex++;
					$arrayDatAttribute[$iCsvIndex]['dept_id'] = $fromCsv[1];
					$arrayDatAttribute[$iCsvIndex]['emp_id'] = $fromCsv[0];
					$arrayDatAttribute[$iCsvIndex]['attribute_code'] = 'HS';
					$arrayDatAttribute[$iCsvIndex]['attribute_values'] = $fromCsv[15];
					$arrayDatAttribute[$iCsvIndex]['status'] = 1; */
					
					
					/*
					*EBAM
					*/
					/* $iCsvIndex++;
					$arrayDatAttribute[$iCsvIndex]['dept_id'] = $fromCsv[1];
					$arrayDatAttribute[$iCsvIndex]['emp_id'] = $fromCsv[0];
					$arrayDatAttribute[$iCsvIndex]['attribute_code'] = 'EBAM';
					$arrayDatAttribute[$iCsvIndex]['attribute_values'] = $fromCsv[16];
					$arrayDatAttribute[$iCsvIndex]['status'] = 1; */
					
					/*
					*EMP_IBAN
					*/
					/* $iCsvIndex++;
					$arrayDatAttribute[$iCsvIndex]['dept_id'] = $fromCsv[1];
					$arrayDatAttribute[$iCsvIndex]['emp_id'] = $fromCsv[0];
					$arrayDatAttribute[$iCsvIndex]['attribute_code'] = 'EMP_IBAN';
					$arrayDatAttribute[$iCsvIndex]['attribute_values'] = $fromCsv[17];
					$arrayDatAttribute[$iCsvIndex]['status'] = 1;
					
					$iCsvIndex++; */
					
					/*
					$empdetails->emp_id =$fromCsv[0]; 
					$empdetails->dept_id =$fromCsv[1]; 
					$empdetails->onboarding_status =$fromCsv[2]; 
					$empdetails->first_name =$fromCsv[18]; 
					$empdetails->middle_name =$fromCsv[19]; 
					$empdetails->last_name =$fromCsv[20]; 
					$empdetails->status =1;
					*/					
					
				}
				$iCsv++;
			}
			
			$empdetails->insert($arrayDat);
			$empAttrMod->insert($arrayDatAttribute); 
			echo "yes";
			exit;
			
		}
		
		
		public function empFileImport_update(Request $request)
		{
			$detailsV = $request->input();
			$attr_f_import = $detailsV['attr_f_import'];
			$empDetailsDat = EmployeeImportFiles::find($attr_f_import);
			$filename = $empDetailsDat->file_name;
			$uploadPath = '/srv/www/htdocs/hrm/public/uploads/empImport/';
			$fullpathFileName = $uploadPath . $filename;
			$file = fopen($fullpathFileName, "r");
			$i = 1;
			$dataFromCsv = array();
			while (!feof($file)) {

				$dataFromCsv[$i] = fgetcsv($file);

				$i++;
			}

			fclose($file);
			/*   echo '<pre>';
			print_r($dataFromCsv);
			exit;   */
			$keyValues = array('Sur_name','product','deputed','PVISA_NUMBER','visa_uid_no','visa_issue_date','visa_expiry_date','labour_issue_date','labour_expiry_date','LC_Number','person_code','emirates_id_no','PP_NO','GNDR','NAT','PER_VISA_STATUS','permanent_visa_issuances','contract','VS','EMPDOB','dha_mem_no');
			$empdetails = new Employee_details();
			$empAttrMod = new Employee_attribute();
			$iCsv = 0;
			
			$arrayDat = array();
			$arrayDatAttribute = array();
			/* echo '<pre>';
			print_r($dataFromCsv);
			exit;  */ 
			
			$valuesIndex = 1;
			foreach ($dataFromCsv as $fromCsv) {
				if ($iCsv != 0 ) {
					if(!empty($fromCsv[0]))
					{
						$empIdPadding = $fromCsv[0];
						$getDept = Employee_details::where('emp_id',$empIdPadding)->first();
						
						
						
						$dpid = $getDept->dept_id;
						$keyValue = 1;
						$iCsvIndex = 0;
						foreach($keyValues as $_key)
						{
							$key = $_key;
							$empattributesMod = Employee_attribute::where('emp_id',$empIdPadding)
											->where('attribute_code',$key)
											->where('dept_id',$dpid)
											->first();
							
							if(empty($empattributesMod))
							{
								
									$empattributes = new Employee_attribute();
									$empattributes->attribute_code = $key;
									if($key == 'labour_expiry_date' || $key == 'labour_issue_date' || $key == 'visa_expiry_date' || $key == 'visa_issue_date' || $key == 'EMPDOB')
										{
											
											if($key == 'EMPDOB')
											{
											$keyD = str_replace("/","-",$fromCsv[$keyValue]);
											$dateP = trim($keyD);
											}
											else
											{
												$dateP = trim($fromCsv[$keyValue]);
											}
											
											$empattributes->attribute_values = date("Y-m-d",strtotime($dateP));
										}
										else
										{
											$empattributes->attribute_values = trim($fromCsv[$keyValue]);
										}
									$empattributes->status = 1;
									$empattributes->emp_id = $empIdPadding;
									$empattributes->dept_id = $dpid;
									$empattributes->save();	
							}	
							else
							{
									
									$empattributes = Employee_attribute::find($empattributesMod->id);
									$empattributes->attribute_code = $key;
									if($key == 'labour_expiry_date' || $key == 'labour_issue_date' || $key == 'visa_expiry_date' || $key == 'visa_issue_date' || $key == 'EMPDOB')
										{
											if($key == 'EMPDOB')
											{
											$keyD = str_replace("/","-",$fromCsv[$keyValue]);
											$dateP = trim($keyD);
											}
											else
											{
												$dateP = trim($fromCsv[$keyValue]);
											}
											$empattributes->attribute_values = date("Y-m-d",strtotime($dateP));
										}
										else
										{
											$empattributes->attribute_values = trim($fromCsv[$keyValue]);
										}
									$empattributes->status = 1;
									$empattributes->emp_id = $empIdPadding;
									$empattributes->dept_id = $dpid;
									$empattributes->save();
							}
						
							$keyValue++;
							$iCsvIndex++;
						}
						
						
					}
					
					
					
								
					
				}
				$iCsv++;
			}
			echo 'done';
						exit;
			echo '<pre>';
						print_r($arrayDatAttribute);
						exit;
			//$empdetails->insert($arrayDat);
			//$empAttrMod->insert($arrayDatAttribute); 
			echo "yes";
			exit;
			
		}
		
		
		
		public function empFileImport(Request $request)
		{
			$detailsV = $request->input();
			$attr_f_import = $detailsV['attr_f_import'];
			$empDetailsDat = EmployeeImportFiles::find($attr_f_import);
			$filename = $empDetailsDat->file_name;
			$uploadPath = '/srv/www/htdocs/hrm/public/uploads/empImport/';
			$fullpathFileName = $uploadPath . $filename;
			$file = fopen($fullpathFileName, "r");
			$i = 1;
			$dataFromCsv = array();
			while (!feof($file)) {

				$dataFromCsv[$i] = fgetcsv($file);

				$i++;
			}

			fclose($file);
			/* echo '<pre>';
			print_r($dataFromCsv);
			exit;   */ 
			$keyValues = array('Sur_name','product','deputed','PVISA_NUMBER','visa_uid_no','visa_issue_date','visa_expiry_date','labour_issue_date','labour_expiry_date','LC_Number','person_code','emirates_id_no','PP_NO','GNDR','NAT','PER_VISA_STATUS','permanent_visa_issuances','contract','VS','EMPDOB','dha_mem_no');
			$empdetails = new Employee_details();
			$empAttrMod = new Employee_attribute();
			$iCsv = 0;
			
			$arrayDat = array();
			$arrayDatAttribute = array();
			/*  echo '<pre>';
			print_r($dataFromCsv);
			exit;  */ 
			
			$valuesIndex = 6;
			foreach ($dataFromCsv as $fromCsv) {
				if ($iCsv != 0 ) {
					if(!empty($fromCsv[0]))
					{
						
						$empdata = new Employee_details();
						$empdata->emp_id = $fromCsv[0];
						$empdata->dept_id = $fromCsv[1];
						$empdata->onboarding_status = 1;
						$empdata->first_name = $fromCsv[3];
						$empdata->middle_name = $fromCsv[4];
						$empdata->last_name = $fromCsv[5];
						$empdata->status = 1;
						
						$empdata->save();
						
						$empIdPadding = $fromCsv[0];
						
						
						
						
						$dpid = $fromCsv[1];
						$keyValue = 6;
						$iCsvIndex = 0;
						foreach($keyValues as $_key)
						{
							$key = $_key;
							$empattributesMod = Employee_attribute::where('emp_id',$empIdPadding)
											->where('attribute_code',$key)
											->where('dept_id',$dpid)
											->first();
							
							if(empty($empattributesMod))
							{
								
									$empattributes = new Employee_attribute();
									$empattributes->attribute_code = $key;
									if($key == 'labour_expiry_date' || $key == 'labour_issue_date' || $key == 'visa_expiry_date' || $key == 'visa_issue_date' || $key == 'EMPDOB')
										{
											
											if($key == 'EMPDOB')
											{
											$keyD = str_replace("/","-",$fromCsv[$keyValue]);
											$dateP = trim($keyD);
											}
											else
											{
												$dateP = trim($fromCsv[$keyValue]);
											}
											
											$empattributes->attribute_values = date("Y-m-d",strtotime($dateP));
										}
										else
										{
											$empattributes->attribute_values = trim($fromCsv[$keyValue]);
										}
									$empattributes->status = 1;
									$empattributes->emp_id = $empIdPadding;
									$empattributes->dept_id = $dpid;
									$empattributes->save();	
							}	
							else
							{
									
									$empattributes = Employee_attribute::find($empattributesMod->id);
									$empattributes->attribute_code = $key;
									if($key == 'labour_expiry_date' || $key == 'labour_issue_date' || $key == 'visa_expiry_date' || $key == 'visa_issue_date' || $key == 'EMPDOB')
										{
											if($key == 'EMPDOB')
											{
											$keyD = str_replace("/","-",$fromCsv[$keyValue]);
											$dateP = trim($keyD);
											}
											else
											{
												$dateP = trim($fromCsv[$keyValue]);
											}
											$empattributes->attribute_values = date("Y-m-d",strtotime($dateP));
										}
										else
										{
											$empattributes->attribute_values = trim($fromCsv[$keyValue]);
										}
									$empattributes->status = 1;
									$empattributes->emp_id = $empIdPadding;
									$empattributes->dept_id = $dpid;
									$empattributes->save();
							}
						
							$keyValue++;
							$iCsvIndex++;
						}
						
						
					}
					
					
					
					
				}
				$iCsv++;
				
			}
			echo 'done';
						exit;
			echo '<pre>';
						print_r($arrayDatAttribute);
						exit;
			//$empdetails->insert($arrayDat);
			//$empAttrMod->insert($arrayDatAttribute); 
			echo "yes";
			exit;
			
		}
		
		public function updateEmployeeValues()
		{
			/* echo "DONE";
			exit; */
			$empAttrMod = new Employee_attribute();
			$filename = 'MBM-updated.csv';
			$uploadPath = '/srv/www/htdocs/hrm/public/uploads/empImport/updated/';
			$fullpathFileName = $uploadPath . $filename;
			$file = fopen($fullpathFileName, "r");
			$i = 1;
			$dataFromCsv = array();
			while (!feof($file)) {

				$dataFromCsv[$i] = fgetcsv($file);

				$i++;
			}

			fclose($file);
		     /* echo '<pre>';
			print_r($dataFromCsv);
			exit;   */ 
			$iIndex=0;
			$updateIndex = 0;
			$updateTable = array();
			foreach($dataFromCsv as $datefCSV)
			{
				if($iIndex !=0 && is_array($datefCSV))
				{
					
					$updateTable[$updateIndex]['emp_id'] = $datefCSV[0];
					$updateTable[$updateIndex]['dept_id'] = $datefCSV[1];
					$updateTable[$updateIndex]['attribute_code'] = 'VS';
					$updateTable[$updateIndex]['attribute_values'] = $datefCSV[24];
					$updateTable[$updateIndex]['status'] = 1;
					$updateIndex++;
					$updateTable[$updateIndex]['emp_id'] = $datefCSV[0];
					$updateTable[$updateIndex]['dept_id'] = $datefCSV[1];
					$updateTable[$updateIndex]['attribute_code'] = 'PER_VISA_STATUS';
					$updateTable[$updateIndex]['attribute_values'] = $datefCSV[23];
					$updateTable[$updateIndex]['status'] = 1;
					$updateIndex++;
					
				}
				$iIndex++;
			}
			 echo "<pre>";
			print_r($updateTable);
			exit;   
			//$empAttrMod->insert($updateTable);
			echo "DONE";
			exit;
			
		}
		
		public function employeeAttendance(Request $request)
		{
			$empdetailsListing = array();
			$checkSelectFilter = 0;
			$dept = 0;
			$selectFrom = '';
			$selectTo = '';
			$emp_id = '';
			if(!empty($request->session()->get('dept_id')))
			{
				$checkSelectFilter = 1;
				$dept = $request->session()->get('dept_id');
			}
			
			$emp_obj = new EmployeeAttendanceModel();
			
			
			if(!empty($request->session()->get('selectFrom')))
			{
				$checkSelectFilter = 1;
				$selectFrom =$request->session()->get('selectFrom');
			}
			if(!empty($request->session()->get('selectTo')))
			{
				$checkSelectFilter = 1;
				$selectTo =$request->session()->get('selectTo');
			}
			if(!empty($request->session()->get('emp_id')))
			{
				
				$emp_id =$request->session()->get('emp_id');
			}
			/*
			*get Department name
			*/
				$departmentA = array();
				$departmentLists = Department::where("status",1)->orderBy("id",'DESC')->get();
				foreach($departmentLists as $_dept)
				{
					$departmentA[$_dept->id] = $_dept->department_name;
				}
			/*
			*get Department name
			*/
			$DateRange = array();
			if(!empty($request->session()->get('selectFrom')) && !empty($request->session()->get('selectTo')))
			{
				$selectFrom =$request->session()->get('selectFrom');
				$selectTo =$request->session()->get('selectTo');
				$DateRange = $this->getDatesFromRangeLists($selectFrom, $selectTo);
			}
			
			if(!empty($request->session()->get('dept_id')))
			{
				$deptId = $request->session()->get('dept_id');
				$empdetails = new Employee_details();
				if($deptId == 'all' && $emp_id == '')
				{
					$empdetailsListing = $empdetails->where("status",1)->get();
				}
				else if($deptId == 'all' && $emp_id != '')
				{
					$empdetailsListing = $empdetails->where("status",1)->where("emp_id",'like',$emp_id.'%')->get();
				}
				else if($deptId != 'all' && $emp_id == '')
				{
					$empdetailsListing = $empdetails->where("status",1)->where("dept_id",$deptId)->get();
				}
				else
				{
					$empdetailsListing = $empdetails->where("status",1)->where("emp_id",'like',$emp_id.'%')->where("dept_id",$deptId)->get();
				}
			}
			
			
			/*
			* check Attendance Existance
			*start coding
			*/
		
			$existanceCheck = array();
			foreach($empdetailsListing as $_emp)
			{
				foreach($DateRange as $_date)
				{
					$_dateSet = date('Y-m-d',strtotime($_date));
					/*
					*check for holiday
					*start coding
					*/
						$goprocess = 1;
					
						$detailsHoliday = EmployeeAttendanceModel::where("attendance_date",$_dateSet)->where("mark_attendance","Holiday")->first();
						if(!empty($detailsHoliday))
						{
							$existanceCheck[$_emp->id][$_date]['allowAttendance'] = 'No';
							$markAttend = 'H';
							$existanceCheck[$_emp->id][$_date]['attendanceMark'] = $markAttend;
							$goprocess = 2;
						}
					
					
					/*
					*check for holiday
					*End coding
					*/
					$details = EmployeeAttendanceModel::where("dept_id",$deptId)->where("emp_id",$_emp->id)->where("attendance_date",$_dateSet)->where("over_ride_sandwich",0)->first();
					if($goprocess == 1 || (!empty($details) && $details->mark_attendance == 'sandwich'))
					{
					if(!empty($details))
					{
						$existanceCheck[$_emp->id][$_date]['allowAttendance'] = 'No';
						if($details->mark_attendance == 'present')
						{
							$markAttend = 'P';
							
						}
						else if($details->mark_attendance == 'absent')
						{
							$markAttend = 'A';
							
						}
						else if($details->mark_attendance == 'late')
						{
							$markAttend = 'L';
							
						}
						else if($details->mark_attendance == 'sandwich')
						{
							$markAttend = 'S';
						}
						else if($details->mark_attendance == 'leave')
						{
							$markAttend = 'Leave';
						}
						else
						{
							$markAttend = 'Leave';
						}
						$existanceCheck[$_emp->id][$_date]['attendanceMark'] = $markAttend;
						$leaveType = '';
						if($details->leave_type == 'casual_leave')
						{
							$leaveType = 'CL';
						}
						else if($details->leave_type == 'annual_leave')
						{
							$leaveType = 'AL';
						}
						else if($details->leave_type == 'sick_leave')
						{
							$leaveType = 'SL';
						}
						else if($details->leave_type == 'public_holiday')
						{
							$leaveType = 'PH';
						}
						else if($details->leave_type == 'emergency_leave')
						{
							$leaveType = 'EL';
						}
						else if($details->leave_type == 'half_day')
						{
							$leaveType = 'HD';
						}
						else
						{
							
						}
						$existanceCheck[$_emp->id][$_date]['attendanceLeaveType'] = $leaveType;
						$existanceCheck[$_emp->id][$_date]['leave_approved'] = $details->leave_approved;
 					}
					else
					{
						$existanceCheck[$_emp->id][$_date]['allowAttendance'] = 'Yes';
					}
					}
				}
			}
			
			/*
			* check Attendance Existance
			*end coding
			*/
			$departmentName = '';
			if(!empty($request->session()->get('dept_id')))
			{
			$departmentObj = new Department();
			$departmentDetails = Department::where("id",$deptId)->first();
			$departmentName= $departmentDetails->department_name;
			}
			/*
			*get List of holidays
			*/
			$detailsHoliday = EmployeeAttendanceModel::where("mark_attendance",'H')->get();
			$holidayList = array();
			foreach($detailsHoliday as $_holiday)
			{
				$attendanceD = $_holiday->attendance_date;
				$holidayList[] = date("d-m-Y",strtotime($attendanceD));
			}
			
			/*
			*get List of holidays
			*/
			return view("Employee/employeeAttendance",compact('empdetailsListing','departmentA','dept','checkSelectFilter','DateRange','selectFrom','selectTo','existanceCheck','departmentName','holidayList','emp_id') );
		}
		
		public function addAttendance()
		{
			
			/*
			*@Description - get department from DataBase
			*@Start Coding
			*/
			$departmentMod = Department::where("status",1)->orderBy("id",'DESC')->get();
			/*
			*@Description - get department from DataBase
			*@End Coding
			*/
			/*
			*get List of holidays
			*/
			$detailsHoliday = EmployeeAttendanceModel::where("attendance_value",'H')->get();
			$holidayList = array();
			foreach($detailsHoliday as $_holiday)
			{
				$attendanceD = $_holiday->attendance_date;
				$holidayList[] = date("dd-mm-yyyy",strtotime($attendanceD));
			}
			echo '<pre>';
			print_r($holidayList);
			exit;
			/*
			*get List of holidays
			*/
			return view("Employee/addAttendance",compact('departmentMod'));
		}
		
		public function addAttendance1()
		{
			
			/*
			*@Description - get department from DataBase
			*@Start Coding
			*/
			$departmentMod = Department::where("status",1)->orderBy("id",'DESC')->get();
			/*
			*@Description - get department from DataBase
			*@End Coding
			*/
			/*
			*get List of holidays
			*/
			$detailsHoliday = EmployeeAttendanceModel::where("mark_attendance",'H')->get();
			$holidayList = array();
			foreach($detailsHoliday as $_holiday)
			{
				$attendanceD = $_holiday->attendance_date;
				$holidayList[] = date("d-m-Y",strtotime($attendanceD));
			}
			
			/*
			*get List of holidays
			*/
			
			
			return view("Employee/addAttendance1",compact('departmentMod','holidayList'));
		}
		
		public function empajaxlist(Request $req)
		{
			$deptId = $req->departmentid;
			
			$empdetails = new Employee_details();
			if($deptId == 'all')
			{
				$empdetailsListing = $empdetails->where("status",1)->get();
			}
			else
			{
			    $empdetailsListing = $empdetails->where("status",1)->where("dept_id",$deptId)->get();
			}
			return view("Employee/empajaxlist",compact('empdetailsListing'));
		}
		
		public function empajaxlistNew(Request $req)
		{
			$deptId = $req->departmentid;
			$selectedDateFrom = $req->selectedDateFrom;
			$selectedDateTo = $req->selectedDateTo;
			$DateRange = $this->getDatesFromRange($selectedDateFrom, $selectedDateTo);
			
			$empdetails = new Employee_details();
			if($deptId == 'all')
			{
				$empdetailsListing = $empdetails->where("status",1)->get();
			}
			else
			{
			    $empdetailsListing = $empdetails->where("status",1)->where("dept_id",$deptId)->get();
			}
			/*
			*check Attendance existance for employee
			*start code
			*/
			$specificDate = date('Y-m-d',strtotime($selectedDateFrom));
			$empAttendanceDetails = EmployeeAttendanceModel::where("dept_id",$deptId)->where("attendance_date",$specificDate)->get();
			$existEmpAsPerDate = array();
			foreach($empAttendanceDetails as $_emp)
			{
				$existEmpAsPerDate[] = $_emp->emp_id;
			}
			$existEmpAsPerDate = array();
			/*
			*check Attendance existance for employee
			*end code
			*/
			/*
			* check Attendance Existance
			*start coding
			*/
		
			$existanceCheck = array();
			foreach($empdetailsListing as $_emp)
			{
				foreach($DateRange as $_date)
				{
					
					$_dateSet = date('Y-m-d',strtotime($_date));
						/*
					*check for holiday
					*start coding
					*/
						$goprocess = 1;
					
						$detailsHoliday = EmployeeAttendanceModel::where("attendance_date",$_dateSet)->where("mark_attendance","Holiday")->first();
						if(!empty($detailsHoliday))
						{
							$existanceCheck[$_emp->id][$_date]['allowAttendance'] = 'No';
							$markAttend = 'H';
							$existanceCheck[$_emp->id][$_date]['attendanceMark'] = $markAttend;
							$goprocess = 2;
						}
					
					
					/*
					*check for holiday
					*End coding
					*/
					$details = EmployeeAttendanceModel::where("dept_id",$deptId)->where("emp_id",$_emp->id)->where("attendance_date",$_dateSet)->where("over_ride_sandwich",0)->first();
					if($goprocess == 1 || (!empty($details) && $details->mark_attendance == 'sandwich'))
					{
					
					
					if(!empty($details))
					{
					
					
						$existanceCheck[$_emp->id][$_date]['allowAttendance'] = 'No';
						if($details->mark_attendance == 'present')
						{
							$markAttend = 'P';
							
						}
						else if($details->mark_attendance == 'absent')
						{
							$markAttend = 'A';
							
						}
						else if($details->mark_attendance == 'late')
						{
							$markAttend = 'L';
							
						}
						else if($details->mark_attendance == 'sandwich')
						{
							$markAttend = 'S';
						}
						else if($details->mark_attendance == 'leave')
						{
							$markAttend = 'Leave';
						}
						else
						{
							$markAttend = 'Leave';
						}
						$existanceCheck[$_emp->id][$_date]['attendanceMark'] = $markAttend;
						$leaveType = '';
						if($details->leave_type == 'casual_leave')
						{
							$leaveType = 'CL';
						}
						else if($details->leave_type == 'annual_leave')
						{
							$leaveType = 'AL';
						}
						else if($details->leave_type == 'sick_leave')
						{
							$leaveType = 'SL';
						}
						else if($details->leave_type == 'public_holiday')
						{
							$leaveType = 'PH';
						}
						else if($details->leave_type == 'emergency_leave')
						{
							$leaveType = 'EL';
						}
						else if($details->leave_type == 'half_day')
						{
							$leaveType = 'HD';
						}
						else
						{
							
						}
						$existanceCheck[$_emp->id][$_date]['attendanceLeaveType'] = $leaveType;
						$existanceCheck[$_emp->id][$_date]['leave_approved'] = $details->leave_approved;
					
 					}
					else
					{
						$existanceCheck[$_emp->id][$_date]['allowAttendance'] = 'Yes';
					}
					}
					
				}
			}
			/*
			*get List of holidays
			*/
			$detailsHoliday = EmployeeAttendanceModel::where("mark_attendance",'H')->get();
			$holidayList = array();
			foreach($detailsHoliday as $_holiday)
			{
				$attendanceD = $_holiday->attendance_date;
				$holidayList[] = date("d-m-Y",strtotime($attendanceD));
			}
			
			/*
			*get List of holidays
			*/
			/*
			* check Attendance Existance
			*end coding
			*/
			return view("Employee/empajaxlistNew",compact('empdetailsListing','existEmpAsPerDate','DateRange','existanceCheck','holidayList'));
		}
		
		// Function to get all the dates in given range
	function getDatesFromRange($start, $end) {
      

  
    // Use loop to store date into array
    while(date("Y-m-d",strtotime($start)) <= date("Y-m-d",strtotime($end))) {  
	
		 $dayName =  date('D', strtotime($start));
		if($dayName != 'Sun')
		{
        $array[] = date("d-m-Y",strtotime($start)); 
		
		}
		$start = date('d-m-Y', strtotime($start . ' +1 day'));
	}
  
    // Return the array elements
    return $array;
}


function getDatesFromRangeSandwich($start, $end) {
      
  
  
    // Use loop to store date into array
    while(date("Y-m-d",strtotime($start)) <= date("Y-m-d",strtotime($end))) {  
	
		$dayName =  date('D', strtotime($start));
		
        $array[] = date("d-m-Y",strtotime($start)); 
		
		
		$start = date('d-m-Y', strtotime($start . ' +1 day'));
	}
  
    // Return the array elements
    return $array;
}

function getDatesFromRangeLists($start, $end) {
      
  
  
    // Use loop to store date into array
    while(date("Y-m-d",strtotime($start)) <= date("Y-m-d",strtotime($end))) {  
	
		$dayName =  date('D', strtotime($start));
		
        $array[] = date("d-m-Y",strtotime($start)); 
		
		
		$start = date('d-m-Y', strtotime($start . ' +1 day'));
	}
  
    // Return the array elements
    return $array;
}
		public function addEmployeeAttendancePost(Request $request)
		{
			$attendanceValue = $request->input();
			
			
			/**
			*@description - inserted Attendance Details as per employee
			*start code
			*/
			$deptId = $attendanceValue['dept_id'];
			$selectedEmps = $attendanceValue['selectedEmp'];
			foreach($selectedEmps as $_empId)
			{
				
				$listOfMarkAttendanceforemployee = $attendanceValue['addAttendanceFrm'][$_empId];
				foreach($listOfMarkAttendanceforemployee as $empValue)
				{
					
					$empAttendanceObj = new EmployeeAttendanceModel();
					$empAttendanceObj->dept_id = $deptId;
					$empAttendanceObj->emp_id = $_empId;
					$empAttendanceObj->attendance_date = date('Y-m-d',strtotime($empValue['mark_date']));
					$empAttendanceObj->mark_attendance = $empValue['mark_attendance'];
					$empAttendanceObj->leave_type = $empValue['leave_type'];
					$empAttendanceObj->over_ride_sandwich = 0;
					if($empValue['mark_attendance'] == 'leave')
					{
						$empAttendanceObj->leave_approved = 1;
					}
					else
					{
						$empAttendanceObj->leave_approved = 0;
					}
					$empAttendanceObj->created_by = $request->session()->get('EmployeeId');
					$empAttendanceObj->save();
				}
			}
			
			/**
			*@description - inserted Attendance Details as per employee
			*start code
			*/
			
			$request->session()->flash('message','You have successfully marked Attendance.');
				//$request->session()->flash('alert-class', 'alert-danger'); 
				return redirect('employeeAttendance');
		}
		
		public function attendancedetails(Request $req)
		{
			$empid = $req->empid;
			$monthNo = $req->monthNo;
			/* if(!empty($req->session()->get('applied_month')))
			{
			
				$month = $req->session()->get('applied_month');
			}
			else
			{
				$month = date('m');
			} */
			$month = (int)$monthNo;
			$year = 2022;
			$monthDetails = array();
			$monthDetails['name'] = date("F", mktime(0, 0, 0, $month, 10));
			$monthDetails['value'] = $month;
			$monthDetails['emp_id'] = $empid;
			$monthDetails['year'] = $year;
			
			
			$first_day_of_month = date('w', mktime(0,0,0,$month,1,$year));
			$monthDetails['firstday'] = $first_day_of_month;
			
			$empAttendanceDetails = EmployeeAttendanceModel::whereMonth("attendance_date",$month)->where("emp_id",$empid)->get();
			
			$daysInMonth = $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
			
			$months = array();
			$months[1] = 'January';
			$months[2] = 'February';
			$months[3] = 'March';
			$months[4] = 'April';
			$months[5] = 'May';
			$months[6] = 'June';
			$months[7] = 'July';
			$months[8] = 'August';
			$months[9] = 'September';
			$months[10] = 'October';
			$months[11] = 'November';
			$months[12] = 'December';
			$monthDetails['months'] = $months;
			return view("Employee/attendancedetails",compact('empAttendanceDetails','daysInMonth','monthDetails'));
		}
		
		public function markAsHolidaySet(Request $req)
		{
			$selecteddates = $req->selecteddates;
		
			
				$empAttendanceObj = new EmployeeAttendanceModel();
				
				$empAttendanceObj->attendance_date = date('Y-m-d',strtotime($selecteddates));
				  $empAttendanceObj->mark_attendance = 'H';
				  $empAttendanceObj->over_ride_sandwich = 0;
				  $empAttendanceObj->created_by = $req->session()->get('EmployeeId');
				$empAttendanceObj->save();
				
			
				
			$req->session()->flash('message','You have successfully marked Attendance.');
				//$request->session()->flash('alert-class', 'alert-danger'); 
				return redirect('employeeAttendance');
		}
		
		public function appliedFilterOnAttendance(Request $request)
		{
			$selectedFilter = $request->input();
			
			if(!empty($selectedFilter['selectFrom']))
			{
				$request->session()->put('selectFrom',$selectedFilter['selectFrom']);
			}
		
			if(!empty($selectedFilter['selectTo']))
			{
				$request->session()->put('selectTo',$selectedFilter['selectTo']);
			}
			
			
			if(!empty($selectedFilter['dept_id']))
			{
				$request->session()->put('dept_id',$selectedFilter['dept_id']);
			}
			if(!empty($selectedFilter['emp_id']))
			{
				$request->session()->put('emp_id',$selectedFilter['emp_id']);
			}
			else
			{
				$request->session()->put('emp_id','');
			}
			
			return redirect('employeeAttendance');
		}
		public function resetFAttendance(Request $request)
		{
			$request->session()->put('selectFrom','');
			$request->session()->put('selectTo','');
			$request->session()->put('dept_id','');
			return redirect('employeeAttendance');
		}
		
		public function exportAttendance(Request $request)
		{
			
			$filename = 'AttendanceReport_' . date("d-m-Y h:i:s") . '.csv';
			header('Content-Type: application/csv');
			header('Content-Disposition: attachment; filename="'.$filename.'";'); 
			$requestInput = $request->input();
			
		   /*  echo '<pre>';
			print_r($requestInput);
			exit;  */
			$_empArray = $requestInput['empids'];
			$selectfromexport = $requestInput['selectfromexport'];
			$selecttoexport = $requestInput['selecttoexport'];
			$dept_idexport = $requestInput['dept_idexport'];
			$DateRange = array();
			if(!empty($selectfromexport) && !empty($selecttoexport))
			{
				$DateRange = $this->getDatesFromRangeLists($selectfromexport, $selecttoexport);
			}
			$header = array();
			$header[] = 'Employee Id';
			$header[] = 'Department Name';
			$header[] = 'Employee Name';
			$header[] = 'Employee Number';
			foreach($DateRange as $_date)
			{
				$header[] = date("d M",strtotime($_date));
			}
			
			$f = fopen('php://output', 'w');
			fputcsv($f, $header, ',');
       
			
			
			/*
			*get List of holidays
			*/
			$detailsHoliday = EmployeeAttendanceModel::where("mark_attendance",'H')->get();
			$holidayList = array();
			foreach($detailsHoliday as $_holiday)
			{
				$attendanceD = $_holiday->attendance_date;
				$holidayList[] = date("d-m-Y",strtotime($attendanceD));
			}
			
			/*
			*get List of holidays
			*/
			/*
			*
			*/
			$_empArray_ids = explode(",",$_empArray);
			
						
			foreach ($_empArray_ids as $empid) {
				$values = array();
				$values[] = $this->EmpId($empid);
				$values[] = $this->EmpDepartment($empid);
				$values[] = $this->EmpName($empid);
				$values[] = $this->EmpMobile($empid);
				foreach($DateRange as $_date)
				{
				$_dateSet = date('Y-m-d',strtotime($_date));
				
				
				$dayName =  date('D', strtotime($_date));
				
					/*
					*check for holiday
					*start coding
					*/
						$goprocess = 1;
					
						$detailsHoliday = EmployeeAttendanceModel::where("attendance_date",$_dateSet)->where("mark_attendance","Holiday")->first();
						if(!empty($detailsHoliday) )
						{
							
							$values[] = 'H';
							
							$goprocess = 2;
						}
						
						
					
					
					/*
					*check for holiday
					*End coding
					*/
					$details = EmployeeAttendanceModel::where("dept_id",$dept_idexport)->where("emp_id",$empid)->where("attendance_date",$_dateSet)->where("over_ride_sandwich",0)->first();
					if($goprocess == 1 || (!empty($details) && $details->mark_attendance == 'sandwich'))
					{
					if(!empty($details))
					{
						
						if($details->mark_attendance == 'present')
						{
							$values[] = 'P';
							
						}
						else if($details->mark_attendance == 'sandwich')
						{
							$values[] = 'S';
						}
						else if($details->mark_attendance == 'absent')
						{
							$values[] = 'A';
						}
						else if($details->mark_attendance == 'late')
						{
							$values[] = 'L';
						}
						else
						{
							
							if($details->leave_type == 'casual_leave')
						{
							$values[] = 'CL';
						}
						else if($details->leave_type == 'annual_leave')
						{
							$values[] = 'AL';
						}
						else if($details->leave_type == 'sick_leave')
						{
							$values[] = 'SL';
						}
						else if($details->leave_type == 'public_holiday')
						{
							$values[] = 'PH';
						}
						else if($details->leave_type == 'emergency_leave')
						{
							$values[] = 'EL';
						}
						else if($details->leave_type == 'half_day')
						{
							$values[] = 'HD';
						}
						else
						{
							
						}
						}
						
						
						
						
 					}
					else
					{
						if($dayName == 'Sun')
						{
							$values[] = 'H';
						}
						else
						{
							if(!in_array($_date,$holidayList))
							{
								$values[] = 'Not Marked';
							}
							else
							{
								$values[] = 'H';
							}
								
						}
					}
					}
					
				
				}
				fputcsv($f, $values, ',');
				/* echo '<pre>';
				print_r($values);
				exit; */
			}
			
			exit();
		}
		public function EmpId($eId)
		{
			$eMod = Employee_details::where('id',$eId)->first();
			return $eMod->emp_id;
		}
		public function EmpDepartment($eId)
		{
			$emp = Employee_details::where("id",$eId)->first();
			$dept_id = $emp->dept_id;
			$dMod = Department::where('id',$dept_id)->first();
			return $dMod->department_name;
		}
		
		public function EmpName($eId)
		{
			$eMod = Employee_details::where('id',$eId)->first();
			return $eMod->first_name.' '.$eMod->last_name;
		}
		public function EmpMobile($eId)
		{
				$emp = Employee_details::where("id",$eId)->first();
				$empCode = $emp->emp_id;
				$eMod = Employee_attribute::where('emp_id',$empCode)->where("attribute_code","LC_Number")->first();
				
				if(empty($eMod))
				{
					return '';
				}
				else
				{
					return $eMod->attribute_values;
				}
		}
		
		public function PresentAttendance($eId,$request)
		{
			if(!empty($request->session()->get('applied_month')))
			{
			
				$month = $request->session()->get('applied_month');
			}
			else
			{
				$month = date('m');
			}
			$empdetails = EmployeeAttendanceModel::whereMonth("attendance_date",$month)->where("emp_id",$eId)->where("attendance_value","P")->selectraw("count(id) as totalAttendance,emp_id")->groupBy('emp_id')->first();
			if(!empty($empdetails))
			{
				$totalAttendance = $empdetails->totalAttendance;
			}
			else
			{
				 $totalAttendance = 0;
			}
			return $totalAttendance;
		}
		
		public function AbsentAttendance($eId,$request)
		{
			if(!empty($request->session()->get('applied_month')))
			{
			
				$month = $request->session()->get('applied_month');
			}
			else
			{
				$month = date('m');
			}
			$empdetails = EmployeeAttendanceModel::whereMonth("attendance_date",$month)->where("emp_id",$eId)->where("attendance_value","A")->selectraw("count(id) as totalAttendance,emp_id")->groupBy('emp_id')->first();
			 if(!empty($empdetails))
			{
				$totalAttendance = $empdetails->totalAttendance;
			}
			else
			{
				 $totalAttendance = 0;
			}
			return $totalAttendance;
		}
		
		public function LeaveDays($eId,$request)
		{
			if(!empty($request->session()->get('applied_month')))
			{
			
				$month = $request->session()->get('applied_month');
			}
			else
			{
				$month = date('m');
			}
			$empdetails = EmployeeAttendanceModel::whereMonth("attendance_date",$month)->where("emp_id",$eId)->where("attendance_value","L")->selectraw("count(id) as totalAttendance,emp_id")->groupBy('emp_id')->first();
			if(!empty($empdetails))
			{
				$totalAttendance = $empdetails->totalAttendance;
			}
			else
			{
				 $totalAttendance = 0;
			}
			return $totalAttendance;
		}
		
		public function HoliDays($request)
		{
			if(!empty($request->session()->get('applied_month')))
			{
			
				$month = $request->session()->get('applied_month');
			}
			else
			{
				$month = date('m');
			}
			
			$year = 2022;	
			$emp_obj = new EmployeeAttendanceModel();
			$empdetails = EmployeeAttendanceModel::whereMonth("attendance_date",$month)->where("attendance_value",'H')->selectraw("count(id) as totalHolidays")->first();
			 return $empdetails->totalHolidays;
		}
		
		public function ValidDays($request)
		{
			if(!empty($request->session()->get('applied_month')))
			{
			
				$month = $request->session()->get('applied_month');
			}
			else
			{
				$month = date('m');
			}
			$year = 2022;	
			$daysInMonth = $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
			/*
			*getting sunday
			*/
			 $sundays=0;
			$total_days=$daysInMonth;
			for($i=1;$i<=$total_days;$i++)
			{
				if(date('N',strtotime($year.'-'.$month.'-'.$i))==7)
				{	
					$sundays++;
				}
			}
			/*
			*getting sunday
			*/
			$validd = $daysInMonth - $sundays;
			
			/*
			*get Holiday in months
			*/
			
			$year = 2022;	
			$emp_obj = new EmployeeAttendanceModel();
			$empdetails = EmployeeAttendanceModel::whereMonth("attendance_date",$month)->where("attendance_value",'H')->selectraw("count(id) as totalHolidays")->first();
			/*
			*get Holiday in months
			*/
			$holidaysCount = $empdetails->totalHolidays;
			$newValidDays = $validd-$holidaysCount;
			return  $newValidDays;
		}
		
		public function sandwichProgress(Request $req)
		{
			
			$eid = $req->eid;
			$deptId = $req->deptId;
			$start = $req->selectFrom;
			$end = $req->selectTo;
			$dateRangeArray = $this->getDatesFromRangeSandwich($start, $end);
			
		/* 	 echo '<pre>';
			print_r($dateRangeArray);
			exit; */ 
			/*
			*check existance of attendance
			*start code
			*/
		/* 	echo $eid.'@'.$deptId;
			exit;
			 */
			$updateArray = array();
			foreach($dateRangeArray as $_dateRange)
			{
				$dateRangedateT = date('Y-m-d',strtotime($_dateRange));
				$attendanceExistCheck = EmployeeAttendanceModel::where("attendance_date",$dateRangedateT)
				->where("dept_id",$deptId)
				->where("emp_id",$eid)
				->first();
				
				if(!empty($attendanceExistCheck))
				{
					$emp_obj = EmployeeAttendanceModel::find($attendanceExistCheck->id);
					
					$emp_obj->over_ride_sandwich =1;
					$emp_obj->save();
					
				}
			}
			
			/*
			*check existance of attendance
			*start code
			*/
			
			/*
			*Apply sandwitch rules
			*start coding
			*/
			foreach($dateRangeArray as $_dateRange)
			{
				$emp_obj = new EmployeeAttendanceModel();
				$emp_obj->dept_id = $deptId;
				$emp_obj->emp_id = $eid;
				$emp_obj->attendance_date = date('Y-m-d',strtotime($_dateRange));
				$emp_obj->mark_attendance = 'sandwich';
				$emp_obj->over_ride_sandwich = 0;
				$emp_obj->created_by = $req->session()->get('EmployeeId');
				$emp_obj->save();
			}
			$req->session()->flash('message','Sandwich rules applied.');
			echo "Done";
			exit;
			/*
			*Apply sandwitch rules
			*start coding
			*/
		}
		public function leaveApprovalPanel(Request $req)
		{
			$eid = $req->empId;
			$selectFrom = $req->selectFrom;
			$selectTo = $req->selectTo;
			$selectFromSet = date('Y-m-d',strtotime($selectFrom));
			$selectToSet = date('Y-m-d',strtotime($selectTo));
			
			$empdetails = new Employee_details();
			$empdetailsListing = $empdetails->where("id",$eid)->first();
			$_departmentEmp = $this->EmpDepartment($eid);
			$employeeDetails['name'] =  $empdetailsListing->first_name.' '.$empdetailsListing->last_name;
			$employeeDetails['department'] =  $_departmentEmp;
			$employeeDetails['selectFrom'] =  $selectFrom;
			$employeeDetails['selectTo'] =  $selectTo;
			
			$employeeDetailsAsPerSelectedDates = EmployeeAttendanceModel::whereBetween('attendance_date',[$selectFromSet, $selectToSet])->where("emp_id",$eid)->where("mark_attendance","leave")->orderBy("id",'DESC')->get();
			
			
			$totalLeaveTaken  = EmployeeAttendanceModel::where("emp_id",$eid)->where("mark_attendance","leave")->where("leave_approved",2)->count();
			$leaveTypeCount = array();
			$leaveTypeCount['casual_leave']  = EmployeeAttendanceModel::where("emp_id",$eid)->where("mark_attendance","leave")->where("leave_type","casual_leave")->where("leave_approved",2)->count();
			$leaveTypeCount['annual_leave']  = EmployeeAttendanceModel::where("emp_id",$eid)->where("mark_attendance","leave")->where("leave_type","annual_leave")->where("leave_approved",2)->count();
			$leaveTypeCount['sick_leave']  = EmployeeAttendanceModel::where("emp_id",$eid)->where("mark_attendance","leave")->where("leave_type","sick_leave")->where("leave_approved",2)->count();
			$leaveTypeCount['public_holiday']  = EmployeeAttendanceModel::where("emp_id",$eid)->where("mark_attendance","leave")->where("leave_type","public_holiday")->where("leave_approved",2)->count();
			$leaveTypeCount['emergency_leave']  = EmployeeAttendanceModel::where("emp_id",$eid)->where("mark_attendance","leave")->where("leave_type","emergency_leave")->where("leave_approved",2)->count();
			$leaveTypeCount['half_day']  = EmployeeAttendanceModel::where("emp_id",$eid)->where("mark_attendance","leave")->where("leave_type","half_day")->where("leave_approved",2)->count();
			
			
			return view("Employee/leaveApprovalPanel",compact('employeeDetails','employeeDetailsAsPerSelectedDates','totalLeaveTaken','leaveTypeCount'));
		}
		
		public function leaveApproved(Request $req)
		{
			$attendanceId = $req->attendanceId;
			$attendanceObj = EmployeeAttendanceModel::find($attendanceId);
			$attendanceObj->leave_approved = 2;
			$attendanceObj->save();
			$req->session()->flash('message','Leave Approved Successfully.');
			return  redirect()->back();
		}
		
		public function leaveDisApproved(Request $req)
		{
			$attendanceId = $req->attendanceId;
			$attendanceObj = EmployeeAttendanceModel::find($attendanceId);
			$attendanceObj->leave_approved = 3;
			$attendanceObj->save();
			$req->session()->flash('message','Leave disapproved Successfully.');
			return  redirect()->back();
		}
		
		public function filledEmps(Request $req)
		{
			$deptId = $req->deptId;
			/* echo $deptId;
			exit; */
			$empLists = Employee_details::where("dept_id",$deptId)->get();
			$listofEmpId = array();
			foreach($empLists as $_emp)
			{
				$listofEmpId[$_emp->emp_id] = $_emp->emp_id;
			}
			return view("Employee/filledEmps",compact('listofEmpId'));
		}
		
		public function appliedFilterOnEMPList(Request $request)
		{
			$selectedFilter = $request->input();
			
			if(!empty($selectedFilter['deptID']))
			{
				$request->session()->put('deptID',$selectedFilter['deptID']);
			}
			return redirect('listEmp');
		}
		
		public function resetEmpdepartmentFilter(Request $request)
		{
			$request->session()->put('deptID','');
			return redirect('listEmp');
		}
}
