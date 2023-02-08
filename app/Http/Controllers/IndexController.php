<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class IndexController extends Controller
{
    public function index()
    {
        require_once 'PaymentController.php';
        $plugin = new PaymentController();
        $request_url = 'payment/request';
           $data =   [
            "tran_type"=> "sale",
            "tran_class"=> "ecom",
            "cart_id"=> "1212",
            "cart_currency"=> "EGP",
            "cart_amount"=> 12.3,
            "cart_description"=> "Description of the items/services",
            "paypage_lang"=> "en",
            "customer_details"=> [
                "name"=> "first last",
                "email"=> "email@domain.com",
                "phone"=> "0522222222",
                "street1"=> "address street",
                "city"=> "dubai",
                "state"=> "du",
                "country"=> "AE",
                "zip"=> "12345"
            ],
            "shipping_details"=> [
                "name"=> "name1 last1",
                "email"=> "email1@domain.com",
                "phone"=> "971555555555",
                "street1"=> "street2",
                "city"=> "dubai",
                "state"=> "dubai",
                "country"=> "AE",
                "zip"=> "54321"
            ],
              "callback"=> route('result'),
            "return"=> route('result'),
        ]
        ;
        $page = $plugin->send_api_request($request_url, $data);
           print_r(  $page ); 
        header('Location:' . $page['redirect_url']); /* Redirect browser */
        exit();
         
    }

}
