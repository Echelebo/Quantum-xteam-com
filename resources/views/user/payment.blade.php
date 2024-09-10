<?php
	if (Auth::user()->dashboard_style == "light") {
		$bg="light";
		$text = "dark";
	} else {
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
						<h1 class="title1 text-{{$text}}">Make Payment</h1>
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
								<div class="alert alert-danger alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									@foreach ($errors->all() as $error)
									<i class="fa fa-warning"></i> {{ $error }}
									@endforeach
								</div>
							</div>
						</div>
                	@endif
					<div class="row">
						<div class="col card bg-{{$bg}} shadow-lg p-4">
							@if($title=="Complete Payment")
								<div class="p-5 text-center alert-success">
									<h4 class="text-{{$text}}">You are to send <strong>{{$amount}} {{$coin}}</strong> to the address below or scan the QR code to complete payment.</h4>
									<h4 class="text-{{$text}}"><strong>{{$p_address}}</strong></h4><br>
									<img width="220" height="220" alt="Payment QR code" src="{{$p_qrcode}}">
								</div>
							@elseif($title == "Pay with card")
								<form action="charge" method="post">
									<input type="hidden" name="_token" value="{{csrf_token()}}">
									<script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
										data-key="{{$settings->s_p_k}}"
										data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
										data-name="{{$settings->site_name}}"
										data-description="Account fund"
										data-amount="{{$t_p}}"
										data-locale="auto">
									</script>
								</form>
							@else
							@php
								$price = round($rates->get_rate("BTC", "USD","price"), 3 );
								$amt = $amount / $price;
							@endphp
                                        
							<div class="mb-3 text-{{$text}}">
								<h4>You are to make payment of <strong>{{$settings->currency}}{{$amount}}</strong>  using your preferred mode of payment. See guide to Invest below.</h4>
								<?php 
									$pmodes = str_split($settings->payment_mode);
								?>
								
								<ol>
								    <li>Click on the Crypto icon to view our address.</li>
								    <li>Click on Copy Address to copy our address.</li>
								     <li>Make payment of {{$settings->currency}}{{$amount}}.</li>
								    <li>Take a screenshot of the payment.</li>
								    <li>Click on choose file under "Upload Payment proof after payment" and select the payment screenshot.</li>
								     <li>Choose Payment Method.</li>
								      <li>Click on "Submit Payment".</li>
								</ol>
							</div>
							<div class="row">
								@foreach($pmodes as $pmode)
									@if($pmode==1)
									<div class="col-lg-4">
										<div class="card bg-{{$bg}} shadow text-{{$text}}">
											<div class="card-body">
												<h4>
													<a style="text-decoration:none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#bank">
													<strong>Bank deposit/transfer </strong>
													<img src="{{ asset('home/images/bank-transfer.png')}}" width="70px;" height="40px;"> 
													</a>
												</h4>
												<div id="bank" class="panel-collapse collapse">
													<div class="">
														<h4 class="text-{{$text}}"><strong>Bank name:</strong> {{$settings->bank_name}}.</h4>
														<h4 class="text-{{$text}}"><strong>Account name:</strong> {{$settings->account_name}}.</h4>
														<h4 class="text-{{$text}}"><strong>Account number:</strong> {{$settings->account_number}}.</h4>
													</div>
												</div>	
											</div>
										</div>
									</div>
									@endif
									@if($pmode==2)
									<div class="col-lg-4">
										<div class="card bg-{{$bg}} shadow text-{{$text}}">
											<div class="card-body">
												<h4>
													<a style="text-decoration:none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#btc">
													<strong>Bitcoin</strong>
													<img src="{{ asset('home/images/btc.png')}}" width="40px;" height="40px;">
													</a>
												</h4>
												<div id="btc" class="panel-collapse collapse">
													<div class="">
													    <h6 class="text-{{$text}}">{{round($amt, 7)}} BTC</h6>
														<h4 class="text-{{$text}}">
														<strong>BTC Address:</strong><input type="text"  style="width: 200px;" value="{{$settings->btc_address}}"  id="myInput" readonly> 
														
														<br/><br />
														<button onclick="myFunction()">Copy BTC Address</button> 
														
														<br/>
														@if($settings->withdrawal_option != "manual")
														<a href="{{ url('dashboard/cpay') }}/{{$amount}}/BTC/{{ Auth::user()->id }}/new" class="btn btn-{{$text}}">Automatic payment method</a>
														@endif
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endif
									@if($pmode==3)
									@php
								$prices = round($rates->get_rate("ETH", "USD","price"), 3 );
								$amts = $amount / $prices;
							@endphp
									<div class="col-lg-4">
										<div class="card bg-{{$bg}} shadow text-{{$text}}">
											<div class="card-body">
												<h4>
													<a style="text-decoration:none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#eth">
													<strong>Ethereum</strong>
													<img src="{{ asset('home/images/eth.png')}}" width="40px;" height="40px;">
													</a>
												</h4>
												<div id="eth" class="panel-collapse collapse">
													<div class="">
													    <h6 class="text-{{$text}}">{{round($amts, 7)}} ETH</h6>
														<h4 class="text-{{$text}}">
														<strong>ETH Address:</strong> <input type="text"  style="width: 200px;" value="{{$settings->eth_address}}"  id="myInputs" readonly>
														<br/><br />
														
														<button onclick="myFunctions()">Copy ETH Address</button> <br/>
														@if($settings->withdrawal_option != "manual")
														<a href="{{ url('dashboard/cpay') }}/{{$amount}}/ETH/{{ Auth::user()->id }}/new" class="btn btn-{{$text}}">Automatic payment method</a>
														@endif
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endif
									@if($pmode==8)
									@php
								$prices = round($rates->get_rate("USDT", "USD","price"), 3 );
								$amts = $amount / $prices;
							@endphp
									<div class="col-lg-4">
										<div class="card bg-{{$bg}} shadow text-{{$text}}">
											<div class="card-body">
												<h4>
													<a style="text-decoration:none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#usdt">
													<strong>USDT(trc20)</strong>
													<img src="{{ asset('home/images/usdt.png')}}" width="40px;" height="40px;">
													</a>
												</h4>
												<div id="usdt" class="panel-collapse collapse">
													<div class="">
													    <h6 class="text-{{$text}}">{{round($amts, 7)}} USDT</h6>
														<h4 class="text-{{$text}}">
														<strong>USDT Address:</strong> <input type="text"  style="width: 200px;" value="{{$settings->usdt_address}}"  id="myInput1" readonly>
														<br/><br />
														
														<button onclick="myFunction1()">Copy USDT Address</button> <br/>
														@if($settings->withdrawal_option != "manual")
														<a href="{{ url('dashboard/cpay') }}/{{$amount}}/ETH/{{ Auth::user()->id }}/new" class="btn btn-{{$text}}">Automatic payment method</a>
														@endif
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endif
									
									
									@if($pmode==C)
									@php
								$prices = round($rates->get_rate("DOGE", "USD","price"), 3 );
								$amts = $amount / $prices;
							@endphp
									<div class="col-lg-4">
										<div class="card bg-{{$bg}} shadow text-{{$text}}">
											<div class="card-body">
												<h4>
													<a style="text-decoration:none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#doge">
													<strong>Doge Coin</strong>
													<img src="{{ asset('home/images/doge.png')}}" width="40px;" height="40px;">
													</a>
												</h4>
												<div id="doge" class="panel-collapse collapse">
													<div class="">
													    <h6 class="text-{{$text}}">{{round($amts, 7)}} DOGE</h6>
														<h4 class="text-{{$text}}">
														<strong>Doge Address:</strong> <input type="text"  style="width: 200px;" value="{{$settings->doge_address}}"  id="myInput2" readonly>
														<br/><br />
														
														<button onclick="myFunction2()">Copy DOGE Address</button> <br/>
														@if($settings->withdrawal_option != "manual")
														<a href="{{ url('dashboard/cpay') }}/{{$amount}}/ETH/{{ Auth::user()->id }}/new" class="btn btn-{{$text}}">Automatic payment method</a>
														@endif
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endif
									
									
									@if($pmode==J)
									@php
								$prices = round($rates->get_rate("DASH", "USD","price"), 3 );
								$amts = $amount / $prices;
							@endphp
									<div class="col-lg-4">
										<div class="card bg-{{$bg}} shadow text-{{$text}}">
											<div class="card-body">
												<h4>
													<a style="text-decoration:none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#dash">
													<strong>Dash</strong>
													<img src="{{ asset('home/images/dash.png')}}" width="40px;" height="40px;">
													</a>
												</h4>
												<div id="dash" class="panel-collapse collapse">
													<div class="">
													    <h6 class="text-{{$text}}">{{round($amts, 7)}} Dash</h6>
														<h4 class="text-{{$text}}">
														<strong>Dash Address:</strong> <input type="text"  style="width: 200px;" value="{{$settings->dash_address}}"  id="myInput3" readonly>
														<br/><br />
														
														<button onclick="myFunction3()">Copy Dash Address</button> <br/>
														@if($settings->withdrawal_option != "manual")
														<a href="{{ url('dashboard/cpay') }}/{{$amount}}/ETH/{{ Auth::user()->id }}/new" class="btn btn-{{$text}}">Automatic payment method</a>
														@endif
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endif
									
									
									@if($pmode==B)
									@php
								$prices = round($rates->get_rate("XRP", "USD","price"), 3 );
								$amts = $amount / $prices;
							@endphp
									<div class="col-lg-4">
										<div class="card bg-{{$bg}} shadow text-{{$text}}">
											<div class="card-body">
												<h4>
													<a style="text-decoration:none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#xrp">
													<strong>XRP</strong>
													<img src="{{ asset('home/images/xrp.png')}}" width="40px;" height="40px;">
													</a>
												</h4>
												<div id="xrp" class="panel-collapse collapse">
													<div class="">
													    <h6 class="text-{{$text}}">{{round($amts, 7)}} XRP</h6>
														<h4 class="text-{{$text}}">
														<strong>XRP Address:</strong> <input type="text"  style="width: 200px;" value="{{$settings->xrp_address}}"  id="myInput4" readonly>
														<br/><br />
														
														<button onclick="myFunction4()">Copy XRP Address</button> <br/>
														@if($settings->withdrawal_option != "manual")
														<a href="{{ url('dashboard/cpay') }}/{{$amount}}/ETH/{{ Auth::user()->id }}/new" class="btn btn-{{$text}}">Automatic payment method</a>
														@endif
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endif
									
									
									@if($pmode==N)
									@php
								$prices = round($rates->get_rate("TRX", "USD","price"), 3 );
								$amts = $amount / $prices;
							@endphp
									<div class="col-lg-4">
										<div class="card bg-{{$bg}} shadow text-{{$text}}">
											<div class="card-body">
												<h4>
													<a style="text-decoration:none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#trx">
													<strong>TRX</strong>
													<img src="{{ asset('home/images/trx.png')}}" width="40px;" height="40px;">
													</a>
												</h4>
												<div id="trx" class="panel-collapse collapse">
													<div class="">
													    <h6 class="text-{{$text}}">{{round($amts, 7)}} TRX</h6>
														<h4 class="text-{{$text}}">
														<strong>TRX Address:</strong> <input type="text"  style="width: 200px;" value="{{$settings->trx_address}}"  id="myInput5" readonly>
														<br/><br />
														
														<button onclick="myFunction5()">Copy TRX Address</button> <br/>
														@if($settings->withdrawal_option != "manual")
														<a href="{{ url('dashboard/cpay') }}/{{$amount}}/ETH/{{ Auth::user()->id }}/new" class="btn btn-{{$text}}">Automatic payment method</a>
														@endif
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endif
									
									
								@if($pmode==4)
									@php
								$prices = round($rates->get_rate("LTC", "USD","price"), 3 );
								$amts = $amount / $prices;
							@endphp
									<div class="col-lg-4">
										<div class="card bg-{{$bg}} shadow text-{{$text}}">
											<div class="card-body">
												<h4>
													<a style="text-decoration:none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#ltc">
													<strong>Litecoin</strong>
													<img src="{{ asset('home/images/ltc.png')}}" width="40px;" height="40px;">
													</a>
												</h4>
												<div id="ltc" class="panel-collapse collapse">
													<div class="">
													    <h6 class="text-{{$text}}">{{round($amts, 7)}} LTC</h6>
														<h4 class="text-{{$text}}">
														<strong>LTC Address:</strong> <input type="text"  style="width: 200px;" value="{{$settings->ltc_address}}"  id="myInput6" readonly>
														<br/><br />
														
														<button onclick="myFunction6()">Copy LTC Address</button> <br/>
														@if($settings->withdrawal_option != "manual")
														<a href="{{ url('dashboard/cpay') }}/{{$amount}}/ETH/{{ Auth::user()->id }}/new" class="btn btn-{{$text}}">Automatic payment method</a>
														@endif
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endif
									
									
								@if($pmode==L)
									@php
								$prices = round($rates->get_rate("PM", "USD","price"), 3 );
								$amts = $amount / $prices;
							@endphp
									<div class="col-lg-4">
										<div class="card bg-{{$bg}} shadow text-{{$text}}">
											<div class="card-body">
												<h4>
													<a style="text-decoration:none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#pm">
													<strong>Perfect Money</strong>
													<img src="{{ asset('home/images/pm.png')}}" width="40px;" height="40px;">
													</a>
												</h4>
												<div id="pm" class="panel-collapse collapse">
													<div class="">
													    
														<h4 class="text-{{$text}}">
														<strong>PM Account</strong> <input type="text"  style="width: 200px;" value="{{$settings->pm_address}}"  id="myInput7" readonly>
														<br/><br />
														
														<button onclick="myFunction7()">Copy PM Account</button> <br/>
														@if($settings->withdrawal_option != "manual")
														<a href="{{ url('dashboard/cpay') }}/{{$amount}}/ETH/{{ Auth::user()->id }}/new" class="btn btn-{{$text}}">Automatic payment method</a>
														@endif
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endif
									
									@if($pmode==D)
									@php
								$prices = round($rates->get_rate("Shiba", "USD","price"), 3 );
								$amts = $amount / $prices;
							@endphp
									<div class="col-lg-4">
										<div class="card bg-{{$bg}} shadow text-{{$text}}">
											<div class="card-body">
												<h4>
													<a style="text-decoration:none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#shiba">
													<strong>Shiba Inu</strong>
													<img src="{{ asset('home/images/shiba.png')}}" width="40px;" height="40px;">
													</a>
												</h4>
												<div id="shiba" class="panel-collapse collapse">
													<div class="">
													    
														<h4 class="text-{{$text}}">
														<strong>Shiba Address</strong> <input type="text"  style="width: 200px;" value="{{$settings->shiba_address}}"  id="myInput8" readonly>
														<br/><br />
														
														<button onclick="myFunction8()">Copy Shiba Address</button> <br/>
														@if($settings->withdrawal_option != "manual")
														<a href="{{ url('dashboard/cpay') }}/{{$amount}}/ETH/{{ Auth::user()->id }}/new" class="btn btn-{{$text}}">Automatic payment method</a>
														@endif
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endif
									
									@if($pmode==K)
									@php
								$prices = round($rates->get_rate("BCH", "USD","price"), 3 );
								$amts = $amount / $prices;
							@endphp
									<div class="col-lg-4">
										<div class="card bg-{{$bg}} shadow text-{{$text}}">
											<div class="card-body">
												<h4>
													<a style="text-decoration:none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#bch">
													<strong>Bitcoin Cash</strong>
													<img src="{{ asset('home/images/bch.png')}}" width="40px;" height="40px;">
													</a>
												</h4>
												<div id="bch" class="panel-collapse collapse">
													<div class="">
													    
														<h4 class="text-{{$text}}">
														<strong>BCH Address</strong> <input type="text"  style="width: 200px;" value="{{$settings->bch_address}}"  id="myInput9" readonly>
														<br/><br />
														
														<button onclick="myFunction9()">Copy BCH Address</button> <br/>
														@if($settings->withdrawal_option != "manual")
														<a href="{{ url('dashboard/cpay') }}/{{$amount}}/ETH/{{ Auth::user()->id }}/new" class="btn btn-{{$text}}">Automatic payment method</a>
														@endif
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endif
									
									@if($pmode==9)
									@php
								$prices = round($rates->get_rate("XLM", "USD","price"), 3 );
								$amts = $amount / $prices;
							@endphp
									<div class="col-lg-4">
										<div class="card bg-{{$bg}} shadow text-{{$text}}">
											<div class="card-body">
												<h4>
													<a style="text-decoration:none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#xlm">
													<strong>Stellar/XLM</strong>
													<img src="{{ asset('home/images/xlm.png')}}" width="40px;" height="40px;">
													</a>
												</h4>
												<div id="xlm" class="panel-collapse collapse">
													<div class="">
													    
														<h4 class="text-{{$text}}">
														<strong>XLM Address</strong> <input type="text"  style="width: 200px;" value="{{$settings->xlm_address}}"  id="myInput10" readonly>
														<br/><br />
														
														<button onclick="myFunction10()">Copy XLM Address</button> <br/>
														@if($settings->withdrawal_option != "manual")
														<a href="{{ url('dashboard/cpay') }}/{{$amount}}/ETH/{{ Auth::user()->id }}/new" class="btn btn-{{$text}}">Automatic payment method</a>
														@endif
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endif
									
									@if($pmode==I)
									@php
								$prices = round($rates->get_rate("BNB", "USD","price"), 3 );
								$amts = $amount / $prices;
							@endphp
									<div class="col-lg-4">
										<div class="card bg-{{$bg}} shadow text-{{$text}}">
											<div class="card-body">
												<h4>
													<a style="text-decoration:none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#bnb">
													<strong>BNB</strong>
													<img src="{{ asset('home/images/bnb.png')}}" width="40px;" height="40px;">
													</a>
												</h4>
												<div id="bnb" class="panel-collapse collapse">
													<div class="">
													    
														<h4 class="text-{{$text}}">
														<strong>BNB Address</strong> <input type="text"  style="width: 200px;" value="{{$settings->bnb_address}}"  id="myInput11" readonly>
														<br/><br />
														
														<button onclick="myFunction11()">Copy BNB Address</button> <br/>
														@if($settings->withdrawal_option != "manual")
														<a href="{{ url('dashboard/cpay') }}/{{$amount}}/ETH/{{ Auth::user()->id }}/new" class="btn btn-{{$text}}">Automatic payment method</a>
														@endif
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endif
									
									@if($pmode==M)
									@php
								$prices = round($rates->get_rate("ADA", "USD","price"), 3 );
								$amts = $amount / $prices;
							@endphp
									<div class="col-lg-4">
										<div class="card bg-{{$bg}} shadow text-{{$text}}">
											<div class="card-body">
												<h4>
													<a style="text-decoration:none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#ada">
													<strong>Cardona/ADA</strong>
													<img src="{{ asset('home/images/ada.png')}}" width="40px;" height="40px;">
													</a>
												</h4>
												<div id="ada" class="panel-collapse collapse">
													<div class="">
													    
														<h4 class="text-{{$text}}">
														<strong>Cardona Address</strong> <input type="text"  style="width: 200px;" value="{{$settings->ada_address}}"  id="myInput12" readonly>
														<br/><br />
														
														<button onclick="myFunction12()">Copy ADA Address</button> <br/>
														@if($settings->withdrawal_option != "manual")
														<a href="{{ url('dashboard/cpay') }}/{{$amount}}/ETH/{{ Auth::user()->id }}/new" class="btn btn-{{$text}}">Automatic payment method</a>
														@endif
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endif
									
									@if($pmode==H)
									@php
								$prices = round($rates->get_rate("BUSD", "USD","price"), 3 );
								$amts = $amount / $prices;
							@endphp
									<div class="col-lg-4">
										<div class="card bg-{{$bg}} shadow text-{{$text}}">
											<div class="card-body">
												<h4>
													<a style="text-decoration:none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#busd">
													<strong>BUSD</strong>
													<img src="{{ asset('home/images/busd.png')}}" width="40px;" height="40px;">
													</a>
												</h4>
												<div id="busd" class="panel-collapse collapse">
													<div class="">
													    
														<h4 class="text-{{$text}}">
														<strong>BUSD Address</strong> <input type="text"  style="width: 200px;" value="{{$settings->busd_address}}"  id="myInput13" readonly>
														<br/><br />
														
														<button onclick="myFunction13()">Copy BUSD Address</button> <br/>
														@if($settings->withdrawal_option != "manual")
														<a href="{{ url('dashboard/cpay') }}/{{$amount}}/ETH/{{ Auth::user()->id }}/new" class="btn btn-{{$text}}">Automatic payment method</a>
														@endif
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endif
									
									@if($pmode==E)
									@php
								$prices = round($rates->get_rate("USDC", "USD","price"), 3 );
								$amts = $amount / $prices;
							@endphp
									<div class="col-lg-4">
										<div class="card bg-{{$bg}} shadow text-{{$text}}">
											<div class="card-body">
												<h4>
													<a style="text-decoration:none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#usdc">
													<strong>USDC</strong>
													<img src="{{ asset('home/images/usdc.png')}}" width="40px;" height="40px;">
													</a>
												</h4>
												<div id="usdc" class="panel-collapse collapse">
													<div class="">
													    
														<h4 class="text-{{$text}}">
														<strong>USDC Address</strong> <input type="text"  style="width: 200px;" value="{{$settings->usdc_address}}"  id="myInput14" readonly>
														<br/><br />
														
														<button onclick="myFunction14()">Copy USDC Address</button> <br/>
														@if($settings->withdrawal_option != "manual")
														<a href="{{ url('dashboard/cpay') }}/{{$amount}}/ETH/{{ Auth::user()->id }}/new" class="btn btn-{{$text}}">Automatic payment method</a>
														@endif
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endif
									
									@if($pmode==G)
									@php
								$prices = round($rates->get_rate("SOL", "USD","price"), 3 );
								$amts = $amount / $prices;
							@endphp
									<div class="col-lg-4">
										<div class="card bg-{{$bg}} shadow text-{{$text}}">
											<div class="card-body">
												<h4>
													<a style="text-decoration:none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#sol">
													<strong>Solana</strong>
													<img src="{{ asset('home/images/sol.png')}}" width="40px;" height="40px;">
													</a>
												</h4>
												<div id="sol" class="panel-collapse collapse">
													<div class="">
													    
														<h4 class="text-{{$text}}">
														<strong>SOL Address</strong> <input type="text"  style="width: 200px;" value="{{$settings->sol_address}}"  id="myInput15" readonly>
														<br/><br />
														
														<button onclick="myFunction15()">Copy SOL Address</button> <br/>
														@if($settings->withdrawal_option != "manual")
														<a href="{{ url('dashboard/cpay') }}/{{$amount}}/ETH/{{ Auth::user()->id }}/new" class="btn btn-{{$text}}">Automatic payment method</a>
														@endif
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endif
									
									@if($pmode==F)
									@php
								$prices = round($rates->get_rate("DOT", "USD","price"), 3 );
								$amts = $amount / $prices;
							@endphp
									<div class="col-lg-4">
										<div class="card bg-{{$bg}} shadow text-{{$text}}">
											<div class="card-body">
												<h4>
													<a style="text-decoration:none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#dot">
													<strong>Polkadot</strong>
													<img src="{{ asset('home/images/dot.png')}}" width="40px;" height="40px;">
													</a>
												</h4>
												<div id="dot" class="panel-collapse collapse">
													<div class="">
													    
														<h4 class="text-{{$text}}">
														<strong>DOT Address</strong> <input type="text"  style="width: 200px;" value="{{$settings->dot_address}}"  id="myInput16" readonly>
														<br/><br />
														
														<button onclick="myFunction16()">Copy DOT Address</button> <br/>
														@if($settings->withdrawal_option != "manual")
														<a href="{{ url('dashboard/cpay') }}/{{$amount}}/ETH/{{ Auth::user()->id }}/new" class="btn btn-{{$text}}">Automatic payment method</a>
														@endif
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endif
									
									@if($pmode==A)
									@php
								$prices = round($rates->get_rate("LUNA", "USD","price"), 3 );
								$amts = $amount / $prices;
							@endphp
									<div class="col-lg-4">
										<div class="card bg-{{$bg}} shadow text-{{$text}}">
											<div class="card-body">
												<h4>
													<a style="text-decoration:none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#luna">
													<strong>Terra/Luna</strong>
													<img src="{{ asset('home/images/luna.png')}}" width="40px;" height="40px;">
													</a>
												</h4>
												<div id="luna" class="panel-collapse collapse">
													<div class="">
													    
														<h4 class="text-{{$text}}">
														<strong>LUNA Address</strong> <input type="text"  style="width: 200px;" value="{{$settings->luna_address}}"  id="myInput17" readonly>
														<br/><br />
														
														<button onclick="myFunction17()">Copy LUNA Address</button> <br/>
														@if($settings->withdrawal_option != "manual")
														<a href="{{ url('dashboard/cpay') }}/{{$amount}}/ETH/{{ Auth::user()->id }}/new" class="btn btn-{{$text}}">Automatic payment method</a>
														@endif
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endif
									
									@if($pmode==5)
									<div class="col-lg-4">
										<div class="card bg-{{$bg}} shadow text-{{$text}}">
											<div class="card-body">
												<h4 class="text-{{$text}}">
													<a style="text-decoration:none;"  class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#stripe">
													<strong>Credit card 
													<img src="{{ asset('home/images/c3.jpg')}}" width="70px;" height="40px;"> 
													<img src="{{ asset('home/images/c2.jpg')}}" width="70px;" height="40px;">
													</strong>
													</a>
												</h4>
												<div id="stripe" class="panel-collapse collapse">
													<div class="">
														<h4 class="text-{{$text}}"> <br>
														<a href="{{ url('dashboard/paywithcard') }}/{{$amount}}" class="btn btn-{{$text}}">Pay with card</a>
														
														</h4>
													</div>
												</div>
											</div>
										</div>
									</div>
									@endif
									@if($pmode==6)
									<div class="col-lg-4">
										<div class="card bg-{{$bg}} shadow text-{{$text}}">
											<div class="card-body">
												<h4 class="text-{{$text}}">
													<a style="text-decoration:none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#paypal">
													<strong>PayPal</strong> <img src="{{ asset('home/images/pp.png')}}" width="40px;" height="40px;">
													</a>
												</h4>
												<div id="paypal" class="panel-collapse collapse">
													<h4 class="text-{{$text}}">
														@include('includes.paypal')
													</h4>
												</div>
											</div>
										</div>
									</div>
									@endif
									@if($pmode==7)
									<div class="col-lg-4">
										<div class="card bg-{{$bg}} shadow text-{{$text}}">
											<div class="card-body">
												<h4 class="text-{{$text}}">
													<a style="text-decoration:none;" class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#paystack">
													<strong>Paystack</strong> <img src="{{ asset('home/images/paystack.png')}}" width="100px;">
													</a>
												</h4>
												<?php $payamount = $amount * 100  ?>
												<div id="paystack" class="pt-3 panel-collapse collapse">
													<form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
														<input type="hidden" name="email" value="{{auth::user()->email}}">
														<input type="hidden" name="amount" value="{{$payamount}}">
														<input type="hidden" name="currency" value="{{$settings->s_currency}}">
														<input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}" > 
														<input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> 
														<input type="hidden" name="_token" value="{{ csrf_token() }}"> 
														<p>
														<button class="py-2 btn btn-primary" type="submit" value="Pay Now!">
														<i class="fa fa-credit-card fa-lg"></i> Pay with Card
														</button>
														</p>
													</form>
												</div>
											</div>
										</div>
									</div>
									@endif
								@endforeach
							</div> <br> <br>
							{{-- <div class=" shadow bg-{{$bg}} p-3">
								<h4>Contact management at <strong>{{$settings->contact_email}}</strong> for other payment methods.</h4>
							</div>	 --}}
							<div>
								<form method="post" action="{{action('SomeController@savedeposit')}}" enctype="multipart/form-data">
										<h5 class="text-{{$text}}">Upload Payment proof after payment. </h5>
										<input type="file" name="proof" class="form-control col-lg-4 bg-{{$bg}} text-{{$text}}" required>
									<br>
									
									<h5 class="text-{{$text}}">Payment Mode Used:</h5>
									
									<select name="payment_mode" class="form-control col-lg-4 bg-{{$bg}} text-{{$text}}" required>
									    @foreach($pmodes as $pmode)
									    @if($pmode==2)
									    <option>Bitcoin</option>
									    @endif
									    @if($pmode==3)
										<option>Ethereum</option>
										@endif
										@if($pmode==C)
										<option>Doge Coin</option>
										@endif
										@if($pmode==4)
										<option>Litecoin</option>
										@endif
										@if($pmode==K)
										<option>Bitcoin Cash</option>
										@endif
										@if($pmode==B)
										<option>XRP</option>
										@endif
										@if($pmode==N)
										<option>TRX</option>
										@endif
										@if($pmode==J)
										<option>Dash</option>
										@endif
										@if($pmode==D)
										<option>ShibaInu</option>
										@endif
										@if($pmode==9)
										<option>Stellar/XLM</option>
										@endif
										@if($pmode==I)
										<option>BNB</option>
										@endif
										@if($pmode==M)
										<option>Cardona/ADA</option>
										@endif
										@if($pmode==H)
										<option>BUSD</option>
										@endif
										@if($pmode==E)
										<option>USDC</option>
										@endif
										@if($pmode==G)
										<option>Solana</option>
										@endif
										@if($pmode==F)
										<option>Polkadot</option>
										@endif
										@if($pmode==A)
										<option>Terra/Luna</option>
										@endif
										@if($pmode==8)
										<option>USDT</option>
										@endif
										@if($pmode==L)
										<option>Perfect Money</option>
										@endif
										@endforeach
									</select>
									
									<br> <br>
									<div >
										<input onclick="this.disabled=true;this.value='processing, please wait...';this.form.submit();" type="submit" class="btn btn-{{$text}}" style=" background-color: #6495ED; color: #ffffff;" value="Submit payment">
									</div> 
									<input type="hidden" name="amount" value="{{$amount}}">
									<input type="hidden" name="pay_type" value="{{$pay_type}}">
									<input type="hidden" name="duration" value="{{$durations}}">
									<input type="hidden" name="increment_amount" value="{{$increment_amount}}">
									<input type="hidden" name="plan_id" value="{{$plan_id}}">
									<input type="hidden" name="_token" value="{{ csrf_token() }}">
								</form>
							</div>
							@endif
						</div>
					</div>







				</div>
			</div>
			
			<script>

