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
                                Visa Stage Listing
                                    
    </div>

                                <div class="panel-body">
                                    <div class="row">
									<div class="col-lg-12">
										<div class="col-lg-3" style="float:right;text-align:right;">
										 <a class="btn btn-primary" href="{{url('addVisaStage')}}" role="button">Add Visa Stage</a>
										 </div>
									</div>
                                        <!-- /.col-lg-4 (nested) -->
                                        <div class="col-lg-12">
										
                                             <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>S. No.</th>
                <th data-field="onboarding_status" data-sortable="true">Visa Type</th>
                <th data-field="title" data-sortable="true">Stage Name</th>
                <th>Cost</th>
				<th>Stage Description</th>
				<th>Stage Order</th>
				<th>Updated Date</th>
				<th>Created Date</th>
				<th data-field="status" data-sortable="true">Status</th>
               
                <th data-formatter="TableActions">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $i=1; ?>
        @foreach($visaStagingMods as $_visaStage)
                
           <tr>
		   <td>{{$i}}</td>
		   <td>{{$_visaStage->title}}</td>
		   <td>{{$_visaStage->stage_name}}</td>
		   <td>{{$_visaStage->cost}}</td>
		   <td>{{$_visaStage->stage_description}}</td>
		   <td>{{$_visaStage->stage_order}}</td>
		  
		   <td>{{date("d M Y",strtotime($_visaStage->updated_at))}}</td>
		   <td>{{date("d M Y",strtotime($_visaStage->created_at))}}</td>
		   <td>
		   @if($_visaStage->status == 1)
			   Activated
		    @else
			  Inactivated
		  @endif
		   </td>
		   <td>
			<a href="{{ url('editVisaStage/'.$_visaStage->id) }}"><i class="fa fa-pencil"></i></a>
			&nbsp;|&nbsp;
		   <a href="{{ url('deleteVisaStage/'.$_visaStage->id) }}"><i class="fa fa-trash"></i></a>
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