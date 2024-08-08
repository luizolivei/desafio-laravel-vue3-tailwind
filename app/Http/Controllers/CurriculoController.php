<?php

namespace App\Http\Controllers;

use App\Models\Curriculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CurriculoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        return Curriculo::where('user_id', Auth::id())->get();
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'descricao' => 'required|string',
        ]);

        return Curriculo::create([
            'user_id' => Auth::id(),
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
        ]);
    }

    public function destroy($id)
    {
        $curriculo = Curriculo::where('user_id', Auth::id())->findOrFail($id);
        $curriculo->delete();
        return response()->noContent();
    }

    public function allCurriculos()
    {
        return Curriculo::all();
    }
}
