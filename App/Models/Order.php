<?php

namespace App\Models;

use Core\Database;

class Order {
    public $id;
    public $name;
    public $description;
    public $creation_date;
    public $finish_date;
    public $status;


    public function query($where, $params)
    {
       $database = new Database(config('database'));

       return $database->query(
        query: "SELECT id, name, description, date_entrega, status 
        FROM orders where $where",
        class: self::class,
        params: $params
       );

    }
    
    
    public static function all($filter = '', $user_id)
    {
        return (new self)->query(
        'name LIKE :filter AND user_id = :user_id', ['filter' => "%$filter%", 'user_id' => $user_id]
        )->fetchAll();
    }

    public static function get($id, $user_id)
    {
        return (new self)->query(
        'id = :id AND user_id = :user_id', ['id' => $id, 'user_id' => $user_id]
        )->fetch();
    }
}