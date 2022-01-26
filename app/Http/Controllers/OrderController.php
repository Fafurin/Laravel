<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        return view('order');
    }

    public function create(Request $request){
        $firstName = $request->input('firstName');
        $lastName = $request->input('lastName');
        $phone = $request->input('phone');
        $email = $request->input('email');
        $orderInfo = $request->input('orderInfo');

        $customer = new Customer($firstName, $lastName, $phone, $email, $orderInfo);
        // adding data to the database

        return redirect()->route('order');
    }

}
