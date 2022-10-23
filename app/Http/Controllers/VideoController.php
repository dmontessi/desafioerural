<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Sala;
use Illuminate\Http\Request;
use App\Helper\Helper;

class VideoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'url' => "regex:/^(?:http(?:s)?:\/\/)?(?:www\.)?(?:m\.)?(?:youtu\.be\/|youtube\.com\/(?:(?:watch)?\?(?:.*&)?v(?:i)?=|(?:embed|v|vi|user|shorts)\/))([^\?&\"'>]+)/",
            'sala_id' => 'required',
        ],
        [
            'url.regex' => 'Link inválido, informe um link do Youtube'
        ]);

        Video::create($request->all());

        $sala = Sala::where('id', $request->sala_id)->first();
        if ($sala) {
            return redirect('/sala/' . $sala->uuid);
        }
    }

    public function destroy(Video $video)
    {
        $sala_id = $video->sala_id;
        $video->delete();
       
        $sala = Sala::where('id', $sala_id)->first();
        if ($sala) {
            return redirect('/sala/' . $sala->uuid);
        }
    }

    public function porsala($id) {
        $sala = Sala::where('id', $id)->first();
        if ($sala) {
            return view('videos.porsala', compact('sala'));
        }
    }
}
