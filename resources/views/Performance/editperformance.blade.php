@extends('layouts.hrmLayout')
@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script>
		$j1 = $.noConflict();
	</script>
<div class="container">
  <form action="{{ url('editperformancePost') }}" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <div class="row">
      <div class="col-25">
        <label for="department_id">Select Department</label>
      </div>
      <div class="col-75">
        <select id="department_id" name="department_id" onchange="onDepartmentAjaxEdit();" required>
          <option value="">Please Select Department</option>
          @foreach($result['departmentDetails'] as $_department)
			@if($result['performance_data']->department_id == $_department->id)
				<option value="{{$_department->id}}" selected="selected"> {{$_department->department_name}}</option>
			@else
				<option value="{{$_department->id}}"> {{$_department->department_name}}</option>
            @endif
		  @endforeach
        </select>
      </div>
    </div>


  <script>
				function onDepartmentAjaxEdit()
				{
					$j1('#allowContentEdit').hide();
					$j1('#allowContentEdit').html("");
					var departmentId = $j1('#department_id').val();
					if(departmentId == '')
					{
						alert('Please select Any on department to proceed.');
					}
					else
					{
						
						$j1.ajax({
							type: "GET",
							url: "{{url('showPerformanceContentEdit')}}/"+departmentId,
							
							success: function(response){
								$j1('#allowContentEdit').html(response);
								$j1('#allowContentEdit').fadeIn(1000);
							}
						});
					}
				}
				$j1( document ).ready(function() {
					$j1('#allowContentEdit').hide();
					$j1('#allowContentEdit').html("");
					var departmentId = $j1('#department_id').val();
					$j1.ajax({
							type: "GET",
							url: "{{url('showPerformanceContentEditAuto')}}/{{$result['performance_data']->id}}",
							
							success: function(response){
								$j1('#allowContentEdit').html(response);
								$j1('#allowContentEdit').fadeIn(1000);
							}
						});
				});
				</script>
				<div id="allowContentEdit" style="display:none;">
	
				</div>
<br><br>

      <div class="row">
      <div class="col-25">
        <label for="status">Status</label>
      </div>
      <div class="col-75">
        <select id="status" name="status"  required>
          <option value="">Please Select Status</option>
          <option value="1" @if($result['performance_data']->status == 1) selected ='Selected' @endif>Active</option>
          <option value="2" @if($result['performance_data']->status == 2) selected ='Selected' @endif>In Active</option>
          
        </select>
      </div>
    </div>
	<input type="hidden" name="mainId" value="{{$result['performance_data']->id}}"/>.
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