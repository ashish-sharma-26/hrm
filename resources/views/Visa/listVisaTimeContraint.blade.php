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
                                Visa Stage Time Contraint
                                    
    </div>

                                <div class="panel-body">
                                    <div class="row">
									<div class="col-lg-12">
										<div class="col-lg-3" style="float:right;text-align:right;">
										 <a class="btn btn-primary" href="{{url('addVisaTimeContraint')}}" role="button">Add Visa Stage Time Contraint</a>
										 </div>
									</div>
                                        <!-- /.col-lg-4 (nested) -->
                                        <div class="col-lg-12">
										
                                             <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>S. No.</th>
				<th data-field="onboarding_status" data-sortable="true">Visa Type</th>
                <th data-field="onboarding_status" data-sortable="true">Visa Stage From</th>
                <th data-field="title" data-sortable="true">Visa Stage To</th>
                <th>Days To Finish</th>
				<th>Updated Date</th>
				<th>Created Date</th>
				<th data-field="status" data-sortable="true">Status</th>
               
                <th data-formatter="TableActions">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $i=1; ?>
        @foreach($VisaTimeContraintDetails as $_visaTimeContraint)
                
           <tr>
		   <td>{{$i}}</td>
		   <td>
		   <x-Visa.VisaTypeName typeId='{{ $_visaTimeContraint->visa_type}}'>
                </x-Visa.VisaTypeName>
		   </td>
		   <td>
		   <x-Visa.VisaStageName stageId='{{ $_visaTimeContraint->from_stageId}}'>
                </x-Visa.VisaStageName>
		   </td>
		   <td>
		    <x-Visa.VisaStageName stageId='{{ $_visaTimeContraint->to_stageId}}'>
                </x-Visa.VisaStageName>
		   </td>
		   <td>{{$_visaTimeContraint->days_to_finish}}</td>
		   <td>{{date("d M Y",strtotime($_visaTimeContraint->updated_at))}}</td>
		   <td>{{date("d M Y",strtotime($_visaTimeContraint->created_at))}}</td>
		   <td>
		   @if($_visaTimeContraint->status == 1)
			   Activated
		    @else
			  Inactivated
		  @endif
		   </td>
		   <td>
			<a href="{{ url('editVisaTimeContraint/'.$_visaTimeContraint->id) }}"><i class="fa fa-pencil"></i></a>
			&nbsp;|&nbsp;
		   <a href="{{ url('deleteVisaTimeContraint/'.$_visaTimeContraint->id) }}"><i class="fa fa-trash"></i></a>
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