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
      overflow-y: scroll; /* força sempre mostrar a barra de rolagem */
    }
  </style>
</head>
<body class="">
<header class=""> 
    <div class="navbar bg-base-100 shadow-sm space-x-10 justify-center">
        <a href="/revenues" class="btn btn-ghost text-xl">Receitas</a>
        <a href="/inputs" class="btn btn-ghost text-xl">Insumos</a>
        <a href="/" class="btn btn-ghost text-xl">Vendas e Pedidos</a>

        <?php if (auth()):?>

           <a href="/logout" class="btn btn-ghost text-xl">Logout</a>

        <?php endif; ?>
    </div>
</header> 

<main class="mx-auto max-w-screen-lg">
    <?php require "../views/{$view}.view.php"?>
</main>

</body>
</html>