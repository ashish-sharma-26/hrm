 <div class="row">
      <div class="col-25">
        <label for="p_id">Select Product</label>
      </div>
      <div class="col-75">
        <select id="p_id" name="p_id" required>
          <option value="">Please Select Product</option>
          @foreach($productDetails as $_p)
            <option value="{{$_p->id}}">{{$_p->product_name}}</option>
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
          @foreach($months as $_mK=>$_mV)
            <option value="{{$_mK}}">{{$_mV}}</option>
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
          <option value="2021">2021</option>
          <option value="2022">2022</option>
         
        </select>
      </div>
    </div>
	
	 <div class="row">
      <div class="col-25">
        <label>Performance</label>
      </div>
      <div class="col-75">
       <input type="text" id="perf_value" name="perf_value" placeholder="Enter Performance" required>
      </div>
    </div>
	
	
