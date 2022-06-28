@extends('layouts.hrmLayout')
@section('content')
<!-- /.row -->
                    
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                             <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   Attribute List
                                    
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="row">
                               
                                        <!-- /.col-lg-4 (nested) -->
                                        <div class="col-lg-12">
                                             <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>Attribute Id</th>
                <th>Attribute Name</th>
                <th>Attribute Code</th>
                <th>Attribute Type</th>
				<th>Conditional Attribute</th>
                <th>Department Name</th>
				<th>Onboarding Status</th>
				<th>Sort Order</th>
                <th>Required</th>
                <th>Updated Date</th>
                <th>Created Date</th>
                <th>Attribute Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
           
            @foreach($attributeTypeDetails as $_attr)
            <tr>
                <td>{{ $_attr->attribute_id }}</td>
                <td>{{ $_attr->attribute_name }}</td>
                <td>{{ $_attr->attribute_code }}</td>
                <td>{{ $_attr->attribute_type_name }}</td>
				 <td>
                @if($_attr->conditional_attribute == 1)
					Yes
                @else
                    No
                @endif

                
                </td>
                <td>
                @if($_attr->department_id != 'All')
                <x-company.Departmentname departmentId="{{$_attr->department_id}}">
                  </x-company.Departmentname>
                @else
                    All
                @endif

                
                </td>
				 <td>
                @if( $_attr->onboarding_status == 0)
                    None
                @elseif( $_attr->onboarding_status == 1)
                    All
			    @elseif( $_attr->onboarding_status == 2)
                    Pre Visa Onboarding
				 @elseif( $_attr->onboarding_status == 3)
                    Post Visa Onboarding
				@else
					None
                @endif
                
               </td>
			    <td>
                {{$_attr->sort_order}}
                
               </td>
                <td>
                @if( $_attr->attribute_requirement == 1)
                    Yes
                @else
                    No
                @endif
                
               </td>
                <td>{{ date("d M Y",strtotime($_attr->updated_at)) }}</td>
                <td>{{ date("d M Y",strtotime($_attr->created_at)) }}</td>
                
                <td>
                @if( $_attr->status == 1)
                    Activated
                @else
                    Deactivated
                @endif
                
                </td>
                <td><span style="float:left;"><a href="{{ url('editEmpAttribute/'.$_attr->attribute_id) }}"><i class="fa fa-pencil"></i></a></span><span style="float:right;"><a href="{{ url('deleteEmpAttribute/'.$_attr->attribute_id) }}"><i class="fa fa-trash"></i></a></span></td>
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