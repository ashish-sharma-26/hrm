@extends('layouts.hrmLayout')
@section('content')
<style>
	.filter-body{
		min-height:100px !important;
	}
	input[type=text], select, textarea {
    width: 100%;
    padding: 8px;
    border: 2px solid #059ec7;
    border-radius: 4px;
    box-sizing: border-box;
    resize: vertical;
}
	.form-group label {
    background: #fff;
    position: relative;
    top: 13px;
    right: -8px;
    padding: 0px 13px;    z-index: 99;
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
    padding: 15px 8px;
}
	.action-tool span{    display: inline-block;
    text-align: center;
 
    height: 35px;
    padding: 7px;
    border-radius: 50px;
       margin-right: 5px;
    width: 45%;}
	.action-tool span:first-child{    background: green;}
	.action-tool span:last-child{    background: red;}
		.action-tool span:first-child a, .action-tool span:last-child a{    color: #FFFFFF;}
			@media only screen and (max-width: 600px) {
				.action-tool span{    width: 100%;
    margin-bottom: 5px;    margin-right: 0;}
	}

</style>
<!-- /.row -->
                    <div class="row">
							<div class="col-lg-12">
							  <div class="panel panel-default">
                                <div class="panel-heading">
                                   Filters
                                    
                                </div>
							<div class="panel-body filter-body">
                                <div class="row">
									<form action="{{ url('appliedFilterOnDepartment') }}" id="exportdepartmentfrm" method="post" >
									@csrf
									<div class="form-group col-md-4">
										<label>Select Subsidiary</label>
										
										<select id="subsidiaryID" class="selectpicker" name="subsidiaryID" onchange="subsidiarySet();">
												<option value="">Any Subsidiary</option>
												@foreach($subsidiaryDetails as $_subsidiary)
													@if($filterValue['subsidiaryID'] == $_subsidiary->id)	
													<option value="{{$_subsidiary->id }}" selected>{{$_subsidiary->s_name }}</option>
													@else
													<option value="{{$_subsidiary->id }}">{{$_subsidiary->s_name }}</option>
													@endif
												@endforeach
										</select>
									</div>
									@if(empty($filterValue['divisonID']))
									<div class="form-group col-md-4 disabled" id="divisonPanel">
										<label>Select Divison</label>
										<select id="divisonID" class="selectpicker" name="divisonID" disabled>
													<option value="">Any Divison</option>
													
										</select>
									</div>
									@else
										<div class="form-group col-md-4" id="divisonPanel">
											<label>Select Divison</label>
											<select id="divisonID" class="selectpicker" name="divisonID">
													<option value="">Any Divison</option>
												@foreach($divisonDetails as $_divison)	
													@if($filterValue['divisonID'] == $_divison->id)
														<option value="{{$_divison->id }}" selected>{{$_divison->divison_name }}</option>
													@else
														<option value="{{$_divison->id }}">{{$_divison->divison_name }}</option>
													@endif
												@endforeach		
											</select>
										</div>
									@endif
								
									<div class="form-group col-md-2">
										<button type="button" class="btn btn-dark" onclick="searchDepartment();" style="width: 100%;margin-top: 23px;
padding: 9px;"><i class="fa fa-search" aria-hidden="true" style="margin-right: 5px;"></i> Search</button>
									</div>
									
									
									<div class="form-group col-md-2">
										<button type="button" class="btn btn-danger" onclick="resetDepartment();" style="width: 100%;margin-top: 23px;
padding: 9px;"><i class="fa fa-repeat" aria-hidden="true" style="margin-right: 5px;"></i> Reset</button>
									</div>
								</form>
							 </div>
						   </div>
							</div>
							</div>
					</div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                             <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   Department List
                                    
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="row">
                               
                                        <!-- /.col-lg-4 (nested) -->
                                        <div class="col-lg-12">
                                             <table id="example" class="table table-striped table-bordered" style="width:100%">
       <thead class="thead-dark">
            <tr>
                <th>Department Id</th>
                <th>Divison Name</th>
                <th>Department Name</th>
                <th>Updated Date</th>
                <th>Created Date</th>
                <th>Department Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           
            @foreach($departmentDetails as $_departmentDetail)
            <tr>
                <td>{{ $_departmentDetail->id}}</td>
                <td>
                <x-Company.Divisonname divisonID="{{$_departmentDetail->divison_id}}">
                </x-Company.Divisonname>
                </td>
                <td>{{ $_departmentDetail->department_name}}</td>
                <td>{{ date("d M Y",strtotime($_departmentDetail->updated_at)) }}</td>
                <td>{{ date("d M Y",strtotime($_departmentDetail->created_at)) }}</td>
                
                <td>
                @if( $_departmentDetail->status == 1)
                    Activated
                @else
                    Deactivated
                @endif
                
                </td>
                <td class="action-tool"><span><a href="{{ url('editDepartment/'.$_departmentDetail->id) }}"><i class="fa fa-pencil"></i></a></span><span><a href="{{ url('deleteDepartment/'.$_departmentDetail->id) }}"><i class="fa fa-trash"></i></a></span></td>
            </tr>
            @endforeach
        </tbody>
    </table>
                                        </div>
                                        <!-- /.col-lg-8 (nested) -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
       </div>
                        </div>
                          
                        
                     </div>
                    <!-- /.row -->
					
					
<script>

function searchDepartment()
{
	document.getElementById('exportdepartmentfrm').submit();
}
function subsidiarySet()
{
	var subsidiaryId = jQuery("#subsidiaryID").val();
	$.ajax({
						type: "GET",
						url: "{{ url('getdivisonList') }}"+"/"+subsidiaryId,
						
						success: function(response){
							jQuery("#divisonPanel").html(response);
						}
					});
	
}

function resetDepartment()
{
	window.location.href="{{ url('resetdepartmentFilter') }}";
}
</script>
@stop