<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
    <!-- Card 1 - Total de Pedidos -->
    <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-lg transition-all duration-200">
        <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
            </div>
            <span class="text-xs text-green-600 font-medium">+12%</span>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mb-1">
            <?= $totalPedidos ?? '0' ?>
        </h3>
        <p class="text-sm text-gray-500">Total de Pedidos</p>
    </div>
    
    <!-- Card 2 - Pedidos Concluídos -->
    <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-lg transition-all duration-200">
        <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-green-100 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <span class="text-xs text-green-600 font-medium">+8%</span>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mb-1">
            <?= $pedidosConcluidos ?? '0' ?>
        </h3>
        <p class="text-sm text-gray-500">Pedidos Concluídos</p>
    </div>
    
    <!-- Card 3 - Em Andamento -->
    <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-lg transition-all duration-200">
        <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-yellow-100 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <span class="text-xs text-yellow-600 font-medium">+5%</span>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mb-1">
            <?= $pedidosAndamento ?? '0' ?>
        </h3>
        <p class="text-sm text-gray-500">Em Andamento</p>
    </div>
    
    <!-- Card 4 - Total de Clientes -->
    <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-lg transition-all duration-200">
        <div class="flex items-center justify-between mb-3">
            <div class="w-10 h-10 bg-purple-100 rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
            <span class="text-xs text-green-600 font-medium">+15%</span>
        </div>
        <h3 class="text-2xl font-bold text-gray-900 mb-1">
            <?= $totalClientes ?? '0' ?>
        </h3>
        <p class="text-sm text-gray-500">Total de Clientes</p>
    </div>
</div>

<!-- Quick Actions -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
    <a href="/pedidos/novo" class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-lg hover:border-blue-300 transition-all duration-200 group">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center group-hover:bg-blue-600 transition-colors">
                <svg class="w-6 h-6 text-blue-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-gray-900 mb-1">Novo Pedido</h3>
                <p class="text-sm text-gray-500">Criar pedido rápido</p>
            </div>
        </div>
    </a>
    
    <a href="/pedidos" class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-lg hover:border-green-300 transition-all duration-200 group">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center group-hover:bg-green-600 transition-colors">
                <svg class="w-6 h-6 text-green-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-gray-900 mb-1">Ver Pedidos</h3>
                <p class="text-sm text-gray-500">Lista completa</p>
            </div>
        </div>
    </a>
    
    <a href="/relatorios" class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-lg hover:border-purple-300 transition-all duration-200 group">
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center group-hover:bg-purple-600 transition-colors">
                <svg class="w-6 h-6 text-purple-600 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                </svg>
            </div>
            <div>
                <h3 class="font-semibold text-gray-900 mb-1">Relatórios</h3>
                <p class="text-sm text-gray-500">Ver estatísticas</p>
            </div>
        </div>
    </a>
</div>

<!-- Recent Orders Table -->
<div class="bg-white border border-gray-200 rounded-lg overflow-hidden">
    <div class="px-6 py-4 border-b border-gray-200 flex items-center justify-between">
        <h2 class="text-lg font-semibold text-gray-900">Pedidos Recentes</h2>
        <a href="/pedidos" class="text-sm text-blue-600 hover:text-blue-700 font-medium">Ver todos</a>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Cliente</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Descrição</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-100">
                <?php if (!empty($pedidosRecentes)): ?>
                    <?php foreach ($pedidosRecentes as $pedido): ?>
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                #<?= htmlentities($pedido->id) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                <?= htmlentities($pedido->name) ?>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                <div class="max-w-xs truncate">
                                    <?= htmlentities($pedido->description) ?>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                <?= htmlentities($pedido->creation_date) ?>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <?php 
                                $statusClass = 'bg-gray-100 text-gray-800';
                                $statusText = 'Novo';
                                
                                if (isset($pedido->status)) {
                                    switch($pedido->status) {
                                        case 'concluido':
                                            $statusClass = 'bg-green-100 text-green-800';
                                            $statusText = 'Concluído';
                                            break;
                                        case 'andamento':
                                            $statusClass = 'bg-yellow-100 text-yellow-800';
                                            $statusText = 'Em andamento';
                                            break;
                                        case 'cancelado':
                                            $statusClass = 'bg-red-100 text-red-800';
                                            $statusText = 'Cancelado';
                                            break;
                                        default:
                                            $statusClass = 'bg-blue-100 text-blue-800';
                                            $statusText = 'Novo';
                                    }
                                }
                                ?>
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium <?= $statusClass ?>">
                                    <?= $statusText ?>
                                </span>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm">
                                <a href="/order?id=<?= $pedido->id ?>" class="text-blue-600 hover:text-blue-700 font-medium">
                                    Ver detalhes
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <div class="flex flex-col items-center justify-center">
                                <svg class="w-12 h-12 text-gray-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                <p class="text-gray-500 mb-2">Nenhum pedido encontrado</p>
                                <a href="/pedidos/novo" class="text-sm text-blue-600 hover:text-blue-700 font-medium">
                                    Criar primeiro pedido
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<style>
.line-clamp-2 {
    display: -webkit-box;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>