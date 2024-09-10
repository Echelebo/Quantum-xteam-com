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
						<h1 class="text-{{$text}}">Add your withdrawal info</h1>
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
					<div class="row mb-4">
						<div class="col card p-3 shadow-lg bg-{{$bg}}">
							<div class="accordion accordion-{{$text}} ">
								<form method="post" action="{{action('UsersController@updateacct')}}">
								<!--............................... collapse one -->
								<!--<div class="card">
									<div class="card-header bg-{{$bgmenu}}" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
										<div class="span-icon">
											<div class="fa fa-clone"></div>
										</div>
										<div class="span-title text-{{$text}}">
											Bank transfer
										</div>
										<div class="span-mode"></div>
									</div>
									<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
										<div class="card-body bg-{{$bg}} shadow">
											<div class="form-group">
												<h5 class="text-{{$text}}">Bank Name</h5>
												<input type="text" name="bank_name" value="{{Auth::user()->bank_name}}"  class="form-control text-{{$text}} bg-{{$bg}}" placeholder="Enter bank name">
											</div>
											<div class="form-group">
												<h5 class="text-{{$text}}">Account Name</h5>
												<input type="text" name="account_name" value="{{Auth::user()->account_name}}"  class="form-control  text-{{$text}} bg-{{$bg}}" placeholder="Enter Account name">
											</div>
											<div class="form-group">
												<h5 class="text-{{$text}}">Account Number</h5>
												<input type="text" name="account_no" value="{{Auth::user()->account_no}}"  class="form-control text-{{$text}} bg-{{$bg}}" placeholder="Enter Account Number">
											</div>
										</div>
									</div>
								</div>-->
									<!--............................... collapse two -->
									@foreach($wmethods as $method)
									@if ($method->name=='Bitcoin')
								<div class="card">
									<div class="card-header" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo" style="background-color: #6495ED; color: #ffffff;">
										<div class="span-icon">
											<div class="fa fa-clone"></div>
										</div>
										<div class="span-title text-{{$text}}">
											BItcoin
										</div>
										<div class="span-mode"></div>
									</div>
									<div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
										<div class="card-body bg-{{$bg}} shadow">
											<div class="form-group">
												<h5 class="text-{{$text}}">PASTE YOUR BITCOIN ADDRESS</h5>
												<input type="text" name="btc_address" value="{{Auth::user()->btc_address}}"  class="form-control text-{{$text}} bg-{{$bg}}" placeholder="Enter Bitcoin Address">
											</div>
										</div>
									</div>
								</div>
								@endif
						<!--............................... collapse three -->
						@if ($method->name=='Ethereum')
								<div class="card">
									<div class="card-header" id="headingThree" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree" style="background-color: #6495ED; color: #ffffff;">
										<div class="span-icon">
											<div class="fa fa-clone"></div>
										</div>
										<div class="span-title text-{{$text}}">
										Ethereum
										</div>
										<div class="span-mode"></div>
									</div>
									<div id="collapseThree" class="collapse show" aria-labelledby="headingThree" data-parent="#accordion">
										<div class="card-body bg-{{$bg}} shadow">
											<div class="form-group">
												<h5 class="text-{{$text}}">PASTE YOUR ETHEREUM ADDRESS</h5>
												<input type="text" name="eth_address" value="{{Auth::user()->eth_address}}"  class="form-control text-{{$text}} bg-{{$bg}}" placeholder="Enter Ethereum Address">
											</div>
										</div>
									</div>
								</div>
								@endif
								<!--............................... collapse four -->
								@if ($method->name=='Litecoin')
							<div class="card">
									<div class="card-header" id="headingFour" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour" style="background-color: #6495ED; color: #ffffff;">
										<div class="span-icon">
											<div class="fa fa-clone"></div>
										</div>
										<div class="span-title text-{{$text}}">
											Litecoin
										</div>
										<div class="span-mode"></div>
									</div>
									<div id="collapseFour" class="collapse show" aria-labelledby="headingFour" data-parent="#accordion">
										<div class="card-body bg-{{$bg}} shadow">
											<div class="form-group">
												<h5 class="text-{{$text}} bg-{{$bg}}">PASTE YOUR LTC ADDRESS</h5>
												<input type="text" name="ltc_address" value="{{Auth::user()->ltc_address}}"  class="form-control text-{{$text}} bg-{{$bg}}" placeholder="Enter Litcoin Address">
											</div>
										</div>
									</div>
								</div>
								@endif
								<!--......................... end of collaps four -->
								@if ($method->name=='Bitcoin Cash')
								<div class="card">
									<div class="card-header" id="headingFive" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive" style="background-color: #6495ED; color: #ffffff;">
										<div class="span-icon">
											<div class="fa fa-clone"></div>
										</div>
										<div class="span-title text-{{$text}}">
											Bitcoin Cash
										</div>
										<div class="span-mode"></div>
									</div>
									<div id="collapseFive" class="collapse show" aria-labelledby="headingFive" data-parent="#accordion">
										<div class="card-body bg-{{$bg}} shadow">
											<div class="form-group">
												<h5 class="text-{{$text}}">PASTE YOUR BITCOIN CASH ADDRESS</h5>
												<input type="text" name="bch_address" value="{{Auth::user()->bch_address}}"  class="form-control text-{{$text}} bg-{{$bg}}" placeholder="Enter Bitcoin Cash Address">
											</div>
										</div>
									</div>
								</div>
								@endif
								
								@if ($method->name=='Doge')
								<div class="card">
									<div class="card-header" id="headingSix" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix" style="background-color: #6495ED; color: #ffffff;">
										<div class="span-icon">
											<div class="fa fa-clone"></div>
										</div>
										<div class="span-title text-{{$text}}">
											DogeCoin
										</div>
										<div class="span-mode"></div>
									</div>
									<div id="collapseSix" class="collapse show" aria-labelledby="headingSix" data-parent="#accordion">
										<div class="card-body bg-{{$bg}} shadow">
											<div class="form-group">
												<h5 class="text-{{$text}}">PASTE YOUR DOGE ADDRESS</h5>
												<input type="text" name="doge_address" value="{{Auth::user()->doge_address}}"  class="form-control text-{{$text}} bg-{{$bg}}" placeholder="Enter Doge Address">
											</div>
										</div>
									</div>
								</div>
								@endif
								
								@if ($method->name=='Dash')
								<div class="card">
									<div class="card-header" id="headingSeven" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven" style="background-color: #6495ED; color: #ffffff;">
										<div class="span-icon">
											<div class="fa fa-clone"></div>
										</div>
										<div class="span-title text-{{$text}}">
											Dash
										</div>
										<div class="span-mode"></div>
									</div>
									<div id="collapseSeven" class="collapse show" aria-labelledby="headingSeven" data-parent="#accordion">
										<div class="card-body bg-{{$bg}} shadow">
											<div class="form-group">
												<h5 class="text-{{$text}}">PASTE YOUR DASH ADDRESS</h5>
												<input type="text" name="dash_address" value="{{Auth::user()->dash_address}}"  class="form-control text-{{$text}} bg-{{$bg}}" placeholder="Enter Dash Address">
											</div>
										</div>
									</div>
								</div>
								@endif
								
								
								@if ($method->name=='USDT')
								<div class="card">
									<div class="card-header" id="headingEight" data-toggle="collapse" data-target="#collapseEight" aria-expanded="true" aria-controls="collapseEight" style="background-color: #6495ED; color: #ffffff;">
										<div class="span-icon">
											<div class="fa fa-clone"></div>
										</div>
										<div class="span-title text-{{$text}}">
											USDT
										</div>
										<div class="span-mode"></div>
									</div>
									<div id="collapseEight" class="collapse show" aria-labelledby="headingEight" data-parent="#accordion">
										<div class="card-body bg-{{$bg}} shadow">
											<div class="form-group">
												<h5 class="text-{{$text}}">PASTE YOUR USDT ADDRESS</h5>
												<input type="text" name="usdt_address" value="{{Auth::user()->usdt_address}}"  class="form-control text-{{$text}} bg-{{$bg}}" placeholder="Enter USDT Address">
											</div>
										</div>
									</div>
								</div>
								@endif
								
								@if ($method->name=='TRX')
								<div class="card">
									<div class="card-header" id="headingNine" data-toggle="collapse" data-target="#collapseNine" aria-expanded="true" aria-controls="collapseNine" style="background-color: #6495ED; color: #ffffff;">
										<div class="span-icon">
											<div class="fa fa-clone"></div>
										</div>
										<div class="span-title text-{{$text}}">
											TRX
										</div>
										<div class="span-mode"></div>
									</div>
									<div id="collapseNine" class="collapse show" aria-labelledby="headingNine" data-parent="#accordion">
										<div class="card-body bg-{{$bg}} shadow">
											<div class="form-group">
												<h5 class="text-{{$text}}">PASTE YOUR TRX ADDRESS</h5>
												<input type="text" name="trx_address" value="{{Auth::user()->trx_address}}"  class="form-control text-{{$text}} bg-{{$bg}}" placeholder="Enter TRX Address">
											</div>
										</div>
									</div>
								</div>
								@endif
								
								@if ($method->name=='USDC')
								<div class="card">
									<div class="card-header" id="headingTen" data-toggle="collapse" data-target="#collapseTen" aria-expanded="true" aria-controls="collapseTen" style="background-color: #6495ED; color: #ffffff;">
										<div class="span-icon">
											<div class="fa fa-clone"></div>
										</div>
										<div class="span-title text-{{$text}}">
											USDC
										</div>
										<div class="span-mode"></div>
									</div>
									<div id="collapseTen" class="collapse show" aria-labelledby="headingTen" data-parent="#accordion">
										<div class="card-body bg-{{$bg}} shadow">
											<div class="form-group">
												<h5 class="text-{{$text}}">PASTE YOUR USDC ADDRESS</h5>
												<input type="text" name="usdc_address" value="{{Auth::user()->usdc_address}}"  class="form-control text-{{$text}} bg-{{$bg}}" placeholder="Enter USDC Address">
											</div>
										</div>
									</div>
								</div>
								@endif
								
								@if ($method->name=='BNB')
								<div class="card">
									<div class="card-header" id="headingEleven" data-toggle="collapse" data-target="#collapseEleven" aria-expanded="true" aria-controls="collapseEleven" style="background-color: #6495ED; color: #ffffff;"> 
										<div class="span-icon">
											<div class="fa fa-clone"></div>
										</div>
										<div class="span-title text-{{$text}}">
											BNB
										</div>
										<div class="span-mode"></div>
									</div>
									<div id="collapseEleven" class="collapse show" aria-labelledby="headingEleven" data-parent="#accordion">
										<div class="card-body bg-{{$bg}} shadow">
											<div class="form-group">
												<h5 class="text-{{$text}}">PASTE YOUR BNB ADDRESS</h5>
												<input type="text" name="bnb_address" value="{{Auth::user()->bnb_address}}"  class="form-control text-{{$text}} bg-{{$bg}}" placeholder="Enter BNB Address">
											</div>
										</div>
									</div>
								</div>
								@endif
								
								@if ($method->name=='Cardona(ADA)')
								<div class="card">
									<div class="card-header" id="headingTwelve" data-toggle="collapse" data-target="#collapseTwelve" aria-expanded="true" aria-controls="collapseTwelve" style="background-color: #6495ED; color: #ffffff;">
										<div class="span-icon">
											<div class="fa fa-clone"></div>
										</div>
										<div class="span-title text-{{$text}}">
											Cardona
										</div>
										<div class="span-mode"></div>
									</div>
									<div id="collapseTwelve" class="collapse show" aria-labelledby="headingTwelve" data-parent="#accordion">
										<div class="card-body bg-{{$bg}} shadow">
											<div class="form-group">
												<h5 class="text-{{$text}}">PASTE YOUR ADA ADDRESS</h5>
												<input type="text" name="ada_address" value="{{Auth::user()->ada_address}}"  class="form-control text-{{$text}} bg-{{$bg}}" placeholder="Enter ADA Address">
											</div>
										</div>
									</div>
								</div>
								@endif
								
								
								@if ($method->name=='Polkadot')
								<div class="card">
									<div class="card-header " id="headingThirteen" data-toggle="collapse" data-target="#collapseThirteen" aria-expanded="true" aria-controls="collapseThirteen" style="background-color: #6495ED; color: #ffffff;">
										<div class="span-icon">
											<div class="fa fa-clone"></div>
										</div>
										<div class="span-title text-{{$text}}">
											Polkadot
										</div>
										<div class="span-mode"></div>
									</div>
									<div id="collapseThirteen" class="collapse show" aria-labelledby="headingThirteen" data-parent="#accordion">
										<div class="card-body bg-{{$bg}} shadow">
											<div class="form-group">
												<h5 class="text-{{$text}}">PASTE YOUR POLKADOT ADDRESS</h5>
												<input type="text" name="dot_address" value="{{Auth::user()->dot_address}}"  class="form-control text-{{$text}} bg-{{$bg}}" placeholder="Enter Polkadot Address">
											</div>
										</div>
									</div>
								</div>
								@endif
								
								@if ($method->name=='Shiba Inu')
								<div class="card">
									<div class="card-header " id="headingFourteen" data-toggle="collapse" data-target="#collapseFourteen" aria-expanded="true" aria-controls="collapseFourteen" style="background-color: #6495ED; color: #ffffff;">
										<div class="span-icon">
											<div class="fa fa-clone"></div>
										</div>
										<div class="span-title text-{{$text}}">
										 Shiba Inu
										</div>
										<div class="span-mode"></div>
									</div>
									<div id="collapseFourteen" class="collapse show" aria-labelledby="headingFourteen" data-parent="#accordion">
										<div class="card-body bg-{{$bg}} shadow">
											<div class="form-group">
												<h5 class="text-{{$text}}">PASTE YOUR SHIBA ADDRESS</h5>
												<input type="text" name="shiba_address" value="{{Auth::user()->shiba_address}}"  class="form-control text-{{$text}} bg-{{$bg}}" placeholder="Enter Shiba Address">
											</div>
										</div>
									</div>
								</div>
								@endif
								
								@if ($method->name=='Terra(Luna)')
								<div class="card">
									<div class="card-header" id="headingFifteen" data-toggle="collapse" data-target="#collapseFifteen" aria-expanded="true" aria-controls="collapseFifteen" style="background-color: #6495ED; color: #ffffff;">
										<div class="span-icon">
											<div class="fa fa-clone"></div>
										</div>
										<div class="span-title text-{{$text}}">
											Terra(Luna)
										</div>
										<div class="span-mode"></div>
									</div>
									<div id="collapseFifteen" class="collapse show" aria-labelledby="headingFifteen" data-parent="#accordion">
										<div class="card-body bg-{{$bg}} shadow">
											<div class="form-group">
												<h5 class="text-{{$text}}">PASTE YOUR LUNA ADDRESS</h5>
												<input type="text" name="luna_address" value="{{Auth::user()->luna_address}}"  class="form-control text-{{$text}} bg-{{$bg}}" placeholder="Enter Luna Address">
											</div>
										</div>
									</div>
								</div>
								@endif
								
								@if ($method->name=='Solana')
								<div class="card">
									<div class="card-header" id="headingSixteen" data-toggle="collapse" data-target="#collapseSixteen" aria-expanded="true" aria-controls="collapseSixteen" style="background-color: #6495ED; color: #ffffff;">
										<div class="span-icon">
											<div class="fa fa-clone"></div>
										</div>
										<div class="span-title text-{{$text}}">
											Solana
										</div>
										<div class="span-mode"></div>
									</div>
									<div id="collapseSixteen" class="collapse show" aria-labelledby="headingSixteen" data-parent="#accordion">
										<div class="card-body bg-{{$bg}} shadow">
											<div class="form-group">
												<h5 class="text-{{$text}}">PASTE YOUR SOLANA ADDRESS</h5>
												<input type="text" name="sol_address" value="{{Auth::user()->sol_address}}"  class="form-control text-{{$text}} bg-{{$bg}}" placeholder="Enter Solana Address">
											</div>
										</div>
									</div>
								</div>
								@endif
								
								@if ($method->name=='Stellar(XLM)')
								<div class="card">
									<div class="card-header " id="headingSeventeen" data-toggle="collapse" data-target="#collapseSeventeen" aria-expanded="true" aria-controls="collapseSeventeen" style="background-color: #6495ED; color: #ffffff;">
										<div class="span-icon">
											<div class="fa fa-clone"></div>
										</div>
										<div class="span-title text-{{$text}}">
											Stellar(XLM)
										</div>
										<div class="span-mode"></div>
									</div>
									<div id="collapseSeventeen" class="collapse show" aria-labelledby="headingSeventeen" data-parent="#accordion">
										<div class="card-body bg-{{$bg}} shadow">
											<div class="form-group">
												<h5 class="text-{{$text}}">PASTE YOUR XLM ADDRESS</h5>
												<input type="text" name="xlm_address" value="{{Auth::user()->xlm_address}}"  class="form-control text-{{$text}} bg-{{$bg}}" placeholder="Enter XLM Address">
											</div>
										</div>
									</div>
								</div>
								@endif
								
								
								@if ($method->name=='BUSD')
								<div class="card">
									<div class="card-header" id="headingEighteen" data-toggle="collapse" data-target="#collapseEighteen" aria-expanded="true" aria-controls="collapseEighteen" style="background-color: #6495ED; color: #ffffff;">
										<div class="span-icon">
											<div class="fa fa-clone"></div>
										</div>
										<div class="span-title text-{{$text}}">
											BUSD
										</div>
										<div class="span-mode"></div>
									</div>
									<div id="collapseEighteen" class="collapse show" aria-labelledby="headingEighteen" data-parent="#accordion">
										<div class="card-body bg-{{$bg}} shadow">
											<div class="form-group">
												<h5 class="text-{{$text}}">PASTE YOUR BUSD ADDRESS</h5>
												<input type="text" name="busd_address" value="{{Auth::user()->busd_address}}"  class="form-control text-{{$text}} bg-{{$bg}}" placeholder="Enter BUSD Address">
											</div>
										</div>
									</div>
								</div>
								@endif
								
								@if ($method->name=='XRP')
								<div class="card">
									<div class="card-header" id="headingNineteen" data-toggle="collapse" data-target="#collapseNineteen" aria-expanded="true" aria-controls="collapseNineteen" style="background-color: #6495ED; color: #ffffff;">
										<div class="span-icon">
											<div class="fa fa-clone"></div>
										</div>
										<div class="span-title text-{{$text}}">
											XRP
										</div>
										<div class="span-mode"></div>
									</div>
									<div id="collapseNineteen" class="collapse show" aria-labelledby="headingNineteen" data-parent="#accordion">
										<div class="card-body bg-{{$bg}} shadow">
											<div class="form-group">
												<h5 class="text-{{$text}}">PASTE YOUR XRP ADDRESS</h5>
												<input type="text" name="xrp_address" value="{{Auth::user()->xrp_address}}"  class="form-control text-{{$text}} bg-{{$bg}}" placeholder="Enter XRP Address">
											</div>
										</div>
									</div>
								</div>
								@endif
								
								@if ($method->name=='Perfect Money')
								<div class="card">
									<div class="card-header " id="headingTwenty" data-toggle="collapse" data-target="#collapseTwenty" aria-expanded="true" aria-controls="collapseTwenty">
										<div class="span-icon" style="background-color: #6495ED; color: #ffffff;">
											<div class="fa fa-clone"></div>
										</div>
										<div class="span-title text-{{$text}}">
											Perfect Money
										</div>
										<div class="span-mode"></div>
									</div>
									<div id="collapseTwenty" class="collapse show" aria-labelledby="headingTwenty" data-parent="#accordion">
										<div class="card-body bg-{{$bg}} shadow">
											<div class="form-group">
												<h5 class="text-{{$text}}">PASTE YOUR PM ACCOUNT</h5>
												<input type="text" name="pm_address" value="{{Auth::user()->pm_address}}"  class="form-control text-{{$text}} bg-{{$bg}}" placeholder="Enter PM Account">
											</div>
										</div>
									</div>
								</div>
								@endif
								
								
								@endforeach
								
								<input type="submit" class="btn" style="background-color: #6495ED; color: #ffffff; border-radius: 40px;" value="Submit">  &nbsp; &nbsp; 
								<a href="{{ url('dashboard/skip_account') }}" style="color:red;">Skip</a>
								<input type="hidden" name="id" value="{{Auth::user()->id}}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
    @endsection