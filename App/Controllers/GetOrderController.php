<?php

namespace App\Controllers;

use App\Models\Order;

class GetOrderController
{

    public function index()
{
    if(!auth()){
    return header('Location: /login');
    }

    $id = $_GET['id'];

    $user_id = auth()->user_id;

    $order = Order::get($id, $user_id);

    if(!$order){
    http_response_code(401);
    flash()->push('mensagem',['401 Não Autorizado']);
    abort(404);
    }

    view('getOrder', compact('order'));
}

    public function edit()
{
    echo "teste";
}

}