	<?php

	$empDetailsArray = array();
	foreach($empDetails as $emp_m)
	{
		$empDetailsArray[$emp_m->attribute_code] = $emp_m->attribute_values;
	}

	
	?>
	<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script>
		$j1 = $.noConflict();
	</script>
	@php 
		
		$required = 'required';
		
	@endphp
	@foreach($attributesDetails as $_attr)

			@if($_attr->attrbute_type_id == 1)
				<div class="border-bottom">
					  <div class="col-25">
						<label for="{{$_attr->attribute_code}}">{{$_attr->attribute_name}}@if($_attr->attribute_requirement == 1) <span class="requiredClass">*</span>@endif</label>
					  </div>
					  <div class="col-75">
						
						<input type="text" id="{{$_attr->attribute_code}}" name="{{$_attr->attribute_code}}" placeholder="{{$_attr->attribute_name}}.." @if(isset($empDetailsArray[$_attr->attribute_code])) value="{{$empDetailsArray[$_attr->attribute_code]}}" @endif @if($_attr->attribute_requirement == 1) {{ $required }} @endif>
					  </div>
				</div>
			@endif
	 
	 
			@if($_attr->attrbute_type_id == 2)
				<div class="border-bottom">
					  <div class="col-25">
						<label for="{{$_attr->attribute_code}}">{{$_attr->attribute_name}}@if($_attr->attribute_requirement == 1) <span class="requiredClass">*</span>@endif</label>
					  </div>
					  <div class="col-75">
						@if(isset($empDetailsArray[$_attr->attribute_code])) 
						<span id="showV_{{$_attr->attribute_id}}">	
						 <img src="{{ asset('empData/')}}/{{ $empDetailsArray[$_attr->attribute_code] }}" alt="" class="img-responsive">
						<a href="javascript:void(0);" onclick="updateMeImage({{$_attr->attribute_id}})" class="update_b1">Edit</a>
						<br />
						{{$empDetailsArray[$_attr->attribute_code]}}
						</span>
						
						<span id="showEditV_{{$_attr->attribute_id}}" style="display:none;">
						 <input type="file" id="{{$_attr->attribute_code}}" name="{{$_attr->attribute_code}}" placeholder="upload {{$_attr->attribute_name}}..">
						 <input type="hidden" class="imgfile" name="{{$_attr->attribute_code}}">
						<a href="javascript:void(0);" onclick="updateMeImageback({{$_attr->attribute_id}})" class="update_b1">Back</a>
						</span>
						
						@else
							<input type="file" id="{{$_attr->attribute_code}}" name="{{$_attr->attribute_code}}" placeholder="upload {{$_attr->attribute_name}}.."  @if($_attr->attribute_requirement == 1) {{ $required }} @endif>
							<input type="hidden" class="imgfile" name="{{$_attr->attribute_code}}">
						@endif
						
					  </div>





<script>
        $j1('input[type="file"]').change(function(e)
		{			
		
            var fileName = e.target.files[0].name;
			$j1('.imgfile').val(fileName);            
        });
    
</script>
  <script type="text/javascript">
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






					  
				</div>
			@endif
			@if($_attr->attrbute_type_id == 4)
				<div class="border-bottom">
					  <div class="col-25">
						<label for="{{$_attr->attribute_code}}">{{$_attr->attribute_name}}@if($_attr->attribute_requirement == 1) <span class="requiredClass">*</span>@endif</label>
					  </div>


					 
                <div class='col-75 input-group date' >
                    <input type='text' id="{{$_attr->attribute_code}}" name="{{$_attr->attribute_code}}" placeholder="{{$_attr->attribute_name}}.." @if(isset($empDetailsArray[$_attr->attribute_code])) value="{{$empDetailsArray[$_attr->attribute_code]}}" @endif @if($_attr->attribute_requirement == 1) {{ $required }} @endif/>
                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                    </span>
                </div>
           





<!-- 
					  <div class="col-75">
						
						<input type="text" id="{{$_attr->attribute_code}}" name="{{$_attr->attribute_code}}" placeholder="{{$_attr->attribute_name}}.." required>
					  </div> -->
				</div>
			@endif
			
			@if($_attr->attrbute_type_id == 3)
				<div class="border-bottom">
					  <div class="col-25">
						<label for="{{$_attr->attribute_code}}">{{$_attr->attribute_name}}@if($_attr->attribute_requirement == 1) <span class="requiredClass">*</span>@endif</label>
					  </div>
					  <div class="col-75">
						<select id="{{$_attr->attribute_code}}" name="{{$_attr->attribute_code}}" @if($_attr->conditional_attribute == 2) onchange="getconditionalOptUpdate('{{$_attr->attribute_code}}');" @endif @if($_attr->attribute_requirement == 1) {{ $required }} @endif>
							  <option value="">Please select Any..</option>
									@foreach(json_decode($_attr->opt_option) as $_opt)
											
											 <option value="{{$_opt}}" @if(isset($empDetailsArray[$_attr->attribute_code]) && $empDetailsArray[$_attr->attribute_code] == $_opt) selected= "selected" @endif>{{$_opt}}</option>
									@endforeach
							  
							</select>
						 
					  </div>
				</div>
				@if($_attr->conditional_attribute == 2)
					<script>
						$j1(document).ready(function(){
							
							getconditionalOptUpdate('{{$_attr->attribute_code}}');
							
						});
					</script>
					<div id="{{$_attr->attribute_code}}_conditional" style="display:none;">
				
					</div>
				@endif
				
			@endif
	@endforeach
	
	 <script>
	  function updateMeImage(code)
	  {
		  jQuery("#showV_"+code).hide();
		  jQuery("#showEditV_"+code).fadeIn(1000);
	  }
	  function updateMeImageback(code)
	  {
		  jQuery("#showEditV_"+code).hide();
		  jQuery("#showV_"+code).fadeIn(1000); 
	  }
	  
	  </script>