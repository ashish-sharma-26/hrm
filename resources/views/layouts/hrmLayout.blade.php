<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Surani Group HRM</title>

        <!-- Bootstrap Core CSS -->
        <link href="{{ asset('hrm/css/bootstrap.min.css')}}" rel="stylesheet">

        <!-- MetisMenu CSS -->
        <link href="{{ asset('hrm/css/metisMenu.min.css')}}" rel="stylesheet">

        <!-- Timeline CSS -->
        <link href="{{ asset('hrm/css/timeline.css')}}" rel="stylesheet">

        <!-- Custom CSS -->
     

        <!-- Morris Charts CSS -->
        <link href="{{ asset('hrm/css/morris.css')}}" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="{{ asset('hrm/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
           <link href="{{ asset('hrm/css/startmin.css')}}" rel="stylesheet">
        <link href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css" rel="stylesheet">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/css/bootstrap-datetimepicker.min.css" rel="stylesheet">


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
        .panel-body {
    overflow:auto;
}
.dropdown-menu{    z-index: 999999;}
         
.loader {
  border: 16px solid #fe8e0e;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 75px;
  height: 75px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;    margin: 21% auto;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
.overlay-spinner{    z-index: 9999999;
    position: fixed;
    width: 100%;
    text-align: center;
    height: 100vh;
    background: #fff;}
        </style>
    </head>
    <body>

        <div id="wrapper">
            <div class="overlay-spinner">
<div class="loader"></div>
                </div>
            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{url('dashboard')}}"><img src="{{ asset('hrm/images/logo.png')}}"></a>
                </div>

                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <div class="collapse" id="myNavbar">
      <ul class="nav navbar-nav">
					<li><a href="{{url('dashboard')}}">Dashboard</a></li>
          
  
          
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">
                            Configuration <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> Parent Company</a>
								<ul>
                                    <li><a href="{{ url('ParentCompanyList') }}"><i class="fa fa-list-ol" aria-hidden="true"></i>List</a>
                                    </li>
                                    <li><a href="{{ url('addParentCompany') }}"><i class="fa fa-plus-square-o" aria-hidden="true"></i>Add</a>
                                    </li>
								</ul>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Subsidiary</a>
                                <ul>
                                    <li><a href="{{ url('SubsidiaryList') }}"><i class="fa fa-list-ol" aria-hidden="true"></i>List</a>
                                    </li>
                                    <li><a href="{{ url('SubsidiaryAdd') }}"><i class="fa fa-plus-square-o" aria-hidden="true"></i>Add</a>
                                    </li>
								</ul>
                            </li>
                            
                            <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Divisons</a>
                                <ul>
                                    <li><a href="{{ url('divisonList') }}"><i class="fa fa-list-ol" aria-hidden="true"></i>List</a>
                                    </li>
                                    <li><a href="{{ url('adddivison') }}"><i class="fa fa-plus-square-o" aria-hidden="true"></i>Add</a>
                                    </li>
								</ul>
                            </li>

							<li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Departments</a>
                                <ul>
                                    <li><a href="{{ url('departmentList') }}"><i class="fa fa-list-ol" aria-hidden="true"></i>List</a>
                                    </li>
                                    <li><a href="{{ url('addDepartment') }}"><i class="fa fa-plus-square-o" aria-hidden="true"></i>Add</a>
                                    </li>
								</ul>
                            </li>


							<li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Product Categories</a>
                                <ul>
                                    <li><a href="{{ url('categories') }}"><i class="fa fa-list-ol" aria-hidden="true"></i>List</a>
                                    </li>
                                    <li><a href="{{ url('AddCategory') }}"><i class="fa fa-plus-square-o" aria-hidden="true"></i>Add</a>
                                    </li>
								</ul>
                            </li>
							<li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Products</a>
                                <ul>
                                    <li><a href="{{ url('productList') }}"><i class="fa fa-list-ol" aria-hidden="true"></i>List</a>
                                    </li>
                                    <li><a href="{{ url('addProduct') }}"><i class="fa fa-plus-square-o" aria-hidden="true"></i>Add</a>
                                    </li>
									
								</ul>
                            </li>
							<li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Attribute</a>
							<ul>
								<li><a href="{{ url('empAttributeList') }}"><i class="fa fa-list-ol" aria-hidden="true"></i>Attribute List</a></li>
                                    
                                    <li><a href="{{ url('empAttributeAdd') }}"><i class="fa fa-plus-square-o" aria-hidden="true"></i>Add Attribute</a>
                                    </li>
									<li><a href="{{ url('empAttributeImport') }}"><i class="fa fa-gear fa-fw"></i>Attribute Import</a>
                                    </li>
								
							</ul>	
								</li>
								<li>
									<a href="{{ url('manageDesignation') }}"><i class="fa fa-user fa-fw"></i>Manage Designation</a>
								</li>
                        </ul>
                    </li>
                 
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Employee <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="{{ url('listEmp') }}"><i class="fa fa-user fa-fw"></i> Employee List</a>
                            </li>
                            <li><a href="{{ url('addEmp') }}"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Add Employee</a>
                            </li>
							<li><a href="{{ url('employeeAttendance') }}"><i class="fa fa-gear fa-fw"></i> Employee Attendance</a>
							</li>
							<li><a href="{{ url('importEmp') }}"><i class="fa fa-gear fa-fw"></i>Employee Import</a>
                            </li>
							<li><a href="{{ url('importEmpAttendance') }}"><i class="fa fa-gear fa-fw"></i>Employee Attendance Import</a>
                            </li>
							<li><a href="{{ url('employeeVisa') }}"><i class="fa fa-gear fa-fw"></i>Employee Visa Process</a>
                            </li>
							 <li><a href="{{ url('visaType') }}"><i class="fa fa-gear fa-fw"></i> Visa Type</a>
                             </li>
							 <li><a href="{{ url('visaStages') }}"><i class="fa fa-gear fa-fw"></i> Visa Stages</a>
                             </li>
							 <li><a href="{{ url('visaStagesTimeContraint') }}"><i class="fa fa-gear fa-fw"></i> Visa Stages Time Contraint</a>
                             </li>
							  <li><a href="{{ url('performanceSetting') }}"><i class="fa fa-user fa-fw"></i> Performance Details</a>
                            </li>
							 <li><a href="{{ url('addPerformance') }}"><i class="fa fa-plus-square-o" aria-hidden="true"></i>Add Performance</a>
							</li>
                        </ul>
                    </li>
                   
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">
                            Recruitment<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="{{ url('manageConsultancy') }}"><i class="fa fa-user fa-fw"></i>Manage Consultancy</a>
                            </li>
                            <li><a href="{{ url('addConsultancy') }}"><i class="fa fa-gear fa-fw"></i>Add Consultancy</a>
                            </li>
                            <li><a href="{{ url('resumeConsultancy') }}"><i class="fa fa-gear fa-fw"></i>Resume Shortlisting</a>
                            </li>
                             <li><a href="{{ url('shortlistedResume') }}"><i class="fa fa-gear fa-fw"></i>Shortlisted Resume</a>
                            </li>
                        </ul>
                    </li>
					   <!--li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">
                            Recruiter<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="{{ url('manageRecruiter') }}"><i class="fa fa-user fa-fw"></i>Manage Recruiter</a>
                            </li>
							<li><a href="{{ url('manageDesignation') }}"><i class="fa fa-user fa-fw"></i>Manage Designation</a>
                            </li>
							<li><a href="{{ url('manageCandidateStatus') }}"><i class="fa fa-user fa-fw"></i>Manage Candidate Status</a>
                            </li>
							<li><a href="{{ url('manageStage') }}"><i class="fa fa-user fa-fw"></i>Manage Stage</a>
                            </li>
                        </ul>
                    </li-->
                        <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">
                            Employee On-boarding<b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <!--li><a href="{{ url('createOfferLetter') }}"><i class="fa fa-user fa-fw"></i>Manage Offer Letter</a>
                            </li-->
                            <li><a href="{{ url('offerLetterList') }}"><i class="fa fa-user fa-fw"></i>Manage Offer Letter</a>
                            </li>
							 <li><a href="{{ url('manageSalaryStructure') }}"><i class="fa fa-user fa-fw"></i>Manage Salary Breakup</a>
                            </li>
							<li><a href="{{ url('manageIncentive') }}"><i class="fa fa-user fa-fw"></i>Manage Incentive Breakup</a>
                            </li>
                        </ul>
                    </li>
						
						<li><a href="#"> Employee Management</a></li>
      </ul>
      
    </div>

                <ul class="nav navbar-right navbar-top-links">
                    <li class="dropdown navbar-inverse">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts dropdown_menu-5">
                             <div class="arrow-up"></div>
                            <li class="notification-heading">
                               
                                    <strong>5 New Notifications</strong>
                             
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown_item-1">
                                <a href="#">
                                    <div class="yellow">
                                        <i class="fa fa-circle"></i> Lead Approval Pending from Admin
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown_item-2">
                                <a href="#" class="red">
                              <div>
                                        <i class="fa fa-circle"></i> Schedule call missed for Calllist-1 days
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown_item-3">
                                <a href="#" class="red">
                                <div>
                                        <i class="fa fa-circle"></i> Schedule call missed for leads-1 days
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown_item-4">
                                <a href="#" class="green">
                               <div>
                                        <i class="fa fa-circle"></i> 2 Leads Approved by Admin
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown_item-5">
                                <a href="#" class="brown">
                                 <div>
                                        <i class="fa fa-circle"></i> 3 Leads are in Fulfillment Stages
                                    </div>
                                </a>
                            </li>
                           
                        </ul>
                    </li>
                    <li class="dropdown notification-list topbar-dropdown">
                                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                        <img src="{{ asset('hrm/images/avatar.png')}}" alt="user-image" class="rounded-circle">
                                        <span class="pro-user-name ml-1">
										<x-Header.CustomerName></x-Header.CustomerName>
										   <b class="caret"></b> 
                                        </span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-user">
                            <li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="{{url('logout')}}"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                            </li>
                        </ul>
                                </li>
                </ul>
                 
                    <div data-name="Fractional Slides" class="glider-contain multiple">
            <div class="gradient-border-bottom">
              <div class="gradient-border">
            
                    <div class="glider" id="glider-cut">
                       
                    <div><a href="{{url('dashboard')}}">Dashboard</a></div>                        
                    <div class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Configuration <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
						<li><a href="#"><i class="fa fa-user fa-fw"></i> Parent Company</a>
								<ul>
									<li><a href="{{ url('ParentCompanyList') }}"><i class="fa fa-list-ol" aria-hidden="true"></i>List</a>
									</li>
									<li><a href="{{ url('addParentCompany') }}"><i class="fa fa-gear fa-fw"></i>Add</a>
									</li>
									
								</ul>
                            </li>
                            <li><a href="#"><i class="fa fa-gear fa-fw"></i> Subsidiary</a>
                                 <ul>
                                    <li><a href="{{ url('SubsidiaryList') }}"><i class="fa fa-list-ol" aria-hidden="true"></i>List</a>
                                    </li>
                                    <li><a href="{{ url('SubsidiaryAdd') }}"><i class="fa fa-gear fa-fw"></i>Add</a>
                                    </li>
								</ul>
                            </li>
                            
                            <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Divisons</a>
                                 <ul>
                                    <li><a href="{{ url('divisonList') }}"><i class="fa fa-list-ol" aria-hidden="true"></i>List</a>
                                    </li>
                                    <li><a href="{{ url('adddivison') }}"><i class="fa fa-gear fa-fw"></i>Add</a>
                                    </li>
								</ul>
                            </li>

							<li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Departments</a>
                                <ul>
                                    <li><a href="{{ url('departmentList') }}"><i class="fa fa-list-ol" aria-hidden="true"></i>List</a>
                                    </li>
                                    <li><a href="{{ url('addDepartment') }}"><i class="fa fa-gear fa-fw"></i>Add</a>
                                    </li>
								</ul>
                            </li>


							<li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Product Categories</a>
                                <ul>
                                    <li><a href="{{ url('categories') }}"><i class="fa fa-list-ol" aria-hidden="true"></i>List</a>
                                    </li>
                                    <li><a href="{{ url('AddCategory') }}"><i class="fa fa-gear fa-fw"></i>Add</a>
                                    </li>
								</ul>
                            </li>
							<li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Products</a>
                                <ul>
                                    <li><a href="{{ url('productList') }}"><i class="fa fa-list-ol" aria-hidden="true"></i>List</a>
                                    </li>
                                    <li><a href="{{ url('addProduct') }}"><i class="fa fa-gear fa-fw"></i>Add</a>
                                    </li>
								</ul>
                            </li>
							<li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Attribute</a>
							 <ul>
									<li><a href="{{ url('empAttributeList') }}"><i class="fa fa-list-ol" aria-hidden="true"></i>Attribute List</a>
									</li>  
                                    <li><a href="{{ url('empAttributeAdd') }}"><i class="fa fa-plus-square-o" aria-hidden="true"></i>Add Attribute</a></li>
									<li><a href="{{ url('empAttributeImport') }}"><i class="fa fa-gear fa-fw"></i>Attribute Import</a>
                                    </li>
							</ul>
							</li>
									<li>
										<a href="{{ url('manageDesignation') }}"><i class="fa fa-user fa-fw"></i>Manage Designation</a>
									</li>
                        </ul>
                    </div>
              
                    <div class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            Employee <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                             <li><a href="{{ url('listEmp') }}"><i class="fa fa-user fa-fw"></i> Employee List</a>
                            </li>
                            <li><a href="{{ url('addEmp') }}"><i class="fa fa-gear fa-fw"></i> Add Employee</a>
                            </li>
							<li><a href="{{ url('employeeAttendance') }}"><i class="fa fa-gear fa-fw"></i> Employee Attendance</a>
							</li>
							<li><a href="{{ url('importEmp') }}"><i class="fa fa-gear fa-fw"></i>Employee Import</a>
                            </li>
							<li><a href="{{ url('importEmpAttendance') }}"><i class="fa fa-gear fa-fw"></i>Employee Attendance Import</a>
                            </li>
							<li><a href="{{ url('employeeVisa') }}"><i class="fa fa-gear fa-fw"></i>Employee Visa Process</a>
                            </li>
							 <li><a href="{{ url('visaType') }}"><i class="fa fa-gear fa-fw"></i> Visa Type</a>
                             </li>
							 <li><a href="{{ url('visaStages') }}"><i class="fa fa-gear fa-fw"></i> Visa Stages</a>
                             </li>
							 <li><a href="{{ url('visaStagesTimeContraint') }}"><i class="fa fa-gear fa-fw"></i> Visa Stages Time Contraint</a>
                             </li>
							  <li><a href="{{ url('performanceSetting') }}"><i class="fa fa-user fa-fw"></i>Performance Details</a>
                            </li>
							<li><a href="{{ url('addPerformance') }}"><i class="fa fa-user fa-fw"></i>Add Performance</a>
                            
                            </li>
                        </ul>
                    </div>
                  
                    <div class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">
                            Recruitment <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
							<li><a href="{{ url('manageConsultancy') }}"><i class="fa fa-user fa-fw"></i>Manage Consultancy</a>
                            </li>
                            <li><a href="{{ url('addConsultancy') }}"><i class="fa fa-gear fa-fw"></i>Add Consultancy</a>
                            </li> 
							<li><a href="{{ url('resumeShortlisting') }}"><i class="fa fa-gear fa-fw"></i>Resume Shortlisting</a>
                            </li>	
							<li><a href="{{ url('shortlistedResume') }}"><i class="fa fa-gear fa-fw"></i>Shortlisted Resume</a>
                            </li>							
                        </ul>
                    </div>
					<!--div class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">
                            Recruiter <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
							<li><a href="{{ url('manageRecruiter') }}"><i class="fa fa-user fa-fw"></i>Manage Recruiter</a>
                            </li>	
							<li><a href="{{ url('manageDesignation') }}"><i class="fa fa-user fa-fw"></i>Manage Designation</a>
                            </li>	
							<li><a href="{{ url('manageCandidateStatus') }}"><i class="fa fa-user fa-fw"></i>Manage Candidate Status</a>
                            </li>	
							<li><a href="{{ url('manageStage') }}"><i class="fa fa-user fa-fw"></i>Manage Stage</a>
                            </li>							
                        </ul>
                    </div-->
					
                        
                        <div class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="javascript:void(0);">
                            Employee On-boarding <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
							<!--li><a href="{{ url('createOfferLetter') }}"><i class="fa fa-user fa-fw"></i>Manage Offer Letter</a>
                            </li-->
							<li><a href="{{ url('offerLetterList') }}"><i class="fa fa-user fa-fw"></i>Manage Offer Letter</a>
                            </li>
							 <li><a href="{{ url('manageSalaryStructure') }}"><i class="fa fa-user fa-fw"></i>Manage Salary Breakup</a>
                            </li>
							<li><a href="{{ url('manageIncentive') }}"><i class="fa fa-user fa-fw"></i>Manage Incentive Breakup</a>
                            </li>
                           				
                        </ul>
                    </div>
                        <div><a href="#">Employee Management</a></div>
                           
                </div>
                  </div>
                </div>
                                <button role="button" aria-label="Previous" class="glider-prev" id="cut-prev"><i class="fa fa-chevron-left"></i></button>
            <button role="button" aria-label="Next" class="glider-next" id="cut-next"><i class="fa fa-chevron-right"></i></button>
                        </div>
            
                <!-- /.navbar-top-links -->
</div>
            </nav>

            <div id="page-wrapper">
                <div class="container-fluid">
                @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif  
				@yield('content')
				</div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->

        </div>
        <!-- /#wrapper -->

        <!-- jQuery -->
        <script src="{{ asset('hrm/js/jquery.min.js')}}"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="{{ asset('hrm/js/bootstrap.min.js')}}"></script>

        <!-- Morris Charts JavaScript -->


        <!-- Custom Theme JavaScript -->

<script src="{{ asset('hrm/js/glider.min.js')}}"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment-with-locales.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js"></script>

        
        
        <script>$(document).ready(function() {
    $('#example').DataTable();
} );</script>
        
        
        

                <script>
            window.addEventListener('load',function(){
              var glider = new Glider(document.getElementById('glider-cut'), {
                slidesToScroll: 1,
                slidesToShow: 5.5,
                draggable: true,
                dots: '#frac-dots',
                arrows: {
                  prev: '#cut-prev',
                  next: '#cut-next'
                }
              });
            })
          </script>
        <script>
        (function () {
    // hold onto the drop down menu                                             
    var dropdownMenu;

    // and when you show it, move it to the body                                     
    $(window).on('show.bs.dropdown', function (e) {

        // grab the menu        
        dropdownMenu = $(e.target).find('.dropdown-user');

        // detach it and append it to the body
        $('body').append(dropdownMenu.detach());

        // grab the new offset position
        var eOffset = $(e.target).offset();

        // make sure to place it where it would normally go (this could be improved)
        dropdownMenu.css({
            'display': 'block',
                'top': eOffset.top + $(e.target).outerHeight(),
                'left': eOffset.left
        });
    });

    // and when you hide it, reattach the drop down, and hide it normally                                                   
    $(window).on('hide.bs.dropdown', function (e) {
        $(e.target).append(dropdownMenu.detach());
        dropdownMenu.hide();
    });
})();
        </script>
      <script>
   
                setTimeout(function(){
   $('.overlay-spinner').css("display", "none");
}, 1000);
          
          
        </script>
         <script type="text/javascript">
 $(function () {
   var bindDatePicker = function() {
		$(".date").datetimepicker({
        format:'YYYY-MM-DD',
			icons: {
				time: "fa fa-clock-o",
				date: "fa fa-calendar",
				up: "fa fa-arrow-up",
				down: "fa fa-arrow-down"
			}
		}).find('input:first').on("blur",function () {
			// check if the date is correct. We can accept dd-mm-yyyy and yyyy-mm-dd.
			// update the format if it's yyyy-mm-dd
			var date = parseDate($(this).val());

			if (! isValidDate(date)) {
				//create date based on momentjs (we have that)
				date = moment().format('YYYY-MM-DD');
			}

			$(this).val(date);
		});
	}
   
   var isValidDate = function(value, format) {
		format = format || false;
		// lets parse the date to the best of our knowledge
		if (format) {
			value = parseDate(value);
		}

		var timestamp = Date.parse(value);

		return isNaN(timestamp) == false;
   }
   
   var parseDate = function(value) {
		var m = value.match(/^(\d{1,2})(\/|-)?(\d{1,2})(\/|-)?(\d{4})$/);
		if (m)
			value = m[5] + '-' + ("00" + m[3]).slice(-2) + '-' + ("00" + m[1]).slice(-2);

		return value;
   }
   
   bindDatePicker();
 });
      </script>

    </body>
</html>
