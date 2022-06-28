@extends('layouts.hrmLayout')
@section('content')
<div class="container panel panel-default">
  <div class="panel-heading">
          Change Password Recruiter                             
  </div>
 <div class="panel-body">
  <form action="{{ url('changepassRecruiterPost') }}" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <input type="hidden" name="id" value="{{ $recruiterData->id }}">

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
        <label for="password">Password</label>
      </div>
      <div class="col-75">
        
        <input type="password" id="password" name="password" placeholder="Entry password.." required>
      </div>
    </div>
	
	<div class="row">
      <div class="col-25">
        <label for="confirm_password">Confirm Password</label>
      </div>
      <div class="col-75">
        
        <input type="password" id="confirm_password" placeholder="Entry password.." required>
      </div>
    </div> 

    
    <div class="row">
		
			<input type="Submit" value="change Password" onclick="return submitConsultancyPass();">
		
    </div>
  </form>
</div> 
</div> 
<script>

function submitConsultancyPass()
{
	var pass = document.getElementById('password').value;
	var confirmPass = document.getElementById('confirm_password').value;
	
	if(pass == confirmPass)
	{
		return true;
	}
	else
	{
		alert("password and confirm password should be same.");
		return false;
	}
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
	.row{margin: 0;}
	.panel {
    padding: 0;
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