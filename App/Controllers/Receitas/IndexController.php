<?php

namespace App\Controllers\Receitas;

use App\Models\Receitas;

class IndexController
{
    public function __invoke()
    {
        $user_id = auth()->id;

        if (isset($_GET['search']) && trim($_GET['search']) === '') {
        header('Location: /receitas');
        exit;
        }

        $search = isset($_REQUEST['search']) ? $_REQUEST['search'] : null;     

        $receitas = Receitas::all($search, $user_id);

        foreach ($receitas as $i => $receita){
            $receita->numero = $i + 1;
        };
         
        return view('/receitas/index', compact('receitas'));
    }
}