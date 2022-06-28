@extends('layouts.hrmLayout')
@section('content') 
<!-- /.panel-body -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet"/>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
<style>
input[type=text], select, textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    resize: vertical;
}
				table.dataTable thead .sorting, table.dataTable thead .sorting_asc, table.dataTable thead .sorting_desc, table.dataTable thead .sorting_asc_disabled, table.dataTable thead .sorting_desc_disabled {
    color: #fff;
    background-color: #212529;
    border-color: #32383e;
}
	  table.table-bordered.dataTable th, table.table-bordered.dataTable td {
    padding: 15px 8px !important;
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
	#example td{vertical-align: middle;}
	.panel-default{    float: left;
    width: 100%;}
	.full-scroll table {
    overflow-x: scroll;     display: inline-table;
}
	@media only screen and (max-width: 600px) {
		.full-scroll table{    display: block;}

		div.dataTables_wrapper div.dataTables_length label{    width: 100%;}
		div.dataTables_wrapper div.dataTables_filter{    text-align: left;}
}
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
    border: none;    color: #fff;}
	  #errorPopup button:hover{color: #fff; border: none;}
	.d-md-flex {
    display: -webkit-box !important;
    display: -ms-flexbox !important;
    display: flex !important;
}	
	.approve{background: #28a745 !important;
    color: #fff;}
		.disapprove{background: #dc3545 !important;
    color: #fff;}
		.pending{background: #ffc107 !important; color: #fff;}
	.panel-default>.panel-heading {
    color: #006985;
    font-size: 18px;
}
.form-group label {
    background: #fff;
    position: relative;
    top: 10px;
    right: -8px;
    padding: 0px 13px;
}
	#attendanceapplied .form-group{margin: 0;	}
		#attendanceapplied .form-group p{    font-size: 16px;
    font-weight: bold;
    text-transform: uppercase;
    width: 100%;
    padding: 8px;
    border: 2px solid #ebebeb;
    border-radius: 4px;
    box-sizing: border-box;
    resize: vertical;}
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
<div class="container-fluid">
<div class="row">
<button type="button" class="btn btn-primary" style="margin-bottom: 10px;" onclick="backme();"><i class="fa fa-arrow-left" aria-hidden="true" style="margin-right: 5px;" ></i> Back</button>
	</div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">Leave Approval Panel</div>
  <div class="panel-body">
    <form id="attendanceapplied" method="post" enctype="multipart/form-data">
      <input type="hidden" name="_token">
      <div class="row">
        <div class="col-lg-12">
          <div class="col-sm-3 form-group">
            <label>Employee Name</label>
           <p>{{ $employeeDetails['name'] }}</p>
          </div>
          <div class="col-sm-3 form-group">
            <label>Attendance From</label>
            <p>{{ date("d M Y",strtotime($employeeDetails['selectFrom'])) }}</p>
          </div>
          <div class="form-group col-md-3">
            <label>Attendance To</label>
            <p>{{ date("d M Y",strtotime($employeeDetails['selectTo'])) }}</p>
          </div>
		<div class="form-group col-md-3">
            <label>Department</label>
            <p>{{ $employeeDetails['department'] }}</p>
          </div>
        </div>
      </div>
      
    </form>
    
    <!-- /.row --> 
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">Leave Type</div>
  
  <!-- /.col-lg-4 (nested) -->
  <div class="col-lg-12 full-scroll" style="padding: 15px;">
    <div id="example_wrapper" class="dataTables_wrapper form-inline dt-bootstrap no-footer">
      
      <div class="row">
        <div class="col-sm-12">
          <table id="example" class="table table-striped table-bordered dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="example_info">
            <thead>
              <tr role="row">
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Leave Date</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Leave Type</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Total Leave Taken</th>
				   <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Casual Leave Taken</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Sick Leave Taken</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Annual leave Taken</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Emergency Leave Taken</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Half Day</th>
              
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Status</th>
				  <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Approve</th>
                <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1">Disapprove</th>
              </tr>
            </thead>
            <tbody>
			@foreach($employeeDetailsAsPerSelectedDates as $_leave)
			
              <tr 
			  @if($_leave->leave_approved == 1)
			  class="pending"
			  @elseif($_leave->leave_approved == 2)
			  class="approve"
			  @else
			  class="disapprove"
			  @endif		
			  >
                <td class="sorting_1">{{ date("d M Y",strtotime($_leave->attendance_date))}}</td>
                <td>
						@if($_leave->leave_type == 'casual_leave')
							Casual leaves
						@elseif($_leave->leave_type == 'annual_leave')
							Annual leave
						@elseif($_leave->leave_type == 'sick_leave')
							Sick leave
						@elseif($_leave->leave_type == 'public_holiday')
							Public holiday
						@elseif($_leave->leave_type == 'emergency_leave')
							Emergency leave
						@elseif($_leave->leave_type == 'half_day')
							Half Day
						@else
							
						@endif
				</td>
                <td>{{ $totalLeaveTaken }}</td>
                <td>{{$leaveTypeCount['casual_leave']}}</td>
                <td>{{$leaveTypeCount['sick_leave']}}</td>
                <td>{{$leaveTypeCount['annual_leave']}}</td>
                <td>{{$leaveTypeCount['emergency_leave']}}</td>
                <td>{{$leaveTypeCount['half_day']}}</td>
				<td>
				@if($_leave->leave_approved == 1)
					Pending
				@elseif($_leave->leave_approved == 2)
					Approved
				@else
					Disapproved
				@endif
				</td>
                   <td>
				   @if($_leave->leave_approved == 1)
				   <a href="{{ url('leaveApproved') }}/{{ $_leave->id }}"  class="btn btn-primary">Approve</a>
					@elseif($_leave->leave_approved == 2)
					Approved
					@else
						--
					@endif
				   </td>
                  <td>
				   @if($_leave->leave_approved == 1)
				   <a href="{{ url('leaveDisApproved') }}/{{ $_leave->id }}"  class="btn btn-primary">Disapprove</a>
					@elseif($_leave->leave_approved == 3)
					Disapproved
					@else
						--
					@endif
				 
				  </td>
				
              </tr>
		  @endforeach
                   
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- /.col-lg-8 (nested) --> 
  
</div>

<script>
function backme()
{
	window.location.href="{{ url('employeeAttendance') }}";
}
</script>
@stop