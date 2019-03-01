<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Tradenity\SDK\Resources\Customer;

class AccountsController extends Controller
{


    /**
     * AccountsController constructor.
     */
    public function __construct()
    {
       
    }

    public function register()
    {
        $data = array('customer' => new Customer());
        return view('account/register', $data);
    }

    public function create(Request $request)
    {
        $customer = Customer::fromArray($request->all());
        $customer->create();
        return redirect('/login');
    }
    
}
