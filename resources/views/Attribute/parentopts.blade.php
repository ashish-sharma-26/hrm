<div class="col-25">
			<label for="parent_attr_opt">Parent Attribute Options</label>
		  </div>
		  <div class="col-75">
			<select id="parent_attr_opt" name="parent_attr_opt[]" required multiple>
			  <option value="">Please select Any..</option>
					@foreach($optArr as $_optArr)
							 <option value="{{$_optArr}}">{{$_optArr}}</option>
					@endforeach
			  
			</select>
</div>