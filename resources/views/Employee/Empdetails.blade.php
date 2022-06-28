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
             <input style="border:none;" type="text"  value="{{ $empRequiredDetails->emp_id }}" disabled>	
	 </div>
  </div>
  
   <div class="border-bottom">
	 <div class="col-25">
			<label>First Name</label>
	 </div>
	 <div class="col-75">
             <input style="border:none;" type="text"  value="{{ $empRequiredDetails->first_name }}" disabled>	
	 </div>
  </div>
  
   <div class="border-bottom">
	 <div class="col-25">
			<label>Middle Name</label>
	 </div>
	 <div class="col-75">
             <input style="border:none;" type="text"  value="{{ $empRequiredDetails->middle_name }}" disabled>	
	 </div>
  </div>
  
   <div class="border-bottom">
	 <div class="col-25">
			<label>Last Name</label>
	 </div>
	 <div class="col-75">
             <input style="border:none;" type="text"  value="{{ $empRequiredDetails->last_name }}" disabled>	
	 </div>
  </div>
  
   <div class="border-bottom">
	 <div class="col-25">
			<label>Department</label>
	 </div>
	 <div class="col-75">
             <x-company.Departmentname departmentId='{{$empRequiredDetails->dept_id}}'>
                  </x-company.Departmentname>
	 </div>
  </div>
  <div class="border-bottom">
	 <div class="col-25">
			<label>On Boarding Status</label>
	 </div>
	 <div class="col-75">
              <input style="border:none;" type="text"  value="@if($empRequiredDetails->onboarding_status == 1) All @elseif($empRequiredDetails->onboarding_status == 2) Pre Visa Onboarding @else Post Visa Onboarding @endif" disabled>
	 </div>
  </div>
@foreach($empDetails as $empdata)
	
				<div class="border-bottom">
					  <div class="col-25">
						<label>{{ $empdata->attribute_name }}</label>
					  </div>
					  <div class="col-75">

                      @if($empdata->attrbute_type_id==2)

                      <img src="{{ asset('empData/')}}/{{ $empdata->attribute_values }}" alt="" class="img-responsive">

                      @else

                      <input style="border:none;" type="text"  value="{{ $empdata->attribute_values }}" disabled>

                      @endif
						
						
					  </div>
				</div>

@endforeach


       <div class="border-bottom">
		 <div class="col-25">
				<label>Updated date</label>
		 </div>
		 <div class="col-75">
				  <input style="border:none;" type="text"  value="{{date('d M Y',strtotime($empRequiredDetails->updated_at))}}" disabled>
		 </div>
	  </div>        

	 <div class="border-bottom">
		 <div class="col-25">
				<label>Created date</label>
		 </div>
		 <div class="col-75">
				  <input style="border:none;" type="text"  value="{{date('d M Y',strtotime($empRequiredDetails->created_at))}}" disabled>
		 </div>
	  </div>     

	<div class="border-bottom">
		 <div class="col-25">
				<label>Status</label>
		 </div>
		 <div class="col-75">
				  <input style="border:none;" type="text"  value="@if( $empRequiredDetails->status == 1) Activated @else Deactivated @endif" disabled>
		 </div>
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









@stop