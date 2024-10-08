<?php
	if (Auth::user()->dashboard_style == "light") {
		$bgmenu="blue";
    $bg="light";
    $text = "dark";
} else {
    $bgmenu="dark";
    $bg="dark";
    $text = "light";

}
?> 
<link rel="stylesheet" href="../assets/css/dashlitef71b.css?ver=2.8.0">
<link id="skin-default" rel="stylesheet" href="../assets/css/themef71b.css?ver=2.8.0">
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-91615293-4">
</script>
<script>window.dataLayer = window.dataLayer || [];function gtag() {dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-91615293-4');</script>
@inject('rates', 'App\Http\Controllers\TraitController')
@extends('layouts.app')
    @section('content')
        @include('user.topmenu')
        @include('user.sidebar')
        <div class="main-panel bg-{{$bg}}">
			<div class="content bg-{{$bg}}">
				<div class="page-inner">
					<div class="mt-2 mb-4">
						<h1 class="title1 text-{{$text}}">Account Profile Information</h1>
					</div>
					@if(Session::has('message'))
					<div class="row">
						<div class="col-lg-12">
							<div class="alert alert-info alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="fa fa-info-circle"></i> {{Session::get('message')}}
							</div>
						</div>
					</div>
					@endif
		
					@if(count($errors) > 0)
					<div class="row">
						<div class="col-lg-12">
							<div class="alert alert-danger alert-dismissable" role="alert" >
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								@foreach ($errors->all() as $error)
								<i class="fa fa-warning"></i> {{ $error }}
								@endforeach
							</div>
						</div>
					</div>
					@endif
					<div class="row profile">
						<div class="col-lg-3 col-sm-12 bg-{{$bg}} p-3">
							<div class="profile-sidebar card bg-{{$bg}} shadow rounded pb-5 pt-5">
                                <!-- SIDEBAR USERPIC -->
                                
                                <!-- END SIDEBAR USERPIC -->
                                <!-- SIDEBAR USER TITLE -->
                                <div class="profile-usertitle">
                                  <div class="profile-usertitle-name">
                                    {{ Auth::user()->name }} {{ Auth::user()->l_name }}
                                  </div>
                                  <div class="profile-usertitle-job">
                                    {{$settings->site_name}} User
                                  </div>
                                </div>
                                <!-- END SIDEBAR USER TITLE -->
                                <!-- SIDEBAR BUTTONS -->
                                
                                <!-- END SIDEBAR BUTTONS -->
                                
                            </div>
                        </div>
                        <div class="col-lg-9 p-2">
                            <div class="card p-5 shadow-lg bg-{{$bg}}">
                                <h2> <span class="fa fa-user"></span> &nbsp; {{ Auth::user()->name }} {{ Auth::user()->l_name }}</h2>
                                
                                <h5> <span class="fa fa-envelope"></span> &nbsp; {{ Auth::user()->email }}  </h5>
                                <h5> <span class="fa fa-mobile"></span> &nbsp; {{ Auth::user()->phone_number }}  </h5>
                                
                               
                                <form action="javascript:void(0)" method="post" id="styleform" class="form-inline">
                                    <div class="form-group">
                                        <h5 class="text-{{$text}}">Switch Dashboard Style:</h5> &nbsp; &nbsp;
                                        <label class="style_switch">
                                            <input name="style" id="style" type="checkbox" value="true" class="modes">
                                            <span class="slider round"></span>
                                        </label>
                                    </div> 
                                    @if(Auth::user()->dashboard_style =='dark')
                                    <script>document.getElementById("style").checked= true;</script>
                                    @endif
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                </form>
                                <div>
                                    <input type="submit" data-toggle="modal" data-target="#edit" style="background-color: #6495ED; color: #ffffff;" value="Update Info" class="btn">
                                </div>

                                <div id="edit" class="modal fade" role="dialog">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                        <div class="modal-header .modal-dialog-centered bg-{{$bg}}">
                                            Edit my Profile
                                            <button type="button" class="close text-{{$text}}" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body bg-{{$bg}}">
                                            <form role="form" method="post"action="{{action('SomeController@updateprofile')}}">
                                            <input type="hidden" name="user_id" value="{{$userinfo->id}}">
                                                
                                                <h5 class="text-{{$text}}">Firstname</h5>
                                            <input type="text" name="firstname" value="{{$userinfo->name}}" class="form-control bg-{{$bg}} text-{{$text}}"> <br>
                                                <h5 class="text-{{$text}}">Surname</h5>
                                                <input type="text" name="surname" value="{{$userinfo->l_name}}" class="form-control bg-{{$bg}} text-{{$text}}"> <br>
                                                <h5 class="text-{{$text}}">Date of Birth</h5>
                                                <input type="date" name="dob"  class="form-control bg-{{$bg}} text-{{$text}}" value="{{$userinfo->dob}}"> <br>
                                                <h5 class="text-{{$text}}">Phone Number</h5>
                                                <input type="text" name="phone"  class="form-control bg-{{$bg}} text-{{$text}}" value="{{$userinfo->phone_number}}"> <br>
                                                <h5 class="text-{{$text}}">Address</h5>
                                                <textarea class="form-control bg-{{$bg}} text-{{$text}}" placeholder="Full Address" name="address" row="3" value="{{$userinfo->adress}}">{{$userinfo->adress}}</textarea><br/>
                                                    <input type="hidden" name="user_id" value="">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-primary" value="Update">
                                            </form>
                                        </div>
                                        </div>
                                    </div>
                                    
                                    <script type="text/javascript">
                                            $("#styleform").on('change',function(){
                                            $.ajax({
                                                url: "{{url('/dashboard/changetheme')}}",
                                                type: 'POST',
                                                data:$("#styleform").serialize(),
                                                success: function (data) {
                                                    location.reload(true);
                                                },
                                                error: function (data) {
                                                    console.log('Something went wrong');
                                                },

                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
					</div>
				</div>	
			</div>
	@endsection