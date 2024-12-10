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

    public function list ()
    {
        $customers = Customer::all();

        return response()->json([$customers], 200);
    }

    public function update (Request $request, $id)
    {
        $request->validate([
            'name' => 'string|max:255',
            'email' => 'string|email|max:255|unique:customers',
            'phone' => 'string|max:255',
        ]);

        $customer = Customer::findOrFail($id);

        $customer->update($request->only(['name', 'email', 'phone']));

        return response()->json(['message'=>'Cliente atualizado com sucesso', 'customer'=>$customer], 200);
    }

    public function delete ($id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return response()->json(['message'=>'Cliente removido', 'customer'=>$customer], 200);
    }

}
