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
        // バリデーションをして、エラーがあればエラーメッセージを返す
        $validated = $request->validate([
            'name' => 'required|max:255',
            'like' => 'required|integer',
        ]);
        
        if ($validated->fails()) {
            return redirect('/')
                ->withErrors($validated)
                ->withInput();
        }


        
        // データを保存してトップページにリダイレクトする
        $ashiato = new Ashiato();
        $ashiato->name = $request->name;
        $ashiato->like = (int)$request->like;
        $ashiato->save();
        return redirect('/');
    }
}