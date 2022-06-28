<?php
/* echo '<pre>';
print_r($holidayList);
echo "============="; */
?>
<style>
.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th{    padding: 1rem;    vertical-align: middle;}
	input[type=checkbox]{    margin: 12px;}
	.drop-design .markAttendanceClass{width: 72px;}
	.panel-body {
    overflow: hidden;
}
	.scroll{ margin-bottom: 25px;}
	.scroll table{    overflow-x: scroll; display: block;}
	.attendance .btn {
    padding: 7px 12px;
    font-size: 14px;
}
.alreadymarkedAttendance{white-space: nowrap;
    text-align: center;
    font-weight: bold;
    color: green;}
</style>

<div class="col-md-12">
	<table width="100%" class="table" style="margin: 0;">
	 <tbody>
		<tr>
      <td style="border-top: none;"><label class="container-custom">
  <input type="checkbox" id="emp_all" onclick="checkboxAllEmp();">
  <span class="checkmark" ></span><span style="margin-left:10px; ">Select All</span>
</label></td>
      <td style="border-top: none;"></td>
      <td style="border-top: none;"></td>
      <!--td style="border-top: none;"><label class="container-radio">
  <input type="radio" id="emp_present"  name="selectAttendance" onclick="checkboxPresentEmp();" disabled>
  <span class="checkmark disabledCheck" id="emp_span_present"></span><span style="margin-left:10px; ">Select All</span>
</label></td>
      <td style="border-top: none;"><label class="container-radio">
  <input type="radio" id="emp_absent" name="selectAttendance" onclick="checkboxAbsentEmp();" disabled>
  <span class="checkmark disabledCheck" id="emp_span_absent"></span><span style="margin-left:10px; ">Select All</span>
</label></td>
      <td style="border-top: none;"><label class="container-radio">
  <input type="radio" id="emp_leave" name="selectAttendance" onclick="checkboxleaveEmp();" disabled>
  <span class="checkmark disabledCheck" id="emp_span_leave"></span><span style="margin-left:10px; ">Select All</span>
