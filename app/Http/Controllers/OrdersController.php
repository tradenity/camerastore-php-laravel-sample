<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Tradenity\SDK\Entities\Address;
use Tradenity\SDK\Entities\Order;

class OrdersController extends Controller
{

    /**
     * OrdersController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        $customer = $request->user()->toCustomer();
        $orders = Order::findAllByCustomer($customer);
        return view('orders/index', array(
            'orders' => $orders,
        ));        
    }

    public function checkout(Request $request)
    {
        $stripeKey = config("tradenity.stripe_key");
        $order = new Order();
        $order->customer = $request->user()->toCustomer();
        $order->billingAddress = $this->createAddress();
        $order->shippingAddress = $this->createAddress();
        return view('orders/checkout', array(
            'order' => $order, 'stripeKey' => $stripeKey
        ));
    }
    
    public function create(Request $request)
    {
        $token = $request->input('token');
        $input = $request->all();
        
        $order = new Order();
        $order->customer = $request->user()->toCustomer();
        $order->billingAddress = $this->getBillingAddress($input);
        $order->shippingAddress = $this->getShippingAddress($input);

        $transaction = $order->checkout($token);
        $orderId = $transaction->order->id;
        return redirect("/orders/${orderId}");
        
    }

    public function show($id)
    {
        $order = Order::findById($id);
        return view('orders/show', array(
            'order' => $order,
        ));
    }

    public function refund($id)
    {
        $transaction = Order::refund($id);
        $orderId = $transaction->order->id;
        return redirect("/orders/${orderId}");
    }
    
    private function createAddress()
    {
        $a = new Address();
        $a->streetLine1="3290 Hermosillo Place";
        $a->streetLine2="";
        $a->city="Washington";
        $a->state="Washington, DC";
        $a->zipCode="20521-3290";
        $a->country="USA";
        return $a;
    }

    private function getBillingAddress($input)
    {
        $a = new Address();
        $a->streetLine1 = $input['billingAddress_streetLine1'];
        $a->streetLine2 = $input['billingAddress_streetLine2'];
        $a->city = $input['billingAddress_city'];
        $a->state = $input['billingAddress_state'];
        $a->zipCode = $input['billingAddress_zipCode'];
        $a->country = $input['billingAddress_country'];
        return $a;
    }

    private function getShippingAddress($input)
    {
        $a = new Address();
        $a->streetLine1 = $input['shippingAddress_streetLine1'];
        $a->streetLine2 = $input['shippingAddress_streetLine2'];
        $a->city = $input['shippingAddress_city'];
        $a->state = $input['shippingAddress_state'];
        $a->zipCode = $input['shippingAddress_zipCode'];
        $a->country = $input['shippingAddress_country'];
        return $a;
    }
    
}
