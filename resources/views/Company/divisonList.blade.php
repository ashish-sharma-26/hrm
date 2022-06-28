@extends('layouts.hrmLayout')
@section('content')
<!-- /.row -->
                    
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                             <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   Divison List
                                    
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="row">
                               
                                        <!-- /.col-lg-4 (nested) -->
                                        <div class="col-lg-12">
                                             <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Divison Id</th>
                <th>Subsidiary Name</th>
                <th>Divison Name</th>
                <th>Updated Date</th>
                <th>Created Date</th>
                <th>Divison Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           
            @foreach($divisonDetails as $_divisonDetail)
            <tr>
                <td>{{ $_divisonDetail->id}}</td>
                <td>
               
                <x-Company.Subsidiaryname subsidiaryID="{{$_divisonDetail->subsidiary_id}}">
                </x-Company.Subsidiaryname>
                </td>
                <td>{{ $_divisonDetail->divison_name}}</td>
                <td>{{ date("d M Y",strtotime($_divisonDetail->updated_at)) }}</td>
                <td>{{ date("d M Y",strtotime($_divisonDetail->created_at)) }}</td>
                
                <td>
                @if( $_divisonDetail->status == 1)
                    Activated
                @else
                    Deactivated
                @endif
                
                </td>
                <td><span style="float:left;"><a href="{{ url('editDivison/'.$_divisonDetail->id) }}"><i class="fa fa-pencil"></i></a></span><span style="float:right;"><a href="{{ url('deleteDivison/'.$_divisonDetail->id) }}"><i class="fa fa-trash"></i></a></span></td>
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