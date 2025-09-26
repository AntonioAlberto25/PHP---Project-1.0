# Módulo de Gestão de Receitas e Custos

## Fase 1: Estrutura do Banco de Dados (Models)

- [ ] Criar a tabela `ingredientes`
  - `id` (PK)
  - `nome`
  - `unidade_medida` (kg, g, ml, l, unidade)
  - `preco_por_unidade`
- [ ] Criar a tabela `receitas`
  - `id` (PK)
  - `nome`
  - `descricao`
  - `caminho_imagem`
  - `custo_total` (será calculado)
  - `rendimento`
- [ ] Criar a tabela pivot `receita_ingredientes`
  - `id` (PK)
  - `receita_id` (FK)
  - `ingrediente_id` (FK)
  - `quantidade`

## Fase 2: Lógica de Negócio (Controllers)

### IngredienteController.php
- [ ] Criar o arquivo `IngredienteController.php`.
- [ ] Implementar a função `index()` para listar todos os ingredientes.
- [ ] Implementar as funções `create()` e `store()` para cadastrar novos ingredientes.
- [ ] Implementar as funções `edit()` e `update()` para editar um ingrediente.
- [ ] Implementar a função `destroy()` para excluir um ingrediente.

### ReceitaController.php
- [ ] Criar o arquivo `ReceitaController.php`.
- [ ] Implementar a função `index()` para exibir a galeria de receitas.
- [ ] Implementar a função `create()` para exibir o formulário de nova receita.
- [ ] Implementar a função `store()` para salvar uma nova receita:
  - [ ] Salvar dados básicos da receita.
  - [ ] Implementar lógica de upload de imagem.
  - [ ] Salvar os ingredientes associados na tabela `receita_ingredientes`.
  - [ ] Chamar a função de cálculo de custo após salvar.
- [ ] Implementar a função `edit()` e `update()` para editar uma receita existente.
- [ ] Implementar a função `destroy()` para excluir uma receita e seus vínculos.
- [ ] Implementar a função interna `calcularCusto($receita_id)` para somar os custos dos ingredientes e atualizar a tabela `receitas`.

## Fase 3: Interface do Usuário (Views)

### Telas de Ingredientes
- [ ] Criar a View `ingredientes/index.php` para listar os ingredientes.
- [ ] Criar a View `ingredientes/create.php` (formulário para adicionar/editar).

### Telas de Receitas
- [ ] Criar a View `receitas/index.php` para a galeria de receitas (com cards).
- [ ] Criar a View `receitas/create.php` (formulário para adicionar/editar receita).
  - [ ] Implementar o JavaScript para adicionar/remover campos de ingredientes dinamicamente no formulário.

## Fase 4: Integração com Pedidos

- [ ] Modificar a View de criação/edição de `Pedidos` para incluir um dropdown (select) de receitas.
- [ ] Implementar a lógica (preferencialmente com AJAX/JavaScript) para buscar o custo da receita selecionada e sugerir um preço para o pedido.

## Fase 5: Melhorias (Opcional)

- [ ] Implementar cálculo de custo em tempo real no formulário de receitas com JavaScript.
- [ ] Adicionar um campo para "margem de lucro" para calcular o preço de venda final.
- [ ] Usar um campo de busca com autocomplete para selecionar ingredientes, em vez de um dropdown.
- [ ] Criar uma funcionalidade para gerar "lista de compras" com base nos ingredientes faltantes.