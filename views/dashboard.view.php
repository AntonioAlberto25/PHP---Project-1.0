<form class="w-full flex items-center gap-4 mt-5" method="GET">

    <div class="relative flex-1 group">
        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
            <svg class="w-5 h-5 text-gray-400 group-focus-within:text-purple-500 transition-colors duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <circle cx="11" cy="11" r="8"></circle>
                <path d="m21 21-4.3-4.3"></path>
            </svg>
        </div>
        <input 
            type="text" 
            class="w-full pl-12 pr-4 py-3 bg-white border-2 border-gray-200 rounded-2xl focus:border-purple-500 focus:ring-2 focus:ring-purple-200 outline-none transition-all duration-300 group-hover:border-gray-300 shadow-lg" 
            placeholder="Pesquisar pedidos" 
            name="search"
        />
        <div class="absolute inset-y-0 right-0 pr-4 flex items-center">
            <div class="w-2 h-2 bg-purple-400 rounded-full opacity-0 group-focus-within:opacity-100 transition-opacity duration-300"></div>
        </div>
    </div>
    
    <button type="submit" class="cursor-pointer group relative overflow-hidden bg-gradient-to-r from-purple-500 to-pink-500 text-white p-3 rounded-2xl hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl tooltip" data-tip="Pesquisar">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <circle cx="11" cy="11" r="8"></circle>
            <path d="m21 21-4.3-4.3"></path>
        </svg>
        <div class="absolute inset-0 bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:translate-x-full transition-transform duration-700"></div>
    </button>

</form>


<button id="openModal" class="cursor-pointer bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-3 rounded-xl font-semibold hover:scale-105 transform transition-all duration-300 shadow-lg hover:shadow-xl flex items-center space-x-2 mt-5">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
    </svg>
    <span>Novo Pedido</span>
</button>


<?php require '../views/modals/modal-inputs.php' ?>

<section class="flex flex-col gap-5 mt-10">


<?php foreach ($orders as $order): ?>
<div class="group relative overflow-hidden bg-white rounded-2xl shadow-lg hover:shadow-2xl transform hover:-translate-y-2 transition-all duration-500 ease-out border border-gray-100">
    <!-- Gradiente no topo -->
    <div class="absolute inset-x-0 top-0 h-1 bg-gradient-to-r from-purple-500 via-pink-500 to-orange-400"></div>
    
    <div class="p-6">
        <!-- Cabeçalho -->
        <div class="flex items-center justify-between mb-4">
            <div class="flex items-center space-x-3">
                <div class="w-3 h-3 bg-green-400 rounded-full animate-pulse"></div>
                <span class="text-sm font-medium text-gray-500 uppercase tracking-wider">
                    Pedido #<?= htmlentities($order->id) ?>
                </span>
            </div>
            
        </div>

        <!-- Nome do cliente -->
        <h3 class="text-2xl font-bold text-gray-900 mb-2 group-hover:text-purple-600 transition-colors duration-300">
            <?= htmlentities($order->name) ?>
        </h3>

        <!-- Descrição -->
        <p class="text-gray-600 leading-relaxed mb-4 line-clamp-2">
            <?= htmlentities($order->description) ?>
        </p>

        <!-- Informações importantes -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Entrega</p>
                    <p class="font-semibold text-gray-900"><?= htmlentities($order->creation_date) ?></p>
                </div>
            </div>
                              
        </div>

        <!-- Botões de ação -->
        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
            <div class="flex space-x-3">
                <!-- Botão Detalhes -->
                <button class="cursor-pointer group/btn relative overflow-hidden bg-gradient-to-r from-purple-500 to-pink-500 text-white px-6 py-2 rounded-lg font-medium transition-all duration-300 hover:scale-105 hover:shadow-lg" 
                        onclick="window.location.href='/order?id=<?= $order->id ?>'">
                    <span class="relative z-10 flex items-center space-x-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                        <span>Detalhes</span>
                    </span>
                </button>

                <!-- Botão Finalizar -->
                <button class="cursor-pointer bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg font-medium transition-all duration-300 hover:scale-105 hover:shadow-lg flex items-center space-x-2">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                    <span>Finalizar</span>
                </button>

                
            </div>            
        </div>
    </div>

    <!-- Efeito hover -->
    <div class="absolute inset-0 bg-gradient-to-r from-purple-500/5 to-pink-500/5 opacity-0 group-hover:opacity-100 transition-opacity duration-500 pointer-events-none"></div>
</div>

<?php endforeach; ?>


 </section>

 <script>
    const modal = document.getElementById('myModal');
    const openBtn = document.getElementById('openModal');
    const closeBtn = document.getElementById('closeModal');

    openBtn.addEventListener('click', () => modal.showModal());
    closeBtn.addEventListener('click', () => modal.close());
 </script>