 
	
 <div class="border-bottom">
	 <div class="col-25">
			<label>Visa Stage</label>
	 </div>
	 <div class="col-75">
             <select id="visa_stage" name="visa_stage" required>
				<option value="">Please select Any..</option>
				@foreach($visaStageLists as $_visaStage)
					<option value="{{$_visaStage->id}}">{{$_visaStage->stage_name}}</option>
				@endforeach
			</select>
	 </div>
  </div>
  
  
  <div class="border-bottom">
	 <div class="col-25">
			<label>Comment</label>
	 </div>
	 <div class="col-75">
         <textarea name="comment"  placeholder="Enter Comment.." required>  </textarea>   
	 </div>
  </div>
  
  <div class="border-bottom">
	 <div class="col-25">
			<label>Status of Stage</label>
	 </div>
	 <div class="col-75">
            <select name="stage_staus"  id="stage_staus">
				<option value="">Select Any..</option>
				<option value="1">In-progress</option>
			</select>
	 </div>
  </div>
  <br><br>

<!-- <button type="submit" style="float:right;" class="btn btn-primary btn-lg">Submit</button> -->
