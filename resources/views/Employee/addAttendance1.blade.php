@extends('layouts.hrmLayout')
@section('content')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet"/>
  <style>
.panel-body {overflow:auto;}
.dropdown-menu{    z-index: 999999;}        
.marked-leave .red, .marked-leave .blue, .marked-leave .green, .marked-leave .orange{width: 15px;
    height: 15px;
    display: inline-block;
    border-radius: 50%;
    position: relative;
    top: 1px;}
.marked-leave .red{    background: red;}
.marked-leave .blue{    background: blue;}
.marked-leave .green{    background: green;}
.marked-leave .orange{    background: orange;}
@-webkit-keyframes spin {
0% { -webkit-transform: rotate(0deg); }
100% { -webkit-transform: rotate(360deg); }}
@keyframes  spin {
0% { transform: rotate(0deg); }
100% { transform: rotate(360deg); }}
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
	  #errorPopup .modal-header{    background: red;
    color: white;
    text-align: center;
    font-size: 67px;
    padding: 0;}
	  #errorPopup .modal-title{    text-align: center;
    font-weight: bold;
    font-size: 33px;}
	  #errorPopup #errorTxt{    text-align: center;
    font-size: 21px;
    margin-top: 5px;}
	  #errorPopup .modal-footer{text-align: center;}
	  #errorPopup button{width: 150px;
    border-radius: 50px;
    padding: 7px;
    font-size: 18px;
    background: red;
    border: none;}
	  #errorPopup button:hover{color: #fff; border: none;}
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

.wrap-header {position: relative;width: 35%;z-index: 0;     background: #059ec7;}
.wrap-header:after {position: absolute;top: 0;left: 0;right: 0;bottom: 0;content: '';z-index: -1; }
  @media (max-width: 767.98px) {
.wrap-header {width: 100%;padding: 20px 0; } }

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
	  .container-custom.alwaysDisabled{pointer-events: none;}
	 
	  .container-custom.alwaysDisabled span{background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAAAECAYAAACp8Z5+AAAAIklEQVQIW2NkQAKrVq36zwjjgzhhYWGMYAEYB8RmROaABADeOQ8CXl/xfgAAAABJRU5ErkJggg==) repeat;
    background-color: #fff;
    border-color: #00af1d;}
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
padding: 10px; }
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
  -webkit-transition: all 0.2s ease-in;
  -o-transition: all 0.2s ease-in;
  transition: all 0.2s ease-in;
  position: relative;
  z-index: 0; }
 		
/* Create a custom checkbox */
			.container-custom{padding: 0px 12px 0px 0;}
	  .empExistClass .container-custom, .empExistClass .container-radio{ display: none;}
