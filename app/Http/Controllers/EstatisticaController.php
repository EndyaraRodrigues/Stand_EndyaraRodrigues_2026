<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Review;
use App\Models\Venda;
use Illuminate\Support\Carbon;

class EstatisticaController extends Controller
{
    public function index()
    {
        $totalVendas      = Venda::count();
        $valorTotalVendas = Venda::sum('valor_venda');
        $totalClientes    = Cliente::count();
        $mediaReviews     = round(Review::avg('classificacao'), 1) ?? 0;
        $totalReviews     = Review::count();

        $meses = collect();
        for ($i = 5; $i >= 0; $i--) {
            $meses->push(Carbon::now()->subMonths($i)->startOfMonth());
        }

        $labelsMeses = $meses->map(fn ($m) => ucfirst($m->translatedFormat('M/Y')))->toArray();

        $vendasPorMes = $meses->map(function ($mes) {
            return Venda::whereYear('data_venda', $mes->year)
                ->whereMonth('data_venda', $mes->month)
                ->count();
        })->toArray();

        $valorPorMes = $meses->map(function ($mes) {
            return (float) Venda::whereYear('data_venda', $mes->year)
                ->whereMonth('data_venda', $mes->month)
                ->sum('valor_venda');
        })->toArray();

        $clientesPorMes = $meses->map(function ($mes) {
            return Cliente::whereYear('created_at', $mes->year)
                ->whereMonth('created_at', $mes->month)
                ->count();
        })->toArray();

        $distribuicaoReviews = [];
        for ($estrelas = 1; $estrelas <= 5; $estrelas++) {
            $distribuicaoReviews[] = Review::where('classificacao', $estrelas)->count();
        }

        $reviews = Review::latest()->take(12)->get();

        return view('estatisticas.index', compact(
            'totalVendas', 'valorTotalVendas', 'totalClientes', 'mediaReviews',
            'totalReviews', 'labelsMeses', 'vendasPorMes', 'valorPorMes',
            'clientesPorMes', 'distribuicaoReviews', 'reviews'
        ));
    }
}
