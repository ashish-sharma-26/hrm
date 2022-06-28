 <div class="row">
      <div class="col-25">
        <label for="department_id">Select Employee</label>
      </div>
      <div class="col-75">
        <select id="emp_id" name="emp_id" required>
          <option value="">Please Select Employee</option>
          @foreach($employeeLists as $_emp)
            <option value="{{$_emp->id}}"> {{$_emp->first_name}}&nbsp;{{$_emp->last_name}}</option>
          @endforeach
        </select>
      </div>
    </div>
	
	
	 <div class="row">
      <div class="col-25">
        <label for="cat_id">Select Category</label>
      </div>
      <div class="col-75">
        <select id="cat_id" name="cat_id" onchange="onCatAjax();" required>
          <option value="">Please Select Category</option>
          @foreach($categoriesDetails as $_cat)
            <option value="{{$_cat->id}}">{{$_cat->category_name}}</option>
          @endforeach
        </select>
      </div>
    </div>
	<script>
				function onCatAjax()
				{
					jQuery('#allowContent1').hide();
					jQuery('#allowContent1').html("");
					var catId = jQuery('#cat_id').val();
					if(catId == '')
					{
						alert('Please select Any on category to proceed.');
					}
					else
					{
						
						$.ajax({
							type: "GET",
							url: "{{url('showPerformanceContentperCategory')}}/"+catId,
							
							success: function(response){
								jQuery('#allowContent1').html(response);
								jQuery('#allowContent1').fadeIn(1000);
							}
						});
					}
				}
				</script>
				<div id="allowContent1" style="display:none;">
	
				</div>
	