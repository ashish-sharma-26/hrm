@extends('layouts.hrmLayout')
@section('content')

<!-- /.panel-body -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet"/>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<link href="https://api.spotserve.io/css/bootstrap-select.min.css" rel="stylesheet"/>




<?php
//echo "<pre>";
//print_r($data);

//exit;
$tbltd='';
?>
<style>
input[type=text], select, textarea {
    width: 100%;
    padding: 8px;
border: 2px solid #059ec7;
    border-radius: 4px;
    box-sizing: border-box;
    resize: vertical;
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
.marked-sandwich, .marked-present, .marked-leave, .not-marked, .marked-holiday, .marked-late{font-weight: bold;margin: 0 auto;display: block;text-align: center;}
	.marked-late{    background: brown;
    color: #fff;
    height: 30px;
    width: 30px;
    border-radius: 50%;
    padding: 6px;}
.marked-sandwich{background: red;
    color: #fff;
    height: 30px;
    width: 30px;
    border-radius: 50%;
    padding: 6px;}
.marked-present{ background: forestgreen;
    color: #fff;
    height: 30px;
    width: 30px;
    border-radius: 50%;
    padding: 6px;}
.marked-leave{ color: #a94442;white-space: nowrap;
    display: inline;
}
.not-marked{ color: black;}
.marked-holiday{background: blue;
    color: #fff;
    height: 30px;
    width: 30px;
    border-radius: 50%;
    padding: 6px;}	
	#errorPopup .modal-header{    padding: 5px;    background: red;}
		  #errorPopup .modal-header i{ 
    color: #fff;

    font-size: 20px;
float: left;
    padding: 8px 15px;}
	  #errorPopup .modal-title{
    font-weight: bold;
    font-size: 25px;color: #fff;}
	  #errorPopup #errorTxt{    text-align: center;
    font-size: 21px;
    margin-top: 5px; margin-bottom: 5px;}
	#errorPopup .modal-content{    overflow: hidden;}
	  #errorPopup .modal-footer{text-align: center;}
	  #errorPopup button{width: 150px;
    border-radius: 50px;
    padding: 7px;
    font-size: 18px;
    background: #006985;
    border: none;    color: #daf6ff;}
	#errorPopup .modal-body{    padding: 5px;}
	  #errorPopup button:hover{color: #fff; border: none;}
	.d-md-flex {
    display: -webkit-box !important;
    display: -ms-flexbox !important;
    display: flex !important;
}		
td{    vertical-align: middle !important;}
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
	.panel-body {
    overflow: visible;
}
	.bootstrap-select .btn:focus{    outline: none !important;background-color: #ffffff;}
	.form-control .selectpicker {    width: 100%;
    padding: 8px;
    border: 2px solid #059ec7;
    border-radius: 4px;
    box-sizing: border-box;
    resize: vertical;}
	.form-control .selectpicker:hover{background-color: #ffffff;}
	#example_wrapper .col-sm-12{    overflow-x: scroll;
  }

	table.dataTable thead .sorting:after{display: none;}
	table.dataTable thead>tr>th.sorting{    padding-right: 8px;white-space: nowrap;}
	table.dataTable thead .sorting, table.dataTable thead .sorting_asc, table.dataTable thead .sorting_desc, table.dataTable thead .sorting_asc_disabled, table.dataTable thead .sorting_desc_disabled {
    color: #fff;
    background-color: #212529;
    border-color: #32383e;
}
	table.table-bordered.dataTable th, table.table-bordered.dataTable td {
    padding: 15px 8px;
}
	.leave-approve a {    text-align: center;
    margin: 0 auto;
    background: green;
    color: #fff;
    font-weight: bold;
    padding: 10px;
    border-radius: 50px;}
	.leave-approve a:hover{text-decoration: none;}

	.dinamic{font-size: 20px;color: #000;}
	.button-design{    padding: 0;
    list-style: none;
    display: block;
    text-align: right;}
	.button-design li{    display: inline-block;
    margin: 0 10px;}
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
	.btn-dark {
    color: #fff;
    background-color: #343a40;
    border-color: #343a40;
}
	.btn-dark:hover, .btn-dark:focus {
    color: #fff;
    background-color: #23272b;
    border-color: #1d2124;
}
	.btn-info {
    color: #fff;
    background-color: #17a2b8;
    border-color: #17a2b8;
}
	.btn-info:hover, .btn-info:focus {
    color: #fff;
    background-color: #138496;
    border-color: #117a8b;
}
	.form-group label {    background: #fff;
    position: relative;
    top: 13px;
    right: -8px;
    padding: 0px 13px;    z-index: 99;}
	#example_wrapper svg{    width: 30px;
    height: 30px;}
	#example_wrapper svg g{    fill: red;}
			.dropdown-menu {
    z-index: 99 !important;
}
	#emp_txt span{    position: absolute;
    white-space: nowrap;
    right: -133px;
    top: 34px; z-index: 9;}
	#emp_txt span a{color: red;
    font-weight: bold;
    text-decoration: underline;   }
	.viewer{    border-bottom: 1px solid #ddd;
    margin-bottom: 15px;}
	.viewer ul{    list-style: none;
    padding: 0;
    display: block;
    text-align: center;}
	.viewer ul li{    display: inline-block;
    padding: 0 14px;
    font-weight: bold;
    border-right: 1px solid #ddd;}
	.viewer ul li:last-child{border-right: none;}
		@media only screen and (max-width: 600px) {
.panel-body {
    min-height: 442px;
}
			.viewer ul{    text-align: left;}
			.viewer ul li{    width: 49%;
    margin: 10px 0;
    font-size: 12px;}
		div.dataTables_wrapper div.dataTables_length label{    width: 100%;}
		div.dataTables_wrapper div.dataTables_filter{    text-align: left;}
			.button-design li{display: block;}
}
</style>

<div class="panel panel-default">
	<div class="panel-heading">
                                Employee Attendance List
                                    
                                </div>

                                <div class="panel-body">
								<form action="{{ url('exportAttendance') }}" id="exportattendancefrm" method="post" >
								@csrf
								<input type="hidden" name="empids" value="" id="empids">
								<input type="hidden" name="selectfromexport" value="" id="selectfromexport">
								<input type="hidden" name="selecttoexport" value="" id="selecttoexport">
								<input type="hidden" name="dept_idexport" value="" id="dept_idexport">
								</form>
								<form action="{{ url('appliedFilterOnAttendance') }}" id="attendanceapplied" method="post" enctype="multipart/form-data">
								@csrf
								  <div class="row">
								    <div class="col-lg-12">
										<div class="col-sm-4 form-group">
           
											<label for="exampleInputEmail1">Attendance Date From</label>
											<input type="text" id="selectAttendance_from" name="selectFrom"  placeholder="Choose Multiple Date" style="cursor: pointer;" value="{{ $selectFrom }}" autocomplete="off"> 
           
										</div>
										<div class="col-sm-4 form-group">
         
											<label for="exampleInputEmail1">Attendance Date To</label>
											<input type="text" id="selectAttendance_to" name="selectTo"  placeholder="Choose Multiple Date" style="cursor: pointer;" value="{{ $selectTo }}" autocomplete="off">        
										</div>
											<div class="form-group col-md-4" >
												<label>Select Department</label>
												<select name="dept_id" id="dept_id" class="selectpicker form-control" data-live-search="true"  >
													<option value="">Select Department</option>
													@foreach($departmentA as $deptValue=>$deptName)
													<option value="{{$deptValue}}" @if($dept == $deptValue) selected ="selected" @endif>{{$deptName}}</option>
													@endforeach
												</select>   
											</div>
										</div>
											<div class="col-lg-12">
											<div class="form-group col-md-4" id="emp_txt">
												<label>Enter Employee Id</label>
												<input type="text" id="emp_id" name="emp_id"  placeholder="Enter Employee Id" value="{{ $emp_id }}" autocomplete="off">
												<?php
													if(!empty($emp_id))
													{
												?>
												<span><a href="javascript:void(0)" onclick="removeEmpId();">Remove Employee Id</span>
												<?php
													}
												?>
												
											</div>
											<script>
												function removeEmpId()
												{
													jQuery('#emp_id').val("");
													searchStart();
												}
											</script>
												<div class="form-group col-md-8" style="padding-right: 0;    margin-top: 22px;">  
													<ul class="button-design">
												<li>
										
													<a href="javascript:void(0);" title="Edit" class="btn btn-dark" style="width: 100%;padding: 8px 12px;
    margin-top: 3px; font-weight: bold;" onclick="searchStart();"><i class="fa fa-search" aria-hidden="true" style="margin-right: 5px;"></i> Search</a></li>
												<li>
												
													<a href="{{ url('resetFAttendance')}}" title="Edit" class="btn btn-primary" style="width: 100%;padding: 8px 12px;
    margin-top: 3px; font-weight: bold;" ><i class="fa fa-filter" aria-hidden="true" style="margin-right: 5px;"></i> Reset Filter</a>
													</li>
												<li>
												
												<a class="btn btn-success" href="{{url('addAttendance')}}" role="button" style="width: 100%; padding: 8px 12px;
margin-top: 3px; font-weight: bold;"><i class="fa fa-plus-square-o" aria-hidden="true" style="margin-right: 5px;"></i> Add Attendance</a>
												</li>
												<li>
												
												<a class="btn btn-info" href="javascript:void(0);" role="button" style="width: 100%; padding: 8px 12px;margin-top: 3px; font-weight: bold;" onclick="exportEMP();"><i class="fa fa-share-square-o" aria-hidden="true" style="margin-right: 5px;"></i> Export Attendance Register</a>
												</li>
														</ul>
												
												
										</div>
												</div>
										
									</div>
											
								   </form>
									
									
                                    
                                    <!-- /.row -->
                                </div>
</div>
<div class="panel panel-default">
	<div class="panel-heading">
                       Attendance Register<span class="dinamic"> @if(!empty($departmentName)) ({{ $departmentName }}) @endif	</span>						
                                </div>

								  
                                        <!-- /.col-lg-4 (nested) -->
<div class="col-lg-12" style="padding: 15px;">
		@if($checkSelectFilter ==0)
			<p> Click search after selecting Attendance range and department. </p>
		@else
	<div class="scroll">
		<div class="viewer">
		  <ul>
			<li style="color: green">P - Present</li>
			<li style="color: red">A- Absent</li>
			<li style="color: #a94442">L - Late</li>
			<li style="color: red">S - Sandwich</li>
			<li style="color: orange">CL - Casual leaves</li>
			<li style="color: orange">AL - Annual leave</li>
			<li style="color: orange">SL - Sick leave</li>
			<li style="blue">PH - Public holiday</li>
			<li style="color: orange">EL - Emergency leave</li>
			<li style="color: orange">HD - Half Day</li>
			<li style="blue">H - Holiday</li>
			</ul>
		</div>
			<table id="example" class="table table-striped table-bordered" style="width:100%">
				<thead class="thead-dark">
					<tr>
						<th><input type="checkbox" id="mainCheckEMP" onclick="selectedALLEMP();"></th>
						<th>EMP. ID.</th>
						<th>Name</th>
						<th>Mobile</th>
						 @foreach($DateRange as $_date)
						  <th>{{ date("d M",strtotime($_date) )}}</th>
						 @endforeach
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
				
				<?php $i=1; ?>
				@foreach($empdetailsListing as $_emp)
					 
						<tr>
						 <td>
						<input type="checkbox" id="select_{{$_emp->emp_id}}" class="selectedEMP" value="{{$_emp->id}}"></td>
						<td> {{ $_emp->emp_id}}</td>
						 <td style="white-space: nowrap;">{{$_emp->first_name}} {{$_emp->middle_name}} {{$_emp->last_name}}</td>
						 <td><x-Employee.EmpMobile eId="{{$_emp->id}}">
						  </x-Employee.EmpMobile></td>
						  @foreach($DateRange as $_date)
						
								  <td>
								  @if(in_array($_date,$holidayList))
									  <span class="marked-holiday"> H </span>
								  @else	  
										  <?php
												
												$dayName =  date('D', strtotime($_date)); 
										  
										  ?>
										  @if($dayName == 'Sun' && $existanceCheck[$_emp->id][$_date]['allowAttendance'] == 'Yes')
												<span class="marked-holiday"> H </span>
										  @else
												  @if($existanceCheck[$_emp->id][$_date]['allowAttendance'] == 'Yes')
														<span class="not-marked">
<svg version="1.0" xmlns="http://www.w3.org/2000/svg"
 width="512.000000pt" height="512.000000pt" viewBox="0 0 512.000000 512.000000"
 preserveAspectRatio="xMidYMid meet">

<g transform="translate(0.000000,512.000000) scale(0.100000,-0.100000)"
fill="#000000" stroke="none">
<path d="M2395 5064 c-259 -26 -416 -58 -625 -127 -180 -59 -433 -182 -585
-283 -617 -410 -1015 -1049 -1116 -1794 -17 -122 -17 -478 0 -600 64 -472 249
-906 539 -1270 398 -499 994 -831 1652 -921 140 -19 487 -17 635 5 452 66 880
251 1235 534 120 95 283 259 382 382 240 300 425 688 501 1055 41 196 51 299
51 515 0 298 -34 509 -127 790 -119 362 -333 707 -606 981 -385 385 -894 638
-1431 714 -111 15 -423 27 -505 19z m405 -534 c448 -56 852 -252 1165 -565
317 -317 509 -717 566 -1178 17 -144 7 -443 -20 -579 -43 -215 -116 -416 -216
-598 -66 -120 -68 -121 -107 -84 -18 17 -256 233 -528 479 -272 246 -506 458
-520 471 l-25 24 390 390 390 390 -175 175 -175 175 -397 -397 c-312 -312
-401 -396 -412 -388 -38 26 -1395 1261 -1395 1270 -1 13 147 117 258 181 180
103 457 196 678 228 118 17 406 20 523 6z m-1099 -1410 l699 -634 -142 -143
-143 -143 -275 275 -275 275 -175 -175 -175 -175 450 -450 450 -450 326 326
327 326 571 -518 572 -518 -38 -33 c-283 -247 -596 -401 -961 -474 -152 -30
-453 -38 -612 -15 -895 130 -1581 813 -1704 1695 -20 141 -20 403 -1 539 32
226 98 430 206 642 73 141 173 294 190 288 5 -2 325 -289 710 -638z m1969 275
l115 -115 -365 -365 -364 -364 -105 96 c-58 53 -115 105 -125 114 -19 18 -10
28 345 384 201 201 370 365 375 365 5 0 61 -52 124 -115z m-1555 -1269 c33 0
48 13 190 154 l153 153 126 -114 126 -114 -297 -297 -298 -298 -395 395 -395
395 120 120 120 120 257 -257 c240 -240 259 -257 293 -257z"/>
</g>
</svg>
</span>
												  @else
														@if($existanceCheck[$_emp->id][$_date]['attendanceMark'] == 'P')
															<span class="marked-present">{{ $existanceCheck[$_emp->id][$_date]['attendanceMark'] }}</span>
														@elseif($existanceCheck[$_emp->id][$_date]['attendanceMark'] == 'S')
															<span class="marked-sandwich">{{ $existanceCheck[$_emp->id][$_date]['attendanceMark'] }}</span>
															
															@elseif($existanceCheck[$_emp->id][$_date]['attendanceMark'] == 'A')
															<span class="marked-sandwich">{{ $existanceCheck[$_emp->id][$_date]['attendanceMark'] }}</span>
															
															
															@elseif($existanceCheck[$_emp->id][$_date]['attendanceMark'] == 'L')
															<span class="marked-late">{{ $existanceCheck[$_emp->id][$_date]['attendanceMark'] }}</span>
														@elseif($existanceCheck[$_emp->id][$_date]['attendanceMark'] == 'Leave')
																<span class="marked-leave">
																@if($existanceCheck[$_emp->id][$_date]['leave_approved'] == 1)
																<span class="orange"></span>
																@elseif($existanceCheck[$_emp->id][$_date]['leave_approved'] == 2)
																<span class="green"></span>
																@else
																	<span class="red"></span>
																	@endif
																{{ $existanceCheck[$_emp->id][$_date]['attendanceLeaveType'] }}</span>
														@else
															<span class="marked-holiday">{{ $existanceCheck[$_emp->id][$_date]['attendanceMark'] }}</span>
														@endif
												  @endif
										  @endif
								  @endif
								  </td>
						 @endforeach
						<td class="text-center leave-approve">
						<a href="javascript:void(0);" onclick="leaveApproval('{{$_emp->id}}');">Approval</a>
						</td>
						</tr>
					   
					   
						 
					<?php $i++; ?>
					@endforeach
				   
				  
				</tbody>
			   
			</table>
		</div>
	@endif
</div>
                                        <!-- /.col-lg-8 (nested) -->
                        
</div></div>

<script>
var FromEndDate = new Date();
$("#selectAttendance_from").datepicker({
			format: 'dd-mm-yyyy',
			inline: false,
			lang: 'en',
			step: 5,
			multidate: 1,
			closeOnDateSelect: true,
			daysOfWeekDisabled: [0],
			 todayHighlight: true,
			 endDate: FromEndDate,
			 autoclose:true
	
});


$("#selectAttendance_to").datepicker({
			format: 'dd-mm-yyyy',
			inline: false,
			lang: 'en',
			step: 5,
			multidate: 1,
			closeOnDateSelect: true,
			daysOfWeekDisabled: [0],
			 todayHighlight: true,
			 endDate: FromEndDate,
			  autoclose:true
	
});
			

function searchStart()
{
	var selectAttendance_from = jQuery("#selectAttendance_from").val();
	var selectAttendance_to = jQuery("#selectAttendance_to").val();
	var deptId = jQuery("#dept_id").val();
	
	var selectfromNew = selectAttendance_from.split("-").reverse().join("-");
	var selecttoNew = selectAttendance_to.split("-").reverse().join("-");
	var selectfromSet = new Date(selectfromNew);
	var selecttoSet = new Date(selecttoNew);
	
	if(selectAttendance_from == '')
	{
		jQuery("#errorTxt").html("Choose Attendance Date range to proceed.");
		jQuery('#errorPopup').modal('show');
	}
	else if(selectAttendance_to == '')
	{
		jQuery("#errorTxt").html("Choose Attendance Date range to proceed.");
		jQuery('#errorPopup').modal('show');
	}
	else if(deptId == '')
	{
		jQuery("#errorTxt").html("Please select department to proceed.");
		jQuery('#errorPopup').modal('show');
	}
	else if(selectfromSet > selecttoSet)
	{
		jQuery("#errorTxt").html("Kindly Select proper date range.From date should be lesser than to date.");
		
		jQuery('#errorPopup').modal('show');
	}
	else
	{
		document.getElementById('attendanceapplied').submit();
	}
}

function selectedALLEMP()
{
	if(jQuery("#mainCheckEMP").prop("checked"))
	{
		jQuery(".selectedEMP").prop("checked",true);
	}
	else
	{
		jQuery(".selectedEMP").prop("checked",false);
	}
}
/* 
function exportEMP()
{
	if(jQuery(".selectedEMP").prop("checked"))
	{
		
		var selectedIds = [];
        var is_chcked = $('.selectedEMP:checked').length;
		alert($('.selectedEMP:checked').length);
        //--------if checkbox is selected---------
        if(is_chcked){
            
            $(".selectedEMP:checked").each(function(){
               selectedIds.push(jQuery(this).val());
            });
			var selectfromexport = jQuery("#selectAttendance_from").val();
			var selecttoexport = jQuery("#selectAttendance_to").val();
			var dept_id = jQuery("#dept_id").val();
			jQuery("#empids").val(selectedIds);
			jQuery("#selectfromexport").val(selectfromexport);
			jQuery("#selecttoexport").val(selecttoexport);
			jQuery("#dept_idexport").val(dept_id);
			document.getElementById("exportattendancefrm").submit();
		}
		else
		{
			alert("Kindly select any employee to export1");
		}
	}
	else
	{
		alert("Kindly select any employee to export1");
	}
} */


function exportEMP(){
	
        var selectedIds = [];
        var is_chcked = $('.selectedEMP:checked').length;
        //--------if checkbox is selected---------
        if(is_chcked){
            
            $(".selectedEMP:checked").each(function(){
               selectedIds.push($(this).val());
            });
			var selectfromexport = jQuery("#selectAttendance_from").val();
			var selecttoexport = jQuery("#selectAttendance_to").val();
			var dept_id = jQuery("#dept_id").val();
			jQuery("#empids").val(selectedIds);
			jQuery("#selectfromexport").val(selectfromexport);
			jQuery("#selecttoexport").val(selecttoexport);
			jQuery("#dept_idexport").val(dept_id);
			document.getElementById("exportattendancefrm").submit();
            //---------------------------
          
           
        }
        else{
            
            alert("please select row using checkbox");
			
            return false;
        }
    }
</script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/3.1.3/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript" src="https://api.spotserve.io/js/bootstrap-select.min.js"></script>
<script>
/* function filledEmpId()
 {
	
	 var deptId= jQuery("#dept_id").val();
	 if(deptId != '')
	 {
		$.ajax({
						type: "GET",
						url: "{{ url('filledEmps') }}"+"/"+deptId,
						
						success: function(response){
						 
						   jQuery("#emp_id").html(response);
						   // jQuery("#emp_id").selectpicker('refresh');
							jQuery('.selectpicker').selectpicker('refresh');
						}
					}); 
	 }
 } */
 
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
				date = moment().format('DD-MM-YYYY');
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
 
 function leaveApproval(empId)
 {
	 var selectAttendanceFrom =  jQuery("#selectAttendance_from").val();
	 var selectAttendanceTo =  jQuery("#selectAttendance_to").val();
	 window.location.href= "{{ url('leaveApprovalPanel') }}/"+empId+"/"+selectAttendanceFrom+"/"+selectAttendanceTo;
 }
 
 
</script>
	

<div class="modal" tabindex="-1" role="dialog" id="errorPopup">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
   <i class="fa fa-exclamation-triangle" aria-hidden="true"></i> <h5 class="modal-title">Error</h5>
      </div>
     <div class="modal-body">
		  
        <p id="errorTxt"></p>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

@stop