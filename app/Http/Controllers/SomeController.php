<?php

namespace App\Http\Controllers;

use App\settings;
use App\users;
use App\user_plans;
use App\plans;
use App\withdrawals;
use App\deposits;
use App\assets;
use App\markets;
use App\cp_transactions;
use App\tp_transactions;
use App\notifications;
use App\wdmethods;
use DB;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Mail\NewNotification;
use App\Mail\Withdrawal;
use Illuminate\Support\Facades\Mail;

use App\Http\Traits\CPTrait;


use Storage;

class SomeController extends Controller
{
    use CPTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    

    
    
   

      //Trading history route
     public function tradinghistory(){
      
      return view('user.thistory')
      ->with(array(
        
        't_history' => tp_transactions::where('user',Auth::user()->id)
        ->where('type','ROI')
        ->orderBy('id', 'desc')
        ->get(),
        'title' => 'Trading History',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }
  
   //Account transactions history route
     public function accounthistory(){
      
      return view('user.transactions')
      ->with(array(
        
        't_history' => tp_transactions::where('user',Auth::user()->id)
        ->where('type','<>','ROI')
        ->orderBy('id', 'desc')
        ->get(),
        'withdrawals' => withdrawals::where('user', Auth::user()->id)->orderBy('id', 'desc')
        ->get(),
        'deposits' => deposits::where('user', Auth::user()->id)->orderBy('id', 'desc')
        ->get(),
        'title' => 'Account Transactions History',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }
  
  //Notification route
  public function notification(){
      
    return view('user.notification')
    ->with(array(
      'Notif' => notifications::where('user_id',Auth::user()->id)->orderBy('id', 'desc')
             ->paginate(12),
      'title' => 'Notification',
      'settings' => settings::where('id', '=', '1')->first(),
    ));
}

//Profile route
public function profile(){
  $userinfo = users::where('id',Auth::user()->id)->first();
  return view('user.profile')->with(array(
    'userinfo' => $userinfo,
    'title' => 'Profile',
    'settings' => settings::where('id', '=', '1')->first(),
  ));
}


//Updating Profile Route
public function updatepix(Request $request){
    //Validate
    $request->validate([
      'ppix' => 'mimes:jpg,jpeg,png|max:4000',
    ]);

    $settings=settings::where('id','1')->first();
    //photo
    $img=$request->file('ppix');
    $upload_dir="../$settings->files_key/cloud/uploads";
    $image=$img->getClientOriginalName();
    $move=$img->move($upload_dir, $image);

    users::where('id', $request->user_id)
    ->update([
      'photo'=>$image,
    ]);
  return redirect()->back()
  ->with('message', 'Picture change Sucessful!');
  
}


//Updating Profile Route
public function updateprofile(Request $request){
    users::where('id', Auth::user()->id)->first()
        ->update([
          'name'=> $request->firstname,
          'l_name'=> $request->surname,
          'dob'=> $request->dob,
		     'phone_number'=> $request->phone,
          'adress'=> $request->address,
        ]);
    return redirect()->back()
    ->with('message', 'Account Update Sucessful!');
    
}

public function delnotif($id){
  notifications::where('id',$id)->delete();
  //$notif =notifcations::where('id',$id)->delete();
  return redirect()->back()
          ->with('message', 'Message Sucessfully Deleted');
}

  //save CoinPayments credentials to DB
        public function updatecpd(Request $request){

          cp_transactions::where('id', '1')
          ->update([
          'cp_p_key'=>$request['cp_p_key'],
          'cp_pv_key'=>$request['cp_pv_key'],
          'cp_m_id'=>$request['cp_m_id'],
          'cp_ipn_secret'=>$request['cp_ipn_secret'],
          'cp_debug_email'=>$request['cp_debug_email'],
          
          ]);
          return redirect()->back()
          ->with('message', 'Action Sucessful');
    }


    //payment route
    public function payment(Request $request){
      
      return view('user.payment')
      ->with(array(
        'amount'=>$request->session()->get('amount'),
        'payment_mode'=>$request->session()->get('payment_mode'),
        'pay_type' => $request->session()->get('pay_type'),
        'plan_id' => $request->session()->get('plan_id'),
        'title' => 'Exchange',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }


//payment route
   public function paymentss(Request $request){

    return view('user.paymentss')
    ->with(array(
      'amount'=>$request->session()->get('amount'),
      'payment_mode'=>$request->session()->get('payment_mode'),
      'pay_type' => $request->session()->get('pay_type'),
      'plan_id' => $request->session()->get('plan_id'),
      'intent' => $request->session()->get('intent'),
      'title' => 'Make deposit',
      'settings' => Settings::where('id', '=', '1')->first(),
    ));
}


  //accept KYC route
  public function changetheme(Request $request)
  {
    if(isset($request['style']) and $request['style']=='true'){
      $dashboard_style="dark";
    }else{
      $dashboard_style="light";
    }
      //change dashboard style
    users::where('id', Auth::user()->id)
    ->update([
        'dashboard_style' => $dashboard_style,
        ]);
      return response()->json(['success'=>'Changed']);
      
  }

       //Save verification documents requests
  public function savevdocs(Request $request){

      $this->validate($request, [
      'id' => 'mimes:jpg,jpeg,png|max:4000',
      'passport' => 'mimes:jpg,jpeg,png|max:4000',
      ]);
      
      $settings=settings::where('id','1')->first();
        
        //proofs
        $id=$request->file('id');
        $passport=$request->file('passport');
        $upload_dir="../$settings->files_key/cloud/uploads";
        
        $image1=$id->getClientOriginalName();
        $move=$id->move($upload_dir, $image1);
        
        $image2=$passport->getClientOriginalName();
        $move=$passport->move($upload_dir, $image2);
        //end proofs process
       
    //update user
    users::where('id',Auth::user()->id)
    ->update([
        'id_card' => $image1,
        'passport' => $image2,
        'account_verify' => 'Under review',
        ]);

  return redirect()->back()
  ->with('message', 'Action Sucessful! Please wait for system to validate your submission.');
}
  
  
    //Return payment page
    public function deposit(Request $request){
        
        $user=users::where('id',Auth::user()->id)->first();
    //get plan
    $plan=plans::where('id',$request['id'])->first();
    
    if(isset($request['amount']) && $request['amount']>0){
        $plan_price=$request['amount'];
    }else{
        $plan_price = $plan->price;
    }
    
    if($plan_price < $plan->min_price){
        //redirect to make deposit
        return redirect()->route('mplans')
      ->with('message', 'Amount is smaller than the minimum deposit allowed in this plan. Please try again.');
        
    }
    if($plan_price > $plan->max_price){
        //redirect to make deposit
        return redirect()->route('mplans')
      ->with('message', 'Amount is greater than the maximum deposit allowed in this plan. Please try again.');
        
    }
    
       /*
         //fetch user plan
    $dplan=plans::where('id',Auth::user()->plan)->first();
    
    if(count($dplan)<1){
        return redirect()->route('mplans')
      ->with('message', 'Please choose an investment plan first.');
    }
  
  
    if($request['amount'] != $dplan->price){
        return redirect()->back()->with('message',"The amount must be your current plan price. $dplan->price.");
    }*/

      //store payment info in session
      $request->session()->put('amount', $plan_price);
      $request->session()->put('payment_mode', $request['payment_mode']);
      $request->session()->put('durations', $request['duration']);
      $request->session()->put('plan_id', $request['id']);

      // if(isset($request['pay_type'])){
      // $request->session()->put('pay_type', $request['pay_type']);
      // $request->session()->put('plan_id', $request['plan_id']);
      // }

      return redirect()->route('payment')
      ->with(array(
        'title' => 'Make deposit',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
  }



public function depositss(Request $request){

      $settings = Settings::where('id', '1')->first();
      $secretkey = $settings->s_s_k;
      $publickey = $settings->s_p_k;

     // return $secretkey;

      $zero = '00';
      $amt = $request->amount.$zero;
      //return  $amt;

     

     
      
      $output = [
        'publishableKey' => $publickey,
        'clientSecret' => $paymentIntent->client_secret,
      ];
      
  
      $client_secret = $paymentIntent->client_secret;
      //return $client_secret;


      //store payment info in session
      $request->session()->put('amount', $request['amount']);
      $request->session()->put('payment_mode', $request['payment_mode']);
      $request->session()->put('intent', $client_secret);
      
      if(isset($request['pay_type'])){
      $request->session()->put('pay_type', $request['pay_type']);
      $request->session()->put('plan_id', $request['plan_id']);
      }

      return redirect()->route('paymentss')
      ->with(array(
        'title' => 'Make deposit',
        'settings' => Settings::where('id', '=', '1')->first(),
      ));
  }


  //Save deposit requests
  public function savedeposit(Request $request){

      $this->validate($request, [
      'proof' => 'mimes:jpg,jpeg,png|max:4000',
      ]);
        
        $settings=settings::where('id','1')->first();
        
        //screenshot
        $img=$request->file('proof');
        $upload_dir="../$settings->files_key/cloud/uploads";
        
        $image=$img->getClientOriginalName();
        $move=$img->move($upload_dir, $image);
        //end screenshot process
        
        // if($request['pay_type']=='plandeposit'){
        //   //add the user to this plan for approval
        //   users::where('id',Auth::user()->id)
        //   ->update([
        //     'plan'=> $request['plan_id'],
        //   ]);
        //   $plan=$request['plan_id'];
        // }elseif($request['pay_type'] == 'Subscription Trading'){
        //   $plan="Subscription Trading";
        // }
        // else{
        //   $plan=Auth::user()->plan;
        // }
       
      $dp=new deposits();

      $dp->amount= $request['amount'];
      $dp->payment_mode= $request['payment_mode'];
      $dp->expire_date = $request['duration'];
      $dp->status= 'Pending';
      $dp->proof= $image;
      $dp->plan= $request['plan_id'];
      $dp->user= Auth::user()->id;
      $dp->save();

      $fname = Auth::user()->name;
      $lname = Auth::user()->l_name;

      //send notification
      $settings=settings::where('id', '=', '1')->first();
       //send email notification
      
         
        
      //send email notification
      $objDemo = new \stdClass();
      $objDemo->message = "This is to inform you that $fname $lname just made payment of $settings->currency$request->amount, kindly confirm this payment to activate the users plan.";
      $objDemo->message = "This is to inform you that $fname $lname just made payment of $settings->currency$request->amount, kindly confirm this payment to activate the users plan.";
      $objDemo->sender = "$settings->site_name";
      $objDemo->date = \Carbon\Carbon::Now();
      $objDemo->subject = "New Payment";
   
      Mail::bcc($settings->contact_email)->send(new NewNotification($objDemo));
  

    // Kill the session variables
    $request->session()->forget('plan_id');
    $request->session()->forget('pay_type');
    $request->session()->forget('payment_mode');
    $request->session()->forget('amount');
    $request->session()->forget('duration');


  return redirect()->route('dashboard')
  ->with('message', 'Action Sucessful! Please wait for the system to validate this transaction and activate your exchange.');
}


  //Save deposit requests
  public function savedepositss(Request $request){

      $this->validate($request, [
      'proof' => 'mimes:jpg,jpeg,png|max:4000',
      ]);
        
        $settings=settings::where('id','1')->first();
        
        //screenshot
        $img=$request->file('proof');
        $upload_dir="../$settings->files_key/cloud/uploads";
        
        $image=$img->getClientOriginalName();
        $move=$img->move($upload_dir, $image);
        //end screenshot process
        
        // if($request['pay_type']=='plandeposit'){
        //   //add the user to this plan for approval
        //   users::where('id',Auth::user()->id)
        //   ->update([
        //     'plan'=> $request['plan_id'],
        //   ]);
        //   $plan=$request['plan_id'];
        // }elseif($request['pay_type'] == 'Subscription Trading'){
        //   $plan="Subscription Trading";
        // }
        // else{
        //   $plan=Auth::user()->plan;
        // }
       
      $dp=new deposits();

      $dp->amount= $request['amount'];
      $dp->payment_mode= $request['payment_mode'];
      $dp->expire_date = $request['duration'];
      $dp->status= 'Pending';
      $dp->proof= $image;
      $dp->plan= $request['plan_id'];
      $dp->user= Auth::user()->id;
      $dp->save();

      $fname = Auth::user()->name;
      $lname = Auth::user()->l_name;

      //send notification
      $settings=settings::where('id', '=', '1')->first();
       //send email notification
      
         
        
      //send email notification
      $objDemo = new \stdClass();
      $objDemo->message = "This is to inform you that $fname $lname just made payment of $settings->currency$request->amount, kindly confirm this payment to activate the users plan.";
      $objDemo->message = "This is to inform you that $fname $lname just made payment of $settings->currency$request->amount, kindly confirm this payment to activate the users plan.";
      $objDemo->sender = "$settings->site_name";
      $objDemo->date = \Carbon\Carbon::Now();
      $objDemo->subject = "New Payment";
   
      Mail::bcc($settings->contact_email)->send(new NewNotification($objDemo));
  

    // Kill the session variables
    $request->session()->forget('plan_id');
    $request->session()->forget('pay_type');
    $request->session()->forget('payment_mode');
    $request->session()->forget('amount');
    $request->session()->forget('duration');


  return redirect()->route('dashboard')
  ->with('message', 'Action Sucessful! Please wait for the system to validate this transaction and activate your exchange.');
}
    //Save withdrawal requests
     public function withdrawal(Request $request){
            //get settings
            $settings=settings::where('id','1')->first();
            
             if($settings->enable_kyc =="yes"){
                if(Auth::user()->account_verify != "Verified"){
                    return redirect()->back()->with('message','Your account must be verified before you can make withdrawal.');
                }
             }
            
            $method=wdmethods::where('id',$request['method_id'])->first();
            $charges_percentage = $request['amount'] * $method->charges_percentage/100;
            $to_withdraw = $request['amount'] + $charges_percentage + $method->charges_fixed;
            //return if amount is lesser than method minimum withdrawal amount
            

            if(Auth::user()->account_bal < $to_withdraw){
               return redirect()->back()
            ->with('message', 'Sorry, your account balance is insufficient for this request.'); 
            }
            
            if($request['amount'] < $method->minimum){
               return redirect()->back()
            ->with("message", "Sorry, The minimum amount is $settings->currency$method->minimum."); 
            }
            
            //get user last investment package
            $last_user_plan=user_plans::where('user',Auth::user()->id)
            ->where('active','yes')
            ->orderby('activated_at','ASC')->first();
            
            /*if(count($last_user_plan) < 1){
                return redirect()->back()->with('message','You can not make withdrawal yet. You must have an investment running.');
            }*/
            
           //if 30 days has reached since activation
           /*if($last_user_plan->activated_at->diffInDays() < 30){
               return redirect()->back()->with('message','Your investment(s) is not due for withdrawal yet. You must wait till 30 days after your last investment.');
           }*/
           
          //get user
         $user=users::where('id',Auth::user()->id)->first();
         
         $amount= $request['amount'];
         $ui = $user->id;

         if(empty($user->btc_address) && empty($user->ltc_address) && empty($user->eth_address) && empty($user->account_no) && empty($user->bch_address) && empty($user->doge_address) && empty($user->dash_address) && empty($user->xrp_address) && empty($user->trx_address) && empty($user->pm_address) && empty($user->sol_address) && empty($user->dot_address) && empty($user->shiba_address) && empty($user->ada_address) && empty($user->xlm_address) && empty($user->luna_address) && empty($user->usdt_address) && empty($user->usdc_address) && empty($user->bnb_address) && empty($user->busd_address)){
          return redirect()->route('acountdetails')
          ->with('message', 'You must set up your coins wallet address before you can withdraw.');
        }
         
         
      
         
         if($request['payment_mode']=='Bitcoin'){
            if(empty($user->btc_address)){
                return redirect()->route('acountdetails')
                ->with('message', 'You must set up your Bitcoin wallet address before you can withdraw.');
            }
          $payment_mode = "Bitcoin";
          $coin="BTC"; 
          $wallet=$user->btc_address;
          //create auto transaction
          if($settings->withdrawal_option =="auto"){
            return $this->cpwithdraw($amount, $coin, $wallet, $ui, $to_withdraw);
          }
         }elseif($request['payment_mode']=='Ethereum'){
            if(empty($user->eth_address)){
                return redirect()->route('acountdetails')
                ->with('message', 'You must set up your Ethereum wallet address before you can withdraw.');
            }
          $payment_mode = "Ethereum";
          $coin="ETH"; 
          $wallet=$user->eth_address;
          //create auto transaction
          if($settings->withdrawal_option =="auto"){
            return $this->cpwithdraw($amount, $coin, $wallet, $ui, $to_withdraw);
          }
         }elseif($request['payment_mode']=='Litecoin'){
            if(empty($user->ltc_address)){
                return redirect()->route('acountdetails')
                ->with('message', 'You must set up your Litecoin wallet address before you can withdraw.');
            }
          $payment_mode = "Litecoin";
          $coin="LTC";  
          $wallet=$user->ltc_address;
          //create transaction
        //create auto transaction
          if($settings->withdrawal_option =="auto"){
            return $this->cpwithdraw($amount, $coin, $wallet, $ui, $to_withdraw);
          }
         }elseif($request['payment_mode']=='Doge'){
            if(empty($user->doge_address)){
                return redirect()->route('acountdetails')
                ->with('message', 'You must set up your Doge wallet address before you can withdraw.');
            }
          $payment_mode = "Doge";
          $coin="DOGE"; 
          $wallet=$user->doge_address;
          //create auto transaction
          if($settings->withdrawal_option =="auto"){
            return $this->cpwithdraw($amount, $coin, $wallet, $ui, $to_withdraw);
          }
         }
         elseif($request['payment_mode']=='Dash'){
            if(empty($user->dash_address)){
                return redirect()->route('acountdetails')
                ->with('message', 'You must set up your Dash wallet address before you can withdraw.');
            }
          $payment_mode = "Dash";
          $coin="DASH"; 
          $wallet=$user->dash_address;
          //create auto transaction
          if($settings->withdrawal_option =="auto"){
            return $this->cpwithdraw($amount, $coin, $wallet, $ui, $to_withdraw);
          }
         }
         elseif($request['payment_mode']=='USDT'){
            if(empty($user->usdt_address)){
                return redirect()->route('acountdetails')
                ->with('message', 'You must set up your USDT wallet address before you can withdraw.');
            }
          $payment_mode = "USDT";
          $coin="USDT"; 
          $wallet=$user->usdt_address;
          //create auto transaction
          if($settings->withdrawal_option =="auto"){
            return $this->cpwithdraw($amount, $coin, $wallet, $ui, $to_withdraw);
          }
         }
         
         elseif($request['payment_mode']=='TRX'){
            if(empty($user->trx_address)){
                return redirect()->route('acountdetails')
                ->with('message', 'You must set up your TRX wallet address before you can withdraw.');
            }
          $payment_mode = "TRX";
          $coin="TRX"; 
          $wallet=$user->trx_address;
          //create auto transaction
          if($settings->withdrawal_option =="auto"){
            return $this->cpwithdraw($amount, $coin, $wallet, $ui, $to_withdraw);
          }
         }
         elseif($request['payment_mode']=='Perfect Money'){
            if(empty($user->pm_address)){
                return redirect()->route('acountdetails')
                ->with('message', 'You must set up your Perfect Money account before you can withdraw.');
            }
          $payment_mode = "Perfect Money";
          $coin="pme"; 
          $wallet=$user->pm_address;
          //create auto transaction
          if($settings->withdrawal_option =="auto"){
            return $this->cpwithdraw($amount, $coin, $wallet, $ui, $to_withdraw);
          }
         }
         elseif($request['payment_mode']=='USDC'){
            if(empty($user->usdc_address)){
                return redirect()->route('acountdetails')
                ->with('message', 'You must set up your USDC wallet address before you can withdraw.');
            }
          $payment_mode = "USDC";
          $coin="USDC"; 
          $wallet=$user->usdc_address;
          //create auto transaction
          if($settings->withdrawal_option =="auto"){
            return $this->cpwithdraw($amount, $coin, $wallet, $ui, $to_withdraw);
          }
         }
         elseif($request['payment_mode']=='BNB'){
            if(empty($user->bnb_address)){
                return redirect()->route('acountdetails')
                ->with('message', 'You must set up your BNB wallet address before you can withdraw.');
            }
          $payment_mode = "BNB";
          $coin="BNB"; 
          $wallet=$user->bnb_address;
          //create auto transaction
          if($settings->withdrawal_option =="auto"){
            return $this->cpwithdraw($amount, $coin, $wallet, $ui, $to_withdraw);
          }
         }
         elseif($request['payment_mode']=='Cardona(ADA)'){
            if(empty($user->ada_address)){
                return redirect()->route('acountdetails')
                ->with('message', 'You must set up your Cardona(ADA) wallet address before you can withdraw.');
            }
          $payment_mode = "Cardona(ADA)";
          $coin="ADA"; 
          $wallet=$user->ada_address;
          //create auto transaction
          if($settings->withdrawal_option =="auto"){
            return $this->cpwithdraw($amount, $coin, $wallet, $ui, $to_withdraw);
          }
         }
         elseif($request['payment_mode']=='Polkadot'){
            if(empty($user->dot_address)){
                return redirect()->route('acountdetails')
                ->with('message', 'You must set up your Polkadot wallet address before you can withdraw.');
            }
          $payment_mode = "Polkadot";
          $coin="DOT"; 
          $wallet=$user->dot_address;
          //create auto transaction
          if($settings->withdrawal_option =="auto"){
            return $this->cpwithdraw($amount, $coin, $wallet, $ui, $to_withdraw);
          }
         }
         elseif($request['payment_mode']=='Shiba Inu'){
            if(empty($user->shiba_address)){
                return redirect()->route('acountdetails')
                ->with('message', 'You must set up your Shiba Inu wallet address before you can withdraw.');
            }
          $payment_mode = "Shiba Inu";
          $coin="SHIBA"; 
          $wallet=$user->shiba_address;
          //create auto transaction
          if($settings->withdrawal_option =="auto"){
            return $this->cpwithdraw($amount, $coin, $wallet, $ui, $to_withdraw);
          }
         }
         elseif($request['payment_mode']=='Doge'){
            if(empty($user->doge_address)){
                return redirect()->route('acountdetails')
                ->with('message', 'You must set up your Doge wallet address before you can withdraw.');
            }
          $payment_mode = "Doge";
          $coin="DOGE"; 
          $wallet=$user->doge_address;
          //create auto transaction
          if($settings->withdrawal_option =="auto"){
            return $this->cpwithdraw($amount, $coin, $wallet, $ui, $to_withdraw);
          }
         }
         elseif($request['payment_mode']=='Terra(Luna)'){
            if(empty($user->luna_address)){
                return redirect()->route('acountdetails')
                ->with('message', 'You must set up your Terra(Luna) wallet address before you can withdraw.');
            }
          $payment_mode = "Terra(Luna)";
          $coin="LUNA"; 
          $wallet=$user->luna_address;
          //create auto transaction
          if($settings->withdrawal_option =="auto"){
            return $this->cpwithdraw($amount, $coin, $wallet, $ui, $to_withdraw);
          }
         }
         elseif($request['payment_mode']=='Solana'){
            if(empty($user->sol_address)){
                return redirect()->route('acountdetails')
                ->with('message', 'You must set up your Solana wallet address before you can withdraw.');
            }
          $payment_mode = "Solana";
          $coin="SOL"; 
          $wallet=$user->sol_address;
          //create auto transaction
          if($settings->withdrawal_option =="auto"){
            return $this->cpwithdraw($amount, $coin, $wallet, $ui, $to_withdraw);
          }
         }
         elseif($request['payment_mode']=='Stellar(XLM)'){
            if(empty($user->xlm_address)){
                return redirect()->route('acountdetails')
                ->with('message', 'You must set up your Stellar(XLM) wallet address before you can withdraw.');
            }
          $payment_mode = "Stellar(XLM)";
          $coin="XLM"; 
          $wallet=$user->xlm_address;
          //create auto transaction
          if($settings->withdrawal_option =="auto"){
            return $this->cpwithdraw($amount, $coin, $wallet, $ui, $to_withdraw);
          }
         }
         elseif($request['payment_mode']=='BUSD'){
            if(empty($user->busd_address)){
                return redirect()->route('acountdetails')
                ->with('message', 'You must set up your BUSD wallet address before you can withdraw.');
            }
          $payment_mode = "BUSD";
          $coin="BUSD"; 
          $wallet=$user->busd_address;
          //create auto transaction
          if($settings->withdrawal_option =="auto"){
            return $this->cpwithdraw($amount, $coin, $wallet, $ui, $to_withdraw);
          }
         }
         elseif($request['payment_mode']=='Bitcoin Cash'){
            if(empty($user->bch_address)){
                return redirect()->route('acountdetails')
                ->with('message', 'You must set up your Bitcoin Cash Wallet address before you can withdraw.');
            }
          $payment_mode = "Bitcoin Cash";
          $coin="BCH"; 
          $wallet=$user->bch_address;
          //create auto transaction
          if($settings->withdrawal_option =="auto"){
            return $this->cpwithdraw($amount, $coin, $wallet, $ui, $to_withdraw);
          }
         }else{
             $payment_mode = "Bank transfer";
         }
         //save withdrawal info
            $dp=new withdrawals();
                      
            //$dp->txn_id= $txn_id;         
            $dp->amount= $amount;
            $dp->to_deduct= $to_withdraw;
            $dp->payment_mode= "$payment_mode";
            $dp->hash_id="$wallet";
            $dp->status= 'Pending';
            $dp->user= $user->id;
            $dp->save();  
            
            //debit user
         users::where('id',$user->id)
          ->update([
          'account_bal' => $user->account_bal-$to_withdraw,
          ]);

            //send notification
         $settings=settings::where('id', '=', '1')->first();
        
         //send email notification
         $objDemo = new \stdClass();
         $objDemo->message = "This is to inform you that a request of $settings->currency$amount withdrawal has just occured on your account. Contact us immediately if this request was not made by you. <br><br><b>Amount:</b> $settings->currency$amount.<br><b>Crypto:</b> $payment_mode<br><b>Wallet:</b> $wallet.";
         $objDemo->sender = $settings->site_name;
         $objDemo->date = \Carbon\Carbon::Now();
         $objDemo->subject ="Withdrawal Request";
        
         
Mail::bcc($user->email)->send(new NewNotification($objDemo));
        //send email notification
        $objDemo = new \stdClass();
        $objDemo->message = "This is to inform you that a withdrawal request has just occured. Amount: $settings->currency$amount, please login to confirm the withdrawal request";
        $objDemo->sender = $settings->site_name;
        $objDemo->date = \Carbon\Carbon::Now();
        $objDemo->subject ="Withdrawal Request";
            
        Mail::bcc($settings->contact_email)->send(new NewNotification($objDemo));
            return redirect()->back()
          ->with('message', 'Action Sucessful! Please wait for system to process your request.');
         
          
    }

}
