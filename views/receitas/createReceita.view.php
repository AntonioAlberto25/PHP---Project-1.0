<?php
$validacoes = flash()->get('validacoes_create-receita');
?>

<div class="mb-8">
    <div class="flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-bold text-gray-800">Cadastrar Nova Receita</h1>
            <p class="text-gray-500 mt-1">Preencha os dados para adicionar uma receita ao seu catálogo.</p>
        </div>
    </div>
</div>

<form action="/receitas/criar" method="POST" class="space-y-6">

    <div class="form-control">
        <label for="nome" class="label">
            <span class="label-text">Nome da Receita <span class="text-red-500">*</span></span>
        </label>
        <input
            type="text"
            id="nome"
            name="nome"
            placeholder="Ex: Bolo de Chocolate com Morango"
            class="input input-bordered w-full <?= isset($validacoes["nome"]) ? 'input-error' : '' ?>"
            value="<?= $old['nome'] ?? '' ?>" />

        <?php if (isset($validacoes['nome'])): ?>
            <label class="label">
                <span class="label-text-alt text-error"><?= $validacoes["nome"][0] ?></span>
            </label>
        <?php endif; ?>
    </div>

    <div class="form-control flex flex-row space-x-10">  
    <div class="flex-column">
    <label for="preco" class="label">
            <span class="label-text">Preço de Venda (R$) <span class="text-red-500">*</span></span>
        </label>
        <label class="input-group">
            <input
                type="number"
                id="preco"
                name="preco"
                step="0.01"
                min="0"
                placeholder="50.00"
                class="input input-bordered w-full <?= isset($validacoes['preco']) ? 'input-error' : '' ?>"
                value="<?= htmlspecialchars($old['preco'] ?? '') ?>" />
        </label>
        <?php if (isset($validacoes['preco'])): ?>
            <label class="label">
                <span class="label-text-alt text-error"><?= $validacoes["preco"][0] ?></span>
            </label>
        <?php endif; ?>
        </div>
        
         <div class="flex-col">
         <label for="rendimento" class="label">
            <span class="label-text">Rendimento por pessoa<span class="text-red-500">*</span></span>
        </label>
        <label class="input-group">
            <input
                type="number"
                id="rendimento"
                name="rendimento"
                step="0.01"
                min="0"
                placeholder="5"
                class="input input-bordered w-full <?= isset($validacoes['rendimento']) ? 'input-error' : '' ?>"
                value="<?= htmlspecialchars($old['rendimento'] ?? '') ?>" />
        </label>
        <?php if (isset($validacoes['rendimento'])): ?>
            <label class="label">
                <span class="label-text-alt text-error"><?= $validacoes["rendimento"][0] ?></span>
            </label>
        <?php endif; ?>
        </div>
    </div>
    

    <div class="form-control">
        <label for="descricao" class="label">
            <span class="label-text">Descrição ou Modo de Preparo</span>
        </label>
        <textarea
            id="descricao"
            name="descricao"
            rows="6"
            class="textarea textarea-bordered w-full"
            placeholder="Descreva os detalhes da receita, ingredientes principais ou o modo de preparo..."><?= htmlspecialchars($old['descricao'] ?? '') ?></textarea>
        <label class="label">
            <span class="label-text-alt">Este campo é opcional.</span>
        </label>
    </div>

    <div class="flex items-center justify-end gap-4 pt-4 border-t border-gray-200">
        <a href="/receitas" class="btn btn-ghost">Cancelar</a>
        <button type="submit" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
            Salvar Receita
        </button>
    </div>

</form>

<script>
    // Aplicar máscara de valor
    const valueInput = document.getElementById('preco');
    if (valueInput) {
        valueInput.addEventListener('blur', function(e) {
            if (e.target.value) {
                e.target.value = parseFloat(e.target.value).toFixed(2);
            }
        });s
    }
</script>