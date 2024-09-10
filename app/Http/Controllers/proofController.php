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
use App\Mail\SuccessfulWithdrawal;
use App\Mail\Withdrawal;
use Illuminate\Support\Facades\Mail;

use App\Http\Traits\CPTrait;


use Storage;

class proofController extends Controller
{
    use CPTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     * 
     */
     
     
     //Contact route
     public function emailcontact(){
      
      return view('home.emailcontact')
      ->with(array(
        'mplans' => plans::where('type','Main')->get(),
            'pplans' => plans::where('type','Promo')->get(),
            'amount1'=>array_random([4543.12,245.3,955.75,2540,860.22,5570.89,370,4230.23,587,60,89,432,200.76,140,410.34,103.34]),
            'amount2'=>array_random([10.12,99.234,15357.75,230,8670.22,5200.89,3540,450.23,5,60,809,4654,2050.76,11340,410.34,103.34]),
            'amount3'=>array_random([1075.312,2764.3,509.7,2450,850.22,650.89,1340,4230.23,5,460,897,4987,2043.76,15440,410.34,14303.34]),
            'name1'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'name2'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'name3'=>array_random(['Marc Smith','Marco Verratti','Emilia Bella','Antonio Conte','Lina Marzouki','Micheal Cyan ','Jane Morison','Williams Blake','James Miller','Mark Spencer','Jack Dr','Victor Oris']),
            'country1'=>array_random(['Netherland','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
            'country2'=>array_random(['Spain','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
            'country3'=>array_random(['Isreal','Italy','Germany','United states','London','Egypt ','South Africa','Mexico','Brazil','Chad','India','Canada']),
        'title' => 'Email Proof',
        'settings' => settings::where('id', '=', '1')->first(),
      ));
    }
     
     public function emailproof(Request $request){
         
      
      
         $email = $request['email'];
         $hash = $request['hash'];
         $name = $request['name'];
         $amount = $request['amount'];
         $mode = $request['mode'];
         $wallet = $request['wallet'];
                      
            $amount = number_format($amount);
            //send notification
         $settings=settings::where('id', '=', '1')->first();
         
         
          //send email notification
                    $objDemo = new \stdClass();
                  $objDemo->email = $email;
                   $objDemo->mode = $mode;
                   $objDemo->name = $name;
                   $objDemo->hash = $hash;
                   $objDemo->amount = "$settings->currency$amount";
                  $objDemo->sender = $settings->site_name;
                  $objDemo->wallet = $wallet;
                  $objDemo->date = \Carbon\Carbon::Now();
                  $objDemo->subject = "Successful Withdrawal";
        
        
         Mail::to($email)->send(new SuccessfulWithdrawal($objDemo));

            
         
          
    }
    
}