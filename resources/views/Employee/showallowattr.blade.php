	@foreach($attributesDetails as $_attr)
		@php 
		
		$required = 'required';
		
		@endphp
			@if($_attr->attrbute_type_id == 1)
				
				<div class="border-bottom">
					  <div class="col-25">
						<label for="{{$_attr->attribute_code}}">{{$_attr->attribute_name}} @if($_attr->attribute_requirement == 1) <span class="requiredClass">*</span>@endif</label>
					  </div>
					  <div class="col-75">
						
						<input type="text" id="{{$_attr->attribute_code}}" name="{{$_attr->attribute_code}}" placeholder="{{$_attr->attribute_name}}.." @if($_attr->attribute_requirement == 1) {{ $required }} @endif>
					  </div>
				</div>
			@endif
	  
	 
			@if($_attr->attrbute_type_id == 2)
				<div class="border-bottom">
					  <div class="col-25">
						<label for="{{$_attr->attribute_code}}">{{$_attr->attribute_name}} @if($_attr->attribute_requirement == 1) <span class="requiredClass">*</span>@endif</label>
					  </div>
					  <div class="col-75">
						
						<input type="file" id="{{$_attr->attribute_code}}" name="{{$_attr->attribute_code}}" placeholder="upload {{$_attr->attribute_name}}.." @if($_attr->attribute_requirement == 1) {{ $required }} @endif >
						<input type="hidden" class="imgfile" name="{{$_attr->attribute_code}}">
					  </div>





<script>
    
        jQuery('input[type="file"]').change(function(e)
		{			
            var fileName = e.target.files[0].name;
			jQuery('.imgfile').val(fileName);            
        });
    
</script>
  <script type="text/javascript">
 jQuery(function () {
   var bindDatePicker = function() {
		jQuery(".date").datetimepicker({
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

			jQuery(this).val(date);
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
						<label for="{{$_attr->attribute_code}}">{{$_attr->attribute_name}} @if($_attr->attribute_requirement == 1) <span class="requiredClass">*</span>@endif</label>
					  </div>


					 
                <div class='col-75 input-group date' >
                    <input type='text' id="{{$_attr->attribute_code}}" name="{{$_attr->attribute_code}}" placeholder="{{$_attr->attribute_name}}.." @if($_attr->attribute_requirement == 1) {{ $required }} @endif />
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
						<label for="{{$_attr->attribute_code}}">{{$_attr->attribute_name}} @if($_attr->attribute_requirement == 1) <span class="requiredClass">*</span>@endif</label>
					  </div>
					  <div class="col-75">
						<select id="{{$_attr->attribute_code}}" name="{{$_attr->attribute_code}}" @if($_attr->conditional_attribute == 2) onchange="getconditionalOpt('{{$_attr->attribute_code}}');" @endif  @if($_attr->attribute_requirement == 1) {{ $required }} @endif>
							  <option value="">Please select Any..</option>
									@foreach(json_decode($_attr->opt_option) as $_opt)
											 <option value="{{$_opt}}">{{$_opt}}</option>
									@endforeach
							  
							</select>
						 
					  </div>
				</div>
				@if($_attr->conditional_attribute == 2)
					<div id="{{$_attr->attribute_code}}_conditional" style="display:none;">
				
					</div>
				@endif
				
			@endif
	@endforeach