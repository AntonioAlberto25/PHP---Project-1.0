<?php

class Database
{
    private $db;

    public function __construct($config)
    {

        $this->db = new PDO($this->getDsn($config));
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