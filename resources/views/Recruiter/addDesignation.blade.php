@extends('layouts.hrmLayout')
@section('content')
<div class="container panel panel-default">
  <div class="panel-heading">
          Add Designation                             
  </div>
   <div class="panel-body">
  <form action="{{ url('addDesignationPost') }}" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">



    <div class="row">
      <div class="col-25">
        <label for="name">Designation Name</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="name" name="name" placeholder="Designation Name.." value="{{ old('name') }}" required>
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
      <input type="Submit" value="Submit" >
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