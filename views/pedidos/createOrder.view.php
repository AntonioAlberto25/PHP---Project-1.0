<?php
$validacoes = flash()->get('validacoes_create-order');
// Assumindo que você passa a lista de receitas do controller
// $receitas = $_GET['receitas'] ?? [];
?>

<div class="mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Cadastrar Novo Pedido</h1>
            <p class="text-gray-500 mt-1">Preencha os dados para adicionar um pedido.</p>
        </div>
    </div>
</div>

<form action="/pedidos/criar" method="POST" class="space-y-6">

    <!-- Dados do Cliente -->
    <div class="card bg-base-100 shadow-sm">
        <div class="card-body">
            <h2 class="card-title text-xl mb-4">Dados do Cliente</h2>
            
            <div class="form-control">
                <label for="nome_cliente" class="label">
                    <span class="label-text">Nome do Cliente <span class="text-red-500">*</span></span>
                </label>
                <input
                    type="text"
                    id="nome_cliente"
                    name="nome_cliente"
                    placeholder="Ex: Maria Silva"
                    class="input input-bordered w-full <?= isset($validacoes["nome_cliente"]) ? 'input-error' : '' ?>"
                    value="<?= htmlspecialchars($old['nome_cliente'] ?? '') ?>" />

                <?php if (isset($validacoes['nome_cliente'])): ?>
                    <label class="label">
                        <span class="label-text-alt text-error"><?= $validacoes["nome_cliente"][0] ?></span>
                    </label>
                <?php endif; ?>
            </div>

            <div class="form-control">
                <label for="telefone_cliente" class="label">
                    <span class="label-text">Telefone do Cliente</span>
                </label>
                <input
                    type="text"
                    id="telefone_cliente"
                    name="telefone_cliente"
                    placeholder="(00) 00000-0000"
                    class="input input-bordered w-full <?= isset($validacoes["telefone_cliente"]) ? 'input-error' : '' ?>"
                    value="<?= htmlspecialchars($old['telefone_cliente'] ?? '') ?>" />

                <?php if (isset($validacoes['telefone_cliente'])): ?>
                    <label class="label">
                        <span class="label-text-alt text-error"><?= $validacoes["telefone_cliente"][0] ?></span>
                    </label>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <!-- Dados do Pedido -->
    <div class="card bg-base-100 shadow-sm">
        <div class="card-body">
            <h2 class="card-title text-xl mb-4">Dados do Pedido</h2>
            
            <div class="form-control">
                <label for="receita_id" class="label">
                    <span class="label-text">Receita <span class="text-red-500">*</span></span>
                </label>
                <select
                    id="receita_id"
                    name="receita_id"
                    class="select select-bordered w-full <?= isset($validacoes['receita_id']) ? 'select-error' : '' ?>">
                    <option value="">Selecione uma receita</option>
                    <?php if (isset($receitas) && is_array($receitas)): ?>
                        <?php foreach ($receitas as $receita): ?>
                            <option 
                                value="<?= $receita['id'] ?>" 
                                data-preco="<?= $receita['preco'] ?>"
                                data-rendimento="<?= $receita['rendimento'] ?>"
                                <?= (($old['receita_id'] ?? '') == $receita['id']) ? 'selected' : '' ?>>
                                <?= htmlspecialchars($receita['nome']) ?> - R$ <?= number_format($receita['preco'], 2, ',', '.') ?>
                            </option>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </select>

                <?php if (isset($validacoes['receita_id'])): ?>
                    <label class="label">
                        <span class="label-text-alt text-error"><?= $validacoes["receita_id"][0] ?></span>
                    </label>
                <?php endif; ?>
            </div>

            <div class="form-control flex flex-row gap-4">
                <div class="flex-1">
                    <label for="quantidade" class="label">
                        <span class="label-text">Quantidade de Pessoas <span class="text-red-500">*</span></span>
                    </label>
                    <input
                        type="number"
                        id="quantidade"
                        name="quantidade"
                        min="1"
                        placeholder="10"
                        class="input input-bordered w-full <?= isset($validacoes['quantidade']) ? 'input-error' : '' ?>"
                        value="<?= htmlspecialchars($old['quantidade'] ?? '') ?>" />

                    <?php if (isset($validacoes['quantidade'])): ?>
                        <label class="label">
                            <span class="label-text-alt text-error"><?= $validacoes["quantidade"][0] ?></span>
                        </label>
                    <?php endif; ?>
                </div>

                <div class="flex-1">
                    <label for="preco_total" class="label">
                        <span class="label-text">Preço Total (R$) <span class="text-red-500">*</span></span>
                    </label>
                    <input
                        type="number"
                        id="preco_total"
                        name="preco_total"
                        step="0.01"
                        min="0"
                        placeholder="0.00"
                        class="input input-bordered w-full <?= isset($validacoes['preco_total']) ? 'input-error' : '' ?>"
                        value="<?= htmlspecialchars($old['preco_total'] ?? '') ?>"
                        readonly />

                    <?php if (isset($validacoes['preco_total'])): ?>
                        <label class="label">
                            <span class="label-text-alt text-error"><?= $validacoes["preco_total"][0] ?></span>
                        </label>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-control">
                <label for="observacoes" class="label">
                    <span class="label-text">Observações</span>
                </label>
                <textarea
                    id="observacoes"
                    name="observacoes"
                    rows="4"
                    class="textarea textarea-bordered w-full"
                    placeholder="Observações sobre o pedido, personalizações, alergias, etc..."><?= htmlspecialchars($old['observacoes'] ?? '') ?></textarea>
                <label class="label">
                    <span class="label-text-alt">Este campo é opcional.</span>
                </label>
            </div>
        </div>
    </div>

    <!-- Dados de Entrega -->
    <div class="card bg-base-100 shadow-sm">
        <div class="card-body">
            <h2 class="card-title text-xl mb-4">Dados de Entrega</h2>
            
            <div class="form-control flex flex-row gap-4">
                <div class="flex-1">
                    <label for="data_entrega" class="label">
                        <span class="label-text">Data de Entrega <span class="text-red-500">*</span></span>
                    </label>
                    <input
                        type="date"
                        id="data_entrega"
                        name="data_entrega"
                        class="input input-bordered w-full <?= isset($validacoes['data_entrega']) ? 'input-error' : '' ?>"
                        value="<?= htmlspecialchars($old['data_entrega'] ?? '') ?>" />

                    <?php if (isset($validacoes['data_entrega'])): ?>
                        <label class="label">
                            <span class="label-text-alt text-error"><?= $validacoes["data_entrega"][0] ?></span>
                        </label>
                    <?php endif; ?>
                </div>

                <div class="flex-1">
                    <label for="horario_entrega" class="label">
                        <span class="label-text">Horário de Entrega <span class="text-red-500">*</span></span>
                    </label>
                    <input
                        type="time"
                        id="horario_entrega"
                        name="horario_entrega"
                        class="input input-bordered w-full <?= isset($validacoes['horario_entrega']) ? 'input-error' : '' ?>"
                        value="<?= htmlspecialchars($old['horario_entrega'] ?? '') ?>" />

                    <?php if (isset($validacoes['horario_entrega'])): ?>
                        <label class="label">
                            <span class="label-text-alt text-error"><?= $validacoes["horario_entrega"][0] ?></span>
                        </label>
                    <?php endif; ?>
                </div>
            </div>

            <div class="form-control">
                <label for="tipo_entrega" class="label">
                    <span class="label-text">Tipo de Entrega <span class="text-red-500">*</span></span>
                </label>
                <select
                    id="tipo_entrega"
                    name="tipo_entrega"
                    class="select select-bordered w-full <?= isset($validacoes['tipo_entrega']) ? 'select-error' : '' ?>">
                    <option value="">Selecione o tipo de entrega</option>
                    <option value="retirada" <?= (($old['tipo_entrega'] ?? '') == 'retirada') ? 'selected' : '' ?>>
                        Retirada no Local
                    </option>
                    <option value="entrega" <?= (($old['tipo_entrega'] ?? '') == 'entrega') ? 'selected' : '' ?>>
                        Entrega em Domicílio
                    </option>
                </select>

                <?php if (isset($validacoes['tipo_entrega'])): ?>
                    <label class="label">
                        <span class="label-text-alt text-error"><?= $validacoes["tipo_entrega"][0] ?></span>
                    </label>
                <?php endif; ?>
            </div>

            <div id="endereco_container" class="form-control" style="display: none;">
                <label for="endereco_entrega" class="label">
                    <span class="label-text">Endereço de Entrega <span class="text-red-500">*</span></span>
                </label>
                <textarea
                    id="endereco_entrega"
                    name="endereco_entrega"
                    rows="3"
                    class="textarea textarea-bordered w-full <?= isset($validacoes['endereco_entrega']) ? 'textarea-error' : '' ?>"
                    placeholder="Rua, número, complemento, bairro, cidade..."><?= htmlspecialchars($old['endereco_entrega'] ?? '') ?></textarea>

                <?php if (isset($validacoes['endereco_entrega'])): ?>
                    <label class="label">
                        <span class="label-text-alt text-error"><?= $validacoes["endereco_entrega"][0] ?></span>
                    </label>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-200">
        <a href="/pedidos" class="btn btn-ghost">Cancelar</a>
        <button type="submit" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Salvar Pedido
        </button>
    </div>

