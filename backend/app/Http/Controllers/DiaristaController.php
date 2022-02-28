<?php

namespace App\Http\Controllers;

use App\Models\Diarista;
use Illuminate\Http\Request;

class DiaristaController extends Controller
{
    public function index()
    {
        $diaristas = Diarista::get();

        return view('index', [
            'diaristas' => $diaristas
        ]);
    }

    public function create()
    {
        return view('create');
    }

    /**
     * Cria as diaristas no banco de dados
     */
    public function store(Request $request)
    {
        $dados = $request->except('_token');
        $dados['foto_usuario'] = $request->foto_usuario->store('public');

        $dados['cpf'] = str_replace(['.', '-'], '', $dados['cpf']);
        $dados['cep'] = str_replace('-', '', $dados['cep']);
        $dados['telefone'] = str_replace(['(', ')', ' ', '-'], '', $dados['telefone']);

        Diarista::create($dados);

        return redirect()->route('diaristas.index');
    }

    /**
     * Mostra o formulário para poder editar as diaristas
     */
    public function edit(int $id)
    {
        $diarista = Diarista::findOrFail($id);

        return view('edit', [
            'diarista' => $diarista
        ]);
    }

    /**
     * Atualiza o registro da diarista no banco de dados
     */
    public function update(int $id, Request $request)
    {
        $diarista = Diarista::findOrFail($id);

        $dados = $request->except('_token', '_method');

        if ($request->hasFile('foto_usuario')) {
            $dados['foto_usuario']  = $request->foto_usuario->store('public');
        }

        $dados['cpf'] = str_replace(['.', '-'], '', $dados['cpf']);
        $dados['cep'] = str_replace('-', '', $dados['cep']);
        $dados['telefone'] = str_replace(['(', ')', ' ', '-'], '', $dados['telefone']);

        $diarista->update($dados);

        return redirect()->route('diaristas.index');
    }

    /**
     * Remove o registro da diarista no banco de dados
     */
    public function destroy(int $id)
    {
        $diarista = Diarista::findOrFail($id);

        $diarista->delete($id);

        return redirect()->route('diaristas.index');
    }
}
