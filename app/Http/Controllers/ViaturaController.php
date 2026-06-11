<?php

namespace App\Http\Controllers;

use App\Models\Viatura;
use Illuminate\Http\Request;

class ViaturaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
{
    $query = Viatura::query();

    // Pesquisa
    if ($request->search) {
        $query->where('marca', 'like', "%{$request->search}%")
              ->orWhere('modelo', 'like', "%{$request->search}%")
              ->orWhere('matricula', 'like', "%{$request->search}%");
    }

    // Ordenação
    $order = $request->order ?? 'id';
    $query->orderBy($order);

    $viaturas = $query->get();
    return view('viaturas.index', compact('viaturas'));
}

public function store(Request $request)
{
    $request->validate([
        'marca'       => 'required',
        'modelo'      => 'required',
        'matricula'   => 'required|unique:viaturas',
        'ano'         => 'required|digits:4',
        'quilometros' => 'required|integer',
        'preco'       => 'required|numeric',
        'foto'        => 'nullable|image|max:2048',
    ]);

    $data = $request->all();

    // Upload da foto
    if ($request->hasFile('foto')) {
        $data['foto'] = $request->file('foto')->store('viaturas', 'public');
    }

    Viatura::create($data);
    return redirect()->route('viaturas.index')->with('sucesso', 'Viatura criada com sucesso!');
}
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
         $viatura = Viatura::findOrFail($id);
    return view('viaturas.show', compact('viatura'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Viatura $viatura)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Viatura $viatura)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Viatura $viatura)
    {
        //
    }
}