.container-custom .checkmark {
  position: absolute;
    top: 18px;
    left: 14px;
  height: 25px;
  width: 25px;
  background-color: #eee;border: 2px solid #2196F3;
	
}
	  .container-custom .checkmark.disabledCheck{border: 2px solid #eee;}

/* On mouse-over, add a grey background color */
.container-custom:hover input ~ .checkmark {
  background-color: #ccc;
}
	  .container-custom:hover input ~ .checkmark.disabledCheck {
background-color: #eee;border: 2px solid #eee;
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
    padding-left: 25px;position: relative;}
.container-custom .checkmark:after {
    left: 8px;
    top: 5px;
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
  top: -3px;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}
	  .container-radio:hover input ~ .checkmark.disabledCheck {
  background-color: #eee;   
}

/* On mouse-over, add a grey background color */
.container-radio:hover input ~ .checkmark {
  background-color: #ccc;
}
.container-radio input ~ .checkmark {border: 2px solid #2196F3}
	  .container-radio input ~ .checkmark.disabledCheck { border: 2px solid #eee;}
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
     top: 5px;
    left: 5px;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: white;
}
.empExistClass{    pointer-events: none;
    opacity: .4;}
    @media (prefers-reduced-motion: reduce) {
      tbody td:after {
        -webkit-transition: none;
        -o-transition: none;
        transition: none; } }



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
			.table .thead-dark th {
    color: #fff;
    background-color: #212529;
    border-color: #32383e;
}
			.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{padding: 2rem;}
			@media only screen and (max-width: 600px) {
				.elegant-calencar{    display: block !important;}
				tbody td:after{    width: 30px;
    height: 30px;}
				.attendance .btn{    margin-bottom: 10px;}
}
	  	.input-group-addon{background: transparent;
    position: absolute;
    width: 100%;
    height: 58%;
    border: none;
    z-index: 999999;
    top: 26px;}
	.input-group.date{    margin: 0;
    width: 100%;}
	.panel-body {
    min-height: auto;
}
	.panel-default{    float: left;
    width: 100%;}
	@media only screen and (max-width: 600px) {
.panel-body {
    min-height: 442px;
}
		.dataTables_wrapper{    overflow: scroll;}
		div.dataTables_wrapper div.dataTables_length label{    width: 100%;}
		div.dataTables_wrapper div.dataTables_filter{    text-align: left;}
}
#leavePopup .modal-header, #sandwichPopup .modal-header, #selectAllID .modal-header, #exampleModal .modal-header{    color: #059ec7;
    background-color: #daf6ff;
    border-color: #ddd;
    font-weight: bold;
    font-size: 21px;
    border-radius: 10px 10px 0px 0px;}
	 #leavePopup .modal-header h5, #sandwichPopup .modal-header h5, #selectAllID .modal-header h5, #exampleModal .modal-header h5 {    font-weight: bold;
    font-size: 20px;}
	  #selectAllID .modal-footer{    display: flow-root;}
	  #selectAllID .radio-section{    width: 49%;
    text-align: center;}
	  #selectAllID .radio-section input{    margin: 5px;
    position: relative;
    top: 2px;
    margin-left: 10px;}
	.errorSpan{
		
		color:red;
		font-weight:700;
	}
	  .disabledValue{
    opacity: .5;
    background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAAAECAYAAACp8Z5+AAAAIklEQVQIW2NkQAKrVq36zwjjgzhhYWGMYAEYB8RmROaABADeOQ8CXl/xfgAAAABJRU5ErkJggg==) repeat;
}
	  .validationError{    border-color: red;
    color: red;}
.marked-sandwich, .marked-present, .marked-leave, .not-marked, .marked-holiday, .marked-late{font-weight: bold;margin: 0 auto;display: block;text-align: center;}
	.marked-late{    background: brown;
    color: #fff;
    height: 30px;
    width: 30px;
    border-radius: 50%;
    padding: 6px;}
.marked-sandwich{ background: red;
    color: #fff;
    height: 30px;
    width: 30px;
    border-radius: 50%;
    padding: 6px;}
	  .panel-default>.panel-heading {
    color: #006985;
    font-size: 18px;
}
.marked-present{background: forestgreen;
    color: #fff;
    height: 30px;
    width: 30px;
    border-radius: 50%;
    padding: 6px;}
.marked-leave{ color: #a94442;}
.not-marked{ color: black;}
.marked-holiday{color: blue;}	
	  #overlay-spinner{    background: transparent;    top: 0;    left: 0;}
	  .overlay-spinner-two{z-index: 9999999;
    position: fixed;
    width: 100%;
    text-align: center;
    height: 100vh;}
	  .loader-two {
    border: 16px solid #fe8e0e;
    border-radius: 50%;
    border-top: 16px solid #3498db;
    width: 75px;
    height: 75px;
    -webkit-animation: spin 2s linear infinite;
    animation: spin 2s linear infinite;
    margin: 21% auto;
}
	  .btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}
	  .btn-primary:hover, .btn-primary:focus {
    color: #fff;
    background-color: #0069d9;
    border-color: #0062cc;
}
        </style>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<form action="{{ url('addEmployeeAttendancePost') }}" id="attendanceFrm" method="post" enctype="multipart/form-data">
@csrf
	<div class="overlay-spinner-two" id="overlay-spinner" style="display: none;">
<div class="loader-two"></div>
                </div>
