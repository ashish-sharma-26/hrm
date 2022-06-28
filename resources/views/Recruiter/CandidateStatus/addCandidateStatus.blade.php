@extends('layouts.hrmLayout')
@section('content')
<div class="container panel panel-default">
  <div class="panel-heading">
          Add Candidate Status                             
  </div>
   <div class="panel-body">
  <form action="{{ url('addCandidateStatusPost') }}" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">



    <div class="row">
      <div class="col-25">
        <label for="name">Status Name</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="status_name" name="status_name" placeholder="Candidate Status Name.." value="{{ old('status_name') }}" required>
      </div>
    </div>
	
	
	
	
	<div class="row">
      <div class="col-25">
        <label for="stage_id">Select Stage</label>
      </div>
      <div class="col-75">
        <select id="stage_id" name="stage_id" required>
			<option value="">Select Stage</option>
		@foreach($stages as $_stage)
			<option value="{{$_stage->id}}">{{$_stage->name}}</option>
		@endforeach
		</select>
      </div>
    </div>
	
	<div class="row">
      <div class="col-25">
        <label for="designation_id">Select Designation</label>
      </div>
      <div class="col-75">
        <select id="designation_id" name="designation_id" required>
			<option value="">Select Designation</option>
		@foreach($designationLists as $_designat)
			<option value="{{$_designat->id}}">{{$_designat->name}}</option>
		@endforeach
		</select>
      </div>
    </div>
	
	
    <div class="row">
      <div class="col-25">
        <label for="status">Status</label>
      </div>
      <div class="col-75">
        <select id="status" name="status">
          <option value="1">Active</option>
          <option value="2">Inactive</option>
          
        </select>
      </div>
    </div>
    
    <div class="row">
      <input type="Submit" value="Submit">
    </div>
  </form>
</div> 
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
	.row{margin: 0;}
	.panel {
    padding: 0;
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
@stop