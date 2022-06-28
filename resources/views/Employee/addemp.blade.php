@extends('layouts.hrmLayout')
@section('content')
<div class="container panel panel-default">

		<div class="panel-heading">
		
                                Select Department & On Boarding Status To Proceed
                                    
                                </div>

  <input type="hidden" name="_token" value="{{ csrf_token() }}">


    <div class="padding-block">
      <div class="col-25">
        <label for="department">Select Department</label>
      </div>
      <div class="col-75">
        <select id="department" name="department" required>
          <option value="">Please select Any..</option>
            @foreach($departmentMod as $_department)
				<option value="{{$_department->id}}">{{$_department->department_name}}</option>
			@endforeach 
        </select>
      </div>
	   
    </div>
	 <!--div class="padding-block">
		<div class="col-25">
			<label for="department">Select Onboarding Status</label>
		</div>
		  <div class="col-75">
			<select id="onboarding_status" name="onboarding_status" required>
			  <option value="">Please select Any..</option>
			  <option value="1">All</option>
			  <option value="2">Pre Visa Onboarding</option>
			   <option value="3">Post Visa Onboarding</option>
		  </div>
	  </div-->
   <div class="padding-block-bottom text-setting">
      <input type="button" value="Proceed" onclick="proceedahead();">
    </div>
  
</div> 
<style>
.text-setting{
	text-align:right;
}
/* Style inputs, select elements and textareas */
input[type=text], select, textarea{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
}
	.padding-block-bottom, .padding-block{    display: flex;
    padding: 10px;}
	.padding-block-bottom{     display: block;
    text-align: right;
    margin-right: 15px;
}
	.padding-block-bottom input{    color: #059ec7;
    background-color: #daf6ff;
    padding: 5px 15px;
    border-color: #059ec7;}
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
   function proceedahead()
   {
	   if(jQuery('#department').val() == '')
	   {
		  alert("Kindly select any department to proceed"); 
	   }
	   else
	   {
	   window.location.href="{{ url('employeeForm') }}/"+jQuery('#department').val();
	   }
   }
</script>

<input type="hidden" id="optcount" value="1"/>
@stop