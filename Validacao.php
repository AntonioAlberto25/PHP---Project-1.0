<?php

class Validacao
{

    public $validacoes = [];

    public static function validar($rules, $data)
    {

        $validacao = new self;

        foreach ($rules as $campo => $rulesCampo) {
            foreach ($rulesCampo as $rule) {

                $valueCampo = $data[$campo];

                if($rule == 'confirmed')
                    {
                    $validacao->$rule($campo, $valueCampo, $data["{$campo}_confirmation"]);
                    }
                    
                    else if (str_contains($rule, ':')){
                  
                        $temp = explode(':', $rule);
                        $rule = $temp[0];
                        $paramRule = $temp[1];

                        $validacao->$rule($paramRule, $campo, $valueCampo);
                   
                }
                               
                else{
                    $validacao->$rule($campo, $valueCampo);
                }
            }
        }

        return $validacao;
    }

    private function unique($table, $campo, $value)
    {
        $db = new Database(config('database'));

        $result = $db->query
        (
        query:"SELECT $campo from $table where $campo = :value" ,
        params: ['value' => $value]
        )->fetch();

        if($result){
            $this->validacoes[] = "O $campo já existe";
        }
    }
    
    
    
    private function required($campo,$value)
    {

        if (strlen($value) == 0) {
            $this->validacoes[] = "O $campo é obrigatório";
        }

    }

    
    private function email($campo,$value)
    {
        if (! filter_var($value, FILTER_VALIDATE_EMAIL)) {
        $this->validacoes[] = "O $campo é inválido";
        }
    }

    
    private function confirmed($campo, $value, $campoConfirmacao) {
        
        if ($value != $campoConfirmacao) {
         $this->validacoes[] = "O $campo de confirmação está diferente";
    }
    }
    
    
    private function min($min, $campo, $value){
        if(strlen($value) < $min){
            $this->validacoes[] = "O $campo deve conter no minimo $min caracteres";
        }
    }
    
    public function login($usuario,$email,$password){
        
        if(empty($email) || empty($password)){
            $this->validacoes[] = "Email ou senha invalidos";
            return;
        }
        
        if(!$usuario){
            $this->validacoes[] = "Email ou senha invalidos";
        }
    }
    
    public function existsError($customName = null){

        $key = 'validacoes';

        if($customName){
            $key .= '_' . $customName;
        }
        
        flash()->push($key, $this->validacoes);

        return sizeof($this->validacoes) > 0;
    }
 
}
