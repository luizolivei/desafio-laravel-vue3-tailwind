<?php

namespace App\Http\Controllers;

use App\Models\Curriculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
class CurriculoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        return Curriculo::where('user_id', Auth::id())->first();
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'cpf' => 'required|digits:11',
            'data_nascimento' => 'required|date',
            'sexo' => 'required|string|max:1',
            'estado_civil' => 'required|string|max:255',
            'pretencao_salarial' => 'required|numeric|min:0|max:999999.99',
            'experiencia_profissional' => 'nullable|array',
            'experiencia_profissional.*.empresa' => 'required_with:experiencia_profissional|string|max:255',
            'experiencia_profissional.*.data_inicio' => 'required_with:experiencia_profissional|date',
            'experiencia_profissional.*.data_fim' => 'nullable|date',
            'experiencia_profissional.*.emprego_atual' => 'nullable|boolean',
            'experiencia_profissional.*.localizacao' => 'required_with:experiencia_profissional|string|max:255',
            'experiencia_profissional.*.tipo' => 'required_with:experiencia_profissional|string|in:presencial,remoto,hibrido',
            'experiencia_profissional.*.descricao' => 'nullable|string',
            'escolaridade' => 'nullable|array',
            'escolaridade.*.escola' => 'required_with:escolaridade|string|max:255',
            'escolaridade.*.tipo' => 'required_with:escolaridade|string|max:255',
            'escolaridade.*.periodo_inicio' => 'required_with:escolaridade|date',
            'escolaridade.*.periodo_fim' => 'nullable|date',
            'escolaridade.*.estudando_atualmente' => 'nullable|boolean',
            'escolaridade.*.local' => 'required_with:escolaridade|string|max:255',
            'escolaridade.*.descricao' => 'nullable|string',
            'cursos' => 'nullable|array',
            'cursos.*.nome' => 'required_with:cursos|string|max:255',
            'cursos.*.local' => 'required_with:cursos|string|max:255',
            'cursos.*.carga_horaria' => 'required_with:cursos|integer|min:0',
            'cursos.*.descricao' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()], 422);
        }

        try {
            $curriculo = Curriculo::create([
                'user_id' => Auth::id(),
                'nome' => $request->nome,
                'email' => $request->email,
                'cpf' => $request->cpf,
                'data_nascimento' => $request->data_nascimento,
                'sexo' => $request->sexo,
                'estado_civil' => $request->estado_civil,
                'pretencao_salarial' => $request->pretencao_salarial,
            ]);

            if ($request->has('experiencia_profissional')) {
                foreach ($request->experiencia_profissional as $exp) {
                    $curriculo->experienciasProfissionais()->create($exp);
                }
            }

            if ($request->has('escolaridade')) {
                foreach ($request->escolaridade as $edu) {
                    $curriculo->escolaridades()->create($edu);
                }
            }

            if ($request->has('cursos')) {
                foreach ($request->cursos as $curso) {
                    $curriculo->cursos()->create($curso);
                }
            }

            return response()->json($curriculo->load(['experienciasProfissionais', 'escolaridades', 'cursos']), 201);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 500);
        }
    }
    public function destroy($id)
    {
        $curriculo = Curriculo::where('user_id', Auth::id())->findOrFail($id);
        $curriculo->delete();
        return response()->json(['message' => 'Removido com sucesso!']);
    }

    public function allCurriculos()
    {
        return Curriculo::all();
    }
}
