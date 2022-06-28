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
                                Visa Type Listing
                                    
    </div>

                                <div class="panel-body">
                                    <div class="row">
									<div class="col-lg-12">
										<div class="col-lg-3" style="float:right;text-align:right;">
										 <a class="btn btn-primary" href="{{url('addVisaType')}}" role="button">Add Visa Type</a>
										 </div>
									</div>
                                        <!-- /.col-lg-4 (nested) -->
                                        <div class="col-lg-12">
										
                                             <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>S. No.</th>
                <th data-field="onboarding_status" data-sortable="true">On Boarding Status</th>
                <th data-field="title" data-sortable="true">Visa Title</th>
                <th>Overstay fine</th>
				<th>Updated Date</th>
				<th>Created Date</th>
				<th data-field="status" data-sortable="true">Status</th>
               
                <th data-formatter="TableActions">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php $i=1; ?>
        @foreach($visaTypeListing as $_visaType)
                
           <tr>
		   <td>{{$i}}</td>
		   <td>
		   @if($_visaType->onboarding_status == 1)
			   All
		   @elseif($_visaType->onboarding_status == 2)
			   Pre Visa Onboarding
		    @else
			  Post Visa Onboarding
		    @endif
		   </td>
		   <td>{{$_visaType->title}}</td>
		   <td>AED {{$_visaType->overstay_fine}}</td>
		   <td>{{date("d M Y",strtotime($_visaType->updated_at))}}</td>
		   <td>{{date("d M Y",strtotime($_visaType->created_at))}}</td>
		   <td>
		   @if($_visaType->status == 1)
			   Activated
		    @else
			  Inactivated
		  @endif
		   </td>
		   <td>
		   <a href="{{ url('editVisaType/'.$_visaType->id) }}"><i class="fa fa-pencil"></i></a>
		   &nbsp;|&nbsp;
		   <a href="{{ url('deleteVisaType/'.$_visaType->id) }}"><i class="fa fa-trash"></i></a>
		   
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