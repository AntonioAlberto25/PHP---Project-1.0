<?php

namespace App\Controllers;

use App\Models\User;
use Core\Database;
use Core\Validacao;

if(auth()){
    header('Location: /');
    exit();
}

class LoginController
{

    public function index()
{
    $old = $_SESSION['old'] ?? [];
    unset($_SESSION['old']);
    
    return viewRaw('login', compact('old'));
}

    public function login()
{
    $email = $_POST['email'];
    $password = $_POST['password'];
              
    $validacao = Validacao::validar([
        'email' => ['required', 'email'],
        'password' => ['required']
    ], $_POST);

    if($validacao->existsError('login'))
    {
        $_SESSION['old'] = $_POST;
        return header('location: /login'); 
    }

    $database = new Database(config('database'));

    $usuario = $database->query(   
    query: "SELECT * FROM users WHERE email = :email",   
    class: User::class,
    params: ['email' => $email,]  
    )->fetch();

    if(!$usuario || !password_verify($_POST['password'], $usuario->password))
    {
        flash()->push('validacoes_login',['login' => ['Email ou senha inválidos']]);
        return header('Location: /login');
    }
        
    $_SESSION['auth'] = $usuario;
    $_SESSION['login_time'] = time();
    setcookie('user_id', $usuario->id, time() + 7 * 24 * 60 * 60, "/");

    return header('Location: /');

}
    
}