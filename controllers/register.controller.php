<?php

if(auth()){
    header('Location: /');
    exit();
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $validacao = Validacao::validar([
        'name' => ['required'],
        'email' => ['required', 'email', 'confirmed', 'unique:users'],
        'password' => ['required', 'min:6'],
    ], $_POST);
    
    if($validacao->existsError('register')){
        $_SESSION['old'] = $_POST;
        header('location: /register');
        exit();
    }
    
    $name = $_POST['name'];
    $email = $_POST['email'];
    $email_confirmation = $_POST['email_confirmation'];
    $password_hash = password_hash($_POST['password'], PASSWORD_BCRYPT);    
    
    $database->query(
    
    query: "INSERT INTO users (name, email, password) VALUES (:name, :email, :password)", 
    
    params: [
    'name' => $name,
    'email' => $email,
    'password' => $password_hash    
    ]  

    );

    
    flash()->push('mensagem', 'Registrado com sucesso');
    
    header('Location:/login');

    exit();
}

$old = $_SESSION['old'] ?? [];

viewRaw('register', compact('old'));

unset($_SESSION['old']);