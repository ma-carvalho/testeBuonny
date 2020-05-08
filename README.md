# Teste Buonny Tecnologia

Bom dia.
Você está iniciando o Teste para a vaga de programador na Buonny Tecnologia.
Neste teste, avaliaremos sua capacidade de resolução do problema proposto, bem como sua codificação, raciocínio lógico e conhecimento em Banco de Dados

## Objetivo
Desenvolver um CRUD de Entrada de Pedidos onde, o usuário possa Consultar, Adicionar, Editar ou Remover um Pedido de um determinado cliente e, neste pedido, possa consultar, adicionar, editar ou remover produtos.

Um protótipo navegável do Projeto pode ser encontrado [neste link](https://app.moqups.com/ek5gCoynEk/view/page/a8de2285c)

### Regras do Projeto

#### Listagem de Pedidos
Nesta tela serão listados todos os pedidos existentes na base de dados, podendo os mesmos ser filtrados por Cliente ou Preço Total, sendo esta última uma filtragem por range de preço (valor de - até).
Na listagem resultante, deve ser exibido o Id. do pedido, Cliente, Valor, além das possibilidades de Editar e Excluir cada pedido.
Além disso haverá um botão de Adicionar Pedido, o qual carregará a tela para tal funcionalidade

#### Adicionar Pedido
Esta será uma tela onde um novo pedido será incluído. Para tal, basta apenas que o usuário selecione o cliente (o qual será carregado por um combo de clientes, listando TODOS os Clientes do Cadastro).
Clicando em Salvar, um novo pedido será alterado e o usuário será redirecionado para a tela de Edição do novo pedido salvo.
Clicando em Voltar, ele retornará para a tela de listagem

#### Editar Pedido
Esta será uma tela onde o usuário irá trabalhar os itens do pedido.
É importante ressaltar que, nesta tela, não deve ser possível editar o cliente.
Além disso, nesta tela serão listados os Itens do Pedido, caso existam, exibindo na listagem:
* Id
* Produto
* Valor Unitário (Valor definido para o Produto)
* Quantidade
* Valor Total (Valor Unitário * Quantidade)

Além do link para Editar o Item do Pedido e outro para Excluir o Item do Pedido.
Também deve ser exibido um botão para Adicionar Item no Pedido

#### Adicionar Item no Pedido
Esta tela deverá possibilitar ao usuário adicionar um item no pedido. 
Para tal, ela terá 4 campos exibidos:
* Produto (Combo listando TODOS os Produtos do Cadastro - Preenchimento Obrigatório)
* Valor (Campo readonly, onde, assim que o produto for selecionado, deverá exibir o valor do produto em questão)
* Quantidade (Campo texto obrigatório - deve aceitar apenas valores numéricos)
* Valor Total (Campo Readonly, deve exibir o valor total do Produto - Valor Unitário * Quantidade - deve ser atualizado toda vez que o produto ou a quantidade são alterados)

Sendo que, quando o usuário clicar em Salvar, o item do Pedido deverá ser adicionado e o usuário deverá retornar para a tela de edição do Pedido.

#### Editar Item do Pedido
A tela deverá ser idêntica à tela de Adicionar Item no Pedido, com a única diferença que os dados do Item do Pedido já devem vir preenchidos e, quando o usuário clicar em Salvar, o Item do Pedido deverá ser alterado com os dados preenchidos.

#### Excluir Item do Pedido
Deverá ser exibido um alerta com a confirmação de se o usuário deseja excluir o item do pedido, sendo que, se o usuário escolher a opção sim, o item em questão deve ser removido e a tela de Edição do Pedido deve ser recarregada

#### Excluir Pedido
Deverá ser exibido um alerta com a confirmação de se o usuário deseja excluir o pedido, sendo que, se o usuário escolher a opção sim, o pedido em questão deve ser removido e a tela de Listagem de Pedidos deve ser recarregada

### Modelo de Dados
O Modelo de Dados do projeto está disponível [neste link](https://github.com/btecsyscode/testeBuonny/blob/master/db/MER.png) , ao passo que o descritivo das tabelas e campos estão disponíveis [neste link](https://github.com/btecsyscode/testeBuonny/blob/master/db/Tabelas.html) .

Os scripts para a criação do Banco de Dados estão disponíveis [neste link](https://github.com/btecsyscode/testeBuonny/blob/master/db/script.sql)

**Todos estes arquivos também estão disponíveis nos fontes do projeto, na pasta *db***
  
## Instruções
O candidato deverá fazer um Fork do Projeto para seu GitHub e desenvolver a solução. 
Com a solução desenvolvida, deverá realizar um Pull Request de seu código no repositório, sendo que o mesmo será avaliado por este código enviado.

**O Prazo para desenvolvimento do projeto é de 2 dias úteis, sendo que Entrega realizada após este prazo não será aceita**

### Condições e Critérios de Avaliação

O Desenvolvimento da Aplicação deve ser realizado na linguagem **PHP**, podendo ou não ser utilizado Framework para o desenvolvimento.
Será considerado como diferencial a adoção de Framework Cake, de preferência na versão 3, bem como da utilização de APIs para a comunicação entre Front e BackEnd.
A utilização de um Framework de FrontEnd, tal qual Angular, React ou Vue também será considerado um diferencial. O mesmo vale para a utilização de jQuery ou alguma outra Library Javascript.
