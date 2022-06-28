@extends('layouts.hrmLayout')
@section('content')
<!-- /.row -->
                    @if(Session::has('parentCategoryMess'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('parentCategoryMess') }}</p>
                    @endif  
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                             <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   Parent Company List
                                    
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="row">
                               
                                        <!-- /.col-lg-4 (nested) -->
                                        <div class="col-lg-12">
                                             <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Parent Company Id</th>
                <th>Parent Company Name</th>
                <th>Status</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody>
           
            @foreach($parentCompanyDetails as $_companyData)
            <tr>
                <td>{{ $_companyData->id}}</td>
                <td>{{ $_companyData->parent_companyname }}</td>
                <td>
                @if( $_companyData->Status == 1)
                    Activated
                @else
                    Deactivated
                @endif
                
                </td>
                <td><span style="float:left;"><a href="{{ url('editPCompany/'.$_companyData->id) }}"><i class="fa fa-pencil"></i></a></span><span style="float:right;"><a href="{{ url('deletePCompany/'.$_companyData->id) }}"><i class="fa fa-trash"></i></a></span></td>
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