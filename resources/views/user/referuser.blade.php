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
        @inject('uc', 'App\Http\Controllers\UsersController')
        <?php
        $array = \App\users::all();
        $usr = Auth::user()->id;
        ?>
        <div class="main-panel bg-{{$bg}}">
            <div class="content bg-{{$bg}}">
                <div class="page-inner">
                    <div class="mt-2 mb-4">
                        <h1 class="title1 text-{{$text}}">Refer users to {{$settings->site_name}} community</h1>
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
                    
                    <div class="row">
                        <div class="col-12 text-center card bg-{{$bg}} shadow-lg p-3 text-{{$text}}">
                            <strong>You can refer users by sharing your referral link:</strong><br>
                            <h4 style="color:green;"> <input type="text"  style="width: 200px;" value="{{Auth::user()->ref_link}}"  id="myInput" readonly></h4> <br>
                            <button class="btn" style="background-color: #6495ED; color: #ffffff; border-radius: 40px;" onclick="myFunction()">Copy Link</button> 
                            
                            <br />
                            <h3 class="title1">
                            <small>Your sponsor</small><br>
                            <i class="fa fa-user fa-2x"></i><br>
                            <small>{{$uc->getUserParent($usr)}}</small>
                            </h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col card p-3 shadow-lg bg-{{$bg}}">
                            <h2 class="title1 text-{{$text}}">Your Referrals.</h2>
                            <div class="bs-example widget-shadow table-responsive" data-example-id="hoverable-table"> 
                                <table class="table UserTable table-hover text-{{$text}}"> 
                                    <thead> 
                                        <tr> 
                                            <th>Client name</th>
                                            <th>Ref. level</th>
                                            <th>Parent</th>
                                            <th>Client status</th>
                                            <th>Date registered</th>
                                        </tr>
                                    </thead> 
                                    <tbody> 
                                        {!! $uc->getdownlines($array,$usr) !!}
                                    </tbody> 
                                </table>
                            </div>
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
    @endsection