<div class="container-fluid panel panel-default attendance">
		  <div class="panel-heading">
       Add Attendance Panel

  </div>
   <div class="panel-body bottom-block">
 
    <div class="row">

		<div class="col-md-12">			
				<div class="col-sm-3 form-group">
           
						<label for="exampleInputEmail1">Attendance Date From</label>
                        <input type="text" id="select_from" name="selectFrom"  placeholder="Choose Multiple Date" style="cursor: pointer;" autocomplete="off"> 
           
				</div>
				<div class="col-sm-3 form-group">
         
						<label for="exampleInputEmail1">Attendance Date To</label>
                        <input type="text" id="select_to" name="selectTo"  placeholder="Choose Multiple Date" style="cursor: pointer;" autocomplete="off"> 
       
				</div>

	<div class="form-group col-md-3">
	       <label for="exampleInputEmail1">Employee Department</label>
                        <select name="dept_id" id="deptId" class="selectpicker">
							<option value="">Select Employee Department</option>
							<option value="all">All</option>
							@foreach($departmentMod as $_department)
							
							@if($_department->department_name != 'NONE')
								<option value="{{ $_department->id }}">{{ $_department->department_name }}</option>
							@endif
							@endforeach
						</select>   
    </div>
				<div class="form-group col-md-1">
					   <label for="exampleInputEmail1"></label>
					<a href="javascript:void(0);" title="Edit" class="btn btn-primary" style="width: 100%;padding: 5px 12px;" onclick="empajaxshow();"><i class="fa fa-arrow-circle-o-right" aria-hidden="true" style="margin-right: 5px"></i> Go</a>
			    </div>
			
			<div class="form-group col-md-2">
					   <label for="exampleInputEmail1"></label>
					<a href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal" class="btn btn-success" style="width: 100%;padding: 5px 12px;"><i class="fa fa-check-square-o" aria-hidden="true" style="margin-right: 5px"></i> Mark as Holiday</a>
		

			</div>
			
			
			
			
			
		
		</div>
    </div>
	    <div class="row">
<div class="col-md-12">


	
	
   
	
	
							
		</div>
    </div>
	
	
	



</div> 
				</div>	
					<div class="container-fluid panel panel-default attendance">

						
  <div class="panel-heading">
       Attendance

  </div>
   <div class="panel-body bottom-block">
 
    <div class="row" id="empL">
			
		
    </div>
	
	
	
	
	
	    <div class="row" style="display:none;" id="finalBtn">
<div class="col-md-12">

	<div class="col-md-8">	</div>
	
	<div class="col-md-2">	
               
								
					
								
                           <a href="{{ url('employeeAttendance') }}" title="Edit" class="btn btn-danger" style="width: 100%;"><i class="fa fa-times" aria-hidden="true" style="margin-right: 5px"></i> Cancel</a>
								</div>	
			<div class="col-md-2">	
               
								
					
								
                           <a href="javascript:void(0);" title="Edit" class="btn btn-success" style="width: 100%;" id="markAttendanceID" onclick="markAttendance();"><i class="fa fa-check-square-o" aria-hidden="true" style="margin-right: 5px"></i> Mark Attendance</a>
								</div>
   
	
	
							
		</div>
    </div>
	
	
	



</div> 




</div>
					

 

</form>
<style>
/* Style inputs, select elements and textareas */
input[type=text], select, textarea{width: 100%;
    padding: 8px;
    border: 2px solid #059ec7;
    border-radius: 4px;
    box-sizing: border-box;
    resize: vertical;}
	.form-group label {
    background: #fff;
    position: relative;
    top: 10px;
    right: -8px;
    padding: 0px 13px;
}
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
<?php
$holyhtml = '[';
$indexH =0;
foreach($holidayList as $_h)
{
	if(count($holidayList)-1 != $indexH)
	$holyhtml .= '"'.$_h.'",';
	else
	$holyhtml .= '"'.$_h.'"';
$indexH++;
}
$holyhtml .= ']';

?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
		
		<script>
		
		var datesForDisable = <?php echo $holyhtml;?>

		var FromEndDate = new Date();

		$("#select_from").datepicker({
			format: 'dd-mm-yyyy',
			inline: false,
			lang: 'en',
			step: 5,
			multidate: 1,
			closeOnDateSelect: true,
			daysOfWeekDisabled: [0],
			datesDisabled: datesForDisable,
			 todayHighlight: true,
			 endDate: FromEndDate,
			 autoclose:true
	
});


$("#select_to").datepicker({
			format: 'dd-mm-yyyy',
			inline: false,
			lang: 'en',
			step: 5,
			multidate: 1,
			closeOnDateSelect: true,
			daysOfWeekDisabled: [0],
			datesDisabled: datesForDisable,
			 todayHighlight: true,
			 endDate: FromEndDate,
			  autoclose:true
	
});
			

