<div class="panel panel-default">
                                <div class="panel-heading">
                                   Personal Detail
                                    
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <div class="row">
                               
                                        <!-- /.col-lg-4 (nested) -->
                                        <div class="col-lg-12">
                                       <ul>
                                            <li>Name :</li>
                                            <li>{{$customerDetails['fullname']}}</li>
                                            </ul>
                                            <ul>
                                            <li>Fathers Name :</li>
                                            <li>{{$customerDetails['father_name']}}</li>
                                            </ul>
                                            <ul>
                                            <li>Date of Birth :</li>
                                            <li>{{$customerDetails['Dob']}}</li>
                                            </ul>
                                            <ul>
                                            <li>Email :</li>
                                            <li>{{$customerDetails['email']}}</li>
                                            </ul>
                                            <ul>
                                            <li>Phone Number :</li>
                                            <li>+{{$customerDetails['contact_no']}}</li>
                                            </ul>
                                            <ul>
                                            <li>Local Address :</li>
                                            <li>{{$customerDetails['local_address']}}</li>
                                            </ul>
                                            <ul>
                                            <li>Permanent Address :</li>
                                            <li>{{$customerDetails['permanent_address']}}</li>
                                            </ul>
                                       
                                        </div>
                                        <!-- /.col-lg-8 (nested) -->
                                    </div>
                                    <!-- /.row -->
                                </div>
                                <!-- /.panel-body -->
                            </div>