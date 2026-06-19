<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'nome'          => 'required|string|max:100',
            'classificacao' => 'required|integer|min:1|max:5',
            'comentario'    => 'required|string|max:500',
        ]);

        Review::create($request->only(['nome', 'classificacao', 'comentario']));

        return redirect()->route('estatisticas.index')
            ->with('sucesso', 'Obrigado pela sua avaliação!');
    }
}
