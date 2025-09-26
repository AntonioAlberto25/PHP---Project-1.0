<?php

namespace App\Controllers\Pedidos;

use Core\Database;
use Core\Validacao;

class CreateController
{

    public function __invoke()
    {
        $validacao = Validacao::validar([
        'nome' => ['required'],
        'data_entrega' => ['required'],
        'descricao' => ['required']
        ], $_POST);
    
        if($validacao->existsError('create-order')){
            $_SESSION['old'] = $_POST;
            return header('Location: /pedidos');
        }

        $database = new Database(config('database'));

        $user_id = auth()->user_id;
        $name = $_POST['nome'];
        $description = $_POST['descricao'];
        $date_entrega = $_POST['data_entrega'];

        $database->query(
            query: "INSERT INTO orders (name, description, date_entrega, user_id) VALUES (:name, :description, :date_entrega, :user_id)",
            params: compact('name', 'description', 'date_entrega', 'user_id')
        );

        flash()->push('mensagem', 'Pedido cadastrado com sucesso');

        return header("Location: /pedidos");
        
    }

}