function empajaxshow()
{
	var deptId = jQuery("#deptId").val();
	var selectfrom = jQuery("#select_from").val();
	
	var selectfromNew = selectfrom.split("-").reverse().join("-");
	
	var selectto = jQuery("#select_to").val();
	
	
	var selecttoNew = selectto.split("-").reverse().join("-");
	var selectfromSet = new Date(selectfromNew);
	var selecttoSet = new Date(selecttoNew);
	
	
			
	jQuery("#finalBtn").hide();
	if( deptId == '')
	{
		jQuery("#errorTxt").html("Please select department to proceed.");
		jQuery('#errorPopup').modal('show'); 
	}
	else if(selectfrom == '')
	{
		jQuery("#errorTxt").html("Choose Attendance Date range to proceed.");
		jQuery('#errorPopup').modal('show');
	}
	else if(selectto == '')
	{
		jQuery("#errorTxt").html("Choose Attendance Date range to proceed.");
		jQuery('#errorPopup').modal('show');
	}
	else if(selectfromSet > selecttoSet)
	{
		jQuery("#errorTxt").html("Kindly Select proper date range.From date should be lesser than to date.");
		
		jQuery('#errorPopup').modal('show');
	}
	else
	{
		jQuery("#overlay-spinner").show();
						 $.ajax({
							type: "GET",
							url: "{{url('empajaxlistNew')}}/"+deptId+"/"+selectfrom+"/"+selectto,
							
							success: function(response){
								
								 jQuery('#empL').html(response);
								jQuery('#empL').fadeIn(1000);
								jQuery("#finalBtn").fadeIn(1000); 
								jQuery("#selectEmp").val(''); 
								jQuery("#overlay-spinner").hide();
							}
						}); 
	}
}
function checkboxAllEmp()
{
	if(jQuery("#emp_all").prop("checked"))
	{
		
		var allIds = jQuery('#allEmpId').val();
		var allidArray = allIds.split(",");
		var countDateRange = jQuery("#countDateRange").val();
		for(j=0;j<allidArray.length;j++)
		{
			var eid = allidArray[j];
			
			jQuery("#e_"+eid).prop("checked",true);
			
			for(i=0;i<countDateRange;i++)
				{
				jQuery("#makeAttend_"+i+'_'+eid).attr("disabled",false);
				jQuery("#date_"+i+'_'+eid).attr("disabled",false);
				jQuery("#makeAttend_"+i+'_'+eid).removeClass("disabledValue");
				jQuery("#leaveType_"+i+"_"+eid).attr("disabled",false);
				jQuery("#makeAttend_"+i+'_'+eid).removeClass("validationError");
				}
				
				jQuery("#selectAll_"+eid).attr("disabled",false);
				jQuery("#sandwich_"+eid).attr("disabled",false);
				jQuery("#selectAll_"+eid).removeClass("disabledValue");
				jQuery("#sandwich_"+eid).removeClass("disabledValue");
					
				
				var selectEmpTxt = jQuery("#selectEmp").val();
				var selectEmpNew = '';
				if(selectEmpTxt == '')
				{
					selectEmpNew = eid;
				}
				else
				{
					selectEmpNew = selectEmpTxt+','+eid;
				}
				jQuery("#selectEmp").val(selectEmpNew);
			
		}
		
		
		
	}
	else
	{
		var allIds = jQuery('#allEmpId').val();
		var allidArray = allIds.split(",");
		var countDateRange = jQuery("#countDateRange").val();
		for(j=0;j<allidArray.length;j++)
		{
			eid = allidArray[j];
			jQuery("#e_"+eid).prop("checked",false);
			
			for(i=0;i<countDateRange;i++)
				{
					
				jQuery("#makeAttend_"+i+'_'+eid).attr("disabled",true);
				jQuery("#date_"+i+'_'+eid).attr("disabled",true);
				jQuery("#makeAttend_"+i+'_'+eid).addClass("disabledValue");
				jQuery("#leaveType_"+i+"_"+eid).attr("disabled",true);
				jQuery("#makeAttend_"+i+'_'+eid).removeClass("validationError");
				}
				jQuery("#selectAll_"+eid).attr("disabled",true);
				jQuery("#sandwich_"+eid).attr("disabled",true);
				jQuery("#selectAll_"+eid).addClass("disabledValue");
				jQuery("#sandwich_"+eid).addClass("disabledValue");
				
				
				
				var selectEmpNew = '';
			
				jQuery("#selectEmp").val(selectEmpNew);
			
		}
	}
}

