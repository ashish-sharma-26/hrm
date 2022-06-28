@foreach($resumeLists as $_resume)

<?php
  /* echo '<pre>';
  print_r($_resume);
  exit; */
?>

<div class="col-lg-4 bottom-block-div" >
                        <div class="block-inner @if($_resume->resume_status == 2) selected @elseif($_resume->resume_status == 3) reject @else @endif" id="divR_{{$_resume->id}}" style="background-color: #ffffff;">
							  <div class="row">
			<div class="col-lg-6 p-0">
                            <label class="check-box">

                                <input type="hidden" name="data[singlecheck]" id="singlecheck_" value="0"><input type="checkbox" name="data[singlecheck]" class="single_checkbox" value="125114" id="singlecheck">                                <span class="checkmark"></span> </label></div>
			<div class="col-lg-6 text-right p-0"><a href="https://www.hr-suranigroup.com/uploads/consultancyResume/{{$_resume->resume_name}}" title="View" class="btn btn-success" download>Resume Download</a></div>
							</div>
							<div class="row">
                            <div class="block-top-heading col-lg-6">
                                <h2>
								{{$_resume->candidate_name}} 
								</h2>
                            </div>
                            <div class="block-top-complete col-lg-6">
							
                             <p class="">
							 @if($_resume->status == 1)
								 <span class="pending panel-orange">Shortlisted</span>
							 @else
								 <span class="pending panel-orange"><x-Recruiter.StatusName statusId="{{$_resume->status}}">
								 </x-Recruiter.StatusName></span>
							 @endif
							</p>
                            </div>
							</div>
                            <table class="table">
                                <tbody>
								 <tr>
                                    <td>Consultancy Name<span>:</span></td>
                                    <td>
                                        <ul><li style="list-style:none">
								<x-Recruiter.ConsultancyName cId="{{$_resume->consultancy_id}}">
								 </x-Recruiter.ConsultancyName></span>
										</li></ul>
                                    </td>
                                </tr>
                                     <tr>
                                    <td>Mobile Number<span>:</span></td>
                                    <td>
                                        <ul><li style="list-style:none">{{$_resume->condidate_no}} </li></ul>
                                    </td>
                                </tr>
                          
                                <tr>
                                    <td>Added Date<span>:</span></td>
                                    <td>{{date('d M Y',strtotime($_resume->created_at)) }}</td>
                                </tr>
									  <tr>
                                    <td>Updated Date<span>:</span></td>
                                    <td>{{date('d M Y',strtotime($_resume->updated_at))}}</td>
                                </tr>
								       
								                                                                                                  
                                                                    <tr>
                                    <td>Comment<span>:</span></td>
                                    <td>{{$_resume->feedback}}</td>
                                </tr>
								
																
								                                								                                                                
                                        
                              </tbody>
                            </table>
                            <hr>
							<div class="row">
							
							<div class="col-lg-6">
                           <a href="javascript:void(0);" title="Edit" class="btn btn-primary newBtn" onclick="changeStatus({{$_resume->id}},{{$_resume->status}});">Change Status</a>
								</div>
								<div class="col-lg-6">
                           <a href="{{ url('historyResume/'.$_resume->id) }}" title="Edit" class="btn btn-primary newBtn">History</a>
								</div>
								</div>
							
                                                                    

                            							                                                    </div>
                    </div>
@endforeach