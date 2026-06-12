<?php

namespace App\Http\Controllers;

use App\Models\Viatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ViaturaController extends Controller
{
    public function index(Request $request)
    {
        $query = Viatura::query();

        if ($request->search) {
            $query->where(function($q) use ($request) {
                $q->where('marca', 'like', "%{$request->search}%")
                  ->orWhere('modelo', 'like', "%{$request->search}%")
                  ->orWhere('matricula', 'like', "%{$request->search}%");
            });
        }

        $order = $request->order ?? 'id';
        $query->orderBy($order);

        $viaturas = $query->get();
        return view('viaturas.index', compact('viaturas'));
    }

    public function create()
    {
        return view('viaturas.create');
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

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('viaturas', 'public');
        }

        Viatura::create($data);
        return redirect()->route('viaturas.index')->with('sucesso', 'Viatura criada com sucesso!');
    }

    public function show($id)
    {
        $viatura = Viatura::findOrFail($id);
        return view('viaturas.show', compact('viatura'));
    }

    public function edit(Viatura $viatura)
    {
        return view('viaturas.edit', compact('viatura'));
    }

    public function update(Request $request, $id)
    {
        $viatura = Viatura::findOrFail($id);

        $request->validate([
            'marca'       => 'required',
            'modelo'      => 'required',
            'matricula'   => 'required|unique:viaturas,matricula,' . $id,
            'ano'         => 'required|digits:4',
            'quilometros' => 'required|integer',
            'preco'       => 'required|numeric',
            'foto'        => 'nullable|image|max:2048',
        ]);

        $data = $request->except('foto');

        if ($request->hasFile('foto')) {
            // Apaga a foto antiga se existir
            if ($viatura->foto) {
                Storage::disk('public')->delete($viatura->foto);
            }
            $data['foto'] = $request->file('foto')->store('viaturas', 'public');
        }

        $viatura->update($data);
        return redirect()->route('viaturas.index')->with('sucesso', 'Viatura atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $viatura = Viatura::findOrFail($id);

        // Apaga a foto ao eliminar a viatura
        if ($viatura->foto) {
            Storage::disk('public')->delete($viatura->foto);
        }

        $viatura->delete();
        return redirect()->route('viaturas.index')->with('sucesso', 'Viatura apagada com sucesso!');
    }
}
