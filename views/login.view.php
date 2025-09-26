<?php $validacoes = flash()->get('validacoes_login');?>

<!DOCTYPE html>
<html lang="pt-BR" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.12.10/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com/3.4.4"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-4xl flex flex-col md:flex-row bg-white rounded-2xl shadow-2xl overflow-hidden">
        
        <div class="w-full md:w-1/2 p-8 md:p-12 bg-blue-600 text-white flex flex-col justify-center items-center text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1" />
            </svg>
            <h1 class="text-3xl font-bold mb-2">Bem-vindo(a) de volta!</h1>
            <p class="text-blue-100">Acesse sua conta para continuar de onde parou.</p>
        </div>

        <div class="w-full md:w-1/2 p-8 md:p-12">
        
        <?php if($mensagem = flash()->get('mensagem')) :?>   
        <div role="alert" class="alert alert-success shadow-lg mb-6">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
        </svg>
        <span class="font-medium"><?=$mensagem?></span>
        </div>
        <?php endif ?>
        
        
        <h2 class="text-3xl font-bold text-gray-800 text-center mb-6">Acesse sua conta</h2>

           <form id="login" class="space-y-4" method="POST" action="/login">          
                <div>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                            <svg class="h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                               <path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" /><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
                            </svg>
                        </span>
                    <input type="text" id="email" name="email" placeholder="seu.email@exemplo.com" value= "<?= htmlspecialchars($old['email'] ?? '') ?>"
                            class="input input-bordered w-full pl-10">
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

                 <button type="submit" class="btn w-full bg-blue-500">Entrar</button>
                <?php if(isset($validacoes["login"])):?>
                    <div class="text-center pt-2">
                        <span class="text-error text-sm font-medium"><?=$validacoes["login"][0]?></span>
                    </div>
                <?php endif ?>
                </form>
            </form>

            <p class="text-center text-sm text-gray-500 mt-6">
                Não tem uma conta? 
                <a href="/register" class="text-blue-600 font-semibold hover:underline">Crie uma</a>
            </p>
        </div>
    </div>

</body>
</html>