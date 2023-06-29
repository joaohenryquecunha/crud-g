<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function getAll()
    {
        $users = Users::all();
        return response()->json($users);
    }

    public function get($id)
    {
        $user = Users::find($id);
        if (!$user) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }
        return response()->json($user);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nome' => 'required',
            'endereco' => 'required',
            'idade' => 'required|numeric',
            'telefone' => 'required',
        ]);

        $user = new Users();
        $user->nome = $request->input('nome');
        $user->endereco = $request->input('endereco');
        $user->idade = $request->input('idade');
        $user->telefone = $request->input('telefone');
        $user->save();

        return response()->json($user, 201);
    }

    public function update(Request $request, $id)
    {
        $user = Users::find($id);
        if (!$user) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        $this->validate($request, [
            'nome' => 'required',
            'endereco' => 'required',
            'idade' => 'required|numeric',
            'telefone' => 'required',
        ]);

        $user->nome = $request->input('nome');
        $user->endereco = $request->input('endereco');
        $user->idade = $request->input('idade');
        $user->telefone = $request->input('telefone');
        $user->save();

        return response()->json($user);
    }

    public function destroy($id)
    {
        $user = Users::find($id);
        if (!$user) {
            return response()->json(['message' => 'Usuário não encontrado'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Usuário removido com sucesso']);
    }
}
