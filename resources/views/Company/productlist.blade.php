@extends('layouts.hrmLayout')
@section('content')
<!-- /.row -->
                    
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                             <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   Product List
                                    
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="row">
                               
                                        <!-- /.col-lg-4 (nested) -->
                                        <div class="col-lg-12">
                                             <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Product Id</th>
                <th>Category Name</th>
                <th>Product Name</th>
                <th>Updated Date</th>
                <th>Created Date</th>
                <th>DiviProductson Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           
            @foreach($productDetails as $_pDetail)
            <tr>
                <td>{{ $_pDetail->id}}</td>
                <td>
                
                <x-company.CategoryName categoryId='{{ $_pDetail->category_id}}'>
                </x-company.CategoryName>
                
                </td>
                <td>{{ $_pDetail->product_name}}</td>
                <td>{{ date("d M Y",strtotime($_pDetail->updated_at)) }}</td>
                <td>{{ date("d M Y",strtotime($_pDetail->created_at)) }}</td>
                
                <td>
                @if( $_pDetail->status == 1)
                    Activated
                @else
                    Deactivated
                @endif
                
                </td>
                <td><span style="float:left;"><a href="{{ url('editProduct/'.$_pDetail->id) }}"><i class="fa fa-pencil"></i></a></span><span style="float:right;"><a href="{{ url('deleteProduct/'.$_pDetail->id) }}"><i class="fa fa-trash"></i></a></span></td>
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