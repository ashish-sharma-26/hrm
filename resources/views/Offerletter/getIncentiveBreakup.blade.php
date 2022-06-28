		@if(!empty($incentiveDetails))
	 <div class="panel panel-default" style="margin-bottom: 0;">	
	<div class="panel-heading">
		<div class="col-lg-4">Incentive Breakup Manage Panel</div>
		 <div class="col-lg-8 filter-button text-right">
									
										 <a class="btn btn-light" href="{{url('offerLetterList')}}" role="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
								
										 
									</div>
	</div>
    <div class="panel-body">
	
           
		   <div class="col-sm-12 form-group">
			<table id="example" class="table table-striped table-bordered dataTable no-footer" style="width:100%" role="grid" aria-describedby="example_info">
			  <tbody>
				 <?php
					$from = explode(",",$incentiveDetails->from_inc);
					$to = explode(",",$incentiveDetails->to_inc);
					$values = explode(",",$incentiveDetails->values_final);
					for($i=0;$i<count($values);$i++)
					{
						?>
						<tr>
				
							<td>{{ $from[$i] }} - {{$to[$i]}}</td>
							<td>{{ $values[$i] }}</td>
						</tr>
						<?php
					}
				?>
			   
			  </tbody>
			</table>
		</div>
           
	
		</div>
		</div>
		@else
			
		No Incentive Breakup decleared
		
		@endif