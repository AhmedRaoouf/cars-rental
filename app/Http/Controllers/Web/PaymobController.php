<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Payment;
use App\Models\Car_User;
use Exception;
use Illuminate\Http\Request;
use MG\Paymob\Paymob;


class PaymobController extends Controller
{
    
    public function pay($rent_id, $method)
    {
        $rent = Car_User::where('id', $rent_id)->first();
        if ($rent != Null) {
            $rent_id_int = (int) $rent->id;
            if($method != NULL){
                
               
                
                $amount = Car::where('id', $rent->car_id)->first()->total_price;
                $amount_cent = $this->poundsToCent((int) $amount);
                // $merchant_id = rand(1000,10000);
                
                $pay = Payment::create([
                    'rent_id' => $rent->id,
                    'method' => $method,
                    'amount' => $amount,
                    'status' => 'waiting'
                ]);
                
                $merchant_id = $pay->id;

        
        
                // Prepare billing data: Fill empty keys with 'N/A'; required!
                $billingData = [
                    "apartment" => "NA",
                    "email" => "NA",
                    "floor" => "NA",
                    "first_name" => "NA",
                    "street" => "NA",
                    "building" => "NA",
                    "phone_number" => "NA",
                    "shipping_method" => "NA",
                    "postal_code" => "NA",
                    "city" => "NA",
                    "country" => "NA",
                    "last_name" => "NA",
                    "state" => "NA"
                ];
    
                try {
                    $paymob = new Paymob();
                    $token = $paymob->auth();
                    $order = $paymob->makeOrder($token['token'], false, $amount_cent , [], $merchant_id);
                    $payment = $paymob->getPaymentKey($token['token'], $amount_cent, 3600 , $order['id'], $billingData, 'EGP');
                    if($method == "credit_card"){
                        $url = 'https://accept.paymob.com/api/acceptance/iframes/769386?payment_token='.$payment['token'];
                        return view('paymob', compact('url'));
                    }elseif($method == "vodafone_cash"){
                        $url = 'https://accept.paymob.com/api/acceptance/iframes/769386?payment_token='.$payment['token'];
                        return view('paymob', compact('url'));
                    }elseif($method == "wallet"){
                        $url = 'https://accept.paymob.com/api/acceptance/iframes/769386?payment_token='.$payment['token'];
                        return view('paymob', compact('url'));
                    }else{
                        $e = "Invalid Method";
                        return view('error', compact('e'));

                    }
                } catch (Exception $e) {
                    return view('error', compact('e'));
                }
            }else{
                $e = "You must choose method";
                return view('error', compact('e'));
                
            }
        } else {
            $e = "Request Not Found";
            return view('error', compact('e'));
        }

        
    }
    
    function poundsToCent($pounds) {
        $cent = $pounds * 100;
        return $cent;
    }
}
