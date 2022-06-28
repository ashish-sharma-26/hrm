@extends('layouts.hrmLayout')
@section('content')
<div class="container">
  <form action="{{ url('addperformancePost') }}" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="row">
      <div class="col-25">
        <label for="department_id">Select Department</label>
      </div>
      <div class="col-75">
        <select id="department_id" name="department_id" onchange="onDepartmentAjax();" required>
          <option value="">Please Select Department</option>
          @foreach($departmentDetails as $_department)
            <option value="{{$_department->id}}"> {{$_department->department_name}}</option>
          @endforeach
        </select>
      </div>
    </div>


  <script>
				function onDepartmentAjax()
				{
					jQuery('#allowContent').hide();
					jQuery('#allowContent').html("");
					var departmentId = jQuery('#department_id').val();
					if(departmentId == '')
					{
						alert('Please select Any on department to proceed.');
					}
					else
					{
						
						$.ajax({
							type: "GET",
							url: "{{url('showPerformanceContent')}}/"+departmentId,
							
							success: function(response){
								jQuery('#allowContent').html(response);
								jQuery('#allowContent').fadeIn(1000);
							}
						});
					}
				}
				</script>
				<div id="allowContent" style="display:none;">
	
				</div>
<br><br>

      <div class="row">
      <div class="col-25">
        <label for="status">Status</label>
      </div>
      <div class="col-75">
        <select id="status" name="status"  required>
          <option value="">Please Select Status</option>
          <option value="1">Active</option>
          <option value="2">In Active</option>
          
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