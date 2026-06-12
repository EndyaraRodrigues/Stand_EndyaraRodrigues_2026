<?php

namespace App\Http\Controllers;

use App\Models\Venda;
use App\Models\Viatura;
use App\Models\Cliente;
use Illuminate\Http\Request;

class VendaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $vendas = Venda::all();
    return view('vendas.index', compact('vendas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $clientes = Cliente::all();
    $viaturas = Viatura::where('estado', 'disponivel')->get();
    return view('vendas.create', compact('clientes', 'viaturas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
        'cliente_id'  => 'required|exists:clientes,id',
        'viatura_id'  => 'required|exists:viaturas,id',
        'data_venda'  => 'required|date',
        'valor_venda' => 'required|numeric',
    ]);

    // Verifica se viatura já foi vendida
    $viatura = Viatura::findOrFail($request->viatura_id);
    if ($viatura->estado === 'vendida') {
        return back()->withErrors(['viatura_id' => 'Esta viatura já foi vendida!']);
    }

    Venda::create($request->all());

    // Atualiza estado da viatura
    $viatura->update(['estado' => 'vendida']);

    return redirect()->route('vendas.index')->with('sucesso', 'Venda registada com sucesso!');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
         $venda = Venda::findOrFail($id);
    return view('vendas.show', compact('venda'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Venda $venda)
    {
        //
        $clientes = Cliente::all();
    $viaturas = Viatura::where('estado', 'disponivel')
                       ->orWhere('id', $venda->viatura_id)
                       ->get();
    return view('vendas.edit', compact('venda', 'clientes', 'viaturas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        //
         $venda = Venda::findOrFail($id);
        $venda->update($request->all());
    return redirect()->route('vendas.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $venda = Venda::findOrFail($id);
        $venda->delete();
    return redirect()->route('vendas.index');
    }
}
