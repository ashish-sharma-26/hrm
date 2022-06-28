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
                                Designation List
                                    
                                </div>

                                <div class="panel-body">
                                    <div class="row">
								    <div class="col-lg-12">
										<div class="col-lg-3" style="float:right;text-align:right;">
										 <a class="btn btn-primary" href="{{url('addDesignation')}}" role="button">Add Designation</a>
										 </div>
										 
									</div>
                                        <!-- /.col-lg-4 (nested) -->
                                        <div class="col-lg-12">
                                             <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>S. No.</th>
                <th>Designation Name</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
		
        <?php $i=1; ?>
        @foreach($designationLists as $_designation)
             
                <tr>
				<td>{{$i}}</td>
				<td>{{$_designation->name}}</td>
				<td>
					@if( $_designation->status == 1)
						Activated
					@else
						Deactivated
					@endif
				</td>
				<td>
				<a href="{{ url('updateDesignation/'.$_designation->id) }}"><i class="fa fa-pencil"></i></a>&nbsp;|&nbsp;
				<a href="{{ url('deleteDesignation/'.$_designation->id) }}"><i class="fa fa-trash"></i></a>
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