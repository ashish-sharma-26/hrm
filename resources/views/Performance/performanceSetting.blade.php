@extends('layouts.hrmLayout')
@section('content')
<!-- /.row -->
                    
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                             <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   Performance List
                                    
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="row">
                               
                                        <!-- /.col-lg-4 (nested) -->
                                        <div class="col-lg-12">
                                             <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Employee Name</th>
                <th>Department Name</th>
                <th>Category Name</th>
                <th>Product Name</th>
                <th>Month</th>
                <th>Year</th>
                <th>Performance</th>
                <th>Created Time</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           
            @foreach($performanceLists as $_p)
            <tr>
                <td>{{ $_p->id}}</td>
                <td>
				<x-employee.EmpName eId='{{ $_p->emp_id}}'>
                </x-employee.EmpName>
				</td>
                <td>
				
				<x-company.Departmentname departmentId="{{$_p->department_id}}">
                </x-company.Departmentname>
				</td>
				<td>
				<x-company.CategoryName categoryId='{{ $_p->category_id}}'>
                </x-company.CategoryName>
				</td>
				<td>
				<x-company.ProductName pId='{{ $_p->product_id}}'>
                </x-company.ProductName>
				</td>
				<td>{{ $_p->month}}</td>
				<td>{{ $_p->year}}</td>
				<td>{{ $_p->perf_value}}</td>
                
                <td>{{ date("d M Y",strtotime($_p->created_at)) }}</td>
                
                <td>
                @if( $_p->status == 1)
                    Activated
                @else
                    Deactivated
                @endif
                
                </td>
                <td><span style="float:left;"><a href="{{ url('editperformance/'.$_p->id) }}"><i class="fa fa-pencil"></i></a></span><span style="float:right;"><a href="{{ url('deletePerformance/'.$_p->id) }}"><i class="fa fa-trash"></i></a></span></td>
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