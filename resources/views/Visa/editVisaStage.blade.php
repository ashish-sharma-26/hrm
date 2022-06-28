@extends('layouts.hrmLayout')
@section('content')
<div class="container panel">
	<div class="panel-heading">
                                Update Visa Stage
                                    
     </div>
  <form action="{{ url('updateVisaStagePost') }}" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="id" value="{{ $objVisaStages->id }}">
  <div class="row">
      <div class="col-25">
        <label for="visa_type">Visa type</label>
      </div>
      <div class="col-75">
        <select id="visa_type" name="visa_type" required>
		<option value="">Please select Any..</option>
           @foreach($visaTypeList as $_visaT)
		   
          <option value="{{$_visaT->id}}" @if($objVisaStages->visa_type == $_visaT->id) selected="selected" @endif>{{$_visaT->title}}</option>
		  @endforeach
        
          
        
        </select>
      </div>
    </div>


    <div class="row">
      <div class="col-25">
        <label for="stage_name">Stage Name</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="stage_name" name="stage_name" placeholder="Enter Stage Name.." value="{{$objVisaStages->stage_name}}">
      </div>
    </div>
	
	<div class="row">
      <div class="col-25">
        <label for="stage_description">Stage Description</label>
      </div>
      <div class="col-75">
        
        <textarea id="stage_description" name="stage_description" placeholder="Enter Stage Name..">{{$objVisaStages->stage_description}}</textarea>
      </div>
    </div>
    
	<div class="row">
      <div class="col-25">
        <label for="cost">Cost</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="cost" name="cost" placeholder="Enter Cost.." value="{{$objVisaStages->cost}}">
      </div>
    </div>
	
	<div class="row">
      <div class="col-25">
        <label for="stage_order">Stage Order</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="stage_order" name="stage_order" placeholder="Enter Stage Order.." value="{{$objVisaStages->stage_order}}">
      </div>
    </div>
	
    <div class="row">
      <div class="col-25">
        <label for="status">Status</label>
      </div>
      <div class="col-75">
        <select id="status" name="status">
          <option value="1" @if($objVisaStages->status == 1) selected="selected" @endif>Active</option>
          <option value="2" @if($objVisaStages->status == 2) selected="selected" @endif>Inactive</option>
          
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
@stop