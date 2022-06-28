@extends('layouts.hrmLayout')
@section('content')

<div class="container panel panel-default">
		<div class="panel-heading">
                                Update Employee
                                    
                                </div>
  <form action="{{ url('updateEmployeeAttrform') }}" method="post" enctype="multipart/form-data">
	  
  	
@csrf
				<input type="hidden" name="id" value="{{$empRequiredDetails->id}}"> 
				<input type="hidden" name="emp_id" value="{{$empRequiredDetails->emp_id}}"> 
				<input type="hidden" name="dept_id" value="{{$empRequiredDetails->dept_id}}"> 
  
				<div class="border-bottom">
					  <div class="col-25">
						<label for="first_name">Employee First Name<span class="requiredClass">*</span></label>
					  </div>
					  <div class="col-75">
						
						<input type="text" id="first_name" name="first_name" placeholder="Enter Employee First Name.." value="{{$empRequiredDetails->first_name}}" required>
					  </div>
				</div>
				
				<div class="border-bottom">
					  <div class="col-25">
						<label for="middle_name">Employee Middle Name</label>
					  </div>
					  <div class="col-75">
						
						<input type="text" id="middle_name" name="middle_name" placeholder="Enter Employee Middle Name.." value="{{$empRequiredDetails->middle_name}}">
					  </div>
				</div>
				
				
				<div class="border-bottom">
					  <div class="col-25">
						<label for="last_name">Employee Last Name<span class="requiredClass">*</span></label>
					  </div>
					  <div class="col-75">
						
						<input type="text" id="last_name" name="last_name" placeholder="Enter Employee Last Name.." value="{{$empRequiredDetails->last_name}}" required>
					  </div>
				</div>
				
				<div class="border-bottom">
					  <div class="col-25">
						<label for="onboardingStatusId">OnBoarding Status<span class="requiredClass">*</span></label>
					  </div>
					  <div class="col-75">
						<select id="onboardingStatusId" name="onboarding_status" onchange="onBoardingChange();" required>
							  <option value="">Please select Any..</option>
							  <option value="1" @if($empRequiredDetails->onboarding_status == 1) selected @endif>All</option>
							  <option value="2" @if($empRequiredDetails->onboarding_status == 2) selected @endif>Pre Visa Onboarding</option>
							  <option value="3" @if($empRequiredDetails->onboarding_status == 3) selected @endif>Post Visa Onboarding</option>
						</select>
						 
					  </div>
				</div>
				<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

				<script>
					$j2 = $.noConflict();
				
				
					$j2(document).ready(function(){
						
						$j2.ajax({
							type: "GET",
							url: "{{url('editallowAttribute')}}/{{$empRequiredDetails->dept_id}}/{{$empRequiredDetails->onboarding_status}}/{{$empRequiredDetails->emp_id}}",
							
							success: function(response){
								 $j2('#allowAttribute').html(response);
								 $j2('#allowAttribute').fadeIn(1000);
							}
						});
						
					});
				function onBoardingChange(deptId)
				{
					$j2('#allowAttribute').hide();
					$j2('#allowAttribute').html("");
					var onboardingStatus = $j2('#onboardingStatusId').val();
					if(onboardingStatus == '')
					{
						alert('Please select Any on boarding status to proceed.');
					}
					else
					{
						
						$j2.ajax({
							type: "GET",
							url: "{{url('showallowAttribute')}}/"+deptId+'/'+onboardingStatus,
							
							success: function(response){
								$j2('#allowAttribute').html(response);
								$j2('#allowAttribute').fadeIn(1000);
							}
						});
					}
				}
				</script>
				<div id="allowAttribute" style="display:none;">
	
				</div>
<br><br>

<!-- <button type="submit" style="float:right;" class="btn btn-primary btn-lg">Submit</button> -->

<div class="padding-block-bottom">
      <input type="submit" value="Submit">
    </div>





	

   </form>
</div>   
<style>
.requiredClass{
	color:red;
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
	    padding: 10px 0;
}
	.padding-block-bottom{    display: flow-root;
    text-align: right;
    margin-right: 15px;
    padding-bottom: 10px;}
		.padding-block-bottom input{color: #059ec7;
    background-color: #daf6ff;
    padding: 5px 15px;
    border: 2px solid #059ec7;}
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
function getconditionalOptUpdate(attrcode)
{
		var selectedAttrcode = $j1('#'+attrcode).val();
		
					$j1.ajax({
						type: "GET",
						url: "{{url('showconditionalhtmlUpdate')}}/"+selectedAttrcode+'/'+attrcode+"/{{$empRequiredDetails->emp_id}}",
						
						success: function(response){
							$j1("#"+attrcode+"_conditional").html(response);
							$j1("#"+attrcode+"_conditional").fadeIn(1000);
						}
					});
}
</script>

@stop