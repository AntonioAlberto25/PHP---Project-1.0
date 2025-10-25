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
                    />
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
    <?php
    // Configuração da paginação
    $itensPorPagina = 5;
    $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
    $totalItens = count($receitas);
    $totalPaginas = ceil($totalItens / $itensPorPagina);
    $offset = ($paginaAtual - 1) * $itensPorPagina;
    $receitasPaginadas = array_slice($receitas, $offset, $itensPorPagina);
    ?>

    <div class="overflow-x-auto bg-white rounded-lg shadow mt-5">
        <table class="table w-full">
            <thead>
                <tr class="border-b-2 border-gray-200">
                    <th class="bg-gray-50 text-left text-sm font-semibold text-gray-700 py-4">Nome</th>
                    <th class="bg-gray-50 text-left text-sm font-semibold text-gray-700 py-4">Descrição</th>
                    <th class="bg-gray-50 text-center text-sm font-semibold text-gray-700 py-4">Rendimento</th>
                    <th class="bg-gray-50 text-center text-sm font-semibold text-gray-700 py-4">Preço</th>
                    <th class="bg-gray-50 text-center text-sm font-semibold text-gray-700 py-4">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($receitasPaginadas as $receita): ?>
                    <tr class="border-b border-gray-100 hover:bg-gray-50 transition-colors duration-150">
                        <td class="py-4">
                            <div class="font-semibold text-gray-800">
                                <?= htmlspecialchars($receita->nome) ?>
                            </div>
                        </td>
                        <td class="py-4">
                            <div class="text-gray-600 text-sm max-w-md truncate">
                                <?= htmlspecialchars($receita->descricao) ?>
                            </div>
                        </td>
                        <td class="py-4 text-center">
                            <span class="inline-flex items-center gap-1 text-sm text-gray-600">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                                </svg>
                                <?= $receita->rendimento ?>
                            </span>
                        </td>
                        <td class="py-4 text-center">
                            <span class="font-bold text-lg text-primary">
                                R$ <?= number_format($receita->preco, 2, ',', '.') ?>
                            </span>
                        </td>
                        <td class="py-4">
                            <div class="flex items-center justify-center gap-2">
                                <a href="/receitas/visualizar?id=<?= $receita->id ?>" 
                                   class="btn btn-sm btn-ghost btn-circle" 
                                   title="Visualizar">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                </a>
                                <a href="/receitas/edit?id=<?= $receita->id ?>" 
                                   class="btn btn-sm btn-ghost btn-circle text-primary" 
                                   title="Editar">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </a>
                                <form method="POST" action="/receitas" class="inline">
                                    <input type="hidden" name="__method" value="DELETE">
                                    <input type="hidden" name="id" value="<?= $receita->id ?>">
                                    <button type="submit" 
                                            class="btn btn-sm btn-ghost btn-circle text-error" 
                                            title="Excluir"
                                            onclick="return confirm('Confirma exclusão?')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Paginação -->
    <?php if ($totalPaginas > 1): ?>
        <div class="flex items-center justify-center gap-4 mt-6 mb-8">
            <!-- Botão Anterior -->
            <?php if ($paginaAtual > 1): ?>
                <a href="?pagina=<?= $paginaAtual - 1 ?>" 
                   class="btn btn-sm btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </a>
            <?php else: ?>
                <button class="btn btn-sm btn-ghost btn-circle btn-disabled" disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
            <?php endif; ?>

            <!-- Informação da página -->
            <div class="text-sm text-gray-600 font-medium">
                Página <span class="font-bold text-primary"><?= $paginaAtual ?></span> de <span class="font-bold"><?= $totalPaginas ?></span>
            </div>

            <!-- Botão Próximo -->
            <?php if ($paginaAtual < $totalPaginas): ?>
                <a href="?pagina=<?= $paginaAtual + 1 ?>" 
                   class="btn btn-sm btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            <?php else: ?>
                <button class="btn btn-sm btn-ghost btn-circle btn-disabled" disabled>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            <?php endif; ?>
        </div>
    <?php endif; ?>
<?php endif; ?>