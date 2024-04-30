# USER STORIES FITNESS\_PLUS


**STORY 1 Cálculo IMC (Prioridade: Altíssima - Complexidade: Fácil - Tempo: 1 dia):**

**SENDO** um usuário do sistema

**POSSO** calcular o meu IMC

**PARA QUE** eu entenda em qual  perfil eu me enquadro 

**Cenário 1: Informações preenchidas corretamente**

Dado que a medida usada no site é metros e quilogramas E minha altura é 1.7 metros E meu peso é 80 kg 

Quando informo minha altura 1.7 metros e meu peso em 80 kg  

Então o cálculo é feito

E é exibido na tela a mensagem "Você está  acima do peso: 27.68"

**Cenário  2: Informações preenchidas incorretamente**

Dado que a medida usada no site é metros e quilogramas E minha altura é 1.7 metros E meu peso é 80 kg 

Quando informo minha altura em 1.7 metros e meu peso em 176.37 libras

Então o cálculo é feito considerando que o peso está preenchido em kg

E é exibido na tela a mensagem "Você está obeso: 61.03"

<br>

**STORY 2 Cálculo TMB (Prioridade: Altíssima - Complexidade: Fácil - Tempo: 1 dia):**

**SENDO** um usuário do sistema

**POSSO** calcular a minha TMB

**PARA QUE** eu consiga montar minha alimentação corretamente

**Cenário 1: Informações preenchidas corretamente**

Dado que a medida usada no site é metros e quilogramas E o cálculo varia de acordo com o sexo E minha altura é 1.7 metros E meu peso é 80 kg E sou do sexo masculino E tenho 80 anos

Quando informo minha altura 1.70, meu peso 80 kg, meu sexo como masculino e minha idade 80 anos

Então o cálculo é feito

E é exibido na tela a mensagem "Seu metabolismo basal é: 714.12"

**Cenário 2: Informações preenchidas incorretamente**

Dado que a medida usada no site é metros e quilogramas E o cálculo varia de acordo com o sexo E minha altura é 1.7 metros E meu peso é 80 kg E sou do sexo masculino E tenho 80 anos

Quando informo minha altura 1.70, meu peso 80 kg, meu sexo como feminino e minha idade 80 anos

Então o cálculo é feito

E é exibido na tela a mensagem "Seu metabolismo basal é: 846.22"

<br>

**STORY 3 Cálculo FC (Prioridade: Altíssima - Complexidade: Fácil - Tempo: 1 dia):**

**SENDO** um usuário do sistema

**POSSO** calcular a minha FC ideal para emagrecer

**PARA QUE** eu aprenda sobre esse assunto

**Cenário 1: Informações preenchidas corretamente**

Dado que  a idade e o sexo mudam o resultado do cálculo E eu  tenho 80 anos E sou homem

Quando informo que minha idade é 80 anos e meu sexo é masculino

Então é feito o cálculo

E é exibido na tela a mensagem "Fc mínima ideal: 160.00 bpm" "Fc máxima ideal: 172.00 bpm"

**Cenário 2:  Informações preenchidas incorretamente**

Dado que a idade e o sexo mudam o resultado  do cálculo E eu tenho 80 anos E sou homem

Quando informo que minha idade é 80 anos e meu sexo é feminino

Então é feito o cálculo

E é exibido na tela a mensagem "Fc mínima ideal: 166.00 bpm" "Fc máxima ideal: 178.00 bpm"

<br>

**STORY 4 Cadastro (Prioridade Alta - Complexidade Alta - Tempo: 2 semanas ):**

**SENDO** um usuário do sistema

**POSSO** fazer um cadastro no site

**PARA QUE** o site obtenha meus dados e forneça informações baseadas neles

**Cenário 1: Cadastro bem sucedido**

Dado que o site pede obrigatoriamente o e-mail, altura, peso, idade, sexo, nome de  usuário e   senha para realizar o cadastro E eu informo meus dados corretamente.

Quando eu peço para me cadastrar

Então é feito o cadastro

E é exibido na tela a mensagem "Cadastro concluído, será enviado um link de confirmação no seu e-mail"

**Cenário 2: Cadastro mal sucedido(e-mail já utilizado)**

Dado que o site pede obrigatoriamente o e-mail, altura, peso, idade, sexo, nome de usuário e senha para realizar o cadastro E não é permitido e-mails ja utilizados no site E eu tento utilizar um e-mail que ja cadastrei no site

Quando eu  peço para me cadastrar

Então o cadastro não é feito

E é exibido na tela a mensagem "Não é possível completar o cadastro, e-mail já utilizado"

