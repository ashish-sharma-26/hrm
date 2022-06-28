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
	   .input-group-prepend {
    position: absolute;
    bottom: 7px;
}
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
	<form action="{{ url('manageSalaryBackupPost') }}" id="salarystu" method="post" enctype="multipart/form-data">

	@csrf
  <div class="panel panel-default">
	  
    <div class="panel-heading">
		<div class="col-lg-4"> Manage Salary Breakup </div>
		 <div class="col-lg-8 filter-button text-right">
									
										 <a class="btn btn-light" href="{{url('manageSalaryStructure')}}" role="button"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</a>
								
										 
									</div>
	</div>
    <div class="panel-body">
     
	  

     
        <div class="row">
                
          <div class="col-lg-12">
			
			  <div class="form-group col-md-3">
              <label>Select Department<em>*</em></label>
              <select class="selectpicker form-control" data-live-search="true" id="department" name="salaryBreakup[department]">
                <option value="">Select Department</option>
				@foreach($departmentDetails as $department)
					<option value="{{ $department->id }}">{{ $department->department_name }}</option>
				@endforeach
              </select>
              
            </div>
			 <div class="form-group col-md-3">
              <label>Select Designation<em>*</em></label>
              <select class="selectpicker form-control" data-live-search="true" id="designation" name="salaryBreakup[designation]">
                <option value="">Select Designation</option>
					@foreach($designationDetails as $_designate)					
					<option value="{{ $_designate->id}}">{{ $_designate->name }}</option>					
					@endforeach

              </select>
              
            </div>
			
					<div class="form-group col-md-3">
					  <label>Enter Salary Breakup Caption<em>*</em></label>
					  <input type="text" placeholder="Enter Caption" id="caption" name="salaryBreakup[caption]" autocomplete="off">
					</div>
					
					<div class="form-group col-md-3">
					  <label>Enter Monthly Salary(AED)<em>*</em></label>
					  <input type="text" placeholder="Enter Monthly Salary" id="monthly_salary" name="salaryBreakup[monthly_salary]" autocomplete="off">
					</div>
			<div class="form-group col-md-12" style="padding-right: 0;    margin-top: 22px;">  
					<div class="form-group col-md-7">
					&nbsp;
					</div>
					<div class="form-group col-md-3">							
												<a class="btn btn-primary" href="javascript:void(0);" role="button" style="     width: 100%;
    padding: 8px 12px;
    margin-top: 3px;
    font-weight: bold;
    float: right;
    margin-right: 15px;
    font-size: 13px;
    letter-spacing: 0;" onclick="createSalaryStructure();"><i class="fa fa-share-square-o" aria-hidden="true" style="margin-right: 5px;"></i>Create Salary Breakup</a>
											
												
												
			</div>
			<div class="form-group col-md-2">							
												<a class="btn btn-danger" href="javascript:void(0);" role="button" style="     width:  100%;
    padding: 8px 12px;
    margin-top: 3px;
    font-weight: bold;
    float: right;
    margin-right: 15px;
    font-size: 13px;
    letter-spacing: 0;" onclick="resetSalary();"><i class="fa fa-repeat" aria-hidden="true" style="margin-right: 5px;"></i>Reset</a>
											
												
												
			</div>
			</div>
			</div>
			
		
        </div>
 
      
      <!-- /.row --> 
    </div>
	  
	      
  </div>
		  <div class="panel panel-default" id="breackupContentPanel" style="display:none;">
		<div class="panel-heading">
		<div class="col-lg-12">Create salary breakup  as per main salary package</div>
		 
	</div>
		<div class="panel-body">
     
	  

     
        <div class="row">
	  
	  	<div id="breackupContent">
				<div class="col-lg-12">
					
					<div class="form-group col-md-3">
					  <label>Label Name<em>*</em></label>
					  <input type="text" placeholder="Enter Label" class="labelClass" id="label_name_1" name="salaryBreakup[label_name][]" autocomplete="off">
					</div>
					<div class="form-group col-md-3 aed-cont">
					  <label>Percentange<em>*</em></label>
					  <div class="input-group-prepend"><span class="percentageCC input-group-text">%</span>	</div><input type="text" placeholder="Enter Percentange" class="PercentangeClass" id="percentange_1" name="salaryBreakup[percentange][]" autocomplete="off">
					</div>
						<div style="display:none;" id="addMoreBreakupId">
				
				<div class="form-group col-md-3" style="padding-right: 0;    margin-top: 22px;" >  
												
													
													<a class="btn btn-success" href="javascript:void(0);" role="button" style="    width: 100%;
													padding: 8px 12px;
													margin-top: 3px;
													font-weight: bold;
													float: right;
													margin-right: 15px;" onclick="addMoreBreakup();"><i class="fa fa-plus-square-o" aria-hidden="true" style="margin-right: 5px;"></i>Add More Breakup</a>
												
													
													
					</div>
				<div class="form-group col-md-3" style="padding-right: 0;    margin-top: 22px;" >  
												
													
													<a class="btn btn-info" href="javascript:void(0);" role="button" style="    width: 100%;
													padding: 8px 12px;
													margin-top: 3px;
													font-weight: bold;
													float: right;
													margin-right: 15px;" onclick="saveBreakup();"><i class="fa fa-cog" aria-hidden="true" style="margin-right: 5px;"></i>Submit</a>
												
													
													
					</div>
					
					
			</div>
				</div>							
										
			</div>
		
	  
	        </div>
 
      
      <!-- /.row --> 
    </div>
			    </div>
	       </form>
