<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto Bolo</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            overflow: hidden;
        }

        .nav-link-active {
            background-color: #EFF6FF;
            color: #2563EB;
            border-left: 3px solid #2563EB;
        }

        .nav-link:hover {
            background-color: #F9FAFB;
        }

        .main-content {
            height: 100vh;
            overflow-y: auto;
        }
    </style>
</head>

<body class="bg-gray-50">
    <div class="flex h-screen overflow-hidden">
        <?php require base_path("/views/partials/_navbar.view.php") ?>
        <!-- Main Content -->
        <main class="flex-1 main-content bg-gray-50">
            <!-- Content Area -->
            <div class="p-6">
                <div class="bg-white rounded-lg shadow-sm border border-gray-100 p-6">
                    <?php require base_path("/views/{$view}.view.php") ?>
                </div>
            </div>
        </main>
    </div>
</body>

</html>