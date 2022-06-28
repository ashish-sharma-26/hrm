@extends('layouts.hrmLayout')
@section('content')
<div class="container panel panel-default">
  <div class="panel-heading">
          Update Consultancy                             
  </div>
 <div class="panel-body">
  <form action="{{ url('updateConsultancyPost') }}" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

<input type="hidden" name="id" value="{{ $consultancy_data->id }}">
<input type="hidden" name="employee_id" value="{{ $consultancy_data->employee_id }}">

    <div class="row">
      <div class="col-25">
        <label for="consultancy_name">Consultancy Name</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="consultancy_name" name="consultancy_name" placeholder="Consultancy Name.." value="{{ $consultancy_data->consultancy_name }}" required>
      </div>
    </div>
	
	
	<div class="row">
      <div class="col-25">
        <label for="cantact_name">Contact Person Name</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="cantact_name" name="cantact_name" placeholder="Contact Person Name.." value="{{ $consultancy_data->cantact_name }}">
      </div>
    </div>
	
	
	
	
	<div class="row">
      <div class="col-25">
        <label for="contact_number">Local Contact Number</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="contact_number" name="contact_number" placeholder="Contact Contact Number.." value="{{ $consultancy_data->contact_number }}">
      </div>
    </div>
	
	  <div class="row">
      <div class="col-25">
        <label for="email">Email</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="email" name="email" placeholder="Enter Email.." value="{{ $consultancy_data->email }}">
      </div>
    </div>
	
    <div class="row">
      <div class="col-25">
        <label for="h_contact_number">Home Country Contact Number</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="h_contact_number" name="h_contact_number" placeholder="Home Country Contact Number.." value="{{ $consultancy_data->h_contact_number }}">
      </div>
    </div>
	
	
	<div class="row">
      <div class="col-25">
        <label for="Flat_commision_per_person">Flat Commission(per selection)</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="Flat_commision_per_person" name="Flat_commision_per_person" placeholder="Flat Commission(per selection).." value="{{ $consultancy_data->Flat_commision_per_person }}">
      </div>
    </div>
	
	<div class="row">
      <div class="col-25">
        <label for="commission_currency">Commission Currency</label>
      </div>
      <div class="col-75">
        
        <select id="commission_currency" name="commission_currency">
		  <option value="">Select Currency of Commission</option>
          <option value="INR" @if($consultancy_data->commission_currency == 'INR') selected @endif >INR(India)</option>
          <option value="AED" @if($consultancy_data->commission_currency == 'AED') selected @endif >AED(UAE)</option>
          <option value="Taka" @if($consultancy_data->commission_currency == 'Taka') selected @endif >Taka(Bangladesh)</option>
          <option value="PKR" @if($consultancy_data->commission_currency == 'PKR') selected  @endif >PKR(Pakistan)</option>
        </select>
      </div>
    </div>
	
	
	<div class="row">
      <div class="col-25">
        <label for="address1">Local Address</label>
      </div>
      <div class="col-75">
        
        <textarea  id="address1" name="address1" placeholder="Address 1.."> {{ $consultancy_data->address1 }} </textarea>
      </div>
    </div>
	
	<div class="row">
      <div class="col-25">
        <label for="address2">Home Country Address</label>
      </div>
      <div class="col-75">
        
        <textarea  id="address2" name="address2" placeholder="Address 2.."> {{ $consultancy_data->address2 }} </textarea>
      </div>
    </div>
	
	<div class="row">
      <div class="col-25">
        <label for="country">Country</label>
      </div>
      <div class="col-75">
        <select id="country" name="country">
            <option value="">Select Country</option>
		    <option value="UAE" @if($consultancy_data->country == 'UAE') selected @endif >UAE</option>
			<option value="IND" @if($consultancy_data->country == 'IND') selected @endif >India</option>
            <option value="PAK" @if($consultancy_data->country == 'PAK') selected @endif >Pakistan</option>
            <option value="BAG" @if($consultancy_data->country == 'BAG') selected @endif >Bangladesh</option>
        </select>
      </div>
    </div>
	
	<div class="row">
      <div class="col-25">
        <label for="username">Username</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="username" name="username" placeholder="Entry Username.." value="{{ $consultancy_data->username }}" readonly>
      </div>
    </div>
	
	
	
    <div class="row">
      <div class="col-25">
        <label for="status">Status</label>
      </div>
      <div class="col-75">
        <select id="status" name="status">
          <option value="1" @if($consultancy_data->status == '1') selected @endif >Active</option>
          <option value="2" @if($consultancy_data->status == '2') selected @endif>Inactive</option>
          
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
	window.location.href = "{{ url('changeConsultancyAccess/'.$consultancy_data->id)}}";
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

/* Style the container */
	.row{margin: 0;}
	.panel {
    padding: 0;
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