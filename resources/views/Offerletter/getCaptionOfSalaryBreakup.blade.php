 <label>Select Salary Caption<em>*</em></label>
		<select class="selectpicker form-control" data-live-search="true" id="caption" name="offerLetterData[caption]" onchange="salaryBreakUpFunc();">
                <option value="">Select Caption</option>
				@foreach($salaryDetails as $salary)
					<option value="{{ $salary->caption }}">{{ $salary->caption }}</option>
				@endforeach
		</select>