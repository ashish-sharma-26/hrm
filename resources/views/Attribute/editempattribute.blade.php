@extends('layouts.hrmLayout')
@section('content')
<div class="container">
  <form action="{{ url('updateEmployeeAttr') }}" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">

  <input type="hidden" name="attribute_id" value="{{ $attributeDetail->attribute_id }}">


<div class="row">
      <div class="col-25">
        <label for="attribute_name">Attribute Name</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="attribute_name" name="attribute_name" placeholder="Attribute Name.." value ="{{ $attributeDetail->attribute_name }}" required>
      </div>
</div>


<div class="row">
      <div class="col-25">
        <label for="attribute_code">Attribute Code</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="attribute_code" name="attribute_code" placeholder="Attribute Code.." value ="{{ $attributeDetail->attribute_code }}" required>
      </div>
</div>

  <div class="row">
      <div class="col-25">
        <label for="attrbute_type_id">Select Attribute Type</label>
      </div>
      <div class="col-75">
        <select id="attrbute_type_id" name="attrbute_type_id" onChange="completeOpt();" required>
            <option value="">Please select Any..</option>
                @foreach($result['attributeTypeDetails'] as $_attributeTypeObj)
                    @if($attributeDetail->attrbute_type_id == $_attributeTypeObj->attribute_type_id)
                         <option value="{{$_attributeTypeObj->attribute_type_id}}" selected="selected">{{$_attributeTypeObj->attribute_type_name}}</option>
                    @else
                         <option value="{{$_attributeTypeObj->attribute_type_id}}">{{$_attributeTypeObj->attribute_type_name}}</option>
                    @endif     
                @endforeach
        </select>
      </div>
    </div>

    <div class="row" id="dp_opt" @if($attributeDetail->attrbute_type_id != 3) style="display:none; @endif">
      
      <div class="col-50" style="width:30%;float:right;">
                <div id="addingOpt">
                @if($attributeDetail->attrbute_type_id == 3)

                        @php
                        $i = 1
                        @endphp
                        @foreach($result['optarr'] as $_optarr)
                            @if($i == 1)
                            <input type="text" id="attribute_opt_{{$i}}" name="opt[]" placeholder="Add Options.." value="{{$_optarr}}" required>
                            @else
                            <input type="text" id="attribute_opt_{{$i}}" name="opt[]" placeholder="Add Options.." value="{{$_optarr}}" required><span onClick="removeOpt({{$i}});" class="classXX" id="r_{{$i}}">X</span>
                            @endif
                            
                                @php
                                $i++
                                @endphp  
                        @endforeach  
                @else
                        <input type="text" id="attribute_opt_" name="opt[]" placeholder="Add Options..">
                @endif
                </div>
                <div style="text-align:right;">
                   
                    <input type="button" value="Add More Options" onclick="addMoreOpt();">
                </div>
      </div>
           
    </div>

    <div class="row">
      <div class="col-25">
        <label for="attribute_requirement">Attribute Required</label>
      </div>
      <div class="col-75">
        <select id="attribute_requirement" name="attribute_requirement" required>
          <option value="">Please select Any..</option>
          <option value="1"  @if($attributeDetail->attribute_requirement == 1)  selected="selected"    @endif >Yes</option>
          <option value="2" @if($attributeDetail->attribute_requirement == 2)  selected="selected"    @endif>No</option>
          
        </select>
      </div>
    </div>
	
	<div class="row">
      <div class="col-25">
        <label for="sort_order">Sort Order</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="sort_order" name="sort_order" placeholder="Sort Order.." value="{{$attributeDetail->sort_order}}" required>
      </div>
	</div>
	
	<div class="row">
      <div class="col-25">
        <label for="conditional_attribute">Conditional Attribute</label>
      </div>
      <div class="col-75">
        <select id="conditional_attribute" name="conditional_attribute" onchange="workConditionalAttr();" required>
          <option value="">Please select Any..</option>
          <option value="1"  @if($attributeDetail->conditional_attribute == 1)  selected="selected"    @endif >Yes</option>
          <option value="2" @if($attributeDetail->conditional_attribute == 2)  selected="selected"    @endif >No</option>
          
        </select>
      </div>
    </div>

    <div class="row" id="con_p_attr" @if($attributeDetail->conditional_attribute != 1) style="display:none" @endif>
      <div class="col-25">
        <label for="parent_attribute">Parent Attribute</label>
      </div>
      <div class="col-75">
        <select id="parent_attribute" name="parent_attribute" onchange="setParentOpt();">
          <option value="">Please select Any..</option>
                @foreach($result['conditionalAttributes'] as $conditionalAttribute)
				    @if($attributeDetail->parent_attribute  == $conditionalAttribute->attribute_id)
                         <option value="{{$conditionalAttribute->attribute_id}}" selected>{{$conditionalAttribute->attribute_name}}</option>
					 @else
						 <option value="{{$conditionalAttribute->attribute_id}}" >{{$conditionalAttribute->attribute_name}}</option>
					 @endif
                @endforeach
          
        </select>
      </div>
    </div>

	 <div class="row" id="p_attr_opt" style="display:none">
		  
    </div>
    <div class="row">
      <div class="col-25">
        <label for="department_id">Department</label>
      </div>
      <div class="col-75">
        <select id="department_id" name="department_id" required>
          <option value="">Please select Any..</option>
          <option value="All" @if($attributeDetail->department_id == 'All') selected @endif>All</option>
                @foreach($result['departments'] as $department)
                    @if($attributeDetail->department_id == $department->id)
                        <option value="{{$department->id}}" selected="selected">{{$department->department_name}}</option>
                    @else
                        <option value="{{$department->id}}" >{{$department->department_name}}</option>
                    @endif
                @endforeach
          
        </select>
      </div>
    </div>
	
	<div class="row">
      <div class="col-25">
        <label for="onboarding_status">Onboarding Status</label>
      </div>
      <div class="col-75">
        <select id="onboarding_status" name="onboarding_status" required>
          <option value="">Please select Any..</option>
          <option value="1" @if($attributeDetail->onboarding_status == 1)  selected="selected"    @endif>All</option>
          <option value="2" @if($attributeDetail->onboarding_status == 2)  selected="selected"    @endif>Pre Visa Onboarding</option>
		   <option value="3"@if($attributeDetail->onboarding_status == 3)  selected="selected"    @endif>Post Visa Onboarding</option>
          
        </select>
      </div>
    </div>

    <div class="row">
      <div class="col-25">
        <label for="status">Status</label>
      </div>
      <div class="col-75">
        <select id="status" name="status" required>
          <option value="">Please select Any..</option>
          <option value="1" @if($attributeDetail->status == 1)  selected="selected"    @endif>Active</option>
          <option value="2" @if($attributeDetail->status == 2)  selected="selected"    @endif>Inactive</option>
          
        </select>
      </div>
    </div>
    
    <div class="row">
      <input type="submit" value="Submit">
    </div>
  </form>
