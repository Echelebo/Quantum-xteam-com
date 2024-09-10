<?php
if (Auth::user()->dashboard_style == "light") {
    $bg="light";
    $text = "dark";
} else {
    $bg="dark";
    $text = "light";
}

?>
@inject('rates', 'App\Http\Controllers\TraitController')
@extends('layouts.app')

    @section('content')
        @include('user.topmenu')
        @include('user.sidebar')
        <div class="main-panel bg-{{$bg}}">
            <div class="content bg-{{$bg}}">
                <div class="page-inner">
                    <div class="mt-2 mb-4">
                        
                        
                        
                        <div class="nk-content nk-content-fluid"><div class="container-xl wide-lg"><div class="nk-content-body"><div class="nk-block-head"><div class="nk-block-head-sub"><span>Welcome!</span></div><div class="nk-block-between-md g-4"><div class="nk-block-head-content"><h2 class="nk-block-title fw-normal"><font color="#6495ED">{{ Auth::user()->name }}!</font></h2><div class="nk-block-des"><p><font color="#FF7742">At a glance summary of your account. Have fun!</font></p></div></div>
                        
                        
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
                        
                        <div class="nk-block-head-content"><ul class="nk-block-tools gx-3"><li><a href="{{ url('dashboard/mplans') }}" class="btn" style=" background-color: #6495ED; color: #ffffff;"><span><i class="fas fa-credit-card"></i> Invest</span> <em class="fa fa-download"></em></a></li><li><a href="{{ url('dashboard/withdrawals') }}" class="btn btn-white1 btn-light1" style=" background-color: #FF7742; color: #ffffff;" ><span><i class="fas fa-dollar-sign"></i> Withdraw</span> <em class=" d-none d-sm-inline-block"></em></a></li>
                        
                        </ul></div></div></div><div class="nk-block"><div class="row gy-gs"><div class="col-lg-5 col-xl-4"><div class="nk-block"><div class="nk-block-head-xs"><div class="nk-block-head-content"><h5 class="nk-block-title title">Overview</h5></div></div><div class="nk-block"><div class="card card-bordered text-light is-dark h-100"><div class="card-inner"><div class="nk-wg7"><div class="nk-wg7-stats">
                            
                             @php
                                            $price = round($rates->get_rate("BTC", "USD","price"), 3 );
                                            $amt = Auth::user()->account_bal / $price;
                                        @endphp
                            
                            <div class="nk-wg7-title">Available balance in USD</div><div class="number-lg amount">{{$settings->currency}}{{ number_format(Auth::user()->account_bal, 2, '.', ',')}}</div></div><div class="nk-wg7-stats-group"><div class="nk-wg7-stats w-50"><div class="nk-wg7-title">In BTC</div><div class="number">@php
                                            $price = round($rates->get_rate("BTC", "USD","price"), 3 );
                                            $amt = Auth::user()->account_bal / $price;
                                        @endphp
                                        
                                        {{round($amt, 7)}} BTC</div></div><div class="nk-wg7-stats w-50"><div class="nk-wg7-title">In ETH</div><div class="number">
                                            
                                            @php
                                            $price = round($rates->get_rate("ETH", "USD","price"), 3 );
                                            $amt = Auth::user()->account_bal / $price;
                                        @endphp
                                        
                                        {{round($amt, 7)}} ETH</div></div></div></div></div></div></div></div></div><div class="col-lg-7 col-xl-8"><div class="nk-block"><div class="nk-block-head-xs"><div class="nk-block-between-md g-2"><div class="nk-block-head-content"><h5 class="nk-block-title title">Wallets</h5></div></div></div><div class="row g-2">
                                        
                                        <div class="col-sm-4"><div class="card bg-light" ><div class="nk-wgw sm" style="background-color: #6495ED; color: #ffffff;"><a class="nk-wgw-inner" href="#"><div class="nk-wgw-name"><div class="nk-wgw-icon">
                                            
                                            <i class="fas fa-briefcase" style="color: #FF7742"></i>
                                        </div>
                                        
                                        <h5 class="nk-wgw-title title"><font color="#ffffff">BALANCE</font></h5></div><div class="nk-wgw-balance" ><div class="amount"><font color="#ffffff">{{$settings->currency}}{{ number_format(Auth::user()->account_bal, 2, '.', ',')}}</font><span class="currency currency-eth"></span></div></div></a></div></div></div>
                                        
                                        <div class="col-sm-4"><div class="card bg-light"><div class="nk-wgw sm" style="background-color: #6495ED; color: #ffffff;"><a class="nk-wgw-inner" href="#"><div class="nk-wgw-name"><div class="nk-wgw-icon"><i class="fas fa-credit-card" style="color: #FF7742"></i></div><h5 class="nk-wgw-title title"><font color="#ffffff">PAYMENTS</font></h5></div><div class="nk-wgw-balance"><div class="amount"><font color="#ffffff">@foreach($deposited as $deposited)
                                                @if(!empty($deposited->count))
                                                {{$settings->currency}}{{$deposited->count}}
                                                @else
                                                {{$settings->currency}}0.00
                                                @endif
                                                @endforeach</font><span class="currency currency-btc"></span></div></div></a></div></div></div>
                                                
                                                <div class="col-sm-4"><div class="card bg-light"><div class="nk-wgw sm" style="background-color: #6495ED; color: #ffffff;"><a class="nk-wgw-inner" href="#"><div class="nk-wgw-name"><div class="nk-wgw-icon"><i class="fas fa-signal" style="color: #FF7742"></i> </div><h5 class="nk-wgw-title title"><font color="#ffffff">INVEST RETURN</font></h5></div><div class="nk-wgw-balance"><div class="amount"><font color="#ffffff">{{$settings->currency}}{{ number_format(Auth::user()->roi, 2, '.', ',')}}</font><span class="currency currency-eth"></span></div></div></a></div></div></div></div></div>
                                                
                                                
                                                <div class="nk-block nk-block-md"><div class="row g-2"><div class="col-sm-4"><div class="card bg-light"><div class="nk-wgw sm" style="background-color: #6495ED; color: #ffffff;"><a class="nk-wgw-inner" href="#"><div class="nk-wgw-name"><div class="nk-wgw-icon"><i class="fas fa-medal" style="color: #FF7742"></i></div><h5 class="nk-wgw-title title"><font color="#ffffff">BONUS</font></h5></div><div class="nk-wgw-balance"><div class="amount"><font color="#ffffff">{{$settings->currency}} {{ number_format($total_bonus->bonus, 2, '.', ',')}}</font><span class="currency currency-nio"></span></div></div></a></div></div></div>
                                                
                                                <div class="col-sm-4"><div class="card bg-light"><div class="nk-wgw sm" style="background-color: #6495ED; color: #ffffff;"><a class="nk-wgw-inner" href="#"><div class="nk-wgw-name"><div class="nk-wgw-icon"><i class="fas fa-recycle" style="color: #FF7742"></i></div><h5 class="nk-wgw-title title"><font color="#ffffff">REF. BONUS</font></h5></div><div class="nk-wgw-balance"><div class="amount"><font color="#ffffff">{{$settings->currency}}{{ number_format(Auth::user()->ref_bonus, 2, '.', ',')}}</font><span class="currency currency-btc"></span></div></div></a></div></div></div>
                                                
                                                </div></div></div></div></div>
                        
                <div class="row">
                    <div class="col-12">
                        <div id="chart-page">
                            @include('includes.chart')
                        </div>
                    </div>
                </div>
                <!-- end of chart -->
            </div>
    @endsection
   
    