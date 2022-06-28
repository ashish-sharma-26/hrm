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
	<form action="{{ url('manageIncentivePost') }}" id="incentiveFrm" method="post" enctype="multipart/form-data">

	@csrf
  <div class="panel panel-default">
	  
    <div class="panel-heading">
		<div class="col-lg-4"> Manage Incentive Breakup </div>
		 <div class="col-lg-8 filter-button text-right">
									
										 <a class="btn btn-light" href="{{url('manageSalaryStructure')}}" role="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
								
										 
									</div>
	</div>
    <div class="panel-body">
     
	  

     
        <div class="row">
                
          <div class="col-lg-12">
			
			  <div class="form-group col-md-4">
              <label>Select Salary Breakup Caption<em>*</em></label>
              <select class="selectpicker form-control" data-live-search="true" id="breakup_id" name="incentiveBreakup[breakup_id]">
                <option value="">Select Caption</option>
				@foreach($salaryBreakUpList as $breakup)
					<option value="{{ $breakup->id }}">{{ $breakup->caption }}</option>
				@endforeach
              </select>
              
            </div>
			<div class="form-group col-md-4">
					   <label>Incentive Type<em>*</em></label>
					  <select class="selectpicker form-control" data-live-search="true" id="incentive_type" name="incentiveBreakup[incentive_type]">
						<option value="">Select Type</option>
						<option value="number_count">Number Count</option>
						<option value="Amount">Amount</option>
						
					  </select>
					</div>
			
			<div class="form-group col-md-4" style="padding-right: 0;    margin-top: 22px;">  
											
												
												<a class="btn btn-primary" href="javascript:void(0);" role="button" style="     width: 100%;
    padding: 8px 12px;
    margin-top: 3px;
    font-weight: bold;
    float: right;
    margin-right: 15px;
    font-size: 13px;
    letter-spacing: 0;" onclick="createIncentiveStructure();"><i class="fa fa-share-square-o" aria-hidden="true" style="margin-right: 5px;"></i>Create Incentive Breakup</a>
											
												
												
			</div>
			</div>
			
		
        </div>
 
      
      <!-- /.row --> 
    </div>
	  
	      
  </div>
		  <div class="panel panel-default" id="breackupContentPanel" style="display:none;">
		<div class="panel-heading">
		<div class="col-lg-12">Create incentive breakup as per salary caption</div>
		 
	</div>
		<div class="panel-body">
     
	  
			
     
        <div class="row">
	  
	  	<div id="breackupContent">
				<div class="col-lg-12">
					
					<div class="form-group col-md-4">
					  <label>From<em>*</em></label>
					  <input type="text" placeholder="Enter Range" class="fromInc" id="from_inc_1" name="incentiveBreakup[from_inc][]" autocomplete="off">
					</div>
					<div class="form-group col-md-4">
					  <label>To<em>*</em></label>
					  <input type="text" placeholder="Enter Range" class="toInc" id="to_inc_1" name="incentiveBreakup[to_inc][]" autocomplete="off">
					</div>
					
					
					<div class="form-group col-md-4">
					  <label>Incentive<em>*</em></label>
					  <input type="text" placeholder="Enter Incentive" class="IncentiveClass" id="values_1" name="incentiveBreakup[values][]" autocomplete="off">
					</div>
					
				</div>							
										
			</div>
			<div class="col-lg-12" style="display:none;" id="addMoreBreakupId">
				<div class="col-lg-8"></div>
				<div class="form-group col-md-2" style="padding-right: 0;    margin-top: 22px;" >  
												
													
													<a class="btn btn-success" href="javascript:void(0);" role="button" style="    width: 100%;
													padding: 8px 12px;
													margin-top: 3px;
													font-weight: bold;
													float: right;
													margin-right: 15px;" onclick="addMoreBreakup();"><i class="fa fa-plus-square-o" aria-hidden="true" style="margin-right: 5px;"></i>Add More Incentive</a>
												
													
													
					</div>
				<div class="form-group col-md-2" style="padding-right: 0;    margin-top: 22px;" >  
												
													
													<a class="btn btn-info" href="javascript:void(0);" role="button" style="    width: 100%;
													padding: 8px 12px;
													margin-top: 3px;
													font-weight: bold;
													float: right;
													margin-right: 15px;" onclick="saveBreakup();"><i class="fa fa-cog" aria-hidden="true" style="margin-right: 5px;"></i>Submit</a>
												
													
													
					</div>
					
					
			</div>
	  
	        </div>
 
      
      <!-- /.row --> 
    </div>
			    </div>
	       </form>
</div>
<script>
function createIncentiveStructure()
{
	jQuery("#breackupContentPanel").hide();
	jQuery("#addMoreBreakupId").hide();
	if(jQuery("#breakup_id").val() == '')
	{
		jQuery("#errorContent").html('select Salary Breakup Caption to proceed.');
		jQuery('#errorPopup').modal('show');
	}
	
	else
	{
		
		var capId = jQuery("#breakup_id").val();
		jQuery.ajax({
						type: "GET",
						url: "{{ url('checkIncentivebreakup') }}/"+capId,
						
						success: function(response){
							
							if(response == 'Allow')
							{
								jQuery("#breackupContentPanel").fadeIn(1000);
								jQuery("#addMoreBreakupId").fadeIn(1000);
							}
							else
							{
								jQuery("#errorContent").html('Incentive Break already exist for selected Caption so kindly use update process.');
								jQuery('#errorPopup').modal('show');
							}
						}
					});
		
	}
}

