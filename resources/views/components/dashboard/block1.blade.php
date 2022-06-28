<!-- SIDEBAR USERPIC -->
<?php
$pics = $customerDetails['pics'];
?>
				<div class="profile-userpic">
					<img src="{{ asset('hrm/images/'.$pics)}}" class="img-responsive" alt="">
				</div>
				<!-- END SIDEBAR USERPIC -->
				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						{{$customerDetails['fullname']}}
					</div>
					<div class="profile-usertitle-job">
						{{$customerDetails['designation']}}
					</div>
                    <div class="job-experiene">
                    <p><strong>At work for</strong> : 6 Years 3 Months 8 Days</p>
                    </div>
                    <hr>
                    <div class="job-experiene attendence">
                        <ul>
                        <li><p>20/30<span>Attendence</span></p></li>
                       <li><p>5/30<span>Leaves</span></p></li>
                        </ul>
                    
                    </div>
				</div>
                         
                         <div class="card pmd-card">
                <!-- Card hedaer -->
                <div class="card-header pmd-card-border d-flex">
                    <i class="pmd-icon-circle icon-circle-48 border border-primary mr-3 md-dark">
                        <svg viewBox="127.561 250.867 340.158 340.158">
                            <g>
                                <g>
                                    <path d="M408.797,485.241H186.483c-3.261,0-5.905-2.644-5.905-5.906v-86.662c0-9.769,7.947-17.717,17.716-17.717h198.692
                                        c9.769,0,17.716,7.948,17.716,17.717v86.662C414.702,482.598,412.058,485.241,408.797,485.241z M192.389,473.431h210.503v-80.757
                                        c0-3.255-2.65-5.906-5.905-5.906H198.294c-3.255,0-5.905,2.65-5.905,5.906V473.431z"></path>
                                </g>
                                <g>
                                    <path d="M403.307,511.954H191.974c-13.025,0-23.622-10.597-23.622-23.622v-8.997c0-3.26,2.644-5.904,5.905-5.904h246.767
                                        c3.261,0,5.905,2.645,5.905,5.904v8.997C426.929,501.357,416.331,511.954,403.307,511.954z M180.163,485.241v3.091
                                        c0,6.514,5.297,11.812,11.811,11.812h211.333c6.514,0,11.811-5.298,11.811-11.812v-3.091H180.163z"></path>
                                </g>
                                <g>
                                    <path d="M332.212,562.586h-69.145c-2.211,0-4.236-1.233-5.25-3.199c-1.013-1.968-0.842-4.334,0.441-6.134l13.498-18.931
                                        c2.191-3.071,3.348-6.69,3.348-10.459v-17.814c0-3.261,2.644-5.905,5.905-5.905h33.262c3.261,0,5.905,2.645,5.905,5.905v17.814
                                        c0,3.769,1.157,7.388,3.349,10.459l13.497,18.931c1.283,1.8,1.453,4.166,0.441,6.134
                                        C336.448,561.353,334.425,562.586,332.212,562.586z M274.533,550.776h46.214l-6.843-9.598c-3.625-5.087-5.539-11.073-5.539-17.315
                                        v-11.909h-21.451v11.909c0,6.242-1.914,12.229-5.539,17.315L274.533,550.776z"></path>
                                </g>
                                <g>
                                    <path d="M252.788,386.768h-29.899c-3.262,0-5.906-2.644-5.906-5.905v-39.208c0-11.396,9.274-20.669,20.669-20.669
                                        c11.768,0,21.041,9.273,21.041,20.669v39.208C258.693,384.124,256.049,386.768,252.788,386.768z M228.794,374.957h18.088v-33.302
                                        c0-4.885-3.973-8.858-8.858-8.858c-5.257,0-9.23,3.973-9.23,8.858V374.957z"></path>
                                </g>
                                <g>
                                    <path d="M312.59,386.768h-29.899c-3.262,0-5.906-2.644-5.906-5.905v-39.208c0-11.396,9.274-20.669,20.67-20.669
                                        c11.768,0,21.041,9.273,21.041,20.669v39.208C318.495,384.124,315.851,386.768,312.59,386.768z M288.595,374.957h18.089v-33.302
                                        c0-4.885-3.975-8.858-8.859-8.858c-5.256,0-9.23,3.973-9.23,8.858V374.957z"></path>
                                </g>
                                <g>
                                    <path d="M372.392,386.768h-29.9c-3.261,0-5.905-2.644-5.905-5.905v-39.208c0-11.396,9.274-20.669,20.669-20.669
                                        c11.769,0,21.042,9.273,21.042,20.669v39.208C378.297,384.124,375.653,386.768,372.392,386.768z M348.397,374.957h18.09v-33.302
                                        c0-4.885-3.975-8.858-8.858-8.858c-5.257,0-9.231,3.973-9.231,8.858V374.957z"></path>
                                </g>
                                <g>
                                    <path d="M237.836,332.796c-11.499,0-20.854-9.357-20.854-20.857c0-9.587,12.434-25.848,16.246-30.606
                                        c2.24-2.794,6.969-2.8,9.215,0c3.813,4.755,16.249,21.019,16.249,30.606C258.693,323.439,249.336,332.796,237.836,332.796z
                                         M237.836,294.866c-4.901,6.958-9.042,14.248-9.042,17.074c0,4.988,4.057,9.046,9.042,9.046c4.989,0,9.046-4.058,9.046-9.046
                                        C246.882,309.113,242.739,301.824,237.836,294.866z"></path>
                                </g>
                                <g>
                                    <path d="M297.641,332.796c-11.5,0-20.857-9.357-20.857-20.857c0-9.587,12.437-25.851,16.249-30.606
                                        c1.122-1.399,2.817-2.212,4.608-2.212l0,0c1.793,0,3.486,0.813,4.608,2.212c3.813,4.758,16.246,21.019,16.246,30.606
                                        C318.495,323.439,309.141,332.796,297.641,332.796z M297.641,294.866c-4.902,6.958-9.046,14.248-9.046,17.074
                                        c0,4.988,4.058,9.046,9.046,9.046c4.986,0,9.043-4.058,9.043-9.046C306.685,309.105,302.543,301.818,297.641,294.866z"></path>
                                </g>
                                <g>
                                    <path d="M357.444,332.796c-11.5,0-20.857-9.357-20.857-20.857c0-9.587,12.438-25.851,16.249-30.606
                                        c1.122-1.399,2.816-2.212,4.608-2.212l0,0c1.794,0,3.486,0.813,4.607,2.212c3.813,4.758,16.246,21.019,16.246,30.606
                                        C378.297,323.439,368.943,332.796,357.444,332.796z M357.444,294.866c-4.902,6.958-9.047,14.248-9.047,17.074
                                        c0,4.988,4.058,9.046,9.047,9.046c4.985,0,9.043-4.058,9.043-9.046C366.487,309.105,362.346,301.818,357.444,294.866z"></path>
                                </g>
                                <g>
                                    <path d="M406.888,435.176c-1.194,0-2.396-0.359-3.439-1.108l-22.775-16.362c-0.441-0.317-1.726-0.32-2.174-0.009l-18.268,13.124
                                        c-4.535,3.26-11.393,3.258-15.952-0.015l-18.232-13.1c-0.44-0.317-1.725-0.32-2.174-0.009l-18.268,13.124
                                        c-4.535,3.26-11.393,3.258-15.952-0.015l-18.233-13.1c-0.441-0.317-1.727-0.32-2.174-0.009L250.98,430.82
                                        c-4.536,3.26-11.393,3.258-15.952-0.015l-18.232-13.1c-0.445-0.317-1.733-0.32-2.183,0.002l-22.777,16.359
                                        c-2.656,1.899-6.347,1.294-8.241-1.35c-1.903-2.65-1.298-6.342,1.35-8.241l22.774-16.359c4.55-3.273,11.411-3.273,15.967-0.006
                                        l18.238,13.103c0.447,0.32,1.724,0.332,2.166,0.012l18.27-13.124c4.545-3.261,11.402-3.258,15.952,0.009l18.239,13.103
                                        c0.447,0.32,1.725,0.332,2.166,0.012l18.27-13.124c4.546-3.261,11.402-3.258,15.953,0.009l18.238,13.103
                                        c0.443,0.32,1.721,0.332,2.165,0.012l18.271-13.124c4.545-3.261,11.401-3.258,15.951,0.009l22.778,16.365
                                        c2.649,1.902,3.252,5.591,1.349,8.241C410.535,434.323,408.725,435.176,406.888,435.176z"></path>
                                </g>
                            </g>
                        </svg>
                    </i>
                    <div class="media-body">
                        <h2 class="card-title h3">Upcoming Birthdays</h2>
                        <p class="card-subtitle">List of employees whose birthdays are in the month of August</p>
                    </div>
                </div>
                <!-- Card list -->
                <ul class="list-group pmd-list">
                    <li class="list-group-item d-flex flex-row">
                        <a href="javascript:void(0);" class="pmd-avatar-list-img" title="profile-link">
                            <img alt="40x40" class="img-responsive" src="../images/avatar.png">
                        </a>
                        <div class="media-body">
                            <h3 class="pmd-list-title">Robert P. Kinder</h3>
                            <p class="pmd-list-subtitle">August 2<sup>nd</sup>, 2021</p>
                        </div>
                    </li>
                    <li class="list-group-item d-flex flex-row">
                        <a href="javascript:void(0);" class="pmd-avatar-list-img" title="profile-link">
                            <img alt="40x40" class="img-responsive" src="../images/avatar.png">
                        </a>
                        <div class="media-body">
                            <h3 class="pmd-list-title">Darlene C. Larsen</h3>
                            <p class="pmd-list-subtitle">August 12<sup>th</sup>, 2021</p>
                        </div>
                    </li>
                    <li class="list-group-item d-flex flex-row">
                        <a href="javascript:void(0);" class="pmd-avatar-list-img" title="profile-link">
                            <img alt="40x40" class="img-responsive" src="../images/avatar.png">
                        </a>
                        <div class="media-body">
                            <h3 class="pmd-list-title">Fay A. Sayer</h3>
                            <p class="pmd-list-subtitle">August 15<sup>th</sup>, 2021</p>
                        </div>
                    </li>
                    <li class="list-group-item d-flex flex-row">
                        <a href="javascript:void(0);" class="pmd-avatar-list-img" title="profile-link">
                            <img alt="40x40" class="img-responsive" src="../images/avatar.png">
                        </a>
                        <div class="media-body">
                            <h3 class="pmd-list-title">Jonathan M. Blackmon</h3>
                            <p class="pmd-list-subtitle">August 15<sup>th</sup>, 2021</p>
                        </div>
                    </li>
                    <li class="list-group-item d-flex flex-row">
                        <a href="javascript:void(0);" class="pmd-avatar-list-img" title="profile-link">
                            <img alt="40x40" class="img-responsive" src="../images/avatar.png">
                        </a>
                        <div class="media-body">
                            <h3 class="pmd-list-title">Samuel K. Smith</h3>
                            <p class="pmd-list-subtitle">August 20<sup>th</sup>, 2021</p>
                        </div>
                    </li>
                </ul>
            </div>