function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>

<script>

function myFunctions() {
  /* Get the text field */
  var copyText = document.getElementById("myInputs");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>

<script>

function myFunction1() {
  /* Get the text field */
  var copyText = document.getElementById("myInput1");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>

<script>

function myFunction2() {
  /* Get the text field */
  var copyText = document.getElementById("myInput2");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>

<script>

function myFunction3() {
  /* Get the text field */
  var copyText = document.getElementById("myInput3");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>

<script>

function myFunction4() {
  /* Get the text field */
  var copyText = document.getElementById("myInput4");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>

<script>

function myFunction5() {
  /* Get the text field */
  var copyText = document.getElementById("myInput5");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>

<script>

function myFunction6() {
  /* Get the text field */
  var copyText = document.getElementById("myInput6");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>
<script>

function myFunction7() {
  /* Get the text field */
  var copyText = document.getElementById("myInput7");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>

<script>

function myFunction8() {
  /* Get the text field */
  var copyText = document.getElementById("myInput8");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>

<script>

function myFunction9() {
  /* Get the text field */
  var copyText = document.getElementById("myInput9");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>

<script>

function myFunction10() {
  /* Get the text field */
  var copyText = document.getElementById("myInput10");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>
<script>

function myFunction11() {
  /* Get the text field */
  var copyText = document.getElementById("myInput11");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>
<script>

function myFunction12() {
  /* Get the text field */
  var copyText = document.getElementById("myInput12");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>
<script>

function myFunction13() {
  /* Get the text field */
  var copyText = document.getElementById("myInput13");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>
<script>

function myFunction14() {
  /* Get the text field */
  var copyText = document.getElementById("myInput14");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>
<script>

function myFunction15() {
  /* Get the text field */
  var copyText = document.getElementById("myInput15");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>
<script>

function myFunction16() {
  /* Get the text field */
  var copyText = document.getElementById("myInput16");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>
<script>

function myFunction17() {
  /* Get the text field */
  var copyText = document.getElementById("myInput17");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  alert("Copied the text: " + copyText.value);
}
</script>
    @endsection
