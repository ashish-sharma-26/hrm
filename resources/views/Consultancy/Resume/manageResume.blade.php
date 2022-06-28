@extends('layouts.consultancyLayout')
@section('content')


<?php
//echo "<pre>";
//print_r($data);

//exit;
$tbltd='';
?>


<div class="panel panel-default">
	<div class="panel-heading">
                                Resume List
                                    
                                </div>

                                <div class="panel-body">
                                    <div class="row">
								    <div class="col-lg-12">
										<div class="col-lg-3" style="float:right;text-align:right;">
										 <a class="btn btn-primary" href="{{url('addResume')}}" role="button">Add Resume</a>
										 </div>
										 
									</div>
                                        <!-- /.col-lg-4 (nested) -->
                                        <div class="col-lg-12">
                                             <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>S. No.</th>
                <th>Candidate Name</th>
                <th>Candidate Contact Number</th>
                <th>Added Date</th>
                <th>Status</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
		
        <?php $i=1; ?>
        @foreach($resumeLists as $_resume)
             
                <tr>
				<td>{{$i}}</td>
				<td>{{$_resume->candidate_name}}</td>
				<td>{{$_resume->condidate_no}}</td>
				<td>{{ date("d M Y",strtotime($_resume->created_at)) }}</td>
				<td>
					@if( $_resume->resume_status == 1)
						Review Pending
					@elseif ( $_resume->resume_status == 2)
						Shortlisted
					@elseif ( $_resume->resume_status == 3)
						Rejected
				    @else
						none
					@endif
				</td>
				<td><a href="https://www.hr-suranigroup.com/uploads/consultancyResume/{{$_resume->resume_name}}" download>download</a>&nbsp;||&nbsp;<a href="{{ url('deleteResume/'.$_resume->id) }}">Delete</a>&nbsp;||&nbsp;<a href="{{ url('historyResume/'.$_resume->id) }}">History</a></td>
				
				
				
				
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