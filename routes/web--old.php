<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function () {
    return view('welcome');
});


    Route::get('seePass', 'Entry\EmployeeController@checkpass');

    Route::get('logout', 'Entry\EmployeeController@leaveEmployee');


    Route::group(['middleware'=>'employeeAuth'],function(){

    Route::get('dashboard', 'Entry\EmployeeController@dashboard');
    Route::get('login', 'Entry\EmployeeController@checkEmployeeEntry');
    
    Route::post('checkEmployee', 'Entry\EmployeeController@checkEmployeePost');

    Route::get('addParentCompany', 'Company\CompanyController@addParentCompany');
    
    Route::post('addParentCategory', 'Company\CompanyController@addParentCPost');
    Route::post('editSubsidiaryPost', 'Company\CompanyController@editSubsidiaryPost');

    Route::post('editParentCategoryPost', 'Company\CompanyController@editParentCategoryPost');
    Route::post('addDivisonPost', 'Company\CompanyController@addDivisonPost');
    Route::post('editDivisonPost', 'Company\CompanyController@editDivisonPost');
    Route::post('addDepartmentPost', 'Company\CompanyController@addDepartmentPost');
    Route::post('editDepartmentPost', 'Company\CompanyController@editDepartmentPost');
    Route::post('addCategoryPost', 'Company\CompanyController@addCategoryPost');
    Route::post('editCategoryPost', 'Company\CompanyController@editCategoryPost');
    Route::post('addProductPost', 'Company\CompanyController@addProductPost');
    Route::post('editProductPost', 'Company\CompanyController@editProductPost');

    Route::post('addEmployeeAttr', 'Attribute\EmployeeAttrController@addEmployeeAttr');
    Route::post('updateEmployeeAttr', 'Attribute\EmployeeAttrController@updateEmployeeAttr');
    
    
    
    Route::get('ParentCompanyList', 'Company\CompanyController@pCompanyList');
    Route::get('SubsidiaryAdd', 'Company\CompanyController@SubsidiaryAddition');
    Route::post('addSubsidiaryPost', 'Company\CompanyController@addSubsidiaryPost');
    Route::get('SubsidiaryList', 'Company\CompanyController@SubsidiaryList');
    Route::get('editSubsidiary/{id}', 'Company\CompanyController@editSubsidiary');
    Route::get('editPCompany/{id}', 'Company\CompanyController@editPCompany');

    Route::get('editDivison/{id}', 'Company\CompanyController@editDivison');
    Route::get('editDepartment/{id}', 'Company\CompanyController@editDepartment');
    Route::get('editProduct/{id}', 'Company\CompanyController@editProduct');
    
    
    
    Route::get('adddivison', 'Company\CompanyController@adddivison');

    Route::get('divisonList', 'Company\CompanyController@divisonList');
    
    
    Route::get('addDepartment', 'Company\CompanyController@addDepartment');
    Route::get('departmentList', 'Company\CompanyController@departmentList');
    Route::get('categories', 'Company\CompanyController@categories');
    Route::get('AddCategory', 'Company\CompanyController@AddCategory');
    Route::get('editCategory/{id}', 'Company\CompanyController@editCategory');
    Route::get('productList', 'Company\CompanyController@productList');
    Route::get('addProduct', 'Company\CompanyController@addProduct');

    Route::get('empAttributeAdd', 'Attribute\EmployeeAttrController@empAttributeAdd');
    Route::get('empAttributeList', 'Attribute\EmployeeAttrController@empAttributeList');

    Route::get('editEmpAttribute/{id}', 'Attribute\EmployeeAttrController@editEmpAttribute');
	Route::get('parentopts/{id}', 'Attribute\EmployeeAttrController@parentopts');
	Route::get('parentoptsselected/{id}/{attrid}', 'Attribute\EmployeeAttrController@parentoptsselected');
	Route::get('addEmp', 'Employee\IndexController@addEmp');
	
	
	Route::get('employeeForm/{id}', 'Employee\IndexController@employeeForm');
    
    Route::post('/addEmployeeAttr','Employee\IndexController@saveEmployeeData');
    

    
    
    
    
    
    
    
    
    

    
    
    
    });


