<?php

namespace App\Controllers\Pedidos;

use App\Models\Order;

class IndexController
{
    public function __invoke()
    {
        $user_id = auth()->id;

        if (isset($_GET['search']) && trim($_GET['search']) === '') {
        header('Location: /pedidos');
        exit;
        }

        $search = isset($_REQUEST['search']) ? $_REQUEST['search'] : null;

        $orders = Order::all($search, $user_id);

        foreach ($orders as $i => $order){
            $order->numero = $i + 1;
        };
         
        return view('/pedidos/index', compact('orders'));
    }
}