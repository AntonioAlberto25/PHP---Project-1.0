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

<!-- NavBar -->

<?php require base_path('/views/partials/_navbar.view.php');?>

<!-- Main Content -->
<main class="mx-auto max-w-screen-lg px-4 py-8">
    <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6">
        <?php require base_path("/views/{$view}.view.php")?>
    </div>
</main>

</body>
</html>