<?php

namespace App\Controllers\Pedidos;

use App\Models\Order;

class EditController
{

    public function index()
{

    $id = $_GET['id'];

    $user_id = auth()->user_id;

    $order = Order::get($id, $user_id);

    if(!$order){
    abort(401);
    }

    view('pedidos/editOrder', compact('order'));
}

    public function edit()
{
    echo "teste";
}

}