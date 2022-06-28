@extends('layouts.hrmLayout')
@section('content')
<style>
.filter-body{
		min-height:100px !important;
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
	select:disabled {
    opacity: .5;
    background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAQAAAAECAYAAACp8Z5+AAAAIklEQVQIW2NkQAKrVq36zwjjgzhhYWGMYAEYB8RmROaABADeOQ8CXl/xfgAAAABJRU5ErkJggg==) repeat;border: 2px solid #858585;
}
	table.dataTable thead>tr>th.sorting {
    padding-right: 8px;
    white-space: nowrap;
}
	table.dataTable thead .sorting, table.dataTable thead .sorting_asc, table.dataTable thead .sorting_desc, table.dataTable thead .sorting_asc_disabled, table.dataTable thead .sorting_desc_disabled {
    color: #fff;
    background-color: #212529;
    border-color: #32383e;
}
	table.table-bordered.dataTable th, table.table-bordered.dataTable td {
    padding: 15px 8px;    vertical-align: middle;
}
	.form-group p{    font-size: 17px;
    font-weight: bold;
    width: 100%;
    padding: 8px;
    border: 2px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
    resize: vertical;}
	.form-group label {
    background: #fff;
    position: relative;
    top: 13px;
    right: -8px;
    padding: 0px 13px;
    z-index: 99;
}
	#page-wrapper{    min-height: 100vh;}
	table.table-bordered.dataTable tbody th, table.table-bordered.dataTable tbody td {
    font-size: 15px;
    font-weight: bold;
}
</style>
<div class="panel panel-default">
	<div class="panel-heading">
                                View Incentive Breakup Panel
                                    
                                </div>

                                <div class="panel-body">
								<form action="https://www.hr-suranigroup.com/exportAttendance" id="exportattendancefrm" method="post">
								<input type="hidden" name="_token" value="jNZ6FQcHz0CpowZGWIp9TtppOZTwjZikcM3mokCp">								<input type="hidden" name="empids" value="" id="empids">
								<input type="hidden" name="selectfromexport" value="" id="selectfromexport">
								<input type="hidden" name="selecttoexport" value="" id="selecttoexport">
								<input type="hidden" name="dept_idexport" value="" id="dept_idexport">
								</form>
								<form action="https://www.hr-suranigroup.com/appliedFilterOnAttendance" id="attendanceapplied" method="post" enctype="multipart/form-data">
								<input type="hidden" name="_token" value="jNZ6FQcHz0CpowZGWIp9TtppOZTwjZikcM3mokCp">								  <div class="row">
								    <div class="col-lg-6">
										<div class="col-sm-3 form-group">
           
											<label for="exampleInputEmail1">Department</label>
											<p><x-Offer.DepartmentName cId="{{ $incentiveDetails->capId}}"></x-Offer.DepartmentName>
											</p>
           
										</div>
										<div class="col-sm-3 form-group">
         
											<label for="exampleInputEmail1">Designation</label>
											<p><x-Offer.DesignationName cId="{{ $incentiveDetails->capId}}"></x-Offer.DesignationName>
											</p>      
										</div>
										<div class="col-sm-3 form-group">
         
											<label for="exampleInputEmail1">Caption</label>
											<p>
											<x-Offer.CapName cId="{{ $incentiveDetails->capId}}"></x-Offer.CapName>
											</p>      
										</div>	
										<div class="col-sm-3 form-group">
         
											<label for="exampleInputEmail1">Incentive Type</label>
											<p>
											  @if($incentiveDetails->incentive_type == 'number_count')
												  Number Count
											  @elseif($incentiveDetails->incentive_type == 'Amount')
												  Amount
											  @else
											
											  @endif
											</p>      
										</div>	
									</div>
									 <div class="col-lg-4">
										<div class="col-sm-12 form-group">
           
										<table id="example" class="table table-striped table-bordered dataTable no-footer" style="width:100%" role="grid" aria-describedby="example_info">
  <tbody>
    <?php
		$from = explode(",",$incentiveDetails->from_inc);
		$to = explode(",",$incentiveDetails->to_inc);
		$values = explode(",",$incentiveDetails->values_final);
		for($i=0;$i<count($values);$i++)
		{
			?>
			<tr>
	
				<td>{{ $from[$i] }} - {{$to[$i]}}</td>
				<td>{{ $values[$i] }}</td>
			</tr>
			<?php
		}
	?>
	
   
  </tbody>
</table>

           
										</div>
								
											
										</div>
									
										
									</div>
											
								   </form>
									
									
                                    
                                    <!-- /.row -->
                                </div>
</div>
@stop