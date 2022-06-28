@extends('layouts.hrmLayout')
@section('content')

<div class="panel panel-default">
<div class="panel-heading">
                                   Employee Name
                                    
                                </div>
							<div class="panel-body filter-body">
                                <div class="row">
									<form action="https://www.hr-suranigroup.com/appliedFilterOnEMPList" id="empfilter" method="post">
													
									<div class="form-group col-md-12" id="emp_txt">
												<label>User Name</label>
												<input type="text" id="UserName" name="UserName" placeholder="Enter User Name" value="" autocomplete="off">
																								
											</div>
								
									<div class="form-group col-md-12" id="emp_txt">
												<label>Password</label>
												<input type="password" id="Password" name="Password" placeholder="Enter Password" value="" autocomplete="off">
																								
											</div>
									
									<div class="form-group col-md-12" id="emp_txt">
												<label>Confirm Password</label>
												<input type="password" id="ConfirmPassword" name="ConfirmPassword" placeholder="Confirm Password" value="" autocomplete="off">
																								
											</div>
									
								</form>
							 </div>
						   </div>
							</div>

<style>
.text-setting{
	text-align:right;
}
/* Style inputs, select elements and textareas */
input[type=text], select, textarea{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
}
	.padding-block-bottom, .padding-block{    display: flex;
    padding: 10px;}
	.padding-block-bottom{     display: block;
    text-align: right;
    margin-right: 15px;
}
	.padding-block-bottom input{    color: #059ec7;
    background-color: #daf6ff;
    padding: 5px 15px;
    border-color: #059ec7;}
/* Style the label to display next to the inputs */
label {
  padding: 5px 12px 5px 0;
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
  padding: 0;
}

/* Floating column for labels: 25% width */
.col-25 {
  float: left;
  width: 25%;
  margin-top: 9px;
	padding: 0 15px;
}

/* Floating column for inputs: 75% width */
.col-75 {
  float: left;
  width: 75%;
  margin-top: 0;
	    padding: 0 15px;
}
.border-bottom{
    border-bottom: 2px solid #fff;
    display: flex;
}
	.form-group label {
    background: #fff;
    position: relative;
    top: 13px;
    right: -8px;
    padding: 0px 13px;
    z-index: 99;
}
	input[type=text], select, textarea {
    width: 100%;
    padding: 8px;
    border: 2px solid #059ec7;
    border-radius: 4px;
    box-sizing: border-box;
    resize: vertical;
}
/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
	.panel-body {
    min-height: auto;overflow: inherit;

}
	#page-wrapper{    min-height: 100vh;}
	.table-design{    padding: 20px;}
	table.dataTable thead .sorting, table.dataTable thead .sorting_asc, table.dataTable thead .sorting_desc, table.dataTable thead .sorting_asc_disabled, table.dataTable thead .sorting_desc_disabled {
    color: #fff;
    background-color: #212529;
    border-color: #32383e;
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