**Cenário 3: Cadastro mal sucedido(e-mail invalido)**

Dado que o site pede obrigatoriamente o e-mail, altura, peso, idade, sexo, nome de usuário e senha para realizar o cadastro E e-mails invalidos não são aceitos E eu digito um email que não existe

Quando eu peço para me cadastrar

Então o cadastro não é feito

E é exibido na tela a mensagem "Não é possível completar o cadastro, e-mail invalido"

**Cenário 4: Cadastro mal sucedido(nome de usuário já existente)**

Dado que o site pede obrigatoriamente o e-mail, altura, peso, idade, sexo, nome de usuário e senha para realizar o cadastro E nomes de usuários não podem ser iguais E eu digito um nome de usuário já existente

Quando peço para me cadastrar	

Então o cadastro não é feito

E é exibido na tela a mensagem "Não é possível realizar o cadastro, nome de usuário já existente"

<br>

**STORY 5 Login e progresso (Prioridade Média - Complexidade Alta - Tempo 2 semanas):**

**SENDO** usuário cadastrado do sistema

**POSSO** ter acesso a informações baseadas em meus dados

**PARA QUE** eu perceba o meu progresso

<br>

**STORY 6 Questionários e recomendações (Prioridade Média - Complexidade Alta - Tempo 2 semanas):**

**SENDO**  usuário cadastrado do sistema 

**POSSO** responder questionários

**PARA QUE** eu receba do sistema recomendações

**Cenário 1: Questionários respondidos**

Dado que o sistema precisa que o usuário responda os questionários para passar recomendações E eu respondi os questionários

Quando entro na área do usuário

Então as recomendações são geradas

E é exibido na tela as recomendações baseadas em minhas respostas


**Cenário  2: Questionários sem respostas**

Dado que o sistema precisa que o usuário responda os questionários para passar recomendações E eu não respondi os questionários

Quando entro na área do usuário

Então as recomendações não são geradas

E é exibido na tela "As recomendações serão exibidas após responder os questionários".

<br>

**STORY 7 Login do sistema (Prioridade Alta - Complexidade Alta - Tempo 2 semanas):**

**SENDO** usuário cadastrado do sistema

**POSSO** entrar na minha conta utilizando o e-mail e senha cadastrados 

**PARA QUE** eu acesse minha conta

**Cenário 1: Login conluído com sucesso**
Dado que o sistema precisa que eu informe meu e-mail e senha cadastrado para prosseguir com o meu login E eu informo corretamente os meus dados

Quando aperto o botão para entrar na minha conta

Então o login e feito com sucesso

E é exibido na tela a Área do usuário.

**Cenário 2: Login sem sucesso (dados incorretos)**

Dado que o sistema precisa que eu informe meu e-mail e senha cadastrado para prosseguir com o meu login E eu informo incorretamente os meus dados

Quando aperto o botão para entrar na minha conta

Então o login não é feito

E é exibido na tela a mensagem "E-mail ou senha incorretos".


<br>

**STORY 8 Recuperação de senha (Prioridade Alta - Complexidade Alta - Tempo 2 semanas):**

**SENDO** um usuário cadastrado do sistema

**POSSO** Redefinir a minha senha

**PARA QUE** eu consiga recuperar o acesso a minha conta

**Cenário 1: Redefinição solicitada com sucesso**

Dado que o sistema precisa que eu informe o meu E-mail cadastrado para que me envie o link de redefinição E eu informo corretamente o meu E-mail

Quando solicito a redefinição da senha

Então a solicitação e bem sucedida

E é exibido na tela a mensagem "Foi enviado o link de redefinição para o seu E-mail"

**Cenário 2: Redefinição mal sucedida**

Dado que o sistema precisa que eu informe o meu E-mail cadastrado para que me envie o link de redefinição E eu informe incorretamente o meu E-mail

Quando solicito a redefinição de senha

Então a solicitação não é realizada

E é exibido na tela a mensagem "E-mail não cadastrado ou informado incorretamente"





**STORY 9 Informações alimentação (Prioridade Baixa - Complexidade Fácil - Tempo 1 dia):**

**SENDO** usuário do sistema

**POSSO** ter acesso a informações sobre alimentação

**PARA QUE** eu entenda como me alimentar corretamente.

<br>

**STORY 10 Informações exercícios (Prioridade Baixa - Complexidade Fácil - Tempo 1 dia):**

**SENDO** usuário do sistema

**POSSO** ter acesso a informações sobre exercícios

**PARA QUE** eu entenda como me exercitar corretamente.








