<style>
.form-group p{    font-size: 17px;
    font-weight: bold;
    width: 100%;
    padding: 8px;
    border: 2px solid #ddd;
    border-radius: 4px;
    box-sizing: border-box;
    resize: vertical;}
	.form-group label {
    background: #fff;
    position: relative;
    top: 13px;
    right: -8px;
    padding: 0px 13px;
    z-index: 99;
}
.setCurrency{
	margin-top:30px;
}
</style>

@foreach($breakUpArray as $_breakupKey=>$_breakupValue)
<div class="form-group col-md-12" >
	<div class="form-group col-md-10 aed-cont">
           
		<label>{{ $_breakupKey }}</label>
		<div class="input-group-prepend">
    <span class="input-group-text" id="basic-addon1">AED</span>
  </div>
		<p style="margin: 0;    padding-left: 51px;">{{ $_breakupValue }}</p>
           
	</div>

</div>
	
@endforeach