function addMoreBreakup()
{
	
	var labelBreakupCount = jQuery("#labelBreakup").val();
    var newidValCount = jQuery("#idValCount").val();
	var newidValCountSet  = parseInt(newidValCount)+parseInt(1);
	jQuery("#idValCount").val(newidValCountSet);
	var idValTxt = jQuery('#idVal').val();
	var idValTxtNew = idValTxt+','+newidValCountSet;
	jQuery('#idVal').val(idValTxtNew);
	var labelBreakupCountNew = parseInt(labelBreakupCount)+parseInt(1);
	jQuery("#labelBreakup").val(labelBreakupCountNew);
	/* var html = '<div class="col-lg-12" id="row_'+newidValCountSet+'"><div class="form-group col-md-5"><label>Label Name<em>*</em></label><input type="text" placeholder="Enter Label" id="label_name_'+newidValCountSet+'" name="salaryBreakup[label_name][]" class="labelClass" autocomplete="off"></div><div class="form-group col-md-5"> <label>Percentange<em>*</em></label><input type="text" placeholder="Enter Percentange" id="percentange_'+newidValCountSet+'" name="salaryBreakup[percentange][]" class="PercentangeClass" autocomplete="off">%</div><div class="form-group col-md-2" style="padding-right: 0;    margin-top: 22px;" ><a class="btn btn-danger" href="javascript:void(0);" role="button" style="    width: 100%;padding: 8px 12px;margin-top: 3px;font-weight: bold;float: right;margin-right: 15px;" onclick="removerow('+newidValCountSet+','+newidValCountSet+');"><i class="fa fa-times" aria-hidden="true" style="margin-right: 5px;"></i>Remove</a></div></div>' */
	
	var html = '<div class="col-lg-12" id="row_'+newidValCountSet+'"><div class="form-group col-md-3"><label>From<em>*</em></label> <input type="text" placeholder="Enter Range" class="fromInc" id="from_inc_'+newidValCountSet+'" name="incentiveBreakup[from_inc][]" autocomplete="off"></div><div class="form-group col-md-3"> <label>To<em>*</em></label><input type="text" placeholder="Enter Range" class="toInc" id="to_inc_'+newidValCountSet+'" name="incentiveBreakup[to_inc][]" autocomplete="off"></div><div class="form-group col-md-3"> <label>Incentive<em>*</em></label><input type="text" placeholder="Enter Incentive" class="IncentiveClass" id="values_'+newidValCountSet+'" name="incentiveBreakup[values][]" autocomplete="off"></div><div class="form-group col-md-3" style="padding-right: 0;    margin-top: 22px;" ><a class="btn btn-danger" href="javascript:void(0);" role="button" style="    width: 100%;padding: 8px 12px;margin-top: 3px;font-weight: bold;float: right;margin-right: 15px;" onclick="removerow('+newidValCountSet+','+newidValCountSet+');"><i class="fa fa-times" aria-hidden="true" style="margin-right: 5px;"></i>Remove</a></div></div>';
	
	jQuery("#breackupContent").append(html);
}

function removerow(index,manageIndex)
{
	jQuery("#row_"+index).remove();
	
	
	
	var idValTxt = jQuery('#idVal').val();
	var idValTxtSet = idValTxt.split(",");
	var idValTxtNewValue = '';
	for(i=0;i<idValTxtSet.length;i++)
	{
		
		if(parseInt(idValTxtSet[i]) != parseInt(index))
		{
			if(idValTxtNewValue == '')
			{
				idValTxtNewValue = idValTxtSet[i];
			}
			else
			{
				idValTxtNewValue = idValTxtNewValue+','+idValTxtSet[i];
			}
		}
	}
	
	jQuery('#idVal').val(idValTxtNewValue);
}	

function saveBreakup()
{
	jQuery('#errorPopup').modal('hide');
	jQuery('.fromInc').css("border","2px solid #059ec7");
	jQuery('.toInc').css("border","2px solid #059ec7");
	jQuery('.IncentiveClass').css("border","2px solid #059ec7");
	var idValTxt = jQuery("#idVal").val();
	var idValStrArray = idValTxt.split(",");
	var completePercentange = 0;
	var countErrorFlag = 0;
  
	 for(j=0;j<idValStrArray.length;j++)
		{
			
				
			if(jQuery("#from_inc_"+idValStrArray[j]).val() == '')
			{
				countErrorFlag = 1;
				jQuery("#errorContent").html('you can not Leave blank.');
				jQuery("#from_inc_"+idValStrArray[j]).css("border","2px solid red");
				jQuery('#errorPopup').modal('show');
			}
			if(jQuery("#to_inc_"+idValStrArray[j]).val() == '')
			{
				countErrorFlag = 1;
				jQuery("#errorContent").html('you can not Leave blank.');
				jQuery("#to_inc_"+idValStrArray[j]).css("border","2px solid red");
				jQuery('#errorPopup').modal('show');
			}
			else if(jQuery("#values_"+idValStrArray[j]).val() == '')
			{
				countErrorFlag = 1;
				jQuery("#errorContent").html('you can not Leave blank.');
				jQuery("#values_"+idValStrArray[j]).css("border","2px solid red");
				jQuery('#errorPopup').modal('show');
			}
			else
			{
						//nothings to do
			}
		}
		
		if(parseInt(countErrorFlag) == parseInt(0))
		{
			
				document.getElementById('incentiveFrm').submit();
		}
		
		
	
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
<input type="hidden" id="labelBreakup" value="1"/>
<input type="hidden" id="idVal" value="1"/>
<input type="hidden" id="idValCount" value="1"/>
@stop