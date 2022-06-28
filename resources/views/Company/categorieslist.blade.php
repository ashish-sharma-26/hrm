@extends('layouts.hrmLayout')
@section('content')
<!-- /.row -->
                    
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                             <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   Categories List
                                    
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="row">
                               
                                        <!-- /.col-lg-4 (nested) -->
                                        <div class="col-lg-12">
                                             <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Category Id</th>
                <th>Department Name</th>
                <th>Category Name</th>
                <th>Updated Date</th>
                <th>Created Date</th>
                <th>Category Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           
            @foreach($categoriesDetails as $_categoriesDetail)
            <tr>
                <td>{{ $_categoriesDetail->id}}</td>
                <td>
                 
                 
                  <x-company.Departmentname departmentId="{{$_categoriesDetail->department_id}}">
                  </x-company.Departmentname>
                </td>
                <td>{{ $_categoriesDetail->category_name}}</td>
                <td>{{ date("d M Y",strtotime($_categoriesDetail->updated_at)) }}</td>
                <td>{{ date("d M Y",strtotime($_categoriesDetail->created_at)) }}</td>
                
                <td>
                @if( $_categoriesDetail->status == 1)
                    Activated
                @else
                    Deactivated
                @endif
                
                </td>
                <td><span style="float:left;"><a href="{{ url('editCategory/'.$_categoriesDetail->id) }}"><i class="fa fa-pencil"></i></a></span><span style="float:right;"><a href="{{ url('deleteCategory/'.$_categoriesDetail->id) }}"><i class="fa fa-trash"></i></a></span></td>
            </tr>
            @endforeach
        </tbody>
    </table>
                                        </div>
                                        <!-- /.col-lg-8 (nested) -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.panel-body -->
                            </div>
       </div>
                        </div>
                          
                        
                     </div>
                    <!-- /.row -->
@stop