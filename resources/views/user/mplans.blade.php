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
						<h1 class="title1 text-{{$text}}">Invest</h1>
					</div>
					@if(Session::has('message'))
					<div class="row">
						<div class="col-lg-12">
							<div class="alert alert-info alert-dismissable">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<i class="fa fa-info-circle"></i> {{ Session::get('message') }}
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
					
					<div class="mb-5 row">
						@foreach($plans as $plan)
						
						<div class="col-lg-6 p-4 card bg-{{$bg}} shadow-lg">
						    
							<div class="pricing-table purple border bg-{{$bg}} shadow-lg">
								<!-- Table Head -->
								
								<h3><font color="#FF7742">{{$plan->name}}</font></h3>
							    <p align="center"><font color="#6495ED" size="5">
							       Get <?php
							       $a = 100;
							       $b = $plan->increment_amount;
							       $c = $b-$a;
							       echo $c."%";
							       ?> in {{$plan->increment_interval}}
							      </font></p>
								<!-- Features -->
								<div class="pricing-features">
									<div class="feature text-{{$text}}">Minimum Amount:<span class="text-{{$text}}">{{$settings->currency}}{{$plan->min_price}}</span></div>
									<div class="feature text-{{$text}}">Maximum Amount:<span  class="text-{{$text}}">@if($plan->max_price < 1000000){{$settings->currency}}{{$plan->max_price}}
									
									@else
									
									Unlimited
									@endif</span></div>
									<!--<div class="feature text-{{$text}}">Minimum Return:<span class="text-{{$text}}">{{$settings->currency}}{{$plan->minr}}</span></div>
									<div class="feature text-{{$text}}">Maximum Return:<span class="text-{{$text}}">{{$settings->currency}}{{$plan->maxr}}</span></div>-->
									
									
								</div> <br>
								<!-- Button -->
								<div class="">
									<form style="padding:3px;" role="form" method="post" action="{{action('SomeController@deposit')}}">
										<input type="text" min="{{$plan->min_price}}" max="{{$plan->max_price}}" name="amount"  placeholder="Type In Amount" class="form-control text-{{$text}} bg-{{$bg}}"> <br>
										<input type="hidden" name="duration" value="{{$plan->expiration}}">
										<input type="hidden" name="id" value="{{ $plan->id }}">
										<input type="hidden" name="_token" value="{{ csrf_token() }}">
										<input type="submit" onclick="this.disabled=true;this.value='processing, please wait...';this.form.submit();" class="btn btn-block pricing-action nav-pills" value="Invest" style="border-radius: 40px; background-color: #6495ED; color: #ffffff;">
									</form>
								</div>
								
								
							</div>
							<!-- Deposit for a plan Modal -->
							<div id="depositModal{{$plan->id}}" class="modal fade" role="dialog">
								<div class="modal-dialog">
							<!-- Modal content-->
									<div class="modal-content">
										<div class="modal-header bg-dark">
										<h4 class="modal-title" style="text-align:center;">Make a deposit of <strong>{{$settings->currency}}{{$plan->price}} to join this plan</strong></h4>
											<button type="button" class="text-white close" data-dismiss="modal">&times;</button>
										</div>
										<div class="modal-body bg-dark">
											<form style="padding:3px;" role="form" method="post" action="{{action('SomeController@deposit')}}">
												<input style="padding:5px;" class="form-control" value="{{$plan->price}}" type="text" name="amount" required><br/>
												
												<input type="hidden" name="_token" value="{{ csrf_token() }}">
												<input type="hidden" name="pay_type" value="plandeposit">
												<input type="hidden" name="plan_id" value="{{$plan->id}}">
												<input type="submit" class="btn btn-default" value="Continue">
											</form>
										</div>
									</div>
								</div>
							</div>
							<!-- /deposit for a plan Modal -->
						</div>
						@endforeach
					</div>
				</div>	
			</div>
				
		@include('user.modals')
    @endsection