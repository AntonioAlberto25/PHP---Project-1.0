<?php

namespace App\Controllers\Receitas;

use Core\Database;
use Core\Validacao;

class CreateController
{
    public function index()
    {
        $old = $_SESSION['old'] ?? [];
        unset($_SESSION['old']);
    
        return view('receitas/createReceita', compact('old'));
    }
    public function create()
    {
        $validacao = Validacao::validar([
        'nome' => ['required'],
        'preco' => ['required'],
        'rendimento' => ['required']
        ], $_POST);
    
        if($validacao->existsError('create-receita')){
            $_SESSION['old'] = $_POST;
            return header('Location: /receitas/criar');
        }

        $database = new Database(config('database'));

        $user_id = auth()->id;

        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $descricao = $_POST['descricao'];
        $rendimento = $_POST['rendimento'];

        $database->query(
            query: "INSERT INTO receitas (nome, preco, descricao, rendimento, user_id) VALUES (:nome, :preco, :descricao, :rendimento, :user_id)",
            params: compact('nome', 'preco', 'descricao', 'rendimento', 'user_id')
        );

        flash()->push('mensagem', 'Pedido cadastrado com sucesso');

        return header("Location: /receitas");
        
    }

}