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
                                Candidate Status List(applied for shortlisted candidate)
                                    
                                </div>

                                <div class="panel-body">
                                    <div class="row">
								    <div class="col-lg-12">
										<div class="col-lg-3" style="float:right;text-align:right;">
										 <a class="btn btn-primary" href="{{url('addCandidateStatus')}}" role="button">Add Candidate Status</a>
										 </div>
										 
									</div>
                                        <!-- /.col-lg-4 (nested) -->
                                        <div class="col-lg-12">
                                             <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>S. No.</th>
                <th>Status Name</th>
                <th>Stage Name</th>
                <th>designation</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
		
        <?php $i=1; ?>
        @foreach($candidateStatus as $_candidateStats)
             
                <tr>
				<td>{{$i}}</td>
				<td>{{$_candidateStats->status_name}}</td>
				<td>
				<x-Recruiter.StageName stageId="{{$_candidateStats->stage_id}}">
                  </x-Recruiter.StageName>
				</td>
				<td><x-Recruiter.DesignationName dId="{{$_candidateStats->designation_id}}">
                  </x-Recruiter.DesignationName></td>
				<td>
					@if( $_candidateStats->status == 1)
						Activated
					@else
						Deactivated
					@endif
				</td>
				<td>
				<a href="{{ url('updateCandidateStatus/'.$_candidateStats->id) }}"><i class="fa fa-pencil"></i></a>&nbsp;|&nbsp;
				<a href="{{ url('deleteCandidateStatus/'.$_candidateStats->id) }}"><i class="fa fa-trash"></i></a>
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