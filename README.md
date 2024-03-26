![Badge em Desenvolvimento](http://img.shields.io/static/v1?label=STATUS&message=EM%20DESENVOLVIMENTO&color=GREEN&style=for-the-badge) <br>
Projeto A3 

\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_

SITE-FIT-PLUS                                                                                                  <03/01/2024>














<FITNESS-PLUS>

<h1>Documento de especificação de  
requisitos</h1>                                                                             		










HISTÓRICO DE REVISÕES DO DOCUMENTO







|Versão|            Data|             Autor|         Descrição|
| :- | :- | :- | :- |
|||||
|||||
|||||
|||||












<h1 style>ÍNDICE</h1>

# 1. INTRODUÇÃO

1.1. PROPÓSITO DO DOCUMENTO DE REQUISITOS 

1.2. PÚBLICO ALVO

1.3. DEFINIÇÕES, ACRÔNIMOS E ABREVIAÇÕES.



# 2. DESCRIÇÃO  GERAL DO PRODUTO

2\.1. SITUAÇÃO ATUAL

2\.2. OBJETIVOS DO PRODUTO

2\.3. BENEFÍCIOS DO PROJETO

2\.4. ESCOPO

2\.5. ATORES

2\.6. PREMISSAS

2\.7. ITENS FORA DO ESCOPO



# 3. REQUISITOS ESPECÍFICOS



3\.1. REQUISITOS FUNCIONAIS

3\.2. REQUISITOS NÃO FUNCIONAIS

3\.3. REGRAS DE NEGÓCIO











1\.       Introdução

\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_

1\.1.  Propósito do documento de requisitos

`     `Esse projeto tem como  objetivo ajudar os usuários a terem uma rotina mais saudável então deverá conter obrigatoriamente os requisitos abaixo:

**ALIMENTAÇÃO:** O site deverá conter uma parte destinada ao auxílio alimentar, onde o usuário poderá obter informações sobre  como se alimentar saudavelmente de acordo com especialistas da  área, essa parte também deverá conter um vídeo que auxilie o usuário. Será acessada por um botão localizado no menu principal do site e em outro localizado após a explicação das funcionalidades do site.

**EXERCÍCIOS:** O site deverá conter uma parte destinada a explicação dos benefícios do exercício, onde terá informações que ajudam e incentivam o usuário a iniciar exercícios físicos, essa parte também deverá conter um vídeo que auxilie o usuário após as explicações. Será acessada por um botão no menu principal do site e em outro após a explicação das funcionalidades do site.

**TESTES:**  O site deverá conter uma parte destinada aos cálculos de IMC, TMB, FC IDEAL, nessa parte do site terá um texto explicativo para cada cálculo especificando seu uso e como é feito, após essa explicação deverá ter uma imagem relacionada ao cálculo e um botão que dará acesso a uma área específica para fazer o cálculo.

**IMC:** O site deverá conter uma parte específica para o cálculo do IMC que abrirá ao usuário apertar o botão localizado após a explicação do IMC na aba testes. Nessa parte o site deverá ter um local para onde o usuário preencha sua altura e peso, abaixo um botão para efetuar o cálculo que é feito pela seguinte fórmula Peso em KG / Altura² , após o usuário realizar o cálculo o site deverá exibir qual foi o resultado e informar para o usuário em qual perfil se encaixa de acordo com as informações a seguir: 

Resultado menor que 18,5 deverá exibir que o usuário está magro.

Resultado entre 18,5 e 24,9 deverá exibir que o usuário está normal.

Resultado entre 25,0 e 29,9 deverá exibir que o usuário está com sobrepeso.

Resultado entre 30 e 39,9 deverá exibir que o usuário está com obesidade.

Resultado maior que 40 deverá exibir que o usuário está com obesidade mórbida.

**TMB:** O site deverá conter uma parte específica para o cálculo do TMB que abrirá ao usuário apertar o botão localizado após a explicação do TMB na aba testes. Nessa parte o site deverá ter uma local para que o usuário preencha seu peso, altura, idade e informe seu sexo, abaixo um botão para realizar o calculo que é feito pela seguinte fórmula se do sexo masculino 88,362 + (13,397 \* Peso em KG) + (4,799 \* Altura em CM) - (5,677 \* Idade em anos), se do sexo feminino 447,593 + (9,247 \* Peso em KG) + (3,098 \* Altura em CM) - (4,330 - Idade em anos). Após o usuário realizar o cálculo o site  deverá exibir o resultado para o usuário.

**FC IDEAL:** O site deverá conter uma parte específica para o cálculo da FC IDEAL que abrirá ao usuário apertar o botão localizado após a explicação da FC IDEAL na aba testes. Nessa parte o site deverá ter um local para o usuário preencher sua idade e informar o seu sexo, abaixo um botão para realizar o cálculo que é feito pela seguinte fórmula se do sexo masculino (220 - Idade em anos) \* 0,65 obtendo a FC mínima ideal para emagrecer e (220 - Idade em anos) \* 0,70 obtendo a FC ideal para emagrecer, se do sexo feminino (226 - Idade em anos) \* 0,65 obtendo a FC mínima ideal para emagrecer e (226 - Idade em anos) \* 0,70 obtendo a FC ideal para emagrecer. Após o usuário realizar o cálculo o site deverá informar os resultados para o usuário.

**SOBRE:**  O site deverá conter uma parte onde se explique o motivo pela criação do site e suas funções, essa parte será acessada ao usuário rolar para baixo na tela principal ou ao clicar no botão no menu principal do site.

**HOME:** O site deverá conter um botão no qual redirecione o usuário a página principal do site, esse botão estará localizado no menu principal do site.

**LOGO:** A logo do site ao ser clicada redireciona o usuário a página principal do site.

1\.2.  Público alvo

`   `Esse site tem como público alvo pessoas que buscam informações sobre uma rotina mais saudável.

1\.3. Definições, Acrônimos e Abreviações

` `**IMC:** ÍNDICE DE MASSA CORPORAL.

` `**TMB:** TAXA METABÓLICA BASAL.

`  `**FC:** FREQUÊNCIA CARDÍACA.


















2\.    Descrição Geral do Produto

\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_

2\.1. Situação atual

Atualmente existem sites que contém informações sobre rotinas saudáveis mas não juntam todas as informações importantes como: Alimentação, Exercícios e cálculos IMC, TMB e FC IDEAL, dificultando o usuário de obter informações pois tem que acessar vários sites para conseguir todas essas informações.

2\.2. Objetivos do Produto

A FIT+ solicitou o desenvolvimento desse site. O site conterá informações e cálculos importantes relacionados a uma rotina mais saudável desde alimentação a cálculos

` `Auxiliar o usuário a começar uma rotina mais saudável.

` `Melhorar o modelo de sites da mesma área de informação.

` `Facilitar o acesso a esse tipo de informação.

` `Conter a maioria de informações sobre esse modelo.

2\.3. Benefícios do projeto

` `Desenvolvimento de um website de fácil acesso que ajude todos, com as seguintes características:

` `Interface de fácil uso.

` `Flexível.

` `Utilizável em diversos dispositivos.

` `Pouco uso do processamento dos hardwares.

2\.4. Escopo

Esse projeto trata-se da criação de um web site, utilizando se o ciclo completo de desenvolvimento de sistema

O escopo do futuro website Fitness Plus envolve as seguintes macro-funcionalidades: 


|`   `Nº            |`   `Módulo|`                 `Descrição|
| :- | :- | :- |
|`       `1|`  `Alimentação|Informar para o usuário sobre alimentação saudável com textos simples.|
|`       `2|` `Exercícios|Informar sobre os benefícios do exercício físico e instruir o usuário sobre esse assunto.|
|`    `3|` `Testes|<p>Fornecer ao usuário opções de cálculos que vão auxilia-lo a</p><p>entender melhor seu perfil. </p>|
|`    `4|` `Home|Ao ser clicado retorna a página inicial do site.|
||||
||||

2\.5. Atores


|`  `Nº                              |`                `Ator|Definição e Privilégio de Acesso e Segurança|
| :- | :- | :- |
|`   `1|`             `Usuário|Permissão para usar todas as funções do site.|
|`   `2|`        `Desenvolvedor|Permissão para alteração e melhorias no site.|


2\.6. Premissas

Será utilizado javascript para fazer os cálculos e transições.

Todos os projetos deverão ser documentados de acordo com as normas da empresa.

A programação será realizada em html, css e javascript.

O projeto é considerado de baixo porte e baixa complexidade.

2\.7. Itens Fora do Escopo

Desenvolvimento do site em outras linguagens fora o portugues.

Criação de login do usuário.

Sistema de pesquisa.

Utilização de bots com IA.














3\.   Requisitos Específicos

\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_

3\.1. Requisitos Funcionais



|`  `ID                       |Descrição |
| :- | :- |
|RF 01|O site deverá alterar o menu de acordo com o tamanho da tela.|
|RF 02|O site utilizará transições que ajudem o usuário a mexer no menu.|
|RF 03|O site indicará ao usuário botões utilizáveis. |


3\.2. Requisitos Não Funcionais



|ID|` `Descrição|Categoria|
| :- | :- | :- |
|RNF 1 |O site terá deverá usar botões padronizados da empresa|Padrões |
|RNF 2|O site terá atalhos em todos os menus |Usabilidade|
|RNF 3|O site terá agilidade nos menus|Performance|


3\.3. Regras de Negócio



|`   `ID|` `Nome|Descrição|
| :- | :- | :- |
|`  `RN 1|` `Testes|Os cálculos serão realizados separadamente|
|`  `RN 2|` `Textos|Os textos serão pegos de especialistas|
|` `RN 3|` `Vídeos|Os vídeos serão integrados do youtube ao site|












\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_\_

Documento de especificação de requisitos                                                                                                      

página 9 de 15

