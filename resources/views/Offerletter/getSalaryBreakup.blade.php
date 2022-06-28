		@if(!empty($salaryDetails))
	 <div class="panel panel-default">	
	<div class="panel-heading">
		<div class="col-lg-4">Salary Breakup Manage Panel</div>
		 <div class="col-lg-8 filter-button text-right">
									
										 <a class="btn btn-light" href="{{url('offerLetterList')}}" role="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
								
										 
									</div>
	</div>
    <div class="panel-body">
		<div class="col-sm-12 form-group">
           <div class="col-sm-6 form-group" >
		    <input type="hidden" id="monthly_package" name="offerLetterData[monthly_package]" placeholder="Enter Monthly Package" value="{{ $salaryDetails->monthly_salary }}">
					  <input type="hidden" name="offerLetterData[package_id]" id="packId" value="{{$salaryDetails->id}}">
		
			<div id="breakupFinal">
			</div>
		   </div>
		   <div class="col-sm-6 form-group">
			<table id="example" class="table table-striped table-bordered dataTable no-footer" style="width:100%" role="grid" aria-describedby="example_info">
			  <tbody>
						<tr>
				
							<td>Monthly Salary</td>
							<td>AED {{ $salaryDetails->monthly_salary }}</td>
						</tr>
				<?php
					$label = explode(",",$salaryDetails->label_name);
					$value = explode(",",$salaryDetails->percentange);
					for($i=0;$i<count($value);$i++)
					{
						?>
						<tr>
				
							<td>{{ $label[$i] }}</td>
							<td>{{ $value[$i] }}%</td>
						</tr>
						<?php
					}
				?>
				
			   
			  </tbody>
			</table>
		</div>
           
		</div>
		</div>
		</div>
		@else
			
		No Salary struture decleared
		
		@endif