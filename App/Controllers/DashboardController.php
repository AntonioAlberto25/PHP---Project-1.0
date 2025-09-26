<?php

namespace App\Controllers;

use App\Models\Order;

if(!auth()){
    header('Location: /login');
    exit();
}

class DashboardController
{
    public function __invoke()
    {
        $user_id = auth()->user_id;

        $search = $_REQUEST['search'] ?? '';

        $orders = Order::all($search, $user_id);

        foreach ($orders as $i => $order){
            $order->numero = $i + 1;
        };
        
        
        return view('dashboard', compact('orders'));
    }
}