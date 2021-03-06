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

			
			
			
.col-lg-3.bottom-block-div {
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
         <div class="input-group date" id="datetimepicker6" name="date_from">
			 <label>Date From</label>
            <input type="text" class="form-control" />
            <span class="input-group-addon">
            <i class="fa fa-calendar" aria-hidden="true"></i>
            </span>
         </div>
      </div>
   </div>
   <div class="col-md-3">
      <div class="form-group">
         <div class="input-group date" id="datetimepicker7" name="date_to">
			 <label>Date To</label>
            <input type="text" class="form-control" />
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
					<option value="{{ $_consultancy->id }}">{{ $_consultancy->consultancy_name }}</option>
				@endforeach
			</select>
		</div>
		<div class="form-group col-md-3">
			<label>Select Status</label>
            <select id="statusId" placeholder="Select Status" name="resumeStatus" class="selectpicker">
			<option value="">Select Status</option>
			@foreach($datas['status'] as $key=>$value)
					<option value="{{ $key }}">{{ $value }}</option>
			@endforeach

			</select> 
</div>
	<div class="form-group col-md-3">
<label>Records Per Page</label>
            <select id="recordperpage" name="recordperpage" placeholder="Select Status" class="selectpicker">
			<option value="8">8</option>
			<option value="16">16</option>
			<option value="24">24</option>
			<option value="64">64</option>

			</select>      
</div>
	<div class="text-right col-lg-9">
							<label></label>
                           <a href="#" title="View" class="btn btn-danger margin-right">Reset</a>
								
						
                           <a href="#" title="Edit" class="btn btn-primary margin-right">Slideshow</a>
								
					
								
                           <a href="javascript:void(0);" onclick="startSearch();" title="Edit" class="btn btn-primary">Search</a>
							</div>
							
		</div>
    </div>
	
	
	

</form>

</div> 




</div>
<div class="container-fluid panel panel-default">
  <div class="panel-heading">
         Resume Shortlisting
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
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
	<?php
	$numberOfLinks = count($datas['resumeCount'])/8;
	if(is_float($numberOfLinks))
	{
		$numberOfLinks = round($numberOfLinks)+1;
	}
	else
	{
		$numberOfLinks = round($numberOfLinks);
	}
	?>
	@for($index=0;$index<$numberOfLinks;$index++)
		<li class="page-item" data-page="1"><a class="page-link" href="javascript:void(0);" onclick="runpage(8,{{$index*8}})">{{$index+1}}</a></li>
	@endfor
    
   
    <li class="page-item" data-page="+"><a class="page-link" href="#">Next</a></li>
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
      <a class="page-link" href="#" tabindex="-1">Previous</a>
    </li>
    @for($index=0;$index<$numberOfLinks;$index++)
		<li class="page-item" data-page="1"><a class="page-link" href="javascript:void(0);" onclick="runpage(8,{{$index*8}})">{{$index+1}}</a></li>
	@endfor
    <li class="page-item" data-page="+"><a class="page-link" href="#">Next</a></li>
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
							url: "{{url('showResume')}}/8/0",
							
							success: function(response){
								
								jQuery('#showdatas').html(response);
								jQuery('#showdatas').fadeIn(1000);
							}
						});  
});
function startSearch()
{
	document.getElementById('startS').submit();
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
		</script>
<!-- Put Your Content -->
@stop