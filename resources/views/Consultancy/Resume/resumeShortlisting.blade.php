@extends($layoutName)
@section('content')

<?php
/* echo '<pre>';
print_r($datas['resumeLists']);
exit; */
?>
 <style>
        .panel-body {
    overflow:auto;
}
.dropdown-menu{    z-index: 999999;}
         
.loader {
  border: 16px solid #fe8e0e;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 75px;
  height: 75px;
  -webkit-animation: spin 2s linear infinite; /* Safari */
  animation: spin 2s linear infinite;    margin: 21% auto;
}

/* Safari */
@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes  spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
.overlay-spinner{    z-index: 9999999;
    position: fixed;
    width: 100%;
    text-align: center;
    height: 100vh;
    background: #fff;}

			
			
			
.col-lg-4.bottom-block-div {
    margin-bottom: 10px;
    padding: 0 5px;
}
.block-inner {
    padding: 10px;
    border: 2px solid #ff9e04;
    border-radius: 5px;

}
.check-box {
    display: block;
    position: relative;
    padding-left: 35px;
    margin-bottom: 12px;
    cursor: pointer;
    font-size: 22px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    float: left;
    width: 50%;
       padding: 15px;
}
.check-box input {
    position: absolute;
    opacity: 0;
    cursor: pointer;
    height: 0;
    width: 0;
}
.checkmark {
    position: absolute;
    top: 0;
    left: 0;
    height: 25px;
    width: 25px;
    background-color: #eee;
    border: 1px solid #666666;
}
.check-box:hover input ~ .checkmark {
    background-color: #ccc;
}
.block-top-heading, .block-top-complete {
padding: 0;
	margin-top: 10px;
		margin-bottom: 10px;
}
.block-top-heading h2 {
    margin: 0;
    font-family: Calibri;
    font-weight: bold;
    color: #ff9d02;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 200px;
	    font-size: 25px;
}
.block-top-heading h3 {
    margin: 7px 0;
    font-family: Calibri;
    font-weight: bold;
    color: #666666;
}
	
.block-top-complete .complete, .block-top-complete .incomplete, .pending {
    float: right;

    padding: 1px 18px;
    border-radius: 50px;
    color: #fff;
    font-weight: bold;
    margin: 0;
    margin-top: 5px;
}

.bottom-block .table {
    margin: 0;
}
.bottom-block .table > tbody > tr > td {
    padding: 4px;
    border: none;
    color: #666666;
    font-size: 1.3rem;
    width: 45%;
    display: inline-block;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    max-width: 200px;
}
			.bottom-block .table > tbody > tr > td span {
    float: right;
}
	 .p-0{padding: 0;}
.bottom-block .table > tbody > tr > td:nth-child(2) {
    font-weight: bold;
    text-align: right;
    width: 54%;
}
			.bottom-block .table > tbody > tr > td ul {
    margin: 0;
}
			.check-box input:checked ~ .checkmark {
    background-color: #ff9d02;
}
			.check-box .checkmark:after {
    left: 9px;
    top: 5px;
    width: 5px;
    height: 10px;
    border: solid white;
    border-width: 0 3px 3px 0;
    -webkit-transform: rotate(
45deg
);
    -ms-transform: rotate(45deg);
    transform: rotate(
45deg
);
}
			.checkmark:after {
    content: "";
    position: absolute;
    display: none;
}
			.check-box input:checked ~ .checkmark:after {
    display: block;
}
			.newBtn{width: 100%; margin-bottom: 10px;}
			.date{margin: 0; width: 100%;}
			.panel-body {
    min-height: auto;
}
			.margin-right{margin-right: 15px;}
			.float-right{float: right;}
			.pagination{    margin: 5px 0;}
	 	.select-all .select-cont {
    float: left;
    position: absolute;
    top: -2px;
    left: 36px;
    font-size: 2rem;
    font-weight: bold;
}
	 		.check-box.select-all{    position: relative;
    top: 15px;
}
	 .input-group-addon:last-child{    position: absolute;
    right: 0;
    z-index: 999999;
    padding: 9px;
    width: 39px;}
	 .form-group label{
    padding: 0;
}
	 .panel-orange{background-color: orange;}
	 .panel-green{background-color: green;}
	 .panel-red{background-color: red;}
	 .reject{background: rgba(255, 0, 0, .2) !important;
   
    opacity: .7;}
	 .selected{    background: rgba(30, 255, 0, .2) !important; }
	 @media only screen and (max-width: 600px) {
.col-lg-4.bottom-block-div {
     float: left;
    width: 100%;
}
		 .check-box.select-all{    width: 100%;}
	.check-box.select-all{    top: 10px;
    left: -24px;}
	.block-inner .col-lg-6:first-child{    width: 37%;
    float: left;}
	.block-inner .col-lg-6:last-child{width: 63%;
    float: left;}
}
        </style>
		
		
				<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


					
					<div class="container-fluid panel panel-default">
  <div class="panel-heading">
       Custom Filters
  </div>
   <div class="panel-body bottom-block">
 <form action="{{ url('resumeShortlistingFilter') }}" id="startS"method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">
<div class="col-md-12">
   <div class="col-md-3">
      <div class="form-group">
         <div class="input-group date" id="datetimepicker6">
			 <label>Date From</label>
            <input type="text" class="form-control" id="datef" name="date_from" value="{{$sessionValues['selecteddateFrom']}}"/>
            <span class="input-group-addon">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            </span>
         </div>
      </div>
   </div>
   <div class="col-md-3">
      <div class="form-group">
         <div class="input-group date" id="datetimepicker7" >
			 <label>Date To</label>
            <input type="text" class="form-control" id="datet" name="date_to" value="{{$sessionValues['selecteddateTo']}}"/>
            <span class="input-group-addon">
         <i class="fa fa-calendar" aria-hidden="true"></i>
            </span>
         </div>
      </div>
   </div>

        <div class="form-group col-md-3">
			<label>Select Consultancy</label>
            <select id="consultancy" class="selectpicker" name="consultancy">
					<option value="">Select Consultancy</option>
				@foreach($datas['consultancyLists'] as $_consultancy)
					<option value="{{ $_consultancy->id }}" @if($sessionValues['selectedConsultancy'] == $_consultancy->id) selected="selected" @endif>{{ $_consultancy->consultancy_name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group col-md-3">
			<label>Select Status</label>
            <select id="statusId" placeholder="Select Status" name="resumeStatus" class="selectpicker">
			<option value="">Select Status</option>
			@foreach($datas['status'] as $key=>$value)
					<option value="{{ $key }}" @if($sessionValues['selectedresumeStatus'] == $key) selected="selected" @endif>{{ $value }}</option>
			@endforeach

			</select> 
</div>
	<div class="form-group col-md-3">
<label>Records Per Page</label>
            <select id="recordperpage" name="recordperpage" placeholder="Select Status" class="selectpicker">
			<option value="8" @if($sessionValues['selectedrecordperpage'] == 8) selected="selected" @endif>8</option>
			<option value="16" @if($sessionValues['selectedrecordperpage'] == 16) selected="selected" @endif>16</option>
			<option value="24" @if($sessionValues['selectedrecordperpage'] == 24) selected="selected" @endif>24</option>
			<option value="64" @if($sessionValues['selectedrecordperpage'] == 64) selected="selected" @endif>64</option>

			</select>      
</div>
	<div class="text-right col-lg-9">
							<label></label>
                           
							<a href="javascript:void(0);" onclick="startSearch();" title="Edit" class="btn btn-primary">Search</a>	
						
                           <a href="javascript:void(0);" title="Edit" class="btn btn-primary margin-right" onclick="slideShow();">Slideshow</a>
								
					<a href="{{url('resetSearch')}}"  title="View" class="btn btn-danger margin-right">Reset</a>
								
                           
							</div>
							
		</div>
    </div>
	
	
	

</form>

</div> 




</div>
<div class="container-fluid panel panel-default">
  <div class="panel-heading">
         Resume Shortlisting <span>({{count($datas['resumeCount'])}} Resumes Found)</span>
  </div>
   <div class="panel-body bottom-block">
 <div class="pagination-container" >
	 
	 <div class="col-lg-12">
		 <div class="col-lg-6"><label class="check-box select-all">
                <input type="hidden" name="data[allcheck]" id="checkAll_" value="0"><input type="checkbox" name="data[allcheck]" id="checkAll" class="check" value="1">                <span class="checkmark" id="checkmark"></span> <span class="select-cont"> Select All</span> </label></div>
		 <div class="col-lg-6">
	 <div class="pagination pagination-centered pagination-large float-right">
  <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item" data-page="-">
      <a class="page-link" href="javascript:void(0);" tabindex="-1">Previous</a>
    </li>
	<?php
	$limitCount = $sessionValues['selectedrecordperpage'];
	$numberOfLinks = count($datas['resumeCount'])/$limitCount;
	if(is_float($numberOfLinks) && $numberOfLinks >1)
	{
		$numberOfLinks = round($numberOfLinks)+1;
	}
	else
	{
		$numberOfLinks = round($numberOfLinks);
	}
	?>
	@for($index=0;$index<$numberOfLinks;$index++)
		<li class="page-item" data-page="1"><a class="page-link" href="javascript:void(0);" onclick="runpage({{$limitCount}},{{$index*$limitCount}})">{{$index+1}}</a></li>
	@endfor
    
   
    <li class="page-item" data-page="+"><a class="page-link" href="javascript:void(0);">Next</a></li>
  </ul>
</nav>
   </div>
		 	 </div>
	 </div>
	 
	 
    <div class="row" id="showdatas">
		
		
    </div>
	  
	   
	<div class="pagination pagination-centered pagination-large float-right">
  <nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item" data-page="-">
      <a class="page-link" href="javascript:void(0);" tabindex="-1">Previous</a>
    </li>
    @for($index=0;$index<$numberOfLinks;$index++)
		<li class="page-item" data-page="1"><a class="page-link" href="javascript:void(0);" onclick="runpage({{$limitCount}},{{$index*$limitCount}})">{{$index+1}}</a></li>
	@endfor
    <li class="page-item" data-page="+"><a class="page-link" href="javascript:void(0);">Next</a></li>
  </ul>
</nav>
   </div>

	
	

</div>

</div> 




</div> 

<script>
$(document).ready(function(){
	 jQuery('#showdatas').hide();
	 $.ajax({
							type: "GET",
							url: "{{url('showResume')}}/{{$limitCount}}/0",
							
							success: function(response){
								
								jQuery('#showdatas').html(response);
								jQuery('#showdatas').fadeIn(1000);
							}
						});  
});
function startSearch()
{
	if(document.getElementById('datef').value != '' && document.getElementById('datet').value == '')
	{
		alert('Kindly select both date to proceed search');
	}
	else if(document.getElementById('datef').value == '' && document.getElementById('datet').value != '')
	{
		alert('Kindly select both date to proceed search');
	}
	else
	{
	document.getElementById('startS').submit();
	}
}



function runpage(limit,skip)
{
	 jQuery('#showdatas').hide();
	 $.ajax({
							type: "GET",
							url: "{{url('showResume')}}/"+limit+"/"+skip,
							
							success: function(response){
								
								jQuery('#showdatas').html(response);
								jQuery('#showdatas').fadeIn(1000);
							}
						});  
}

function updateResumeStatus(idtxt,statusResume,feedbackCheck)
{
	if(statusResume == 'rejected')
	{
		
		idtxt = 'divR_'+$('#rejectResumeId').val();
	}
	
	if(feedbackCheck)
	{
		if($("#exampleFormControlTextarea1").val() == '')
		{
			alert("Kindly Enter Feedback to proceed");
		}
		else
		{
		$.ajax({
		  type: 'POST',
		  url: "{{url('setResumeFeedback')}}",
		  data:  { 'feedback' : $("#exampleFormControlTextarea1").val(),'_token':'{{ csrf_token() }}','idtext':idtxt,'statusResume':statusResume },
		  dataType: "text",
		  success: function(resultData) {  
			$('#'+idtxt).addClass("reject");
			$('#'+idtxt+'_R').hide();
			$('#'+idtxt+'_S').hide();
		  }
		}); 
		}
		
	}
	else
	{
		
		
	 $.ajax({
							type: "GET",
							url: "{{url('setResumeStatus')}}/"+idtxt+'/'+statusResume,
							
							success: function(response){
								if(statusResume == 'rejected')
									{
										$('#'+idtxt).addClass("reject");
									}
									else
									{
										$('#'+idtxt).addClass("selected");
									}
									$('#'+idtxt+'_R').hide();
									$('#'+idtxt+'_S').hide();
							}
						}); 
	}
}

function slideShow()
{
	if(document.getElementById('datef').value == '' || document.getElementById('datet').value == '' || document.getElementById('consultancy').value == '' || document.getElementById('statusId').value != '1') 
	{
		alert("Kindly select From date,To date, Consultancy and Status(Review Pending)");
	}
	else
	{
		var datef = document.getElementById('datef').value;
		var datet = document.getElementById('datet').value;
		var consultancy = document.getElementById('consultancy').value;
		var statusId = document.getElementById('statusId').value;
		window.location.href= "{{url('getResume')}}/"+consultancy+"/"+datef+"/"+datet;
	}
}
</script>
<style>
/* Style inputs, select elements and textareas */
input[type=text], select, textarea{
  width: 100%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
}
	.row{margin: 0;}
	.panel {
    padding: 0;
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
@media  screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
} 
</style>
<script type="text/javascript">
   $(function () {
       $('#datetimepicker6').datetimepicker();
       $('#datetimepicker7').datetimepicker({
   useCurrent: false //Important! See issue #1075
   });
       $("#datetimepicker6").on("dp.change", function (e) {
           $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
       });
       $("#datetimepicker7").on("dp.change", function (e) {
           $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
       });
   });
</script>
		<script>
		var paginationHandler = function(){
    // store pagination container so we only select it once
    var $paginationContainer = $(".pagination-container"),
        $pagination = $paginationContainer.find('.pagination ul');

    // click event
    $pagination.find("li a").on('click.pageChange',function(e){
        e.preventDefault();

        // get parent li's data-page attribute and current page
        var parentLiPage = $(this).parent('li').data("page"),
            currentPage = parseInt( $(".pagination-container div[data-page]:visible").data('page') ),
            numPages = $paginationContainer.find("div[data-page]").length;
        
        // make sure they aren't clicking the current page
        if ( parseInt(parentLiPage) !== parseInt(currentPage) ) {
            // hide the current page
            $paginationContainer.find("div[data-page]:visible").hide();

            if ( parentLiPage === '+' ) {
                // next page
                $paginationContainer.find("div[data-page="+( currentPage+1>numPages ? numPages : currentPage+1 )+"]").show();
            } else if ( parentLiPage === '-' ) {
                // previous page
                $paginationContainer.find("div[data-page="+( currentPage-1<1 ? 1 : currentPage-1 )+"]").show();
            } else {
                // specific page
                $paginationContainer.find("div[data-page="+parseInt(parentLiPage)+"]").show();
            }

        }
    });
};
$( document ).ready( paginationHandler );


function rejectResume(rID)
{
	document.getElementById("rejectResumeId").value = rID;
	$('#exampleModal').modal('show');
}
		</script>
<!-- Put Your Content -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-body">
         <div class="form-group">
    <label for="exampleFormControlTextarea1">Please Give your Feedback</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
      </div>
      <div class="modal-footer">
		  		  <button type="button" class="btn btn-secondary" data-dismiss="modal"  onclick="updateResumeStatus('','rejected',false);">Done Without Feedback</button>
		  		  <button type="button" class="btn btn-success" data-dismiss="modal"  onclick="updateResumeStatus('','rejected',true);">Done</button>


      </div>
    </div>
  </div>
</div>
<input type="hidden" id="rejectResumeId" value="0">
@stop