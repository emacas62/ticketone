<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eventi;

class EventiController extends Controller
{

    public function index()
    {
        $eventi = Eventi::all();
        return response()->json($eventi);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title'=>'required',
            'price'=>'required',
            'description'=>'required'
        ]);

        $evento = new Eventi();

        $evento->title = $request->input('title');
        $evento->price = $request->input('price');
        $evento->description = $request->input('description');

        $evento->save();
        return response()->json($evento);

    }


    public function show($id)
    {
        $evento = Eventi::find($id);
        return response()->json($evento);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'=>'required',
            'price'=>'required',
            'description'=>'required'
        ]);

        $evento = Eventi::find($id);

        $evento->title = $request->input('title');
        $evento->price = $request->input('price');
        $evento->description = $request->input('description');

        $evento->save();
        return response()->json($evento);
    }

   
    public function destroy($id)
    {
        $evento = Eventi::find($id);
        $evento->delete();
        return response()->json("Evento eliminato con successo!");
    }
}
