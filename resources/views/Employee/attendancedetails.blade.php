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
	
			
			
			
			
			
			
.calendar {
  display: grid;
  width: 100%;
  grid-template-columns: repeat(7, minmax(120px, 1fr));
  grid-template-rows: 50px;
  grid-auto-rows: 120px;
  overflow: auto;
	border-top: 1px solid rgba(166, 168, 179, 0.12);
}
.calendar-container {
  width: 100%;
  margin: auto;
  overflow: hidden;
  border-radius: 10px;
  background: #fff;

}
.calendar-header {
  text-align: center;
  padding: 0 0 20px 0;
  background: linear-gradient(to bottom, #fafbfd 0%, rgba(255, 255, 255, 0) 100%);
    display: inline;
    float: right;
    border: none;    width: 45%;
}
.calendar-header h1 {
     margin: 0;
    font-size: 24px;
    font-weight: bold;
    text-transform: uppercase;
    display: inline;
    color: #000;
}
.calendar-header p {
margin: 5px 0 0 0;
    font-size: 24px;
    font-weight: 600;
    color: #000;
    display: inline;
}
.calendar-header button {
  background: 0;
  border: 0;
  padding: 0;
  color: rgba(81, 86, 93, 0.7);
  cursor: pointer;
  outline: 0;
}

.day {
    border-bottom: 1px solid rgba(166, 168, 179, 0.12);
    border-right: 1px solid rgba(166, 168, 179, 0.12);
    text-align: center;
    padding: 14px 20px;
    letter-spacing: 1px;
    font-size: 25px;
    box-sizing: border-box;
    color: #98a0a6;
    position: relative;
    pointer-events: none;
    z-index: 1;
    margin: 2px;
    font-weight: bold;
}
.day p{margin: 0;
    font-size: 13px;
    border-radius: 50px;}
.day.holiday p {   background: #d5d5d5;}
.day.present p{background: #006800;}
.day.absent p{ background: #c80000;}
.day.leave p{ background: #c57f00;}
.day.blank{ color: #000;}
			
.day.present{
    background: green;
    color: #fff;
}
.day.absent{
    background: red;
    color: #fff;
}
			.day.leave{
    background: orange;
    color: #fff;
}
			 .day.holiday {
    background: rgb(232, 235, 237);
}
.day:nth-of-type(7n + 7) {
  border-right: 0;
}
.day:nth-of-type(n + 1):nth-of-type(-n + 7) {
  grid-row: 2;
}
.day:nth-of-type(n + 8):nth-of-type(-n + 14) {
  grid-row: 3;
}
.day:nth-of-type(n + 15):nth-of-type(-n + 21) {
  grid-row: 4;
}
.day:nth-of-type(n + 22):nth-of-type(-n + 28) {
  grid-row: 5;
}
.day:nth-of-type(n + 29):nth-of-type(-n + 35) {
  grid-row: 6;
}
.day:nth-of-type(7n + 1) {
  grid-column: 1/1;
}
.day:nth-of-type(7n + 2) {
  grid-column: 2/2;
}
.day:nth-of-type(7n + 3) {
  grid-column: 3/3;
}
.day:nth-of-type(7n + 4) {
  grid-column: 4/4;
}
.day:nth-of-type(7n + 5) {
  grid-column: 5/5;
}
.day:nth-of-type(7n + 6) {
  grid-column: 6/6;
}
.day:nth-of-type(7n + 7) {
  grid-column: 7/7;
}
.day-name {
  font-size: 12px;
  text-transform: uppercase;
  color: #99a1a7;
  text-align: center;
  border-bottom: 1px solid rgba(166, 168, 179, 0.12);
  line-height: 50px;
  font-weight: 500;
}
.day--disabled {
  color: rgba(152, 160, 166, 0.6);
  background-color: #ffffff;
  background-image: url("data:image/svg+xml,%3Csvg width='40' height='40' viewBox='0 0 40 40' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23f9f9fa' fill-opacity='1' fill-rule='evenodd'%3E%3Cpath d='M0 40L40 0H20L0 20M40 40V20L20 40'/%3E%3C/g%3E%3C/svg%3E");
  cursor: not-allowed;
}

.task {
  border-left-width: 3px;
  padding: 8px 12px;
  margin: 10px;
  border-left-style: solid;
  font-size: 14px;
  position: relative;
}
.task--warning {
  border-left-color: #fdb44d;
  grid-column: 4/span 3;
  grid-row: 3;
  background: #fef0db;
  align-self: center;
  color: #fc9b10;
  margin-top: -5px;
}
.task--danger {
  border-left-color: #fa607e;
  grid-column: 2/span 3;
  grid-row: 3;
  margin-top: 15px;
  background: rgba(253, 197, 208, 0.7);
  align-self: end;
  color: #f8254e;
}
.task--info {
  border-left-color: #4786ff;
  grid-column: 6/span 2;
  grid-row: 5;
  margin-top: 15px;
  background: rgba(218, 231, 255, 0.7);
  align-self: end;
  color: #0a5eff;
}
.task--primary {
  background: #4786ff;
  border: 0;
  border-radius: 4px;
  grid-column: 3/span 3;
  grid-row: 4;
  align-self: end;
  color: #fff;
  box-shadow: 0 10px 14px rgba(71, 134, 255, 0.4);
}
.task__detail {
  position: absolute;
  left: 0;
  top: calc(100% + 10px);
  background: #fff;
  border: 1px solid rgba(166, 168, 179, 0.2);
  color: #000;
  padding: 20px;
  box-sizing: border-box;
  border-radius: 4px;
  box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
  z-index: 2;
}
.task__detail:after, .task__detail:before {
  bottom: 100%;
  left: 30%;
  border: solid transparent;
  content: " ";
  height: 0;
  width: 0;
  position: absolute;
  pointer-events: none;
}
.task__detail:before {
  border-bottom-color: rgba(166, 168, 179, 0.2);
  border-width: 8px;
  margin-left: -8px;
}
.task__detail:after {
  border-bottom-color: #fff;
  border-width: 6px;
  margin-left: -6px;
}
.task__detail h2 {
  font-size: 15px;
  margin: 0;
  color: #51565d;
}
.task__detail p {
  margin-top: 4px;
  font-size: 12px;
  margin-bottom: 0;
  font-weight: 500;
  color: rgba(81, 86, 93, 0.7);
}
.green, .orange, .red, .gray{
    margin: 0;
    font-weight: bold;
}
.green{color: green}
.red{color: red}
			 .gray{color: #98a0a6;}
.orange{color: orange}
.emploee-name h1{    margin: 0;
    font-size: 20px;
    font-weight: bold;
    text-transform: uppercase;
    display: inline;
    color: #000;}
			 #month, #year{ font-size: 17px;font-weight: bold;
    text-transform: uppercase;}
			 .emploee-name h1:first-child{padding-right: 12px;
    border-right: 2px solid #8e8e8e;}
			 .emploee-name h1:last-child{padding-left: 12px;}
			 .emploee-name{    display: inline-block;}
@media only screen and (max-width: 600px) {
.elegant-calencar{    display: block !important;}
tbody td:after{    width: 30px;height: 30px;}
.attendance .btn{    margin-bottom: 10px;}
			}
        </style>			
					<div class="container-fluid panel panel-default attendance">
		
						
  <div class="panel-heading">
       Attendance

  </div>
   <div class="panel-body bottom-block">
 
    <div class="row">
<div class="col-md-12">
	 
		
<div class="calendar-container">
	<div class="emploee-name">
	 <h1>Name : <x-Employee.EmpName eId="{{$monthDetails['emp_id']}}">
                  </x-Employee.EmpName></h1>
		<h1>Mobile : <x-Employee.EmpMobile eId="{{$monthDetails['emp_id']}}">
                  </x-Employee.EmpMobile></h1>
	</div>
  <div class="calendar-header">
   <div class="form-group col-md-6">
	
			<select name="month" id="month" class="selectpicker" onchange="updateDetails({{$monthDetails['emp_id']}})">
				<option value="">Select Month</option>
				@foreach($monthDetails['months'] as $_monthValue=>$_monthName)
				<option value="{{$_monthValue}}" @if($monthDetails['value'] == $_monthValue) selected @endif>{{$_monthName}}</option>
				@endforeach
			</select>   
	</div>
	<div class="form-group col-md-6">

			<select name="year" id="year" class="selectpicker" disabled>
				<option value="">Select Employee Department</option>
				<option value="2022" selected>2022</option>
				<option value="2023">2023</option>
				<option value="2024">2024</option>
			</select>   
	</div>
  </div>
  
  <div class="calendar"><span class="day-name">Sun</span><span class="day-name">Mon</span><span class="day-name">Tue</span><span class="day-name">Wed</span><span class="day-name">Thu</span><span class="day-name">Fri</span><span class="day-name">Sat</span>
 
  <?php
  $dayIndex = 0;
  $runningday = 0;
  ?>
  @for($days = 1;$days <= $daysInMonth;$days++)
	<?php
	if($dayIndex < $monthDetails['firstday'])
	{
		?>
		<div class="day day--disabled">disabled</div>
		<?php
		$days = 0;
	}
	else
	{
		if($runningday == 0)
		{
		?>
		  <div class="day holiday">{{$days}} <p>Holidays</p></div>
		<?php
		}
		else 
		{
		?>
			<x-Employee.CheckAttendance eId="{{$monthDetails['emp_id']}}" eDate="{{$days}}-{{$monthDetails['value']}}-{{$monthDetails['year']}}" edays="{{$days}}">
            </x-Employee.CheckAttendance>
		  
		<?php
		}
		
		
	}
	$dayIndex++;
	if($runningday >=6)
	{
		$runningday = 0;
	}
	else
	{
	$runningday++;
	}
	?>
  
  @endfor
	
    
	@for($start=$runningday;$start<7;$start++)
	<div class="day day--disabled">disabled</div>
	@endfor
  </div>
</div>
</div>
		<div class="col-md-12">			
	<div class="form-group col-md-3">
	       <label for="exampleInputEmail1">Present Days</label>
			<h3 class="green"><x-Employee.PresentAttendanceDetails eId="{{$monthDetails['emp_id']}}" eMonth="{{$monthDetails['value']}}">
                  </x-Employee.PresentAttendanceDetails> Days</h3>
    </div>

	<div class="form-group col-md-3">
	       <label for="exampleInputEmail1">Absent Days</label>
			<h3 class="red"><x-Employee.AbsentAttendanceDetails eId="{{$monthDetails['emp_id']}}" eMonth="{{$monthDetails['value']}}">
                  </x-Employee.AbsentAttendanceDetails> Days</h3>
    </div>
	<div class="form-group col-md-3">
	       <label for="exampleInputEmail1">Leave</label>
		   <h3 class="orange"><x-Employee.LeaveDaysDetails eId="{{$monthDetails['emp_id']}}" eMonth="{{$monthDetails['value']}}">
                  </x-Employee.LeaveDaysDetails> Days</h3>
    </div>
	<div class="form-group col-md-3">
	       <label for="exampleInputEmail1">Holidays</label>
		   <h3 class="gray"><x-Employee.HoliDays eId="{{$monthDetails['value']}}">
                  </x-Employee.HoliDays> Days</h3>
    </div>		
		</div>
    </div>
	    <div class="row">
<div class="col-md-12">


	
	
   
	
	
							
		</div>
    </div>
	
	
	



</div> 




</div>
					

 <script>
 function updateDetails(eid)
 {
	 var monthselected=jQuery('#month').val();
	 if(monthselected == '')
	 {
		 alert('kindly select valid month to proceed.');
	 }
	 else
	 {
		 window.location.href= "{{ url('attendancedetails/') }}/"+eid+'/'+monthselected;
	 }
 }
 </script>


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
                                
@stop