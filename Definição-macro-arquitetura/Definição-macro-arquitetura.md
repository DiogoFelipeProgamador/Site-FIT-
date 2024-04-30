# Definição de Macro Arquitetura

# CASOS DE USO
![](./imagens/casosdeusofitplus.png)

# Modulos

## Usuário cadastrado
O usuário cadastrado terá acesso a todas as informações disponíveis no site, poderá realizar os cálculos de IMC, TMB e FC ideal, terá acesso a uma área exclusiva para usuários cadastrados onde receberá informações fitness baseadas em seus dados, poderá responder um questionário que se respondido exibirá recomendações, poderá alterar seus dados e redefinir sua senha.

## Usuário não cadastrado
O usuário que não está cadastrado no site terá acesso a todas as informações disponíveis no site, poderá realizar os cálculos de IMC, TMB e FC ideal e poderá se cadastrar para obter acesso a mais funcionalidades.

# Fluxogramas

## Fluxo de cadastro 
![](./imagens/fluxo-de-cadastro.png)

## Fluxo de Login 
![](./imagens/fluxo-de-login.png)

## Fluxo de Cálculos 
![](./imagens/fluxo-de-calculos.png)

## Fluxo de Alteração de dados 
![](./imagens/fluxo-de-alteração-de-dados.png)

## Fluxo de recomendações
![](./imagens/fluxo-de-recomendações.png)

## Fluxo de alteração de senha 
![](./imagens/fluxo-de-alteração-de-senha.png)

## Fluxo de redefinição de senha 
![](./imagens/fluxo-de-redefinição-de-senha.png)


## Arquitetura
A arquitetura utilizada será a MVC com o view sendo as páginas html estilizadas com css e animada com java script, o controller o php para gerenciando as solicitações do sistema e o model o banco de dados armazenando e disponibilizando as informações necessárias.

## Front-End
Para fazer o front-end utilizaremos o html para construir o sistema e adicionar conteúdos, cada parte do sistema terá sua página html, para estilizar o sitema utilizaremos o css, a estilizção deixara o sistema responsivo sendo compativel com as telas de todos os dispositiovs e para criar as animações e realizar os cálculos(IMC,TMB,FC ideal) na função testes utilizaremos java script.   

## Back-end
No back-end utilizaremos o php para criar a logica do sistema e fazer a conexão com o banco de dados, enviando os dados do cadastro, verificando os dados cadastrados para o login e alterando os dados cadastrados.

## Banco de dados
Para criar o banco de dados utilizaremos o mysql da seguinte forma: criaremos 4 tabelas para armazenar os dados dos usuários(cadastro,loginsite,usuarios,questionários).
#### Tabela Cadastro
Na tabela cadastro estarão armazenados o id e os dados cadastrados do usuário(Nome,E-mail,Altura,Peso,Data de nascimento, Sexo).

#### Estrutura da tabela:
![](./imagens/BCE-cadastro.png)

#### Como serão armazenados os dados:
![](./imagens/BC-Cadastro.png)

#### Tabela Loginsite
Na tabela Loginsite estarão armazenados o id, E-mail e a senha cadastrada criptograda ele será utilizado para conferir se os dados de login estão corretos.

#### Estrutura da tabela:
![](./imagens/BCE-loginsite.png)

#### Como serão armazenados os dados:
![](./imagens/BC-loginsite.png)


#### Tabela Usuários
Na tabela usuários estarão armazenados o id, os dados do usuário(Nome, E-mail, Altura, Peso, Data de nascimento, Sexo) e o codigo de recuperação que será enviado para o E-mail do usuário caso queira redefinir a senha.

#### Estrutura da tabela:
![](./imagens/BCE-usuários.png)

#### Como serão armazenados os dados:
![](./imagens/BC-usuários.png)

#### Tabela Questionários
Na tabela questionários estarão armazenados o id, nome, E-mail e as respostas do usuário caso tenha respondido o questionário, a tabela sera utilizada para verificar se o usuário ja respondeu o questionário e quais foram suas respostas para gerar recomendações.

#### Estrutura da tabela:
![](./imagens/BCE-questionarios.png)

#### Como os dados serão armazenados:
![](./imagens/BC-questionários.png)








## Servidor
O sistema ficará hospedado em um servidor da empresa hostgator.
