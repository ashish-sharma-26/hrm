@extends('layouts.hrmLayout')
@section('content')
<div class="container panel">
	<div class="panel-heading">
         Update Visa Stage Time Contraint                       
     </div>
  <form action="{{ url('updateStageTimeContraintPost') }}" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="id" value="{{ $visaTimeContraintList->id }}">
  
  <div class="row">
      <div class="col-25">
        <label for="visa_type">Visa Type</label>
      </div>
      <div class="col-75">
        <select id="visa_type" name="visa_type" onchange="setStageAsPerStageType();" required>
		<option value="">Please select Any..</option>
           @foreach($result['visaTypeList'] as $_visaType)
			<option value="{{$_visaType->id}}" @if($visaTimeContraintList->visa_type == $_visaType->id) selected ="selected" @endif>{{$_visaType->title}}</option>
		  @endforeach
        </select>
      </div>
    </div>
	
  <div class="row">
      <div class="col-25">
        <label for="from_stageId">Stages From</label>
      </div>
      <div class="col-75">
        <select id="from_stageId" name="from_stageId" disabled required>
		
          
        
        </select>
      </div>
    </div>

	<div class="row">
      <div class="col-25">
        <label for="to_stageId">Stages To</label>
      </div>
      <div class="col-75">
        <select id="to_stageId" name="to_stageId" disabled required>
		
         </select>
      </div>
    </div>

	<div class="row">
      <div class="col-25">
        <label for="days_to_finish">Days to Finish</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="days_to_finish" name="days_to_finish" placeholder="Enter Days To Finish.." value="{{$visaTimeContraintList->days_to_finish}}">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="status">Status</label>
      </div>
      <div class="col-75">
        <select id="status" name="status">
          <option value="1" @if($visaTimeContraintList->status == 1) selected = "selected" @endif>Active</option>
          <option value="2" @if($visaTimeContraintList->status == 2) selected = "selected" @endif>Inactive</option>
          
        </select>
      </div>
    </div>
    
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div> 
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
  padding: 12px 12px 12px 0;
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
  padding: 20px;
}

/* Floating column for labels: 25% width */
.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

/* Floating column for inputs: 75% width */
.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}
.col-70 {
  float: left;
  width: 70%;
  margin-top: 6px;
}
.col-5 {
  float: right;
  width: 5%;
  margin-top: 6px;
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

.panel-heading{
	color: #fff;
	background: #7aeef4;
	width: 100%;
	margin: 0px;
	font-size: 18px;
	font-weight: 700;
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$j = jQuery.noConflict();
$j(document).ready(function(){
	
	var stageTypeId = jQuery('#visa_type').val();
					$.ajax({
						type: "GET",
						url: "{{url('editStageAsPerType')}}/"+stageTypeId+'/{{ $visaTimeContraintList->id }}+/from',
						
						success: function(response){
						    jQuery('#from_stageId').html(response);
							jQuery('#from_stageId').attr("disabled",false);
						}
					});
					
					
					$.ajax({
						type: "GET",
						url: "{{url('editStageAsPerType')}}/"+stageTypeId+'/{{ $visaTimeContraintList->id }}+/to',
						
						success: function(response){
							jQuery('#to_stageId').html(response);
							jQuery('#to_stageId').attr("disabled",false);
						}
					});
});
function setStageAsPerStageType()
{
			var stageTypeId = jQuery('#visa_type').val();
					$.ajax({
						type: "GET",
						url: "{{url('getStageAsPerType')}}/"+stageTypeId,
						
						success: function(response){
							jQuery('#from_stageId').html(response);
							jQuery('#to_stageId').html(response);
							jQuery('#from_stageId').attr("disabled",false);
							jQuery('#to_stageId').attr("disabled",false);
						}
					});
}
</script>
@stop