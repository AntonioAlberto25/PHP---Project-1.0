<div class="card w-full bg-gray-300 border border-base-300 mt-30">
        <div class="card-body space-y-2">
            
            <!-- Cabeçalho -->
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-base-content/90">
                    Pedido #<?= $order->id ?>
                </h2>
            </div>

            <!-- Nome do pedido -->
            <p class="text-xl font-bold text-primary">               
               <?= $order->name ?>
            </p>

            <!-- Descrição -->
            <p class="text-sm text-base-content/70 leading-relaxed">
                <?= $order->description ?>
            </p>

            <!-- Data -->
             <div class="text-sm text-base-content/80">
                📅 Entrega em:
                <span class="font-medium">
                    <?= $order->creation_date ?>
                </span>
            </div>    

            <!-- Rodapé com ações -->
            <div class="flex justify-end pt-3 border-t border-base-300 space-x-5">
            <button class="btn btn-sm btn-primary" onclick="window.location.href='/pedidos'">
                    Voltar
            </button>
            <button class="btn btn-sm btn-primary">
                    Finalizar pedido
            </button>
            </div>
        </div>
    </div>        