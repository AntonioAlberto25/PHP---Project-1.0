<?php 
$validacoes = flash()->get('validacoes_create-order');

$old = $_SESSION['old'] ?? '';
unset($_SESSION['old']);
?>

<dialog id="myModal" class="modal backdrop-blur-sm">
    <div class="modal-box max-w-lg p-6 rounded-xl bg-white">

        <h3 class="text-2xl font-bold mb-4">Novo Pedido</h3>

        <form method="POST" action="/create" class="space-y-4">

            <!-- Nome da Pessoa -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nome da Pessoa</label>
                <input type="text" name="nome" placeholder="Digite o nome completo"
                       class="w-full border px-3 py-2 rounded-md focus:outline-none focus:border-purple-500"
                       value="<?= htmlspecialchars($old['nome'] ?? '') ?>">
                <?php if(isset($validacoes['nome'])): ?>
                    <span class="text-red-500 text-sm"><?= $validacoes['nome'][0] ?></span>
                <?php endif; ?>
            </div>

            <!-- Data de Entrega -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Data de Entrega</label>
                <input type="date" name="data_entrega"
                       class="w-full border px-3 py-2 rounded-md focus:outline-none focus:border-pink-500"
                       value="<?= htmlspecialchars($old['data_entrega'] ?? '') ?>">
                <?php if(isset($validacoes['data_entrega'])): ?>
                    <span class="text-red-500 text-sm"><?= $validacoes['data_entrega'][0] ?></span>
                <?php endif; ?>
            </div>

            <!-- Descrição -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Descrição</label>
                <textarea name="descricao" rows="4" placeholder="Detalhes do pedido"
                          class="w-full border px-3 py-2 rounded-md focus:outline-none focus:border-orange-500"><?= htmlspecialchars($old['descricao'] ?? '') ?></textarea>
                <?php if(isset($validacoes['descricao'])): ?>
                    <span class="text-red-500 text-sm"><?= $validacoes['descricao'][0] ?></span>
                <?php endif; ?>
            </div>

            <!-- Botões -->
            <div class="flex justify-end space-x-2 mt-4">
                <button type="button" onclick="document.getElementById('myModal').close()"
                        class="px-4 py-2 rounded-md bg-gray-200 hover:bg-gray-300">Cancelar</button>
                <button type="submit" class="px-4 py-2 rounded-md bg-purple-500 text-white hover:bg-purple-600">Salvar</button>
            </div>
        </form>
    </div>
</dialog>

<?php if(!empty($validacoes)): ?>
<script>
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('myModal').showModal();
});
</script>
<?php endif; ?>