function checkboxPresentEmp()
{
	if(jQuery("#emp_present").prop("checked"))
	{
		jQuery('.presentEmpCheckbox:enabled').prop("checked",true);
	}
	else
	{
		jQuery('.presentEmpCheckbox').prop("checked",false);
	}
}


function checkboxAbsentEmp()
{
	if(jQuery("#emp_absent").prop("checked"))
	{
		jQuery('.absentEmpCheckbox:enabled').prop("checked",true);
	}
	else
	{
		jQuery('.absentEmpCheckbox').prop("checked",false);
	}
}

function checkboxleaveEmp()
{
	if(jQuery("#emp_leave").prop("checked"))
	{
		jQuery('.leaveEmpCheckbox:enabled').prop("checked",true);
	}
	else
	{
		jQuery('.leaveEmpCheckbox').prop("checked",false);
	}
}
function markAttendance()
{
	jQuery("#markAttendanceID").attr("disabled",true);
	var deptId = jQuery("#deptId").val();
	var select_from = jQuery("#select_from").val();
	var select_to = jQuery("#select_to").val();
    var selectEmp = jQuery("#selectEmp").val();
	if(deptId == '')
	{
		
		jQuery("#errorTxt").html("Please select department to proceed.");
		jQuery('#errorPopup').modal('show');
		jQuery("#markAttendanceID").attr("disabled",false);
	}
	else if(select_from == '')
	{
		
		jQuery("#errorTxt").html("please select attendance range to proceed.");
		jQuery('#errorPopup').modal('show');
		jQuery("#markAttendanceID").attr("disabled",false);
	}
	
	else if(select_to == '')
	{
		
		jQuery("#errorTxt").html("please select attendance range to proceed.");
		jQuery('#errorPopup').modal('show');
		jQuery("#markAttendanceID").attr("disabled",false);
	}
	else if(selectEmp == '')
	{
		
		jQuery("#errorTxt").html("please choose any employee to proceed.");
		jQuery('#errorPopup').modal('show');
		jQuery("#markAttendanceID").attr("disabled",false);
	}
	else
	{
		
		
		if(checkInnerValidationAsPerEmployee())
		{
			document.getElementById("attendanceFrm").submit();
		}
		else
		{
			jQuery("#markAttendanceID").attr("disabled",false);
		}
	}
	
}

function checkInnerValidationAsPerEmployee()
{
	var indexCount = jQuery('#countDateRange').val();
	var selectEmpTxt = jQuery("#selectEmp").val();
		var selectEmpTxtArray = selectEmpTxt.split(",");
		var checkValidation = true;
		for(i=0;i<selectEmpTxtArray.length;i++)
		{
			for(j=0;j<indexCount;j++)
			{
				var MarkAttendValue = jQuery("#makeAttend_"+j+"_"+selectEmpTxtArray[i]).val();
				if(MarkAttendValue == '')
				{
					checkValidation = false;
					jQuery("#makeAttend_"+j+"_"+selectEmpTxtArray[i]).addClass("validationError");
				}
			}
		}
		return checkValidation;
}