</div>
<script>
function createSalaryStructure()
{
	jQuery("#breackupContentPanel").hide();
	jQuery("#addMoreBreakupId").hide();
	inputValMSalary = jQuery("#monthly_salary").val();
	var mSalary = jQuery.isNumeric(inputValMSalary);
	if(jQuery("#department").val() == '')
	{
		jQuery("#errorContent").html('select department to proceed.');
		jQuery('#errorPopup').modal('show');
	}
	else if(jQuery("#designation").val() == '')
	{
		jQuery("#errorContent").html('select designation to proceed.');
		jQuery('#errorPopup').modal('show');
	}
	else if(jQuery("#caption").val() == '')
	{
		jQuery("#errorContent").html('enter caption to proceed.');
		jQuery('#errorPopup').modal('show');
	}
	else if(jQuery("#monthly_salary").val() == '')
	{
		jQuery("#errorContent").html('enter Monthly Salary to proceed.');
		jQuery('#errorPopup').modal('show');
	}
	else if(!mSalary)
	{
		jQuery("#errorContent").html('Monthly Salary should be to Numeric.');
		jQuery('#errorPopup').modal('show');
	}
	
	else
	{
		var deptId = jQuery("#department").val();
		var designId = jQuery("#designation").val();
		var cap = jQuery("#caption").val();
		jQuery.ajax({
						type: "GET",
						url: "{{ url('checkSalarybreakup') }}"+"/"+deptId+"/"+designId+'/'+cap,
						
						success: function(response){
							
							if(response == 'Allow')
							{
								jQuery("#breackupContentPanel").fadeIn(1000);
								jQuery("#addMoreBreakupId").fadeIn(1000);
							}
							else
							{
								jQuery("#errorContent").html('Salary Break already exist for selected department and designation so kindly use update process.');
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
	var html = '<div class="col-lg-12" id="row_'+newidValCountSet+'"><div class="form-group col-md-5"><label>Label Name<em>*</em></label><input type="text" placeholder="Enter Label" id="label_name_'+newidValCountSet+'" name="salaryBreakup[label_name][]" class="labelClass" autocomplete="off"></div><div class="form-group col-md-5 aed-cont"> <label>Percentange<em>*</em></label><div class="input-group-prepend"><span class="percentageCC input-group-text">%</span>	</div><input type="text" placeholder="Enter Percentange" id="percentange_'+newidValCountSet+'" name="salaryBreakup[percentange][]" class="PercentangeClass" autocomplete="off"></div><div class="form-group col-md-2" style="padding-right: 0;    margin-top: 22px;" ><a class="btn btn-danger" href="javascript:void(0);" role="button" style="    width: 100%;padding: 8px 12px;margin-top: 3px;font-weight: bold;float: right;margin-right: 15px;" onclick="removerow('+newidValCountSet+','+newidValCountSet+');"><i class="fa fa-times" aria-hidden="true" style="margin-right: 5px;"></i>Remove</a></div></div>'
	
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
	jQuery('.labelClass').css("border","2px solid #059ec7");
	jQuery('.PercentangeClass').css("border","2px solid #059ec7");
	var idValTxt = jQuery("#idVal").val();
	var idValStrArray = idValTxt.split(",");
	var completePercentange = 0;
	var countErrorFlag = 0;
  
	 for(j=0;j<idValStrArray.length;j++)
		{
				var inputVal = jQuery("#percentange_"+idValStrArray[j]).val();
                var percentangeVal = jQuery.isNumeric(inputVal);
				jQuery("#percentange_"+idValStrArray[j]).css("border","2px solid #059ec7");
				
			if(jQuery("#label_name_"+idValStrArray[j]).val() == '')
			{
				countErrorFlag = 1;
				jQuery("#errorContent").html('you can not Leave blank.');
				jQuery("#label_name_"+idValStrArray[j]).css("border","2px solid red");
				jQuery('#errorPopup').modal('show');
			}
			else if(jQuery("#percentange_"+idValStrArray[j]).val() == '')
			{
				countErrorFlag = 1;
				jQuery("#errorContent").html('you can not Leave blank.');
				jQuery("#percentange_"+idValStrArray[j]).css("border","2px solid red");
				jQuery('#errorPopup').modal('show');
			}
			else if(!percentangeVal)
			{
				countErrorFlag = 1;
				jQuery("#errorContent").html('Percentange should be number.');
				jQuery("#percentange_"+idValStrArray[j]).css("border","2px solid red");
				jQuery('#errorPopup').modal('show'); 
			}
			else
			{
						var inputValPercentange = jQuery("#percentange_"+idValStrArray[j]).val();
						completePercentange = parseInt(completePercentange)+parseInt(inputValPercentange);
			}
		}
		
		if(parseInt(completePercentange) != parseInt(100) && parseInt(countErrorFlag) == parseInt(0))
		{
				jQuery("#errorContent").html('Percentange should equal to 100.');
				jQuery("#percentange_"+idValStrArray[j]).css("border","2px solid red");
				jQuery('#errorPopup').modal('show'); 
		}
		else if(parseInt(completePercentange) == parseInt(100) && parseInt(countErrorFlag) == parseInt(0))
		{
				document.getElementById('salarystu').submit();
		}
		else
		{
			//nothing to do
		}
		
	
}

function resetSalary()
{
	window.location.reload();
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