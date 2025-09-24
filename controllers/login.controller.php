<?php

if(auth()){
    header('Location: /');
    exit();
}


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $email = $_POST['email'];
    $password = $_POST['password'];
              
    $validacao = Validacao::validar([
        'email' => ['required', 'email'],
        'password' => ['required']
    ], $_POST);

    if($validacao->existsError('login')){
        header('location: /login');
        exit();
    }

    $usuario = $database->query(   
    query: "SELECT * FROM users WHERE email = :email",   
    class: User::class,
    params: ['email' => $email,]  
    )->fetch();

        if(!$usuario || !password_verify($_POST['password'], $usuario->password)){
            flash()->push('validacoes_login',['Email ou senha inválidos']);

            header('Location: /login');
            exit();
        }
        
        $_SESSION['auth'] = $usuario;
        $_SESSION['login_time'] = time();

        setcookie('user_id', $usuario->id, time() + 7 * 24 * 60 * 60, "/");

        header('Location: /');
        exit();

}

viewRaw('login');