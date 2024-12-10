<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    
    public function store (Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'phone' => 'required|string|max:255',
        ]);


        $customer = Customer::create(['name'=> $request->name, 'email'=> $request->email, 'phone'=>$request->phone]);


        return response()->json(["message"=> "Cliente criado com sucesso!", "customer"=> $customer], 201);

    }

}
