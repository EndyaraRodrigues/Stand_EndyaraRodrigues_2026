<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */


        public function index(Request $request)
{
    $query = Cliente::query();

    if ($request->search) {
        $query->where(function ($q) use ($request) {
            $q->where('nome', 'like', "%{$request->search}%")
              ->orWhere('email', 'like', "%{$request->search}%")
              ->orWhere('telefone', 'like', "%{$request->search}%")
              ->orWhere('nif', 'like', "%{$request->search}%");
        });
    }

    $clientes = $query->orderBy('id', 'asc')->get();

    return view('clientes.index', compact('clientes'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
         return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // validar os dados

        $request->validate([
        'nome'  => 'required',
        'email' => 'required|email|unique:clientes',
        'telefone' => 'nullable',
        'morada' => 'nullable',
        'nif'   => 'required|unique:clientes',
    ]);

        // gravar na base de dados
        Cliente::create([
            'nome' => $request->nome,
            'email' => $request->email,
            'telefone' => $request->telefone,
            'morada' => $request->morada,
            'nif' => $request->nif,
        ]);
        return redirect()->route('clientes.index')
            ->with('success', 'Cliente criado com sucesso');
    }
        //

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
        $cliente = Cliente::findOrFail($id);
    return view('clientes.show', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        //
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
    return redirect()->route('clientes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
    return redirect()->route('clientes.index');
    }
}
