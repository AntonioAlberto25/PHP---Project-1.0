<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Bolo</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        html {
            overflow-y: scroll;
        }
    </style>
</head>
<body class="bg-blue-100 min-h-screen">

<!-- Header -->
<header class="bg-white shadow-sm border-b border-gray-200">
    <div class="navbar max-w-screen-lg mx-auto">
        <!-- Logo/Brand -->
        <div class="navbar-start">
            <a href="/" class="btn btn-ghost text-xl font-semibold">
                🍰 Projeto Bolo
            </a>
        </div>
        
        <!-- Navigation -->
        <div class="navbar-center">
            <div class="flex gap-2">
                <a href="/revenues" class="btn <?= $_SERVER['REQUEST_URI'] == '/revenues' ? : 'btn-ghost hover:btn-primary' ?> transition-colors">
                    Receitas
                </a>
                <a href="/" class="btn <?= $_SERVER['REQUEST_URI'] == '/' ? : 'btn-ghost hover:btn-primary' ?> transition-colors">
                    Pedidos
                </a>
            </div>
        </div>
        
        <!-- User Actions -->
        <div class="navbar-end">
            <a href="/logout" class="btn btn-outline btn-sm">
                Logout
            </a>
        </div>
    </div>
</header>

<!-- Main Content -->
<main class="mx-auto max-w-screen-lg px-4 py-8">
    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6">
        <?php require "../views/{$view}.view.php"?>
    </div>
</main>

</body>
</html>