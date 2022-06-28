@extends('layouts.hrmLayout')
@section('content')

<style>
	h3{margin: 0;}
	.panel-body {
    min-height: 163px;
}
</style>
<div class="col-lg-6">
<div class="panel panel-primary">

      <div class="panel-heading">
		<h3>Select file to Import</h3>
	  </div>

     
<div class="panel-body">
        <form action="{{ url('empAttendanceFileImport') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="row">
				  <div class="col-md-12">
					<label for="attr_f_import">Select File to Import</label>
				  </div>
				  <div class="col-md-9">
					<select class="form-control" id="attr_f_import" name="attr_f_import" required>
						<option value="">Please select Any..</option>
							@foreach($empFImport as $_emp)
									 <option value="{{$_emp->id}}">{{$_emp->file_name}}</option>
							@endforeach
					</select>
				  </div>
				<div class="col-md-3">
			  <input type="submit" value="Import" class="btn btn-success">
			</div>
			</div>
			
			
		
        </form>

  </div>

     

</div>
</div>	
	
	<div class="col-lg-6">
    <div class="panel panel-primary">

      <div class="panel-heading">
		<h3>Employee Attendance Import Interface</h3>
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

  

        <form action="{{ url('empAttendanceFileUpload') }}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="row">

  

                <div class="col-md-9">

                    <input type="file" name="file" class="form-control">

                </div>

   

                <div class="col-md-3">

                    <button type="submit" class="btn btn-success">Upload</button>

                </div>

   

            </div>

        </form>

  

      </div>

    </div>
</div>
@stop