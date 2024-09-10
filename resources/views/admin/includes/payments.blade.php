<h3 class="text-{{$text}} text-center">Withdrawal Methods</h3>

<!--<a class="btn btn-primary mb-3" href="#" data-toggle="modal" data-target="#wmethodModal"><i class="fa fa-plus"></i> Add new</a>--> <br>

@foreach($wmethods as $method)
	<div class="panel panel-default">
		<!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#method{{$method->id}}">
                {{$method->name}} <i class="fa fa-arrow-down"></i> </a>
            </h4>
        </div>
											
        <div id="method{{$method->id}}" class="panel-collapse collapse">
            <div class="sign-u">
                <br/>
                <a class="btn btn-{{$text}} btn-sm" href="#" data-toggle="modal" data-target="#wmethodModal{{$method->id}}"><i class="fa fa-pencil"></i> Edit</a> &nbsp;
                <!--<a class="btn btn-danger btn-sm" href="{{url('admin/dashboard/deletewdmethod')}}/{{$method->id}}"><i class="fa fa-trash"></i></a> -->
            </div>
        </div>
	</div>
									
    <!-- Edit Withdrawal method Modal -->
    <div id="wmethodModal{{$method->id}}" class="modal fade" role="dialog">
		<div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header bg-{{Auth('admin')->User()->dashboard_style}}">
                    <h4 class="modal-title text-{{$text}} text-center">Edit withdrawal method</h4>
                    <button type="button" class="close text-{{$text}}" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body bg-{{Auth('admin')->User()->dashboard_style}}">
                    <form role="form" method="post" action="{{action('Admin\SettingsController@updatewdmethod')}}">
                        
                        <h5 class="text-{{$text}}">Enter Method Name</h5>
                        <input class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" placeholder="Enter method name" type="text" name="name" value="{{$method->name}}" required ReadOnly>
                        <h5 class="text-{{$text}}">Minimum Amount $</h5>
                        <input class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" placeholder="Minimum amount $" type="text" name="minimum" value="{{$method->minimum}}" required>
                        <h5 class="text-{{$text}}">Maximum amount $</h5>
                        <input class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" placeholder="Maximum amount $" type="text" name="maximum" value="{{$method->maximum}}" required>
                        <h5 class="text-{{$text}}">Charges (Fixed amount $)</h5>
                        <input class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" placeholder="Charges (Fixed amount $)" type="text" name="charges_fixed" value="{{$method->charges_fixed}}" required>
                        <h5 class="text-{{$text}}">Charges (Percentage %)</h5>
                        <input class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" placeholder="Charges (Percentage %)" type="text" name="charges_percentage" value="{{$method->charges_percentage}}" required>
                        <h5 class="text-{{$text}}">Duration</h5>
                        <input  class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" placeholder="Payout duration" type="text" name="duration" value="{{$method->duration}}" required>
                        <h5 class="text-{{$text}}">Method status</h5>
                        <select name="status" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}">
                            <option>{{$method->status}}</option> 
                            <option value="enabled">Enable</option> 
                            <option value="disabled">Disable</option> 
                        </select><br/>
                        <input type="hidden" name="type" value="withdrawal">
                        <input type="hidden" name="id" value="{{$method->id}}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class="btn btn-primary px-5 btn-lg" value="Continue">
                    </form>
                </div>
			</div>
		</div>
	</div>
<!-- /edit withdrawal method Modal -->
@endforeach
 <br> 

 <div>
     
