<!DOCTYPE html>
<html lang="pt-BR" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com/3.4.4"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-4xl flex flex-col md:flex-row bg-white rounded-2xl shadow-2xl overflow-hidden">
        
        <div class="w-full md:w-1/2 p-8 md:p-12 bg-blue-600 text-white flex flex-col justify-center items-center text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
            </svg>
            <h1 class="text-3xl font-bold mb-2">Bem-vindo(a)!</h1>
            <p class="text-blue-100">Crie sua conta para melhorar sua gestão.</p>
        </div>

        <div class="w-full md:w-1/2 p-8 md:p-12">
            <h2 class="text-3xl font-bold text-gray-800 text-center mb-6">Crie sua conta</h2>

            <form id="register" class="space-y-4" method="POST" action="/register">
                <?php $validacoes = flash()->get('validacoes_register');?>

                <div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
                            </svg>
                        </span>
                        <input type="text" id="name" name="name" placeholder="Nome completo" value = "<?= htmlspecialchars($old['name'] ?? '') ?>"
                            class="input input-bordered w-full pl-10">
                    </div>
                    <?php if(isset($validacoes["name"])):?>
                    <div class="label pt-1 pb-0">
                        <span class="label-text-alt text-error text-xs"><?=$validacoes["name"][0]?></span>
                    </div>
                    <?php endif ?>
                </div>
                
                <div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                               <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" /><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                        </span>
                        <input type="text" id="email" name="email" placeholder="seu.email@exemplo.com"
                            class="input input-bordered w-full pl-10" value="<?= htmlspecialchars($old['email'] ?? '') ?>">
                    </div>
                     <?php if(isset($validacoes["email"])):?>
                    <div class="label pt-1 pb-0">
                        <span class="label-text-alt text-error text-xs"><?=$validacoes["email"][0]?></span>
                    </div>
                    <?php endif ?> 
                </div>

                <div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                               <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" /><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                        </span>
                        <input type="email" id="email_confirmation" name="email_confirmation" placeholder="Confirme seu e-mail"
                            class="input input-bordered w-full pl-10">
                    </div>
                </div>
                
                <div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                           <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                               <path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd" />
                           </svg>
                        </span>
                        <input type="password" id="password" name="password" placeholder="Senha"
                            class="input input-bordered w-full pl-10">
                    </div>
                    <?php if(isset($validacoes["password"])):?>
                    <div class="label pt-1 pb-0">
                        <span class="label-text-alt text-error text-xs"><?=$validacoes["password"][0]?></span>
                    </div>
                    <?php endif ?>
                </div>

               <button type="submit" class="btn w-full bg-blue-500">Registrar</button>
            </form>

            <p class="text-center text-sm text-gray-500 mt-6">
                Já tem uma conta? 
                <a href="/login" class="text-blue-600 font-semibold hover:underline">Fazer login</a>
            </p>
        </div>
    </div>

</body>
</html>