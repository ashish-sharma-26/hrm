@extends('layouts.hrmLayout')
@section('content')
<div class="container-fluid"> 
  
  <!-- /.panel-body -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.js"></script>
  <link href="https://api.spotserve.io/css/bootstrap-select.min.css" rel="stylesheet">
  <style>
input[type=text], select, .selectpicker.form-control, textarea, input[type=email] {
    width: 100%;
    padding: 8px;
border: 2px solid #059ec7;
    border-radius: 4px;
    box-sizing: border-box;
    resize: vertical;    height: auto;
}
	  table.table-bordered.dataTable tbody th, table.table-bordered.dataTable tbody td {
    font-size: 15px;
    font-weight: bold; text-align: left;
}
	  .input-group>.input-group-prepend>.input-group-text{
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
}
	  .input-group-prepend{    position: absolute;
    bottom: 7px;}
.input-group-text {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    padding: 0.375rem 0.75rem;
    margin-bottom: 0;
    font-size: 1.4rem;
    font-weight: bold;
    line-height: 1.5;
    color: #495057;
    text-align: center;
    white-space: nowrap;
    border-right: 2px solid #ced4da;
    border-radius: 0.25rem;
}
	  .aed-cont input{padding-left: 51px;}
	.input-group-addon{background: transparent;
    position: absolute;
    width: 100%;
    height: 58%;
    border: none;
    z-index: 999999;
    top: 26px;}
	.input-group.date{    margin: 0;
    width: 100%;}
	.panel-body {
    min-height: auto;
}
	.panel-default{    float: left;
    width: 100%;}
.marked-sandwich, .marked-present, .marked-leave, .not-marked, .marked-holiday, .marked-late{font-weight: bold;margin: 0 auto;display: block;text-align: center;}
	.marked-late{    background: brown;
    color: #fff;
    height: 30px;
    width: 30px;
    border-radius: 50%;
    padding: 6px;}
.marked-sandwich{background: red;
    color: #fff;
    height: 30px;
    width: 30px;
    border-radius: 50%;
    padding: 6px;}
.marked-present{ background: forestgreen;
    color: #fff;
    height: 30px;
    width: 30px;
    border-radius: 50%;
    padding: 6px;}
.marked-leave{ color: #a94442;white-space: nowrap;
    display: inline;
}
.not-marked{ color: black;}
.marked-holiday{background: blue;
    color: #fff;
    height: 30px;
    width: 30px;
    border-radius: 50%;
    padding: 6px;}	
	#errorPopup .modal-header{    padding: 5px;    background: red;}
		  #errorPopup .modal-header i{ 
    color: #fff;

    font-size: 20px;
float: left;
    padding: 8px 15px;}
	  #errorPopup .modal-title{
    font-weight: bold;
    font-size: 25px;color: #fff;}
	  #errorPopup #errorTxt{    text-align: center;
    font-size: 21px;
    margin-top: 5px; margin-bottom: 5px;}
	#errorPopup .modal-content{    overflow: hidden;}
	  #errorPopup .modal-footer{text-align: center;}
	  #errorPopup button{width: 150px;
    border-radius: 50px;
    padding: 7px;
    font-size: 18px;
    background: #006985;
    border: none;    color: #daf6ff;}
	#errorPopup .modal-body{    padding: 5px;}
	  #errorPopup button:hover{color: #fff; border: none;}
	.d-md-flex {
    display: -webkit-box !important;
    display: -ms-flexbox !important;
    display: flex !important;
}		
td{    vertical-align: middle !important;}
.marked-leave .red, .marked-leave .blue, .marked-leave .green, .marked-leave .orange{width: 15px;
    height: 15px;
    display: inline-block;
    border-radius: 50%;
    position: relative;
    top: 1px;}