<form method="post" action="{{action('Admin\SettingsController@updatesettings')}}" enctype="multipart/form-data">
    <div class="sign-up1">
        <h2 class="text-{{$text}}"> Deposit/Withdrawal option:</h2>
    </div>
    <div class="form-group">
       <select name="withdrawal_option" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}">
            <option value="{{$settings->withdrawal_option}}">Currently ({{$settings->withdrawal_option}})</option>
            <option>manual</option>
            <option>auto</option>
        </select>
    </div> <br>

    <!-- Payment info and methods -->
    <h3>Payment methods</h3>
    <a class="btn btn-{{$text}} btn-lg" href="#" data-toggle="modal" data-target="#cpdModal"> Set up Coinpayments</a><br/> <br>
    

    <div class="panel panel-default">
                <!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title text-{{$text}}">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#bank">
                Bank deposit or transfer <i class="fa fa-arrow-down"></i> </a>
            </h4>
        </div>
            
        <div id="bank" class="panel-collapse collapse">
            <div class="sign-u">
        <div class="sign-up1">
            <h4 class="text-{{$text}}">Bank name :</h4>
        </div>
        <div class="sign-up2">
            <input type="text" name="bank_name" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$settings->bank_name}}">
        </div>
    </div>

    <div class="sign-u">
        <div class="sign-up1">
            <h4 class="text-{{$text}}">Account name :</h4>
        </div>
        <div class="sign-up2">
            <input type="text" name="account_name" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$settings->account_name}}">
        </div>
        <div class="clearfix"> </div>
    </div>

    <div class="sign-u">
        <div class="sign-up1">
            <h4 class="text-{{$text}}">Account number :</h4>
        </div>
        <div class="sign-up2">
            <input type="text" name="account_number" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$settings->account_number}}">
        </div>
    </div>
        </div>
    </div>

    <div class="panel panel-default" style="border:0px solid #fff;">
                <!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title text-{{$text}}">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#btc">
                Bitcoin <i class="fa fa-arrow-down"></i>  </a>
            </h4>
        </div>
            
        <div id="btc" class="panel-collapse collapse">
        <div class="sign-u">
        <div class="sign-up1">
            <h4 class="text-{{$text}}">BTC address :</h4>
        </div>
        <div class="sign-up2">
            <input type="text" name="btc_address" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$settings->btc_address}}">
        </div>
    </div>
        </div>
    </div>
    
    <div class="panel panel-default" style="border:0px solid #fff;">
                <!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title text-{{$text}}">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#ltc">
                Litecoin <i class="fa fa-arrow-down"></i> </a>
            </h4>
        </div>
            
        <div id="ltc" class="panel-collapse collapse">
        <div class="sign-u">
        <div class="sign-up1">
            <h4 class="text-{{$text}}">LTC address :</h4>
        </div>
        <div class="sign-up2">
            <input type="text" name="ltc_address" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$settings->ltc_address}}">
        </div>
    </div>
        </div>
    </div>

    <div class="panel panel-default" style="border:0px solid #fff;">
                <!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title text-{{$text}}">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#eth">
                Ethereum <i class="fa fa-arrow-down"></i> </a>
            </h4>
        </div>
            
        <div id="eth" class="panel-collapse collapse">
        <div class="sign-u">
            <div class="sign-up1">
                <h4 class="text-{{$text}}">ETH address :</h4>
            </div>
            <div class="sign-up2">
                <input type="text" name="eth_address" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$settings->eth_address}}">
            </div>
        </div>
        </div>
    </div>
    
     <div class="panel panel-default" style="border:0px solid #fff;">
                <!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title text-{{$text}}">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#bch">
                Bitcoin Cash <i class="fa fa-arrow-down"></i>  </a>
            </h4>
        </div>
            
        <div id="bch" class="panel-collapse collapse">
        <div class="sign-u">
        <div class="sign-up1">
            <h4 class="text-{{$text}}">BCH address :</h4>
        </div>
        <div class="sign-up2">
            <input type="text" name="bch_address" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$settings->bch_address}}">
        </div>
    </div>
        </div>
    </div>
     <div class="panel panel-default" style="border:0px solid #fff;">
                <!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title text-{{$text}}">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#doge">
                DogeCoin <i class="fa fa-arrow-down"></i>  </a>
            </h4>
        </div>
            
        <div id="doge" class="panel-collapse collapse">
        <div class="sign-u">
        <div class="sign-up1">
            <h4 class="text-{{$text}}">DOGE address :</h4>
        </div>
        <div class="sign-up2">
            <input type="text" name="doge_address" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$settings->doge_address}}">
        </div>
    </div>
        </div>
    </div>
     <div class="panel panel-default" style="border:0px solid #fff;">
                <!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title text-{{$text}}">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#dash">
                DASH <i class="fa fa-arrow-down"></i>  </a>
            </h4>
        </div>
            
        <div id="dash" class="panel-collapse collapse">
        <div class="sign-u">
        <div class="sign-up1">
            <h4 class="text-{{$text}}">DASH address :</h4>
        </div>
        <div class="sign-up2">
            <input type="text" name="dash_address" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$settings->dash_address}}">
        </div>
    </div>
        </div>
    </div>
     <div class="panel panel-default" style="border:0px solid #fff;">
                <!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title text-{{$text}}">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#usdt">
                USDT <i class="fa fa-arrow-down"></i>  </a>
            </h4>
        </div>
            
        <div id="usdt" class="panel-collapse collapse">
        <div class="sign-u">
        <div class="sign-up1">
            <h4 class="text-{{$text}}">USDT address :</h4>
        </div>
        <div class="sign-up2">
            <input type="text" name="usdt_address" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$settings->usdt_address}}">
        </div>
    </div>
        </div>
    </div>
     <div class="panel panel-default" style="border:0px solid #fff;">
                <!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title text-{{$text}}">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#trx">
                TRX <i class="fa fa-arrow-down"></i>  </a>
            </h4>
        </div>
            
        <div id="trx" class="panel-collapse collapse">
        <div class="sign-u">
        <div class="sign-up1">
            <h4 class="text-{{$text}}">TRX address :</h4>
        </div>
        <div class="sign-up2">
            <input type="text" name="trx_address" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$settings->trx_address}}">
        </div>
    </div>
        </div>
    </div>
    <div class="panel panel-default" style="border:0px solid #fff;">
                <!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title text-{{$text}}">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#shiba">
                Shiba Inu <i class="fa fa-arrow-down"></i>  </a>
            </h4>
        </div>
            
        <div id="shiba" class="panel-collapse collapse">
        <div class="sign-u">
        <div class="sign-up1">
            <h4 class="text-{{$text}}">Shiba address :</h4>
        </div>
        <div class="sign-up2">
            <input type="text" name="shiba_address" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$settings->shiba_address}}">
        </div>
    </div>
        </div>
    </div>
    <div class="panel panel-default" style="border:0px solid #fff;">
                <!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title text-{{$text}}">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#xlm">
                Stellar/XLM <i class="fa fa-arrow-down"></i>  </a>
            </h4>
        </div>
            
        <div id="xlm" class="panel-collapse collapse">
        <div class="sign-u">
        <div class="sign-up1">
            <h4 class="text-{{$text}}">XLM address :</h4>
        </div>
        <div class="sign-up2">
            <input type="text" name="xlm_address" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$settings->xlm_address}}">
        </div>
    </div>
        </div>
    </div>
    <div class="panel panel-default" style="border:0px solid #fff;">
                <!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title text-{{$text}}">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#xrp">
                Ripple/XRP <i class="fa fa-arrow-down"></i>  </a>
            </h4>
        </div>
            
        <div id="xrp" class="panel-collapse collapse">
        <div class="sign-u">
        <div class="sign-up1">
            <h4 class="text-{{$text}}">XRP address :</h4>
        </div>
        <div class="sign-up2">
            <input type="text" name="xrp_address" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$settings->xrp_address}}">
        </div>
    </div>
        </div>
    </div>
    <div class="panel panel-default" style="border:0px solid #fff;">
                <!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title text-{{$text}}">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#ada">
                Cardona/ADA <i class="fa fa-arrow-down"></i>  </a>
            </h4>
        </div>
            
        <div id="ada" class="panel-collapse collapse">
        <div class="sign-u">
        <div class="sign-up1">
            <h4 class="text-{{$text}}">Cardona address :</h4>
        </div>
        <div class="sign-up2">
            <input type="text" name="ada_address" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$settings->ada_address}}">
        </div>
    </div>
        </div>
    </div>
    <div class="panel panel-default" style="border:0px solid #fff;">
                <!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title text-{{$text}}">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#dot">
                Polkadot <i class="fa fa-arrow-down"></i>  </a>
            </h4>
        </div>
            
        <div id="dot" class="panel-collapse collapse">
        <div class="sign-u">
        <div class="sign-up1">
            <h4 class="text-{{$text}}">Polkadot address :</h4>
        </div>
        <div class="sign-up2">
            <input type="text" name="dot_address" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$settings->dot_address}}">
        </div>
    </div>
        </div>
    </div>
    <div class="panel panel-default" style="border:0px solid #fff;">
                <!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title text-{{$text}}">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#sol">
                Solana <i class="fa fa-arrow-down"></i>  </a>
            </h4>
        </div>
            
        <div id="sol" class="panel-collapse collapse">
        <div class="sign-u">
        <div class="sign-up1">
            <h4 class="text-{{$text}}">Solana address :</h4>
        </div>
        <div class="sign-up2">
            <input type="text" name="sol_address" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$settings->sol_address}}">
        </div>
    </div>
        </div>
    </div>
    <div class="panel panel-default" style="border:0px solid #fff;">
                <!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title text-{{$text}}">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#usdc">
                USDC <i class="fa fa-arrow-down"></i>  </a>
            </h4>
        </div>
            
        <div id="usdc" class="panel-collapse collapse">
        <div class="sign-u">
        <div class="sign-up1">
            <h4 class="text-{{$text}}">USDC address :</h4>
        </div>
        <div class="sign-up2">
            <input type="text" name="usdc_address" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$settings->usdc_address}}">
        </div>
    </div>
        </div>
    </div>
    <div class="panel panel-default" style="border:0px solid #fff;">
                <!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title text-{{$text}}">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#bnb">
                BNB <i class="fa fa-arrow-down"></i>  </a>
            </h4>
        </div>
            
        <div id="bnb" class="panel-collapse collapse">
        <div class="sign-u">
        <div class="sign-up1">
            <h4 class="text-{{$text}}">BNB address :</h4>
        </div>
        <div class="sign-up2">
            <input type="text" name="bnb_address" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$settings->bnb_address}}">
        </div>
    </div>
        </div>
    </div>
    <div class="panel panel-default" style="border:0px solid #fff;">
                <!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title text-{{$text}}">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#luna">
                Terra/Luna <i class="fa fa-arrow-down"></i>  </a>
            </h4>
        </div>
            
        <div id="luna" class="panel-collapse collapse">
        <div class="sign-u">
        <div class="sign-up1">
            <h4 class="text-{{$text}}">Luna address :</h4>
        </div>
        <div class="sign-up2">
            <input type="text" name="luna_address" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$settings->luna_address}}">
        </div>
    </div>
        </div>
    </div>
    <div class="panel panel-default" style="border:0px solid #fff;">
                <!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title text-{{$text}}">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#busd">
                BUSD <i class="fa fa-arrow-down"></i>  </a>
            </h4>
        </div>
            
        <div id="busd" class="panel-collapse collapse">
        <div class="sign-u">
        <div class="sign-up1">
            <h4 class="text-{{$text}}">BUSD address :</h4>
        </div>
        <div class="sign-up2">
            <input type="text" name="busd_address" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$settings->busd_address}}">
        </div>
    </div>
        </div>
    </div>
     <div class="panel panel-default" style="border:0px solid #fff;">
                <!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title text-{{$text}}">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#pm">
                Perfect Money <i class="fa fa-arrow-down"></i>  </a>
            </h4>
        </div>
            
        <div id="pm" class="panel-collapse collapse">
        <div class="sign-u">
        <div class="sign-up1">
            <h4 class="text-{{$text}}">PM Account :</h4>
        </div>
        <div class="sign-up2">
            <input type="text" name="pm_address" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$settings->pm_address}}">
        </div>
    </div>
        </div>
    </div>

    <div class="panel panel-default" style="border:0px solid #fff;">
                <!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title text-{{$text}}">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#card">
                Credit Card (Stripe) <i class="fa fa-arrow-down"></i> </a>
            </h4>
        </div>
            
        <div id="card" class="panel-collapse collapse">
        <div class="sign-u">
            <div class="sign-up1">
                <h4 class="text-{{$text}}">Stripe secret key :</h4>
            </div>
            <div class="sign-up2">
                <input type="text" name="s_s_k" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$settings->s_s_k}}">
            </div>
        </div>

        <div class="sign-u">
            <div class="sign-up1">
                <h4 class="text-{{$text}}">Stripe publishable key :</h4>
            </div>
            <div class="sign-up2">
                <input type="text" name="s_p_k" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$settings->s_p_k}}">
            </div>
        </div>
        </div>
    </div>
    
    <div class="panel panel-default" style="border:0px solid #fff;">
                <!-- Panel Heading Starts -->
        <div class="panel-heading">
            <h4 class="panel-title text-{{$text}}">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#pp">
                PayPal <i class="fa fa-arrow-down"></i> </a>
            </h4>
        </div>
            
        <div id="pp" class="panel-collapse collapse">
        <div class="sign-u">
            <div class="sign-up1">
                <h4 class="text-{{$text}}">Paypal client ID :</h4>
            </div>
            <div class="sign-up2">
                <input type="text" name="pp_ci" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$settings->pp_ci}}">
            </div>
        </div>

        <div class="sign-u">
            <div class="sign-up1">
                <h4 class="text-{{$text}}">Paypal client secret :</h4>
            </div>
            <div class="sign-up2">
                <input type="text" name="pp_cs" class="form-control bg-{{Auth('admin')->User()->dashboard_style}} text-{{$text}}" value="{{$settings->pp_cs}}">
            </div>
        </div>
        </div>
    </div> <br> <br>
    
    <div class="sign-u">
        <div class="sign-up1">
            <h2>System Payment Mode:</h2>
        </div> <br>
        <div class="sign-up2">
        <input type="checkbox" id="check1" value="1" name="payment_mode1"> Bank transfer &nbsp; &nbsp;
        <input type="checkbox" id="check2" value="2" name="payment_mode2"> Bitcoin &nbsp; &nbsp; 
        <input type="checkbox" id="check3" value="3" name="payment_mode3"> Ethereum <br>
        <input type="checkbox" id="check4" value="4" name="payment_mode4"> Litecoin &nbsp; &nbsp;
        <input type="checkbox" id="check8" value="8" name="payment_mode8"> USDT(trc20) &nbsp; &nbsp;
        <input type="checkbox" id="check9" value="9" name="payment_mode9"> Stellar/XLM <br>
        <input type="checkbox" id="checkA" value="A" name="payment_modeA"> Luna &nbsp; &nbsp;
        <input type="checkbox" id="checkB" value="B" name="payment_modeB"> Ripple/XRP &nbsp; &nbsp;
        <input type="checkbox" id="checkC" value="C" name="payment_modeC"> Dogecoin <br>
        <input type="checkbox" id="checkD" value="D" name="payment_modeD"> Shiba Inu &nbsp; &nbsp;
        <input type="checkbox" id="checkE" value="E" name="payment_modeE"> USDC(trc20) &nbsp; &nbsp;
        <input type="checkbox" id="checkF" value="F" name="payment_modeF"> Polkadot <br>
        <input type="checkbox" id="checkG" value="G" name="payment_modeG"> Solana &nbsp; &nbsp;
        <input type="checkbox" id="checkH" value="H" name="payment_modeH"> BUSD &nbsp; &nbsp;
        <input type="checkbox" id="checkI" value="I" name="payment_modeI"> BNB <br>
        <input type="checkbox" id="checkJ" value="J" name="payment_modeJ"> Dash &nbsp; &nbsp;
        <input type="checkbox" id="checkK" value="K" name="payment_modeK"> Bitcoin Cash &nbsp; &nbsp;
        <input type="checkbox" id="checkL" value="L" name="payment_modeL"> Perfect Money <br>
        <input type="checkbox" id="checkM" value="M" name="payment_modeM"> Cardona/ADA &nbsp; &nbsp;
        <input type="checkbox" id="checkN" value="N" name="payment_modeN"> Tron/TRX &nbsp; &nbsp;
        <input type="checkbox" id="check6" value="6" name="payment_mode6"> Paypal <br>
        <input type="checkbox" id="check7" value="7" name="payment_mode7"> Paystack &nbsp; &nbsp;
        <input type="checkbox" id="check5" value="5" name="payment_mode5"> Credit card (Stripe) 
        &nbsp; &nbsp; <br> <br> <br>
        
        </div>
    </div>
    <?php 
        $pmodes = str_split($settings->payment_mode);
        foreach($pmodes as $pmode){
            if($pmode==1){
            echo'
            <script>document.getElementById("check1").checked= true;</script>
            ';
            }
            if($pmode==2){
                echo'
                <script>document.getElementById("check2").checked= true;</script>
                ';
            }
            if($pmode==3){
                echo'
                <script>document.getElementById("check3").checked= true;</script>
                ';
            }
            if($pmode==4){
                echo'
                <script>document.getElementById("check4").checked= true;</script>
                ';
            }
            if($pmode==5){
                echo'
                <script>document.getElementById("check5").checked= true;</script>
                ';
            }
            if($pmode==6){
                echo'
                <script>document.getElementById("check6").checked= true;</script>
                ';
            }
            if($pmode==7){
                echo'
                <script>document.getElementById("check7").checked= true;</script>
                ';
            }
            if($pmode==8){
                echo'
                <script>document.getElementById("check8").checked= true;</script>
                ';
            }
            if($pmode==9){
                echo'
                <script>document.getElementById("check9").checked= true;</script>
                ';
            }
            if($pmode==A){
                echo'
                <script>document.getElementById("checkA").checked= true;</script>
                ';
            }
            if($pmode==B){
                echo'
                <script>document.getElementById("checkB").checked= true;</script>
                ';
            }
            if($pmode==C){
                echo'
                <script>document.getElementById("checkC").checked= true;</script>
                ';
            }
            if($pmode==D){
                echo'
                <script>document.getElementById("checkD").checked= true;</script>
                ';
            }
            if($pmode==E){
                echo'
                <script>document.getElementById("checkE").checked= true;</script>
                ';
            }
            if($pmode==F){
                echo'
                <script>document.getElementById("checkF").checked= true;</script>
                ';
            }
            if($pmode==G){
                echo'
                <script>document.getElementById("checkG").checked= true;</script>
                ';
            }
            if($pmode==H){
                echo'
                <script>document.getElementById("checkH").checked= true;</script>
                ';
            }
            if($pmode==I){
                echo'
                <script>document.getElementById("checkI").checked= true;</script>
                ';
            }
            if($pmode==J){
                echo'
                <script>document.getElementById("checkJ").checked= true;</script>
                ';
            }
            if($pmode==K){
                echo'
                <script>document.getElementById("checkK").checked= true;</script>
                ';
            }
            if($pmode==L){
                echo'
                <script>document.getElementById("checkL").checked= true;</script>
                ';
            }
            if($pmode==M){
                echo'
                <script>document.getElementById("checkM").checked= true;</script>
                ';
            }
            if($pmode==N){
                echo'
                <script>document.getElementById("checkN").checked= true;</script>
                ';
            }
        }
    ?>

    <input type="submit" class="btn btn-primary px-5 btn-lg" value="Save">
    <input type="hidden" name="id" value="1">
    <input type="hidden" name="_token" value="{{ csrf_token() }}"><br/>
