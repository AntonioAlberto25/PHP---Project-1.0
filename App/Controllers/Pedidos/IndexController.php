<?php

namespace App\Controllers\Pedidos;

use App\Models\Order;

class IndexController
{
    public function __invoke()
    {
        $user_id = auth()->user_id;

        $search = $_REQUEST['search'] ?? '';

        $orders = Order::all($search, $user_id);

        foreach ($orders as $i => $order){
            $order->numero = $i + 1;
        };
         
        return view('/pedidos/index', compact('orders'));
    }
}