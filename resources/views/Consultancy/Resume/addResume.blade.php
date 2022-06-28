@extends('layouts.consultancyLayout')
@section('content')
 <script src="{{ asset('hrm/ckeditor/ckeditor.js')}}"></script>
 <script src="{{ asset('hrm/ckeditor/samples/js/sample.js')}}"></script>
<div class="container panel panel-default">
  <div class="panel-heading">
          Add Resume                             
  </div>
   <div class="panel-body">
   @if ($message = Session::get('success'))

        <div class="alert alert-success alert-block">

            <button type="button" class="close" data-dismiss="alert">×</button>

                <strong>{{ $message }}</strong>

        </div>

        <img src="uploads/{{ Session::get('file') }}">

        @endif

  

        @if (count($errors) > 0)

            <div class="alert alert-danger">

                <strong>Whoops!</strong> There were some problems with your input.

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif
  <form action="{{ url('resumePost') }}" method="post" enctype="multipart/form-data">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">



    <div class="row">
      <div class="col-25">
        <label for="candidate_name">Candidate Name *</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="candidate_name" name="candidate_name" placeholder="Candidate Name.." value="{{ old('candidate_name') }}" required>
      </div>
    </div>
	
	
	<div class="row">
      <div class="col-25">
        <label for="contact_no">Candidate Contact No. *</label>
      </div>
      <div class="col-75">
        
        <input type="text" id="contact_no" name="contact_no" placeholder="Candidate Contact No.." value="{{ old('contact_no') }}" required>
      </div>
    </div>
	
	
	<div class="row">
      <div class="col-25">
        <label for="resume_designation">Candidate Designation *</label>
      </div>
      <div class="col-75">
		<select name="resume_designation" id="resume_designation" required>
			<option value="">Select Designation *</option>
			@foreach($designationMOD as $_designation)
			
				<option value="{{$_designation->id}}">{{$_designation->name}}</option>
			@endforeach
		</select>		
      </div>
    </div>
	<div class="row">
      <div class="col-25">
        <label for="resume_content">Add Resume Content *</label>
      </div>
      <div class="col-75">
		  <label for="resume_content" style="padding-bottom: 0;">Paste The Entire Text of the Resume Here</label>
       <textarea id="editor"  name="resume_content"></textarea>
		  <span style="color: red; font-size: 12px;">for .doc file please press (Ctrl+Shift+V)</span>
      </div> 
    </div>
	
	<div class="row">
      <div class="col-25">
        <label for="fileResume">Upload Resume *</label>
      </div>
      <div class="col-75">
        
       <input type="file" name="file" id="fileResume" class="form-control" required>
      </div>
    </div>
	
    
    <div class="row">
      <input type="Submit" value="Submit Resume">
    </div>
  </form>
</div> 
</div> 

<script>
	initSample();
</script>
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
	.row{margin: 0;}
	.panel {
    padding: 0;
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
        CKEDITOR.replace( 'editor1' );
    </script>
@stop