<?php
http_response_code(404);
?>
<!DOCTYPE html>
<html lang="pt-BR" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Página Não Encontrada</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com/3.4.4"></script>
    
    <meta http-equiv="refresh" content="5;url=/login">
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-lg bg-white p-8 md:p-12 rounded-2xl shadow-xl text-center">
        
        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-blue-500 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>

        <h1 class="text-7xl md:text-8xl font-bold text-gray-800 mb-2">404</h1>
        <h2 class="text-2xl md:text-3xl font-semibold text-gray-700 mb-4">Página Não Encontrada</h2>
        
        <p class="text-gray-500 mb-6">
            Oops! Parece que você tentou acessar uma página que não existe ou foi movida.
        </p>

        <div class="text-sm text-gray-400" id="redirect-message">
            </div>

        <div class="mt-6">
            <a href="/login" class="text-blue-600 font-semibold hover:underline">
                Se não for redirecionado, clique aqui
            </a>
        </div>
    </div>

    <script>
        (function() {
            let countdown = 5;
            const redirectUrl = '/login';
            const messageElement = document.getElementById('redirect-message');

            const updateMessage = () => {
                if (countdown > 0) {
                    messageElement.innerHTML = `Você será redirecionado em <strong>${countdown}</strong> segundos...`;
                } else {
                    messageElement.innerHTML = 'Redirecionando agora...';
                }
            };

            updateMessage(); // Exibe a mensagem inicial imediatamente

            const interval = setInterval(() => {
                countdown--;
                updateMessage();
                if (countdown < 0) {
                    clearInterval(interval);
                    window.location.href = redirectUrl;
                }
            }, 1000);
        })();
    </script>

</body>
</html>
