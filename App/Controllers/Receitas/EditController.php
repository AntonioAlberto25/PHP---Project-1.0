<?php

namespace App\Controllers\Receitas;

use App\Models\Receitas;
use Core\Database;
use Core\Validacao;

class EditController
{

    public function index()
{

    $id = $_GET['id'];

    $user_id = auth()->id;

    $receita = Receitas::get($id, $user_id);

    if(!$receita){
    abort(404);
    }

    view('receitas/editReceita', compact('receita'));
}

    public function edit()
{
     $id = $_POST['id'];
     $user_id = auth()->id;

     if(!$id){
        abort(404);
     }
    
    $validacao = Validacao::validar([
        'nome' => ['required'],
        'preco' => ['required'],
        'rendimento' => ['required']
        ], $_POST);
    
        if($validacao->existsError('edit-receita')){
            $_SESSION['old'] = $_POST;
            return header("Location: /receitas/edit?id=$id");
        }

    $database = new Database(config('database'));

    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $descricao = $_POST['descricao'];
    $rendimento = $_POST['rendimento'];
    

    $database->query(
            query: "UPDATE receitas SET nome = :nome, preco = :preco, descricao = :descricao , rendimento = :rendimento
                    WHERE id = :id AND user_id = :user_id",
            params: compact('nome', 'preco', 'descricao', 'rendimento', 'user_id', 'id')
        );

        flash()->push('mensagem', 'Receita atualizado com sucesso');

        return header("Location: /receitas");
}

}