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
                    <h1 class="text-{{$text}}">{{$title}}</h1>	
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
    
                <div class="row mb-3">
                    <div class="col-md-4 p-2 shadow-lg" style="background-color: #6495ED; color: #ffffff;">
                        <h1 class="text-white"> Current Investment:</h1>
                    </div>
                    <div class="col-md-8 bg-{{$bg}} shadow-lg text-{{$text}} p-3" >
                        <p style="color:#999;">ACTIVATED ON: {{\Carbon\Carbon::parse($cplan->created_at)->toDayDateTimeString()}}</p>
                        <h4> {{$cplan->dplan->name}}</h4>
                        <h4> <strong>AMOUNT:</strong> {{$settings->currency}}{{$cplan->amount}}</h4>
                        
                        <h4> <strong>TOTAL ROI:</strong> <?php
                        $a =  $cplan->amount;
                        $b = $cplan->inv_increment;
                        $c = ($a*$b)/100;
                        echo '$'.$c;
                        ?></h4>
                        <h4> <strong>ELAPSED TIME:</strong> {{Carbon\Carbon::parse($cplan->created_at)->diffForHumans()}}</h4>
                        <h4><strong>DURATION:</strong> {{$cplan->inv_duration}}</h4>
                        @if($cplan->active=="yes")
                        <p style="color:green;">Active! <i class="glyphicon glyphicon-ok"></i></p>
                        @elseif($cplan->active=="expired")
                        <p style="color:#fa3425;">Expired! <i class="fa fa-info-circle"></i></p>
                        @else
                        <p style="color:#fa3425;">Inactive! <i class="fa fa-info-circle"></i></p>
                        @endif
                    </div>
                </div>
                <div class="row shadow-lg p-3 ">
                    <div class="col-lg-12 mb-3">
                        <a href="{{ url('dashboard/mplans') }}" class="btn btn-lg nav-pills" style="background-color: #6495ED; color: #ffffff;"> <i class="fa fa-plus"></i> Invest Again</a>
                        <h1 class="text-{{$text}} my-3">Other Investments:</h1>
                    </div>
                    @foreach($plans as $plan)
                    @if($cplan->id != $plan->id)
                    <div class="col-lg-4">
                        <div class="card shadow border">
                            <div class="card-body bg-{{$bg}}">
                                {{-- <i class="fa fa-th" style="font-size:50px; color: white;"></i> --}}
                                    <h1 class="text-{{$text}}">{{$plan->dplan->name}}</h1>
                                    <p style="color:#999;">ACTIVATED ON: {{\Carbon\Carbon::parse($plan->created_at)->toDayDateTimeString()}}</p>

                                    @if($plan->dplan->increment_type=="Fixed")
                                    <h5 class="text-{{$text}}"> <b>RssOI: </b>  {{$settings->currency.$plan->dplan->increment_amount}}</h5>
                                    @else
                                    <h5 class="text-{{$text}}">You will get  <?php
                        $a =  $plan->amount;
                        $b = $plan->inv_increment;
                        $c = ($a*$b)/100;
                        echo '$'.$c;
                        ?> <br />Invest amount is {{$settings->currency}}{{$plan->amount}}.</h5>
                                    @endif
                                    
                                    <br />
                                    <strong>ELAPSED TIME:</strong> {{Carbon\Carbon::parse($plan->created_at)->diffForHumans()}}
                                    
                                    @if($plan->active=="yes")
                                    <p style="color:green;">Active! <i class="glyphicon glyphicon-ok"></i></p>
                                    @elseif($plan->active=="expired")
                                    <p style="color:#fa3425;">Expired! <i class="fa fa-info-circle"></i></p>
                                    @else
                                    <p style="color:#fa3425;">Inactive! <i class="fa fa-info-circle"></i></p>
                                    @endif
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </div>
@endsection