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
                                Recruiter List
                                    
                                </div>

                                <div class="panel-body">
                                    <div class="row">
								    <div class="col-lg-12">
										<div class="col-lg-3" style="float:right;text-align:right;">
										 <a class="btn btn-primary" href="{{url('addRecruiter')}}" role="button">Add Recruiter</a>
										 </div>
										 
									</div>
                                        <!-- /.col-lg-4 (nested) -->
                                        <div class="col-lg-12">
                                             <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>S. No.</th>
                <th>Recruiter Name</th>
                <th>Employee Id</th>
                <th>Recruit Designation</th>
                <th>Username</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
		
        <?php $i=1; ?>
        @foreach($recruiterLists as $_recruiter)
             
                <tr>
				<td>{{$i}}</td>
				<td>{{$_recruiter->name}}</td>
				<td>{{$_recruiter->emp_id}}</td>
				<td>
				<x-Recruiter.PostName postId="{{$_recruiter->recruit_designation}}">
                  </x-Recruiter.PostName>
				</td>
				<td>{{$_recruiter->username}}</td>
				<td>
					@if( $_recruiter->status == 1)
						Activated
					@else
						Deactivated
					@endif
				</td>
				<td>
				<a href="{{ url('updateRecruiter/'.$_recruiter->id) }}"><i class="fa fa-pencil"></i></a>&nbsp;|&nbsp;
				<a href="{{ url('deleteRecruiter/'.$_recruiter->id) }}"><i class="fa fa-trash"></i></a>
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