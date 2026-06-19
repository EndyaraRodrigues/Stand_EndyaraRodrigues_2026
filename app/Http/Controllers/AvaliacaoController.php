<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use Illuminate\Http\Request;

class AvaliacaoController extends Controller
{
    public function index(Request $request)
    {
        $query = Avaliacao::query();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->where('nome', 'like', "%{$request->search}%")
                  ->orWhere('marca', 'like', "%{$request->search}%")
                  ->orWhere('modelo', 'like', "%{$request->search}%")
                  ->orWhere('matricula', 'like', "%{$request->search}%");
            });
        }

        if ($request->estado) {
            $query->where('estado', $request->estado);
        }

        $avaliacoes = $query->orderBy('data_agendada', 'asc')
                             ->orderBy('hora_agendada', 'asc')
                             ->get();

        return view('avaliacoes.index', compact('avaliacoes'));
    }

    public function create()
    {
        return view('avaliacoes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome'          => 'required|string|max:255',
            'telefone'      => 'required|string|max:20',
            'email'         => 'nullable|email|max:255',
            'marca'         => 'required|string|max:255',
            'modelo'        => 'required|string|max:255',
            'matricula'     => 'nullable|string|max:20',
            'ano'           => 'nullable|digits:4|integer|min:1950|max:' . (date('Y') + 1),
            'quilometros'   => 'nullable|integer|min:0',
            'observacoes'   => 'nullable|string',
            'data_agendada' => 'required|date|after_or_equal:today',
            'hora_agendada' => 'required|date_format:H:i',
        ], [
            'data_agendada.after_or_equal' => 'A data da avaliação não pode ser no passado.',
        ]);

        Avaliacao::create($request->all());

        return redirect()
            ->route('avaliacoes.pedido.confirmado')
            ->with('sucesso', 'Pedido de avaliação enviado com sucesso! Entraremos em contacto para confirmar.');
    }

    public function confirmado()
    {
        return view('avaliacoes.confirmado');
    }

    public function show($id)
    {
        $avaliacao = Avaliacao::findOrFail($id);
        return view('avaliacoes.show', compact('avaliacao'));
    }

    public function update(Request $request, $id)
    {
        $avaliacao = Avaliacao::findOrFail($id);

        $request->validate([
            'data_agendada' => 'required|date',
            'hora_agendada' => 'required|date_format:H:i',
            'estado'        => 'required|in:pendente,confirmada,concluida,cancelada',
        ]);

        $avaliacao->update($request->only(['data_agendada', 'hora_agendada', 'estado']));

        return redirect()->route('avaliacoes.index')->with('sucesso', 'Pedido de avaliação atualizado com sucesso!');
    }

    public function destroy($id)
    {
        Avaliacao::findOrFail($id)->delete();

        return redirect()->route('avaliacoes.index')->with('sucesso', 'Pedido de avaliação apagado com sucesso!');
    }
}
