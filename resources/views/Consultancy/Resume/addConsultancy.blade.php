@extends('layouts.hrmLayout')
@section('content')
<div class="container panel panel-default">
  <div class="panel-heading">
          Add Consultancy                             
  </div>
   <div class="panel-body">
  <form action="{{ url('addConsultancyPost') }}" method="post" id="frmConsult">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">



    <div class="row">
      <div class="col-25">
        <label for="consultancy_name">Consultancy Name</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="consultancy_name" name="consultancy_name" placeholder="Consultancy Name.." value="{{ old('consultancy_name') }}" required>
      </div>
    </div>
	
	
	 <div class="row">
      <div class="col-25">
        <label for="cantact_name">Contact Person Name</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="cantact_name" name="cantact_name" placeholder="Contact Person Name.." value="{{ old('cantact_name') }}" required>
      </div>
    </div>
	
	<div class="row">
      <div class="col-25">
        <label for="contact_number">Local Contact Number</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="contact_number" name="contact_number" placeholder="Contact Contact Number.." value="{{ old('contact_number') }}">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="email">Email</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="email" name="email" placeholder="Enter Email.." value="{{ old('email') }}">
      </div>
    </div>
	<div class="row">
      <div class="col-25">
        <label for="h_contact_number">Home Country Contact Number</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="h_contact_number" name="h_contact_number" placeholder="Home Country Contact Number.." value="{{ old('h_contact_number') }}">
      </div>
    </div>
	
	
	
	<div class="row">
      <div class="col-25">
        <label for="Flat_commision_per_person">Flat Commission(per selection)</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="Flat_commision_per_person" name="Flat_commision_per_person" placeholder="Flat Commission(per selection).." value="{{ old('Flat_commision_per_person') }}">
      </div>
    </div>
	
	<div class="row">
      <div class="col-25">
        <label for="commission_currency">Commission Currency</label>
      </div>
      <div class="col-75">
        
        <select id="commission_currency" name="commission_currency">
		  <option value="">Select Currency of Commission</option>
          <option value="INR" >INR(India)</option>
          <option value="AED">AED(UAE)</option>
          <option value="Taka">Taka(Bangladesh)</option>
          <option value="PKR">PKR(Pakistan)</option>
        </select>
      </div>
    </div>
	
	
	<div class="row">
      <div class="col-25">
        <label for="address1">Local Address</label>
      </div>
      <div class="col-75">
        
        <textarea  id="address1" name="address1" placeholder="Address 1.."> {{ old('address1') }}</textarea>
      </div>
    </div>
	
	<div class="row">
      <div class="col-25">
        <label for="address2">Home Country Address</label>
      </div>
      <div class="col-75">
        
        <textarea  id="address2" name="address2" placeholder="Address 2.."> {{ old('address2') }}</textarea>
      </div>
    </div>
	
	<div class="row">
      <div class="col-25">
        <label for="country">Country</label>
      </div>
      <div class="col-75">
        <select id="country" name="country">
            <option value="">Select Country</option>
		    <option value="UAE">UAE</option>
			<option value="IND">India</option>
            <option value="PAK">Pakistan</option>
            <option value="BAG">Bangladesh</option>
        </select>
      </div>
    </div>
	
	
	
	<div class="row">
      <div class="col-25">
        <label for="username">Username</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="username" name="username" placeholder="Entry Username.." value="{{ old('username') }}"required>
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
      <input type="Submit" value="Submit" onclick="return submitConsultancy();">
    </div>
  </form>
</div> 
</div> 
<script>

function submitConsultancy()
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