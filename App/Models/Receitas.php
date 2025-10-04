<?php

namespace App\Models;

use Core\Database;

class Receitas {
    public $id;
    public $nome;
    public $preco;
    public $data_criacao;

    public function querySelect($where, $params)
    {
       $database = new Database(config('database'));

       return $database->query(
        query: "SELECT * FROM receitas where $where",
        class: self::class,
        params: $params
       );

    }
    
    public static function all($filter = null, $user_id)
    {
        return (new self)->querySelect(
        'nome LIKE :filter AND user_id = :user_id', ['filter' => "%$filter%", 'user_id' => $user_id]
        )->fetchAll();
    }

    public static function get($id, $user_id)
    {
        return (new self)->querySelect(
        'id = :id AND user_id = :user_id', ['id' => $id, 'user_id' => $user_id]
        )->fetch();
    }
}