.marked-leave .red{    background: red;}
.marked-leave .blue{    background: blue;}
.marked-leave .green{    background: green;}
.marked-leave .orange{    background: orange;}
	.panel-body {
    overflow: visible;
}
	  #incentivebreakUpAsPerCaption{    text-align: center;
    font-weight: bold;
    font-size: 22px;}
	.bootstrap-select .btn:focus{    outline: none !important;background-color: #ffffff;}
	.form-control .selectpicker {    width: 100%;
    padding: 8px;
    border: 2px solid #059ec7;
    border-radius: 4px;
    box-sizing: border-box;
    resize: vertical;}
	.form-control .selectpicker:hover{background-color: #ffffff;}
	#example_wrapper .col-sm-12{    overflow-x: scroll;
  }

	table.dataTable thead .sorting:after{display: none;}
	table.dataTable thead>tr>th.sorting{    padding-right: 8px;white-space: nowrap;}
	table.dataTable thead .sorting, table.dataTable thead .sorting_asc, table.dataTable thead .sorting_desc, table.dataTable thead .sorting_asc_disabled, table.dataTable thead .sorting_desc_disabled {
    color: #fff;
    background-color: #212529;
    border-color: #32383e;
}
	table.table-bordered.dataTable th, table.table-bordered.dataTable td {
    padding: 15px 8px;
}
	.leave-approve a {    text-align: center;
    margin: 0 auto;
    background: green;
    color: #fff;
    font-weight: bold;
    padding: 10px;
    border-radius: 50px;}
	.leave-approve a:hover{text-decoration: none;}

	.dinamic{font-size: 20px;color: #000;}
	.button-design{    padding: 0;
    list-style: none;
    display: block;
    text-align: right;}
	.button-design li{    display: inline-block;
    margin: 0 10px;}
	.btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
}
	.btn-primary:hover, .btn-primary:focus {
    color: #fff;
    background-color: #0069d9;
    border-color: #0062cc;
}
	.btn-dark {
    color: #fff;
    background-color: #343a40;
    border-color: #343a40;
}
	.btn-dark:hover, .btn-dark:focus {
    color: #fff;
    background-color: #23272b;
    border-color: #1d2124;
}
	.btn-info {
    color: #fff;
    background-color: #17a2b8;
    border-color: #17a2b8;
}
	.btn-info:hover, .btn-info:focus {
    color: #fff;
    background-color: #138496;
    border-color: #117a8b;
}
	.form-group label {    background: #fff;
    position: relative;
    top: 13px;
    right: -8px;
    padding: 0px 13px;    z-index: 99;}
	#example_wrapper svg{    width: 30px;
    height: 30px;}
	#example_wrapper svg g{    fill: red;}
			.dropdown-menu {
    z-index: 99 !important;
}
	#emp_txt span{    position: absolute;
    white-space: nowrap;
    right: -133px;
    top: 34px; z-index: 9;}
	#emp_txt span a{color: red;
    font-weight: bold;
    text-decoration: underline;   }
	.viewer{    border-bottom: 1px solid #ddd;
    margin-bottom: 15px;}
	.viewer ul{    list-style: none;
    padding: 0;
    display: block;
    text-align: center;}
	.viewer ul li{    display: inline-block;
    padding: 0 14px;
    font-weight: bold;
    border-right: 1px solid #ddd;}
	.viewer ul li:last-child{border-right: none;}
	  em{color: red;margin-left: 4px;}
	 a.close {    position: relative;
    top: -25px;
    right: 13px;
    opacity: 1;
    color: #fff;}
	  #errorContent{    margin: 0;
    text-align: center;
    padding: 10px;
    font-size: 17px;
    letter-spacing: 1px;}
		@media  only screen and (max-width: 600px) {
.panel-body {
    min-height: 442px;
}
			.viewer ul{    text-align: left;}
			.viewer ul li{    width: 49%;
    margin: 10px 0;
    font-size: 12px;}
		div.dataTables_wrapper div.dataTables_length label{    width: 100%;}
		div.dataTables_wrapper div.dataTables_filter{    text-align: left;}
			.button-design li{display: block;}
}
</style>
	<br>
	<form action="{{ url('generateOfferLetterPost') }}" id="offerletterId" name="offerLetterData" method="post" enctype="multipart/form-data">

	@csrf
  <div class="panel panel-default">
	  
    <div class="panel-heading">
		<div class="col-lg-4"> Offer Letter Generation Panel </div>
		 <div class="col-lg-8 filter-button text-right">
									
										 <a class="btn btn-light" href="{{url('offerLetterList')}}" role="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
								
										 
									</div>
	</div>
    <div class="panel-body">
     
	  

     
        <div class="row">
          <div class="col-lg-12">
            <div class="col-sm-4 form-group">
				
              <label for="exampleInputEmail1">Joining Date<em>*</em></label>
              <input type="text" id="joining_date" name="offerLetterData[joining_date]" placeholder="Choose Joining Date" style="cursor: pointer;"   autocomplete="off">
            </div>
            <div class="form-group col-md-4">
              <label>Enter Employee Name<em>*</em></label>
              <input type="text" id="emp_name" name="offerLetterData[emp_name]" placeholder="Enter Employee Name " autocomplete="off">
            </div>
            <div class="form-group col-md-4">
              <label>Passport No<em>*</em></label>
              <input type="text" placeholder="Enter Passport No" id="passport_no" name="offerLetterData[passport_no]" autocomplete="off">
            </div>
          </div>
          <div class="col-lg-12">
            <div class="form-group col-md-4">
              <label>Mobile No<em>*</em></label>
              <input type="text" placeholder="Enter Mobile No"  id="mobile_no" name="offerLetterData[mobile_no]" autocomplete="off">
            </div>
            <div class="form-group col-md-4">
              <label>Email id<em>*</em></label>
              <input type="email" placeholder="Enter Email id" id="email" name="offerLetterData[email]" autocomplete="off">
            </div>
           
			<div class="form-group col-md-4">
              <label>Select Product<em>*</em></label>
              <select class="selectpicker form-control" data-live-search="true" id="product" name="offerLetterData[product]">
                <option value="">Select Product</option>
					@foreach($productDetails as $_pDetails)
					<option value="{{ $_pDetails->id }}">{{ $_pDetails->product_name }}</option>
					@endforeach
                
              </select>
              
            </div>
          </div>
          <div class="col-lg-12">
			  <div class="form-group col-md-4">
				  <label>Select Designation<em>*</em></label>
				  <select class="selectpicker form-control" data-live-search="true" id="designation" name="offerLetterData[designation]" onchange="getCaptionFunc();">
					<option value="">Select Designation</option>
						@foreach($designationDetails as $_designate)					
						<option value="{{ $_designate->id}}">{{ $_designate->name }}</option>					
						@endforeach

				  </select>
			  </div>
			  <div class="form-group col-md-4">
              <label>Select Department<em>*</em></label>
              <select class="selectpicker form-control" data-live-search="true" id="department" name="offerLetterData[department]" onchange="getCaptionFunc();">
                <option value="">Select Department</option>
				@foreach($departmentDetails as $department)
					<option value="{{ $department->id }}">{{ $department->department_name }}</option>
				@endforeach
              </select>
              
				</div>
				
			<div class="form-group col-md-4" id="showCaptionPanel" style="display:none;">
             
              
			</div>
			
			</div>
			
			
			
			
			
									
        </div>
		
		 </div>
		  </div>
		

			<div id="salarybreakUpAsPerCaption" style="display:none">
					
					
					
			</div>
			

			<div id="incentivebreakUpAsPerCaption" style="display:none" >
					
					
					
			</div>
			

			<div class="form-group col-lg-12" style="padding-right: 0;">
			
 
											
												
				<a class="btn btn-info" href="javascript:void(0);" role="button" style="width: auto;padding: 8px 12px;margin-top: 15px;font-weight: bold;float: right;display:none;" id="generateOffer" onclick="generateOffer();"><i class="fa fa-cog" aria-hidden="true" style="margin-right: 5px;"></i>Generate Offer Letter</a>
											
												
		
		</div>	
		
      
      
      <!-- /.row --> 
   

	  </form>
</div>
<script>
var FromEndDate = new Date();
$("#joining_date").datepicker({
			format: 'dd-mm-yyyy',
			inline: false,
			lang: 'en',
			step: 5,
			multidate: 1,
			closeOnDateSelect: true,
			daysOfWeekDisabled: [0],
			 todayHighlight: true,
			 endDate: FromEndDate,
			 autoclose:true
	
});

function generateOffer()
{
	jQuery('#errorPopup').modal('hide');
	if(jQuery("#joining_date").val() == '')
	{
		jQuery("#errorContent").html('select any joining date to proceed.');
		jQuery('#errorPopup').modal('show');
	}
	else if(jQuery("#emp_name").val() == '')
	{
		jQuery("#errorContent").html('enter employee name to proceed.');
		jQuery('#errorPopup').modal('show');
	}
	else if(jQuery("#passport_no").val() == '')
	{
		jQuery("#errorContent").html('enter passport number to proceed.');
		jQuery('#errorPopup').modal('show');
	}
	else if(jQuery("#mobile_no").val() == '')
	{
		jQuery("#errorContent").html('enter mobile number to proceed.');
		jQuery('#errorPopup').modal('show');
	}
	else if(jQuery("#email").val() == '')
	{
		jQuery("#errorContent").html('enter email to proceed.');
		jQuery('#errorPopup').modal('show');
	}
	else if(jQuery("#product").val() == '')
	{
		jQuery("#errorContent").html('select product to proceed.');
		jQuery('#errorPopup').modal('show');
	}
	else if(jQuery("#designation").val() == '')
	{
		jQuery("#errorContent").html('select designation to proceed.');
		jQuery('#errorPopup').modal('show');
	}
	else if(jQuery("#department").val() == '')
	{
		jQuery("#errorContent").html('select department to proceed.');
		jQuery('#errorPopup').modal('show');
	}
	
	else
	{
		document.getElementById("offerletterId").submit();
	}
}

function getCaptionFunc()
{
	jQuery("#showCaptionPanel").html('');
	jQuery("#showCaptionPanel").hide();
	jQuery("#salarybreakUpAsPerCaption").html('');
	jQuery("#salarybreakUpAsPerCaption").hide();
	
	jQuery("#incentivebreakUpAsPerCaption").html('');
	jQuery("#incentivebreakUpAsPerCaption").hide();
	
	jQuery("#generateOffer").hide();
	if(jQuery("#department").val() != '')
	{
		if(jQuery("#designation").val() == '')
		{
			jQuery("#department").val("");
			jQuery("#errorContent").html('select designation first to proceed.');
			jQuery('#errorPopup').modal('show');
		}
		else 
		{
			deptId = jQuery("#department").val();
			designId = jQuery("#designation").val();
			jQuery(".overlay-spinner").fadeIn(1000);
			jQuery.ajax({
							type: "GET",
							url: "{{ url('getCaptionOfSalaryBreakup') }}"+"/"+deptId+"/"+designId,
							
							success: function(response){
								jQuery("#showCaptionPanel").html(response);
								jQuery("#showCaptionPanel").fadeIn(1000);
								jQuery(".overlay-spinner").hide();
							}
						});
		}
	}
	else
	{
								jQuery("#showCaptionPanel").html('');
								jQuery("#showCaptionPanel").hide();
	}
}	

function salaryBreakUpFunc()
{
	jQuery("#salarybreakUpAsPerCaption").html('');
	jQuery("#salarybreakUpAsPerCaption").hide();
	jQuery("#incentivebreakUpAsPerCaption").html('');
	jQuery("#incentivebreakUpAsPerCaption").hide();
	
	
	jQuery("#generateOffer").hide();
	if(jQuery("#caption").val() != '')
	{
		if(jQuery("#designation").val() == '')
		{
			jQuery("#errorContent").html('select designation to proceed.');
			jQuery('#errorPopup').modal('show');
		}
		else if(jQuery("#department").val() == '')
		{
			jQuery("#errorContent").html('select department to proceed.');
			jQuery('#errorPopup').modal('show');
		}
		else
		{
			var deptId = jQuery("#department").val();
			var designId = jQuery("#designation").val();
			var caption = jQuery("#caption").val();
			jQuery(".overlay-spinner").fadeIn(1000);
			jQuery.ajax({
							type: "GET",
							url: "{{ url('getSalaryBreakup') }}"+"/"+deptId+"/"+designId+"/"+caption,
							
							success: function(response){
								jQuery("#salarybreakUpAsPerCaption").html(response);
								jQuery("#salarybreakUpAsPerCaption").fadeIn(1000);
								
								montlyPackage();
							}
						});
						
					
						
						
		}
	}
	else
	{
								jQuery("#salarybreakUpAsPerCaption").html("");
								jQuery("#salarybreakUpAsPerCaption").hide();
								jQuery("#incentivebreakUpAsPerCaption").html("");
								jQuery("#incentivebreakUpAsPerCaption").hide();
	}
}
function incentiveRender()
{
	var deptId = jQuery("#department").val();
			var designId = jQuery("#designation").val();
			var caption = jQuery("#caption").val();
			//jQuery(".overlay-spinner").fadeIn(1000);
					jQuery.ajax({
							type: "GET",
							url: "{{ url('getIncentiveBreakup') }}"+"/"+deptId+"/"+designId+"/"+caption,
							
							success: function(response){
								jQuery("#incentivebreakUpAsPerCaption").html(response);
								jQuery("#incentivebreakUpAsPerCaption").fadeIn(1000); 
								jQuery(".overlay-spinner").hide();
							}
						});	 
}
function montlyPackage(packageId)
{
		packageId = jQuery("#packId").val();
	
		//jQuery(".overlay-spinner").fadeIn(1000);
		var monthlyPackage = jQuery("#monthly_package").val();
		jQuery.ajax({
							type: "GET",
							url: "{{ url('getSalaryBreakupFinal') }}"+"/"+packageId+"/"+monthlyPackage,
							
							success: function(response){
								jQuery("#breakupFinal").html(response);
								jQuery("#generateOffer").fadeIn(1000);
								//jQuery(".overlay-spinner").hide();
								incentiveRender();
							}
						});
	
}
function resetPackage()
{
	jQuery("#monthly_package").css("border","2px solid #059ec7");
	
}
</script> 


<div class="modal" id="errorPopup" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title"><i class="fa fa-exclamation-triangle"></i> Error</h5>
        <a type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </a>
      </div>
      <div class="modal-body">
        <p id="errorContent"></p>
      </div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@stop