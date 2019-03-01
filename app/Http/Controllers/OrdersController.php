<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Tradenity\SDK\Resources\PageRequest;
use Tradenity\SDK\Resources\Country;
use Tradenity\SDK\Resources\State;
use Tradenity\SDK\Resources\Address;
use Tradenity\SDK\Resources\ShoppingCart;
use Tradenity\SDK\Resources\Order;
use Tradenity\SDK\Resources\ShippingMethod;
use Tradenity\SDK\Resources\PaymentToken;
use Tradenity\SDK\Resources\CreditCardPayment;

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
        $orders = Order::findAllBy(['customer' => $customer->getId()]);
        return view('orders/index', array(
            'orders' => $orders,
        ));        
    }

    public function checkout(Request $request)
    {
        $stripeKey = config("tradenity.stripe_key");
        $usa = Country::findOneBy(['iso2' => "US"]);
        $countries = Country::findAll(new PageRequest(0, 250));
        $states = State::findAllBy(['country' => $usa->getId(), 'size' => 60, 'sort' => "name"]);
        $order = new Order([
            'customer' => $request->user()->toCustomer(),
            'billingAddress' => $this->createAddress($usa),
            'shippingAddress' => $this->createAddress($usa)
        ]);
        return view('orders/checkout', array(
            'cart' => ShoppingCart::get(), 'countries' => $countries, 'states' => $states,
            'order' => $order, 'stripeKey' => $stripeKey
        ));
    }
    
    public function create(Request $request)
    {
        $input = $request->all();
        
        $order = new Order([
            'customer' => $request->user()->toCustomer(),
            'billingAddress' => $this->getBillingAddress($input),
            'shippingAddress' => $this->getShippingAddress($input)
        ]);

        $order->create();
        $request->session()->put('orderId', $order->getId());

        $shippingMethods = ShippingMethod::findAllForOrder($order->getId());

        return view('orders/shipping_form', array(
            'shippingMethods' => $shippingMethods
        ));
        
    }

    public function addShipping(Request $request)
    {
        $order = Order::findById($request->session()->get('orderId'));
        $order->setShippingMethod(new ShippingMethod(['id' => $request->input('shipping_method')]));
        $order->update();
        return view('orders/payment_form', array());
    }

    public function addPayment(Request $request)
    {
        $order = Order::findById($request->getSession()->get('orderId'));
        $paymentSource = new PaymentToken(['token' => $request->input('payment_token'), 'customer' => $request->user()->toCustomer(), 'status' => "new"]);
        $paymentSource->create();
        $cardPayment = new CreditCardPayment(['order' => $order, 'paymentSource' => $paymentSource]);
        $cardPayment->create();
        $orderId = $order->getId();
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

    private function createAddress($country)
    {
        $a = new Address();
        $a->setStreetLine1("3290 Hermosillo Place");
        $a->setStreetLine2("");
        $a->setCity("Washington");
        $a->setState(new State());
        $a->setZipCode("20521-3290");
        $a->setCountry($country);
        return $a;
    }

    private function getBillingAddress($input)
    {
        return new Address([
            'streetLine1' => $input['billingAddress_streetLine1'],
            'streetLine2' => $input['billingAddress_streetLine2'],
            'city' => $input['billingAddress_city'],
            'state' => new State(['id' => $input['billingAddress_state']]),
            'zipCode' => $input['billingAddress_zipCode'],
            'country' => new Country(['id' => $input['billingAddress_country']])
        ]);
    }

    private function getShippingAddress($input)
    {
        return new Address([
            'streetLine1' => $input['shippingAddress_streetLine1'],
            'streetLine2' => $input['shippingAddress_streetLine2'],
            'city' => $input['shippingAddress_city'],
            'state' => new State(['id' => $input['shippingAddress_state']]),
            'zipCode' => $input['shippingAddress_zipCode'],
            'country' => new Country(['id' => $input['shippingAddress_country']])
        ]);
    }
    
}
