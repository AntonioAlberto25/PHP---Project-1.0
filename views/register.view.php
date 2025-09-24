<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen">

    <div class="w-full max-w-120 bg-white p-8 rounded-xl shadow-lg">
        <h2 class="text-3xl font-bold text-center mb-6">Registro de usuário</h2>

        <form id="register" class="space-y-4" method="POST" action="/register">
            <div>
                <label for="name" class="block text-gray-700 mb-2">Nome</label>
                <input type="text" id="name" name="name" placeholder="Digite seu nome" value = "<?= htmlspecialchars($old['name'] ?? '') ?>"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    
                    >
            </div>
            
            <div>
                <label for="email_confirmation" class="block text-gray-700 mb-2">E-mail</label>
                <input type="text" id="email_confirmation" name="email_confirmation" placeholder="Digite seu e-mail"
                    class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                    
                    >
            </div>

            <div>
                <label for="email" class="block text-gray-700 mb-2">Confirme seu email</label>
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


            <button type="submit"
                class="btn w-full bg-blue-600 text-white py-2 rounded-lg hover:bg-blue-900 transition-colors">
                Registrar
            </button>
        </form>
    </div>

    <?php if ($validacoes = flash()->get('validacoes_register')): ?>

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