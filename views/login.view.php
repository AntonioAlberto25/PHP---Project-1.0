<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-120 bg-white p-8 rounded-xl shadow-lg">
        <h2 class="text-3xl font-bold text-center mb-6">Login</h2>

        <form id="login" class="space-y-4" method="POST" action="/login">
            <div>
                <label for="email" class="block text-gray-700 mb-2">E-mail</label>
                <input type="text" id="email" name="email" placeholder="Digite seu e-mail"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
            </div>

            <div>
                <label for="password" class="block text-gray-700 mb-2">Senha</label>
                <input type="password" id="password" name="password" placeholder="Digite sua senha"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    >
            </div>

            <p id="error-message" class="text-red-500 text-sm text-center"></p>

            <button type="submit"
                class="btn w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-900 transition-colors">
                Entrar
            </button>

            <?php if ($mensagem = flash()->get('mensagem')): ?>
                <div class="mb-4 p-4 text-green-800 bg-green-100 border border-green-300 rounded-lg text-center">
                    <?= htmlentities($mensagem) ?>
                </div>
            <?php endif; ?>
        </form>
    </div>

     <?php if ($validacoes = flash()->get('validacoes_login')): ?>

                <div class="border-red-800 bg-red-900 text-red-400 px-4 py-1 rounded-md border-2 text-sm font-bold">

                    <ul>

                        <li>Deu ruim!!</li>

                        <?php foreach ($validacoes as $validacao): ?>

                            <li><?= $validacao ?></li>

                        <?php endforeach; ?>

                    </ul>

                </div>

    <?php endif; ?>
</body>

</html>