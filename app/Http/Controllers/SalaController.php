<?php

namespace App\Http\Controllers;

use App\Models\Sala;
use App\Models\Video;
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

    public function show($uuid, $videoid = null) {
        $sala = Sala::where('uuid', $uuid)->first();
        if ($sala) {
            if ($videoid) {
                $video = Video::where('id', $videoid)->first();
                return view('salas.show', compact('sala'), compact('video'));
            }
            return view('salas.show', compact('sala'), ['video' => null]);
        } else {
            return view('salas.login', ['uuid' => $uuid])->withErrors('Sala não encontrada');
        }
    }

    public function find(Request $request)
    {
        $explode = explode('/', $request->uuid);
        $uuid = end($explode);
        $sala = Sala::where('uuid', $uuid)->first();

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
