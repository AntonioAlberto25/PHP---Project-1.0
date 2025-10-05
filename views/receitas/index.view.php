<div class="mb-8 mt-5">
    <h1 class="text-2xl font-semibold text-gray-900 mb-6">Receitas</h1>

    <!-- Search and New Order -->
    <div class="flex flex-col sm:flex-row gap-4 items-start sm:items-center justify-between">
        <!-- Search Form -->
        <form class="flex items-center gap-3 flex-1 max-w-md" method="GET">
            <div class="relative flex-1">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-4 h-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="m21 21-4.3-4.3"></path>
                    </svg>
                </div>
                <input
                    type="text"
                    class="w-full pl-10 pr-4 py-2 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                    placeholder="Pesquisar receitas"
                    name="search"
                    value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>" />
            </div>
            <button type="submit" class="btn bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </svg>
            </button>
        </form>

        <a href="/receitas/criar" class="bg-purple-600 hover:bg-purple-700 text-white px-4 py-2 rounded-md transition-colors duration-200 flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            Nova Receita
        </a>

    </div>
</div>
</div>

<?php if (empty($receitas)): ?>
    <div class="text-center py-16">
        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
        </svg>
        <h3 class="mt-2 text-sm font-medium text-gray-900">Nenhuma receita encontrada</h3>
        <p class="mt-1 text-sm text-gray-500">Comece cadastrando sua primeira receita.</p>
    </div>
<?php else: ?>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8 mt-5">
        <?php foreach ($receitas as $receita): ?>
            <div class="card bg-base-100 shadow-md hover:shadow-xl transition-all duration-300 border border-gray-200 overflow-hidden">
                <div class="card-body p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h2 class="card-title text-xl font-bold text-gray-800 flex-1">
                            <?= htmlspecialchars($receita->nome) ?>
                        </h2>
                        <div class="text-right">
                            <p class="text-2xl font-bold text-primary">
                                R$ <?= number_format($receita->preco, 2, ',', '.') ?>
                            </p>
                            <p class="text-xs text-gray-500">👥 Rendimento <?= $receita->rendimento ?></p>
                        </div>
                    </div>

                    <p class="text-gray-600 mb-4 h-12 line-clamp-2">
                        <?= htmlspecialchars($receita->descricao) ?>
                    </p>

                    <div class="card-actions justify-end gap-2 pt-4 border-t border-gray-200">

                        <a href="/receitas/visualizar?id=<?= $receita->id ?>" class="btn btn-sm btn-ghost">
                            Detalhes
                        </a>
                        <a href="/receitas/edit?id=<?= $receita->id ?>" class="btn btn-sm btn-outline btn-primary">
                            Editar
                        </a>
                        <form method="POST" action="/receitas" class="inline">
                            <input type="hidden" name="__method" value="DELETE">
                            <input type="hidden" name="id" value="<?= $receita->id ?>">
                            <button type="submit" class="btn btn-sm btn-error btn-outline" onclick="return confirm('Confirma exclusão?')">
                                Excluir
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>