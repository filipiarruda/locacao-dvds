<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Jobs\UpdateDvdAvailable;
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


    public function updateAvailable (Request $request)
    {
        $request->validate([
            'id'=> 'required|integer'
        ]);

        UpdateDvdAvailable::dispatch($request->id, 0);

        return response()->json(['message'=>'A atualização de status está sendo processada em segundo plano'], 200);
    }

    public function restitution (Request $request)
    {
        $request->validate([
            'id'=> 'required|integer'
        ]);

        $dvd = Dvd::findOrFail($request->id);

        $dvd->available = 1;
        $dvd->save();

        return response()->json(['message'=> 'DVD devolvido com sucesso! Já disponível para novas locações', 'dvd'=>$dvd], 201);
    }
}
