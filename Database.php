<?php

try {
    //code...
} catch (\Throwable $th) {
    //throw $th;
};


class Database
{
    private $db;
    
    
    
    public function __construct($config)
    {
        try {
            $this->db = new PDO($this->getDsn($config));
        } catch (PDOException $e) {
            die("Erro na conexão:" . $e->getMessage());
        }
        
    }
     
    public function getDsn($config){
        
        $driver = $config['driver'];

        $dsn = $driver . ':' .  http_build_query($config, '', ';');
        
        return $dsn;
    }

    public function query($query, $class = null, $params = []){
        
        $prepare = $this->db->prepare($query);

        if($class){
            $prepare->setFetchMode(PDO::FETCH_CLASS, $class);
        }
        
        $prepare->execute($params);

        return $prepare;
                
    }    
    
}

$database = new Database(config('database'));