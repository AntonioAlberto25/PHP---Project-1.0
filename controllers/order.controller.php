<?php

use Core\Database;
use Core\Validacao;
use App\Models\Order;

if(!auth()){
    header('Location: /login');
    exit();
}

$id = $_GET['id'];

$user_id = auth()->user_id;

$order = Order::get($id, $user_id);

if(!$order){
    http_response_code(401);
    flash()->push('mensagem',['401 Não Autorizado']);
    header('Location: /404');
}

view('order', compact('order'));


