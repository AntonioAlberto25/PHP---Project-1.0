<?php

if(!auth()){
    header('Location: /login');
    exit();
}

$user_id = auth()->user_id;

$search = $_REQUEST['search'] ?? '';

$orders = Order::all($search, $user_id);

   
view('dashboard', compact('orders'));