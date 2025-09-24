Requisitos Funcionais (RF)

Gestão de Conta e Acesso [X]

RF1.1: Usuário pode se registrar usando e-mail e senha.

RF1.2: Usuário pode realizar login usando e-mail e senha.

RF1.3: Todas as consultas são filtradas pelo user_id do usuário autenticado, garantindo isolamento total dos dados.

RF1.4: Os cookies de usuário e sessão devem durar somente 7 dias logado no sistema.

Receitas []

RF2.1: Usuário pode cadastrar, editar e excluir receitas.

RF2.2: Cada receita pode conter múltiplos ingredientes (relação N:N).

RF2.3: Usuário pode definir preço para cada receita.

RF2.4: Listagem de receitas deve mostrar nome, ingredientes e preço atual.

Insumos (Estoque)

RF3.1: Usuário pode cadastrar, editar e excluir insumos.

RF3.2: Quando um pedido é marcado como “Entregue”, os ingredientes correspondentes são subtraídos do estoque automaticamente.

RF3.3: Sistema realiza verificação diária de estoque e gera alertas de insumos baixos.

Vendas e Pedidos []

RF4.1: Usuário pode criar pedidos vinculando receitas.

RF4.2: O preço da receita utilizada no pedido é o preço mais recente definido.

RF4.3: Pedido pode ser atualizado para status “Entregue” ou “Cancelado”.

Segurança

RNF1.1: Senhas devem ser armazenadas de forma segura (hashing).

RNF1.2: Autenticação de usuários é obrigatória para acessar qualquer dado.

Desempenho

RNF2.1: Consultas de dashboard e relatórios devem ser otimizadas para exibir resultados rapidamente.

Usabilidade

RNF3.1: Interface simples e intuitiva, considerando que o usuário é apenas uma pessoa.

Disponibilidade

RNF4.1: Sistema deve estar disponível 24/7, mesmo que seja hospedado localmente ou em nuvem.

Manutenção

RNF5.1: Código deve ser modular para facilitar futuras melhorias e manutenção.

Escalabilidade (Opcional)

RNF6.1: Estrutura do sistema deve permitir adição futura de múltiplos usuários, caso necessário.