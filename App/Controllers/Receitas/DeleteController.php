<?php

namespace App\Controllers\Receitas;

use Core\Database;

class DeleteController
{
    public function __invoke()
    {
        $database = new Database(config('database'));

        $id = $_POST['id'];
        $user_id = auth()->id;
        
        $database->query(
            query: "DELETE from receitas WHERE user_id = :user_id AND id = :id",
            params: compact('user_id', 'id')
        );

        flash()->push('mensagem', 'Receita deletada com sucesso');
         
         return header("Location: /receitas");
    }
}