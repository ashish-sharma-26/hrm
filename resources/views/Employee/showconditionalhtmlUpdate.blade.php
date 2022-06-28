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
						
						<input type="text" id="{{$_attr->attribute_code}}" name="{{$_attr->attribute_code}}" placeholder="{{$_attr->attribute_name}}.." @if(isset($empDetailsArray[$_attr->attribute_code])) value="{{$empDetailsArray[$_attr->attribute_code]}}"  @endif @if($_attr->attribute_requirement == 1) {{ $required }} @endif>
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
						
							<input type="file" id="{{$_attr->attribute_code}}" name="{{$_attr->attribute_code}}" placeholder="upload {{$_attr->attribute_name}}.." @if($_attr->attribute_requirement == 1) {{ $required }} @endif>
							<input type="hidden" class="imgfile" name="{{$_attr->attribute_code}}">
						
						@endif
						
					  </div>

 
				</div>
			@endif
			@if($_attr->attrbute_type_id == 4)
				<div class="border-bottom">
					  <div class="col-25">
						<label for="{{$_attr->attribute_code}}">{{$_attr->attribute_name}}@if($_attr->attribute_requirement == 1) <span class="requiredClass">*</span>@endif</label>
					  </div>


					 
                <div class='col-75 input-group date' id='datetimepicker1'>
                    <input type='text' id="{{$_attr->attribute_code}}" name="{{$_attr->attribute_code}}" placeholder="{{$_attr->attribute_name}}.." @if(isset($empDetailsArray[$_attr->attribute_code])) value="{{$empDetailsArray[$_attr->attribute_code]}}"  @endif @if($_attr->attribute_requirement == 1) {{ $required }} @endif/>
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
						<select id="{{$_attr->attribute_code}}" name="{{$_attr->attribute_code}}" @if($_attr->attribute_requirement == 1) {{ $required }} @endif >
							  <option value="">Please select Any..</option>
									@foreach(json_decode($_attr->opt_option) as $_opt)
											 <option value="{{$_opt}}" @if(isset($empDetailsArray[$_attr->attribute_code]) && $empDetailsArray[$_attr->attribute_code] == $_opt) selected="selected" @endif>{{$_opt}}</option>
									@endforeach
							  
							</select>
						 
					  </div>
				</div>
			
				
			@endif
	@endforeach