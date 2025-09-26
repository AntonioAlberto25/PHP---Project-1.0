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
                <a href="/receitas" class="btn <?= $_SERVER['REQUEST_URI'] == '/revenues' ? : 'btn-ghost hover:btn-primary' ?> transition-colors">
                    Receitas
                </a>
                <a href="/pedidos" class="btn <?= $_SERVER['REQUEST_URI'] == '/pedidos' ? : 'btn-ghost hover:btn-primary' ?> transition-colors">
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