</form>

</div>
	<!-- set up coinpayments Modal -->
<div id="cpdModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
            <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header bg-{{Auth('admin')->User()->dashboard_style}}">
                <h4 class="modal-title text-{{$text}}">Coinpayments set up</h4>
                <button type="button" class="close text-{{$text}}" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body bg-{{Auth('admin')->User()->dashboard_style}}">
                <form role="form" method="post" action="{{action('Admin\SettingsController@updatecpd')}}">

                    <h5 class="text-{{$text}}">Merchant ID</h5>
                    <input  class="form-control text-{{$text}} bg-{{Auth('admin')->User()->dashboard_style}}" placeholder="Merchant ID" type="text" name="cp_m_id" value="{{$cpd->cp_m_id}}" required><br/>
                    
                    <h5 class="text-{{$text}}">CoinPayment IPN Secret></h5>
                    <input class="form-control text-{{$text}} bg-{{Auth('admin')->User()->dashboard_style}}" placeholder="CoinPayment IPN Secret" type="text" name="cp_ipn_secret" value="{{$cpd->cp_ipn_secret}}" required><br/>
                    
                    <h5 class="text-{{$text}}">CoinPayments debug email</h5>
                    <input class="form-control text-{{$text}} bg-{{Auth('admin')->User()->dashboard_style}}" placeholder="CoinPayments debug email" type="text" name="cp_debug_email" value="{{$cpd->cp_debug_email}}" required><br/>

                    <h5 class="text-{{$text}}">Public key</h5>
                    <input class="form-control text-{{$text}} bg-{{Auth('admin')->User()->dashboard_style}}" placeholder="Public key" type="text" name="cp_p_key" value="{{$cpd->cp_p_key}}" required><br/>
                    
                    <h5 class="text-{{$text}}">Private key</h5>
                    <input class="form-control text-{{$text}} bg-{{Auth('admin')->User()->dashboard_style}}" placeholder="Private key" type="text" name="cp_pv_key" value="{{$cpd->cp_pv_key}}" required><br/>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-primary px-5 btn-lg" value="Submit">
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /set up coinpayments Modal -->