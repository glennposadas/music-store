<?php

namespace App\Http\Controllers;

use App\Guitar;
use Illuminate\Http\Request;

class GuitarController extends Controller
{

    public function __construct() {
        $this->middleware('auth', ['only' => [
            'create',
            'update',
            'delete'
        ]]);
    }

    public function index()
    {
        $guitars = Guitar::all();

        return response()->json($guitars);
    }

    public function find($id)
    {
        $guitar = Guitar::find($id);

        return response()->json($guitar);
    }

    public function create(Request $request)
    {
        $guitar = Guitar::create($request->all());

        return response()->json($guitar);   
    }

    public function update(Request $request, $id)
    {
        // Get the guitar 
        $guitar = Guitar::find($id);

        $updatedGuitar = $guitar->update($request->all());

        return response()->json(['updated' => $updatedGuitar]);
    }

    public function delete($id)
    {
        $count = Guitar::destroy($id);

        return response()->json(['updated' => $count == 1]);        
    }
}