function empCheckbehave(eid,listcount)
{
	
	if(jQuery("#e_"+eid).prop("checked"))
	{
		for(i=0;i<listcount;i++)
		{
		jQuery("#makeAttend_"+i+'_'+eid).attr("disabled",false);
		jQuery("#date_"+i+'_'+eid).attr("disabled",false);
		jQuery("#makeAttend_"+i+'_'+eid).removeClass("disabledValue");
		jQuery("#leaveType_"+i+"_"+eid).attr("disabled",false);
		jQuery("#makeAttend_"+i+'_'+eid).removeClass("validationError");
		
		}
		jQuery("#selectAll_"+eid).attr("disabled",false);
		jQuery("#sandwich_"+eid).attr("disabled",false);
		jQuery("#selectAll_"+eid).removeClass("disabledValue");
		jQuery("#sandwich_"+eid).removeClass("disabledValue");
			
		
		var selectEmpTxt = jQuery("#selectEmp").val();
		var selectEmpNew = '';
		if(selectEmpTxt == '')
		{
			selectEmpNew = eid;
		}
		else
		{
			selectEmpNew = selectEmpTxt+','+eid;
		}
		jQuery("#selectEmp").val(selectEmpNew);
	}
	else
	{
		for(i=0;i<listcount;i++)
		{
		jQuery("#makeAttend_"+i+'_'+eid).attr("disabled",true);
		jQuery("#date_"+i+'_'+eid).attr("disabled",true);
		jQuery("#makeAttend_"+i+'_'+eid).addClass("disabledValue");
		jQuery("#leaveType_"+i+"_"+eid).attr("disabled",true);
		jQuery("#makeAttend_"+i+'_'+eid).removeClass("validationError");
		}
		jQuery("#selectAll_"+eid).attr("disabled",true);
		jQuery("#sandwich_"+eid).attr("disabled",true);
		jQuery("#selectAll_"+eid).addClass("disabledValue");
		jQuery("#sandwich_"+eid).addClass("disabledValue");
		
		
		var selectEmpTxt = jQuery("#selectEmp").val();
		var selectEmpTxtArray = selectEmpTxt.split(",");
		var selectEmpNew = '';
		for(i=0;i<selectEmpTxtArray.length;i++)
		{
			if(parseInt(eid) != parseInt(selectEmpTxtArray[i]))
			{
				if(parseInt(i) == parseInt(0))
				{
					selectEmpNew = selectEmpTxtArray[i];
				}
				else
				{
					selectEmpNew = selectEmpNew+','+selectEmpTxtArray[i];
				}
			}
		}
		jQuery("#selectEmp").val(selectEmpNew);
		/*jQuery("#emp_present").attr("disabled",true);
		jQuery("#emp_span_present").addClass("disabledCheck");
		
		jQuery("#emp_absent").attr("disabled",true);
		jQuery("#emp_span_absent").addClass("disabledCheck");
		
		jQuery("#emp_leave").attr("disabled",true);
		jQuery("#emp_span_leave").addClass("disabledCheck");*/
	}
	
}

function markAsHoliday()
{
	var holidayDate = jQuery("#holiday_date").val();
	
	if(holidayDate == '')
	{
		 alert("please select any Attendance date to proceed.");
	}
    else
	{
		if (confirm('Remember, selected date marked as holiday for all employee of all department.')) {
			window.location.href= "{{url('markAsHolidaySet')}}/"+holidayDate;
		} else {
			return 0;
		}
	}
}

function showLeavePopup(eid,index)
{
	jQuery("#makeAttend_"+index+"_"+eid).removeClass("validationError");
	const monthNames = ["January", "February", "March", "April", "May", "June",
  "July", "August", "September", "October", "November", "December"
];
	jQuery('#leavePopup').modal('hide'); 
	var selectedVal = jQuery("#makeAttend_"+index+"_"+eid).val();
	if(selectedVal == 'leave')
	{
		var datetxt = jQuery("#date_"+index+'_'+eid).val();
		var datetxtNew = datetxt.split("-").reverse().join("-");
		var dateObj = new Date(datetxtNew);
		
		jQuery("#selectedIndex").val(index);
		jQuery("#selectedEmp").val(eid);
		var monthName = monthNames[dateObj.getMonth()];
		var dateName = dateObj.getDate();
		var dateListTxt = dateName+' '+monthName;
		jQuery("#titleContent").html(dateListTxt+" Leave Selection Popup");
		jQuery('#leavePopup').modal('show'); 
	}
	
}

function applySandwich(eid)
{
	jQuery('#sandwichPopup').modal('show'); 
	jQuery("#selectedEmp").val(eid);
}
function selectAlldays(eid)
{
	
	jQuery('#selectAllP').prop('checked',true);
	jQuery('#leaveTypeSelectAll').hide();

		jQuery("#selectedEmp").val(eid);
		jQuery('#selectAllID').modal('show');
	
}
		</script> 
		
		<input type="hidden" id="selectEmp" value=""/>
		
		
<div class="modal" tabindex="-1" role="dialog" id="errorPopup">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
   <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>
      </div>
     <div class="modal-body">
		  <h5 class="modal-title">Error</h5>
        <p id="errorTxt"></p>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>



<div class="modal" tabindex="-1" role="dialog" id="leavePopup">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
   <h5 class="modal-title" id="titleContent"></h5>
      </div>
      
	   <div class="modal-body">
		 <span id="errorSpan" class="errorSpan" style="display:none;"></span>
        <p>
		<label>Select Leave type</label>
		<select class="selectL" id="selectLeaveType" onchange="resetErrorSpan();">
			<option value="">Select Lead Type</option>
			<option value="casual_leave">Casual leaves</option>
			<option value="annual_leave">Annual leave</option>
			<option value="sick_leave">Sick leave</option>
			<option value="public_holiday">Public holiday</option>
			<option value="emergency_leave">Emergency leave</option>
			<option value="half_day">Half Day</option>
		</select>
		
		</p>
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-primary" onclick="applyLeave();">Apply</button>
        <button type="button" class="btn btn-primary" onclick="cancelLeavePopup();">Cancel</button>
      </div>
    </div>
  </div>
