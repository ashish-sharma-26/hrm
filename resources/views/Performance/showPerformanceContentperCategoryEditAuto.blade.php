 <div class="row">
      <div class="col-25">
        <label for="p_id">Select Product</label>
      </div>
      <div class="col-75">
        <select id="p_id" name="p_id" required>
          <option value="">Please Select Product</option>
          @foreach($result['productDetails'] as $_p)
		  @if($result['performance_data']->product_id == $_p->id)
			  <option value="{{$_p->id}}" selected="selected">{{$_p->product_name}}</option>
			@else
				<option value="{{$_p->id}}">{{$_p->product_name}}</option>
		 @endif
            
          @endforeach
        </select>
      </div>
    </div>
	
	
	 <div class="row">
      <div class="col-25">
        <label for="month">Performance Month</label>
      </div>
      <div class="col-75">
        <select id="month" name="month" required>
          <option value="">Please Select Performance Month</option>
          @foreach($result['months'] as $_mK=>$_mV)
           
			
			 @if($result['performance_data']->month == $_mK)
			   <option value="{{$_mK}}" selected="selected">{{$_mV}}</option>
			@else
				 <option value="{{$_mK}}">{{$_mV}}</option>
		 @endif
            
          @endforeach
        </select>
      </div>
    </div>
	
	<div class="row">
      <div class="col-25">
        <label for="year">Performance Year</label>
      </div>
      <div class="col-75">
        <select id="year" name="year" required>
          <option value="">Please Select Performance Year</option>
          <option value="2021"  @if($result['performance_data']->year == '2021') selected ='Selected' @endif)>2021</option>
          <option value="2022" @if($result['performance_data']->year == '2022') selected ='Selected' @endif>2022</option>
         
        </select>
      </div>
    </div>
	
	 <div class="row">
      <div class="col-25">
        <label>Performance</label>
      </div>
      <div class="col-75">
       <input type="text" id="perf_value" name="perf_value" placeholder="Enter Performance"  value="{{$result['performance_data']->perf_value}}"required>
      </div>
    </div>
	
	
