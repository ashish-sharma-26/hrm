@php 
		
		$required = 'required';
		
@endphp
@foreach($attributeArray as $_attr)
			@if($_attr->attrbute_type_id == 1)
				<div class="border-bottom">
					  <div class="col-25">
						<label for="{{$_attr->attribute_code}}">{{$_attr->attribute_name}}@if($_attr->attribute_requirement == 1) <span class="requiredClass">*</span>@endif</label>
					  </div>
					  <div class="col-75">
						
						<input type="text" id="{{$_attr->attribute_code}}" name="{{$_attr->attribute_code}}" placeholder="{{$_attr->attribute_name}}.." @if($_attr->attribute_requirement == 1) {{ $required }} @endif>
					  </div>
				</div>
			@endif
	  
	 
			@if($_attr->attrbute_type_id == 2)
				<div class="border-bottom">
					  <div class="col-25">
						<label for="{{$_attr->attribute_code}}">{{$_attr->attribute_name}}@if($_attr->attribute_requirement == 1) <span class="requiredClass">*</span>@endif</label>
					  </div>
					  <div class="col-75">
						
						<input type="file" id="{{$_attr->attribute_code}}" name="{{$_attr->attribute_code}}" placeholder="upload {{$_attr->attribute_name}}.." @if($_attr->attribute_requirement == 1) {{ $required }} @endif>
						<input type="hidden" class="imgfile" name="{{$_attr->attribute_code}}">
					  </div>

 
				</div>
			@endif
			@if($_attr->attrbute_type_id == 4)
				<div class="border-bottom">
					  <div class="col-25">
						<label for="{{$_attr->attribute_code}}">{{$_attr->attribute_name}}@if($_attr->attribute_requirement == 1) <span class="requiredClass">*</span>@endif</label>
					  </div>


					 
                <div class='col-75 input-group date' id='datetimepicker1'>
                    <input type='text' id="{{$_attr->attribute_code}}" name="{{$_attr->attribute_code}}" placeholder="{{$_attr->attribute_name}}.." @if($_attr->attribute_requirement == 1) {{ $required }} @endif/>
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
						<select id="{{$_attr->attribute_code}}" name="{{$_attr->attribute_code}}" @if($_attr->attribute_requirement == 1) {{ $required }} @endif>
							  <option value="">Please select Any..</option>
									@foreach(json_decode($_attr->opt_option) as $_opt)
											 <option value="{{$_opt}}">{{$_opt}}</option>
									@endforeach
							  
							</select>
						 
					  </div>
				</div>
			
				
			@endif
	@endforeach