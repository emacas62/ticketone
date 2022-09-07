<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eventi;
use App\Http\Resources\EventResource;
use App\Http\Resources\EventCollection;

class EventiController extends Controller
{

    public function index()
    {
        $eventi = Eventi::all();
        return new EventCollection($eventi);
    }


    public function create(Request $request)
    {
        $this->validate($request, [
            'title'=>'required|string|min:3',
            'price'=>'required|numeric',
            'description'=>'required|string',
            'date' => 'required|date',
            'cover_url' => 'required|url',
            'address' => 'required|string',
            'lat' => 'required|numeric',
            'lng' => 'required|numeric',
            'views_count' => 'required|integer',
            'comments_count' => 'required|integer',
            'likes_count' => 'required|integer'
        ]);

        $evento = new Eventi($request->all());

        $evento->save();
        return new EventResource($evento);

    }


    public function show($id)
    {
        $evento = Eventi::find($id);

        if($evento) {
            return new EventResource($evento);
        } else { 
            return $this->failure("L'evento cercato non è stato trovato", 1, 404);
        }
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'string|min:3',
            'price' => 'numeric',
            'description' => 'string',
            'date' => 'date',
            'cover_url' => 'url',
            'address' => 'string',
            'lat' => 'numeric',
            'lng' => 'numeric',
            'views_count' => 'integer',
            'comments_count' => 'integer',
            'likes_count' => 'integer'
        ]);

        $evento = Eventi::find($id);

        if ($evento) { 
            $evento->update($request->all());
            return new EventResource($evento);
        } else { 
            return $this->failure("L'evento cercato non è stato trovato", 1, 404);
        }
    }

   
    public function destroy($id)
    {
        $evento = Eventi::find($id);

        if ($evento) { 
            $evento->delete();
            return Eventi::all();
        } else { 
            return $this->failure("L'evento cercato non è stato trovato", 1, 404);
        }
        
    }
}
