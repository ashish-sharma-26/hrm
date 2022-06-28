
<div class="form-group col-md-12 select-emp">
						
					<h4 style="font-weight: bold;margin: 0;">Select Employee</h4>	
							
			</div>
<div class="col-lg-12">
<div class="card-header pmd-card-border d-flex flex-row align-items-center" style="box-shadow: none;">
									  <label class="container-custom">
										<input type="checkbox" id="emp_all" onclick="checkboxAllEmp();">
										<span class="checkmark"></span>
									  </label>
									  <div class="media-body">
										<label class="card-title" for="emp_all">SELECT ALL</label>
										
									  </div>
										
		 </div>
</div>
@foreach($empdetailsListing as $_emp)

	<div class="col-md-4">
		<div class="card-header pmd-card-border d-flex flex-row align-items-center">
									  <label class="container-custom">
										<input type="checkbox" id="emp_{{$_emp->id}}" name="selectedEmp[]" class="selectedEmpCheckbox" value="{{$_emp->id}}">
										<span class="checkmark"></span>
									  </label>
									  <div class="media-body">
										<label class="card-title has-tooltip" data-toggle="tooltip" title="{{$_emp->first_name}} {{$_emp->middle_name}} {{$_emp->last_name}}" for="emp_{{$_emp->id}}">{{$_emp->first_name}} {{$_emp->middle_name}} {{$_emp->last_name}}</label>
										<p class="card-subtitle"> <x-company.Departmentname departmentId="{{$_emp->dept_id}}">
                  </x-company.Departmentname></p>
									  </div>
										
		 </div>
		<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();   
});
</script>
	</div>
@endforeach
