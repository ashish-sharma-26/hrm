@extends('layouts.hrmLayout')
@section('content')
<div class="container panel panel-default">
  <div class="panel-heading">
          Update Recruiter                             
  </div>
   <div class="panel-body">
  <form action="{{ url('updateRecruiterPost') }}" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="id" value="{{ $recruiterData->id }}">



    <div class="row">
      <div class="col-25">
        <label for="name">Recruiter Name</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="name" name="name" placeholder="Recruiter Name.." value="{{ $recruiterData->name }}" required>
      </div>
    </div>
	
	
	<div class="row">
      <div class="col-25">
        <label for="emp_id">Employee Id</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="emp_id" name="emp_id" placeholder="Employee Id.." value="{{ $recruiterData->emp_id }}">
      </div>
    </div>
	
	<div class="row">
      <div class="col-25">
        <label for="recruit_designation">Recruit Designation</label>
      </div>
      <div class="col-75">
        <select id="recruit_designation" name="recruit_designation" required>
			<option value="">Select Designation</option>
		@foreach($designationList as $_designat)
			<option value="{{$_designat->id}}" @if($recruiterData->recruit_designation == $_designat->id) selected @endif>{{$_designat->name}}</option>
		@endforeach
		</select>
      </div>
    </div>
	<div class="row">
      <div class="col-25">
        <label for="username">Username</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="username" name="username" placeholder="Entry Username.." value="{{ $recruiterData->username }}" readonly>
      </div>
    </div>
	
	
	
    <div class="row">
      <div class="col-25">
        <label for="status">Status</label>
      </div>
      <div class="col-75">
        <select id="status" name="status">
          <option value="1" @if($recruiterData->status == 1) selected @endif >Active</option>
          <option value="2" @if($recruiterData->status == 2) selected @endif >Inactive</option>
          
        </select>
      </div>
    </div>
    
    <div class="row">
      <div class="col-25">
			<input type="button" value="Change Password" class="btn btn-primary" onclick="changePass();">
		</div>
		 <div class="col-75">
			<input type="Submit" value="Update">
		</div>
    </div>
  </form>
</div> 
</div> 
<script>
function changePass()
{
	window.location.href = "{{ url('changeRecruiterAccess/'.$recruiterData->id)}}";
}
</script>
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