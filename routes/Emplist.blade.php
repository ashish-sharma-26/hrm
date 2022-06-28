@extends('layouts.hrmLayout')
@section('content')


<?php
//echo "<pre>";
//print_r($data);

//exit;
$tbltd='';
?>


<div class="panel panel-default">
	<div class="panel-heading">
                                Employee List
                                    
                                </div>

                                <div class="panel-body">
                                    <div class="row">
								    <div class="col-lg-12">
										<div class="col-lg-3" style="float:right;text-align:right;">
										 <a class="btn btn-primary" href="{{url('addEmp')}}" role="button">Add Employee</a>
										 </div>
										 <div class="col-lg-3" style="float:right;text-align:right;">
										 <a class="btn btn-primary" href="{{url('employeeVisa')}}" role="button">Manage Visa</a>
										 </div>
									</div>
                                        <!-- /.col-lg-4 (nested) -->
                                        <div class="col-lg-12">
                                             <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>S. No.</th>
                <th>Employee Id</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Department</th>
                <th>On Boarding Status</th>
                <th>Updated Date</th>
                <th>Created Date</th>
                <th>Status</th>
                
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
		
        <?php $i=1; ?>
        @foreach($empdetails as $_emp)
             
                <tr>
				<td>{{$i}}</td>
				<td>{{$_emp->emp_id}}</td>
				<td>{{$_emp->first_name}}</td>
				<td>{{$_emp->middle_name}}</td>
				<td>{{$_emp->last_name}}</td>
				<td>
				  <x-company.Departmentname departmentId="{{$_emp->dept_id}}">
                  </x-company.Departmentname>
				</td>
				<td>
				    @if($_emp->onboarding_status == 1)
					   All
				    @elseif($_emp->onboarding_status == 2)
					   Pre Visa Onboarding
					@else
					  Post Visa Onboarding
					@endif
				</td>
				<td>{{date('d M Y',strtotime($_emp->updated_at))}}</td>
				<td>{{date('d M Y',strtotime($_emp->created_at))}}</td>
				<td>
					@if( $_emp->status == 1)
						Activated
					@else
						Deactivated
					@endif
				</td>
				<td>
				<a href="{{ url('Empdetails/'.$_emp->emp_id) }}"><i class="fa fa-eye"></i></a>&nbsp;|&nbsp;<a href="{{ url('updateEmp/'.$_emp->emp_id) }}"><i class="fa fa-pencil"></i></a>&nbsp;|&nbsp;
				<a href="{{ url('deleteEmp/'.$_emp->emp_id) }}"><i class="fa fa-trash"></i></a>
				</td>
				</tr>
               
               
                 
            <?php $i++; ?>
            @endforeach
           
          
        </tbody>
       
    </table>
                                        </div>
                                        <!-- /.col-lg-8 (nested) -->
                                    </div>
                                    <!-- /.row -->
                                </div>
</div>
                                <!-- /.panel-body -->

                                
@stop