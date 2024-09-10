<?php

namespace App\Http\Controllers;
use App\Http\Traits\assetstrait;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TraitController extends Controller
{
    use assetstrait;

    //Get any coin, any currency rate
    public function get_rate($coin,$currency,$option){
        //get rates
       return $this->get_rates($coin,$currency,$option);
    }
}
