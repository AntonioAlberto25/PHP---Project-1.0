<?php

namespace App\Controllers\Auth;

use Core\Database;
use Core\Validacao;

class RegisterController
{

    public function index()
{
    $old = $_SESSION['old'] ?? [];
    unset($_SESSION['old']);

    return viewRaw('register', compact('old'));
}

    public function register()
{
    $validacao = Validacao::validar([
        'name' => ['required'],
        'email' => ['required', 'email', 'confirmed', 'unique:users'],
        'password' => ['required', 'min:6'],
    ], $_POST);
    
    if($validacao->existsError('register')){
        $_SESSION['old'] = $_POST;
        header('Location: /register');
        exit();
    }
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password_hash = password_hash($_POST['password'], PASSWORD_BCRYPT); 

    $database = new Database(config('database'));

    $database->query(
    
    query: "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)", 
    
    params: [
    'name' => $name,
    'email' => $email,
    'password' => $password_hash    
    ]  

    );
  
    flash()->push('mensagem', 'Registrado com sucesso');
    
    return header('Location:/login');

}

}