</label></td-->
    </tr>
		</tbody>
	</table>
	<div class="scroll">
	<table width="100%" border="1" class="table" align="center">
		
  <thead class="thead-dark">
    <tr>
      <th scope="col" style="width: 10%;">Select Employee</th>
	  <th scope="col">EMP. ID.</th>
      <th scope="col">Name</th>
      <th scope="col">Mobile</th>
	  @foreach($DateRange as $_date)
		@if(!in_array($_date,$holidayList))
			<th scope="col" style="width: 100px;">{{ date("d M",strtotime($_date) )}}</th>
		@endif
      @endforeach
	   <th scope="col">Select All</th>
	    <th scope="col">Sandwich</th>
    </tr>
	  </thead>
	  <tbody>
	  <?php
	  $allEmpids = '';
	  $empIds = '';
	  $eI = 0;
	  ?>
	  @foreach($empdetailsListing as $_emp)
		@if(in_array($_emp->id,$existEmpAsPerDate))
			<tr class="empExistClass">
		@else
			<tr>
		<?php
		if($eI == 0)
		{
			$empIds = $_emp->id;
		}
		else
		{
			$empIds = $empIds.','.$_emp->id;
		}
		$eI++;
		?>
		@endif
		  <td>
		  <?php
		  $allowcheckboxAll = 1;
		  ?>
		  @foreach($DateRange as $_date)
		    @if($existanceCheck[$_emp->id][$_date]['allowAttendance'] == 'Yes')
				   <?php
				   $allowcheckboxAll = 2;
				   ?>
			@endif	   
		  @endforeach
		 
		  <label class="container-custom">
		  
		  <input type="checkbox" name="selectedEmp[]" class="selectedEmpCheckbox " id="e_{{$_emp->id}}" value="{{$_emp->id}}"  onclick="empCheckbehave({{$_emp->id}},{{ count($DateRange) }})"  >
		  <span class="checkmark"></span>
			</label>
			
			</td>
			 <td>{{$_emp->emp_id}}</td>
			  <td style="white-space: nowrap;">{{$_emp->first_name}} {{$_emp->middle_name}} {{$_emp->last_name}}</td>
			  <td><x-Employee.EmpMobile eId="{{$_emp->id}}">
                  </x-Employee.EmpMobile></td>
				  <?php
					$index = 0;
					$allowEmptoAttendance = 1;
				  ?>
			 @foreach($DateRange as $_date)
				@if(!in_array($_date,$holidayList))
				   <td class="drop-design">
				   <div class="markedAttendance">
				   @if($existanceCheck[$_emp->id][$_date]['allowAttendance'] == 'Yes')
					   <?php
					   $allowEmptoAttendance = 2;
					   ?>
				   <select class="markAttendanceClass disabledValue" id="makeAttend_{{$index}}_{{$_emp->id}}" name="addAttendanceFrm[{{$_emp->id}}][{{$index}}][mark_attendance]" onchange="showLeavePopup({{$_emp->id}},{{$index}});" disabled>
						<option value="">Mark Attendance</option>
						<option value="present">P</option>
						<option value="absent">A</option>
						<option value="leave">Leave</option>
						<option value="late">Late</option>
						
				   </select>
					<input type="hidden" id="date_{{$index}}_{{$_emp->id}}" name="addAttendanceFrm[{{$_emp->id}}][{{$index}}][mark_date]" value="{{$_date}}" disabled />
					<input type="hidden" name="addAttendanceFrm[{{$_emp->id}}][{{$index}}][leave_type]" id="leaveType_{{$index}}_{{$_emp->id}}" value="" disabled />
					</div>
					
					@else 
						<div class="alreadymarkedAttendance"> 
						@if($existanceCheck[$_emp->id][$_date]['attendanceMark'] == 'P')
							<span class="marked-present">{{ $existanceCheck[$_emp->id][$_date]['attendanceMark'] }}</span>
						@elseif($existanceCheck[$_emp->id][$_date]['attendanceMark'] == 'A')
							<span class="marked-sandwich">{{ $existanceCheck[$_emp->id][$_date]['attendanceMark'] }}</span>
						@elseif($existanceCheck[$_emp->id][$_date]['attendanceMark'] == 'L')
							<span class="marked-late">{{ $existanceCheck[$_emp->id][$_date]['attendanceMark'] }}</span>
						@elseif($existanceCheck[$_emp->id][$_date]['attendanceMark'] == 'S')
							<span class="marked-sandwich">{{ $existanceCheck[$_emp->id][$_date]['attendanceMark'] }}</span>
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
							<span class="marked-holiday">{{$existanceCheck[$_emp->id][$_date]['attendanceMark'] }} </span>
						
						@endif
						</div>
					@endif
				   </td>
					<?php
						$index++;
					  ?>
				@endif
			 @endforeach
			  <td><a href="javascript:void(0);" title="Edit" class="btn btn-primary selectallEmp disabledValue" id="selectAll_{{$_emp->id}}" @if( $allowcheckboxAll == 2) onclick="selectAlldays({{$_emp->id}})" @endif disabled>Select All</a></td>
			    <td><a href="javascript:void(0);" title="Edit" class="btn btn-primary sandwich disabledValue" id="sandwich_{{$_emp->id}}" onclick="applySandwich({{$_emp->id}})" disabled>Apply</a></td>
	</tr>
	 <?php
	  
	  if($allEmpids == '' )
	  {
		  $allEmpids = $_emp->id;
	  }
	  else
	  {
		  $allEmpids = $allEmpids.','.$_emp->id;
	  }
	  
	  
	 
	  ?>
		@endforeach  

  </tbody>
</table>
		</div>

	
	
		
			
</div>

<input type="hidden" id="countDateRange" value="<?php echo count($DateRange);?>"/>
<input type="hidden" id="allEmpId" value="<?php echo $allEmpids;?>"/>
