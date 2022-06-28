<div class="col-25">
			<label for="parent_attr_opt">Parent Attribute Options</label>
		  </div>
		  <div class="col-75">
			<select id="parent_attr_opt" name="parent_attr_opt[]" required multiple>
			  <option value="">Please select Any..</option>
					@foreach($result['allOptions'] as $_optArr)
					       @if(in_array($_optArr,$result['optArrSelected']))
							   <option value="{{$_optArr}}" selected="selected">{{$_optArr}}</option>
						   @else
							   <option value="{{$_optArr}}">{{$_optArr}}</option>
						   @endif
					@endforeach
			  
			</select>
</div>