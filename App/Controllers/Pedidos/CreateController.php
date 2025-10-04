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

        $user_id = auth()->id;
        $cliente_nome = formatName($_POST['nome']);
        $descricao = $_POST['descricao'];
        $tipo_entrega = $_POST['tipo_entrega'];
        $preco_total = $_POST['preco_total'];
        $data_entrega = $_POST['data_entrega'];

        $database->query(
            query: "INSERT INTO orders (cliente_nome, descricao, tipo_entrega, preco_total, data_entrega, user_id) VALUES (:cliente_nome, :descricao,:tipo_entrega, :preco_total, :data_entrega, :user_id)",
            params: compact('cliente_nome', 'descricao', 'tipo_entrega', 'preco_total', 'data_entrega','user_id')
        );

        flash()->push('mensagem', 'Pedido cadastrado com sucesso');

        return header("Location: /pedidos");
        
    }

}