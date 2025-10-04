<!-- Header Section -->
<div class="mb-8 mt-5">
    <h1 class="text-2xl font-semibold text-gray-900 mb-6">Pedidos</h1>
    
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
                    class="w-full pl-10 pr-4 py-2 bg-white border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                    placeholder="Pesquisar pedidos" 
                    name="search"
                    value="<?= isset($_GET['search']) ? $_GET['search'] : '' ?>"
                />
            </div>
            <button type="submit" class="btn bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <circle cx="11" cy="11" r="8"></circle>
                    <path d="m21 21-4.3-4.3"></path>
                </svg>
            </button>
        </form>

        <!-- New Order Button -->
        <button id="openModal" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition-colors duration-200 flex items-center gap-2">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span>Novo Pedido</span>
        </button>
    </div>
</div>
</div>

<?php require '../views/pedidos/createOrder.php' ?>

<?php if (empty($orders)): ?>
    <div class="text-center py-16">
        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
        <h3 class="mt-2 text-sm font-medium text-gray-900">Nenhum pedido encontrado</h3>
        <p class="mt-1 text-sm text-gray-500">Cadastre seu primeiro pedido</p>
    </div>
<?php else: ?>

<!-- Orders Grid -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8 mt-5">
    <?php foreach ($orders as $order): ?>
    <div class="bg-white border border-gray-200 rounded-lg p-5 hover:shadow-lg transition-all duration-200">
        <!-- Header -->
        
        
        <div class="flex items-start justify-between mb-3">
        <?php if($order->status == 'pending'):?>    
        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                Pedido #<?= htmlentities($order->numero) ?>
        </span>
        <div class="w-2 h-2 bg-yellow-400 rounded-full"></div>
        <?php else: ?>
        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                Pedido #<?= htmlentities($order->numero) ?>
        </span>
        <div class="w-2 h-2 bg-green-400 rounded-full"></div>
            
        <?php endif ?>

        </div>
        
        <!-- Customer Name -->
        <h3 class="text-lg font-medium text-gray-900 mb-2">
            <?= htmlentities($order->cliente_nome) ?>
        </h3>
        
        <!-- Description -->
        <p class="text-gray-600 text-sm mb-4 line-clamp-2">
            <?= htmlentities($order->descricao) ?>
        </p>
        
        <!-- Date -->
        <div class="flex items-center text-sm text-gray-500 mb-4">
            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
            </svg>
            <span><?= htmlentities($order->data_entrega) ?></span>
        </div>
        
        <!-- Action Buttons -->
        <div class="flex items-center gap-2 pt-3 border-t border-gray-100">
            <button class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-3 py-1.5 rounded transition-colors duration-200 flex items-center gap-1" 
                    onclick="window.location.href='/pedido/editar?id=<?= $order->id ?>'">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                </svg>
                Detalhes
            </button>
            <button class="bg-green-600 hover:bg-green-700 text-white text-sm px-3 py-1.5 rounded transition-colors duration-200 flex items-center gap-1">
                <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                Finalizar
            </button>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<?php endif; ?>

<script>
    const modal = document.getElementById('myModal');
    const openBtn = document.getElementById('openModal');
    const closeBtn = document.getElementById('closeModal');

    openBtn.addEventListener('click', () => modal.showModal());
    closeBtn.addEventListener('click', () => modal.close());
    
</script>