</div> 
<style>
/* Style inputs, select elements and textareas */
input[type=text], select, textarea{
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  resize: vertical;
}

/* Style the label to display next to the inputs */
label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

/* Style the submit button */
input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

/* Style the container */
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

/* Floating column for labels: 25% width */
.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

/* Floating column for inputs: 75% width */
.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
} 
</style>
<script>
    function completeOpt()
    {
        jQuery("#dp_opt").hide();
        var typeV = jQuery("#attrbute_type_id").val();
        jQuery("#attribute_opt_1").prop("required",false);
        if(parseInt(typeV) == parseInt(3))
        {
            jQuery("#attribute_opt_1").prop("required",true);
            jQuery("#dp_opt").fadeIn(1000);
        }
        
    }

    function addMoreOpt()
    {
            var optcount = jQuery("#optcount").val();
            var optcountNew = parseInt(optcount)+parseInt(1);
            var htm = '<input type="text" id="attribute_opt_'+optcountNew+'" name="opt[]" placeholder="Add Options.." required><span onClick="removeOpt('+optcountNew+');" class="classXX" id="r_'+optcountNew+'">X</span>';
            jQuery('#addingOpt').append(htm);
            jQuery("#optcount").val(optcountNew);
    }

    function removeOpt(cIndex)
    {
        jQuery("#attribute_opt_"+cIndex).remove();
        jQuery("#r_"+cIndex).remove();
    }
	  function workConditionalAttr()
    {
        jQuery("#con_p_aparent_attributettr").prop("required",false);
        jQuery("#con_p_attr").hide();
		jQuery('#p_attr_opt').hide();
       var typeV =  jQuery('#conditional_attribute').val();
        if(parseInt(typeV) == parseInt(1))
        {
            jQuery("#parent_attribute").prop("required",true);
            jQuery("#con_p_attr").fadeIn(1000);
        }
    }
	
	function setParentOpt()
	{
		jQuery('#p_attr_opt').hide();
		var pAttrId = jQuery("#parent_attribute").val();
		jQuery.ajax({
			type: "Get",
			url: "{{url('parentopts')}}/"+pAttrId,
			dataType:"html",
			success: function(response){
				jQuery('#p_attr_opt').fadeIn(1000);
				jQuery('#p_attr_opt').html(response);
			}
			});
	}
</script>

@if($attributeDetail->conditional_attribute == 1)
<script>

	setTimeout(function(){ setParentOptEdit(); }, 1000);
		function setParentOptEdit()
		{
			jQuery.ajax({
			type: "Get",
			url: "{{url('parentoptsselected')}}/"+{{$attributeDetail->parent_attribute}}+'/'+{{$attributeDetail->attribute_id}},
			dataType:"html",
			success: function(response){
				jQuery('#p_attr_opt').fadeIn(1000);
				jQuery('#p_attr_opt').html(response);
			}
			});
		}
</script>

@endif

@if($attributeDetail->attrbute_type_id == 3)
    @php
        $finalI = $i-1;
    @endphp    
@else
@php
        $finalI = 1;
    @endphp    
@endif
<input type="hidden" id="optcount" value="{{$finalI}}"/>
@stop