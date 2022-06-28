@extends('layouts.hrmLayout')
@section('content')
<div class="container">
  <form action="{{ url('addEmployeeAttr') }}" method="post">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">


<div class="row">
      <div class="col-25">
        <label for="attribute_name">Attribute Name</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="attribute_name" name="attribute_name" placeholder="Attribute Name.." required>
      </div>
</div>


<div class="row">
      <div class="col-25">
        <label for="attribute_code">Attribute Code</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="attribute_code" name="attribute_code" placeholder="Attribute Code.." required>
      </div>
</div>

  <div class="row">
      <div class="col-25">
        <label for="attrbute_type_id">Select Attribute Type</label>
      </div>
      <div class="col-75">
        <select id="attrbute_type_id" name="attrbute_type_id" onChange="completeOpt();" required>
            <option value="">Please select Any..</option>
                @foreach($attributeTypeDetails as $_attributeTypeObj)
                         <option value="{{$_attributeTypeObj->attribute_type_id}}">{{$_attributeTypeObj->attribute_type_name}}</option>
                @endforeach
        </select>
      </div>
    </div>

    <div class="row" id="dp_opt" style="display:none;">
      
      <div class="col-50" style="width:30%;float:right;">
                <div id="addingOpt">
                     <input type="text" id="attribute_opt_1" name="opt[]" placeholder="Add Options..">
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
          <option value="1">Yes</option>
          <option value="2">No</option>
          
        </select>
      </div>
    </div>


	<div class="row">
      <div class="col-25">
        <label for="sort_order">Sort Order</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="sort_order" name="sort_order" placeholder="Sort Order.." required>
      </div>
	</div>


    <div class="row">
      <div class="col-25">
        <label for="conditional_attribute">Conditional Attribute</label>
      </div>
      <div class="col-75">
        <select id="conditional_attribute" name="conditional_attribute" onchange="workConditionalAttr();" required>
          <option value="">Please select Any..</option>
          <option value="1">Yes</option>
          <option value="2">No</option>
          
        </select>
      </div>
    </div>

    <div class="row" id="con_p_attr" style="display:none">
      <div class="col-25">
        <label for="parent_attribute">Parent Attribute</label>
      </div>
      <div class="col-75">
        <select id="parent_attribute" name="parent_attribute" onchange="setParentOpt();">
          <option value="">Please select Any..</option>
                @foreach($result['conditionalAttributes'] as $conditionalAttribute)
                         <option value="{{$conditionalAttribute->attribute_id}}">{{$conditionalAttribute->attribute_name}}</option>
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
          <option value="All">All</option>
                @foreach($result['departments'] as $department)
                         <option value="{{$department->id}}">{{$department->department_name}}</option>
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
          <option value="1">All</option>
          <option value="2">Pre Visa Onboarding</option>
		   <option value="3">Post Visa Onboarding</option>
          
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
          <option value="1">Active</option>
          <option value="2">Inactive</option>
          
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
		jQuery("#parent_attribute").prop("required",false);
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

<input type="hidden" id="optcount" value="1"/>
@stop