@extends('layouts.hrmLayout')
@section('content')
 <style>
.panel-body {overflow:auto;}
.dropdown-menu{    z-index: 999999;}        
.loader {border: 16px solid #fe8e0e;border-radius: 50%;border-top: 16px solid #3498db;width: 75px;height: 75px;-webkit-animation: spin 2s linear infinite; animation: spin 2s linear infinite;    margin: 21% auto;}
@-webkit-keyframes spin {
0% { -webkit-transform: rotate(0deg); }
100% { -webkit-transform: rotate(360deg); }}
@keyframes  spin {
0% { transform: rotate(0deg); }
100% { transform: rotate(360deg); }}
.overlay-spinner{z-index: 9999999;position: fixed;width: 100%;text-align: center;height: 100vh;background: #fff;}			
.col-lg-3.bottom-block-div {margin-bottom: 10px;padding: 0 5px;}
.block-inner {padding: 10px;border: 2px solid #ff9e04;border-radius: 5px;}
.block-top-heading, .block-top-complete {padding: 0;margin-top: 10px;margin-bottom: 10px;}
.block-top-heading h2 {margin: 0;font-family: Calibri;font-weight: bold;color: #ff9d02;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;max-width: 200px;font-size: 25px;}
.block-top-heading h3 {margin: 7px 0;font-family: Calibri;font-weight: bold;color: #666666;}
.newBtn{width: 100%; margin-bottom: 10px;}
.date{margin: 0; display: block;}
.panel-body {min-height: auto;}
.margin-right{margin-right: 15px;}
.float-right{float: right;}
			
	.d-md-flex {
    display: -webkit-box !important;
    display: -ms-flexbox !important;
    display: flex !important;
}		
.elegant-calencar {
  max-width: 700px;
  text-align: center;
  position: relative;
  margin: 0 auto;
  overflow: hidden;
  border-radius: 5px;
  -webkit-box-shadow: 20px 19px 27px -20px rgb(0 0 0 / 16%);
  -moz-box-shadow: 20px 19px 27px -20px rgb(0 0 0 / 16%);
      box-shadow: 20px 19px 27px -20px rgb(0 0 0 / 16%);
    border: 1px solid #f2f2f2; }

.wrap-header {
  position: relative;
  width: 35%;
  z-index: 0;     background: #059ec7;}
  .wrap-header:after {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    content: '';


    z-index: -1; }
  @media (max-width: 767.98px) {
    .wrap-header {
      width: 100%;
      padding: 20px 0; } }

#header {
  width: 100%;
  position: relative; }
  #header .pre-button, #header .next-button {
    cursor: pointer;
    width: 1em;
    height: 1em;
    line-height: 1em;
    border-radius: 50%;
    position: absolute;
    top: 50%;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    font-size: 18px; }
    #header .pre-button i, #header .next-button i {
      color: #fff; }

.pre-button {
  left: 5px; }

.next-button {
  right: 5px; }

.button-wrap {
  position: relative;
  padding: 10px 0; }
  .button-wrap .pre-button, .button-wrap .next-button {
    cursor: pointer;
    width: 1em;
    height: 1em;
    line-height: 1em;
    border-radius: 50%;
    position: absolute;
    top: 0;
    font-size: 18px; }
    .button-wrap .pre-button i, .button-wrap .next-button i {
      color: #cccccc; }
  .button-wrap .pre-button {
    left: 20px; }
  .button-wrap .next-button {
    right: 20px; }

.head-day {
  font-size: 9em;
  line-height: 1;
  color: #fff; }

.head-month {
  font-size: 2em;
  line-height: 1;
  color: #fff;
  font-size: 16px;
  text-transform: uppercase;
  font-weight: 300; }

.calendar-wrap {
  width: 65%;
  background: #fff;
padding: 30px 10px; }
  @media (max-width: 767.98px) {
    .calendar-wrap {
      width: 100%; } }

#calendar {
  width: 100%; }

#calendar tr {
  height: 3em; }

thead tr {
  color: #000;
  font-weight: 700; }

tbody tr {
  color: #000; }

tbody td {
  width: 14%;
  border-radius: 50%;
  cursor: pointer;
  -webkit-transition: all 0.2s ease-in;
  -o-transition: all 0.2s ease-in;
  transition: all 0.2s ease-in;
  position: relative;
  z-index: 0; }
  tbody td:after {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    bottom: 0;
    content: '';
    width: 40px;
    height: 40px;
    margin: 0 auto;
    -webkit-transform: translateY(-50%);
    -ms-transform: translateY(-50%);
    transform: translateY(-50%);
    border-radius: 50%;
    -webkit-transition: 0.3s;
    -o-transition: 0.3s;
    transition: 0.3s;
    z-index: -1; }
    @media (prefers-reduced-motion: reduce) {
      tbody td:after {
        -webkit-transition: none;
        -o-transition: none;
        transition: none; } }

tbody td:hover, .selected {
  color: #fff;
  border: none; }
  tbody td:hover:after, .selected:after {
    background: #2a3246; }
#today {
  color: #fff;    }
tbody td:active {
  -webkit-transform: scale(0.7);
  -ms-transform: scale(0.7);
  transform: scale(0.7); }


  #today:after {
    background: #059ec7; }

#disabled {
  cursor: default;
  background: #fff; }

#disabled:hover {
  background: #fff;
  color: #c9c9c9; }
  #disabled:hover:after {
    background: transparent; }

#reset {
  display: block;
  position: absolute;
  right: 0.5em;
  top: 0.5em;
  z-index: 999;
  color: rgba(255, 255, 255, 0.7);
  cursor: pointer;
  padding: 0 0.5em;
  border: 1px solid rgba(255, 255, 255, 0.4);
  border-radius: 4px;
  -webkit-transition: all 0.3s ease;
  -o-transition: all 0.3s ease;
  transition: all 0.3s ease;
  text-transform: uppercase;
  font-size: 11px; }

#reset:hover {
  color: #fff;
  border-color: #fff; }

#reset:active {
  -webkit-transform: scale(0.8);
  -ms-transform: scale(0.8);
  transform: scale(0.8); }
			.align-items-center {
    -webkit-box-align: center !important;
    -ms-flex-align: center !important;
    align-items: center !important;
}
			.d-flex {
    display: -webkit-box !important;
    display: -ms-flexbox !important;
    display: flex !important;
}
			.btn-secondary {
    color: #fff;
    background-color: #6c757d;
    border-color: #6c757d;
}
			.attendance .btn{    padding: 11px 12px;    font-size: 18px;}
			.attendance .btn:hover{color: #fff;}
			.form-check label{ color: #059ec7;
    border-color: #ddd;
    font-weight: bold;
    font-size: 18px;
    margin-top: 2px;
}
	.media-body label { color: #059ec7;
    border-color: #ddd;
    font-weight: bold;
    font-size: 14px;
    margin-top: 2px;    padding: 0;
		    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;display: block;
    margin-bottom: 5px;
}
			.card-header .media-body{padding-left: 15px;}
			.card-header{box-shadow: 0px 0px 7px 4px rgb(23 31 35 / 6%);    padding: 5px;}
			
/* Create a custom checkbox */
.container-custom .checkmark {
  position: absolute;
    top: 14px;
    left: 20px;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container-custom:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container-custom input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container-custom input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
			.container-radio{padding: 0px;
    padding-left: 25px;}
.container-custom .checkmark:after {
 left: 10px;
    top: 7px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
	/* Hide the browser's default radio button */
.container-radio input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.container-radio .checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container-radio:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container-radio input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container-radio input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container-radio .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
}
			.form-group.col-md-12.margin-class {
    padding: 0;
    padding-top: 0;
    height: 165px;
    overflow-y: scroll;
}
	 .select-emp{position: sticky;
    top: 0;
    margin: 0;
    padding-bottom: 10px;
    background-color: #fff;
    width: 100%;
    z-index: 9999;}
			.margin-class .col-md-4{margin-bottom: 20px;}
			@media only screen and (max-width: 600px) {
				.elegant-calencar{    display: block !important;}
				tbody td:after{    width: 30px;
    height: 30px;}
				.attendance .btn{    margin-bottom: 10px;}
}
		
        </style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<form action="{{ url('addEmployeeAttendancePost') }}" id="attendanceFrm" method="post" enctype="multipart/form-data">
	  
  <!-- <input type="hidden" name="_token" value="{{ csrf_token() }}"> -->	
@csrf
					
					<div class="container-fluid panel panel-default attendance">
		
						
  <div class="panel-heading">
       Attendance

  </div>
   <div class="panel-body bottom-block">
 
    <div class="row">
<div class="col-md-5">
	 
		<div class="form-group col-md-12">
<section class="ftco-section">
	
					<div class="elegant-calencar d-md-flex">
						<div class="wrap-header d-flex align-items-center img">
				      <p id="reset">Today</p>
			        <div id="header" class="p-0">
								<!-- <div class="pre-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-left"></i></div> -->
		            <div class="head-info">
		            	<div class="head-month"></div>
		                <div class="head-day"></div>
		            </div>
		            <!-- <div class="next-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></div> -->
			        </div>
			      </div>
			      <div class="calendar-wrap">
			      	<div class="w-100 button-wrap">
				      	<div class="pre-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-left"></i></div>
				      	<div class="next-button d-flex align-items-center justify-content-center"><i class="fa fa-chevron-right"></i></div>
			      	</div>
			        <table id="calendar">
		            <thead>
		                <tr>
	                    <th>Sun</th>
	                    <th>Mon</th>
	                    <th>Tue</th>
	                    <th>Wed</th>
	                    <th>Thu</th>
	                    <th>Fri</th>
	                    <th>Sat</th>
		                </tr>
		            </thead>
		            <tbody>
	                <tr>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                </tr>
	                <tr>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                </tr>
	                <tr>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                </tr>
	                <tr>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                </tr>
	                <tr>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                </tr>
	                <tr>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                  <td></td>
	                </tr>
		            </tbody>
			        </table>
			      </div>
			    </div>
			
	</section>
  </div>
</div>
		<div class="col-md-7">			
	<div class="form-group col-md-5">
	       <label for="exampleInputEmail1">Employee Department</label>
                        <select name="dept_id" id="deptId" class="selectpicker" >
							<option value="">Select Employee Department</option>
							<option value="all">All</option>
							@foreach($departmentMod as $_department)
							
							@if($_department->department_name != 'NONE')
								<option value="{{ $_department->id }}">{{ $_department->department_name }}</option>
							@endif
							@endforeach
						</select>
    </div>

	<!--div class="form-group col-md-5">
	       <label for="exampleInputEmail1">Employee Designation</label>
                        <select name="data[leadingd][category_id]" class="selectpicker">
								<option value="">Select Employee Designation</option>
								<option>A</option>
								<option>B</option>
								<option>C</option>
								<option>D</option>
								<option>E</option>
						</select>
	</div-->
				<div class="form-group col-md-2">
					   <label for="exampleInputEmail1"></label>
					<a href="javascript:void(0);" title="Edit" class="btn btn-primary" style="width: 100%;padding: 5px 12px;margin-top: 12px;" onclick="empajaxshow();">Go</a>
					
			</div>
			<div class="form-group col-md-4">
				<label for="exampleInputEmail1"></label>
			<a href="javascript:void(0);" title="Edit" class="btn btn-primary" style="width: 100%;padding: 5px 12px;margin-top: 12px;">Mark Holiday</a>
				</div>
			<div class="form-group col-md-12 margin-class" id="empL">
						
						
							
			</div>
			<div class="form-group col-md-12 d-flex" style="padding: 10px 40px;">
	
			<div class="form-check col-md-4">
<label class="container-radio">Present
  <input type="radio" checked="checked" name="attendance_value" value="P">
  <span class="checkmark"></span>
</label>
</div>
<div class="form-check col-md-4">
<label class="container-radio">Absent
  <input type="radio" name="attendance_value" value="A">
  <span class="checkmark"></span>
</label>
</div>
				<div class="form-check col-md-4">
<label class="container-radio">Leave
  <input type="radio" name="attendance_value" value="L">
  <span class="checkmark"></span>
</label>
</div>
			</div>
			
			
		<div class="col-md-6">	
               
								
					<input type="hidden" name="selecteddate" id="selectedDateByAdmin" value="<?php echo date('Y-m-d');?>">
								
                           <a href="javascript:void(0);" title="Edit" class="btn btn-secondary" style="width: 100%;">Cancel</a>
								</div>	
			<div class="col-md-6">	
               
								
					        
								
                           <a href="javascript:void(0);" title="Edit" class="btn btn-primary" style="width: 100%;" onclick="markAttendance();">Mark Attendance</a>
								</div>
			
		</div>
    </div>
	    <div class="row">
<div class="col-md-12">


	
	
   
	
	
							
		</div>
    </div>
	
	
	



</div> 




</div>
					

 </form>


<style>
/* Style inputs, select elements and textareas */
input[type=text], select, textarea{width: 100%;padding: 8px;border: 1px solid #ccc;border-radius: 4px;box-sizing: border-box;resize: vertical;}
.row{margin: 0;}
.panel {padding: 0;}
/* Style the label to display next to the inputs */
label {padding: 12px 12px 12px 0;display: inline-block;margin: 0;}
/* Style the submit button */
input[type=submit] {background-color: #04AA6D;color: white;padding: 12px 20px;border: none;border-radius: 4px;cursor: pointer;float: right;}
/* Floating column for labels: 25% width */
.col-25 {float: left;width: 25%;margin-top: 6px;}
/* Floating column for inputs: 75% width */
.col-75 {float: left;width: 75%;margin-top: 6px;}
/* Clear floats after the columns */
.row:after {content: "";display: table;clear: both;}
/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media  screen and (max-width: 600px) {
.col-25, .col-75, input[type=submit] {width: 100%;margin-top: 0;}} 
</style>
<script>
function empajaxshow()
{
	var deptId = jQuery("#deptId").val();
	if( deptId == '')
	{
		alert("Please select department to proceed.");
	}
	else
	{
						$.ajax({
							type: "GET",
							url: "{{url('empajaxlist')}}/"+deptId,
							
							success: function(response){
								jQuery('#empL').html(response);
								jQuery('#empL').fadeIn(1000);
							}
						});
	}
}
function markAttendance()
{
	var deptId = jQuery("#deptId").val();
	if(deptId == '')
	{
		alert("Please select department to proceed.");
	}
	else
	{
		document.getElementById("attendanceFrm").submit();
	}
	
}

function checkboxAllEmp()
{
	if(jQuery("#emp_all").prop("checked"))
	{
		jQuery('.selectedEmpCheckbox').prop("checked",true);
	}
	else
	{
		jQuery('.selectedEmpCheckbox').prop("checked",false);
	}
}
</script>             
  <script src="{{ asset('hrm/js/popper.js')}}"></script>
  <script src="{{ asset('hrm/js/main.js')}}"></script>  
@stop