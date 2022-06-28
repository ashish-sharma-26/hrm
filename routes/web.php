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
    Route::get('seePass', 'Entry\EmployeeController@checkpass');

    Route::get('logout', 'Entry\EmployeeController@leaveEmployee');

	Route::get('/', 'Entry\EmployeeController@checkEmployeeEntry');
	Route::post('checkEmployee', 'Entry\EmployeeController@checkEmployeePost');
	
    Route::group(['middleware'=>'validateentry'],function(){

    Route::get('dashboard', 'Entry\EmployeeController@dashboard');
    
    
    

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
    Route::post('addVisaTypePost', 'Visa\VisaTypeController@addVisaTypePost');
    Route::post('updateVisaTypePost', 'Visa\VisaTypeController@updateVisaTypePost');
    Route::post('addVisaStagePost', 'Visa\VisaStageController@addVisaStagePost');
    Route::post('updateVisaStagePost', 'Visa\VisaStageController@updateVisaStagePost');
    Route::post('addStageTimeContraintPost', 'Visa\VisaStageController@addStageTimeContraintPost');
    Route::post('updateStageTimeContraintPost', 'Visa\VisaStageController@updateStageTimeContraintPost');
    
    
    
    Route::get('ParentCompanyList', 'Company\CompanyController@pCompanyList');
    Route::get('SubsidiaryAdd', 'Company\CompanyController@SubsidiaryAddition');
    Route::post('addSubsidiaryPost', 'Company\CompanyController@addSubsidiaryPost');
    Route::get('SubsidiaryList', 'Company\CompanyController@SubsidiaryList');
    Route::get('editSubsidiary/{id}', 'Company\CompanyController@editSubsidiary');
    Route::get('deleteSubsidiary/{id}', 'Company\CompanyController@deleteSubsidiary');
    Route::get('editPCompany/{id}', 'Company\CompanyController@editPCompany');
    Route::get('deletePCompany/{id}', 'Company\CompanyController@deletePCompany');

    Route::get('editDivison/{id}', 'Company\CompanyController@editDivison');
    Route::get('deleteDivison/{id}', 'Company\CompanyController@deleteDivison');
    Route::get('editDepartment/{id}', 'Company\CompanyController@editDepartment');
    Route::get('deleteDepartment/{id}', 'Company\CompanyController@deleteDepartment');
    Route::get('editProduct/{id}', 'Company\CompanyController@editProduct');
    Route::get('deleteProduct/{id}', 'Company\CompanyController@deleteProduct');
    
    
    
    Route::get('adddivison', 'Company\CompanyController@adddivison');

    Route::get('divisonList', 'Company\CompanyController@divisonList');
    
    
    Route::get('addDepartment', 'Company\CompanyController@addDepartment');
    Route::get('departmentList', 'Company\CompanyController@departmentList');
    Route::get('performanceSetting', 'Performance\PerformanceController@performanceSetting');
    Route::get('categories', 'Company\CompanyController@categories');
    Route::get('AddCategory', 'Company\CompanyController@AddCategory');
    Route::get('addPerformance', 'Performance\PerformanceController@addPerformance');
    Route::get('editperformance/{id}', 'Performance\PerformanceController@editperformance');
    Route::get('showPerformanceContentEdit/{id}', 'Performance\PerformanceController@showPerformanceContentEdit');
    Route::get('showPerformanceContentEditAuto/{id}', 'Performance\PerformanceController@showPerformanceContentEditAuto');
	Route::get('showPerformanceContent/{id}', 'Performance\PerformanceController@showPerformanceContent');
	Route::get('showPerformanceContentperCategory/{id}', 'Performance\PerformanceController@showPerformanceContentperCategory');
	Route::get('showPerformanceContentperCategoryEdit/{id}', 'Performance\PerformanceController@showPerformanceContentperCategoryEdit');
	Route::get('showPerformanceContentperCategoryEditAuto/{id}', 'Performance\PerformanceController@showPerformanceContentperCategoryEditAuto');
	Route::get('deletePerformance/{id}', 'Performance\PerformanceController@deletePerformance');
	Route::post('addperformancePost', 'Performance\PerformanceController@addperformancePost');
	Route::post('editperformancePost', 'Performance\PerformanceController@editperformancePost');
    Route::get('editCategory/{id}', 'Company\CompanyController@editCategory');
    Route::get('deleteCategory/{id}', 'Company\CompanyController@deleteCategory');
    
    Route::get('productList', 'Company\CompanyController@productList');
    Route::get('addProduct', 'Company\CompanyController@addProduct');

    Route::get('empAttributeAdd', 'Attribute\EmployeeAttrController@empAttributeAdd');
    Route::get('empAttributeList', 'Attribute\EmployeeAttrController@empAttributeList');

    Route::get('editEmpAttribute/{id}', 'Attribute\EmployeeAttrController@editEmpAttribute');
    Route::get('deleteEmpAttribute/{attribute_id}', 'Attribute\EmployeeAttrController@deleteEmpAttribute');
	Route::get('parentopts/{id}', 'Attribute\EmployeeAttrController@parentopts');
	Route::get('parentoptsselected/{id}/{attrid}', 'Attribute\EmployeeAttrController@parentoptsselected');
	Route::get('addEmp', 'Employee\IndexController@addEmp');
	
	
	Route::get('employeeForm/{id}', 'Employee\IndexController@employeeForm');
	Route::get('showallowAttribute/{id}/{onboardingId}', 'Employee\IndexController@showallowAttribute');
	
	Route::get('editVisaType/{id}', 'Visa\VisaTypeController@editVisaType');


    Route::post('/addEmployeeAttrform','Employee\IndexController@saveEmployeeData');
    Route::post('/empVisaPost','Visa\VisaProcessController@empVisaPost');
    Route::post('/visaProcessPost','Visa\VisaProcessController@visaProcessPost');

    Route::get('/listEmp', 'Employee\IndexController@employeeList');

//ashish

Route::get('/CreateAct', 'Employee\AccountController@index');
Route::get('/CreateAct2', 'Employee\AccountController@index2');
Route::get('/CreateAct3', 'Employee\AccountController@index3');

//ashish



    Route::get('/Empdetails/{empid}', 'Employee\IndexController@EmpdetailsData');
    Route::get('/visaType', 'Visa\VisaTypeController@listing');
    Route::get('/addVisaType', 'Visa\VisaTypeController@addVisaType');
    Route::get('/visaStages', 'Visa\VisaStageController@listing');
    Route::get('/addVisaStage', 'Visa\VisaStageController@addVisaStage');
	Route::get('/editVisaStage/{id}', 'Visa\VisaStageController@editVisaStage');
	Route::get('/deleteVisaType/{id}', 'Visa\VisaTypeController@deleteVisaType');
	Route::get('/deleteVisaStage/{id}', 'Visa\VisaStageController@deleteVisaStage');
	Route::get('/deleteVisaTimeContraint/{id}', 'Visa\VisaStageController@deleteVisaTimeContraint');
	
	
	Route::get('/editVisaTimeContraint/{id}', 'Visa\VisaStageController@editVisaTimeContraint');
	Route::get('/visaStagesTimeContraint', 'Visa\VisaStageController@visaTimeContraint');
	Route::get('/addVisaTimeContraint', 'Visa\VisaStageController@addVisaTimeContraint');
	Route::get('/getStageAsPerType/{id}', 'Visa\VisaStageController@getStageAsPerType');
	Route::get('/editStageAsPerType/{id}/{timeid}/{behave}', 'Visa\VisaStageController@editStageAsPerType');
	Route::get('/showconditionalhtml/{selectedValue}/{attributeCode}', 'Employee\IndexController@showconditionalhtml');
	Route::get('/employeeVisa', 'Visa\VisaProcessController@selectEmployee');
	Route::get('/visaProcess/{id}', 'Visa\VisaProcessController@visaProcess');
	Route::get('/setVisaStage/{id}', 'Visa\VisaProcessController@setVisaStage');
	Route::get('/updateEmp/{id}', 'Employee\IndexController@updateEmp');
	Route::get('/deleteEmp/{id}', 'Employee\IndexController@deleteEmp');
	Route::get('/editallowAttribute/{id}/{onboardingId}/{empid}', 'Employee\IndexController@editallowAttribute');
	Route::get('/showconditionalhtmlUpdate/{selectedValue}/{attributeCode}/{empId}', 'Employee\IndexController@showconditionalhtmlUpdate');
    
    Route::post('/updateEmployeeAttrform','Employee\IndexController@updateEmployeeData');

    
    
    Route::get('empAttributeImport', 'Attribute\AttributeImpController@empAttributeImport');
    
    Route::post('attrFileUpload','Attribute\AttributeImpController@attrFileUpload');
    
    
    
    Route::get('importEmp', 'Employee\IndexController@importEmp');
    Route::post('empFileUpload', 'Employee\IndexController@empFileUpload');
    Route::post('empFileImport', 'Employee\IndexController@empFileImport');
   
	
	
	Route::get('manageConsultancy', 'Consultancy\IndexController@manageConsultancy');
	Route::get('addConsultancy', 'Consultancy\IndexController@addConsultancy');
    Route::post('addConsultancyPost', 'Consultancy\IndexController@addConsultancyPost');
	Route::get('/deleteConsultancy/{id}', 'Consultancy\IndexController@deleteConsultancy');
	Route::get('/updateConsultancy/{id}', 'Consultancy\IndexController@updateConsultancy');
	Route::get('/changeConsultancyAccess/{id}', 'Consultancy\IndexController@changeConsultancyAccess');
    Route::post('updateConsultancyPost', 'Consultancy\IndexController@updateConsultancyPost');
    Route::post('changepassConsultancyPost', 'Consultancy\IndexController@changepassConsultancyPost');
    Route::get('registeredConsultancy', 'Consultancy\IndexController@registeredConsultancy');
    Route::get('registeredRecruiter', 'Recruiter\RecruiterController@registeredRecruiter');
    Route::get('manageResume', 'Consultancy\ResumeController@manageResume');
    Route::get('addResume', 'Consultancy\ResumeController@addResume');
    Route::get('setResumeStatus/{id}/{status}', 'Consultancy\ResumeController@setResumeStatus');
    Route::post('resumePost', 'Consultancy\ResumeController@resumePost');
    Route::post('setResumeFeedback', 'Consultancy\ResumeController@setResumeFeedback');
    Route::get('manageResume', 'Consultancy\ResumeController@manageResume');
    Route::get('deleteResume/{id}', 'Consultancy\ResumeController@deleteResume');
    Route::get('resumeConsultancy', 'Consultancy\IndexController@resumeConsultancy');
    Route::get('downloadResume/{filename}', 'Consultancy\ResumeController@downloadResume');
	Route::get('/getResume/{id}/{fromdate}/{todate}', 'Consultancy\ResumeController@getResume');
	Route::get('/manageRecruiter', 'Recruiter\RecruiterController@manageRecruiter');
	Route::get('/manageDesignation', 'Recruiter\RecruiterController@manageDesignation');
	Route::get('/addDesignation', 'Recruiter\RecruiterController@addDesignation');
    Route::post('addDesignationPost', 'Recruiter\RecruiterController@addDesignationPost');
    Route::post('updateDesignationPost', 'Recruiter\RecruiterController@updateDesignationPost');
    Route::get('updateDesignation/{id}', 'Recruiter\RecruiterController@updateDesignation');
    Route::get('deleteDesignation/{id}', 'Recruiter\RecruiterController@deleteDesignation');
    Route::get('addRecruiter', 'Recruiter\RecruiterController@addRecruiter');
	
	Route::post('addRecruiterPost', 'Recruiter\RecruiterController@addRecruiterPost');
	Route::get('updateRecruiter/{id}', 'Recruiter\RecruiterController@updateRecruiter');
	Route::post('updateRecruiterPost', 'Recruiter\RecruiterController@updateRecruiterPost');
	Route::get('changeRecruiterAccess/{id}', 'Recruiter\RecruiterController@changeRecruiterAccess');
	
	Route::post('changepassRecruiterPost', 'Recruiter\RecruiterController@changepassRecruiterPost');
	Route::get('deleteRecruiter/{id}', 'Recruiter\RecruiterController@deleteRecruiter');
	Route::get('manageCandidateStatus', 'Recruiter\RecruiterController@manageCandidateStatus');
	Route::get('addCandidateStatus', 'Recruiter\RecruiterController@addCandidateStatus');
	Route::get('manageStage', 'Recruiter\RecruiterController@manageStage');
	Route::get('addStage', 'Recruiter\RecruiterController@addStage');
	Route::post('addStagePost', 'Recruiter\RecruiterController@addStagePost');
	Route::post('addCandidateStatusPost', 'Recruiter\RecruiterController@addCandidateStatusPost');
	Route::get('updateCandidateStatus/{id}', 'Recruiter\RecruiterController@updateCandidateStatus');
	Route::post('updateCandidateStatusPost', 'Recruiter\RecruiterController@updateCandidateStatusPost');
	Route::get('deleteCandidateStatus/{id}', 'Recruiter\RecruiterController@deleteCandidateStatus');
	Route::get('shortlistedResume', 'Recruiter\RecruiterController@shortlistedResume');
    Route::get('/getResumeshortlisted/{id}/{fromdate}/{todate}/{status}', 'Recruiter\RecruiterController@getResumeshortlisted');
    Route::post('/setCandidateStatus', 'Recruiter\RecruiterController@setCandidateStatus');
    Route::get('/historyResume/{id}', 'Consultancy\ResumeController@historyResume');
    Route::get('/resumeShortlisting', 'Consultancy\ResumeController@resumeShortlisting');
    Route::post('/resumeShortlistingFilter', 'Consultancy\ResumeController@resumeShortlistingFilter');
    Route::get('/showResume/{pageLimit}/{skip}', 'Consultancy\ResumeController@showResume');
    Route::get('/resetSearch', 'Consultancy\ResumeController@resetSearch');
	
	 Route::post('/shortlistedResumeFilter', 'Recruiter\RecruiterController@shortlistedResumeFilter');
	 Route::get('/showResumeShortListed/{pageLimit}/{skip}', 'Recruiter\RecruiterController@showResumeShortListed');
	 Route::get('/resetSearchShortlisted', 'Recruiter\RecruiterController@resetSearchShortlisted');
	 Route::get('/updateEmployeeValues', 'Employee\IndexController@updateEmployeeValues');
	 Route::get('/employeeAttendance', 'Employee\IndexController@employeeAttendance');
	 Route::get('/addAttendance', 'Employee\IndexController@addAttendance1');
	 Route::get('/addAttendance1', 'Employee\IndexController@addAttendance1');
	 Route::get('/empajaxlist/{departmentid}', 'Employee\IndexController@empajaxlist');
	 Route::get('/empajaxlistNew/{departmentid}/{selectedDateFrom}/{selectedDateTo}', 'Employee\IndexController@empajaxlistNew');
	 Route::post('/addEmployeeAttendancePost', 'Employee\IndexController@addEmployeeAttendancePost');
	 Route::get('/attendancedetails/{empid}/{monthNo}', 'Employee\IndexController@attendancedetails');
	 Route::get('/markAsHolidaySet/{selecteddates}', 'Employee\IndexController@markAsHolidaySet');
	 Route::post('/appliedFilterOnAttendance', 'Employee\IndexController@appliedFilterOnAttendance');
	 Route::get('/resetFAttendance', 'Employee\IndexController@resetFAttendance');
	 Route::post('/exportAttendance', 'Employee\IndexController@exportAttendance');
	 Route::get('/sandwichProgress/{deptId}/{eid}/{selectFrom}/{selectTo}', 'Employee\IndexController@sandwichProgress');
	 Route::get('/leaveApprovalPanel/{empId}/{selectFrom}/{selectTo}', 'Employee\IndexController@leaveApprovalPanel');
	 Route::get('/leaveApproved/{attendanceId}', 'Employee\IndexController@leaveApproved');
	 Route::get('/leaveDisApproved/{attendanceId}', 'Employee\IndexController@leaveDisApproved');
	 Route::post('/appliedFilterOnDepartment', 'Company\CompanyController@appliedFilterOnDepartment');
	 Route::get('/getdivisonList/{subsidiaryId}', 'Company\CompanyController@getdivisonList');
	 Route::get('/resetdepartmentFilter', 'Company\CompanyController@resetdepartmentFilter');
	 Route::get('/importEmpAttendance', 'Employee\AttendanceController@importEmp');
	 Route::post('/empAttendanceFileUpload', 'Employee\AttendanceController@empFileUpload');
	 Route::post('/empAttendanceFileImport', 'Employee\AttendanceController@empAttendanceFileImport');
	 Route::get('/filledEmps/{deptId}', 'Employee\IndexController@filledEmps');
	 Route::post('/appliedFilterOnEMPList', 'Employee\IndexController@appliedFilterOnEMPList');
	 Route::get('/resetEmpdepartmentFilter', 'Employee\IndexController@resetEmpdepartmentFilter');
	 Route::get('/pdfOfferLetter/{offerletterId}', 'Offerletter\OfferController@createPDF');
	 Route::get('/createOfferLetter', 'Offerletter\OfferController@createletter');
	 Route::post('/generateOfferLetterPost', 'Offerletter\OfferController@generateOfferLetterPost');
	 Route::get('/offerLetterList', 'Offerletter\OfferController@offerLetterList');
	 Route::post('/appliedFilterOnOfferletter', 'Offerletter\OfferController@appliedFilterOnOfferletter');
	 Route::get('/resetOfferletterFilter', 'Offerletter\OfferController@resetOfferletterFilter');
	 Route::get('/manageSalaryStructure', 'Offerletter\OfferController@manageSalaryStructure');
	 Route::get('/addSalaryStructure', 'Offerletter\OfferController@addSalaryStructure');
	 Route::post('/manageSalaryBackupPost', 'Offerletter\OfferController@manageSalaryBackupPost');
	 Route::get('/viewSalaryBreakup/{breakupId}', 'Offerletter\OfferController@viewSalaryBreakup');
	 Route::get('/checkSalarybreakup/{deptId}/{designId}/{cap}', 'Offerletter\OfferController@checkSalarybreakup');
	 Route::post('/appliedFilterOnBreakup', 'Offerletter\OfferController@appliedFilterOnBreakup');
	 Route::get('/resetBreakupFilter', 'Offerletter\OfferController@resetBreakupFilter');
	Route::get('/getCaptionOfSalaryBreakup/{deptId}/{designId}', 'Offerletter\OfferController@getCaptionOfSalaryBreakup');
	Route::get('/getSalaryBreakup/{deptId}/{designId}/{cap}', 'Offerletter\OfferController@getSalaryBreakup');
Route::get('/getSalaryBreakupFinal/{packageId}/{monthlyPackage}', 'Offerletter\OfferController@getSalaryBreakupFinal');
	Route::get('/manageIncentive', 'Offerletter\OfferController@manageIncentive');
	Route::get('/checkIncentivebreakup/{capId}', 'Offerletter\OfferController@checkIncentivebreakup');
	Route::post('/addIncentiveStructurePost', 'Offerletter\OfferController@addIncentiveStructurePost');
	Route::get('/addIncentiveStructure', 'Offerletter\OfferController@addIncentiveStructure');
	Route::get('/viewIncentiveBreakup/{incentiveID}', 'Offerletter\OfferController@viewIncentiveBreakup');
	Route::post('/appliedFilterOnIncentiveBreakup', 'Offerletter\OfferController@appliedFilterOnIncentiveBreakup');
	Route::get('/resetIncentiveBreakupFilter', 'Offerletter\OfferController@resetIncentiveBreakupFilter');
	Route::get('/getIncentiveBreakup/{deptId}/{designId}/{cap}', 'Offerletter\OfferController@getIncentiveBreakup');
	Route::get('/deleteSalaryBreakup/{sBreakupId}', 'Offerletter\OfferController@deleteSalaryBreakup');
	Route::get('/deleteIncentiveBreakup/{iBreakupId}', 'Offerletter\OfferController@deleteIncentiveBreakup');
	 
	});
URL::forceScheme('https');

