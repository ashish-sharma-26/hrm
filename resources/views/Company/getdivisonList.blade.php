	<label>Select Divison</label>
	<select id="divisonID" class="selectpicker" name="divisonID">
			<option value="">Any Divison</option>
		@foreach($divisonDetails as $_divison)	
			<option value="{{$_divison->id }}">{{$_divison->divison_name }}</option>
		@endforeach		
	</select>