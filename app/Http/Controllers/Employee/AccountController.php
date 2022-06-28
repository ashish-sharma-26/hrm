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


class AccountController extends Controller
{
    
       public function index()
	   {
			return view("Employee/CreateAccount");

	   }
	   public function index2()
	   {
			return view("Employee/CreateAccount2");

	   }
	   public function index3()
	   {
			return view("Employee/CreateAccount3");

	   }
}