</form>

<script>
    // Mostrar/ocultar campo de endereço baseado no tipo de entrega
    const tipoEntrega = document.getElementById('tipo_entrega');
    const enderecoContainer = document.getElementById('endereco_container');
    const enderecoInput = document.getElementById('endereco_entrega');

    function toggleEndereco() {
        if (tipoEntrega.value === 'entrega') {
            enderecoContainer.style.display = 'block';
            enderecoInput.required = true;
        } else {
            enderecoContainer.style.display = 'none';
            enderecoInput.required = false;
            enderecoInput.value = '';
        }
    }

    // Verificar no carregamento da página
    if (tipoEntrega.value === 'entrega') {
        enderecoContainer.style.display = 'block';
        enderecoInput.required = true;
    }

    tipoEntrega.addEventListener('change', toggleEndereco);

    // Calcular preço total baseado na receita e quantidade
   

    // Aplicar máscara de telefone
    const telefoneInput = document.getElementById('telefone_cliente');
    if (telefoneInput) {
        telefoneInput.addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length <= 11) {
                value = value.replace(/^(\d{2})(\d)/g, '($1) $2');
                value = value.replace(/(\d)(\d{4})$/, '$1-$2');
            }
            e.target.value = value;
        });
    }

    // Definir data mínima como hoje
    const dataEntrega = document.getElementById('data_entrega');
    if (dataEntrega) {
        const hoje = new Date().toISOString().split('T')[0];
        dataEntrega.min = hoje;
    }
</script>