</div>

<script>

function cancelLeavePopup()
{

	var index = jQuery("#selectedIndex").val();
	var eid =	jQuery("#selectedEmp").val();
	jQuery("#makeAttend_"+index+"_"+eid).val('');
	jQuery("#leavePopup").modal('hide'); 
}
function applyLeave()
{
	jQuery("#errorSpan").hide();
	var selectedLT = jQuery("#selectLeaveType").val();
	if(selectedLT == '')
	{
		jQuery("#errorSpan").html("Please select leave type to proceed.");
		jQuery("#errorSpan").fadeIn(1000);
	}
	else
	{
			var index = jQuery("#selectedIndex").val();
			var eid =	jQuery("#selectedEmp").val();
			jQuery("#leaveType_"+index+"_"+eid).val(selectedLT);
			jQuery("#leavePopup").modal('hide'); 
	}
}

function resetErrorSpan()
{
	jQuery("#errorSpan").hide();
}
</script>
 
<div class="modal" tabindex="-1" role="dialog" id="sandwichPopup">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
   <h5 class="modal-title">Sandwich rule for rahul</h5>
      </div>
      
	   <div class="modal-body col-md-12">
			<span id="errorSandwich" class="errorSpan" style="display:none;"></span>
				<div class="col-sm-6 form-group">
           
						<label for="select_from_pop">Attendance Date From</label>
                       <input type="text" id="select_from_pop" name="selectFromPopup" placeholder="Choose Multiple Date" style="cursor: pointer;"> 
           
				</div>
				<div class="col-sm-6 form-group">
         
						<label for="select_to_pop">Attendance Date To</label>
                        <input type="text" id="select_to_pop" name="selectToPopup" placeholder="Choose Multiple Date" style="cursor: pointer;"> 
       
				</div>


        
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-primary" Onclick="applySandwichRules();">Apply</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>



<div class="modal" tabindex="-1" role="dialog" id="selectAllID">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
   <h5 class="modal-title">Select All Popup</h5>
      </div>
      
	   <div class="modal-body col-md-12">
				<span id="errorSpan" class="errorSpan" style="display:none;"></span>
				<label class="radio-section">Present<input type="radio" name="presentRadio" id="selectAllP" onclick="selectALLType('present');" checked/></label>
				<label class="radio-section">Leave<input type="radio" name="presentRadio" id="selectAllL" onclick="selectALLType('leave');"/></label>
				 <p id="leaveTypeSelectAll" style="display:none">
					<label>Select Leave type</label>
					<select class="selectL" id="leadtype_selectAll">
					
						<option value="">Select Lead Type</option>
						<option value="casual_leave">Casual leaves</option>
						<option value="annual_leave">Annual leave</option>
						<option value="sick_leave">Sick leave</option>
						<option value="public_holiday">Public holiday</option>
						<option value="emergency_leave">Emergency leave</option>
						<option value="half_day">Half Day</option>
					</select>
		
				 </p>

        
      </div>
      <div class="modal-footer">
         <button type="button" class="btn btn-primary" onclick="selectAllApply();">Apply</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" role="dialog" id="exampleModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Mark as Holiday</h5>
   
      </div>
   <div class="modal-body col-md-12">
			<span id="errorSandwich" class="errorSpan" style="display:none;"></span>
				<div class="col-sm-6 form-group">
           
						<label for="holiday_date">Select Date for Holiday</label>
                       <input type="text" id="holiday_date"  placeholder="Choose Holiday Date" style="cursor: pointer;" autocomplete="off"> 
           
				</div>
      </div>
      <div class="modal-footer">
	<a href="javascript:void(0);" title="Edit" class="btn btn-primary" style="width: 18%;font-size: 17px;padding: 6px;" onclick="markAsHoliday();">Mark Apply</a>
	 <button type="button" class="btn btn-primary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>

