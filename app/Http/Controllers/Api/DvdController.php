<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dvd;
use Illuminate\Http\Request;

class DvdController extends Controller
{
    public function store (Request $request)
    {
        $dvd = Dvd::create(['title'=> $request->title, 'genre'=> $request->genre, 'available'=>$request->available, 'rent_price'=>$request->rent_price]);

        return response()->json(['message'=>'DVD cadastrado com sucesso!', 'dvd'=>$dvd], 201);
    }

    public function list ()
    {
        $dvds = Dvd::all();

        return response()->json([$dvds], 200);
    }

    public function update (Request $request, $id)
    {
        $dvd = Dvd::findOrFail($id);

        $dvd->update($request->only(['title', 'genre', 'available', 'rent_price']));

        return response()->json(['message'=>'Dvd atualizado com sucesso!', 'customer'=>$dvd], 200);
    }

    public function delete ($id)
    {
        $dvd = Dvd::findOrFail($id);
        $dvd->delete();
        return response()->json(['message'=> 'Dvd removido com sucesso!', 'dvd'=>$dvd], 200);
    }
}
