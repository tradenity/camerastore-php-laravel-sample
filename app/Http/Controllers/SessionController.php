<?php

namespace App\Http\Controllers;

use Tradenity\SDK\Ext\Laravel\Auth\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Tradenity\SDK\Entities\Customer ;

class SessionController extends Controller
{
    
    public function login(Request $request)
    {
        return view('login', ['user' => $request->user()]);
    }
    
    public function create(Request $request)
    {
        $customer = Customer::findByUsername($request->input('username'));
        $user = new User($customer);


        if ( (!is_null($customer)) && Hash::check($request->input('password'), $customer->password)) 
        {
            Auth::login($user);
            return redirect("/");
        }
        else
        {
            return redirect('/login');
        }
    }

    public function delete(Request $request)
    {
        Auth::logout($request->user());
        return redirect("/");
    }
}