<input type="hidden" id="leaveId" value=""/>
<input type="hidden" id="selectedIndex" />
<input type="hidden" id="selectedEmp" />
<script>
function selectALLType(lType)
{
	jQuery("#errorSandwich").html('');
	jQuery('#errorSpan').hide(); 
		if(lType == 'present')
		{
			jQuery("#leaveTypeSelectAll").hide();
		}
		else
		{
			jQuery("#leaveTypeSelectAll").fadeIn(1000);
		}
}

function selectAllApply()
{
	var eid = jQuery("#selectedEmp").val();
	var indexCount = jQuery("#countDateRange").val();
	if(jQuery("#selectAllP").prop("checked"))
	{
		for(index=0;index<indexCount;index++)
			{
				
				jQuery("#makeAttend_"+index+"_"+eid).val("present");
			}
			jQuery('#selectAllID').modal('hide');
	}
	else if(jQuery("#selectAllL").prop("checked"))
	{
		var leadtype_selectAll = jQuery("#leadtype_selectAll").val();
		if(leadtype_selectAll == '')
		{
			jQuery("#errorSpan").html("select leave type to proceed.");
			jQuery("#errorSpan").fadeIn(1000);
		}
		else
		{
		for(index=0;index<indexCount;index++)
			{
				jQuery("#makeAttend_"+index+"_"+eid).val("leave");
				jQuery("#leaveType_"+index+"_"+eid).val(leadtype_selectAll);
			}
		}
		jQuery('#selectAllID').modal('hide');
	}
	else
	{
		jQuery('#selectAllID').modal('hide');
		jQuery("#errorPopup").html("Issue with process! kindly refersh page and check again.");
		jQuery("#errorPopup").modal('show');
	}
}
$("#select_from_pop").datepicker({
			format: 'dd-mm-yyyy',
			inline: false,
			lang: 'en',
			step: 5,
			multidate: 1,
			closeOnDateSelect: true,
		
			
			 todayHighlight: true,
			 endDate: FromEndDate,
			 autoclose:true
	
});


$("#select_to_pop").datepicker({
			format: 'dd-mm-yyyy',
			inline: false,
			lang: 'en',
			step: 5,
			multidate: 1,
			closeOnDateSelect: true,
			 todayHighlight: true,
			 endDate: FromEndDate,
			  autoclose:true
	
});

$("#holiday_date").datepicker({
			format: 'dd-mm-yyyy',
			inline: false,
			lang: 'en',
			step: 5,
			multidate: 1,
			closeOnDateSelect: true,
			daysOfWeekDisabled: [0],
			datesDisabled: datesForDisable,
			 todayHighlight: true,
			 endDate: FromEndDate,
			  autoclose:true
	
});
function applySandwichRules()
{
	jQuery("#errorSandwich").html('');
	jQuery('#errorSpan').hide(); 
	var selectFromPopup = jQuery("#select_from_pop").val();
	var selectToPop = jQuery("#select_to_pop").val();
	
	var selectFromPopupNew = selectFromPopup.split("-").reverse().join("-");
	var selectToPopNew = selectToPop.split("-").reverse().join("-");
	
	var selectfromSet = new Date(selectFromPopupNew);
	var selecttoSet = new Date(selectToPopNew);
	var deptId = jQuery("#deptId").val();
	if( deptId == '')
		{
			jQuery("#errorSandwich").html("Please select department to proceed.");
			jQuery('#errorSandwich').fadeIn(1000); 
		}
	else if(selectFromPopup == '')
	{
		jQuery("#errorSandwich").html("Please select Attendance From to proceed.");
		jQuery('#errorSandwich').fadeIn(1000); 
	}
	else if(selectToPop == '')
	{
		jQuery("#errorSandwich").html("Please select Attendance TO to proceed.");
		jQuery('#errorSandwich').fadeIn(1000); 
	}
	else if(selectfromSet > selecttoSet)
	{
		jQuery("#errorSandwich").html("Kindly Select proper date range.From date should be lesser than to date.");
		
		jQuery('#errorSandwich').fadeIn(1000);
	}
	else
	{
		var eid =	jQuery("#selectedEmp").val();
		$.ajax({
						type: "GET",
						url: "{{ url('sandwichProgress') }}"+"/"+deptId+"/"+eid+"/"+selectFromPopup+"/"+selectToPop,
						
						success: function(response){
							window.location.reload();
						}
					});
	}
}
</script>
@stop