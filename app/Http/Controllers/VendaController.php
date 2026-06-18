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
    public function index(Request $request)
    {
        //
        $query = Venda::query();

        if ($request->search) {
            $query->where(function ($q) use ($request) {
                $q->whereHas('cliente', function ($subq) use ($request) {
                    $subq->where('nome', 'like', "%{$request->search}%");
                })
                ->orWhereHas('viatura', function ($subq) use ($request) {
                    $subq->where('marca', 'like', "%{$request->search}%")
                          ->orWhere('modelo', 'like', "%{$request->search}%");
                })
                ->orWhere('data_venda', 'like', "%{$request->search}%");
            });
        }

        $vendas = $query->orderBy('id', 'asc')->get();

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
        $request->validate([
            'cliente_id'   => 'required|exists:clientes,id',
            'viatura_id'   => 'required|exists:viaturas,id',
            'data_venda'   => 'required|date',
            'valor_venda'  => 'required|numeric',
            'observacoes'  => 'nullable|string',
        ]);

        $viatura = Viatura::findOrFail($request->viatura_id);

        // Impede vender uma viatura que já está vendida
        if ($viatura->estado === 'vendida') {
            return back()
                ->withErrors(['viatura_id' => 'Esta viatura já foi vendida e não pode ser vendida novamente.'])
                ->withInput();
        }

        Venda::create($request->all());

        // Marca a viatura automaticamente como vendida
        $viatura->update(['estado' => 'vendida']);

        return redirect()->route('vendas.index')->with('sucesso', 'Venda registada com sucesso!');
    }

    /**
     * Display the specified resource.
     */
   public function show($id)
{
    $venda = Venda::with(['cliente', 'viatura'])->findOrFail($id);
    return view('vendas.show', compact('venda'));
}

    /**
     * Show the form for editing the specified resource.
     */
  public function edit($id)
    {
        $venda = Venda::findOrFail($id);
        $clientes = Cliente::all();

        // Mostra as viaturas disponíveis + a própria viatura desta venda
        // (para não desaparecer do select ao editar)
        $viaturas = Viatura::where('estado', 'disponivel')
                            ->orWhere('id', $venda->viatura_id)
                            ->get();

        return view('vendas.edit', compact('venda', 'clientes', 'viaturas'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $venda = Venda::findOrFail($id);

        $request->validate([
            'cliente_id'   => 'required|exists:clientes,id',
            'viatura_id'   => 'required|exists:viaturas,id',
            'data_venda'   => 'required|date',
            'valor_venda'  => 'required|numeric',
            'observacoes'  => 'nullable|string',
        ]);

        $viaturaAntiga = $venda->viatura_id;
        $viaturaNova   = $request->viatura_id;

        // Se a viatura foi alterada, atualiza os estados das duas
        if ($viaturaAntiga != $viaturaNova) {
            // Liberta a viatura antiga
            Viatura::where('id', $viaturaAntiga)->update(['estado' => 'disponivel']);

            // Marca a nova viatura como vendida
            Viatura::where('id', $viaturaNova)->update(['estado' => 'vendida']);
        }

        $venda->update($request->all());

        return redirect()->route('vendas.index')->with('sucesso', 'Venda atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $venda = Venda::findOrFail($id);

        // Volta a colocar a viatura como disponível ao apagar a venda
        if ($venda->viatura) {
            $venda->viatura->update(['estado' => 'disponivel']);
        }

        $venda->delete();

        return redirect()->route('vendas.index')->with('sucesso', 'Venda apagada com sucesso! A viatura voltou a estar disponível.');
    }
}
