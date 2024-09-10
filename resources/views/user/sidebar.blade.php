<!-- Stored in resources/views/child.blade.php -->

<!-- Sidebar -->

<div class="sidebar sidebar-style-2" data-background-color="{{$bg}}">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span style="color: #333333;">
                            {{ Auth::user()->name }}
                            {{-- <span class="user-level">{{$settings->site_name }} User</span> --}}
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>
                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="{{ url('dashboard/profile') }}">
                                    <span class="link-collapse" style="color: #333333;">Account Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            
            
            <div class="nk-sidebar-widget d-none1 d-xl-block1">
                <div class="user-account-info between-center">
                    <div class="user-account-main">
                        @php
                                            $price = round($rates->get_rate("BTC", "USD","price"), 3 );
                                            $amt = Auth::user()->account_bal / $price;
                                        @endphp
                        
        <h6 class="overline-title-alt" style="color: #333333;">Available Balance</h6>
        <div class="user-balance" style="color: #6495ED;"><b>{{$settings->currency}}{{ number_format(Auth::user()->account_bal, 2, '.', ',')}}</b> 
        
        </div>
        <div class="user-balance-alt">
            
            <span class="currency currency-btc"><font color="#FF7742"><b>{{round($amt, 7)}} BTC</font></b></span>
            </div>
            </div>
            </div>
                <div class="user-account-actions">
                    <ul class="g-3">
                        <li ><a href="{{ url('dashboard/mplans') }}" class="btn btn-lg" style="background-color: #6495ED; color: #ffffff;"><span ><i class="fas fa-credit-card"></i> Invest</span></a></li>
                        <li><a href="{{ url('dashboard/withdrawals') }}" class="btn btn-lg" style="background-color: #FF7742; color: #ffffff;"><span><i class="fas fa-dollar-sign"></i> Withdraw</span></a></li>
                    </ul></div></div>
                    
                    
            <ul class="nav nav-primary">
                <li class="nav-item">
                    <a href="{{ url('/dashboard') }}">
                        <i class="fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                 
                <li class="nav-item">
                    <a href="{{ url('dashboard/myplans') }}">
                        <i class="fas fa-briefcase" aria-hidden="true"></i>
                        <p>My Investments</p>
                    </a>
                </li>
                 <li class="nav-item">
                    <a href="{{ url('dashboard/reinvest') }}">
                        <i class="fas fa-exchange-alt" aria-hidden="true"></i>
                        <p>ReInvest</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ url('dashboard/accountdetails') }}">
                        <i class="fas fa-cloud-download-alt" aria-hidden="true"></i>
                        <p>Save Crypto Address</p>
                    </a>
                </li>
                
                
                <li class="nav-item">
                    <a href="{{ url('dashboard/tradinghistory') }}">
                        <i class="fas fa-signal" aria-hidden="true"></i>
                        <p>Earning record</p>
                    </a>
                </li>
                
                
                
                <li class="nav-item">
                    <a href="{{ url('dashboard/accounthistory') }}">
                        <i class="fas fa-file-alt" aria-hidden="true"></i>
                        <p>Transactions history</p>
                    </a>
                </li>
              
                
                
                
                <li class="nav-item">
                    <a href="{{ url('dashboard/referuser') }}">
                        <i class="fas fa-recycle " aria-hidden="true"></i>
                        <p>Referral System</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->
<!-- Verify Modal -->

<div class="modal fade" id="verifyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-{{$bg}}">
            <h5 class="modal-title text-{{$text}}" style="text-align:center;">KYC verification - Upload documents below to get verified.</h5>
                <button type="button" class="close text-{{$text}}" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body bg-{{$bg}}">
                <form style="padding:3px;" role="form" method="post" action="{{action('SomeController@savevdocs')}}"  enctype="multipart/form-data">
                    <label class="text-{{$text}}">Valid identity card. (e.g. Drivers licence, international passport or any government approved document).</label>
                    <input type="file" class="form-control bg-{{$bg}} text-{{$text}}" name="id" required><br>
                    <label class="text-{{$text}}">Passport photogragh</label>
                    <input type="file" class="form-control bg-{{$bg}} text-{{$text}}" name="passport" required><br>
                   <input type="hidden" name="_token" value="{{ csrf_token() }}">
                   <input type="submit" class="btn btn-{{$text}}" value="Submit documents">
               </form>
        </div>
    </div>
</div>
</div>
<!-- /Verify Modal -->