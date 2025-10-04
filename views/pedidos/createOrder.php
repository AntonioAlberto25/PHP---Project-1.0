<?php
$validacoes = flash()->get('validacoes_create-order');

$old = $_SESSION['old'] ?? '';
unset($_SESSION['old']);
?>

<dialog id="myModal" class="modal">
    <div class="modal-box w-11/12 max-w-2xl">
        <form method="dialog">
            <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
        </form>
        <h3 class="font-bold text-xl mb-6">Cadastrar Novo Pedido</h3>

        <form action="/pedido/criar" method="POST" class="space-y-4">

            <div class="space-y-5">

                <!-- Nome do Cliente -->
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                        Nome do Cliente <span class="text-red-500">*</span>
                    </label>
                    <input
                        type="text"
                        id="name"
                        name="name"

                        class="w-full px-4 py-2.5 bg-white border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                        placeholder="Digite o nome do cliente" />
                </div>

                <!-- Descrição do Pedido -->
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                        Descrição do Pedido <span class="text-red-500">*</span>
                    </label>
                    <textarea
                        id="description"
                        name="description"
                        rows="4"

                        class="w-full px-4 py-2.5 bg-white border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all resize-none"
                        placeholder="Descreva os detalhes do pedido..."></textarea>
                    <p class="text-xs text-gray-500 mt-1">Inclua sabor, tamanho, decoração e outras informações relevantes</p>
                </div>

                <!-- Grid com 2 colunas -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <!-- Data de Entrega -->
                    <div>
                        <label for="delivery_date" class="block text-sm font-medium text-gray-700 mb-2">
                            Data de Entrega <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <input
                                type="date"
                                id="delivery_date"
                                name="delivery_date"

                                class="w-full px-4 py-2.5 bg-white border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all" />
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>

                    <!-- Valor -->
                    <div>
                        <label for="value" class="block text-sm font-medium text-gray-700 mb-2">
                            Valor (R$) <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <span class="text-gray-500 text-sm">R$</span>
                            </div>
                            <input
                                type="number"
                                id="value"
                                name="value"
                                step="0.01"
                                min="0"

                                class="w-full pl-10 pr-4 py-2.5 bg-white border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                                placeholder="0,00" />
                        </div>
                    </div>

                </div>

                <!-- Grid com 2 colunas -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-5">

                    <!-- Telefone -->
                    <div>
                        <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">
                            Telefone
                        </label>
                        <input
                            type="tel"
                            id="phone"
                            name="phone"
                            class="w-full px-4 py-2.5 bg-white border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all"
                            placeholder="(00) 00000-0000" />
                    </div>

                    <!-- Status -->
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700 mb-2">
                            Status <span class="text-red-500">*</span>
                        </label>
                        <select
                            id="status"
                            name="status"

                            class="w-full px-4 py-2.5 bg-white border border-gray-300 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all">
                            <option value="">Selecione o status</option>
                            <option value="novo" selected>Novo</option>
                            <option value="andamento">Em Andamento</option>
                            <option value="concluido">Concluído</option>
                            <option value="cancelado">Cancelado</option>
                        </select>
                    </div>
                </div>

                <!-- Modal Footer -->
                <div class="flex items-center justify-end gap-3 mt-6 pt-6 border-t border-gray-200">
                    <button
                        type="button"
                        id="closeModal"
                        class="px-4 py-2.5 bg-white border border-gray-300 text-gray-700 rounded-lg text-sm font-medium hover:bg-gray-50 transition-colors">
                        Cancelar
                    </button>
                    <button
                        type="submit"
                        class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm font-medium transition-colors flex items-center gap-2">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Salvar Pedido
                    </button>
                </div>
        </form>
    </div>
    </div>
</dialog>

<?php if (!empty($validacoes)): ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('myModal').showModal();
        });
    </script>
<?php endif; ?>

<script>
    // Aplicar máscara de telefone
    const phoneInput = document.getElementById('phone');
    if (phoneInput) {
        phoneInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');

            if (value.length <= 11) {
                value = value.replace(/^(\d{2})(\d)/g, '($1) $2');
                value = value.replace(/(\d)(\d{4})$/, '$1-$2');
            }

            e.target.value = value;
        });
    }

    // Aplicar máscara de valor
    const valueInput = document.getElementById('value');
    if (valueInput) {
        valueInput.addEventListener('blur', function(e) {
            if (e.target.value) {
                e.target.value = parseFloat(e.target.value).toFixed(2);
            }
        });
    }
</script>