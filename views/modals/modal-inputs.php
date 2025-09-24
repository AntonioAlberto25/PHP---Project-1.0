<dialog id="myModal" class="modal backdrop-blur-sm">
    <div class="modal-box w-full max-w-2xl bg-white rounded-3xl shadow-2xl border-0 p-0 overflow-hidden">
        
        <!-- Header com gradiente -->
        <div class="relative bg-gradient-to-r from-purple-500 via-pink-500 to-orange-400 p-6 pb-8">
            <!-- Padrão decorativo -->
            <div class="absolute inset-0 bg-white/10 opacity-20"></div>
            <div class="absolute -top-4 -right-4 w-24 h-24 bg-white/10 rounded-full"></div>
            <div class="absolute -bottom-2 -left-4 w-16 h-16 bg-white/10 rounded-full"></div>
            
            <!-- Conteúdo do header -->
            <div class="relative z-10 flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-12 h-12 bg-white/20 rounded-xl flex items-center justify-center backdrop-blur-sm">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-white">Novo Pedido</h3>
                        <p class="text-white/80 text-sm">Preencha os dados abaixo</p>
                    </div>
                </div>
                
                <!-- Botão fechar -->
                <button class="w-10 h-10 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition-all duration-200 backdrop-blur-sm" onclick="document.getElementById('myModal').close()">
                    <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>

        <!-- Formulário -->
        <form method="POST" class="p-8 space-y-6" action="/create-order">
            
        <?php if ($validacoes = flash()->get('validacoes_create-order')): ?>

            <script>
                document.addEventListener("DOMContentLoaded", function() {
        const modal = document.getElementById('myModal');
        modal.showModal();
            });

            </script>    
                
                <div class="border-red-800 bg-red-900 text-red-400 px-4 py-1 rounded-md border-2 text-sm font-bold" id="errorBox">

                    <ul>

                        <li>Deu ruim!!</li>

                        <?php foreach ($validacoes as $validacao): ?>

                            <li><?= $validacao ?></li>

                        <?php endforeach; ?>

                    </ul>

                </div>

              <?php endif; ?>    
        
        
        
        <!-- Input Nome da Pessoa -->
            <div class="group">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <svg class="w-4 h-4 inline mr-2 text-purple-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                    Nome da Pessoa
                </label>
                <div class="relative">
                    <input 
                        type="text" 
                        placeholder="Digite o nome completo" 
                        class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-purple-500 focus:bg-white focus:outline-none transition-all duration-300 group-hover:border-gray-300" 
                        name="nome"
                    />
                    <div class="absolute inset-y-0 right-0 flex items-center pr-4">
                        <div class="w-2 h-2 bg-purple-400 rounded-full opacity-0 group-focus-within:opacity-100 transition-opacity duration-300"></div>
                    </div>
                </div>
            </div>

            <!-- Input Data de Entrega -->
            <div class="group">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <svg class="w-4 h-4 inline mr-2 text-pink-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Data de Entrega
                </label>
                <div class="relative">
                    <input 
                        type="date" 
                        class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-pink-500 focus:bg-white focus:outline-none transition-all duration-300 group-hover:border-gray-300" 
                        name="data_entrega"
                    />
                    <div class="absolute inset-y-0 right-12 flex items-center pr-4">
                        <div class="w-2 h-2 bg-pink-400 rounded-full opacity-0 group-focus-within:opacity-100 transition-opacity duration-300"></div>
                    </div>
                </div>
            </div>

            <!-- Textarea Descrição -->
            <div class="group">
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    <svg class="w-4 h-4 inline mr-2 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Descrição do Pedido
                </label>
                <div class="relative">
                    <textarea 
                        class="w-full px-4 py-3 bg-gray-50 border-2 border-gray-200 rounded-xl focus:border-orange-500 focus:bg-white focus:outline-none transition-all duration-300 group-hover:border-gray-300 resize-none h-32" 
                        placeholder="Descreva os detalhes do pedido, requisitos especiais, prazos..."
                        name="descricao"
                    ></textarea>
                    <div class="absolute top-3 right-4">
                        <div class="w-2 h-2 bg-orange-400 rounded-full opacity-0 group-focus-within:opacity-100 transition-opacity duration-300"></div>
                    </div>
                </div>
            </div>

            <!-- Botões de Ação -->
            <div class="flex items-center justify-end space-x-4 pt-6 border-t border-gray-100">
                
                <!-- Botão Cancelar -->
                <button type="button" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium rounded-xl transition-all duration-300 hover:scale-105" onclick="document.getElementById('myModal').close(); document.getElementById('errorBox')?.remove();">
                    Cancelar
                </button>

                <!-- Botão Salvar -->
                <button type="submit" class="group relative overflow-hidden bg-gradient-to-r from-purple-500 to-pink-500 text-white px-8 py-3 rounded-xl font-semibold transition-all duration-300 hover:scale-105 hover:shadow-lg" onclick="salvarPedido(event)">
                    <span class="relative z-10 flex items-center space-x-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        <span>Salvar Pedido</span>
                    </span>
                    
                    <!-- Efeito de brilho -->
                    <div class="absolute inset-0 bg-gradient-to-r from-white/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                </button>

            </div>       
        </form>
        
        <!-- Efeito decorativo no rodapé -->
        <div class="h-1 bg-gradient-to-r from-purple-500 via-pink-500 to-orange-400"></div>
    </div>

    
</dialog>