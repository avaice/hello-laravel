<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ashiato;

class TopController extends Controller
{
    public function index()
    {
        return view('index', [
            'ashiatos' => Ashiato::all(),
        ]);
    }

    public function store(Request $request)
    {
        // データを保存してトップページにリダイレクトする
        $ashiato = new Ashiato();
        $ashiato->name = $request->name;
        $ashiato->like = (int)$request->like;
        $ashiato->save();
        return redirect('/');
    }
}