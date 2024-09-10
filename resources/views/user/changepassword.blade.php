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
                    <div class="mt-2 mb-5">
                        <h1 class="title1 text-{{$text}}">Change Your password</h1> <br> <br>
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
                                <button type="button" clsass="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                @foreach ($errors->all() as $error)
                                <i class="fa fa-warning"></i> {{ $error }}
                                @endforeach
                            </div>
                        </div>
                    </div>
                    @endif
                    <div class="row mb-5">
                        <div class="col-lg-8 offset-lg-2 card p-4 shadow-lg bg-{{$bg}}">
                            <form method="post" action="{{action('UsersController@updatepass')}}">
                                <div class="form-control bg-{{$bg}} mb-2">
                                    <h5 class="text-{{$text}}">Old Password</h5>
                                    <input type="password" name="old_password" class="form-control text-{{$text}} bg-{{$bg}}" required>
                                </div>
                                <div class="form-control bg-{{$bg}} mb-2">
                                    <h5 class="text-{{$text}}">New Password* :</h5>
                                    <input type="password" name="password" class="form-control text-{{$text}} bg-{{$bg}}" required>
                                </div>
                                <div class="form-control bg-{{$bg}} mb-2">
                                    <h5 class="text-{{$text}}">Confirm Password*:</h5>
                                    <input type="password" name="password_confirmation" class="form-control text-{{$text}} bg-{{$bg}}" required>
                                </div> <br>
                                    <input type="submit" class="btn" style="background-color: #6495ED; color: #ffffff;" value="Submit">
                                    
                                <input type="hidden" name="id" value="{{Auth::user()->id}}">
                                <input type="hidden" name="current_password" value="{{Auth::user()->password}}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}"><br/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    @endsection