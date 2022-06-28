@extends('layouts.hrmLayout')
@section('content')

<div class="container panel panel-default">

	<div class="panel-heading">
                                  Employee Details
                                    
                                </div>

  
  <div class="border-bottom">
	 <div class="col-25">
			<label>Employee Id</label>
	 </div>
	 <div class="col-75">
             {{ $result['empDetail']->emp_id }}	
	 </div>
  </div>
  
   <div class="border-bottom">
	 <div class="col-25">
			<label>First Name</label>
	 </div>
	 <div class="col-75">
             {{ $result['empDetail']->first_name }}
	 </div>
  </div>
  
   <div class="border-bottom">
	 <div class="col-25">
			<label>Middle Name</label>
	 </div>
	 <div class="col-75">
            {{ $result['empDetail']->middle_name }} 
	 </div>
  </div>
  
   <div class="border-bottom">
	 <div class="col-25">
			<label>Last Name</label>
	 </div>
	 <div class="col-75">
             {{ $result['empDetail']->last_name }}
	 </div>
  </div>
  
   <div class="border-bottom">
	 <div class="col-25">
			<label>Department</label>
	 </div>
	 <div class="col-75">
             <x-company.Departmentname departmentId="{{$result['empDetail']->dept_id}}">
                  </x-company.Departmentname>
	 </div>
  </div>
 
       <div class="border-bottom">
		 <div class="col-25">
				<label>Last Updated date</label>
		 </div>
		 <div class="col-75">
				  {{date('d M Y',strtotime($result['empDetail']->updated_at))}}
		 </div>
	  </div>        
  
</div>   
<?php
$allownextStage = 0;
$index=0;
$currentStatus = 0;
$allowAutoselect = 0;
?>
@foreach($visaProcessLists  as $_visaP)
	@if(($_visaP->stage_staus == 2 || $_visaP->stage_staus == 3)&& $index == 0)
		
		<?php
		
			$allownextStage = 1;
			$currentStatus = $_visaP->stage_staus;
			
			if($_visaP->stage_staus == 2 )
			{
				$allowAutoselect = 1;
				$currentvisatype = $_visaP->visa_type;
			}
		?>
	@endif
		<?php
			$index++;
			
		?>
@endforeach




@if($allownextStage == 1)
	<div class="container panel panel-default">
	  <form action="{{ url('empVisaPost') }}" method="post" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="employee_id" value="{{ $result['empDetail']->id }}"/>
	<div class="panel-heading">
          Visa Process Status                        
     </div>  
  <div class="border-bottom">
	 <div class="col-25">
			<label>Visa Type</label>
	 </div>
	 <div class="col-75">
             <select id="visa_type" name="visa_type" onchange="setVisaStage();" required>
				<option value="">Please select Any..</option>
				@foreach($result['visaTypeList'] as $_visaType)
					<option value="{{$_visaType->id}}">{{$_visaType->title}}</option>
				@endforeach
			</select>
	 </div>
  </div>
  <div id="visa_stage_txt">
  </div>
  
   
  
</div> 

<div class="padding-block-bottom">
      <input type="submit" value="Submit">
    </div>
	</form>
@else
	
@endif
	

  @if(count($visaProcessLists) ==0)
	  <div class="container panel panel-default">
	  <form action="{{ url('empVisaPost') }}" method="post" enctype="multipart/form-data">
		@csrf
		<input type="hidden" name="employee_id" value="{{ $result['empDetail']->id }}"/>
	<div class="panel-heading">
          Visa Process Status                        
     </div>  
  <div class="border-bottom">
	 <div class="col-25">
			<label>Visa Type</label>
	 </div>
	 <div class="col-75">
             <select id="visa_type" name="visa_type" onchange="setVisaStage();" required>
				<option value="">Please select Any..</option>
				@foreach($result['visaTypeList'] as $_visaType)
					<option value="{{$_visaType->id}}">{{$_visaType->title}}</option>
				@endforeach
			</select>
	 </div>
  </div>
  <div id="visa_stage_txt">
  </div>
  
   
  
</div> 

<div class="padding-block-bottom">
      <input type="submit" value="Submit">
    </div>
	</form>
@else
	<div class="container-fluid">
	 <div class="row">
                        <div class="col-lg-12">
                             <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
									 <div class="row">
                                  <div class="col-lg-6 col-md-6 col-xs-6">Visa Status</div>
                                  <div class="col-lg-6 col-md-6 col-xs-6 text-right">
								  <?php
								  $stageIndex = 0;
								  ?>
								  @foreach($visaProcessLists  as $_visaP)
									  @if($stageIndex == 0)
										  @if($_visaP->stage_staus == 1)
												In-progress
										  @elseif($_visaP->stage_staus == 2)
												Completed
										  @else
												Cancelled
										  @endif
									  <?php
									  $stageIndex ++;
									  ?>
									  @endif
								  @endforeach
								  </div>
									
									
                                   
    
