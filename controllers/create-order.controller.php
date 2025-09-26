<?php

use Core\Database;
use Core\Validacao;
use App\Models\Order;


if($_SERVER['REQUEST_METHOD'] != 'POST'){
    header('Location: /');
    exit();
}

$database = new Database(config('database'));

$validacao = Validacao::validar([
        'nome' => ['required'],
        'data_entrega' => ['required'],
    ], $_POST);
    
    if($validacao->existsError('create-order')){
        $_SESSION['old'] = $_POST;
        header('Location: /');
        exit();
    }


    $user_id = auth()->user_id;
    $name = $_POST['nome'];
    $description = $_POST['descricao'];
    $date_entrega = $_POST['data_entrega'];

    $database->query(
        query: "INSERT INTO orders (name, description, date_entrega, user_id) VALUES (:name, :description, :date_entrega, :user_id)",
        params: compact('name', 'description', 'date_entrega', 'user_id')
        );

    flash()->push('mensagem', 'Pedido cadastrado com sucesso');
    header("Location: /");
    exit();