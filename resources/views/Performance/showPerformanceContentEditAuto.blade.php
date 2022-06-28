 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	<script>
		$j2 = $.noConflict();
	</script>
 <div class="row">
      <div class="col-25">
        <label for="department_id">Select Employee</label>
      </div>
      <div class="col-75">
        <select id="emp_id" name="emp_id" required>
          <option value="">Please Select Employee</option>
          @foreach($result['employeeLists'] as $_emp)
			@if($result['performance_data']->emp_id == $_emp->id)
				<option value="{{$_emp->id}}" selected="selected"> {{$_emp->first_name}}&nbsp;{{$_emp->last_name}}</option>
			@else
				<option value="{{$_emp->id}}"> {{$_emp->first_name}}&nbsp;{{$_emp->last_name}}</option>
			@endif
		 @endforeach
        </select>
      </div>
    </div>
	
	
	 <div class="row">
      <div class="col-25">
        <label for="cat_id">Select Category</label>
      </div>
      <div class="col-75">
        <select id="cat_id" name="cat_id" onchange="onCatAjaxEdit();" required>
          <option value="">Please Select Category</option>
          @foreach($result['categoriesDetails'] as $_cat)
			  @if($result['performance_data']->category_id == $_cat->id)
				  <option value="{{$_cat->id}}" selected="selected">{{$_cat->category_name}}</option>
			  @else
				  <option value="{{$_cat->id}}">{{$_cat->category_name}}</option>
			  @endif
          @endforeach
        </select>
      </div>
    </div>
	<script>
				function onCatAjaxEdit()
				{
					jQuery('#allowContent1Edit').hide();
					jQuery('#allowContent1Edit').html("");
					var catId = jQuery('#cat_id').val();
					if(catId == '')
					{
						alert('Please select Any on category to proceed.');
					}
					else
					{
						
						$.ajax({
							type: "GET",
							url: "{{url('showPerformanceContentperCategoryEdit')}}/"+catId,
							
							success: function(response){
								jQuery('#allowContent1Edit').html(response);
								jQuery('#allowContent1Edit').fadeIn(1000);
							}
						});
					}
				}
				$j2( document ).ready(function() {
					$j2('#allowContent1Edit').hide();
					$j2('#allowContent1Edit').html("");
					var catId = $j2('#cat_id').val();
					$j2.ajax({
							type: "GET",
							url: "{{url('showPerformanceContentperCategoryEditAuto')}}/{{$result['performance_data']->id}}",
							
							success: function(response){
								$j2('#allowContent1Edit').html(response);
								$j2('#allowContent1Edit').fadeIn(1000);
							}
						});
				});
				</script>
				<div id="allowContent1Edit" style="display:none;">
	
				</div>
	