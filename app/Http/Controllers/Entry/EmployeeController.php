<?php

namespace App\Http\Controllers\Entry;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Entry\Employee;
use Crypt;
use Session;

class EmployeeController extends Controller
{

	public function __construct()
	{
		
		
	}
	
    public function checkpass()
	{
		
		$username = 'rahulpr';
		
		 $password = '123456';
		echo $pwd = Crypt::encrypt($password);exit;
	}

	public function checkEmployeeEntry(Request $request)
	{
		
		
		 return view('Entry/Employee/checkEmployeeEntry');

	}

	public function checkEmployeePost(Request $req)
	{
		$username =  $req->input('username');
		$password = $req->input('password');
		$getmatch =  Employee::where('username',$username)->where("status",1)->get()->count();
		
		if($getmatch >0)
		{
			$employeeList = Employee::where('username',$username)->first();
			$passwordFromUsername = Crypt::decrypt($employeeList->password);
			if( $passwordFromUsername == $password)
			{
				
			$req->session()->put('EmployeeId',$employeeList->id);
			$req->session()->put('EmployeeDesignation',$employeeList->designation);
			$req->session()->get('EmployeeId');
			/*
			*check employee degination
			*/
			if($employeeList->designation == 'Admin')
			{
				return redirect('dashboard');
			}
			
			if($employeeList->designation == 'Consultancy')
			{
				return redirect('registeredConsultancy');
			}
			
			if($employeeList->designation == 'Recruiter')
			{
				return redirect('registeredRecruiter');
			}
			/*
			*check employee degination
			*/
			
			
			}
			else
			{
				$req->session()->flash('message','username or password is not correct.');
				return redirect()->back();
			}
		}
		else
		{
			$req->session()->flash('message','username or password is not correct.');
				return redirect()->back();
		}
		
		exit;

	}

	public function dashboard()
	{
		return view('Home/Dashboard/dashboard');
	}

	public function leaveEmployee(Request $request)
	{
		$request->session()->forget('EmployeeId');
			$request->session()->forget('EmployeeUsername');
			return redirect('/');
	}
}
