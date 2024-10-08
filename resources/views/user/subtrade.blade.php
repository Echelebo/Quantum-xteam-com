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
						<h1 class="title1 text-{{$text}}">Subscription Trade</h1>
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
					<div class="row mb-5">
						<div class="col-lg-8 offset-lg-2 card bg-{{$bg}} shadow-lg p-lg-3 p-sm-5">
						<h2 class="text-{{$text}}">{{$settings->site_name}} Account manager</h2> <br>
							<div clas="well">
							<p class="text-justify text-{{$text}}">Don’t have time to trade or learn how to trade? 
							Our Account Management Service is The Best Profitable Trading Option for you, 
							We can help you to manage your account in the financial MARKET with a simple subscription model.<br>
							<small>Terms and Conditions apply</small><br>Reach us at {{$settings->contact_email}} 
							for more info.</p>
							</div>
							<br>
							<div>
								<a type="button" class="btn btn-primary text-white mb-2" data-toggle="modal" data-target="#SubpayModal">
								Subscribe Now
								</a> &nbsp; &nbsp; &nbsp;
								<a type="button" class="btn btn-danger text-white mb-2" data-toggle="modal" data-target="#submitmt4modal">
								Submit MT4 Details
								</a>	
							</div>
							
						</div>
					</div>
					<div class="row mb-5 card shadow bg-{{$bg}} p-4 ">
						<div class="col-12 mb-3">
							<h1 class="text-{{$text}}">My MT4 List</h1>
						</div>
                        <div class="col-12">
                            <div class="table-responsive" data-example-id="hoverable-table">
                                <table id="ShipTable" class="table table-hover text-{{$text}}"> 
                                    <thead> 
                                        <tr> 
                                            <th>MT4 ID</th>
                                            <th>MT4 Password</th>
                                            <th>Account Type</th>
                                            <th>Currency</th>
                                            <th>Leverage</th>
                                            <th>Server</th>
                                            <th>Duration</th>
                                            <th>Submitted at</th>
                                            <th>Started at</th>
											<th>Expiring at</th>
											<th>Status</th>
                                            <th>Action</th>
                                        </tr> 
                                    </thead> 
                                    <tbody> 
                                    @foreach($subscriptions as $sub)
                                    <tr>
                                        <td>{{$sub->mt4_id}}</td>
                                            <td>{{$sub->mt4_password}}</td>
                                            <td>{{$sub->account_type}}</td>
                                            <td>{{$sub->currency}}</td>
                                            <td>{{$sub->leverage}}</td>
                                            <td>{{$sub->server}}</td>
                                            <td>{{$sub->duration}}</td>
                                            <td>{{\Carbon\Carbon::parse($sub->created_at)->toDayDateTimeString()}}</td>
                                            <td>{{\Carbon\Carbon::parse($sub->start_date)->toDayDateTimeString()}}</td>
											<td>{{\Carbon\Carbon::parse($sub->end_date)->toDayDateTimeString()}}</td>
											<td>{{$sub->status}}</td>
                                            <td>
												@if ($sub->status == "Pending")
												<a href="{{ url('dashboard/delsubtrade') }}/{{$sub->id}}" class="btn btn-danger btn-sm">Delete</a>	
												@else
												<a href="#" data-toggle="modal" data-target="#delsubmodal" class="btn btn-danger btn-sm">Delete</a>
												@endif
                                            </td>
                                    </tr>
                                    @endforeach
                                    </tbody> 
                                </table>
                            </div>
                        </div>
                    </div>
				</div>	
			</div>
			@include('user.modals')
	@endsection