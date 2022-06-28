@extends($layoutName)
@section('content')

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<script>
    $j1 = $.noConflict();
        $j1(function () {
   var bindDatePicker = function() {
		$j1(".date").datetimepicker({
        format:'YYYY-MM-DD',
			icons: {
				time: "fa fa-clock-o",
				date: "fa fa-calendar",
				up: "fa fa-arrow-up",
				down: "fa fa-arrow-down"
			}
		}).find('input:first').on("blur",function () {
			// check if the date is correct. We can accept dd-mm-yyyy and yyyy-mm-dd.
			// update the format if it's yyyy-mm-dd
			var date = parseDate($j1(this).val());

			if (! isValidDate(date)) {
				//create date based on momentjs (we have that)
				date = moment().format('YYYY-MM-DD');
			}

			$j1(this).val(date);
		});
	}
   
   var isValidDate = function(value, format) {
		format = format || false;
		// lets parse the date to the best of our knowledge
		if (format) {
			value = parseDate(value);
		}

		var timestamp = Date.parse(value);

		return isNaN(timestamp) == false;
   }
   
   var parseDate = function(value) {
		var m = value.match(/^(\d{1,2})(\/|-)?(\d{1,2})(\/|-)?(\d{4})$/);
		if (m)
			value = m[5] + '-' + ("00" + m[3]).slice(-2) + '-' + ("00" + m[1]).slice(-2);

		return value;
   }
   
   bindDatePicker();
 });
</script>
<div class="container panel panel-default">
  <div class="panel-heading">
          Get Resume As Per Consultancy                             
  </div>
   <div class="panel-body">
 
    <div class="row">
      <div class="col-25">
        <label for="consultancy_name">Select Consultancy Name</label>
      </div>
      <div class="col-75">
        <select id="consultancy_name" name="consultancy_name" required>
				<option value="">Select Consultancy Name</option>
			@foreach($consultancy_data as $_consult)
				<option value="{{$_consult->id}}">{{$_consult->consultancy_name}}</option>
			@endforeach
		</select>
       
      </div>
    </div>
	
	
	
	<div class="row">
      <div class="col-25">
        <label for="added_date">Select Added Date</label>
      </div>
      <div class="col-75 input-group date">
        <input type='text' id="added_date" name="added_date" placeholder="Select Added Date.." required />
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
        </span>
       
      </div>
    </div>
	
	
	
    
    <div class="row">
      <input type="button" value="Get Resume" class="btn btn-info" onclick="return getAllResume();">
    </div>


<div id="downloadallR" class="downloadall" style="display:none;">

</div>

</div> 




</div> 
<script>

function getAllResume()
{
	var consultancyId = $j1("#consultancy_name").val();
	var added_date = $j1("#added_date").val();
	if(consultancyId == '')
	{
		alert("Kindly Select Consultancy To Proceed.");
	}
	else if(added_date == '')
	{
		alert("Kindly Select Added Date To Proceed.");
	}
	else
	{
		window.open("{{url('getResume')}}/"+consultancyId+'/'+added_date,'_blank');
		 /* $j1.ajax({
							type: "GET",
							url: "{{url('getResume')}}/"+consultancyId+'/'+added_date,
							
							success: function(response){
								$j1("#downloadallR").html(response);
								$j1("#downloadallR").fadeIn(1000);
							}
						});  */
	}
	
	
}
</script>
<style>
/* Style inputs, select elements and textareas */
input[type=text], select, textarea{
  width: 100%;
  padding: 12px;
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
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
} 
</style>
@stop