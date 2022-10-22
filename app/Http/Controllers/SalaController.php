<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use Illuminate\Http\Request;

class SalaController extends Controller
{
    public function index()
    {
        return view('salas.index');
    }

    public function store(Request $request)
    {
        $sala = Sala::create($request->post());
        return redirect('/sala/' . $sala->uuid);
    }

    public function show($uuid) {
        $sala = Sala::where('uuid', $uuid)->first();
        if ($sala) {
            return view('salas.show', compact('sala'));
        } else {
            return view('salas.login', ['uuid' => $uuid])->withErrors('Sala não encontrada');
        }
    }

    public function find(Request $request)
    {
        $sala = Sala::where('uuid', $request->uuid)->first();
        if ($sala)
            return redirect('/sala/' . $sala->uuid);
        else
            return view('salas.login', ['uuid' => $request->uuid])->withErrors('Sala não encontrada');
    }

    public function login()
    {
        return view('salas.login');
    }

}
