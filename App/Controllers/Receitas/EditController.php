<?php

namespace App\Controllers\Receitas;

use App\Models\Receitas;

class EditController
{

    public function index()
{

    $id = $_GET['id'];

    $user_id = auth()->id;

    $receitas = Receitas::get($id, $user_id);

    if(!$receitas){
    abort(401);
    }

    view('pedidos/editReceita', compact('receitas'));
}

    public function edit()
{
    echo "teste";
}

}