</div>
                                </div>
	@foreach($visaProcessLists  as $_visaP)

		    <!-- /.panel-heading -->
                 <div class="visa-status" 
				 @if($_visaP->stage_staus == 1) 
					 style="background:#ffffce";
				 @elseif($_visaP->stage_staus == 2)
					 style="background:#cbffcb";
				 @else
					 style="background:#ffc0c0";
				 @endif
				 
				 >
                    <div class="row">
                               
                                        <!-- /.col-lg-4 (nested) -->
                     <div class="col-lg-12">
                      <div class="col-lg-8">
                         <p>Visa Type -  <x-Visa.VisaTypeName typeId='{{$_visaP->visa_type}}'></x-Visa.VisaTypeName></p>
						 <p>Stage Name - <x-Visa.VisaStageName stageId='{{$_visaP->visa_stage}}'></x-Visa.VisaStageName></p>
						@if($_visaP->stage_staus != 1)
						 <p>Cost - {{$_visaP->cost}} AED</p>
						@endif	
                      </div>
					 <div class="col-lg-4">
                          <p>Start Date - {{date('d M Y',strtotime($_visaP->created_at))}}</p>
						  <p>Last Updated Date - {{date('d M Y',strtotime($_visaP->updated_at))}}</p>
						  <p>Status - 
							@if($_visaP->stage_staus == 1)
								In-progress
							@elseif($_visaP->stage_staus == 2)
								Completed
							@else
								Cancelled
							@endif
						  </p>
											
							@if($_visaP->stage_staus == 2)
								<p>Completed Date - {{date('d M Y',strtotime($_visaP->closing_date))}}</p>
							@elseif($_visaP->stage_staus == 3)
								<p>Cancelled Date - {{date('d M Y',strtotime($_visaP->closing_date))}}</p>
							@else
							@endif
                      </div>
											
											
											  <div class="col-lg-12">
									<hr>
                                        </div>
											
											  <div class="col-lg-12">
												  <label>Comment</label>
												  <p>{{$_visaP->comment}}</p>
											@if($_visaP->stage_staus != 1 && !empty($_visaP->final_comment))
												
												 <label>Closing Comment</label>
												  <p>{{$_visaP->final_comment}}</p>
											@endif
</textarea>
                                        </div>
											@if($_visaP->stage_staus == 1)
											<div class="col-lg-12 text-right end-button">
											<button onclick="changeStatus({{$_visaP->id}});">Change Status</button>
											</div>
											@endif
                                        </div>
                                        <!-- /.col-lg-8 (nested) -->
                                    </div>
                                    <!-- /.row -->
                                </div> 
	@endforeach
	    </div>
       </div>
                        </div>
                          
                        
                     </div>
	
@endif 

<style>
/* Style inputs, select elements and textareas */
input[type=text], select, textarea{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
}

/* Style the label to display next to the inputs */
label {
  padding: 5px 12px 5px 0;
  display: inline-block;
}

/* Style the submit button */
input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

/* Style the container */
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 0;
}

/* Floating column for labels: 25% width */
.col-25 {
  float: left;
  width: 25%;
  margin-top: 9px;
	    padding: 0 15px;
}

/* Floating column for inputs: 75% width */
.col-75 {
  float: left;
  width: 75%;
  margin-top: 0;
  padding: 0 15px;
}
.col-60 {
  float: left;
  width: 60%;
  margin-top: 0;
  padding: 0 15px;
}
.col-15 {
  float: left;
  width: 15%;
  margin-top: 0;
  padding: 0 15px;
}
.col-75 img{    padding: 10px;}
.border-bottom{
    border-bottom: 2px solid #fff;
    display: flex;
}
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
} 
</style>


<script>
function setVisaStage()
{
		var visaTypeId = jQuery("#visa_type").val();
		$.ajax({
			type: "GET",
			url: "{{url('setVisaStage')}}/"+visaTypeId,
			success: function(response){
				
					jQuery("#visa_stage_txt").html(response);
			}
			});
}
function changeStatus(vId)
{
	jQuery('#visa_process_id').val(vId);
	$('#popupVisaStatus').modal('show');
}
</script>
@if($allowAutoselect == 1)
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$j = jQuery.noConflict();
$j(document).ready(function(){
	$j('#visa_type').val({{$currentvisatype}});
	$j('#visa_type').trigger("change");
	//$j('#visa_type').attr('readonly',true);
});
</script>
@endif


<!-- Modal -->
<div id="popupVisaStatus" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
	<form action="{{ url('visaProcessPost') }}" method="post" enctype="multipart/form-data">
		@csrf
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Stage Status</h4>
      </div>
      <div class="modal-body">
	  <input type="hidden" id="visa_process_id" name="visa_process_id">
			  <div class="border-bottom">
				 <div class="col-25">
					<label>Cost</label>
				 </div>
				 <div class="col-60">
					<input type="text" id="cost" name="cost" placeholder="Enter Cost.." required> 
				 </div>
				  <div class="col-15">
					AED
				 </div>
			  </div>
			  
			   <div class="border-bottom">
				 <div class="col-25">
						<label>Final Comment</label>
				 </div>
				 <div class="col-75">
					 <textarea name="final_comment"  placeholder="Enter Final Comment..">  </textarea>   
				 </div>
			  </div>
			  
			   <div class="border-bottom">
				 <div class="col-25">
						<label>Status of Stage</label>
				 </div>
				 <div class="col-75">
						<select name="stage_staus"  id="stage_staus" required>
							<option value="">Select Any..</option>
							<option value="2">Completed</option>
							<option value="3">Cancelled</option>
							
						</select>
				 </div>
			  </div>
      </div>
      <div class="modal-footer">
		<button type="Submit" class="btn btn-default">Proceed</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
	  </form>
    </div>

  </div>
</div>

@stop