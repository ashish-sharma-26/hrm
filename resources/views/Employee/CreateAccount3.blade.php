@extends('layouts.hrmLayout')
@section('content')

<div class="panel panel-default">
<div class="panel-heading">
                                   Employee Name
                                    
                                </div>
							<div class="panel-body filter-body">
                                <div class="row">
									<div class="table-design">
									<table id="example" class="table table-striped table-bordered dataTable no-footer" style="width: 100%;" role="grid" aria-describedby="example_info">
  <thead>
    <tr role="row">

      <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Employee Id: activate to sort column ascending" style="width: 104px;">Employee Id</th>
      <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="First Name: activate to sort column ascending" style="width: 126px;">First Name</th>
      <th class="sorting" tabindex="0" aria-controls="example" rowspan="1" colspan="1" aria-label="Middle Name: activate to sort column ascending" style="width: 141px;">Middle Name</th>
      
      
    </tr>
  </thead>
  <tbody>
    <tr class="odd">
      <td>100480</td>
      <td>Ahalya</td>
      <td>Koonampuravely</td>
      
      
    </tr>
    <tr class="even">
      <td>100479</td>
      <td>Anuj Kumar</td>
      <td>Pradeep</td>

      
    </tr>
    <tr class="odd">
      <td>100478</td>
      <td>Sadath</td>
      <td>Hamsa</td>

      
    </tr>
    <tr class="even">
      <td>100477</td>
      <td>Shahnawaz</td>
      <td>Gul Khan</td>

      
    </tr>
    <tr class="odd">
      <td>100476</td>
      <td>Christopher</td>
      <td>John</td>

      
    </tr>
    <tr class="even">
      <td>100475</td>
      <td>Prajitha</td>
      <td>Gopalan</td>

      
    </tr>
    <tr class="odd">
      <td>100474</td>
      <td>Kamran</td>
      <td>Saleem</td>

      
    </tr>
    <tr class="even">
      <td>100473</td>
      <td>Mohd</td>
      <td>Umar</td>

      
    </tr>
    <tr class="odd">
      <td>100472</td>
      <td>Vazahat</td>
      <td>Ulla</td>

      
    </tr>
    <tr class="even">
      <td>100471</td>
      <td>Srenethe</td>
      <td>Swaminathan</td>

      
    </tr>
  </tbody>
</table>
										</div>

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