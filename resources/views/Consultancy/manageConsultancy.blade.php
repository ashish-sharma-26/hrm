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
                                Consultancy List
                                    
                                </div>

                                <div class="panel-body">
                                    <div class="row">
								    <div class="col-lg-12">
										<div class="col-lg-3" style="float:right;text-align:right;">
										 <a class="btn btn-primary" href="{{url('addConsultancy')}}" role="button">Add Consultancy</a>
										 </div>
										 
									</div>
                                        <!-- /.col-lg-4 (nested) -->
                                        <div class="col-lg-12">
                                             <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>S. No.</th>
                <th>Consultancy Name</th>
                <th>Contact Person Name</th>
                <th>Local Contact Number</th>
                <th>Home Country Contact Number</th>
                <th>Email</th>
                <th>Address 1</th>
                <th>Address 2</th>
                <th>Country</th>
                <th>Username</th>
                <th>Status</th>
                
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
		
        <?php $i=1; ?>
        @foreach($consultancyLists as $_consult)
             
                <tr>
				<td>{{$i}}</td>
				<td>{{$_consult->consultancy_name}}</td>
				<td>{{$_consult->cantact_name}}</td>
				
				<td>{{$_consult->contact_number}}</td>
				<td>{{$_consult->h_contact_number}}</td>
				<td>{{$_consult->email}}</td>
				<td>{{$_consult->address1}}</td>
				<td>{{$_consult->address2}}</td>
				<td>{{$_consult->country}}</td>
				<td>{{$_consult->username}}</td>
				
				<td>
					@if( $_consult->status == 1)
						Activated
					@else
						Deactivated
					@endif
				</td>
				<td>
				<a href="{{ url('updateConsultancy/'.$_consult->id) }}"><i class="fa fa-pencil"></i></a>&nbsp;|&nbsp;
				<a href="{{ url('deleteConsultancy/'.$_consult->id) }}"><i class="fa fa-trash"></i></a>
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