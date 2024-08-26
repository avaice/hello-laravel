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
}