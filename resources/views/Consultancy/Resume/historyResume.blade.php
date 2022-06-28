@extends($layoutName)
@section('content')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<style>
.user-detail {
    list-style: none;
    padding: 0;
    line-height: 36px;
    margin: 0;
    margin-top: 10px;
}
.user-detail li{    font-size: 20px;}
	.pt-40{padding-top: 40px;}
	.panel-heading span{float: right;}
	th, td{padding: 8px; text-align: center;    font-size: 17px;}
	.table-warning, .table-warning>td, .table-warning>th {
    background-color: #ffeeba;
}
	.table-danger, .table-danger>td, .table-danger>th {
    background-color: #f5c6cb;
}
	.table-success, .table-success>td, .table-success>th {
    background-color: #c3e6cb;
}
.table .thead-dark th {
    color: #fff;
    background-color: #212529;
    border-color: #32383e;
}
	#page-wrapper{    min-height: 100vh;}
</style>
<script>
    $j1 = $.noConflict();
</script>
<?php
/* echo '<pre>';
print_r($resumedetails);
exit; */
?>
<!-- Put Your Content -->	
<div class="container">
<div class="panel panel-default">
	<div class="panel-heading">
                                Resume History
                                    <span> <a class="btn btn-warning" href="{{ url('manageResume') }}" role="button">Back</a></span>
                                </div>

                                <div class="panel-body">
                               <div class="row">
								
										<div class="col-lg-6">
										
												
              <ul class="user-detail">
														<li>Candidate Name <strong>: <span>{{ $resumedetails->candidate_name }}</span></strong></li>
														
														
												<li>Contact Number <strong>: <span>{{ $resumedetails->condidate_no }}</span></strong></li>
														</ul>
       
										</div>
			  <div class="col-lg-6 text-right pt-40">
			
										 <a class="btn btn-primary" href="https://www.hr-suranigroup.com/uploads/consultancyResume/{{$resumedetails->resume_name}}" role="button" download>Download Resume</a>
									
			  </div>
									</div>
									<br> 
								   <div class="row">
								   
								   <div class="col-lg-12">
								<table width="100%" border="1" align="center" class="table table-dark">
  <thead class="thead-dark">
    <tr>
      <th>Resume Status</th>
      <th>Comment</th>
	   <th>Updated Date</th>
      <th>Added Date</th>
    </tr>
	  </thead>
	<tbody>
	@if($resumedetails->resume_status == 2)
		@foreach($resumehistroyAfterShortlist as $_resume)
    <tr class="table-success">
			<td>{{$_resume->status_name}}</td>
			<td>{{$_resume->comment}}</td>
		    <td>{{date("d M Y",strtotime($_resume->updated_at))}}</td>
		    <td>{{date("d M Y",strtotime($_resume->created_at))}}</td>
    </tr>
	@endforeach
		@else
					  <tr @if($resumedetails->resume_status== 1)
						class="table-warning"
					@elseif($resumedetails->resume_status== 2)
					
					@else 
					class="table-danger"
					@endif
					>
					  <td>@if($resumedetails->resume_status== 1)
						Review Pending
					@elseif($resumedetails->resume_status== 2)
					  Shortlisted
					@else 
					Rejected
					@endif
				</td>
					 
					  <td>{{$resumedetails->feedback}}</td>
					   <td>{{date("d M Y",strtotime($resumedetails->updated_at))}}</td>
					  <td>{{date("d M Y",strtotime($resumedetails->created_at))}}</td>
					</tr>
		
		@endif
  </tbody>
</table>


								   </div>
											
												
          </div>
                                </div>
</div>
      </div>

<!-- Put Your Content -->
@stop