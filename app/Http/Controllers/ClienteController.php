<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function create()
    {
        return view('cliente.cadastrar');
    }


    function store(Request $request)
    {
        Cliente::create($request->all());

        return redirect()->route('cliente.view-listar')->with('success', 'Cadastro realizado com sucesso');
    }

    public function list()
    {
        $cliente = Cliente::get();
        return view('cliente.listar', [
            'cliente' => $cliente,
        ]);
    } 

    public function edit(Cliente $cliente)
    {
        return view('cliente.editar', [
            'cliente' => $cliente,
        ]);
    }


    public function update(Request $request, Cliente $cliente)
    {
        $cliente->update($request->all());

        return redirect()->route('cliente.view-listar')->with('success', 'Informações atualizadas com sucesso!');
    }

    
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('cliente.view-listar')->with('success', 'Cliente excluído com sucesso!');
    }
}


