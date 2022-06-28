@extends('layouts.hrmLayout')
@section('content')
<!-- /.row -->
                    
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                             <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   Subsidiary List
                                    
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="row">
                               
                                        <!-- /.col-lg-4 (nested) -->
                                        <div class="col-lg-12">
                                             <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Subsidiary Id</th>
                <th>Parent Company Name</th>
                <th>Subsidiary Name</th>
                <th>Subsidiary Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           
            @foreach($subsidiaryDatas as $_subsidiary)
            <tr>
                <td>{{ $_subsidiary->id}}</td>
                <td>
                <x-Common parentCompany="{{$_subsidiary->parent_company_id}}">
                </x-Common>
                </td>
                <td>{{ $_subsidiary->s_name}}</td>
                <td>
                @if( $_subsidiary->s_status == 1)
                    Activated
                @else
                    Deactivated
                @endif
                
                </td>
                <td><span style="float:left;"><a href="{{ url('editSubsidiary/'.$_subsidiary->id) }}"><i class="fa fa-pencil"></i></a></span><span style="float:right;"><a href="{{ url('deleteSubsidiary/'.$_subsidiary->id) }}"><i class="fa fa-trash"></i></a></span></td>
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