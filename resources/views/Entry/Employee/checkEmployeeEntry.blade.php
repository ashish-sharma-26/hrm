@php
$url = config('app.url');

@endphp
@extends('layouts.entryLayout')
@section('content')
<form class="login100-form validate-form" action="{{ $url.'/checkEmployee' }}" method="post">
					<span class="login100-form-title">
                       <img src="{{ $url.'/images/login.png'}}" alt="IMG" style="width: 109px;display: block;margin: 12px auto;">
						Member Login
					</span>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
					<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Login
						</button>
					</div>

					

					<div class="text-center p-t-136">
					
					</div>
				</form>
 @stop